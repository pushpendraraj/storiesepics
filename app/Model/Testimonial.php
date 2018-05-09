<?php
App::uses('AppModel', 'Model');

class Testimonial extends AppModel {	
	public $validate = array(
		'published_by' => array(
			'required' => array(
				'rule' => array('notempty'),
				'message' => 'Please enter the publisher name'				
			)
		),
		'comment' => array(
			'required' => array(
				'rule' => array('notempty'),
				'message' => 'Please enter the comment'				
			)
		)
	);
}
