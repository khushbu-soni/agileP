<?php

class Model_Order extends Model_Table{
	public $table="orders";
	function init(){
		parent::init();

		$this->hasOne('Customer','customer_id');
		$this->hasOne('Waiter','waiter_id');
		$this->hasOne('AssignTable','table_id');
		$this->hasOne('Status','status_id');
		$this->addField('palced_on')->type('datetime')->defaultValue(date('Y-m-d H:i:s'));
		$this->addField('shift_path')->type('text')->system(true);
		$this->addField('payment_status')->type('boolean')->defaultValue(false)->system(true);
		$this->hasMany('OrderItem','order_id');
		$this->addHook('beforeSave',$this);
		$this->addHook('beforeDelete',$this);
		$this->add('dynamic_model/Controller_AutoCreator');
	}

	function beforeSave(){}

	function beforeDelete(){}

}