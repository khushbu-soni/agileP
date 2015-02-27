<?php

class page_settable extends Page{
	function init(){
		parent::init();
		$this->api->template->del('logo');
       	$this->api->template->del('Menu');
		
		$cols=$this->add('Columns')->removeClass('atk-row')->addClass('row');
		// $col1=$cols->addColumn(4);
		// $col1->add('View')->set('Welcome')->setStyle('display','block');
		

		$col2=$cols->addColumn(12)->addClass('col-md-12 col-lg-12 col-xs-12 col-sm-12');        
		$frame=$col2->add('Frame')->setStyle(array('margin'=>'0px -13px 0px -15px'));
		$col2->setStyle(array('width'=>'100%','box-shadow'=>'10px 10px 6px gray','border'=>'2px solid skyblue'));
		$frame->add('H3')->set('Set Table');
		$form=$frame->add('Form');
		$config=$this->add('Model_Configruartion');
		$config->load($this->api->recall('branch_id'));
		$no_of_table_array=array();
		for ($i=1; $i <=$config['no_of_tables'] ; $i++) { 
				$no_of_table_array[$i]="Table No ".$i;
		}

		$form->addField('dropdown','table')->setValueList($no_of_table_array)->setEmptyText('Please Select');	   
		$form->addSubmit('Set Table');	
		$frame->add('View')->setHtml('<small style="color:lightgray">System Developed By Hogo Works Solutions Pvt. Ltd.</small>');
		
		if($form->isSubmitted()){
			$table_id=base64_encode($form->get('table'));

			// $this->api->memorize($table_id);
			$form->js()->univ()->redirect($this->api->url('customer',array('table_id'=>$table_id)))->execute();
		}
	}
	 function defaultTemplate(){
    	return array('landing');
    }

}