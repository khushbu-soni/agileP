<?php

class Model_Staff extends Model_Table{
	public $table='staffs';
	function init(){
		parent::init();

		$this->hasOne('Branch','branch_id');
		$this->addField('name')->mandatory('Please Provide Name');
		$this->addField('username')->mandatory('Please Provide Username');
		$this->addField('password')->type('password')->mandatory('Please Provide Password');
		$this->addField('is_active')->type('boolean');
		$this->addField('role')->enum(array('Manager','Super Admin','Waiter','Kitchen Manager'));
		$this->addHook('beforeSave',$this);
		$this->addHook('beforeDelete',$this);
		$this->add('dynamic_model/Controller_AutoCreator');

	}

	function beforeSave(){

	}

	function beforeDelete(){

	}
}