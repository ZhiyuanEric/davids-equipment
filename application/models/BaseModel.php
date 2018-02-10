<?php

/**
This is the base model class for other models to inherit from.
Contains only one method getID which is the common attribute for 
categories, accessories, and equipment sets.

@author David Liu
*/
class BaseModel extends CI_Model {

    function __construct() {
        parent::__construct();
    }
    
    function getItemByID();
}