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
        $phone = $_POST['phone'];
        $course = $_POST['course'] ?? '';
        
        if ($contact->edit($id, $name, $email, $phone, $course)) {
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
        <input type="text" id="name" name="name" value="<?= htmlspecialchars($contactData['name']) ?>" required><br>
        <input type="email" id="email" name="email" value="<?= htmlspecialchars($contactData['email']) ?>" required><br>
        <input type="tel" id="phone" name="phone" value="<?= htmlspecialchars($contactData['phone']) ?>" required><br>

        <label for="course">Kurz:</label>
        <select name="course" id="course" class="form-control" required>
            <option value="" disabled <?= empty($contactData['course']) ? 'selected' : '' ?>>Select Desired Course</option>
            <option value="digital_marketing" <?= $contactData['course'] == 'digital_marketing' ? 'selected' : '' ?>>Digital Marketing</option>
            <option value="business_world" <?= $contactData['course'] == 'business_world' ? 'selected' : '' ?>>Business World</option>
            <option value="media_technology" <?= $contactData['course'] == 'media_technology' ? 'selected' : '' ?>>Media Technology</option>
            <option value="communications" <?= $contactData['course'] == 'communications' ? 'selected' : '' ?>>Communications</option>
            <option value="business_ethics" <?= $contactData['course'] == 'business_ethics' ? 'selected' : '' ?>>Business Ethics</option>
            <option value="photography" <?= $contactData['course'] == 'photography' ? 'selected' : '' ?>>Photography</option>
            <option value="web_development" <?= $contactData['course'] == 'web_development' ? 'selected' : '' ?>>Web Development</option>
            <option value="learn_html_css" <?= $contactData['course'] == 'learn_html_css' ? 'selected' : '' ?>>Learn HTML CSS</option>
            <option value="social_media" <?= $contactData['course'] == 'social_media' ? 'selected' : '' ?>>Social Media</option>
            <option value="digital_arts" <?= $contactData['course'] == 'digital_arts' ? 'selected' : '' ?>>Digital Arts</option>
            <option value="media_streaming" <?= $contactData['course'] == 'media_streaming' ? 'selected' : '' ?>>Media Streaming</option>
        </select><br>

        <input type="submit" value="Odoslať">
    </form>
</section>

<?php
include('partials/footer.php');
?>