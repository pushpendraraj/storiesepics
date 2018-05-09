<div class="container">
	<div class="tab-content">
		<div role="tabpanel" class="tab-pane active" id="alphbetsec">
			<ul class="alphabets">
				<?php
				$i = 1;
				foreach (range('A', 'Z') as $column){
					$active = ($i==1)?'active':'';
				?>
					<li class="<?=$active?>">
						<a href="javascript:void(0)" onclick="get_sub_conditions('<?=$column?>')"><?=$column?></a>
					</li>
				<?php
					$i++;
				}   	
				?>
			</ul>
			<ul class="infolist_details" id="conditionbyalphabate"></ul>
		</div>
		<div role="tabpanel" class="tab-pane" id="common"></div>
	</div>
</div>
<script>
$(document).ready(function(){
	var startWith = 'A';
	get_sub_conditions(startWith);
});


function get_conditions(){
	$.ajax({
		url : '<?=WEBROOT?>Common/get_conditions',
		method : 'POST',
		data : {},
		beforeSend : function(){
			$('#common').css('text-align','center');
			$('#common').html('<img src="<?=IMG?>loading_medium.gif">');
		},
		success : function(response){
			$('#common').css('text-align','');
			$('#common').html(response);
		}
	});
}

function get_sub_conditions(startWith){
	$.ajax({
		url : '<?=WEBROOT?>Common/get_sub_conditions/Publish',
		method : 'POST',
		data : {'start_with':startWith},
		beforeSend : function(){
			$('#conditionbyalphabate').css('text-align','center');
			$('#conditionbyalphabate').html('<img src="<?=IMG?>loading_medium.gif">');
		},
		success : function(response){
			$('#conditionbyalphabate').css('text-align','');
			$('#conditionbyalphabate').html(response);
		}
	});
}
</script>