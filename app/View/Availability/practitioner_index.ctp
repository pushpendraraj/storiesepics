<section class="content-header">
  <h1>
    <?php echo __('Availability');?>
    <small>Practitioner availabilities &nbsp;&nbsp;<a data-toggle="modal" data-target="#SetAvailability" href="javascript:void(0)"><i class="fa fa-pencil-square"></i> Set Availability</a></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?=PRACTITIONER_WEBROOT;?>home"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active"><?php echo __('Practitioner availabilities');?></li>
  </ol>
</section>
<section class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box box-primary">
			<?php if(!empty($Availabilities)){?>
			<table class="table table-hover">
				<tr><th><?php echo $this->Paginator->sort('start','Start Time');?></th><th><?php echo $this->Paginator->sort('end','End Time');?></th></tr>
				<?php
				foreach ($Availabilities as $Availability):
				?>
				<tr>
					<td><?php echo $Availability['Availability']['start']; ?></td>
					<td><?php echo $Availability['Availability']['end']; ?></td>
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
<!-- Modal -->
<div id="SetAvailability" class="modal modal-info fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Set Availability</h4>
      </div>
      <?php echo $this->Form->create('Availability'); ?>
      <div class="modal-body">
        <div class="col-md-3">Start Time : </div><div class="col-md-9"><?php echo $this->Form->input('start',array('placeholder'=>'Start Time','label'=>false)); ?></div>
        <div class="col-md-3">End Time : </div><div class="col-md-9"><?php echo $this->Form->input('end',array('placeholder'=>'End Time','label'=>false)); ?></div>
      </div>
      <div class="modal-footer clearfix">
        <button type="submit" class="btn btn-success update pull-left">Set Availability</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
      <?php echo $this->Form->end(); ?>
    </div>

  </div>
<!-- end model -->
</div>
