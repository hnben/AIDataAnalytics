<?php

class Transaction extends Revenue
{
    private $_orderSize; // String

    public function __construct($type, $date, $totalAmount, $orderSize)
    {
        parent::__construct($type, $date, $totalAmount);
        $this->_orderSize = $orderSize;
    }

    //*****************
    //     SETTERS
    //*****************
    public function setOrderSize($orderSize)
    {
        $this->_orderSize = $orderSize;
    }
    //*****************
    //     GETTERS
    //*****************
    public function getOrderSize()
    {
        return $this->_orderSize;
    }
}