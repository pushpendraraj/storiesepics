<?php 
class UserFriend extends AppModel
{
	public $name = 'UserFriend';
	public $useTable = 'user_friends';
	public $primaryKey = 'id';

	public $belongsTo = array(
		'User' => array(
			'className'=>'User',
			'foreignKey'=>'user_id',
			'dependent'=>false
		),
		'Friend' => array(
			'className'=>'User',
			'foreignKey'=>'friend_user_id',
			'dependent'=>false
		)
	);
}

?>