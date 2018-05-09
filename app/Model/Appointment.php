<?php
App::uses('AppModel', 'Model');

class Appointment extends AppModel {
		
	function saveAppointment($postData){
		$this->create();	
		$postData['created_at']=date('Y-m-d H:i:s');		
		if($this->save($postData)) {
			return true;
		} else {
			return false;
		}
		// $cond = array();
		// $this->bindModel(array('belongsTo'=>array('User')));		
		
		// if(!empty($userId))
		// 	$cond = array('Availability.user_id'=>$userId);

  //       $Availabilities = $this->find('all',array(
		// 		'joins'=>array(	
		// 			array( 
		// 				'table'=>'contact_informations',
		// 				'alias'=>'ContactInformation',
		// 				'type'=>'LEFT',
		// 				'conditions'=>array('ContactInformation.user_id = Availability.user_id')	
		// 			)
		// 		),
		// 		'conditions'=>$cond,
		// 		'fields'=>array(
		// 			'User.*',
		// 			'Availability.*',
		// 			'ContactInformation.*'
		// 		)
		// 	)
		// );

  //      return $Availabilities;
    }
}
