<?php
App::uses('String', 'Utility');
?>
<div class="contents index">
	<h2><?php echo __('Products'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('product_title'); ?></th>
			<th><?php echo $this->Paginator->sort('product_slug'); ?></th>
			<th><?php echo $this->Paginator->sort('product_image'); ?></th>
			<th><?php echo $this->Paginator->sort('product_description'); ?></th>
			<th><?php echo $this->Paginator->sort('product_cost'); ?></th>
			<th><?php echo $this->Paginator->sort('product_sqcode'); ?></th>
			<th><?php echo $this->Paginator->sort('product_category'); ?></th>
			<th><?php echo $this->Paginator->sort('product_specification'); ?></th>
			<th><?php echo $this->Paginator->sort('product_added'); ?></th>
			<th><?php echo $this->Paginator->sort('product_updated'); ?></th>			
		    <th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($Products as $content):  ?>
	<tr>
		<td><?php echo h($content['Product']['product_title']); ?>&nbsp;</td>
		<td><?php echo h($content['Product']['product_slug']); ?>&nbsp;</td>
		<td><?php echo $this->html->image('upload/small/'.$content['Product']['product_image'],array('width'=>'70px'));  ?>&nbsp;</td>
<td><?php echo substr(html_entity_decode($content['Product']['product_description']),0,50).'.....'; ?>&nbsp;</td>
		<td><?php echo h($content['Product']['product_cost']); ?>&nbsp;</td>
<td><?php echo h($content['Product']['product_sqcode']); ?>&nbsp;</td>
		<td><?php echo h($content['Product']['product_category']); ?>&nbsp;</td>
<td><?php echo h($content['Product']['product_specification']); ?>&nbsp;</td>
		<td><?php echo h($content['Product']['product_added']); ?>&nbsp;</td>
<td><?php echo h($content['Product']['product_updated']); ?>&nbsp;</td>
	 <td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $content['Product']['product_id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $content['Product']['product_id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $content['Product']['product_id']), null, __('Are you sure you want to delete?')); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>

	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Product'), array('action' => 'add')); ?></li>
	</ul>
</div>