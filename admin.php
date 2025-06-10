<?php
session_start();

// Проверяем, есть ли пользователь в сессии
if (!isset($_SESSION['user_id'])) {
    // Не авторизован
    header('Location: login.php');
    exit;
}

// Если дошли сюда — пользователь авторизован
?>
<?php
include('partials/header.php');
Assets::addStyle();

$db = new Database();

// Kontakty
$contact = new Contact($db);
$contacts = $contact->index();

// Recenzie (отзывы)
$review = new Review($db);
$reviews = $review->index();

// Používatelia
$user = new User($db);
$users = $user->index();

// Vymazanie správy (контакта)
if (isset($_GET['delete'])) {
    $contact->destroy($_GET['delete']);
    header("Location: admin.php");
    exit;
}

// Vymazanie recenzie (отзыва)
if (isset($_GET['delete_review'])) {
    $review->destroy($_GET['delete_review']);
    header("Location: admin.php");
    exit;
}

// Vymazanie používateľa
if (isset($_GET['delete_user'])) {
    $user->destroy($_GET['delete_user']);
    header("Location: admin.php");
    exit;
}
?>

<section class="container">
    <h1>Vítaj admin</h1>

    <!-- Button - logout -->
    <form action="logout.php" method="POST" style="text-align: right;">
        <button type="submit" class="button">Log out</button>
    </form>

    <!-- Sekcia kontaktov -->
    <h2>Kontakty</h2>
    <a href="contact-create.php" class="button">Create Contact</a>
    <table>
        <tr>
            <th>ID</th>
            <th>Meno</th>
            <th>Email</th>
            <th>Telefónne číslo</th>
            <th>Kurz</th>
            <th>Delete</th>
            <th>Edit</th>
            <th>Show</th>
        </tr>
        <?php foreach($contacts as $con): ?>
            <tr>
                <td><?= htmlspecialchars($con['id']) ?></td>
                <td><?= htmlspecialchars($con['name']) ?></td>
                <td><?= htmlspecialchars($con['email']) ?></td>
                <td><?= htmlspecialchars($con['phone']) ?></td>
                <td><?= htmlspecialchars($con['course']) ?></td>
                <td><a href="?delete=<?= $con['id'] ?>" onclick="return confirm('Určite chcete vymazať túto správu?')">Delete</a></td>
                <td><a href="contact-edit.php?id=<?= $con['id'] ?>">Edit</a></td>
                <td><a href="contact-show.php?id=<?= $con['id'] ?>">Show</a></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <hr>

    <!-- Sekcia recenzií -->
    <h2>Recenzie</h2>
    <a href="review-create.php" class="button">Create Review</a>
    <table>
        <tr>
            <th>ID</th>
            <th>Meno</th>
            <th>Email</th>
            <th>Správa</th>
            <th>Delete</th>
            <th>Edit</th>
            <th>Show</th>
        </tr>
        <?php foreach($reviews as $rev): ?>
            <tr>
                <td><?= htmlspecialchars($rev['id']) ?></td>
                <td><?= htmlspecialchars($rev['name']) ?></td>
                <td><?= htmlspecialchars($rev['email']) ?></td>
                <td><?= htmlspecialchars($rev['message']) ?></td>
                <td><a href="?delete_review=<?= $rev['id'] ?>" onclick="return confirm('Určite chcete vymazať tento recenziu?')">Delete</a></td>
                <td><a href="review-edit.php?id=<?= $rev['id'] ?>">Edit</a></td>
                <td><a href="review-show.php?id=<?= $rev['id'] ?>">Show</a></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <hr>

    <!-- Sekcia používateľov -->
    <h2>Používatelia</h2>
    <a href="user-create.php" class="button">Create User</a>
    <table>
        <tr>
            <th>ID</th>
            <th>Meno</th>
            <th>Email</th>
            <th>Role</th>
            <th>Delete</th>
            <th>Edit</th>
            <th>Show</th>
        </tr>
        <?php foreach($users as $u): ?>
            <tr>
                <td><?= htmlspecialchars($u['id']) ?></td>
                <td><?= htmlspecialchars($u['name']) ?></td>
                <td><?= htmlspecialchars($u['email']) ?></td>
                <td><?= htmlspecialchars($u['role']) ?></td>
                <td><a href="?delete_user=<?= $u['id'] ?>" onclick="return confirm('Určite chcete vymazať tohto používateľa?')">Delete</a></td>
                <td><a href="user-edit.php?id=<?= $u['id'] ?>">Edit</a></td>
                <td><a href="user-show.php?id=<?= $u['id'] ?>">Show</a></td>
            </tr>
        <?php endforeach; ?>
    </table>

</section>

<?php
include('partials/footer.php');
?>