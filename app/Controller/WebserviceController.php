<?php
class WebserviceController extends AppController {

	public $name = 'Webservice';
	public $helpers = array('Form', 'Html', 'Js');
	public $paginate = array('limit' =>10);	
	public $uses=array('User','Login');
	public $components = array('Auth', 'Session', 'Core', 'Email');	
	static $errors = array( 
		'invalidEmailPassword' => 'Invalid Email or Password.',
		'emptyEmailPassword' => 'Email & Password should not be empty.',
		'invalidEmail' => 'Invalid Email Address.',
		'loginSuccess' => 'User logged in successfully.'
	);

	function beforeFilter(){
		parent::beforeFilter();
		$this->Auth->allow('get_users', 'login' );
	}

	function get_users() {
		$this->autoRender = false;
		$this->layout = false;
		$users = $this->User->find('all',array('conditions'=>array(
			'User.user_status'=>1,
			'User.user_role_id'=>3
		)));
		echo json_encode($users);
	}

	/*
	* Function for login user
	* @param email varchar NOT NULL
	* @param password varchar NOT NULL
	* @return json array
	*/

	function login(){
		$this->autoRender = false;
		$this->layout = false;
		$isLogin = false;
		
		if(!empty($this->request->data)){
			$email  = $this->request->data['email'];
			$password  = $this->request->data['password'];
			$user_status = 1;
			$user_role_id = 3;
			$this->request->data = array(
				'Login'=>array(
					'email'=>trim($email),
					'password'=>trim($password)
				)
			);
			$this->Login->set($this->request->data);
			
			if(!$this->Login->validates(array('fieldList'=>array('email')))){
				$errors = $this->Login->validationErrors;
				$msg = $errors['email'][0];
				$resData = array();
			}else if(!$this->Login->validates(array('fieldList'=>array('password')))){
				$errors = $this->Login->validationErrors;
				$msg = $errors['password'][0];
				$resData = array();
			}else if($this->Auth->login()){ 
			 	/*--update access logs--*/
			 	$this->User->validation=null;

			 	$arrData = array(
			 		'User'=>array(
			 			'last_login_ip'=>$this->request->clientIp(),
						'last_login_date'=>date('Y-m-d H:i:s')
				));

				$this->User->id=$this->Auth->user('user_id');
				$this->User->save($arrData,false);
				/*--update access logs--*/				
			 			 	 
				$isLogin = true;
				$msg = self::$errors['loginSuccess']; 
				$resData = $this->Auth->user();
			}else{
				$msg = self::$errors['invalidEmailPassword'];
				$resData = array();
			}
		}else{
			$msg = self::$errors['emptyEmailPassword'];
			$resData = array();
		}

		$response = array(
			'isLogin'=>$isLogin,
			'msg'=>$msg,
			'data'=>$resData
		);

		echo json_encode($response);
	}
}
