<?php
class Controller{
    private $_f3;

    public function __construct($f3)
    {
        $this->_f3 = $f3;
    }

    function home ()
    {
        $view = new Template();
        echo $view->render('views/home.html');
    }

    function login ()
    {
        // Display a view page
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $password= $_POST['password'];

            //hardcoded login right now
            if ($username == "user" AND $password == "pass"){
                $this->_f3->reroute('overview');
            }

            else{
                $this->_f3->set('SESSION.loginStatus', "login failed");
            }
        }
        $view = new Template();
        echo $view->render('views/login.html');
    }

    function overview ()
    {
        //setting things to fat-free hive

        //database object to get stuff from database
        $database = new AccessDatabase();
        $revenueArray = $database->getAllTransaction();



        // Display a view page
        $view = new Template();
        echo $view->render('views/overview.html');




    }

    function expense ()
    {
        $view = new Template();
        echo $view->render('views/expense.html');
    }

    function revenue()
    {
        $view = new Template();
        echo $view->render('views/revenue.html');
    }

    function sales()
    {
        $view = new Template();
        echo $view->render('views/sales.html');
    }

    function trends()
    {


        $view = new Template();
        echo $view->render('views/testTrends.html');
    }

    function form()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $transactionId = $_POST['transactionID'];
            $category = $_POST['category'];
            $itemName = $_POST['itemName'];
            $quantity = $_POST['quantity'];
            $totalAmount = DataLayer::getItemPrice($itemName, $quantity);
            $date = date("Y-m-d");

            $order = new Orders($date, $totalAmount, $transactionId, $category,
                $itemName, $quantity);

            $this->_f3->set('order', $order);
        }
        $view = new Template();
        echo $view->render('views/newForm.html');
    }

    function analysisOptions()
    {
        $view = new Template();
        echo $view->render('views/analysis-options.html');
    }
}