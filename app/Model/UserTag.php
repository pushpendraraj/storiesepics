<?php 
class UserTag extends AppModel{
	public $name = 'UserTag';
	public $useTable = 'user_tags';
	public $primaryKey = 'id';

	public $belongsTo = array(
		'User'=>array(
			'className'=>'User',
			'foreignKey'=>'user_id',
			'dependent'=>false
		)
	);
}



?>