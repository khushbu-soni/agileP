<?php

class Model_Customer extends Model_Table{
	public $table="customers";
	function init(){
		parent::init();
		$this->hasOne('AssignTable','assign_table_id');
		$this->addField('name');
		$this->addField('mobile_no');
		$this->addField('security_key');
		$this->addField('password');
		$this->addField('email');
		$this->addField('create_at')->defaultValue(date('Y-m-d'));
		$this->addHook('beforeSave',$this);
		$this->addHook('beforeDelete',$this);
		$this->hasMany('Order','customer_id');
		$this->hasMany('Payment','customer_id');
		$this->hasMany('PaymentTransaction','payment_transaction_id');
		$this->add('dynamic_model/Controller_AutoCreator');
	}

	function login($name,$key){

		$selected_table=$this->api->recall('table_id');
		$c=$this->add('Model_Customer');
		$c['name']=$name;
		$c['security_key']=$key;
		$c['assign_table_id']=$selected_table;
		$c->save();
		$this->api->memorize('customer_unique_id',$c['id']);
				
		// $customer_model=$this->add('Model_Customer')->load($c['id']);
		// if($customer_model->loaded())
		return $c['id'];

	}

	function beforeSave(){

	}
	function beforeDelete(){
		
	}

}