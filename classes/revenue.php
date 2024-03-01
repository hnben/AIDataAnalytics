<?php

class Revenue
{
    private $_type;
    private $_date;
    private $_totalAmount;

    public function __construct($type, $date, $totalAmount)
    {
        $this->_type = $type;
        $this->_date = $date;
        $this->_totalAmount = $totalAmount;
    }

    //********************************
    //     CLASS SPECIFIC METHOD
    //********************************
    public function calcTotal()
    {
        return null;
    }

    //*****************
    //     SETTERS
    //*****************
    public function setType($type)
    {
        $this->_type = $type;
    }

    public function setDate($date)
    {
        $this->_date = $date;
    }
    public function setTotalAmount($totalAmount)
    {
        $this->_totalAmount = $totalAmount;
    }

    //*****************
    //     GETTERS
    //*****************
    public function getType()
    {
        return $this->_type;
    }
    public function getDate()
    {
        return $this->_date;
    }
    public function getTotalAmount()
    {
        return $this->_totalAmount;
    }
}