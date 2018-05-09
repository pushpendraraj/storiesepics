<?php
class AvailabilityController extends AppController {

	public $name = 'Availability';
	public $helpers = array('Form', 'Html', 'Js');
	public $uses = array('Availability');	
	
	function beforeFilter(){
		parent::beforeFilter();
		$this->Auth->allow(array('practitioner_get_availabilities'));		
	}	

	function practitioner_index(){
		$PageVar = array();
		$this->set('title_for_layout','Availability');	
		$this->paginate = array(
			'conditions' => array('user_id'=>$this->Auth->user('user_id'))
		);
		if(!empty($this->request->data)){
			$usrId = $this->Auth->user('user_id');
			$this->request->data['Availability']['user_id'] = $usrId;
			if($this->Availability->save($this->request->data)){
				$this->Session->setFlash(__('Availability set successfully',true),'default',array('class'=>'alert alert-success'));
			}
		}
		$this->set('Availabilities', $this->paginate('Availability'));
	}

	function practitioner_get_availabilities(){
		$this->autoRender = false;
		$events = array();
		$Availabilities = $this->Availability->getAllAvailabilities();

		foreach ($Availabilities as $key => $Availability) {
			$e = array();
	        $e['id'] = $Availability['Availability']['id'];
	        $e['title'] = $Availability['User']['first_name'].' '.$Availability['User']['last_name'];
	        $e['description'] = 'Address : '.$Availability['ContactInformation']['address'];
	        $e['email'] = 'Email : '.$Availability['ContactInformation']['email'];
	        $e['contact_no'] = 'Contact Number : '.$Availability['ContactInformation']['contact'];
	        $e['fax_no'] = 'Fax Number : '.$Availability['ContactInformation']['fax'];
	        $e['user_id'] = stripcslashes($Availability['User']['user_id']);
	        $e['user_description'] = stripcslashes($Availability['User']['user_description']);
	        $e['start'] = $Availability['Availability']['start'];
	        $e['end'] = $Availability['Availability']['end'];
	        $e['allDay'] = false;
	        // Merge the event array into the return array
        	array_push($events, $e);
		}
		echo json_encode($events);
	}
	
}
