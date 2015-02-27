<?php 

class Model_Manager extends Model_Staff{
	function init(){
		parent::init();

		$this->addCondition('role','Manager');
	}
}