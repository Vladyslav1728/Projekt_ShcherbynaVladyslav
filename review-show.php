<?php
include('partials/header.php');
Assets::addStyle();

$db = new Database();
$contact = new Review($db);

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $contactData = $contact->show($id);
}
?>

<section class="container">
    <h1>Recenzia show</h1>
    <p>Name: <?php echo($contactData['name']);?></p>
    <p>Email: <?php echo($contactData['email']);?></p>
    <p>Message: <?php echo($contactData['message']);?></p>
    <button class="button" onclick="window.location.href='admin.php'">Back to Recenzie</button>
</section>

<?php
include('partials/footer.php');
?> 