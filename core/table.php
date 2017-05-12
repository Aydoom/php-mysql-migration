<?php 

namespace PMMigration\Core;

use PMMigration\Core\Fields as Fields;
/**
 * 
 */
class Table {
    
    public $fields = [];
    
    /**
     * 
     * @param type $name
     * @param type $type
     */
    public function addField($name, $type)
    {
        switch(strtolower($type)):
            case "datetime": 
                $field = new Fields\DateTimeField($name);
                break;
            case "int":
                $field = new Fields\IntField($name);
                break;
            case "varchar":
                $field = new Fields\VarcharField($name);
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
        $this->addField($name, "datetime");
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
        $this->addField('id', 'int')
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
        $this->addField($name, 'varchar')
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
            $this->defVarchar($name);
        }
    }
	
	public function getFields()
    {
        return $this->fields;
    }
}