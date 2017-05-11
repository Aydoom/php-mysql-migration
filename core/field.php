<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace PMMigration\Core;

/**
 * Description of Field
 *
 * @author Aydoom
 */
class Field {
    //put your code here
    
    public $len = 32;
    
    public $def = "null";
    
    public $autoincrement = false;
    
    public $primary = false;
    
    /**
     * 
     * @return $this
     */
    public function autoincrement()
    {
        $this->autoincrement = true;
        
        return $this;
    }
    
    public function get()
    {
        
    }
    
    /**
     * 
     * @param type $value
     * @return $this
     */
    public function def($value = "null")
    {
        $this->def = $value;
        
        return $this;
    }

    /**
     * The function is setting the length of field
     * 
     * @param type $count
     * @return $this
     */
    public function len($count)
    {
        if (is_numeric($count)) {
            $this->len = $count;
        }
        
        return $this;
    }
    
    /**
     * 
     * @return $this
     */
    public function primary()
    {
        $this->primary = true;
        
        return $this;
    }
}
