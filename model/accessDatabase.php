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
            //connect to database
            require_once ($_SERVER["DOCUMENT_ROOT"].'/../config.php');
            $this->_dbh = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
            //            echo 'Connected to database!';
        }
        catch (PDOException $e)
        {
            echo $e->getMessage(); # temporaryyeah
            echo "<p>Oops! Unable to connect.</p>";
        }
    }

    function getAllOrders() :array
    {
        //Initialize Variable
        $orderArray = array();

        //1. Define the query
        $sql = "
        SELECT `Order`.ID, `Order`.TransactionID, `Order`.Category, `Order`.ItemName, `Order`.Quantity, `Transaction`.Date
        FROM `Order`
        JOIN `Transaction` ON `Order`.TransactionID = `Transaction`.ID;";

        //2. Prepare the statement
        $statement = $this->_dbh->prepare($sql);

        //3. Bind the parameters
        //$statement->bindParam();

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
                $transactionID = $result['TransactionID'];

                $orderObject = new Orders($date, DataLayer::getItemPrice($item, $quantity)
                    ,$transactionID, $category, $item, $quantity);
                $orderArray[] = $orderObject;
            }
        }
        return $orderArray;
    }

    private function updateTransaction(){
        //update transaction table
        $sql ="
        UPDATE Transaction AS t
        SET t.TotalAmount = (
        SELECT SUM(Quantity * CASE
        WHEN ItemName = 'Soda' THEN 3.50
        WHEN ItemName = 'Lemonade' THEN 6.00
        WHEN ItemName = 'Mocktail' THEN 11.00
        WHEN ItemName = 'Alcohol' THEN 16.00
        WHEN ItemName = 'Nachos' THEN 8.50
        WHEN ItemName = 'Fries' THEN 4.50
        WHEN ItemName = 'Garlic Bread' THEN 9.00
        WHEN ItemName = 'Salad' THEN 11.00
        WHEN ItemName = 'Taco' THEN 2.50
        WHEN ItemName = 'Spaghetti' THEN 17.00
        WHEN ItemName = 'Burger' THEN 14.00
        WHEN ItemName = 'Pizza' THEN 21.00
        WHEN ItemName = 'Chicken Tendies' THEN 12.00
        WHEN ItemName = 'Dumplings' THEN 8.00
        WHEN ItemName = 'Cheesecake' THEN 6.00
        WHEN ItemName = 'Ice Cream' THEN 4.50
        WHEN ItemName = 'Cookie' THEN 2.50
        END) AS TotalCost
        FROM `Order`
        WHERE TransactionID = t.ID
        GROUP BY TransactionID
);        ";

        $statement = $this->_dbh->prepare($sql);
        $statement->execute();

        //update the orderSize of the Transaction table
        $sql = "
        UPDATE `Transaction` AS t
        JOIN (
        SELECT `TransactionID`, SUM(`Quantity`) AS TotalQuantity
        FROM `Order`
        GROUP BY `TransactionID`
        ) AS o ON t.ID = o.TransactionID
        SET t.OrderSize = o.TotalQuantity
        ";
        $statement = $this->_dbh->prepare($sql);
        $statement->execute();
    }

    function getAllTransaction(): array
    {
        //update Transaction Table
        $this->updateTransaction();

        //getting stuff from the transaction table

        $transactionArray = array();

        //set up sql query
        $sql = "SELECT * FROM `Transaction` GROUP BY ID";

        //prepare the statement
        $statement = $this->_dbh->prepare($sql);

        //execute the query
        $statement->execute();

        //do stuff with the results
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);

        if ($statement->rowCount() == 0) {
            echo "<p> No match found</p>";
        }
        else{
            foreach ($results as $result){
                $totalAmount = $result['TotalAmount'];
                $date = $result['Date'];
                $orderSize = $result['OrderSize'];

                $transactionObject = new Transaction($date, $totalAmount, $orderSize );
                $transactionArray[] = $transactionObject;
            }
        }
        return $transactionArray;
    }

    function getAllExpense(): array
    {
        $expenseArray = array();

        //set up sql query
        $sql = "SELECT * FROM `Expense` ";

        //prepare the statement
        $statement = $this->_dbh->prepare($sql);

        //execute the statement
        $statement->execute();

        //do stuff with the results
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);

        if ($statement->rowCount() == 0) {
            echo "<p> No match found</p>";
        }
        else{
            foreach ($results as $result){
                $totalAmount = $result['TotalAmount'];
                $type = $result['Type'];
                $date = $result['Date'];

                $expenseObject = new Expenses($type, $date, $totalAmount);
                $expenseArray[] = $expenseObject;
            }
        }
        return $expenseArray;
    }

    function saveOrder($order) : void
    {
        // INSERT Query **********
        // 1. Define the query
        $sql = "INSERT INTO Order (TransactionID, CATEGORY, ItemName, Quantity) VALUES (:transactionID, :category, :itemName, :quantity)";

        // 2. Prepare the statement
        $statement = $this->_dbh->prepare($sql);

        // 3. Bind the parameters
        $statement->bindValue(':transactionID', $order->getTransactionID());
        $statement->bindValue(':category', $order->getCategory());
        $statement->bindValue(':itemNames', $order->getItemName());
        $statement->bindValue(':quantity', $order->getQuantity());

        // 4. Execute the query
        $statement->execute();
    }

        function saveExpense($expense){

        //1. Define the query
        $sql = "INSERT INTO `Expense`( `TotalAmount`, `Type`, `Date`) VALUES (:totalAmount,:type,:date)";

        //2. prepare the statement
        $statement = $this->_dbh->prepare($sql);

        //3. bind the parameters
        $statement->bindValue(':totalAmount', $expense->getTotalAmount());
        $statement->bindValue(':type', $expense->getType());
        $statement->bindValue(':date', $expense->getDate());

        // 4. Execute the query
        $statement->execute();
    }
}