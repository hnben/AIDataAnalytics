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

    public function calcNet($lastNumberOfDays)
    {
        return 1.0;
    }

    public function calcExpenses($lastNumberOfDays)
    {
        return 1.0;
    }

    public function calcNetRevenue($lastNumberOfDays)
    {
        return 1.0;
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