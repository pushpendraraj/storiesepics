<?php 
class UserTagsController extends AppController {
	public $name = 'UserTags';
	public $uses = array('UserTag','User', 'Tag');

	public function admin_index(){
		$this->set('Tags', $this->paginate('Tag'));
	}

	public function admin_user_tag(){
		$this->set('UserTags', $this->paginate('UserTag'));
	}

	public function admin_delete($id=null){
		$this->Tag->id = $id;
		if(!$id){
			$this->Session->setFlash(__('Invalid id for tag', true),'default',array('class'=>'alert alert-danger'));
			$this->redirect(array('action'=>'index'));
		}
		if($this->Tag->delete($id)){
			$this->Session->setFlash(__('Tag deleted successfully', true),'default', array('class'=>'alert alert-success'));
			$this->redirect(array('action' => 'index'));
		}else{
			$this->Session->setFlash(__('The tag could not be deleted', true),'default',array('class'=>'alert alert-danger'));
			$this->redirect(array('action' => 'index'));
		}
	} 


	public function admin_add(){
		if($this->request->is('post')){
			$this->Tag->create();
			$this->request->data['Tag']['created_at'] = date('Y-m-d H:i:s');
			$this->request->data['Tag']['modified_at'] = date('Y-m-d H:i:s');
			if($this->Tag->save($this->request->data)){
				$this->Session->setFlash(__('The tag added successfully',true),'default',array('class'=>'alert alert-success'));
				$this->redirect(array('action' => 'index'));
			}else{
				$this->Session->setFlash(__('The tag could not be saved. Please, try again.',true),'default',array('class'=>'alert alert-danger'));
			}	
		}
	}
} 

?>