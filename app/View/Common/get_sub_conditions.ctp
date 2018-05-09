<?php 
if(!empty($Subconditions)){
	foreach($Subconditions as $key=>$value):
		echo '<li><a href="'.WEBROOT.'home/condition/'.$key.'">'.$value.'</a></li>';
	endforeach;
}
?>