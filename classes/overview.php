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
        return $total;
    }

    public function getTransactionNumber()
    {
        return count($this->_arrayOfRevenue);
    }

    public function getAvgTransactionPrice()
    {
        $total = $this->calcNetRevenue();

        //not empty so thus get a total
        if (count($this->_arrayOfRevenue) > 0){
            $avg=$total / count($this->_arrayOfRevenue);
            return number_format($avg, 2);
        }
        else{
            return 0;
        }
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