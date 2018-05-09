<div class="container">     
    <?php 
		extract($PageVar); 
		extract($Content); 
	?>
    <?php echo $this->element('frontend-breadcumb'); ?>  
</div>
    
<div class="infopage">   
    <div class="health-tabbing">
        <div class="container">
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#alphbetsec" onclick="get_sub_conditions('A')" aria-controls="alphbetsec" role="tab" data-toggle="tab">A-Z conditions</a></li>
                <li role="presentation"><a href="#common" onclick="get_conditions()" aria-controls="common" role="tab" data-toggle="tab">common conditions</a></li>
            </ul>
        </div>
    </div>
	<?php echo $this->element('frontend-condition-toolbar'); ?> 
</div>