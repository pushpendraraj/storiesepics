<div class="body_container">
<div class="wrapper">
<?php echo $this->Html->script(array('faq'));?>
<div class="row">
<?php if($PageContent['Content']['page_slug']){ ?>
<h3><?php echo $PageContent['Content']['page_title']; ?></h3>
<?php if($PageContent['Content']['page_sub_title']){echo '<h4>'.$PageContent['Content']['page_sub_title'].'</h4>';} ?>
<?php echo html_entity_decode($PageContent['Content']['page_content']); }else{
	 echo '<h4>Sorry, Page not found.</h4>';
	} ?>
</div>
</div>
</div>