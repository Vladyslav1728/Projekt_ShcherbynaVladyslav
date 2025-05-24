<?php
include('partials/header.php');
Assets::addStyle();

$db = new Database();
$contact = new Contact($db);

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $contactData = $contact->show($id);

    if($_SERVER['REQUEST_METHOD']=='POST'){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone']; // заменили message на phone
        
        if ($contact->edit($id, $name, $email, $phone)) {
          header("Location: admin.php");
          exit;
        } else {
            echo "Error editing contact.";
        }
    }
}
?>

<section class="container">
    <h1>Update contact</h1>
    <form id="contact" action="" method="POST">
        <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($contactData['name']); ?>" required><br>
        <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($contactData['email']); ?>" required><br>
        <input type="tel" id="phone" name="phone" value="<?php echo htmlspecialchars($contactData['phone']); ?>" required><br> <!-- заменили textarea на input tel -->
        <input type="submit" value="Odoslať">
    </form>
</section>

<?php
include('partials/footer.php');
?>
