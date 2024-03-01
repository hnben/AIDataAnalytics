<?php

class Transaction extends Revenue
{
    private $_itemsOrderedArray; // array
    private $_amountOrderedArray; // array

    public function __construct($itemsOrderedArray, $amountOrderedArray)
    {
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