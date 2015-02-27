<?php

class Model_AssignTable extends Model_Table{
	public $table='asign_table';
	function init(){
		parent::init();
		$this->hasOne('Waiter','waiter_id');
		$this->addField('table_number')->type('int');
		$this->hasMany('Customer','assign_table_id');
		$this->add('dynamic_model/Controller_AutoCreator');

	}
}