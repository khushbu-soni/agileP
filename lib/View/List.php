<?php

class View_List extends Lister{
	function init(){
		parent::init();
	}

	function defaultTemplate(){
		return array('view/list');
	}
}