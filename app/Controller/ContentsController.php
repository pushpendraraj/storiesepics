<?php
App::uses('AppController', 'Controller');

class ContentsController extends AppController {
	public $uses = array('Content');
	public $paginate = array('limit' =>1);	

	function beforeFilter(){
		parent::beforeFilter();
	}
	
	public function admin_index() {
		$this->Content->recursive = 0;
		$this->paginate = array(
         	'order' =>'Content.page_id DESC'
     	);
		$this->set('contents', $this->paginate('Content'));
	}

	public function admin_view($id = null) {
		$this->Content->id = $id;
		if (!$this->Content->exists()) {
			throw new NotFoundException(__('Invalid Page'));
		}
		$this->set('Content', $this->Content->read(null, $id));
	}


	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Content->create();
			$this->request->data['Content']['page_added_date']=date('Y-m-d H:i:s');
			if ($this->Content->save($this->request->data)) {
				$this->Session->setFlash(__('The page has been saved'),'default',array('class'=>'alert alert-success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The page could not be saved. Please, try again.'),'default',array('class'=>'alert alert-danger'));
			}
		}
	}


	public function admin_edit($id = null) {
		$this->Content->id = $id;
		if (!$this->Content->exists()) {
			throw new NotFoundException(__('Invalid Page'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			$this->request->data['Content']['page_modified_date']=date('Y-m-d H:i:s');
			$this->request->data['Content']['page_id'] = $id;
			if ($this->Content->save($this->request->data)) {
				$this->Session->setFlash(__('The page has been saved'),'default',array('class'=>'alert alert-success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The page could not be saved. Please, try again.'),'default',array('class'=>'alert alert-danger'));
			}
		} else {
			$this->request->data = $this->Content->read(null, $id);
		}
		$this->render('admin_add');
	}


	public function admin_delete($id = null) {
		
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Content->id = $id;
		if (!$this->Content->exists()) {
			throw new NotFoundException(__('Invalid page'));
		}
		if ($this->Content->delete()) {
			$this->Session->setFlash(__('Page deleted'),'default',array('class'=>'success'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Page was not deleted'),'default',array('class'=>'error'));
		$this->redirect(array('action' => 'index'));
	}
	
	
	/*-front end actions-*/
	
	
	
	
	/*-[end]front end actions-*/
}
