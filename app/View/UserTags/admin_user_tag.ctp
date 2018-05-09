<section class="content-header">
	<h1>
		<?php echo __('User Tags');?>
		<small>List of user tags</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="<?=ADMIN_WEBROOT;?>home"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active"><?php echo __('Users');?></li>
	</ol>
</section>
<section class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box box-primary">
				<?php if(isset($UserTags)){?>
				<table class="table table-hover">
					<tr>
						<th><?php echo $this->Paginator->sort('user_id','User Name');?></th>
						<th><?php echo $this->Paginator->sort('tag_name');?></th>
						<th><?php echo $this->Paginator->sort('status');?></th>
						<th><?php echo __('Actions');?></th>
					</tr>
					<?php
					foreach ($UserTags as $tag):
						?>
						<tr>
							<td><?php echo $tag['User']['full_name']; ?></td>
							<td><?php echo $tag['UserTag']['tag_name']; ?></td>
							<td><?php echo ($tag['UserTag']['status'])?'Active':'Inactive'; ?></td>
							<td>
								<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $tag['UserTag']['id']), array('class'=>'btn btn-default btn-sm btn-danger'), sprintf(__('Are you sure you want to delete %s?', $tag['UserTag']['tag_name']))); 
								?>
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
