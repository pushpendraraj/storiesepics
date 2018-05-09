<div class="contents form">
<?php echo $this->Form->create('Product',array('type'=>'file')); ?>
	<fieldset>
		<legend><?php echo __('Edit Product'); ?></legend>
	<?php
		echo $this->Form->input('product_title');
		echo $this->Form->input('product_slug',array('size'=>40,'after'=>'&nbsp;(It will be shown in URL.)'));
		echo $this->Form->input('product_image',array('type'=>'hidden','default'=>$this->request->data['Product']['product_image']));
		echo $this->Form->input('product_image_new',array('type'=>'file'));
		echo $this->Form->input('product_cost');
		echo $this->Form->input('product_sqcode');
		echo $this->Form->input('product_category');
		echo $this->Form->input('product_specification',array('type'=>'text'));
		echo $this->Form->input('product_description',array('class'=>'text-editor'));
		
		
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Products'), array('action' => 'index')); ?></li>
	</ul>
</div>
<script type="text/javascript">
function getProductSlug(){
	var str='';
	str+=$("input[name='data[Product][product_name]']").val().replace(/ /g,"_");
	$("input[name='data[Product][product_slug]']").val(str.toLowerCase());

}
</script>