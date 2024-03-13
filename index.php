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
$controller = new Controller($f3);

// Define a default route
$f3->route('GET /', function() {
    // Display a view page
    $GLOBALS['controller']->home();
});

// Routing a home route
$f3->route('GET /home', function() {
    // Display a view page
    $GLOBALS['controller']->home();
});

// Routing to the Login Page
$f3->route('GET|POST /login', function($f3) {
    $GLOBALS['controller']->login();
});

// Routing to the Overview Page
$f3->route('GET|POST /overview', function() {
    $GLOBALS['controller']->overview();
});

// Routing to the Expense Page
$f3->route('GET|POST /expense', function() {
    // Display a view page
    $GLOBALS['controller']->expense();
});

// Routing to the Revenue Page
$f3->route('GET|POST /revenue', function() {
    // Display a view page
    $GLOBALS['controller']->revenue();
});

// Routing to the Sales Page
$f3->route('GET|POST /sales', function() {
    // Display a view page
    $GLOBALS['controller']->sales();
});

// Routing to the Trends Page
$f3->route('GET|POST /trends', function() {
    // Display a view page
    // Display a view page
    $GLOBALS['controller']->trends();
});

// Routing to the Trends Page
$f3->route('GET|POST /form', function() {
    // Display a view page
    $GLOBALS['controller']->form();
});

// Routing to the analysis options Page
$f3->route('GET|POST /analysisoptions', function() {
    // Display a view page
    $GLOBALS['controller']->analysisOptions();
});

$f3->run();