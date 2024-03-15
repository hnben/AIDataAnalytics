<?php

/**
 * This class serves as the controller of the web application.
 * It will store the methods to create routing through pages.
 * Allows for communication between views and model.
 *
 * @author Huy Nguyen, Tien Nguyen, Will Castillo
 */
class Controller{
    private $_f3;
    private $_database;

    /**
     * @param $f3 FatFreeFramework object, we use this parameter to pass
     * the fat free framework to be able to route to pages and uses fat free templating language.
     */
    public function __construct($f3)
    {
        $this->_database = new AccessDatabase();
        $this->_f3 = $f3;
    }

    /** This method will create a route to a views/home.html directory
     * @return void
     */
    function home ()
    {
        $view = new Template();
        echo $view->render('views/home.html');
    }

    /**
     * This method will create a route to a views/login.html directory.
     * Validates the username and password to proceed to overview page
     * @return void
     */
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

    /**
     * This method will create a route to a views/overview.html directory.
     * Creates an Overview object and saves it into a session.
     * @return void
     */
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

    /**
     * This method will create a route to a views/expense.html directory.
     * Validates the data and updates the Overview object.
     *
     * @return void
     */
    function expense ()
    {
        //after the form submits
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $totalAmount = "";
            $category = "";
            $date = "";

            // validates the data
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
            // checks to see if there are any errors
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

    /**
     * This method will create a route to a views/revenue.html directory.
     * The page contains a form, which is validated and added into the
     * Overview object
     *
     * @return void
     */
    function revenue()
    {
        //after the form submits
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
//            setting empty fields
            $transactionID = "";
            $category = "";
            $itemName =  "";
            $quantity =  "";

//            validates the data
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

//            checks to see if there are any errors
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

    /**
     * This method will create a route to a views/analysis-options.html.html directory.
     * Contains the options for trends, generates GPT response, and displays on page.
     *
     * @return void
     */
    function analysisOptions()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $startDate = $_POST['startDate'];
            $endDate = $_POST['endDate'];
            $analysisOption = $_POST['trend'];

            $prompt = DataLayer::getGPTPrompt($startDate, $endDate, $analysisOption);
            $response = gptData::getGPTResponse($prompt);

            $this->_f3->set('bruh', $response);
        }

        $view = new Template();
        echo $view->render('views/analysis-options.html');
    }
}