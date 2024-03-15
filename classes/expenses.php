<?php

/**
 * This class will serve as the expense for business.
 * @author Huy Nguyen, Tien Nguyen, Will Castillo
 */
class Expenses
{
    private $_type;
    private $_date;
    private $_totalAmount;

    /**
     * @param $type input a String of a category
     * @param $date input a String of a date
     * @param $totalAmount input an int of the total amount
     */
    public function __construct($type, $date, $totalAmount)
    {
        $this->_type = $type;
        $this->_date = $date;
        $this->_totalAmount = $totalAmount;
    }

    //********************************
    //     CLASS SPECIFIC METHOD
    //********************************

    //*****************
    //     SETTERS
    //*****************
    /**
     * this method will set the type into the expense object.
     * @param $type input a String of a type of the expense
     * @return void
     */
    public function setType($type)
    {
        $this->_type = $type;
    }

    /**
     * this method will set the date into the expense object.
     * @param $date input a String of date of the expense
     * @return void
     */
    public function setDate($date)
    {
        $this->_date = $date;
    }
    /**
     * this method will set the total amount into the expense object.
     * @param $totalAmount input an int of total amount of the expense
     * @return void
     */
    public function setTotalAmount($totalAmount)
    {
        $this->_totalAmount = $totalAmount;
    }

    //*****************
    //     GETTERS
    //*****************
    /**
     * This method will get the type from the expense object
     * @return String of the type for the expense object
     */
    public function getType()
    {
        return $this->_type;
    }

    /**
     * This method will get the date from the expense object
     * @return String of the date from the expense object
     */
    public function getDate()
    {
        return $this->_date;
    }

    /**
     * This method will get the total amount from the expense object
     * @return int of the total amount from the expense object
     */
    public function getTotalAmount()
    {
        return $this->_totalAmount;
    }
}