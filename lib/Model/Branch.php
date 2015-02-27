<?php 
class Model_Branch extends Model_Table{
	public $table='branches';
	function init(){
		parent::init();

		$this->addField('name');
		$this->hasMany('Staff','branch_id');
		$this->hasMany('Customer','branch_id');
		$this->hasMany('AssignTable','branch_id');
		$this->hasMany('Configruation','branch_id');
		$this->hasMany('PaymentTransaction','branch_id');
		$this->addHook('beforeSave',$this);
		$this->addHook('beforeDelete',$this);
		$this->add('dynamic_model/Controller_AutoCreator');
	}

	function beforeSave(){

	}

	function beforeDelete(){
		
	}
		
}