<?php
class WebserviceController extends AppController {

	public $name = 'Webservice';
	public $helpers = array('Form', 'Html', 'Js');
	public $paginate = array('limit' =>10);	
	public $uses=array('User', 'Login', 'Content', 'UserFriend', 'UserTag', 'EmailTemplate');
	public $components = array('Auth', 'Session', 'Core', 'Email');	
	static $errors = array( 
		'invalidEmailPassword' => 'Invalid Email or Password.',
		'emptyEmailPassword' => 'Email & Password should not be empty.',
		'emptyUser' => 'Post request should not be empty.',
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
		'listNotFound' => 'Record not found.',
		'friendAddSuccess' => 'Friends added successfully.',
		'tagAddSuccess' => 'Tags added successfully.',
		'operationFail' => 'Operation fail, please try again later.',
		'emptyFriendList' => 'Empty friends list',
		'emptyTagList' => 'Empty tag list',
		'actionNotFound' =>'Action not found.',
		'forgotSuccess' => 'A new password has been sent to your register email address.'
	);

	static $statusCodes = array(
		200=>'Success',
		201=>'Request Blank',
		202=>'Database Not Connected',
		203=>'Invalid UserName/Invalid Request',
		207=>'Invalid User Id OR Authentitcation Key',
		209=>'Data Does Not Exist',
		210=>'JSON Data Is Blank',
		212=>'Detail Already Exist In The System',
		214=>'Fields Can Not Be Empty',
		404=>'Not Found',
		406=>'Not Acceptable',
		500=>'Server Error',
		204=>'Invalid Request Method',
		100=>'Action Not Found',
		101=>'Invalid Email Address',
		102=>'Invalid Password',
		103=>'Invalid Email Id Aur Password',
		104=>'Full Name Should Not Be Empty',
		105=>'Operation Failed, Please Try Again',
		106=>'User Not Logged In, Login First'
	);

	function beforeFilter(){
		$this->autoRender = false;
		$this->layout = false;
		parent::beforeFilter();
		$this->Auth->allow('index', 'login', 'logout', 'register', 'get_page_info', 'get_friends', 'forgot_password');
	}

	/*
	* Function for list users
	* @return json array
	*/
    
    function index(){
    	$actionName = $this->request->query['action'];
		
		if(method_exists($this, $actionName)){
			$postData = json_decode(file_get_contents("php://input"), TRUE);
	    	$reqData = $postData['data'];
	    	$this->request->data = $reqData;
	    	$this->$actionName();
    		return false;
		}else{
			$response = array(
				'status'=>0,
				'code'=>100,
				'data'=>array()
			);
		}

		echo json_encode($response);
    }

    /*
	* Function for get users
	* @return json array
	*/

	function get_users() {
		$foundRecord = $resCode = 0;
		$users = array();
		$users = $this->User->find('all',array('conditions'=>array(
			'User.user_status'=>1,
			'User.user_role_id'=>3
		)));

		if(!empty($users)){
			$foundRecord = 1;
			$resCode = 200;
			$newList = array();
			foreach($users as $user):
				$newList[] = $user['User'];
			endforeach;
			$users = $newList;
		}else{
			$foundRecord = 1;
			$resCode = 200;
		}

		$response = array(
			'status'=>$foundRecord,
			'code'=>$resCode,
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
		$isLogin = $resCode = 0;
		$resData = array();
		if(!empty($this->request->data) && $this->request->is('post')){
			$this->request->data = array(
				'Login'=>$this->request->data
			);

			$this->Login->set($this->request->data);
			
			if(!$this->Login->validates(array('fieldList'=>array('email')))){
				$resCode = 101;
			}else if(!$this->Login->validates(array('fieldList'=>array('password')))){
				$resCode = 102;
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
			 			 	 
				$isLogin = 1;
				$resCode = 200;
				$resData = $this->Auth->user();
			}else{
				$resCode = 103;
			}
		}else{
			$resCode = 204;
		}

		$response = array(
			'status'=>$isLogin,
			'code'=>$resCode,
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
		$isRegister = $resCode = 0;
		$resData = array();
		if (!empty($this->request->data) && $this->request->is('post')) {
			$this->request->data = array(
				'User'=>$this->request->data
			);

			$this->User->set($this->request->data);
			if(!$this->User->validates(array('fieldList'=>array('full_name')))){
				$resCode = 104;
			}else if(!$this->User->validates(array('fieldList'=>array('email')))){
				$resCode = 101;
			}else if(!$this->User->validates(array('fieldList'=>array('password')))){
				$resCode = 102;
			}else{
				$this->User->create();
				$this->request->data['User']['user_added_date'] = date('Y-m-d H:i:s');
				$pass=$this->request->data['User']['password'];
				$this->request->data['User']['password']=AuthComponent::password($pass);
				if($userData = $this->User->save($this->request->data)) {
					$isRegister = 1;
					$resCode = 200;
					$resData = $userData['User'];
				} else {
					$resCode = 105;
				}
			}
		}else{
			$resCode = 204;
		}

		$response = array(
			'status'=>$isRegister,
			'code'=>$resCode,
			'data'=>$resData
		);

		echo json_encode($response);
	}

	/*
	* Function for forgot password for a user
	* @param email varchar NOT NULL
	* @return json array
	*/

	function forgot_password(){
		$isLogin = $resCode = 0;
		$resData = array();

		if(!empty($this->request->data) && $this->request->is('post')){
			$this->request->data = array(
				'Login'=>$this->request->data
			);

			$this->Login->set($this->request->data);
			
			if(!$this->Login->validates(array('fieldList'=>array('email')))){
				$errors = $this->Login->validationErrors;
				$msg = $errors['email'][0];
				$resCode = 203;
			}else{ 
				$email = $this->request->data['Login']['email'];
				$rs = $this->Login->findByEmail($email);

				if($rs){
					$email = $rs['Login']['email'];								
					$name = $rs['Login']['full_name'];
					$newPass = $this->Core->generatePassword();
									
					/*-template asssignment if any*/
					$template = $this->EmailTemplate->find('first',
						 array('conditions' => array('template_key'=> 'forgot_password_email',
					  	 'template_status' =>'Active')));
							
					if($template){	
						$arrFind=array('{name}','{password}');
						$arrReplace=array($name,$newPass);
						$from=$template['EmailTemplate']['from_email'];
						$subject=$template['EmailTemplate']['email_subject'];
						$content=str_replace($arrFind, $arrReplace,$template['EmailTemplate']['email_body']);
						// $this->sendEmail($email, $from, $subject, $content);		
					}

					echo $content;

					$this->request->data['User']['user_modified_date'] = date('Y-m-d H:i:s');
					$this->request->data['User']['password'] = AuthComponent::password($newPass);
					$this->User->id = $rs['Login']['user_id'];

					if($userData = $this->User->save($this->request->data)) {
						$isLogin = 1;
						$resCode = 200;
						$msg = self::$errors['forgotSuccess']; 
						$resData = $rs;
					} else {
						$resCode = 203;
						$msg = self::$errors['operationFail']; 
					}
				}else{
					$resCode = 203;
					$msg = self::$errors['invalidEmail']; 
				}
			}
		}else{
			$msg = self::$errors['emptyEmailPassword'];
			$resCode = 201;
		}

		$response = array(
			'status'=>$isLogin,
			'code'=>$resCode,
			'msg'=>$msg,
			'data'=>$resData
		);

		echo json_encode($response);
	}


	/*
	* Function for update a user info
	* @param full_name Varchar NOT NULL
	* @param password Varchar OPTIONAL
	* @param phone Varchar OPTIONAL
	* @param location Varchar OPTIONAL
	* @param job_title Varchar OPTIONAL
	* @param company Varchar OPTIONAL
	* @param industries Varchar OPTIONAL
	* @param website Varchar OPTIONAL
	* @param user_description Varchar OPTIONAL
	* @param user_note Varchar OPTIONAL
	* @return json array
	*/

	function update_profile(){
		$isUpdate = $resCode = 0;
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
				$resCode = 104;
			}else{
				$this->request->data['User']['user_modified_date'] = date('Y-m-d H:i:s');
				$userId = $this->Auth->user('user_id');
				if(empty($userId)){
					$resCode = 106;
				}else{
					$this->User->id = $userId;
					if($userData = $this->User->save($this->request->data)) {
						$isUpdate = 1;
						$resCode = 200;
						$resData = $userData['User'];
					} else {
						$resCode = 105;
					}
				}
			}
		}else{
			$resCode = 204;
		}

		$response = array(
			'status'=>$isUpdate,
			'code'=>$resCode,
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
		$isUpdate = $resCode = 0;
		$resData = array();
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
				$resCode = 200;
				$isUpdate = 1;
				$resData = '/img/admin/user/thumb/'.$filename;
			}else{
				$resCode = 105;
			}
		}else{
			$resCode = 204;
		}

		$response = array(
			'status'=>$isUpdate,
			'code'=>$resCode,
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
		$foundRecord = $resCode = 0;
		$user = array();

		$user = $this->User->find('first',array('conditions'=>array(
			'User.user_status'=>1,
			'User.user_role_id'=>3,
			'User.user_id'=>$userId
		)));

		if(!empty($user)){
			$msg = self::$errors['listFound'];
			$foundRecord = 0;
			$resCode = 200;
			$user = $user['User'];
		}else{
			$resCode = 210;
			$msg = self::$errors['listNotFound'];
		}

		$response = array(
			'status'=>$foundRecord,
			'code'=>$resCode,
			'msg'=>$msg,
			'data'=>$user
		);

		echo json_encode($response);
	}

	/*
	* Function for get page Info by slug 
	* @param slug varchar NOT NULL
	* @return json array
	*/

	function get_page_info($slug=''){
		$foundRecord = false;
		$user = array();

		$content = $this->Content->find('first',array('conditions'=>array(
			'Content.page_slug'=>$slug,
			'Content.status'=>'Publish',
		)));

		if(!empty($content)){
			$msg = self::$errors['listFound'];
			$foundRecord = true;
			$content = $content['Content'];
		}else{
			$msg = self::$errors['listNotFound'];
		}

		$response = array(
			'isSuccess'=>$foundRecord,
			'msg'=>$msg,
			'data'=>$content
		);

		echo json_encode($response);
	}

	/*
	* Function for get friends by User Id 
	* @param userId INT NOT NULL
	* @return json array
	*/

	function get_friends($userId = ''){
		$foundRecord = false;
		$friends = array();
		$msg = '';
		$userId = (isset($userId))?$userId:$this->Auth->user('user_id');

		if(!empty($userId)){
			$this->UserFriend->unbindModel(array('belongsTo'=>array('User')));
			$friends = $this->UserFriend->find('all', array('fields'=>array('Friend.*'),'conditions'=>array('UserFriend.user_id'=>$userId)));

			$newList = array();
			foreach ($friends as $key => $friend):
				$newList[] = $friend['Friend'];
			endforeach;

			$msg = self::$errors['listFound'];
			$foundRecord = true;
			$friends = $newList;
		}else{
			$msg = self::$errors['listNotFound'];
		}

		$response = array(
			'isSuccess'=>$foundRecord,
			'msg'=>$msg,
			'data'=>$friends
		);

		echo json_encode($response);
	}

	/*
	* Function for add user as a friends by User Id
	* @param userId INT NOT NULL
	* @param friends Array NOT NULL
	* @return json array
	*/

	function add_friend(){
		$isAdded = false;
		$resData = array();
		$msg = '';

		if (!empty($this->request->data) && $this->request->is('post')) {
			$friendIds = $this->request->data['friendIds'];
			if(!empty($friendIds)){
				$userId = $this->Auth->user('user_id');
				$userFriends = array();
				foreach ($friendIds as $friendId):
					$userFriends[]['UserFriend'] = array(
						'user_id' => $userId,
						'friend_user_id' => $friendId,
						'created_at' => date('Y-m-d H:i:s'),
					);
				endforeach;
			
				$this->UserFriend->create();
				if($this->UserFriend->saveAll($userFriends)){
						$msg =  self::$errors['friendAddSuccess'];
						$isAdded = true;					
						$resData = $friendIds;
				}else{
					$msg =  self::$errors['operationFail'];
				}	
			}else{
				$msg =  self::$errors['emptyFriendList'];
			}
		}else{
			$msg = self::$errors['emptyUser'];
		}

		$response = array(
			'isSuccess'=>$isAdded,
			'msg'=>$msg,
			'data'=>$resData
		);

		echo json_encode($response);
	}

	/*
	* Function for add user tag
	* @param userId INT NOT NULL
	* @return json array
	*/
	function add_user_tag(){
		$isAdded = false;
		$resData = array();
		$msg = '';

		if (!empty($this->request->data) && $this->request->is('post')) {
			$userTags = $this->request->data['tags'];
			$userId = $this->Auth->user('user_id');
			if(!empty($userTags)){
				$newTagList = array();
				foreach ($userTags as $key => $userTag) {
					$newTagList[]['UserTag'] = array(
						'user_id' => $userId,
						'tag_name' => $userTag,
					);
				}

				$this->UserTag->create();
				if($this->UserTag->saveAll($newTagList)){
						$msg =  self::$errors['tagAddSuccess'];
						$isAdded = true;					
						$resData = $userTags;
				}else{
					$msg =  self::$errors['operationFail'];
				}

			}else{
				$msg =  self::$errors['emptyTagList'];	
			}
		}else{
			$msg = self::$errors['emptyUser'];
		}
		$response = array(
			'isSuccess'=>$isAdded,
			'msg'=>$msg,
			'data'=>$resData
		);

		echo json_encode($response);
	}

	/*
	* Function for get tags by User Id 
	* @param userId INT NOT NULL
	* @return json array
	*/

	function get_tags($userId = ''){
		$foundRecord = false;
		$tags = array();
		$msg = '';
		$userId = (isset($userId))?$userId:$this->Auth->user('user_id');

		if(!empty($userId)){
			// $this->UserFriend->unbindModel(array('belongsTo'=>array('User')));
			$tags = $this->UserTag->find('all', array('fields'=>array('UserTag.tag_name'),'conditions'=>array('UserTag.user_id'=>$userId)));

			$newList = array();
			foreach ($tags as $key => $tag):
				$newList[] = $tag['UserTag'];
			endforeach;

			$msg = self::$errors['listFound'];
			$foundRecord = true;
			$tags = $newList;
		}else{
			$msg = self::$errors['listNotFound'];
		}

		$response = array(
			'isSuccess'=>$foundRecord,
			'msg'=>$msg,
			'data'=>$tags
		);

		echo json_encode($response);
	}

}
