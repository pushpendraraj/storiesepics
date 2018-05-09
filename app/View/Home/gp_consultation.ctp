<?php
echo $this->Html->css(array('frontend/bootstrap-datepicker3.css'));
echo $this->Html->script(array('frontend/bootstrap-datepicker.min'));
?>
<div class="container">
	<?php extract($PageVar); ?>
<?php echo $this->element('frontend-breadcumb'); ?>
<div class="row">
    <div class="col-md-7 col-sm-8 consultant-content">
        <h4 class="bluetitle">Consult Your GP</h4>
        <div id="bookMessage"></div>
        <div id="bookAnApp">
            <p>Your consultation is secure and is sent to your own GP. </p>
            <p>Our GP and healthcare team will review your answers and recommend advice or treatment. We will then contact you by the end of the next working day. </p>
            <p>The GP may offer you a prescription. You will be able to collect it from your practice or a local pharmacy.</p>
            <p>We will contact you by phone or email by the end of the next working day.</p>
            <p>If you need to order a repeat prescription please visit the GP Admin Area. </p>
        
            <h3 class="ptitle">Before you begin, please tell us:</h3>
            <?php echo $this->Form->create('Appointment',array('url'=>array(),'class'=>'contact-form')); ?>
            <ul class="ques-ans">
                <li>
                    <p>This Medical Practice is where I am registered .</p>
                    <?php   $options = array(
                        1 => 'Yes',
                        2 => 'No'
                        );

                    $attributes = array(
                        'legend' => false,
                        'value' => 1,
						'class' =>'margin1'
                        );

                    echo $this->Form->radio('where_i_am', $options, $attributes); 
                    ?> 
                </li>
                <li>
                    <p>I am 18 or over and I am taking the consultation for myself (and not for my child)?   </p>
                    <?php   $options = array(
                        1 => 'Yes',
                        2 => 'No'
                        );

                    $attributes = array(
                        'legend' => false,
                        'value' => 1,
						'class' =>'margin1'
                        );

                    echo $this->Form->radio('over_18', $options, $attributes); 
                    ?>
                </li>
                <li>
                    <p>The issue I am consulting about is an immediate emergency.	</p>
                    <?php   $options = array(
                        1 => 'Yes',
                        2 => 'No'
                        );

                    $attributes = array(
                        'legend' => false,
                        'value' => 1,
						'class' =>'margin1'
                        );

                    echo $this->Form->radio('emergency', $options, $attributes); 
                    ?>
                </li>
            </ul>
            
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <div class="dropdown form-group">
                      <?php $conditions = $this->General->get_top_conditions(); ?>
                      <?php echo $this->Form->input('condition',array('options'=>$conditions,'label'=>'Condition','class'=>'form-control','div'=>false)); ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="firstStep">
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <label>First Name</label>
                            <?php echo $this->Form->input('first_name',array('class'=>'form-control validate[required]','label'=>false)); ?>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <label>Last Name</label>
                            <?php echo $this->Form->input('last_name',array('class'=>'form-control validate[required]','label'=>false)); ?>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <label>Date of Birth (yyyy-mm-dd)</label>
                            <?php echo $this->Form->input('dob',array('type'=>'text','class'=>'form-control validate[required]','label'=>false)); ?>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <label>Personal Health Number</label>
                            <?php echo $this->Form->input('phn',array('class'=>'form-control validate[required]','label'=>false)); ?>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <label>Phone Number</label>
                            <?php echo $this->Form->input('phone',array('type'=>'tel','class'=>'form-control validate[required]','label'=>false)); ?>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <label>E-mail</label>
                            <?php echo $this->Form->input('email',array('type'=>'email','class'=>'form-control','label'=>false)); ?>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12">
                        <div class="form-group">
                            <label>Notes (optional)</label>
                            <?php echo $this->Form->textarea('notes',array('class'=>'form-control','label'=>false)); ?>
                        </div>
                    </div>
                </div>
				<div class="secondStep"></div>
                <div class="col-md-12 col-sm-12 form-submit text-right">
                    <div class="form-group">
                        <div style="float: left;" class="loader"><img src="<?=IMG?>loading_small.gif"></div>
                        <a href="javascript:void(0)" onclick="get_practitioner(this)" class="nextBnt">Next</a>
                        <?php echo $this->Form->submit('Submit',array('class'=>'SubmitBtn')); ?>
                    </div>
                </div>
            </div>
            <?php echo $this->Form->end(); ?>
        </div>
    </div>
    <?php echo $this->element('frontend-page-rightsidebar'); ?>
</div>
</div>

<script>
$(document).ready(function(){
    $('#AppointmentGpConsultationForm').validationEngine({promptPosition: "topRight"});
    var date_input=$('#AppointmentDob'); //our date input has the name "date"
    date_input.datepicker({
        format: 'yyyy-mm-dd',
        startView: 2,
        todayHighlight: true,
        autoclose: true,
    });
	
	$('#AppointmentCondition').on('change',function(){
		$('.secondStep').hide();
		$('.nextBnt').show();
		$('.SubmitBtn').hide();
	});

    $('.SubmitBtn').on('click',function(e){
        e.preventDefault();
			if(anyonecheckboxischecked()){
				$('.loader').show();
				$.post('<?=WEBROOT?>appointment/bookAnAppointment', $('#AppointmentGpConsultationForm').serialize()).done(function( data ) {
					var jsonData = $.parseJSON(data);
					$('#bookAnApp').hide();
					if(jsonData.status){
						$('#bookMessage').html('<div class="bg-success"><i class="fa fa-check"></i>Your appointment has been scheduled!<span>You will receive an email confirming your appointment</span></div><small>Closing in 30 sec.</small><h3 class="ptitle">Your Appointment Summary</h3><div class="row"><div class="col-md-12 col-sm-12"><ul class="summary-list"><li><strong>First Name </strong>'+jsonData.data.Appointment.first_name+'</li><li><strong>Last Name</strong> '+jsonData.data.Appointment.last_name+'</li><li><strong>Date of Birth</strong> '+jsonData.data.Appointment.dob+'</li><li><strong>Personal Health Number</strong> '+jsonData.data.Appointment.phn+'</li><li><strong>Phone Number </strong> '+jsonData.data.Appointment.phone+'</li><li><strong>E-mail</strong> '+jsonData.data.Appointment.email+'</li></ul></div></div>');
					}else{
					   $('#bookMessage').html('<div class="alert alert-danger">'+jsonData.message+'</div>'); 
					}
					$('.loader').hide();
					setTimeout(function(){
						window.location.href = window.location.href;
					},30000);
				});
			}else{
				alert('Please select any one of practitioner first!');
			}
    });
});

function anyonecheckboxischecked(){
	var atLeastOneIsChecked = false;
	$('input:checkbox').each(function () {
		if ($(this).is(':checked')) {
		  atLeastOneIsChecked = true;
		  // Stop .each from processing any more items	  
		}
	});
	return atLeastOneIsChecked;
}


function get_practitioner(obj){
    var condition = $('#AppointmentCondition').val();
	if((!$("#AppointmentFirstName").validationEngine('validate'))&&(!$("#AppointmentLastName").validationEngine('validate'))&&(!$("#AppointmentDob").validationEngine('validate'))&&(!$("#AppointmentPhn").validationEngine('validate'))&&(!$("#AppointmentPhone").validationEngine('validate'))&&(!$("#AppointmentEmail").validationEngine('validate'))){
		$.ajax({
			url:'<?=WEBROOT?>practioners/get_practioners',
			method:'POST',
			data:{'condition_id':condition},
			beforeSend:function(){
				$('.loader').show();
			},
			success:function(response){
				$('.secondStep').html(response);
				$('.loader').hide();
				$('.secondStep').show();
				$(obj).hide();
				$('.SubmitBtn').show();
			}
		});
	}
}
</script>