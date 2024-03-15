<?php
    /**
     * This class will validate the data that is collected through the
     * form that the user put in.
     *
     * @author Huy Nguyen, Tien Nguyen, Will Castillo
     */
    class Validate {
        /**
         * @param $string String this will let user input a string into the method
         * @return bool this will return a boolean base on the string, if it is a value string, it will
         * return true, else it will return false.
         */
        static function validateString($string) {
            // Check if the input is a string
            if (is_string($string)) {
                // If it's a non-empty string
                if (strlen(trim($string)) > 0) {
                    return true;
                } else {
                    return false;
                }
            } else {
                // If it's not a string
                return false;
            }
        }

        /**
         * @param $number int this parameter will collect the ints that the user input.
         * @return bool this method will return true if $number is an int , and false if $number is not a number.
         */
        static function validateNumber($number) {
            // Check if the input is numeric
            if (is_numeric($number)) {
                // If it's an integer or a float
                return true;
            } else {
                // If it's not a valid number
                return false;
            }
        }

        /**
         * @param $date String the parameter will collect a string of Date that the user inputed.
         * @return bool In the method, there will be a specific pattern that will validate the date, it will
         * return true if the pattern matches the date param, false if it does not match.
         */
        static function validateDate($date) {
            // Check if the input is a string
            if (is_string($date)) {
                // Check if the string matches the yyyy-mm-dd format using regex
                if (preg_match("/^(\d{4})-(\d{2})-(\d{2})$/", $date, $matches)) {
                    // Check if the date is a valid date
                    if (checkdate($matches[2], $matches[3], $matches[1])) {
                        return true;
                    }
                }
            }
            return false;
        }
    }