<?php

class Orders extends Revenue{
    private $_transactionID;
    private $_category;
    private $_item;
    private $_amount; // String

    public function __construct($date, $totalAmount,
                                $transactionID, $category, $item, $amount)
    {
        parent::__construct($date, $totalAmount);
        $this->_transactionID = $transactionID;
        $this->_category = $category;
        $this->_item = $item;
        $this->_amount = $amount;
    }

    //*****************
    //     SETTERS
    //*****************
    public function setItem($item)
    {
        $this->_item = $item;
    }

    public function setAmount($amount)
    {
        $this->_amount = $amount;
    }

    //*****************
    //     GETTERS
    //*****************
    public function getItems()
    {
        return $this->_item;
    }
    public function getAmount()
    {
        return $this->_amount;
    }
    public function getTransactionID()
    {
        return $this->_transactionID;
    }
    public function getCategory(){
        return $this->_category;
    }
    public function getQuantity(){
        return $this->_amount;
    }
}
