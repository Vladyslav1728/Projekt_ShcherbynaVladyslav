<?php
session_start();
include('partials/header.php');
Assets::addStyle();
?>

<?php
$bd = new Database();
$auth = new Authenticate($bd);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    //Временный вывод для проверки отправленных данных
    //echo "Email: " . htmlspecialchars($email) . "<br>";
    //echo "Password: " . htmlspecialchars($password) . "<br>";
    
    if ($auth->login($email, $password)) {
        //echo "Prihlásenie úspešné."; //Временный вывод
        //Перенаправление на страницу администрирования
        header("Location: admin.php");
        exit; //Завершаем скрипт после редиректа
    } else {
        $error = "Nesprávne prihlasovacie údaje."; //Сообщение об ошибке
        echo "Prihlásenie neúspešné."; //Временный вывод
    }
}
?>

<section class="container">
  <div style="display: flex; justify-content: space-between; align-items: center;">
    <h2 style="margin: 0;">Prihlásenie</h2>
    <form action="index.php" method="get" style="margin: 0;">
      <button type="submit" class="btn-home">Na hlavnú stránku</button>
    </form>
  </div>

  <?php if (isset($error)): ?>
    <div style="color: red; margin-top: 10px;"><?= htmlspecialchars($error) ?></div>
  <?php endif; ?>

  <form id="user" method="POST" action="login.php" style="margin-top: 20px;">
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>

    <label for="password">Heslo:</label>
    <input type="password" id="password" name="password" required>

    <input type="submit" value="Prihlásiť sa">
  </form>
</section>

<?php
include('partials/footer.php');
?>