<div class="contents view">
<h2><?php App::uses('Sanitize','Utility');   echo __('Products'); ?></h2>
	<dl>
		<dt><?php echo __('product id'); ?></dt>
		<dd>:&nbsp;
			<?php echo h($product[0]['Product']['product_id']); ?>
			
		</dd>
		<dt><?php echo __('Product Title'); ?></dt>
		<dd>:&nbsp;
			<?php echo h($product[0]['Product']['product_title']); ?>
		
		</dd>
		<dt><?php echo __('Product Slug'); ?></dt>
		<dd>:&nbsp;
			<?php echo h($product[0]['Product']['product_slug']); ?>
		
		</dd>
		<dt><?php echo __('Product Image'); ?></dt>
		<dd>:&nbsp;
			<?php echo $this->html->image('upload/small/'.$product[0]['Product']['product_image'],array('width'=>'50px')); ?>
		
		</dd>
		<dt><?php echo __('Product Description'); ?></dt>
		<dd>:&nbsp;
			<?php echo html_entity_decode($product[0]['Product']['product_description']); ?>
		
		</dd>
		
		<dt><?php echo __('Product Cost'); ?></dt>
		<dd>:&nbsp;
			<?php echo h($product[0]['Product']['product_cost']); ?>
		
		</dd>
		
		<dt><?php echo __('Product sqcode'); ?></dt>
		<dd>:&nbsp;
			<?php echo ($product[0]['Product']['product_sqcode']); ?>
		
		</dd>
		<dt><?php echo __('Product Category'); ?></dt>
		<dd>:&nbsp;
			<?php echo h($product[0]['Product']['product_category']); ?>
		
		</dd>
<dt><?php echo __('Product Specification'); ?></dt>
<dd>:&nbsp;
			<?php echo h($product[0]['Product']['product_specification']); ?>
		
		</dd>
<dt><?php echo __('Product Added date'); ?></dt>
<dd>:&nbsp;
			<?php echo h($product[0]['Product']['product_added']); ?>
		
		</dd>
<dt><?php echo __('Product Modify date'); ?></dt>
<dd>:&nbsp;
			<?php echo h($product[0]['Product']['product_updated']); ?>
		
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Product'), array('action' => 'edit', $product[0]['Product']['product_id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Product'), array('action' => 'delete', $product[0]['Product']['product_id']), null, __('Are you sure you want to delete # %s?', $product[0]['Product']['product_id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Product'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product'), array('action' => 'add')); ?> </li>
	</ul>
</div>
