<?php
	if(!empty($users)){
		foreach($users as $key=>$user):
?>
			<?php 
			if(!empty($user['User']['profile_pic'])){
				$profile = $user['User']['profile_pic'];
			}else{
				$profile = 'default.png';
			}
			?>
			<div class = "practitioner-box col-md-6">
				<img src="<?=IMG_PRACTITIONER.'user/thumb/'.$profile?>" width="80" height="80" style="border-radius:50%">
				<div class="clearfix"></div>
				<input name="data[Appointment][user_id]" multiple="false" class="check_practitioner" value="<?=$user['User']['user_id']?>" type="checkbox">
				<label for="ModelName1" class="selected"><?=$user['User']['first_name'].' '.$user['User']['last_name']?></label>
			</div>
<?php
		endforeach;
	}else{
		echo '<div class="col-md-12"><div class="alert alert-danger text-center"><p>Sorry no practitioner found!</p></div></div>';
	}
?>
<script>
$(function(){
	$('.check_practitioner').click(function(){
		// in the handler, 'this' refers to the box clicked on
		  var $box = $(this);
		  if ($box.is(":checked")) {
			var UserId = $box.val();
			getPractitionerAvailibityAndContactInfo(UserId);
			// the name of the box is retrieved using the .attr() method
			// as it is assumed and expected to be immutable
			var group = "input:checkbox[name='" + $box.attr("name") + "']";
			// the checked state of the group/box on the other hand will change
			// and the current value is retrieved using .prop() method
			$(group).prop("checked", false);
			$box.prop("checked", true);
		  } else {
			$box.prop("checked", false);
		  }
	});
});

function getPractitionerAvailibityAndContactInfo(userId){
	$.ajax({
		url:'<?=WEBROOT?>practioners/getPractitionerAvailibityAndContactInfo',
		method:'POST',
		data:{'user_id':userId},
		beforeSend:function(){
			$('.contact-details').html('<img src="<?=IMG?>loading_small.gif">');
			$('.openig-hours').html('<img src="<?=IMG?>loading_small.gif">');
		},
		success:function(response){
			if(response.length != 0){
				var details = $.parseJSON(response);
				var email = details.ContactInformation.email;
				var contact = details.ContactInformation.contact;
				var user_short_description = details.User.user_short_description;
				var start = details.Availability.start;
				var end = details.Availability.end;
				var Start = End = null;
				if(start !==null && start !== undefined){
					var start = new Date(start);
					var hours = (start.getHours()<10?'0':'') + start.getHours();//returns 0-23
					var minutes = (start.getMinutes()<10?'0':'') + start.getMinutes(); //returns 0-59
					var Start = hours+':'+minutes;
				}
				if(end !==null && start !== undefined){
					var end = new Date(end);
					var hours = (end.getHours()<10?'0':'') + end.getHours();//returns 0-23
					var minutes = (end.getMinutes()<10?'0':'') + end.getMinutes(); //returns 0-59
					var End = hours+':'+minutes;
				}
			}
			if(Start!==null && End!==null){
				$('.openig-hours').html('<h4>Opening Hours</h4><ul><li>Today <span>'+Start+' - '+End+'</span></li></ul>');
			}else{
				$('.openig-hours').html('');
			}
			
			$('.contact-details').html('<h3 class="ptitle">Make an Appointment</h3>'+user_short_description+'<ul><li><img src="<?=WEBROOT?>img/frontend/phone.png" alt=""><span>Phone: <strong>'+contact+'</strong></span></li> <li><img src="<?=WEBROOT?>img/frontend/email.png" alt=""><span>E-mail: <a href="mailto:'+email+'">'+email+'</a></span></li></ul>');
		}
		
	});
	
}
</script>