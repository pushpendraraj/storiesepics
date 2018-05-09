<section class="content-header">
  <h1>
    <?php echo __('Team Members');?>
    <small>List of members</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?=PRACTITIONER_WEBROOT;?>home"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active"><?php echo __('Team Members');?></li>
  </ol>
</section>
<section class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box box-primary">
			<?php if(!empty($Members)){?>
			<table class="table table-hover">
				<tr><th><?php echo $this->Paginator->sort('name');?></th><th><?php echo $this->Paginator->sort('short_description');?></th><th><?php echo $this->Paginator->sort('status');?></th><th class="pull-right"><?php echo __('Actions');?></th></tr>
				<?php
				foreach ($Members as $member):
				?>
				<tr>
					<td><?php echo $member['TeamMember']['name']; ?></td>
					<td><?php echo $member['TeamMember']['short_description']; ?></td>
					<td><?php echo $member['TeamMember']['status']; ?></td>
					<td class="pull-right">
						<?php echo $this->Html->link(__('View', true), array('action' => 'view_member', $member['TeamMember']['member_id']),array('class'=>'btn btn-default btn-sm btn-info')); ?>
						<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit_member', $member['TeamMember']['member_id']),array('class'=>'btn btn-default btn-sm btn-primary')); ?>
						<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete_member', $member['TeamMember']['member_id']), array('class'=>'btn btn-default btn-sm btn-danger'), sprintf(__('Are you sure you want to delete # %s?', true), $member['TeamMember']['member_id'])); ?>
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
