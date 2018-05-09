<?php
class CommonController extends AppController {

	public $name = 'Common';
	public $helpers = array('Form', 'Html', 'Js');
	public $paginate = array('limit' =>10);	
	public $uses=array('Condition');
	public $components=array('Core');	
	
	function beforeFilter(){
		parent::beforeFilter();
		$this->Auth->allow(array('get_conditions','get_sub_conditions'));
	}
	
	function get_conditions(){
		$this->layout = FALSE;
		$conditions = $this->Core->getContionByCondition();
		$this->set('Conditions',$conditions);
	}
	
	function get_sub_conditions($status = ''){
		$this->layout = FALSE;
		if(!empty($this->request->data)){
			$startWith = trim($this->request->data['start_with']);
		}
		$subconditions = $this->Core->getSubContionByCondition('',$startWith,$status);
		$this->set('Subconditions',$subconditions);
	}
		
}
