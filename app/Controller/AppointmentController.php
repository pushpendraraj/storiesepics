<?php
class AppointmentController extends AppController {

	public $name = 'Appointment';
	public $helpers = array('Form', 'Html', 'Js');
	public $uses = array('Appointment','EmailTemplate','User');
	public $components=array('Core','Email');	
	
	function beforeFilter(){
		parent::beforeFilter();
		$this->Auth->allow(array('bookAnAppointment'));		
	}	

	function bookAnAppointment(){
		$this->autoRender = false;
		if ($this->request->is('post') || $this->request->is('put')){
			$postData = $this->request->data;
			$postData['Appointment']['created_at'] = date('Y-m-d H:i:s');
			if($this->Appointment->saveAppointment($postData)){
				$name = $postData['Appointment']['first_name'].' '.$postData['Appointment']['last_name'];
				$dob = $postData['Appointment']['dob'];
				$phn = $postData['Appointment']['phn'];
				$phone = $postData['Appointment']['phone'];
				$email = $postData['Appointment']['email'];
				
				$practitioner = $this->User->find('first',array('conditions'=>array('user_id'=>$postData['Appointment']['user_id']),'fields'=>array('email','first_name','last_name')));	
				$practitionerEmail = $practitioner['User']['email'];
				// $practitionerEmail = 'rajput.pushpendra61@gmail.com';
				$practitionerName = $practitioner['User']['first_name'].' '.$practitioner['User']['last_name'];
				/*- Practitioner template asssignment if any*/
				$practitionerTemplate = $this->EmailTemplate->find('first',
					array(
						'conditions' => array(
							'template_key'=> 'practitioner_booking_notification',
							'template_status' =>'Active'
						)
					)
				);
						
				if($practitionerTemplate){	
					$arrFind=array('{practitioner_name}','{name}','{dob}','{phn}','{phone}','{email}');
					$arrReplace=array($practitionerName,$name,$dob,$phn,$phone,$email);			
					$from=$practitionerTemplate['EmailTemplate']['from_email'];
					$subject=$practitionerTemplate['EmailTemplate']['email_subject'];
					$content=str_replace($arrFind, $arrReplace,$practitionerTemplate['EmailTemplate']['email_body']);
					$this->sendEmail($practitionerEmail, $from, $subject, $content);	
				}
				/*-[end] Practitioner template asssignment*/
						
				/*- User template asssignment if any*/
				$userTemplate = $this->EmailTemplate->find('first',
					array(
						'conditions' => array(
							'template_key'=> 'appointment_booking',
							'template_status' =>'Active'
						)
					)
				);
						
				if($userTemplate){	
					$arrFind=array('{name}','{dob}','{phn}','{phone}','{email}');
					$arrReplace=array($name,$dob,$phn,$phone,$email);			
					$from=$userTemplate['EmailTemplate']['from_email'];
					$subject=$userTemplate['EmailTemplate']['email_subject'];
					$content=str_replace($arrFind, $arrReplace,$userTemplate['EmailTemplate']['email_body']);
					$this->sendEmail($email, $from, $subject, $content);	
				}
				/*-[end] User template asssignment*/	
				echo json_encode(array('status'=>1,'message'=>'Appointment added successfully.','data'=>$postData));

			}else{
				echo json_encode(array('status'=>0,'message'=>'Sorry ! please try again later.','data'=>$postData));
			}

		}

	}
	
}
