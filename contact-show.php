<?php
include('partials/header.php');
Assets::addStyle();

$db = new Database();
$contact = new Contact($db);

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $contactData = $contact->show($id);
}
?>

<section class="container">
    <h1>Contact show</h1>
    <p>Name: <?php echo htmlspecialchars($contactData['name']); ?></p>
    <p>Email: <?php echo htmlspecialchars($contactData['email']); ?></p>
    <p>Phone: <?php echo htmlspecialchars($contactData['phone']); ?></p> <!-- заменили Message на Phone -->
    <a href="admin.php">Back to Contacts</a>
</section>

<?php
include('partials/footer.php');
?>
