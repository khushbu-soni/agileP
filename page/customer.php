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
		

		$col2=$cols->addColumn(12);        
		$frame=$col2->add('Frame')->setStyle(array('width'=>'100%','box-shadow'=>'10px 10px 6px gray','border'=>'2px solid skyblue'))->addClass('text-center')->set('Hi I am Second Column');
		$frame->add('H3')->setHtml('<p style="color:red;font-family:Comic Sans MS;">Welcome To Restaurant</p>');
		
		$frame->add('H5')->setHtml('<small style="color:orange;padding-top:15px;">Please Provide your name with secuirty key</small>');
		$frame->add('HR');//->set('Set Table');
		$form=$frame->add('Form');
		$form->addField('line','name')->validateNotNull();		
		$field_key=$form->addField('line','calculator','Security Key')->validateNotNull()->addClass('calculator');		
		// $frame->add('HR');//->set('Set Table');
		// $form->addSubmit('Save');
		$submit_btn=$frame->add('View_MyButton')->set('Save')->addClass('btn btn-info');
		$call_waiter=$frame->add('View_MyButton')->set('Call Waiter')->addClass('btn btn-danger');
		$submit_btn->js('click',$form->js()->submit());
		if($form->isSubmitted()){
			// throw new Exception("Error Processing Request ".$form->get('calculator'), 1);
			
			$this->api->memorize('customer_name',$form->get('name'));
			$this->api->memorize('key',$form->get('calculator'));
			$c=$this->add('Model_Customer');
			if($customer_id=$c->login($form->get('name'),$form->get('calculator'))){
					$customer_id=base64_encode($customer_id);
					$form->js()->univ()->redirect($this->api->url('customer_dashboard',array('customer_id'=>$customer_id)))->execute();
			}
			

		}		

	}

	function defaultTemplate(){
		return array('landing');
    
	}
}