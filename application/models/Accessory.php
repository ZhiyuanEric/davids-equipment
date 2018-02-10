<?php
/**
Model to access the accessory table
*/
class Accessory extends CSV_Model {
    
    function __construct() {
        parent::__construct('../items/accessory.csv','id');
    }
}