<?php

class Model_Admin extends Model_Staff{
	function init(){
		parent::init();
		$this->addCondition('role','Super Admin');
	}
} 