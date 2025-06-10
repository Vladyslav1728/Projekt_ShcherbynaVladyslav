<?php
class Authenticate
{
    private $db;

    public function __construct(Database $database)
    {
        $this->db = $database->getConnection();

        //Обязательно запускать сессию
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function login($email, $password)
    {
        $stmt = $this->db->prepare(
            "SELECT * FROM users WHERE email = :email LIMIT 1"
        );
        $stmt->bindParam(":email", $email, PDO::PARAM_STR);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user["password"])) {
            //Безопасно сохранить
            $_SESSION["user_id"] = $user["id"];
            $_SESSION["email"] = $user["email"];
            $_SESSION["role"] = $user["role"];
            $_SESSION["name"] = $user["name"];

            //Можно обновить ID сессии для защиты от фиксации сессии
            session_regenerate_id(true);

            return true;
        }
        return false;
    }

    public function logout()
    {
        //Очистка сессии
        $_SESSION = [];

        //Удаление cookie сессии
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(
                session_name(), //по умолчанию — PHPSESSID
                "",
                time() - 42000,
                $params["path"],
                $params["domain"],
                $params["secure"],
                $params["httponly"]
            );
        }

        session_destroy();
    }

    public function isLogged()
    {
        return isset($_SESSION["user_id"]);
    }

    public function getUserRole()
    {
        return $_SESSION["role"] ?? null;
    }

    public function getUserName()
    {
        return $_SESSION["name"] ?? null;
    }
}
?>