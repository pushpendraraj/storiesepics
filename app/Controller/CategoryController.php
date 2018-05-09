<?php
App::uses('AppController', 'Controller');
class CategoryController extends AppController {
	public $uses = array('Condition','SubCondition');
	public $components = array('Core');
	
	function beforeFilter(){
		parent::beforeFilter();
	}
	
	public function admin_index() {
		$this->paginate = array(
         	'limit' => 10
     	);
     	$this->set('Conditions', $this->paginate('Condition'));
	}

	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Condition->create();
							
			if ($this->Condition->save($this->request->data)) {
				$this->Session->setFlash(__('The condition has been added'),'default',array('class'=>'alert alert-success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The condition could not be added. Please, try again.'),'default',array('class'=>'alert alert-danger'));
			}
		}
	}
	
	public function admin_edit($id = null) {		
		$this->Condition->id = $id;
		$data = $this->Condition->read(null,$id);
		if (!$this->Condition->exists()) {
			throw new NotFoundException(__('Invalid Condition'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Condition->save($this->request->data)) {
				$this->Session->setFlash(__('The condition has been updated'),'default',array('class'=>'alert alert-success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The condition could not be updated. Please, try again.'),'default',array('class'=>'error'));
			}
		} else {
			$this->request->data = $data;
		}
		$this->render('admin_add');
	}

	public function admin_delete($id = null) {
		$this->Condition->id = $id;
		if (!$this->Condition->exists()) {
			throw new NotFoundException(__('Invalid Condition'));
		}
		if ($this->Condition->delete()) {
			$this->Session->setFlash(__('Condition deleted'),'default',array('class'=>'alert alert-success'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Condition was not deleted'),'default',array('class'=>'alert alert-danger'));
		$this->redirect(array('action' => 'index'));
	}

	function admin_list_sub_conditions(){
		$this->SubCondition->bindModel(array('belongsTo'=>array('Condition')));
		$this->paginate = array(
         	'limit' => 10,
			'order'=>'SubCondition.id DESC'
     	);
     	$this->set('Subconditions', $this->paginate('SubCondition'));
		
	}
	function admin_add_sub_condition(){
		if ($this->request->is('post')) {
			$this->SubCondition->create();
							
			if ($this->SubCondition->save($this->request->data)) {
				$this->Session->setFlash(__('The sub condition has been added'),'default',array('class'=>'alert alert-success'));
				$this->redirect(array('action' => 'list_sub_conditions'));
			} else {
				$this->Session->setFlash(__('The sub condition could not be added. Please, try again.'),'default',array('class'=>'alert alert-danger'));
			}
		}
		$conditions = $this->Core->getContionlist('Publish');
		$this->set('conditions',$conditions);
	}
	
	public function admin_edit_sub_condition($id = null) {		
		$this->SubCondition->id = $id;
		$data = $this->SubCondition->read(null,$id);
		if (!$this->SubCondition->exists()) {
			throw new NotFoundException(__('Invalid Sub Condition'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->SubCondition->save($this->request->data)) {
				$this->Session->setFlash(__('The Sub Condition has been updated'),'default',array('class'=>'alert alert-success'));
				$this->redirect(array('action' => 'list_sub_conditions'));
			} else {
				$this->Session->setFlash(__('The Sub Condition could not be updated. Please, try again.'),'default',array('class'=>'error'));
			}
		} else {
			$this->request->data = $data;
		}
		$conditions = $this->Core->getContionlist('Publish');
		$this->set('conditions',$conditions);
		$this->render('admin_add_sub_condition');
	}
	
	function admin_view_sub_condition($id = ''){
		$this->SubCondition->bindModel(array('belongsTo'=>array('Condition'=>array('Condition.id' => 'SubCondition.condition_id'))));
		if (!$id) {
			$this->Session->setFlash(__('Invalid Sub Condition', true),'default',array('class'=>'alert alert-danger'));
			$this->redirect(array('action' => 'list_sub_conditions'));
		}
		$this->set('Sub_condition', $this->SubCondition->read(null, $id));
	}
	
	public function admin_delete_sub_condition($id = null) {
		$this->SubCondition->id = $id;
		if (!$this->SubCondition->exists()) {
			throw new NotFoundException(__('Invalid Sub Condition'));
		}
		if ($this->SubCondition->delete()) {
			$this->Session->setFlash(__('Sub Condition deleted'),'default',array('class'=>'alert alert-success'));
			$this->redirect(array('action' => 'list_sub_conditions'));
		}
		$this->Session->setFlash(__('Sub Condition was not deleted'),'default',array('class'=>'alert alert-danger'));
		$this->redirect(array('action' => 'list_sub_conditions'));
	}
}
