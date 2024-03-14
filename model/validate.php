<?php
    class Validate {
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