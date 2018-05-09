<?php
App::uses('AppModel', 'Model');

class TeamMember extends AppModel {

	public $primaryKey='member_id';
	
	public $validate = array(
		'name' => array(
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
