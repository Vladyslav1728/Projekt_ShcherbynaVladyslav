<?php
  require_once('_inc/autoload.php');
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
  Assets::addStylesheets();
?>

<!--header-->
</head>
<body>
  <header class="main-header clearfix" role="header">
    <div class="logo">
      <a href="#"><em>Grad</em> School</a>
    </div>
    <a href="#menu" class="menu-link"><i class="fa fa-bars"></i></a>
    <nav id="menu" class="main-nav" role="navigation">
      <?php
      $menu = [
          'Home' => '#section1',
          'About Us' => [
              'url' => '#section2',
              'submenu' => [
                  'Who we are?' => '#section2',
                  'What we do?' => '#section3',
                  'How it works?' => '#section3',
                  'External URL' => 'https://templatemo.com/about'
              ]
          ],
          'Courses' => '#section4',
          'Video' => '#section5',
          'Contact' => '#section6',
          'External' => 'https://templatemo.com'
      ];
      ?>
      <ul class="main-menu">
      <?php echo MenuBuilder::getMenuHtml($menu); ?>
      </ul>
    </nav>
  </header>