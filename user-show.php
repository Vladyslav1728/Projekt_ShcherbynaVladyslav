<?php
include('partials/header.php');
Assets::addStyle();

$db = new Database();
$user = new User($db);

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $userData = $user->show($id);
}
?>

<section class="container">
    <h1>Detail používateľa</h1>
    <?php if ($userData): ?>
        <p>Meno: <?= htmlspecialchars($userData['name']) ?></p>
        <p>Email: <?= htmlspecialchars($userData['email']) ?></p>
        <p>Rola: <?= $userData['role'] == 0 ? 'Admin' : 'User' ?></p>
        <button class="button" onclick="window.location.href='admin.php'">Back to Users</button>
    <?php else: ?>
        <p>Používateľ nebol nájdený.</p>
        <button class="button" onclick="window.location.href='admin.php'">Back to Users</button>
    <?php endif; ?>
</section>

<?php
include('partials/footer.php');
?>