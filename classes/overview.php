<?php

class Overview
{
    private $_arrayOfExpenses;
    private $_arrayOfRevenue;
    private $_taxRate;

    public function __construct($arrayOfExpenses, $arrayOfRevenue, $taxRate)
    {
        $this->_arrayOfExpenses = $arrayOfExpenses;
        $this->_arrayOfRevenue = $arrayOfRevenue;
        $this->_taxRate = $taxRate;
    }

    //********************************
    //     CLASS SPECIFIC METHODS
    //********************************

    public function calcNet()
    {
        $revenueTotal = $this->calcRevenue();
        $expenseTotal = $this->calcExpenses();
        $net = $revenueTotal - $expenseTotal;
        return number_format($net, 2);
    }

    public function calcExpenses()
    {
        $total = 0;
        //checks if the array is empty
        if (!empty($this->_arrayOfExpenses)){
            foreach ($this->_arrayOfExpenses as $expense){
                $total += $expense->getTotalAmount();
            }
        }else{
            return 0;
        }
        return $total;
    }

    public function calcRevenue()
    {
        $total = 0;
        //checks if the array is empty
        if (!empty($this->_arrayOfRevenue)){
            foreach ($this->_arrayOfRevenue as $revenue){
                $total += $revenue->getTotalAmount();
            }
        }else{
            return 0;
        }

        return sprintf('%.2f', $total);
    }

    public function getTransactionNumber()
    {
        return count($this->_arrayOfRevenue);
    }

    public function getAvgTransactionPrice()
    {
        $total = $this->calcRevenue();

        //not empty so thus get a total
        if (count($this->_arrayOfRevenue) > 0){
            $avg=$total / count($this->_arrayOfRevenue);
            return number_format($avg, 2);
        }
        else{
            return 0;
        }
    }

    function getRevenueBreakdown($type){
        $database = new AccessDatabase();
        $orderArray = $database->getAllOrders();

        $drinkTotal = 0;
        $appTotal = 0;
        $dessertTotal = 0;
        $entreeTotal = 0;

        foreach ($orderArray as $order){
            $orderType = $order->getCategory();

            //does the drink calculation
            if ($orderType == "Drink"){
                $drinkTotal += $order->getTotalAmount();
            }
            elseif ($orderType == "Appetizer"){
                $appTotal += $order->getTotalAmount();
            }
            elseif ($orderType == "Dessert"){
                $dessertTotal += $order->getTotalAmount();
            }
            elseif ($orderType == "Entree"){
                $entreeTotal += $order->getTotalAmount();
            }
        }

        if ($type == "Drink"){
            return number_format($dessertTotal, 2);
        }
        elseif ($type == "Appetizer"){
            return number_format($appTotal, 2);
        }
        elseif ($type == "Dessert"){
            return number_format($dessertTotal, 2);
        }
        elseif ($type == "Entree"){
            return number_format($entreeTotal, 2);
        }

        //if type isn't found
        return -1;
    }

    function getExpenseBreakdown($type){
        $overheadTotal = 0;
        $laborTotal = 0;
        $materialTotal = 0;

        foreach ($this->_arrayOfExpenses as $expense){
            $expenseType = $expense->getType();

            if ($expenseType == "Overhead"){
                $overheadTotal += $expense->getTotalAmount();
            }
            elseif($expenseType == "Labor"){
                $laborTotal += $expense->getTotalAmount();
            }
            elseif($expenseType == "Material"){
                $materialTotal += $expense->getTotalAmount();
            }
        }

        if ($type == "Overhead"){
            return number_format($overheadTotal, 2);
        }
        elseif ($type == "Labor"){
            return number_format($laborTotal, 2);
        }
        elseif($type == "Material"){
            return number_format($materialTotal, 2);
        }

        return -1;
    }

    //*****************
    //     SETTERS
    //*****************
    public function setArrayOfExpenses($arrayOfExpenses)
    {
        $this->_arrayOfExpenses = $arrayOfExpenses;
    }

    public function setArrayOfRevenue($arrayOfRevenue)
    {
        $this->_arrayOfRevenue = $arrayOfRevenue;
    }

    public function setTaxRate($taxRate)
    {
        $this->_taxRate = $taxRate;
    }

    //*****************
    //     GETTERS
    //*****************
    public function getArrayOfExpenses()
    {
        return $this->_arrayOfExpenses;
    }
    public function getArrayOfRevenue()
    {
        return $this->_arrayOfRevenue;
    }
    public function getTaxRate()
    {
        return $this->_taxRate;
    }
}