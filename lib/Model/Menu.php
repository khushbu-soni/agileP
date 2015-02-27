<?php

class Model_Menu extends Model_Table{
	public $table="menu";
	function init(){
		parent::init();

		$this->hasOne('MenuType','menu_type_id');
		$this->addField('name');
		$this->addField('calories');
		$this->addField('is_available')->type('boolean')->defaultValue(true);
		$this->addField('is_featured')->type('boolean')->defaultValue(false);
		$this->addField('description')->type('text');
		$this->add('filestore/Field_Image','picture_id');
		$this->add('dynamic_model/Controller_AutoCreator');


	}
}