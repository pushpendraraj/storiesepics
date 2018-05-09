<div class="container">     
    <?php 
		extract($PageVar); 
		extract($Content); 
	?>
    <?php echo $this->element('frontend-breadcumb'); ?>  
</div>
<div class="container">
	<div class="col-md-9">
		<?=$Content['page_content']?>
	</div>
	<div class="col-md-3">
		<img src="<?=IMG_FRONT?>nhs-111.jpg" class="img-responsive">
	</div>
</div>