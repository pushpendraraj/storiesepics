<section class="content-header">
  <h1>
    <?php echo __('Slides');?>
    <small>List of slides</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?=PRACTITIONER_WEBROOT;?>home"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active"><?php echo __('Slides');?></li>
  </ol>
</section>
<section class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box box-primary">
			<?php if(!empty($Slides)){?>
			<table class="table table-hover">
				<tr><th><?php echo $this->Paginator->sort('slide_title');?></th><th><?php echo $this->Paginator->sort('slide_description');?></th><th><?php echo $this->Paginator->sort('image');?></th><th><?php echo $this->Paginator->sort('status');?></th><th class="pull-right"><?php echo __('Actions');?></th></tr>
				<?php
				foreach ($Slides as $slide):
				?>
				<tr>
					<td><?php echo $slide['Slide']['slide_title']; ?></td>
					<td><?php echo $slide['Slide']['slide_description']; ?></td>
					<td><img src="<?=IMG_PRACTITIONER.'slides/'.$slide['Slide']['image']; ?>" height="50" width="50" ></td>
					<td><?php echo $slide['Slide']['status']; ?></td>
					<td class="pull-right">
						<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $slide['Slide']['slide_id']),array('class'=>'btn btn-default btn-sm btn-primary')); ?>
						<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $slide['Slide']['slide_id']), array('class'=>'btn btn-default btn-sm btn-danger'), sprintf(__('Are you sure you want to delete # %s?', true), $slide['Slide']['slide_id'])); ?>
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
