<?php
class DataLayer {
    static function getItemPrice($name, $quantity){
        $foodPrices = array(
            'Soda' => 3.50,
            'Lemonade' => 6.00,
            'Mocktail' => 11.00,
            'Alcohol' => 16.00,
            'Nachos' => 8.50,
            'Fries' => 4.50,
            'Garlic Bread' => 9.00,
            'Salad' => 11.00,
            'Taco' => 2.50,
            'Spaghetti' => 17.00,
            'Burger' => 14.00,
            'Pizza' => 21.00,
            'Chicken Tendies' => 12.00,
            'Dumplings' => 8.00,
            'Cheesecake' => 6.00,
            'Ice Cream' => 4.50,
            'Cookie' => 2.50
        );

        return $foodPrices[$name] * $quantity;
    }

    static function getNumberOfTransaction(): int
    {
        $database = new AccessDatabase();
        $transactionArray = $database->getAllTransaction();
        return count($transactionArray);
    }

    static function getAvgTransactionPrice(){
        $total = 0;
        $database = new AccessDatabase();
        $transactionArray = $database->getAllTransaction();

        //if the transaction array is empty
        if (count($transactionArray) > 0) {
            foreach ($transactionArray as $transaction){
                $total += $transaction->getTotalAmount();
            }
            $avg = $total / count($transactionArray);
            return number_format($avg, 2);

        } else {
            return 0;
        }
    }



}
