<?php

class Overhead extends Expenses
{
    private $_category;

    public function __construct($type, $date, $totalAmount, $category)
    {
        parent::__construct($type, $date, $totalAmount);
        $this->_category = $category;
    }

    public function setCategory($category)
    {
        $this->_category = $category;
    }

    public function getCategory()
    {
        return $this->_category;
    }
}