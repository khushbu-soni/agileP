<?php 

class page_customer_dashboard extends Page{
	function init(){
		parent::init();
	 	$this->api->template->del('logo');
       	$this->api->template->del('Menu');
       	$c=$this->add('Model_Customer');
       	if(isset($_GET['customer_id'])){
       		$id=base64_decode($_GET['customer_id']);
       		$c->tryLoad($id);
       	}
       	if($c->loaded()){
       		if($c['id']!=$this->api->recall('customer_unique_id'))
	       		$this->api->js(null,$this->js()->univ()->errorMessage('Something is wrong Login again'))->univ()->redirect($this->api->url('customer'))->execute();
       	}
       	if(!$c->loaded())
	       		$this->js(true,$this->js()->univ()->errorMessage('Something is wrong Login again'))->univ()->redirect($this->api->url('customer'));//->execute();
       		
          $this->add('View_Customer_Header',null,'header1');
          $menu=$this->add('Model_Menu');
          $featured_menu=$this->add('View_Customer_FeaturedMenu',null,'first_block');
          $featured_menu->setModel($menu);
       		

	}

	function defaultTemplate(){
    	return array('customer/dashboard');
    }
}