<?php

function get_menu(array $pages) {
    $menuItems = '';
    foreach ($pages as $page_name => $page_url) {
        $menuItems .= '<li><a href="' . $page_url . '">' . $page_name . '</a></li>';
    }
    return $menuItems;
}

function add_scripts() {
    echo '<script src="vendor/jquery/jquery.min.js"></script>';
    echo '<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>';

    $page_name = basename($_SERVER["SCRIPT_NAME"], '.php');

    switch($page_name) {
        case 'index':

            echo '<script src="assets/js/isotope.min.js"></script>';
            echo '<script src="assets/js/owl-carousel.js"></script>';
            echo '<script src="assets/js/lightbox.js"></script>';
            echo '<script src="assets/js/tabs.js"></script>';
            echo '<script src="assets/js/video.js"></script>';
            echo '<script src="assets/js/slick-slider.js"></script>';
            echo '<script src="assets/js/custom.js"></script>';
            break;
    }
}

function add_stylesheets() {
    echo '<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">';
    echo '<link rel="stylesheet" href="assets/css/templatemo-grad-school.css">';
    echo '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">';

    $page_name = basename($_SERVER["SCRIPT_NAME"], '.php');

    switch($page_name) {
        case 'index':
            echo '<link rel="stylesheet" href="assets/css/owl.css">';
            echo '<link rel="stylesheet" href="assets/css/lightbox.css">';
            echo '<link rel="stylesheet" href="assets/css/fontawesome.css">';
            break;
    }
}
?>