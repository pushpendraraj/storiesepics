<?php 
if(!empty($Conditions)){
	echo '<ul class="infolist_details">';
	$i =1;
	foreach($Conditions as $key=>$value):
		$style = ($i%4)?'':'clear:both';
		echo '<li style="'.$style.'">'.'<b>'.$key.'</b>';
			echo '<ul class="sub-condition-list">';
				foreach($value as $k=>$val):
					echo '<li><a href="'.WEBROOT.'home/gp_consultation?condition='.$k.'">'.$val.'</a></li>';		
				endforeach;
			echo '</ul></li>';
		$i++;
	endforeach;
	echo '</ul>';
}
?>