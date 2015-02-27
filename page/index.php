<?php
class page_index extends Page {
    function init(){
        parent::init();
       	$this->api->template->del('logo');
       	$this->api->template->del('Menu');
       	$v=$this->add('View');

		if($_GET['branch_id']){
			$this->api->memorize('branch_id',$_GET['branch_id']);
		}
		$cols=$this->add('Columns')->removeClass('atk-row')->addClass('row');
		// $col1=$cols->addColumn(4);
		// $col1->add('View')->setHtml('&nbsp;');
		

		$col2=$cols->addColumn(12)->addClass('col-md-12 col-lg-12 col-xs-12 col-sm-12');        
		$frame_branch=$col2->add('Frame')->setStyle(array('margin'=>'0px -13px 0px -15px'));
		$col2->setStyle(array('width'=>'75%','box-shadow'=>'10px 10px 6px gray','border'=>'2px solid skyblue'))->addClass('text-center')->set('Hi I am Second Column');
		$frame_branch->add('View')->setHtml('<p style="color:red;font-family:Comic Sans MS;font-size: 1.5em;">First Setup Branch</p>');
		$form=$frame_branch->add('Form');
		$branch_field=$form->addField('dropdown','branch')->setEmptyText('Please Select');
		$branch_field->setModel('Branch');
		// $form->add('View_MyButton')->set('Set Branch')->addClass('btn btn-info');
		$form->addSubmit('Set Branch');



		$col2->setStyle(array('width'=>'75%','box-shadow'=>'10px 10px 6px gray','border'=>'2px solid skyblue'))->addClass('text-center')->set('Hi I am Second Column');
		$frame=$col2->add('Frame')->setStyle(array('margin'=>'0px -13px 0px -15px'));
		$frame->add('P')->set('Welcome to HOGO. HOGO is exactly what you need to make your restaurant more efficient.');
		$frame->add('H5')->set('Please pick a section!');
		$f_cols=$frame->add('Columns')->removeClass('atk-row')->addClass('row');
		$f_col1=$f_cols->addColumn(6)->addClass('col-md-6 col-lg-6 col-xs-6 col-sm-6');
		$f_col2=$f_cols->addColumn(6)->addClass('col-md-6 col-lg-6 col-xs-6 col-sm-6');

		$m_view=$f_col1->add('View_ManagerButton')->addClass('btn btn-pink btn-lg');
		$m_view->add('HtmlElement')->setElement('img')->setAttr('src','./templates/img/manager.png');
		$m_view->add('H5')->set('Manager');
		
		$w_view=$f_col2->add('View_WaiterButton')->addClass('btn btn-golden btn-lg');
		$w_view->add('HtmlElement')->setElement('img')->setAttr('src','./templates/img/waiter.png');
		$w_view->add('H5')->set('Waiter');

		$k_view=$f_col1->add('View_KitchenButton')->addClass('btn btn-cyan btn-lg');
		$k_view->add('HtmlElement')->setElement('img')->setAttr('src','./templates/img/kitchen.png');
		$k_view->add('H5')->set('Kitchen');

		$c_view=$f_col2->add('View_CustomerButton')->addClass('btn btn-skyblue btn-lg');
		$c_view->add('HtmlElement')->setElement('img')->setAttr('src','./templates/img/user.png');
		$c_view->add('H5')->set('Customer');
		$frame->add('View')->setHtml('<small style="color:lightgray">System Developed By Hogo Works Solutions Pvt. Ltd.</small>');
		// $col3=$cols->addColumn(4);        
		$frame->js(true)->hide();
		$change=$frame->add('View');//->addClass('text-center');

		if($this->api->recall('branch_id')){
	   		$frame_branch->js(true)->hide();
	   		$frame->js(true)->show();
	   		$change_btn=$change->add('View_MyButton')->set('Change Branch')->addClass('btn btn-danger');
    		// if($change->isClicked())
    		// 	$this->api->forget('branch_id');
    		$change_btn->js('click',array($frame_branch->js()->show(),$frame->js()->hide()));
    	}
    		//test 

    		
   		if($form->isSubmitted()){
   			// throw new Exception("Error Processing Request".$form->get('branch'), 1);
   			
   			// $form->js(null,array($frame_branch->js()->toggle(),$frame->js()->toggle()))->reload(array('brach_id'=>$form->get('branch')))->execute();
   			$form->js(null,array($frame->js()->toggle(),$frame_branch->js()->toggle(),
   								$v->js()->reload(array('branch_id'=>$form->get('branch')))								
   								))->execute();
   		}

		if($c_view->isClicked())
			$c_view->js('click',$this->js()->univ()->redirect($this->api->url('settable')))->execute();
    }

    function defaultTemplate(){
    	return array('landing');
    }
}
