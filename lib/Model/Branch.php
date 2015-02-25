<?php 
class Model_Branch extends Model_Table{
	public $table='branches';
	function init(){
		parent::init();

		$this->addFeld('name')->manadatory('Please Provide Name');
		$this->hasMany('Staff','staff_id');
		$this->hasMany('Customer','customer_id');
		$this->hasMany('AssignTable','assign_table_id');
		$this->hasMany('Configruation','configruation_id');
		$this->hasMany('PaymentTransaction','payment_transaction_id');
		$this->addHook('beforeSave',$this);
		$this->addHook('beforeDelete',$this);
		$this->add('dynamic_model/Controller_AutoCreator');
	}

	function beforeSave(){

	}

	function beforeDelete(){
		
	}
		
}