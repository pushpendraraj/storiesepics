<?php
class PractionersController extends AppController {

	public $name = 'Practioners';
	public $helpers = array('Form', 'Html', 'Js');
	public $paginate = array('limit' =>10);	
	public $uses=array('User','UserRole','Country','ContactInformation');
	public $components = array('Core');
	
	function beforeFilter(){
		parent::beforeFilter();
		$userRoleId=$this->Auth->user('user_role_id');
		$this->Auth->allow('get_practioners','getPractitionerAvailibityAndContactInfo');
	}

	function get_practioners(){
		$this->layout  = FALSE;
		if(!empty($this->request->data)){
			$conditionId = $this->request->data['condition_id'];
			$subConditions = $this->Core->getSubContionByCondition($conditionId);
			$conditions = array(
				'UserSkill.sub_condition_ids'=>array_keys($subConditions),
			);
			$joins = array(
				array(
					'table'=>'user_skills',
					'alias'=>'UserSkill',
					'type'=>'INNER',
					'conditions'=>'UserSkill.user_id = User.user_id'
				)
			);
			$fields = array('User.user_id','User.first_name','User.last_name','User.profile_pic');
			$this->User->unbindModel(array('belongsTo'=>array('UserRole','Country')));
			$users = $this->User->find('all',array('conditions'=>$conditions,'joins'=>$joins,'fields'=>$fields));	
			$this->set('users',$users);
		}
	}
	
	function getPractitionerAvailibityAndContactInfo(){
		$this->autoRender = $this->layout = FALSE;
		$response = array();
		if(!empty($this->request->data)){
			$userId = $this->request->data['user_id'];
			$response = $this->Core->getPractitionerAvailibityAndContactInfo($userId);
			if(!empty($response)){
				echo json_encode($response);
			}
		}
	}
	
}
