<?php

/**
 * The Overview class contains information that calculates
 * the data and returns the information to display on the
 * Overview page.
 *
 * @author Huy Nguyen, Tien Nguyen, Will Castillo
 */
class Overview
{
    private $_arrayOfExpenses;
    private $_arrayOfRevenue;
    private $_taxRate;

    /**
     * Constructor instantiates an Overview object
     * @param int $arrayOfExpenses all expenses numbers
     * @param int $arrayOfRevenue all revenue numbers
     * @param float $taxRate tax rate
     */
    public function __construct($arrayOfExpenses, $arrayOfRevenue, $taxRate)
    {
        $this->_arrayOfExpenses = $arrayOfExpenses;
        $this->_arrayOfRevenue = $arrayOfRevenue;
        $this->_taxRate = $taxRate;
    }

    //********************************
    //     CLASS SPECIFIC METHODS
    //********************************

    /**
     * Calculates the Net Total to display on page
     * @return string net total
     */
    public function calcNet()
    {
        $revenueTotal = $this->calcRevenue();
        $expenseTotal = $this->calcExpenses();
        $net = $revenueTotal - $expenseTotal;
        return number_format($net, 2);
    }

    /**
     * Calculates the Expenses to display on page
     * @return int expenses total
     */
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

    /**
     * Calculates the Revenue to display on page
     * @return int|string total formatted with 2 decimal places
     */
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

    /**
     * Get transaction count
     * @return int number of transactions
     */
    public function getTransactionNumber()
    {
        return count($this->_arrayOfRevenue);
    }

    /**
     * Calculate the average transaction price
     * @return int|string total amount with 2 decimals
     */
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

    /**
     * Calculates totals for all order types
     * @param string $type drink, appetizer, dessert, entree
     * @return int|string total amount
     */
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

    /**
     * Calculates totals for all expenses
     * @param string $type overhead, labor, and material
     * @return int|string total amount
     */
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

    /**
     * Sets the array of expenses
     * @param float $arrayOfExpenses all expenses
     * @return void
     */
    public function setArrayOfExpenses($arrayOfExpenses)
    {
        $this->_arrayOfExpenses = $arrayOfExpenses;
    }

    /**
     * Sets the array of revenue
     * @param float $arrayOfRevenue all revenue
     * @return void
     */
    public function setArrayOfRevenue($arrayOfRevenue)
    {
        $this->_arrayOfRevenue = $arrayOfRevenue;
    }

    /**
     * Sets the tax rate
     * @param float $taxRate tax rate
     * @return void
     */
    public function setTaxRate($taxRate)
    {
        $this->_taxRate = $taxRate;
    }

    //*****************
    //     GETTERS
    //*****************

    /**
     * Gets the array of expenses
     * @return int array of expenses
     */
    public function getArrayOfExpenses()
    {
        return $this->_arrayOfExpenses;
    }

    /**
     * Gets the array of revenue
     * @return int array of revenue
     */
    public function getArrayOfRevenue()
    {
        return $this->_arrayOfRevenue;
    }

    /**
     * Gets the tax rate
     * @return float tax rate
     */
    public function getTaxRate()
    {
        return $this->_taxRate;
    }
}