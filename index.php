<?php
/* Will Castillo, Huy Nguyen, Tien Nguyen
 * February 2024
 * https://github.com/hnben/AIDataAnalytics
 * This is my CONTROLLER for the AI Data Analytics Website
 */

// Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Require the autoload file
require_once('vendor/autoload.php');

// Instantiate Fat-Free framework (F3)
$f3 = Base::instance(); //static method

// Define a default route
$f3->route('GET /', function() {
    // Display a view page
    $view = new Template();
    echo $view->render('views/login.html');
});

// Define a home route
$f3->route('GET /home', function() {
    // Display a view page
    $view = new Template();
    echo $view->render('views/home.html');
});

$f3->run();