<?php

class Model_Category extends Model_Table{
	public $table="category";
	function init(){
		parent::init();
		$this->addField('name');
		$this->hasMany('Menu','category_id');
		$this->addHook('beforeSave',$this);
		$this->addHook('beforeDelete',$this);
		$this->add('dynamic_model/Controller_AutoCreator');
	}

	function beforeSave(){

	}

	function beforeDelete(){
		
	}
}