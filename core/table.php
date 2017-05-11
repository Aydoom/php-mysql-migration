<?php 

namespace PMMigration\Core;

use PMMigration\Core\Fields as Field;
/**
 * 
 */
class Table {
    
    public $fields = [];
    
    /**
     * 
     * @param type $name
     */
    public function addField($name)
    {
        switch($name):
            case "datetime": 
                $field = new DateTimeField($name);
                break;
            case "int":
                $field = new IntField($name);
                break;
        endswitch;
        
        $this->fields[$name] = $field;
        
        return $this->fields[$name];
    }
    
    /**
     * 
     * @param type $name
     */
    public function defDate($name)
    {
        $this->addField($name)
                ->type("datetime");
    }
    
    /**
     * 
     * @param type $names
     */
    public function defDates($names)
    {
        foreach ($names as $name) {
            $this->defDate($name);
        }
    }
    
    /**
     * 
     */
    public function defId()
    {
        $this->addField('id')
                ->type('int')
                ->len(11)
                ->def('not null')
                ->autoincrement()
                ->primary_key();
    }

    /**
     * 
     * @param type $name
     */
    public function defVarchar($name)
    {
        $this->addField($name)
                ->type('varchar')
                ->len(100)
                ->def('not null')
                ->compare('utf-8');
    }

    /**
     * 
     * @param type $names
     */
    public function defVarchars($names)
    {
        foreach($names as $name) {
            $this->_varchar($name);
        }
    }
	
	
}