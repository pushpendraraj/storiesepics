<section class="content-header">
  <h1>
    <?php echo __('Team Member Details');?>
    <small>Details of team member</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?=PRACTITIONER_WEBROOT;?>home"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active"><?php echo __('Team Member Details');?></li>
  </ol>
</section>
<section class="content">
	<div class="row">
		<div class="col-xs-6">
			<ul class="list-unstyled view-action">
				<li><?php echo $this->Html->link(__('Edit Member', true), array('action' => 'edit_member', $Member['TeamMember']['member_id']),array('class'=>'btn btn-default btn-sm btn-primary')); ?> </li>
				<li><?php echo $this->Html->link(__('Delete Member', true), array('action' => 'delete_member', $Member['TeamMember']['member_id']), array('class'=>'btn btn-default btn-sm btn-danger'), sprintf(__('Are you sure you want to delete # %s?', true), $Member['TeamMember']['member_id'])); ?> </li>
				<li><?php echo $this->Html->link(__('List members', true), array('action' => 'members'),array('class'=>'btn btn-default btn-sm btn-info')); ?> </li>
				<li><?php echo $this->Html->link(__('New Member', true), array('action' => 'add_member'),array('class'=>'btn btn-default btn-sm btn-success')); ?> </li>
			</ul>
		</div>
		<div class="col-xs-12">
			<div class="box box-primary">
			<table class="table table-bordered">
				<tr><td>Member Name : </td><td><?php echo $Member['TeamMember']['name']; ?></td><td>Image : </td><td><img src="<?=IMG_PRACTITIONER.'teammembers/'.$Member['TeamMember']['image']?>" width="50" height="50" ></td><td>Status : </td><td><?php echo $Member['TeamMember']['status']; ?></td></tr>
				<tr><td>Short Description : </td><td colspan="5"><?php echo $Member['TeamMember']['short_description']; ?></td></tr>
				<tr><td>Details : </td><td colspan="5"><?php echo $Member['TeamMember']['details_description']; ?></td></tr>
			</table>
			</div>
		</div>
	</div>
</section>
