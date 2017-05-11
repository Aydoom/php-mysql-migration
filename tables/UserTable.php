<?php 

namespace PMMigration\Tables;

class UserTable extends \PMMigration\Core\Table {
	
    public $fields = [];

    public function __construct()
    {
        $this->defId('id', 'primary');
        $this->defVarchars(['name', 'login', 'password']);
        $this->defId('id_user_group');
        $this->defDates(['date_create', 'last_visit']);
    }

}