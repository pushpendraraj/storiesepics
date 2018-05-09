<section class="content-header">
	<h1>
		<?php echo __('User Details');?>
		<small>Details of register user</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="<?=ADMIN_WEBROOT;?>home"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active"><?php echo __('User Details');?></li>
	</ol>
</section>
<section class="content">
	<div class="row">
		<div class="col-xs-4">
			<ul class="list-unstyled view-action">
				<li><?php echo $this->Html->link(__('Edit User', true), array('action' => 'edit', $User['User']['user_id']),array('class'=>'btn btn-default btn-sm btn-primary')); ?> </li>
				<!-- <li><?php // echo $this->Html->link(__('Delete User', true), array('action' => 'delete', $User['User']['user_id']), array('class'=>'btn btn-default btn-sm btn-danger'), sprintf(__('Are you sure you want to delete %s?', $User['User']['full_name']))); ?> </li> -->
				<li><?php echo $this->Html->link(__('List Users', true), array('action' => 'index'),array('class'=>'btn btn-default btn-sm btn-info')); ?> </li>
				<li><?php echo $this->Html->link(__('New User', true), array('action' => 'add'),array('class'=>'btn btn-default btn-sm btn-success')); ?> </li>
			</ul>
		</div>
		<div class="col-xs-12">
			<div class="box box-primary">
				<table class="table table-bordered">
					<tr>
						<td class="active">Full Name : </td><td><?php echo $User['User']['full_name']; ?></td>
						<td class="active">Email : </td><td><?php echo $User['User']['email']; ?></td>
						<td class="active">Phone : </td><td><?php echo $User['User']['phone']; ?></td>
						<td class="active">Location : </td><td><?php echo $User['User']['location']; ?></td>
					</tr>
					<tr>
						<td class="active">Job Title : </td><td><?php echo $User['User']['job_title']; ?></td>
						<td class="active">Company : </td><td><?php echo $User['User']['company']; ?></td>
						<td class="active">Industries : </td><td><?php echo $User['User']['industries']; ?></td>
						<td class="active">Website : </td><td><?php echo $User['User']['website']; ?></td>
					</tr>
					<tr>
						<td class="active">User Added Date : </td><td><?php echo $User['User']['user_added_date']; ?></td>
						<td class="active">User Modified Date : </td><td><?php echo $User['User']['user_modified_date']; ?></td>
					</tr>
					<tr><td class="active">User Status : </td><td><?php echo ($User['User']['user_status'])?'Active':'Inactive'; ?></td>
						<td class="active">Last Login Date : </td><td><?php echo $User['User']['last_login_date']; ?></td>
						<td class="active">Last Login IP : </td><td><?php echo $User['User']['last_login_ip']; ?></td>
						<td class="active">User Role : </td><td><?php echo $User['UserRole']['user_role_name']; ?></td>
					</tr>
					<tr>
						<td class="active">Profile Details :</td><td colspan="7"><?php echo $User['User']['user_description']; ?></td>
					</tr>
					<tr>
						<td class="active">User Note :</td><td colspan="7"><?php echo $User['User']['user_note']; ?></td>
					</tr>
				</table>

			</div>
		</div>
	</div>
</section>
