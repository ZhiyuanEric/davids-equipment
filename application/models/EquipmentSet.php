<?php
/**
Model to access the equipment set table
*/
class Category extends CVS_Model {
    
    function __construct() {
        parent::__construct('../items/equipmentPresets.csv','id');
    }
}