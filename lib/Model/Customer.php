<?php

class Model_Customer extends Model_Table{
	public $table="customers";
	function init(){
		parent::init();
		$this->hasOne('AssignTable','assign_table_id');
		$this->addField('name');
		$this->addField('mobile_no');
		$this->addField('secure_key');
		$this->addField('password');
		$this->addField('email');
		$this->addHook('beforeSave',$this);
		$this->addHook('beforeDelete',$this);
		$this->hasMany('Order','customer_id');
		$this->hasMany('Payment','customer_id');
		$this->hasMany('PaymentTransaction','payment_transaction_id');
		$this->add('dynamic_model/Controller_AutoCreator');
	}

	function beforeSave(){

	}
	function beforeDelete(){
		
	}

}