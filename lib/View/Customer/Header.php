<?php

class View_Customer_Header extends View{
	function init(){
		parent::init();
		$this->api->template->del('header');
		$this->add('View_MyButton',null,'logout')->set('Exit')->addClass('btn btn-cyan');
		//->set('Exit')->addClass('btn btn-cyan');

	}

	function defaultTemplate(){
		return array('customer/header');
	}
}