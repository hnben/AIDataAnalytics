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
    echo $view->render('views/home.html');
});

// Routing a home route
$f3->route('GET /home', function() {
    // Display a view page
    $view = new Template();
    echo $view->render('views/home.html');
});

// Routing to the Login Page
$f3->route('GET|POST /login', function($f3) {

    // Display a view page
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = $_POST['username'];
        $password= $_POST['password'];

        //hardcoded login right now
        if ($username == "user" AND $password == "pass"){
            $f3->reroute('overview');
        }

        else{
            $f3->set('SESSION.loginStatus', "login failed");
        }
    }
        $view = new Template();
        echo $view->render('views/login.html');
});

// Routing to the Overview Page
$f3->route('GET|POST /overview', function() {
    // Display a view page
    $view = new Template();
    echo $view->render('views/overview.html');
});

// Routing to the Expense Page
$f3->route('GET|POST /expense', function() {
    // Display a view page
    $view = new Template();
    echo $view->render('views/expense.html');
});

// Routing to the Revenue Page
$f3->route('GET|POST /revenue', function() {
    // Display a view page
    $view = new Template();
    echo $view->render('views/revenue.html');
});

// Routing to the Sales Page
$f3->route('GET|POST /sales', function() {
    // Display a view page
    $view = new Template();
    echo $view->render('views/sales.html');
});

// Routing to the Trends Page
$f3->route('GET|POST /trends', function() {
    // Display a view page
    $view = new Template();
    echo $view->render('views/trends.html');
});


$f3->run();