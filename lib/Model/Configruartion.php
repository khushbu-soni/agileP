<?php
class Model_Configruartion extends Model_Table{
	public $table="configruation";
	function init(){
		parent::init();

		$this->hasOne('Branch','branch_id');
		$this->addField('no_of_tables')->mandatory(true);
		$this->addField('tax')->mandatory(true);
		$this->addField('hotel_name')->mandatory(true);
		$this->addField('address')->type('text')->mandatory(true);
		$this->addField('contact')->type('int')->mandatory(true);
		$this->addHook('beforeSave',$this);
		$this->addHook('beforeDelete',$this);
		$this->add('dynamic_model/Controller_AutoCreator');
	}

	function beforeSave(){

	}

	function beforeDelete(){
		
	}
}