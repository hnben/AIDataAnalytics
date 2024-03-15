<?php

/**
 * The Transaction class represents a specific type of revenue generated
 * through an order transaction. This extends the Revenue class.
 *
 * @author Huy Nguyen, Tien Nguyen, Will Castillo
 */
class Transaction extends Revenue
{
    private $_orderSize;

    /**
     * Constructor instantiates a Transaction object
     * @param string $date date
     * @param float $totalAmount total amount
     * @param int $orderSize total orders
     */
    public function __construct($date, $totalAmount, $orderSize)
    {
        parent::__construct($date, $totalAmount);
        $this->_orderSize = $orderSize;
    }

    //*****************
    //     SETTERS
    //*****************

    /**
     * Sets the order size
     * @param int $orderSize order size
     * @return void
     */
    public function setOrderSize($orderSize)
    {
        $this->_orderSize = $orderSize;
    }
    //*****************
    //     GETTERS
    //*****************

    /**
     * Gets the order size
     * @return int order size
     */
    public function getOrderSize()
    {
        return $this->_orderSize;
    }
}