<section class="content-header">
  <h1>
    <?php echo __('Sub Condition Details');?>
    <small>Details of Sub Condition</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?=ADMIN_WEBROOT;?>home"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active"><?php echo __('Sub Condition Details');?></li>
  </ol>
</section>
<section class="content">
	<div class="row">
		<div class="col-xs-6">
			<ul class="list-unstyled view-action">
				<li><?php echo $this->Html->link(__('Edit Sub Condition', true), array('action' => 'edit_sub_condition', $Sub_condition['SubCondition']['id']),array('class'=>'btn btn-default btn-sm btn-primary')); ?> </li>
				<li><?php echo $this->Html->link(__('Delete Sub Condition', true), array('action' => 'delete_sub_condition', $Sub_condition['SubCondition']['id']), array('class'=>'btn btn-default btn-sm btn-danger'), sprintf(__('Are you sure you want to delete # %s?', true), $Sub_condition['SubCondition']['id'])); ?> </li>
				<li><?php echo $this->Html->link(__('List Sub Conditions', true), array('action' => 'list_sub_conditions'),array('class'=>'btn btn-default btn-sm btn-info')); ?> </li>
				<li><?php echo $this->Html->link(__('New Sub Condition', true), array('action' => 'add_sub_condition'),array('class'=>'btn btn-default btn-sm btn-success')); ?> </li>
			</ul>
		</div>
		<div class="col-xs-12">
			<div class="box box-primary">
			<table class="table table-bordered">
				<tr><td>Condition : </td><td><?php echo $Sub_condition['Condition']['condition']; ?></td></tr>
				<tr><td>Sub Condition : </td><td><?php echo $Sub_condition['SubCondition']['condition']; ?></td></tr>
				<tr><td>Slug : </td><td><?php echo $Sub_condition['SubCondition']['slug']; ?></td></tr>
				<tr><td>Introduction : </td><td><?php echo $Sub_condition['SubCondition']['introduction']; ?></td></tr>
				<tr><td>Symptoms : </td><td><?php echo $Sub_condition['SubCondition']['symptoms']; ?></td></tr>
				<tr><td>Causes : </td><td><?php echo $Sub_condition['SubCondition']['causes']; ?></td></tr>
				<tr><td>Diagnosis : </td><td><?php echo $Sub_condition['SubCondition']['diagnosis']; ?></td></tr>
				<tr><td>Treatment : </td><td><?php echo $Sub_condition['SubCondition']['treatment']; ?></td></tr>
				<tr><td>Complications : </td><td><?php echo $Sub_condition['SubCondition']['complications']; ?></td></tr>
				<tr><td>Prevention : </td><td><?php echo $Sub_condition['SubCondition']['prevention']; ?></td></tr>
				<tr><td>Lisa Story	 : </td><td><?php echo $Sub_condition['SubCondition']['lisa_story']; ?></td></tr>
				<tr><td>Video Guide : </td><td><?php echo $Sub_condition['SubCondition']['video_guide']; ?></td></tr>
				<tr><td>Pharmacist Help : </td><td><?php echo $Sub_condition['SubCondition']['pharmacist_help']; ?></td></tr>
				<tr><td>Status : </td><td><?php echo $Sub_condition['SubCondition']['status']; ?></td></tr>
			</table>
			</div>
		</div>
	</div>
</section>
