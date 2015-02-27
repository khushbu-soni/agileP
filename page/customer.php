<?php

class page_customer extends Page{
	function init(){
		parent::init();
		$this->api->template->del('logo');
       	$this->api->template->del('Menu');
		if(isset($_GET['table_id'])){
			$table_id=base64_decode($_GET['table_id']);
			$this->api->memorize('table_id',$table_id);
		}

		// if(!isset($_GET['table_id']))
		// 	$this->js()->univ()->redirect($this->api->url(null,array('show'=>1)))->execute();
			

		$cols=$this->add('Columns');
		$col1=$cols->addColumn(4);
		// $col1->add('View')->set('Welcome')->setStyle('display','block');
		

		$col2=$cols->addColumn(4);        
		$frame=$col2->add('Frame')->setStyle(array('margin-left'=>'450px','margin-top'=>'50px','width'=>'100%','box-shadow'=>'10px 10px 6px gray','border'=>'2px solid skyblue'))->addClass('text-center')->set('Hi I am Second Column');
		$frame->add('H3')->set('Set Table');
		$form=$frame->add('Form');
		$form->addField('line','name')->validateNotNull();		
		$form->addField('line','security_key')->validateNotNull();		
		$form->addSubmit('Save');
	}

	function defaultTemplate(){
		return array('landing');
    
	}
}