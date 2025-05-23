<?php
include('partials/header.php');
Assets::addStyle();

$db = new Database();
$contact = new Review($db);

if($_SERVER['REQUEST_METHOD']=='POST'){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    if ($contact->create($name, $email, $message)) {
      header("Location: admin.php");
      exit;
    } else {
        echo "Error creating contact.";
    }
  }
?>

<section class="container">
    <h1>Pridanie recenzii</h1>
    <form id="contact" action="" method="POST">
        <input type="text" placeholder="Vaše meno" id ="name" name="name" required><br>
        <input type="email" placeholder="Váš email" id="email" name="email" required><br>
        <textarea placeholder="Vaša správa" id="message" name="message" ></textarea><br>
        <input type="submit" value="Odoslať">
    </form>
</section>

<?php
include('partials/footer.php');
?>