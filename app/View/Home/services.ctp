<div class="container">
    <?php extract($PageVar); ?>
    <?php echo $this->element('frontend-breadcumb'); ?>
    <div class="row">
        <div class="col-md-8 col-sm-8">
            <div class="panel-group cqc-accordian services" id="accordion" role="tablist" aria-multiselectable="true">
			<?php 
				if(!empty($services)){
					$i=1;
					foreach($services as $key=>$service): 	
			?>
					<div class="panel panel-default <?php echo ($i==1)?'active':''; ?>">
						<div class="panel-heading" role="tab" id="headingOne">
						  <h4 class="panel-title">
							<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?=$service['Service']['service_id']?>" aria-expanded="true" aria-controls="collapse<?=$service['Service']['service_id']?>">
								<?=$service['Service']['service_title']?>
							</a>
						  </h4>
						</div>
						<div id="collapse<?=$service['Service']['service_id']?>" class="panel-collapse collapse <?php echo ($i==1)?'in':''; ?>" role="tabpanel" aria-labelledby="headingOne">
							<div class="panel-body">
								<?=$service['Service']['details_description']?>
							</div>
						</div>
					  </div>
			
			<?php 
					$i++;
					endforeach;
				}else{
					echo '<div class="alert text-center alert-danger"><p>No services found!</p></div>';
				}
			?>
            </div>
        </div>
        <?php echo $this->element('frontend-page-rightsidebar'); ?>
    </div>
</div>