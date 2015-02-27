<?php

class Model_OrderItem extends Model_Table{
	public $table ='orderitems';
	function init(){
		parent::init();
		$this->hasOne('Menu','menu_id');
		$this->hasOne('Order','order_id');
		$this->addField('qty');
		$this->addField('price');
		$this->addHook('beforeSave',$this);
		$this->addHook('beforeDelete',$this);
		$this->add('dynamic_model/Controller_AutoCreator');
	}

	function beforeSave(){}
	function beforeDelete(){}
}