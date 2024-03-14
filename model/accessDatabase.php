<?php
// Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

//connect to database
//require_once($_SERVER["DOCUMENT_ROOT"]. '/../config.php');

class AccessDatabase
{
    private $_dbh;

    function __construct()
    {
        //instantiate PDO database connection object
        try
        {
            // Instantiate a PDO database connection object
            $this->_dbh = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
            //            echo 'Connected to database!';
        }
        catch (PDOException $e)
        {
            echo $e->getMessage(); # temporary
            echo "<p>Oops! Unable to connect.</p>";
        }
    }

    static function getAllOrders(){
//        //connect to database
//        require_once($_SERVER["DOCUMENT_ROOT"] . '/../config.php');
//
//        //instantiate PDO database connection object
//        try {
//            $dbh = new PDO(DB_DNS, DB_USERNAME, DB_PASSWORD);
//            // echo 'connected to db!';
//        } catch (PDOException $e) {
//            echo $e->getMessage(); //temporary
//        }
        //Initialize Variable
        $orderArray = array();

        //1. Define the query
        $sql = "
        SELECT `Order`.ID, `Order`.TransactionID, `Order`.Category, `Order`.ItemName, `Order`.Quantity, `Transaction`.Date
        FROM `Order`
        JOIN `Transaction` ON `Order`.TransactionID = `Transaction`.ID;";

        //2. Prepare the statement
        $statement = _dbh->prepare($sql);

        //3. Bind the parameters
        //$statement->bindParam(':petid', $petId);

        //4. Execute the query
        $statement->execute();

        //5. Process the results
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);


        if ($statement->rowCount() == 0) {
            echo "<p> No match found</p>";
        }
        else {
            foreach ($results as $result) {
                $category = $result['Category'];
                $item = $result['ItemName'];
                $quantity = $result['Quantity'];
                $date = $result['Date'];

                $orderObject = new Orders($category, $date, DataLayer::getItemPrice($item, $quantity), $item, $quantity);
                $orderArray[] = $orderObject;
            }
        }
        return $orderArray;
    }

    static function getAllTransaction(){
        require_once($_SERVER["DOCUMENT_ROOT"] . '/../config.php');
    }

    function saveOrder($order)
    {
        // INSERT Query **********
        // 1. Define the query
        $sql = "INSERT INTO Order (TransactionID, CATEGORY, ItemName, Quantity) VALUES (:transactionID, :category, :itemName, :quantity)";

        // 2. Prepare the statement
        $statement = $this->$dbh->prepare($sql);

        // 3. Bind the parameters
        $statement->bindValue(':transactionID', $order->getTransactionID());
        $statement->bindValue(':category', $order->getCategory());
        $statement->bindValue(':itemNames', $order->getItemName());
        $statement->bindValue(':quantity', $order->getQuantity());

        // 4. Execute the query
        $statement->execute();
    }
}