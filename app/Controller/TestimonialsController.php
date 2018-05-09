<?php
App::uses('AppController', 'Controller');
class TestimonialsController extends AppController {
	public $uses = array('Testimonial');
	
	function beforeFilter(){
		parent::beforeFilter();
	}
	
	public function admin_index() {
		$this->layout = 'admin';
		$this->paginate = array(
         	'limit' => 10
     	);
     	$this->set('Testimonials', $this->paginate('Testimonial'));
	}

	public function admin_add() {
		$PageVar = array();
		if ($this->request->is('post')) {
			$this->Testimonial->create();				
			if ($this->Testimonial->save($this->request->data)) {
				$this->Session->setFlash(__('The testimonial has been added'),'default',array('class'=>'alert alert-success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The testimonial could not be added. Please, try again.'),'default',array('class'=>'alert alert-danger'));
			}
		}
		$PageVar['label'] = 'Add Testimonial';
		$PageVar['sublabel'] = 'Add New Testimonial';
		$PageVar['url'] = 'Add Testimonial';
		$this->set('PageVar',$PageVar);
	}
	public function admin_edit($id = null) {	
		$PageVar = array();	
		$this->Testimonial->id = $id;
		$data = $this->Testimonial->read(null,$id);
		if (!$this->Testimonial->exists()) {
			throw new NotFoundException(__('Invalid Testimonial'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			
			if ($this->Testimonial->save($this->request->data)) {
				$this->Session->setFlash(__('The testimonial has been updated'),'default',array('class'=>'alert alert-success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The testimonial could not be updated. Please, try again.'),'default',array('class'=>'error'));
			}
		} else {
			$this->request->data = $data;
			$PageVar['label'] = 'Edit Testimonial';
			$PageVar['sublabel'] = 'Edit Testimonial';
			$PageVar['url'] = 'Edit Testimonial';
		}
		$this->set('PageVar',$PageVar);
		$this->render('admin_add');
	}

	public function admin_delete($id = null) {
		$this->Testimonial->id = $id;
		if (!$this->Testimonial->exists()) {
			throw new NotFoundException(__('Invalid Testimonial'));
		}
	
		if ($this->Testimonial->delete()) {
			$this->Session->setFlash(__('Testimonial deleted'),'default',array('class'=>'alert alert-success'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Testimonial not deleted'),'default',array('class'=>'alert alert-danger'));
		$this->redirect(array('action' => 'index'));
	}	
	
}
