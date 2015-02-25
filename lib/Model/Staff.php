<?php

class Model_Staff extends Model_Table{
	public $table='staffs';
	function init(){
		parent::init();

		$this->addField('name')->mandatory('Please Provide Name');
		$this->addField('username')->mandatory('Please Provide Username');
		$this->addField('password')->type('password')->mandatory('Please Provide Password');
		$this->addField('is_active')->type('boolean');
		$this->add('dynamic_model/Controller_AutoCreator');

	}
}