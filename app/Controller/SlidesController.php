<?php
App::uses('AppController', 'Controller');
class SlidesController extends AppController {
	
	function beforeFilter(){
		parent::beforeFilter();
	}
	
	public function practitioner_index() {
		$this->paginate = array(
         	'limit' => 10,
         	'conditions'=>array(
         		'user_id'=>$this->Auth->user('user_id')
     		)
     	);
     	$this->set('Slides', $this->paginate());
	}

	public function practitioner_add() {
		if ($this->request->is('post')) {
			$this->Slide->create();

			$userId=$this->Auth->user('user_id');
			$this->request->data['Slide']['user_id']= $userId;
			$image = $this->request->data['Slide']['image'];

			if(!empty($this->request->data['Slide']['image']['name'])){
				$file = explode('.',$this->request->data['Slide']['image']['name']);
				$file[0] = time();
				$file = implode('.',$file);
				$newPath = 'img/practitioner/slides/'.$file; 
				move_uploaded_file($this->request->data['Slide']['image']['tmp_name'], $newPath);
				$this->request->data['Slide']['image'] = $file;		
			}				
			if ($this->Slide->save($this->request->data)) {
				$this->Session->setFlash(__('The slide has been added'),'default',array('class'=>'alert alert-success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The slide could not be added. Please, try again.'),'default',array('class'=>'alert alert-danger'));
			}
		}
	}
	public function practitioner_edit($id = null) {		
		$this->Slide->id = $id;
		$data = $this->Slide->read(null,$id);
		if (!$this->Slide->exists()) {
			throw new NotFoundException(__('Invalid Slide'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if($this->request->data['Slide']['image']['name']!=''){
				$file = explode('.',$this->request->data['Slide']['image']['name']);
				$file[0] = time();
				$file = implode('.',$file);
				$newPath = 'img/practitioner/slides/'.$file;
				unlink('img/practitioner/slides/'.$data['Slide']['image']); 
				move_uploaded_file($this->request->data['Slide']['image']['tmp_name'], $newPath);
				$this->request->data['Slide']['image'] = $file;	
			}else{
				unset($this->request->data['Slide']['image']);
			}
			if ($this->Slide->save($this->request->data)) {
				$this->Session->setFlash(__('The slide has been updated'),'default',array('class'=>'alert alert-success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The slide could not be updated. Please, try again.'),'default',array('class'=>'error'));
			}
		} else {
			$this->request->data = $data;
		}
	}
	public function practitioner_delete($id = null) {
		// if (!$this->request->is('post')) {
		// 	throw new MethodNotAllowedException();
		// }
		$this->Slide->id = $id;
		if (!$this->Slide->exists()) {
			throw new NotFoundException(__('Invalid Slide'));
		}
		$data = $this->Slide->findBySlideId($id);
		if ($this->Slide->delete()) {
			unlink('img/practitioner/slides/'.$data['Slide']['image']);
			$this->Session->setFlash(__('Slide deleted'),'default',array('class'=>'alert alert-success'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Slide was not deleted'),'default',array('class'=>'alert alert-danger'));
		$this->redirect(array('action' => 'index'));
	}	
	
	/*-front end actions-*/
	
	
	
	
	/*-[end]front end actions-*/
}
