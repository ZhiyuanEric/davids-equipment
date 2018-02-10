<?php
/**
Model to access the categories table
*/
class Category extends CSV_Model {
    
    function __construct() {
        parent::__construct('../items/category.csv','id');
    }
}