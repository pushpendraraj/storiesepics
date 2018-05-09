<?php
class HomeController extends AppController {

	public $name = 'Home';
	public $helpers = array('Form', 'Html', 'Js','General');
	public $uses = array('Content');	
	public $components=array('Core');	
	
	function beforeFilter(){
		parent::beforeFilter();
		$this->Auth->allow(array('index','gp_consultation','health_information','services','contact','about','care_quality_commission','our_team','timetable','find_conditions','condition','callback','pharmistic_advice','learn'));		
	}	
		
	function index() {
		$PageVar = array();
		$this->set('title_for_layout','Home | Patient Care');
		$testimonials = $this->Testimonial->find('all',array('conditions'=>array('status'=>'Publish')));
		$PageVar['Testimonials'] = $testimonials;
		
		$content = $this->Content->find('all',array('conditions'=>array('page_id'=>array(19,20,23),'status'=>'Publish')));
		$PageVar['Content'] = $content;
		
		$this->set('PageVar',$PageVar);
	}

	function gp_consultation(){
		$PageVar = array();	
		$this->set('title_for_layout','GP Consultation | Patient Care');
		$PageVar['label'] = 'GP Consultation';
		$PageVar['url'] = 'GP Consultation';
		$this->set('PageVar',$PageVar);
	}
	function callback(){
		$PageVar = array();	
		$this->set('title_for_layout','NHS 111 Service | Patient Care');
		$PageVar['label'] = 'NHS 111 Service';
		$PageVar['url'] = 'NHS 111 Service';
		$content = $this->Content->find('first',array('conditions'=>array('page_id'=>21,'status'=>'Publish')));
		$PageVar['Content'] = $content;
		$this->set('PageVar',$PageVar);
	}
	
	function pharmistic_advice($slug){
		$PageVar = array();	
		$subcondition = $this->SubCondition->find('first',array('conditions'=>array('SubCondition.slug'=>$slug),'fields'=>array('SubCondition.pharmacist_help','SubCondition.condition')));
		$this->set('title_for_layout','Getting help for '.$subcondition['SubCondition']['condition'].' from your pharmacist | Patient Care');
		$PageVar['label'] = 'Getting help for '.$subcondition['SubCondition']['condition'].' from your pharmacist';
		$PageVar['url'] = 'Getting help for '.$subcondition['SubCondition']['condition'].' from your pharmacist';
		$PageVar['SubCondition'] = $subcondition;
		$this->set('PageVar',$PageVar);
	}
	
	function learn($slug){
		$PageVar = array();	
		$subcondition = $this->SubCondition->find('first',array('conditions'=>array('SubCondition.slug'=>$slug),'fields'=>array('SubCondition.*')));
		$this->set('title_for_layout','Learn more about '.$subcondition['SubCondition']['condition'].' | Patient Care');
		$PageVar['label'] = 'Learn more about '.$subcondition['SubCondition']['condition'];
		$PageVar['url'] = 'Learn more about '.$subcondition['SubCondition']['condition'];
		$PageVar['SubCondition'] = $subcondition;
		$this->set('PageVar',$PageVar);
	}
	
	function health_information(){
		$PageVar = array();	
		$this->set('title_for_layout','Health Information | Patient Care');
		$PageVar['label'] = 'Health Information';
		$PageVar['url'] = 'Health Information';
		
		$commonSubConditions = $this->SubCondition->find('all',array('conditions'=>array('status'=>'Publish'),'fields'=>array('SubCondition.condition','SubCondition.slug'),'limit'=>5,'order'=>'id DESC'));
		$PageVar['commonSubConditions'] = $commonSubConditions;
		$content = $this->Content->find('first',array('conditions'=>array('page_id'=>22,'status'=>'Publish')));
		$PageVar['Content'] = $content;
		$this->set('PageVar',$PageVar);
	}
	
	function find_conditions(){
		$PageVar = array();	
		$this->set('title_for_layout','Find Condition & Treatment | Patient Care');
		$PageVar['label'] = 'Find Conditions & Treatments';
		$PageVar['url'] = 'Find Conditions & Treatments';
		
		$commonSubConditions = $this->SubCondition->find('all',array('conditions'=>array('status'=>'Publish'),'limit'=>5,'order'=>'id DESC'));
		$PageVar['commonSubConditions'] = $commonSubConditions;
		$content = $this->Content->find('first',array('conditions'=>array('page_id'=>22,'status'=>'Publish')));
		$PageVar['Content'] = $content;
		$this->set('PageVar',$PageVar);
	}

	function services(){
		$PageVar = array();	
		$this->set('title_for_layout','Services | Patient Care');
		$PageVar['label'] = 'Services';
		$PageVar['url'] = 'Services';
		$conditions = array(
			'UserRole.user_role_id'=>1,
			'Service.status'=>'Active'
		);
		$joins = array(
			array(
				'table'=>'users',
				'alias'=>'User',
				'type'=>'INNER',
				'conditions'=>'User.user_id = Service.user_id'
			),
			array(
				'table'=>'user_roles',
				'alias'=>'UserRole',
				'type'=>'INNER',
				'conditions'=>'UserRole.user_role_id = User.user_role_id'
			)
		);
		
		$services = $this->Service->find('all',array('conditions'=>$conditions,'joins'=>$joins));
		$PageVar['services'] = $services;
		$this->set('PageVar',$PageVar);
	}

	function contact(){
		$PageVar = array();	
		$this->set('title_for_layout','Contact Us | Patient Care');
		$PageVar['label'] = 'Contact';
		$PageVar['url'] = 'Contact';
		$this->set('PageVar',$PageVar);
	}

	function about(){
		$PageVar = array();	
		$this->set('title_for_layout','About Us | Patient Care');
		$PageVar['label'] = 'About';
		$PageVar['url'] = 'About';
		$this->set('PageVar',$PageVar);
	}

	function care_quality_commission(){
		$PageVar = array();	
		$this->set('title_for_layout','Care Quality Commission | Patient Care');
		$PageVar['label'] = 'CQC';
		$PageVar['url'] = 'Care Quality Commission';
		$this->set('PageVar',$PageVar);
	}

	function our_team(){
		$PageVar = array();	
		$this->set('title_for_layout','Our Time | Patient Care');
		$PageVar['label'] = 'Our Time';
		$PageVar['url'] = 'Our Time';
		$this->set('PageVar',$PageVar);
	}

	function timetable(){
		$PageVar = array();	
		$this->set('title_for_layout','Time Table | Patient Care');
		$PageVar['label'] = 'Time Table';
		$PageVar['url'] = 'Opening Times';
		$this->set('PageVar',$PageVar);
	}

	function admin_index() {
		$PageVar = array();	
		$this->set('title_for_layout','Dashboard');
		$PageVar['user_count'] = $this->Core->findCount('User',array('User.user_status'=>1));
		$PageVar['template_count'] = $this->Core->findCount('EmailTemplate',array('EmailTemplate.template_status'=>'Active'));
		$this->set('PageVar',$PageVar);
	}

	function practitioner_index(){
		$PageVar = array();	
		$this->set('title_for_layout','Dashboard');
		$PageVar['availibility_count'] = $this->Core->findCount('Availability',array('Availability.user_id'=>$this->Auth->user('user_id'),'date(start) >='=>date('Y-m-d'),'date(end) >='=>date('Y-m-d')));
		$PageVar['appointment_count'] = $this->Core->findCount('Appointment',array('Appointment.user_id'=>$this->Auth->user('user_id'),'date(created_at) >='=>date('Y-m-d')));
		$this->set('PageVar',$PageVar);
	}
	
	function condition($slug){
		$PageVar = array();	
		$subcontion = $this->SubCondition->find('first',array('conditions'=>array('SubCondition.slug'=>$slug,'SubCondition.status'=>'Publish'),'fields'=>array('SubCondition.slug','SubCondition.condition')));
		
		$this->set('title_for_layout',$subcontion['SubCondition']['condition']." | Patient Care");
		$PageVar['label'] = $subcontion['SubCondition']['condition'];
		$PageVar['url'] = $subcontion['SubCondition']['condition'];
		$this->set('PageVar',$PageVar);
	}
	
}
