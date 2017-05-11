<?php 

namespace PMMigration\Tables;

class UserTable extends \PMMigration\Core\Table {
	
	public $fields = [];
	
	public function __construct()
	{
		$this->_id('id', 'primory');
		$this->_varchars(['name', 'login', 'password']);
		$this->_id('id_user_group');
		$this->_dates(['date_create', 'last_visit']);
	}

}