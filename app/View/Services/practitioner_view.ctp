<section class="content-header">
  <h1>
    <?php echo __('Service Details');?>
    <small>Details of service</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?=PRACTITIONER_WEBROOT;?>home"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active"><?php echo __('Service Details');?></li>
  </ol>
</section>
<section class="content">
	<div class="row">
		<div class="col-xs-6">
			<ul class="list-unstyled view-action">
				<li><?php echo $this->Html->link(__('Edit Service', true), array('action' => 'edit', $Service['Service']['service_id']),array('class'=>'btn btn-default btn-sm btn-primary')); ?> </li>
				<li><?php echo $this->Html->link(__('Delete Service', true), array('action' => 'delete', $Service['Service']['service_id']), array('class'=>'btn btn-default btn-sm btn-danger'), sprintf(__('Are you sure you want to delete # %s?', true), $Service['Service']['service_id'])); ?> </li>
				<li><?php echo $this->Html->link(__('List Services', true), array('action' => 'index'),array('class'=>'btn btn-default btn-sm btn-info')); ?> </li>
				<li><?php echo $this->Html->link(__('New Service', true), array('action' => 'add'),array('class'=>'btn btn-default btn-sm btn-success')); ?> </li>
			</ul>
		</div>
		<div class="col-xs-12">
			<div class="box box-primary">
			<table class="table table-bordered">
				<tr><td>Sercie Title : </td><td><?php echo $Service['Service']['service_title']; ?></td></tr>
				<tr><td>Image : </td><td><?php if(!empty($Service['Service']['image'])){ ?><img src="<?=IMG_PRACTITIONER.'services/'.$Service['Service']['image']?>" width="50" height="50" ><?php } ?></td></tr>
				<tr><td>Status : </td><td><?php echo $Service['Service']['status']; ?></td></tr>
				<tr><td>Short Description : </td><td colspan="5"><?php echo $Service['Service']['short_description']; ?></td></tr>
				<tr><td>Details : </td><td colspan="5"><?php echo $Service['Service']['details_description']; ?></td></tr>
			</table>
			</div>
		</div>
	</div>
</section>
