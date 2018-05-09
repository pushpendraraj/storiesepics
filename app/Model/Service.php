<?php
App::uses('AppModel', 'Model');

class Service extends AppModel {

	public $primaryKey='service_id';
	
	public $validate = array(
		'service_title' => array(
			'required' => array(
				'rule' => array('notempty'),
				'message' => 'Please enter the service title'				
			)
		),
		'short_description' => array(
			'required' => array(
				'rule' => array('notempty'),
				'message' => 'Please enter the service short description'				
			)
		)
	);
}
