<?php 

namespace PMMigration\Tables;

class UserTable extends \PMMigration\Core\Table {
	
    public $name = 'user';
    public $fields = [];

    public function __construct($name = false)
    {
        if ($name) {
            $this->name = $name;
        }
        
        $this->defId('id', 'primary');
        $this->defVarchars(['name', 'login', 'password']);
        $this->defId('id_user_group');
        $this->defDates(['date_create', 'last_visit']);
    }

}