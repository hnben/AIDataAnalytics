<?php

/**
 * The Revenue parent class represents a transaction
 * or order that results in generating income
 *
 * @author Huy Nguyen, Tien Nguyen, Will Castillo
 */
class Revenue
{
    private $_date;
    private $_totalAmount;

    /**
     * Constructor instantiates a Revenue object
     * @param string $date date of transaction or order
     * @param float $totalAmount total amount
     */
    public function __construct($date, $totalAmount)
    {
        $this->_date = $date;
        $this->_totalAmount = $totalAmount;
    }

    //*****************
    //     SETTERS
    //*****************

    /**
     * Sets the type of revenue
     * @param string $type type
     * @return void
     */
    public function setType($type)
    {
        $this->_type = $type;
    }

    /**
     * Sets the date
     * @param string $date date
     * @return void
     */
    public function setDate($date)
    {
        $this->_date = $date;
    }

    /**
     * Sets the total amount
     * @param float $totalAmount total amount
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
     * Gets the type of revenue
     * @return string type
     */
    public function getType()
    {
        return $this->_type;
    }

    /**
     * Gets the date
     * @return string date
     */
    public function getDate()
    {
        return $this->_date;
    }

    /**
     * Gets the total amount
     * @return float total amount
     */
    public function getTotalAmount()
    {
        return $this->_totalAmount;
    }
}