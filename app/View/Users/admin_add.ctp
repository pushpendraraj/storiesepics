<section class="content-header">
  <h1>
    <?php echo __('Add User');?>
    <small>Register new user</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?=ADMIN_WEBROOT;?>home"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active"><?php echo __('Add User');?></li>
  </ol>
</section>
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-primary">
        <?php echo $this->Form->create('User',array('type'=>'file'));?>
        <?php $roles=array();
        if(isset($Roles)){
          foreach($Roles as $Rolesx){
            $roles[$Rolesx['UserRole']['user_role_id']]=$Rolesx['UserRole']['user_role_name'];
          }
        }
        ?>
        <div class="box-body">
          <div class="form-group col-sm-6">
            <label class="col-sm-3 control-label" for="inputEmail3">User Role</label>
            <div class="col-sm-9">
              <?php echo $this->Form->input('user_role_id', array('label'=>false,'options'=>$roles,'class'=>'form-control')); ?>
            </div>
          </div>
          <div class="form-group col-sm-6">
            <label class="col-sm-3 control-label" for="inputPassword3">User Name</label>
            <div class="col-sm-9">
              <?php echo $this->Form->input('full_name', array('label'=>false,'class'=>'form-control')); ?>
            </div>
          </div>
          <div class="form-group col-sm-6">
            <label class="col-sm-3 control-label" for="inputPassword3">Email</label>
            <div class="col-sm-9">
              <?php echo $this->Form->input('email', array('label'=>false,'class'=>'form-control')); ?>
            </div>
          </div>
          <div class="form-group col-sm-6">
            <label class="col-sm-3 control-label" for="inputPassword3">Password</label>
            <div class="col-sm-9">
              <?php echo $this->Form->input('password', array('type'=>'password','label'=>false,'class'=>'form-control')); ?>
            </div>
          </div>
          <div class="form-group col-sm-6">
            <label class="col-sm-3 control-label" for="inputPassword3">Phone</label>
            <div class="col-sm-9">
              <?php echo $this->Form->input('phone', array('label'=>false,'class'=>'form-control')); ?>
            </div>
          </div>
          <div class="form-group col-sm-6">
            <label class="col-sm-3 control-label" for="inputPassword3">Location</label>
            <div class="col-sm-9">
              <?php echo $this->Form->input('location', array('label'=>false,'class'=>'form-control')); ?>
            </div>
          </div>
          <div class="form-group col-sm-6">
            <label class="col-sm-3 control-label" for="inputPassword3">Job Title</label>
            <div class="col-sm-9">
              <?php echo $this->Form->input('job_title', array('label'=>false,'class'=>'form-control')); ?>
            </div>
          </div>
          <div class="form-group col-sm-6">
            <label class="col-sm-3 control-label" for="inputPassword3">Company</label>
            <div class="col-sm-9">
              <?php echo $this->Form->input('company', array('label'=>false,'class'=>'form-control')); ?>
            </div>
          </div>
          <div class="form-group col-sm-6">
            <label class="col-sm-3 control-label" for="inputPassword3">Industries</label>
            <div class="col-sm-9">
              <?php echo $this->Form->input('industries', array('label'=>false,'class'=>'form-control')); ?>
            </div>
          </div>
          <div class="form-group col-sm-6">
            <label class="col-sm-3 control-label" for="inputPassword3">Website</label>
            <div class="col-sm-9">
              <?php echo $this->Form->input('website', array('label'=>false,'class'=>'form-control')); ?>
            </div>
          </div>
          <div class="form-group col-sm-6">
            <label class="col-sm-3 control-label" for="inputPassword3">User Status</label>
            <div class="col-sm-9">
              <?php echo $this->Form->input('user_status', array('label'=>false,'options'=>array('1'=>'Active','0'=>'Inactive'),'class'=>'form-control')); ?>
            </div>
          </div>
          <div class="form-group col-sm-12">
            <label class="col-sm-12 control-label" for="inputPassword3">Profile Details</label>
            <div class="col-sm-12">
              <?php echo $this->Form->input('user_description', array('label'=>false,'class'=>'form-control ckeditor')); ?>
            </div>
          </div>
           <div class="form-group col-sm-12">
            <label class="col-sm-12 control-label" for="inputPassword3">User Notes</label>
            <div class="col-sm-12">
              <?php echo $this->Form->input('user_note', array('label'=>false,'class'=>'form-control ckeditor')); ?>
            </div>
          </div>
        </div><!-- /.box-body -->
        <div class="box-footer">
          <button class="btn btn-info pull-right" type="submit">Save</button>
        </div><!-- /.box-footer -->
        <?php echo $this->Form->end();?>
      </div>
    </div>
  </div>
</section>

<script src="https://cdn.ckeditor.com/4.4.3/standard/ckeditor.js"></script>
<script>
  jQuery(function () {
    CKEDITOR.replace('.ckeditor');
  });
</script>