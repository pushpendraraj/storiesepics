<?php
class UserFriendsController extends AppController
{
	public $name = 'UserFriend';
	public $uses = array('UserFriend','User');

	public function admin_index(){
		$this->set('Friends', $this->paginate('UserFriend'));
	}
}