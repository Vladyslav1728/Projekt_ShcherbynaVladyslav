<?php
include('partials/header.php');
Assets::addStyle();

$db = new Database();
$contact = new Contact($db);

if($_SERVER['REQUEST_METHOD']=='POST'){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $course = $_POST['course'] ?? '';
    
    if ($contact->create($name, $email, $phone, $course)) {
      header("Location: admin.php");
      exit;
    } else {
        echo "Error creating contact.";
    }
}
?>

<section class="container">
    <h1>Pridanie kontaktu</h1>
    <form id="contact" action="" method="POST">
        <input type="text" placeholder="Vaše meno" id="name" name="name" required><br>
        <input type="email" placeholder="Váš email" id="email" name="email" required><br>
        <input type="tel" placeholder="Váš telefón" id="phone" name="phone" required><br>
        
        <label for="course">Kurz:</label>
        <input type="text" placeholder="Názov kurzu" id="course" name="course"><br>

        <input type="submit" value="Odoslať">
    </form>
</section>

<?php
include('partials/footer.php');
?>