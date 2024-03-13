<?php

class Transaction extends Revenue
{
    private $_itemsOrderedArray; // String
    private $_amountOrderedArray; // String

    public function __construct($type, $date, $totalAmount,
        $itemsOrderedArray, $amountOrderedArray)
    {
        parent::__construct($type, $date, $totalAmount);
        $this->_itemsOrderedArray = $itemsOrderedArray;
        $this->_amountOrderedArray = $amountOrderedArray;
    }

    //*****************
    //     SETTERS
    //*****************
    public function setItemsOrderedArray($itemsOrderedArray)
    {
        $this->_itemsOrderedArray = $itemsOrderedArray;
    }

    public function setAmountOrderedArray($amountOrderedArray)
    {
        $this->_amountOrderedArray = $amountOrderedArray;
    }

    //*****************
    //     GETTERS
    //*****************
    public function getItemsOrderedArray()
    {
        return $this->_itemsOrderedArray;
    }
    public function getAmountOrderedArray()
    {
        return $this->_amountOrderedArray;
    }
}