<?php
class Controller{
    private $_f3;
    private $_database;

    public function __construct($f3)
    {
        $this->_database = new AccessDatabase();
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
        //database object to get stuff from database
        $revenueArray = $this->_database->getAllTransaction();
        $expenseArray = $this->_database->getAllExpense();

        //set into the overview object
        $overviewObject = new Overview($expenseArray, $revenueArray, 10);

        if ($overviewObject->calcNet() < 0 )
        {
            $this->_f3->set('negativeBalance', true);
        }
        else{
            $this->_f3->set('negativeBalance', false);
        }
        //set fat free object of the overview page
        $this->_f3->set('SESSION.overview', $overviewObject);

        // Display a view page
        $view = new Template();
        echo $view->render('views/overview.html');

    }

    function expense ()
    {
        //after the form submits
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
//            adding empty fields
            $totalAmount = "";
            $category = "";
            $date = "";

            //            validate the datas
            if(Validate::validateNumber($_POST['totalAmount'])) {
                $totalAmount = $_POST['totalAmount'];
            }
            else {
                $this->_f3->set('errors["totalAmount"]', "Invalid total amount");
            }
            if(Validate::validateString($_POST['category'])) {
                $category = $_POST['category'];
            }
            else {
                $this->_f3->set('errors["category"]', "Invalid category");
            }
            if(Validate::validateDate($_POST['date'])) {
                $date = $_POST['date'];
            }
            else {
                $this->_f3->set('errors["date"]', "Invalid date");
            }
//            check to see if there are any errors
            if(empty($this->_f3->get('errors'))) {
                //save and insert into the database
                $expenseObject = new Expenses($category, $date, $totalAmount);

                $database = new AccessDatabase();
                $database->saveExpense($expenseObject);
            }

        }

        //update the overview object
        $revenueArray = $this->_database->getAllTransaction();
        $expenseArray = $this->_database->getAllExpense();

        //set into the overview object
        $expenseObject = new Overview($expenseArray, $revenueArray, 10);

        //set fat free object of the overview page
        $this->_f3->set('SESSION.expense', $expenseObject);

        // display the page
        $view = new Template();
        echo $view->render('views/expense.html');


    }

    function revenue()
    {
        //after the form submits
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
//            setting empty fields
            $transactionID = "";
            $category = "";
            $itemName =  "";
            $quantity =  "";

//            validate the datas
            if(Validate::validateNumber($_POST['transactionID'])) {
                $transactionID = $_POST['transactionID'];
            }
            else {
                $this->_f3->set('errors["transactionID"]', "Invalid TransactionID");
            }
            if(Validate::validateString($_POST['category'])) {
                $category = $_POST['category'];
            }
            else {
                $this->_f3->set('errors["category"]', "Invalid category");
            }
            if(Validate::validateString($_POST['itemName'])) {
                $itemName = $_POST['itemName'];
            }
            else {
                $this->_f3->set('errors["itemName"]', "Invalid item name");
            }
            if(Validate::validateNumber($_POST['quantity'])) {
                $quantity = $_POST['quantity'];
            }
            else {
                $this->_f3->set('errors["quantity"]', "Invalid quanity");
            }

//            check to see if there are any errors
            if(empty($this->_f3->get('errors'))) {
                $totalAmount = DataLayer::getItemPrice($itemName, $quantity);
                $date = date('Y-m-d');

                //create a new order object
                $orderObject = new Orders($date, $totalAmount, $transactionID, $category,
                    $itemName, $quantity);

                //adds into the database
                $database = new AccessDatabase();
                $database->saveOrder($orderObject);
            }
        }

        //update the overview object
        $revenueArray = $this->_database->getAllTransaction();
        $expenseArray = $this->_database->getAllExpense();

        //set into the overview object
        $revenueObject = new Overview($expenseArray, $revenueArray, 10);

        //set fat free object of the overview page
        $this->_f3->set('SESSION.revenue', $revenueObject);

        $view = new Template();
        echo $view->render('views/revenue.html');
    }

    function sales()
    {
//        currently not using
        $view = new Template();
        echo $view->render('views/sales.html');
    }

    function trends()
    {

        $view = new Template();
        echo $view->render('views/testTrends.html');
    }
/*
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
*/
    function analysisOptions()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $startDate = $_POST['startDate'];
            $endDate = $_POST['endDate'];
            $analysisOption = $_POST['trend'];



        }

        $view = new Template();
        echo $view->render('views/analysis-options.html');
    }
}