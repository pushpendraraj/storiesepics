<?php
class WebserviceController extends AppController {

	public $name = 'Webservice';
	public $helpers = array('Form', 'Html', 'Js');
	public $paginate = array('limit' =>10);	
	public $uses=array('User');
	
	function beforeFilter(){
		parent::beforeFilter();
		$this->Auth->allow('get_users');
	}

	function get_users() {
		$this->autoRender = false;
		$this->layout = false;
		$users = $this->User->find('all',array('conditions'=>array(
			'User.user_status'=>1
		)));
		echo json_encode($users);
	}
}
