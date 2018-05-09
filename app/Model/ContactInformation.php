<?php
App::uses('AppModel', 'Model');

class ContactInformation extends AppModel {
	
	public $validate = array(
		'email' => array(
			'required' => array(
				'rule' => array('notempty'),
				'message' => 'Please enter the email'				
			)
		)
	);
}
