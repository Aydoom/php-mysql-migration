<?php 

namespace PMMigration\Core;

class Table {
	
	public function _id()
	{
		$this->addField('id')
				->type('int')
				->len(11)
				->def('not null')
				->autoincrement()
				->primary_key();
	}
	
	public function _varchars($names)
	{
		foreach($names as $name) {
			$this->_varchar($name);
		}
	}
	
	public function _varchar($name)
	{
		$this->addField('name')
			->type('varchar')
			->len(100)
			->def('not null')
			->compare('utf-8');
	}
	
	
}