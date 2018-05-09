<?php
App::uses('AppController', 'Controller');
class TeamsController extends AppController {
	public $uses = array('TeamMember');
	
	function beforeFilter(){
		parent::beforeFilter();
	}
	
	public function practitioner_members() {
		$this->paginate = array(
         	'limit' => 10,
         	'conditions'=>array(
         		'user_id'=>$this->Auth->user('user_id')
     		)
     	);
     	$this->set('Members', $this->paginate('TeamMember'));
	}

	public function practitioner_add_member() {
		if ($this->request->is('post')) {
			$this->TeamMember->create();

			$userId=$this->Auth->user('user_id');
			$this->request->data['TeamMember']['user_id']= $userId;
			$image = $this->request->data['TeamMember']['image'];

			if(!empty($this->request->data['TeamMember']['image']['name'])){
				$file = explode('.',$this->request->data['TeamMember']['image']['name']);
				$file[0] = time();
				$file = implode('.',$file);
				$newPath = 'img/practitioner/teammembers/'.$file; 
				move_uploaded_file($this->request->data['TeamMember']['image']['tmp_name'], $newPath);
				$this->request->data['TeamMember']['image'] = $file;		
			}				
			if ($this->TeamMember->save($this->request->data)) {
				$this->Session->setFlash(__('The team member has been added'),'default',array('class'=>'alert alert-success'));
				$this->redirect(array('action' => 'members'));
			} else {
				$this->Session->setFlash(__('The team member could not be added. Please, try again.'),'default',array('class'=>'alert alert-danger'));
			}
		}
	}
	public function practitioner_edit_member($id = null) {		
		$this->TeamMember->id = $id;
		$data = $this->TeamMember->read(null,$id);
		if (!$this->TeamMember->exists()) {
			throw new NotFoundException(__('Invalid TeamMember'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if($this->request->data['TeamMember']['image']['name']!=''){
				$file = explode('.',$this->request->data['TeamMember']['image']['name']);
				$file[0] = time();
				$file = implode('.',$file);
				$newPath = 'img/practitioner/teammembers/'.$file;
				unlink('img/practitioner/teammembers/'.$data['TeamMember']['image']); 
				move_uploaded_file($this->request->data['TeamMember']['image']['tmp_name'], $newPath);
				$this->request->data['TeamMember']['image'] = $file;	
			}else{
				unset($this->request->data['TeamMember']['image']);
			}
			if ($this->TeamMember->save($this->request->data)) {
				$this->Session->setFlash(__('The team member has been updated'),'default',array('class'=>'alert alert-success'));
				$this->redirect(array('action' => 'members'));
			} else {
				$this->Session->setFlash(__('The team member could not be updated. Please, try again.'),'default',array('class'=>'error'));
			}
		} else {
			$this->request->data = $data;
		}
	}

	function practitioner_view_member($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Team member', true),'default',array('class'=>'alert alert-danger'));
			$this->redirect(array('action' => 'members'));
		}
		$this->set('Member', $this->TeamMember->read(null, $id));
		
	}

	public function practitioner_delete_member($id = null) {
		// if (!$this->request->is('post')) {
		// 	throw new MethodNotAllowedException();
		// }
		$this->TeamMember->id = $id;
		if (!$this->TeamMember->exists()) {
			throw new NotFoundException(__('Invalid Team Member'));
		}
		$data = $this->TeamMember->findByMemberId($id);
		if ($this->TeamMember->delete()) {
			unlink('img/practitioner/teammembers/'.$data['TeamMember']['image']);
			$this->Session->setFlash(__('Member deleted'),'default',array('class'=>'alert alert-success'));
			$this->redirect(array('action' => 'members'));
		}
		$this->Session->setFlash(__('Member was not deleted'),'default',array('class'=>'alert alert-danger'));
		$this->redirect(array('action' => 'members'));
	}	
	
	/*-front end actions-*/
	
	
	
	
	/*-[end]front end actions-*/
}
