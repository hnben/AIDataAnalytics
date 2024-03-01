<?php

class EmployeeExpenses extends Expenses
{
    private $_name;
    private $_hours;
    private $_hourlyRate;

    public function __construct($type, $date, $totalAmount,
    $name, $hours, $hourlyRate)
    {
        parent::__construct($type, $date, $totalAmount);
        $this->_name = $name;
        $this->_hours = $hours;
        $this->_hourlyRate = $hourlyRate;
    }

    //*****************
    //     SETTERS
    //*****************
    public function setName($name)
    {
        $this->_name = $name;
    }

    public function setHours($hours)
    {
        $this->_hours = $hours;
    }

    public function setHourlyRate($hourlyRate)
    {
        $this->_hourlyRate = $hourlyRate;
    }

    //*****************
    //     GETTERS
    //*****************
    public function getName()
    {
        return $this->_name;
    }

    public function getHours()
    {
        return $this->_hours;
    }

    public function getHourlyRate()
    {
        return $this->_hourlyRate;
    }
}