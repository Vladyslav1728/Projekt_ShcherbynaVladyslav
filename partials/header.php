<?php
  require_once('_inc/functions.php');
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900" rel="stylesheet">

    <title>Grad School HTML5 Template</title>

    <!-- Additional CSS Files -->
<?php
  add_stylesheets();
?>
<!--
    
TemplateMo 557 Grad School

https://templatemo.com/tm-557-grad-school

-->
</head>
<body>

   
  <!--header-->
  <header class="main-header clearfix" role="header">
    <div class="logo">
      <a href="#"><em>Grad</em> School</a>
    </div>
    <a href="#menu" class="menu-link"><i class="fa fa-bars"></i></a>
    <nav id="menu" class="main-nav" role="navigation">
      <ul class="main-menu">
  <?php
    $pages = array(
      'Home' => '#section1',
      'About Us' => '#section2',
      'Courses' => '#section4',
      'Contact' => '#section6'
    );
    echo get_menu($pages);
  ?>
</ul>
    </nav>
  </header>