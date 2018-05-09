<?php
App::uses('AppModel', 'Model');

class Availability extends AppModel {
	
	public $validate = array(
		'slide_title' => array(
			'required' => array(
				'rule' => array('notempty'),
				'message' => 'Please enter the product title'				
			)
		)
	);
	
	function getAllAvailabilities($userId=''){
		$cond = array();
		$this->bindModel(array('belongsTo'=>array('User')));		
		
		if(!empty($userId))
			$cond = array('Availability.user_id'=>$userId);

        $Availabilities = $this->find('all',array(
				'joins'=>array(	
					array( 
						'table'=>'contact_informations',
						'alias'=>'ContactInformation',
						'type'=>'LEFT',
						'conditions'=>array('ContactInformation.user_id = Availability.user_id')	
					)
				),
				'conditions'=>$cond,
				'fields'=>array(
					'User.*',
					'Availability.*',
					'ContactInformation.*'
				)
			)
		);

       return $Availabilities;
    }
}
