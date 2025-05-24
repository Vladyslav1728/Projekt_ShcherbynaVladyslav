<?php
class Assets {
    public static function addScripts() {
        echo '<script src="vendor/jquery/jquery.min.js"></script>';
        echo '<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>';

        $page_name = basename($_SERVER["SCRIPT_NAME"], '.php');

        if ($page_name === 'index') {

            echo '<script src="assets/js/isotope.min.js"></script>';
            echo '<script src="assets/js/owl-carousel.js"></script>';
            echo '<script src="assets/js/lightbox.js"></script>';
            echo '<script src="assets/js/tabs.js"></script>';
            echo '<script src="assets/js/video.js"></script>';
            echo '<script src="assets/js/slick-slider.js"></script>';
            echo '<script src="assets/js/custom.js"></script>';
        }
    }

    public static function addStylesheets() {
        echo '<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">';
        echo '<link rel="stylesheet" href="assets/css/templatemo-grad-school.css">';
        echo '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">';

        $page_name = basename($_SERVER["SCRIPT_NAME"], '.php');

        if ($page_name === 'index') {
            echo '<link rel="stylesheet" href="assets/css/owl.css">';
            echo '<link rel="stylesheet" href="assets/css/lightbox.css">';
            echo '<link rel="stylesheet" href="assets/css/fontawesome.css">';
        }
    }

    public static function addStyle() {
        $page_name = basename($_SERVER["SCRIPT_NAME"], '.php');

        switch ($page_name) {
            case 'admin':
                echo '<link rel="stylesheet" href="assets/css/admin.css">';
                break;
            case 'user-create':
                echo '<link rel="stylesheet" href="assets/css/user-create.css">';
                break;
            case 'user-edit':
                echo '<link rel="stylesheet" href="assets/css/user-edit.css">';
                break;
            case 'user-show':
                echo '<link rel="stylesheet" href="assets/css/user-show.css">';
                break;
            case 'contact-create':
                echo '<link rel="stylesheet" href="assets/css/contact-create.css">';
                break;
            case 'contact-edit':
                echo '<link rel="stylesheet" href="assets/css/contact-edit.css">';
                break;
            case 'contact-show':
                echo '<link rel="stylesheet" href="assets/css/contact-show.css">';
                break;
            case 'login':
                echo '<link rel="stylesheet" href="assets/css/login.css">';
                break;
        }
    }
}