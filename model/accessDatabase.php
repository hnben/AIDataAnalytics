<?php
// Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

class AccessDatabase
{
    static function getAllOrders(){
        //connect to database
        require_once($_SERVER["DOCUMENT_ROOT"] . '/../config.php');

        //instantiate PDO database connection object
        try {
            $dbh = new PDO(DB_DNS, DB_USERNAME, DB_PASSWORD);
            // echo 'connected to db!';
        } catch (PDOException $e) {
            echo $e->getMessage(); //temporary
        }
        //Initialize Variable
        $orderArray = array();

        //1. Define the query
        $sql = "
        SELECT `Order`.ID, `Order`.TransactionID, `Order`.Category, `Order`.ItemName, `Order`.Quantity, `Transaction`.Date
        FROM `Order`
        JOIN `Transaction` ON `Order`.TransactionID = `Transaction`.ID;";

        //2. Prepare the statement
        $statement = $dbh->prepare($sql);

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

}