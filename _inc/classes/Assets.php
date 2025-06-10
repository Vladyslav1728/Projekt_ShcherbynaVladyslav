<?php
class Assets
{
    public static function addScripts()
    {
        echo '<script src="vendor/jquery/jquery.min.js"></script>';
        echo '<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>';

        $page_name = basename($_SERVER["SCRIPT_NAME"], ".php");

        if ($page_name === "index") {
            echo '<script src="assets/js/isotope.min.js"></script>';
            echo '<script src="assets/js/owl-carousel.js"></script>';
            echo '<script src="assets/js/lightbox.js"></script>';
            echo '<script src="assets/js/tabs.js"></script>';
            echo '<script src="assets/js/video.js"></script>';
            echo '<script src="assets/js/slick-slider.js"></script>';
            echo '<script src="assets/js/custom.js"></script>';
        }
    }

    public static function addStylesheets()
    {
        echo '<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">';
        echo '<link rel="stylesheet" href="assets/css/templatemo-grad-school.css">';
        echo '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">';

        $page_name = basename($_SERVER["SCRIPT_NAME"], ".php");

        if ($page_name === "index") {
            echo '<link rel="stylesheet" href="assets/css/owl.css">';
            echo '<link rel="stylesheet" href="assets/css/lightbox.css">';
            echo '<link rel="stylesheet" href="assets/css/fontawesome.css">';
        }
    }

    public static function addStyle()
    {
        $page_name = basename($_SERVER["SCRIPT_NAME"], ".php");
        $version = filemtime("assets/css/{$page_name}.css");

        switch ($page_name) {
            case "admin":
                echo '<link rel="stylesheet" href="assets/css/admin.css?v=' .
                    $version .
                    '">';
                break;
            case "user-create":
                echo '<link rel="stylesheet" href="assets/css/user-create.css?v=' .
                    $version .
                    '">';
                break;
            case "user-edit":
                echo '<link rel="stylesheet" href="assets/css/user-edit.css?v=' .
                    $version .
                    '">';
                break;
            case "user-show":
                echo '<link rel="stylesheet" href="assets/css/user-show.css?v=' .
                    $version .
                    '">';
                break;
            case "contact-create":
                echo '<link rel="stylesheet" href="assets/css/contact-create.css?v=' .
                    $version .
                    '">';
                break;
            case "contact-edit":
                echo '<link rel="stylesheet" href="assets/css/contact-edit.css?v=' .
                    $version .
                    '">';
                break;
            case "contact-show":
                echo '<link rel="stylesheet" href="assets/css/contact-show.css?v=' .
                    $version .
                    '">';
                break;
            case "login":
                echo '<link rel="stylesheet" href="assets/css/login.css?v=' .
                    $version .
                    '">';
                break;
            case "review-create":
                echo '<link rel="stylesheet" href="assets/css/review-create.css?v=' .
                    $version .
                    '">';
                break;
            case "review-edit":
                echo '<link rel="stylesheet" href="assets/css/review-edit.css?v=' .
                    $version .
                    '">';
                break;
            case "review-show":
                echo '<link rel="stylesheet" href="assets/css/review-show.css?v=' .
                    $version .
                    '">';
                break;
            case "thankyou":
                echo '<link rel="stylesheet" href="assets/css/thankyou.css?v=' .
                    $version .
                    '">';
                break;
        }
    }
}