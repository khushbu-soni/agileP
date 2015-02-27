<?php

class Model_KitchenManager extends Model_Staff{
	function init(){
		parent::init();
		
		$this->addCondtion('role','Kitchen Manager');

	}
}