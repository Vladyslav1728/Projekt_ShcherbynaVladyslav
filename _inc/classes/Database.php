<?php

class Database
{
    private string $host;
    private string $db;
    private string $user;
    private string $pass;
    private string $charset;
    private ?PDO $pdo = null;

    public function __construct(
        string $host = "localhost",
        string $db = "db_pre_sait",
        string $user = "root",
        string $pass = "",
        string $charset = "utf8"
    ) {
        $this->host = $host;
        $this->db = $db;
        $this->user = $user;
        $this->pass = $pass;
        $this->charset = $charset;

        $this->connect();
    }

    private function connect(): void
    {
        $dsn = "mysql:host={$this->host};dbname={$this->db};charset={$this->charset}";
        try {
            $this->pdo = new PDO($dsn, $this->user, $this->pass, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
            ]);
        } catch (PDOException $e) {
            error_log("Database connection error: " . $e->getMessage());
            exit("Database error. Please contact administrator.");
        }
    }

    public function getConnection(): ?PDO
    {
        return $this->pdo;
    }

    public function __destruct()
    {
        $this->pdo = null;
    }
}

?>