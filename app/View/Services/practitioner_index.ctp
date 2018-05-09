<section class="content-header">
  <h1>
    <?php echo __('Services');?>
    <small>List of services</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?=PRACTITIONER_WEBROOT;?>home"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active"><?php echo __('Services');?></li>
  </ol>
</section>
<section class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box box-primary">
			<?php if(!empty($Services)){?>
			<table class="table table-hover">
				<tr><th><?php echo $this->Paginator->sort('service_title');?></th><th><?php echo $this->Paginator->sort('short_description');?></th><th><?php echo $this->Paginator->sort('status');?></th><th class="pull-right"><?php echo __('Actions');?></th></tr>
				<?php
				foreach ($Services as $service):
				?>
				<tr>
					<td width="20%"><?php echo $service['Service']['service_title']; ?></td>
					<td width="50%"><?php echo $service['Service']['short_description']; ?></td>
					<td width="10%"><?php echo $service['Service']['status']; ?></td>
					<td class="pull-right">
						<?php echo $this->Html->link(__('View', true), array('action' => 'view', $service['Service']['service_id']),array('class'=>'btn btn-default btn-sm btn-info')); ?>
						<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $service['Service']['service_id']),array('class'=>'btn btn-default btn-sm btn-primary')); ?>
						<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $service['Service']['service_id']), array('class'=>'btn btn-default btn-sm btn-danger'), sprintf(__('Are you sure you want to delete # %s?', true), $service['Service']['service_id'])); ?>
					</td>
				</tr>
				<?php endforeach; ?>
			</table>
			<div class="pull-left">
				<p>
				<?php
				echo $this->Paginator->counter(array(
				'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
				));
				?>	
				</p>
			</div>
			<div class="paging pull-right">
				<?php echo $this->Paginator->prev('<< ' . __('previous', true), array('class'=>'btn btn-primary'), null, array('class'=>'disabled btn btn-default'));?>
			 | 	<?php echo $this->Paginator->numbers();?>
		 	 |	<?php echo $this->Paginator->next(__('next', true) . ' >>', array('class'=>'btn btn-primary'), null, array('class' => 'disabled  btn btn-default'));?>
			</div>
			<?php }else{ ?>
				<div class="alert alert-danger">Records not found.</div>
			<?php	} ?>
			</div>
		</div>
	</div>
</section>
