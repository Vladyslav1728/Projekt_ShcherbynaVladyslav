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
        <select name="course" id="course" class="form-control" required>
            <option value="" disabled selected>Vyberte kurz</option>
            <option value="digital_marketing">Digital Marketing</option>
            <option value="business_world">Business World</option>
            <option value="media_technology">Media Technology</option>
            <option value="communications">Communications</option>
            <option value="business_ethics">Business Ethics</option>
            <option value="photography">Photography</option>
            <option value="web_development">Web Development</option>
            <option value="learn_html_css">Learn HTML CSS</option>
            <option value="social_media">Social Media</option>
            <option value="digital_arts">Digital Arts</option>
            <option value="media_streaming">Media Streaming</option>
        </select><br>

        <input type="submit" value="Odoslať">
    </form>
</section>

<?php
include('partials/footer.php');
?>