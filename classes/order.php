<?php

/**
 * The Orders class represents an order from a restaurant.
 * This extends the Revenue class.
 *
 * @author Huy Nguyen, Tien Nguyen, Will Castillo
 */
class Orders extends Revenue{
    private $_transactionID;
    private $_category;
    private $_item;
    private $_amount;

    /**
     * Constructor instantiates an Orders object
     * @param date $date date of order
     * @param int $totalAmount total amount for order
     * @param int $transactionID identification number for transaction
     * @param string $category category of food
     * @param string $item food item
     * @param int $amount quantity of food
     */
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

    /**
     * Set the item
     * @param string $item item
     * @return void
     */
    public function setItem($item)
    {
        $this->_item = $item;
    }

    /**
     * Set the quantity
     * @param float $amount quantity
     * @return void
     */
    public function setAmount($amount)
    {
        $this->_amount = $amount;
    }

    //*****************
    //     GETTERS
    //*****************

    /**
     * Get the items
     * @return string food item
     */
    public function getItems()
    {
        return $this->_item;
    }

    /**
     * Get the quantity
     * @return int quantity
     */
    public function getAmount()
    {
        return $this->_amount;
    }

    /**
     * Get the transactionID
     * @return int identification number for transaction
     */
    public function getTransactionID()
    {
        return $this->_transactionID;
    }

    /**
     * Get the category
     * @return string category of food
     */
    public function getCategory(){
        return $this->_category;
    }


}
