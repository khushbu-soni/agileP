<?php

class Model_MenuType extends Model_Table{
	public $table ="menu_types";
	function init(){
		parent::init();
		$this->hasOne('Category','category_id');
		$this->addField('name');
		$this->hasMany('Menu','menu_type_id');
		$this->add('dynamic_model/Controller_AutoCreator');
	}
}