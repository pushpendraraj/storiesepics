<?php
App::uses('AppController', 'Controller');
class ServicesController extends AppController {
	public $uses = array('Service');
	
	function beforeFilter(){
		parent::beforeFilter();
	}
	
	public function admin_index() {
		$this->paginate = array(
         	'limit' => 10,
         	'conditions'=>array(
         		'user_id'=>$this->Auth->user('user_id')
     		)
     	);
     	$this->set('Services', $this->paginate());
     	$this->render('practitioner_index');
	}

	public function practitioner_index() {
		$this->paginate = array(
         	'limit' => 10,
         	'conditions'=>array(
         		'user_id'=>$this->Auth->user('user_id')
     		)
     	);
     	$this->set('Services', $this->paginate());
	}

	public function practitioner_add() {
		if ($this->request->is('post')) {
			$this->Service->create();

			$userId=$this->Auth->user('user_id');
			$this->request->data['Service']['user_id']= $userId;
			$image = $this->request->data['Service']['image'];

			if(!empty($this->request->data['Service']['image']['name'])){
				$file = explode('.',$this->request->data['Service']['image']['name']);
				$file[0] = time();
				$file = implode('.',$file);
				$newPath = 'img/practitioner/services/'.$file; 
				move_uploaded_file($this->request->data['Service']['image']['tmp_name'], $newPath);
				$this->request->data['Service']['image'] = $file;		
			}				
			if ($this->Service->save($this->request->data)) {
				$this->Session->setFlash(__('The service has been added'),'default',array('class'=>'alert alert-success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The service could not be added. Please, try again.'),'default',array('class'=>'alert alert-danger'));
			}
		}
	}
	
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Service->create();
			$userId=$this->Auth->user('user_id');
			$this->request->data['Service']['user_id']= $userId;
			$image = $this->request->data['Service']['image'];
			if(!empty($this->request->data['Service']['image']['name'])){
				$file = explode('.',$this->request->data['Service']['image']['name']);
				$file[0] = time();
				$file = implode('.',$file);
				$newPath = 'img/practitioner/services/'.$file; 
				move_uploaded_file($this->request->data['Service']['image']['tmp_name'], $newPath);
				$this->request->data['Service']['image'] = $file;		
			}else{
				$this->request->data['Service']['image'] = '';
			}				
			if ($this->Service->save($this->request->data)) {
				$this->Session->setFlash(__('The service has been added'),'default',array('class'=>'alert alert-success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The service could not be added. Please, try again.'),'default',array('class'=>'alert alert-danger'));
			}
		}
		$this->render('practitioner_add');
	}
	
	public function practitioner_edit($id = null) {		
		$this->Service->id = $id;
		$data = $this->Service->read(null,$id);
		if (!$this->Service->exists()) {
			throw new NotFoundException(__('Invalid Service'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if($this->request->data['Service']['image']['name']!=''){
				$file = explode('.',$this->request->data['Service']['image']['name']);
				$file[0] = time();
				$file = implode('.',$file);
				$newPath = 'img/practitioner/services/'.$file;
				unlink('img/practitioner/services/'.$data['Service']['image']); 
				move_uploaded_file($this->request->data['Service']['image']['tmp_name'], $newPath);
				$this->request->data['Service']['image'] = $file;	
			}else{
				unset($this->request->data['Service']['image']);
			}
			if ($this->Service->save($this->request->data)) {
				$this->Session->setFlash(__('The service has been updated'),'default',array('class'=>'alert alert-success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The service could not be updated. Please, try again.'),'default',array('class'=>'error'));
			}
		} else {
			$this->request->data = $data;
		}
	}
	
	public function admin_edit($id = null) {		
		$this->Service->id = $id;
		$data = $this->Service->read(null,$id);
		if (!$this->Service->exists()) {
			throw new NotFoundException(__('Invalid Service'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if($this->request->data['Service']['image']['name']!=''){
				$file = explode('.',$this->request->data['Service']['image']['name']);
				$file[0] = time();
				$file = implode('.',$file);
				$newPath = 'img/practitioner/services/'.$file;
				unlink('img/practitioner/services/'.$data['Service']['image']); 
				move_uploaded_file($this->request->data['Service']['image']['tmp_name'], $newPath);
				$this->request->data['Service']['image'] = $file;	
			}else{
				unset($this->request->data['Service']['image']);
			}
			if ($this->Service->save($this->request->data)) {
				$this->Session->setFlash(__('The service has been updated'),'default',array('class'=>'alert alert-success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The service could not be updated. Please, try again.'),'default',array('class'=>'error'));
			}
		}
		$this->request->data = $data;
		$this->render('practitioner_edit');
	}

	function practitioner_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Service', true),'default',array('class'=>'alert alert-danger'));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('Service', $this->Service->read(null, $id));
		
	}
	
	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Service', true),'default',array('class'=>'alert alert-danger'));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('Service', $this->Service->read(null, $id));
		$this->render('practitioner_view');
		
	}

	public function practitioner_delete($id = null) {
		$this->Service->id = $id;
		if (!$this->Service->exists()) {
			throw new NotFoundException(__('Invalid Service'));
		}
		$data = $this->Service->findByServiceId($id);
		if ($this->Service->delete()) {
			unlink('img/practitioner/services/'.$data['Service']['image']);
			$this->Session->setFlash(__('Service deleted'),'default',array('class'=>'alert alert-success'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Service was not deleted'),'default',array('class'=>'alert alert-danger'));
		$this->redirect(array('action' => 'index'));
	}	
	
	public function admin_delete($id = null) {
		$this->Service->id = $id;
		if (!$this->Service->exists()) {
			throw new NotFoundException(__('Invalid Service'));
		}
		$data = $this->Service->findByServiceId($id);
		if ($this->Service->delete()) {
			unlink('img/practitioner/services/'.$data['Service']['image']);
			$this->Session->setFlash(__('Service deleted'),'default',array('class'=>'alert alert-success'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Service was not deleted'),'default',array('class'=>'alert alert-danger'));
		$this->redirect(array('action' => 'index'));
	}
}
