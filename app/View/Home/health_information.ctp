<?php
	echo $this->Html->css(array('frontend/source/jquery.fancybox'));
	echo $this->Html->script(array('frontend/source/jquery.fancybox','frontend/source/helpers/jquery.fancybox-media'));
?>
<div class="container">     
    <?php 
		extract($PageVar); 
		extract($Content); 
	?>
    <?php echo $this->element('frontend-breadcumb'); ?>  
    <div class="row">
        <div class="col-md-7 col-sm-7">
            <div class="green_health">
                <div class="health_details">
                    <h3>Health A-Z</h3>
                    <p>Symptoms , conditions, medicines and treatment</p>
                    <a href="<?=WEBROOT?>home/find_conditions">Find Conditions & Treatments</a>
                </div>
                <div class="health_list">
                    <h4>Most Common</h4>
                    <ul>
						<?php foreach($commonSubConditions as $key=>$value): ?>
							<li><a href="<?=WEBROOT?>home/condition/<?=$value['SubCondition']['slug']?>"><?=$value['SubCondition']['condition']?></a></li>
						<?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-5 col-sm-5 health-video">
            <a class="fancybox-media" href="http://www.youtube.com/watch?v=opj24KnzrWo" ><img src="<?=IMG_FRONT?>vdo1.png" alt=""></a>
        </div>
        
        <div class="health_description col-md-12">
		<?php 
		if(!empty($Content)) { 
			extract($Content);
		?>
             <h4><?=$page_title?></h4>
             <?=$page_content?>
		<?php } ?>
        </div>
    </div>
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