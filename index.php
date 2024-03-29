<?php
/**
 * The index.php is the controller for the AI Data Analytics Website.
 * This creates the routing for all view pages
 *
 * @author Huy Nguyen, Tien Nguyen, Will Castillo
 */

// Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Require the autoload file
require_once('vendor/autoload.php');

// Instantiate Fat-Free framework (F3)
$f3 = Base::instance(); //static method
$controller = new Controller($f3);

$dataLayer = new AccessDatabase();

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

// Routing to the analysis options Page
$f3->route('GET|POST /analysisoptions', function() {
    // Display a view page
    $GLOBALS['controller']->analysisOptions();
});

$f3->run();