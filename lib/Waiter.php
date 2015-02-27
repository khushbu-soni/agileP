<?php 

class Model_Waiter extends Model_Staff{
	function init(){
		parent::init();

		$this->addCondition('role','Waiter');

	}
}