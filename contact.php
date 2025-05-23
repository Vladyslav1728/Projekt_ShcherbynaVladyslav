<?php
  include('partials/header.php');
  $db = new Database();
  $contact = new Contact($db);
  if($_SERVER['REQUEST_METHOD']=='POST'){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    //print_r($_POST);
    if ($contact->create($name, $email, $message)) {
      header("Location: thankyou.php");
      exit;
    } else {
        echo "Error creating contact.";
    }
  }
?>
<main>
  <section class="banner">
    <div class="container text-white">
      <h1>Kontakt</h1>
    </div>
  </section>
  <section>
    <div class="container">
      <div class="col-100 text-center">
        <p><strong><em>Elit culpa id mollit irure sit. Ex ut et ea esse culpa officia ea incididunt elit velit veniam qui. Mollit deserunt culpa incididunt laborum commodo in culpa.</em
        ></strong></p>
      </div>
    </div>
  </section>
  <section class="container">
    <div class="row">
      <div class="col-50"> 
        <h3>Máte otázky?</h3>
        <p>Incididunt mollit quis eiusmod tempor voluptate duis eu enim amet excepteur cupidatat magna velit. </p> 
        <p>Velit id ad laborum velit commodo.</p>
        <p>Consectetur laborum aliqua nulla anim cupidatat consectetur est veniam cupidatat.</p>
      </div>
      <div class="col-50 text-right">
        <h3>Napíšte nám</h3>
        <form id="contact" action="" method="POST">
          <input type="text" placeholder="Vaše meno" id ="name" name="name" required><br>
          <input type="email" placeholder="Váš email" id="email" name="email" required><br>
          <textarea placeholder="Vaša správa" id="message" name="message" ></textarea><br>
          <input type="checkbox" name="" id="" required>
          <label for=""> Súhlasím so spracovaním osobných údajov.</label><br>
          <input type="submit" value="Odoslať">
        </form>
      </div>
    </div>
  </section>
</main>
<?php
  include('partials/footer.php');
?>