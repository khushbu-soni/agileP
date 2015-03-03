<?php

class View_Customer_FeaturedMenu extends View{
	function init(){
		parent::init();

		$menu=$this->add('Model_Menu');
		$list=$this->add('View_List',null,'list');
		$list->setModel($menu);
	}
	function defaultTemplate(){
		return array('view/slider');
	}
}