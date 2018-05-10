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
		'emptyUser' => 'User info should not be empty.',
		'invalidEmail' => 'Invalid Email Address.',
		'loginSuccess' => 'User logged in successfully.',
		'logoutSuccess' => 'User logged out successfully.',
		'registerSuccess' => 'User added successfully.',
		'registerFail' => 'User not added.',
		'updateSuccess' => 'Profile updated successfully.',
		'updateFail' => 'Profile not updated.',
		'profileImgUpdateSuccess' => 'Image updated successfully.',
		'profileImgUpdateFail' => 'Image not updated.',
		'listFound' => 'Record found.',
		'listNotFound' => 'Record not found.'
	);

	function beforeFilter(){
		$this->autoRender = false;
		$this->layout = false;
		parent::beforeFilter();
		$this->Auth->allow('login', 'logout', 'register');
	}

	/*
	* Function for list users
	* @return json array
	*/

	function get_users() {
		$foundRecord = false;
		$users = array();

		$users = $this->User->find('all',array('conditions'=>array(
			'User.user_status'=>1,
			'User.user_role_id'=>3
		)));

		if(!empty($users)){
			$msg = self::$errors['listFound'];
			$foundRecord = true;
		}else{
			$msg = self::$errors['listNotFound'];
		}

		$response = array(
			'isSuccess'=>$foundRecord,
			'msg'=>$msg,
			'data'=>$users
		);

		echo json_encode($response);
	}

	/*
	* Function for login user
	* @param email varchar NOT NULL
	* @param password varchar NOT NULL
	* @return json array
	*/

	function login(){
		$isLogin = false;
		
		if(!empty($this->request->data) && $this->request->is('post')){
			$this->request->data = array(
				'Login'=>$this->request->data
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
			'isSuccess'=>$isLogin,
			'msg'=>$msg,
			'data'=>$resData
		);

		echo json_encode($response);
	}

	/*
	* Function for register a user
	* @param full_name Varchar NOT NULL
	* @param email Varchar NOT NULL
	* @param password Varchar NOT NULL
	* @param phone Varchar NULL
	* @param location Varchar NULL
	* @param job_title Varchar NULL
	* @param company Varchar NULL
	* @param industries Varchar NULL
	* @param website Varchar NULL
	* @param user_status Varchar NOT NULL // 0/1
	* @param user_description Varchar NULL
	* @param user_note Varchar NULL
	* @param term_and_condition Varchar NOT NULL // 0/1
	* @return json array
	*/

	function register(){
		$isRegister = false;
		$msg = '';
		$resData = array();

		if (!empty($this->request->data) && $this->request->is('post')) {
			$this->request->data = array(
				'User'=>$this->request->data
			);

			$this->User->set($this->request->data);
			if(!$this->User->validates(array('fieldList'=>array('full_name')))){
				$errors = $this->User->validationErrors;
				$msg = $errors['full_name'][0];
				$resData = array();
			}else if(!$this->User->validates(array('fieldList'=>array('email')))){
				$errors = $this->User->validationErrors;
				$msg = $errors['email'][0];
				$resData = array();
			}else if(!$this->User->validates(array('fieldList'=>array('password')))){
				$errors = $this->User->validationErrors;
				$msg = $errors['password'][0];
				$resData = array();
			}else{
				$this->User->create();
				$this->request->data['User']['user_added_date'] = date('Y-m-d H:i:s');
				$pass=$this->request->data['User']['password'];
				$this->request->data['User']['password']=AuthComponent::password($pass);
				if($userData = $this->User->save($this->request->data)) {
					$msg =  self::$errors['registerSuccess'];
					$isRegister = true;
					$resData = $userData;
				} else {
					$msg =  self::$errors['registerFail'];
					$isRegister = false;
				}
			}
		}else{
			$msg = self::$errors['emptyUser'];
		}

		$response = array(
			'isSuccess'=>$isRegister,
			'msg'=>$msg,
			'data'=>$resData
		);

		echo json_encode($response);
	}


	/*
	* Function for update a user info
	* @param full_name Varchar NOT NULL
	* @param email Varchar NOT NULL
	* @param password Varchar NOT NULL
	* @param phone Varchar NULL
	* @param location Varchar NULL
	* @param job_title Varchar NULL
	* @param company Varchar NULL
	* @param industries Varchar NULL
	* @param website Varchar NULL
	* @param user_status Varchar NOT NULL // 0/1
	* @param user_description Varchar NULL
	* @param user_note Varchar NULL
	* @param term_and_condition Varchar NOT NULL // 0/1
	* @return json array
	*/

	function update_profile(){
		$isUpdate = false;
		$msg = '';
		$resData = array();

		if (!empty($this->request->data) && $this->request->is('post')) {
			$this->request->data = array(
				'User'=>$this->request->data
			);

			unset($this->request->data['User']['email']);
			unset($this->request->data['User']['user_role_id']);
			unset($this->request->data['User']['user_status']);

			if(!empty($this->request->data['User']['password'])){
				$newPass = $this->request->data['User']['password'];
				$this->request->data['User']['password'] = AuthComponent::password($newPass);
			}else{
				unset($this->request->data['User']['password']);
			}
			
			$this->User->set($this->request->data);
			if(!$this->User->validates(array('fieldList'=>array('full_name')))){
				$errors = $this->User->validationErrors;
				$msg = $errors['full_name'][0];
				$resData = array();
			}else{
				$this->request->data['User']['user_modified_date'] = date('Y-m-d H:i:s');
				$this->User->id = $this->Auth->user('user_id');

				if($userData = $this->User->save($this->request->data)) {
					$msg =  self::$errors['updateSuccess'];
					$isUpdate = true;
					$resData = $userData;
				} else {
					$msg =  self::$errors['updateFail'];
					$isUpdate = false;
				}
			}
		}else{
			$msg = self::$errors['emptyUser'];
		}

		$response = array(
			'isSuccess'=>$isUpdate,
			'msg'=>$msg,
			'data'=>$resData
		);

		echo json_encode($response);
	}

	/*
	* Function for update a user profile picture
	* @param profile_pic Varchar NOT NULL
	* @return json array
	*/

	function update_profile_picture(){
		$isUpdate = false;
		$msg = '';
		$resData = array();
		// print_r($this->request->data);
		// print_r($this->request->file);
		if (!empty($this->request->data) && $this->request->is('post')) {
			$userId=$this->Auth->user('user_id');
			$imageData = $this->request->data['profile_pic'];
			unset($this->request->data['profile_pic']);
			list($type, $imageData) = explode(';', $imageData);
			list(, $imageData)      = explode(',', $imageData);
			$imageData = base64_decode($imageData);
			$filename = time().'.png';
			file_put_contents(getcwd().'/img/admin/user/thumb/'.$filename, $imageData);
			$this->request->data['User']['profile_pic'] = $filename;
			$this->User->id = $userId;
			if($userData = $this->User->save($this->request->data)){
				$msg =  self::$errors['profileImgUpdateSuccess'];
				$isUpdate = true;
				$resData = $userData;
			}else{
				$msg =  self::$errors['profileImgUpdateSuccess'];
				$isUpdate = false;
			}
		}else{
			$msg = self::$errors['emptyUser'];
		}

		$response = array(
			'isSuccess'=>$isUpdate,
			'msg'=>$msg,
			'data'=>$resData
		);

		echo json_encode($response);
	}

	/*
	* Function for logout user
	* @return json array
	*/

	function logout(){
		$isLogout = false;
		
		if($this->Auth->logout()){
			$isLogout = true;
			$msg = self::$errors['logoutSuccess'];
		}

		$response = array(
			'isSuccess'=>$isLogout,
			'msg'=>$msg,
			'data'=>array()
		);

		echo json_encode($response);
	}

	/*
	* Function for get user Info by id 
	* @param userId INT NOT NULL
	* @return json array
	*/

	function get_user_info($userId){
		$foundRecord = false;
		$user = array();

		$user = $this->User->find('first',array('conditions'=>array(
			'User.user_status'=>1,
			'User.user_role_id'=>3,
			'User.user_id'=>$userId
		)));

		if(!empty($user)){
			$msg = self::$errors['listFound'];
			$foundRecord = true;
		}else{
			$msg = self::$errors['listNotFound'];
		}

		$response = array(
			'isSuccess'=>$foundRecord,
			'msg'=>$msg,
			'data'=>$user
		);

		echo json_encode($response);
	}


}
