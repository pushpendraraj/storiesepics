<?php
class CoreComponent extends Component  {

	function __construct($collection, $settings){
		$this->Controller = $collection->getController();
	}

	function generatePassword ($length = 10){ 
        // inicializa variables 
        $password = ""; 
        $i = 0; 
        $possible = "0123456789abcdefghijklmnopqrstuvwxyz[]*()=_-+#@!";  
         
        // agrega random 
        while ($i < $length){ 
            $char = substr($possible, mt_rand(0, strlen($possible)-1), 1); 
             
            if (!strstr($password, $char)) {  
                $password .= $char; 
                $i++; 
            } 
        } 
        return $password; 
    }

    function getSubContionByCondition($id = '', $startWith = '', $status = '' ){
        $conditions = $subconditions = array();
        $SubCategory = ClassRegistry::init('SubCondition');
        if(!empty($id)){
            $conditions[] = array('SubCondition.condition_id'=>$id);
        }
		if(!empty($status)){
            $conditions[] = array('SubCondition.status'=>trim($status));
        }
		
		if(!empty($startWith)){
			$conditions[] = array('SubCondition.condition LIKE'=>$startWith.'%');
			$subconditions = $SubCategory->find('list',array('conditions'=>$conditions,'fields'=>array('SubCondition.slug','SubCondition.condition')));
		}else{
			$subconditions = $SubCategory->find('list',array('conditions'=>$conditions,'fields'=>array('SubCondition.id','SubCondition.condition')));
		}
		return $subconditions;
    } 
	
	function getContionByCondition($id = ''){
        $conditions = $subconditions = array();
        $Category = ClassRegistry::init('Condition');
		$joins = array(
			array(
				'table'=>'sub_conditions',
				'alias'=>'SubCondition',
				'type'=>'LEFT',
				'conditions'=>'SubCondition.condition_id = Condition.id'
			)		
		);
        if(!empty($id)){
            $conditions[] = array('Condition.id'=>$id);
        }
	
        $conditions = $Category->find('list',array('conditions'=>$conditions,'joins'=>$joins,'fields'=>array('SubCondition.slug','SubCondition.condition','Condition.condition'),'order'=>'Condition.condition ASC'));
		
		
		return $conditions;
    } 
	
	function getContionlist($status = ''){
        $conditions = array();
        $Category = ClassRegistry::init('Condition');
        if(!empty($status)){
            $conditions[] = array('Condition.status'=>$status);
        }
		
        $conditions = $Category->find('list',array('conditions'=>$conditions,'fields'=>array('Condition.id','Condition.condition'),'order'=>'Condition.condition ASC'));

		return $conditions;
    }
	
	function getPractitionerAvailibityAndContactInfo($userId){
		$info = array();
		$month = date('m');
		$day = date('d');
		$contactInfoObj = ClassRegistry::init('ContactInformation');
		$conditions = array(
			'ContactInformation.user_id'=>$userId
		);
		$joins = array(
			array(
				'table'=>'users',
				'alias'=>'User',
				'type'=>'INNER',
				'conditions'=>array('User.user_id = ContactInformation.user_id')
			),
			array(
				'table'=>'availabilities',
				'alias'=>'Availability',
				'type'=>'LEFT',
				'conditions'=>array(
					'Availability.user_id = ContactInformation.user_id',
					'month(Availability.start)'=>$month,
					'day(Availability.start)'=>$day,
					'month(Availability.end)'=>$month,
					'day(Availability.end)'=>$day
				)
			)
		);
		$fields = array(
			'ContactInformation.email',
			'ContactInformation.contact',
			'User.user_short_description',
			'Availability.*'
		);
		
		$info = $contactInfoObj->find('first',array('conditions'=>$conditions,'joins'=>$joins,'fields'=>$fields));
		return $info;
	}
	
	function findCount($model,$condtions=array()){
		$model = ClassRegistry::init($model);
		return $model->find('count',array('conditions'=>$condtions));
	}
	
}
