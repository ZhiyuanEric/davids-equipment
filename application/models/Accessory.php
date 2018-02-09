<?php
/**
Model to access the accessory table
*/
class Category extends CVS_Model {
    
    function __construct() {
        parent::__construct('../items/accessory.csv','id');
    }
}