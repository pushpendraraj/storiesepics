<section class="content-header">
  <h1>
    <?php echo __('Add Tag');?>
    <small>Register new tag</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?=ADMIN_WEBROOT;?>home"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active"><?php echo __('Add Tag');?></li>
  </ol>
</section>
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-primary">
        <?php echo $this->Form->create('Tag');?>
        <div class="box-body">
          <div class="form-group col-sm-5">
            <label class="col-sm-3 control-label" for="inputPassword3">Tag Name</label>
            <div class="col-sm-9">
              <?php echo $this->Form->input('tag_name', array('label'=>false,'required'=>true, 'class'=>'form-control')); ?>
            </div>
          </div>
          <div class="form-group col-sm-5">
            <label class="col-sm-3 control-label" for="inputPassword3">Status</label>
            <div class="col-sm-9">
              <?php echo $this->Form->input('status', array('label'=>false,'options'=>array('1'=>'Active','0'=>'Inactive'),'class'=>'form-control')); ?>
            </div>
          </div>
          <div class="form-group col-sm-2">
            <button class="btn btn-info pull-right" type="submit">Save</button>
          </div>
        </div>
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