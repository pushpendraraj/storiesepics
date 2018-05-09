<section class="content-header">
  <h1>
    <?php echo __('Edit Slide');?>
    <small>Edit slide details</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?=PRACTITIONER_WEBROOT;?>home"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active"><?php echo __('Edit Slide');?></li>
  </ol>
</section>
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-primary">
        <?php echo $this->Form->create('Slide',array('type'=>'file'));?>
        <div class="box-body">
          <div class="form-group col-sm-6">
          <label class="col-sm-3 control-label" for="inputPassword3">Slide Title</label>
            <div class="col-sm-9">
             <?php echo $this->Form->input('slide_title', array('label'=>false,'class'=>'form-control')); ?>
           </div>
         </div>
       <div class="form-group col-sm-6">
        <label class="col-sm-3 control-label" for="inputPassword3">Image</label>
        <div class="col-sm-9">
         <?php echo $this->Form->file('image', array('label'=>false)); ?>
       </div>
     </div>
     <div style="clear: both;" class="form-group col-sm-6">
      <label class="col-sm-3 control-label" for="inputPassword3">Link </label>
      <div class="col-sm-9">
       <?php echo $this->Form->input('slide_link', array('label'=>false,'class'=>'form-control','after'=>'(i.e http://www.demo.com)')); ?>
     </div>
   </div>
   <div class="form-group col-sm-6">
      <label class="col-sm-3 control-label" for="inputPassword3">Status</label>
      <div class="col-sm-9">
       <?php echo $this->Form->input('status', array('label'=>false,'options'=>array('Active'=>'Active','Inactive'=>'Inactive'),'class'=>'form-control')); ?>
     </div>
    </div>
    <div class="form-group col-sm-12">
      <label class="col-sm-12 control-label" for="inputPassword3">Slide Description</label>
      <div class="col-sm-12">
       <?php echo $this->Form->input('slide_description', array('label'=>false,'class'=>'form-control ckeditor')); ?>
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