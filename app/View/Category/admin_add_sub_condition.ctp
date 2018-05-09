<section class="content-header">
  <h1>
    <?php echo __('Add Sub Condition');?>
    <small>Add new sub condition</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?=ADMIN_WEBROOT;?>home"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active"><?php echo __('Add Sub Condition');?></li>
  </ol>
</section>
<section class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box box-primary">
				<?php echo $this->Form->create('SubCondition');?>
        <div class="box-body">
		<div class="form-group col-sm-12">	
          <label class="col-sm-2 control-label" for="inputPassword3">Condition</label>
            <div class="col-sm-6">
             <?php echo $this->Form->input('condition_id', array('label'=>false,'class'=>'form-control')); ?>
           </div>
         </div>
          <div class="form-group col-sm-12">	
          <label class="col-sm-2 control-label" for="inputPassword3">Sub Condition</label>
            <div class="col-sm-6">
             <?php echo $this->Form->input('condition', array('label'=>false,'type'=>'text','class'=>'form-control')); ?>
           </div>
         </div>
       <div class="form-group col-sm-12">
        <label class="col-sm-2 control-label" for="inputPassword3">Slug</label>
        <div class="col-sm-6">
         <?php echo $this->Form->input('slug', array('onfocus'=>'getPageSlug();','label'=>false,'class'=>'form-control')); ?>
       </div>
     </div>
	  <div style="clear: both;" class="form-group col-sm-12">
      <label class="col-sm-12 control-label" for="inputPassword3">Introduction </label>
      <div class="col-sm-12">
       <?php echo $this->Form->input('introduction', array('label'=>false,'class'=>'form-control ckeditor')); ?>
     </div>
   </div>
   <div style="clear: both;" class="form-group col-sm-12">
      <label class="col-sm-12 control-label" for="inputPassword3">Symptoms </label>
      <div class="col-sm-12">
       <?php echo $this->Form->input('symptoms', array('label'=>false,'class'=>'form-control ckeditor')); ?>
     </div>
   </div>
    <div style="clear: both;" class="form-group col-sm-12">
      <label class="col-sm-12 control-label" for="inputPassword3">Causes </label>
      <div class="col-sm-12">
       <?php echo $this->Form->input('causes', array('label'=>false,'class'=>'form-control ckeditor')); ?>
     </div>
   </div>
    <div style="clear: both;" class="form-group col-sm-12">
      <label class="col-sm-12 control-label" for="inputPassword3">Diagnosis </label>
      <div class="col-sm-12">
       <?php echo $this->Form->input('diagnosis', array('label'=>false,'class'=>'form-control ckeditor')); ?>
     </div>
   </div>
    <div style="clear: both;" class="form-group col-sm-12">
      <label class="col-sm-12 control-label" for="inputPassword3">Treatment </label>
      <div class="col-sm-12">
       <?php echo $this->Form->input('treatment', array('label'=>false,'class'=>'form-control ckeditor')); ?>
     </div>
   </div>
   <div style="clear: both;" class="form-group col-sm-12">
      <label class="col-sm-12 control-label" for="inputPassword3">Complications </label>
      <div class="col-sm-12">
       <?php echo $this->Form->input('complications', array('label'=>false,'class'=>'form-control ckeditor')); ?>
     </div>
   </div>
   <div style="clear: both;" class="form-group col-sm-12">
      <label class="col-sm-12 control-label" for="inputPassword3">Prevention </label>
      <div class="col-sm-12">
       <?php echo $this->Form->input('prevention', array('label'=>false,'class'=>'form-control ckeditor')); ?>
     </div>
   </div>
   <div style="clear: both;" class="form-group col-sm-12">
      <label class="col-sm-12 control-label" for="inputPassword3">Lisa's Story </label>
      <div class="col-sm-12">
       <?php echo $this->Form->input('lisa_story', array('label'=>false,'class'=>'form-control ckeditor')); ?>
     </div>
   </div>
    <div style="clear: both;" class="form-group col-sm-12">
      <label class="col-sm-12 control-label" for="inputPassword3">Video Guide </label>
      <div class="col-sm-12">
       <?php echo $this->Form->input('video_guide', array('label'=>false,'class'=>'form-control ckeditor')); ?>
     </div>
   </div>
   <div style="clear: both;" class="form-group col-sm-12">
      <label class="col-sm-12 control-label" for="inputPassword3">Pharmacist Help </label>
      <div class="col-sm-12">
       <?php echo $this->Form->input('pharmacist_help', array('label'=>false,'class'=>'form-control ckeditor')); ?>
     </div>
   </div>
     <div class="form-group col-sm-12">
      <label class="col-sm-2 control-label" for="inputPassword3">Status</label>
      <div class="col-sm-6">
       <?php echo $this->Form->input('status', array('label'=>false,'options'=>array('Publish'=>'Publish','Unpublish'=>'Unpublish'),'class'=>'form-control')); ?>
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
  $(function () {
    CKEDITOR.replace('.ckeditor');
  });
</script>
<script type="text/javascript">
function getPageSlug(){
	var str='';
	str+=$("input[name='data[SubCondition][condition]']").val().replace(/ /g,"_");
	$("input[name='data[SubCondition][slug]']").val(str.toLowerCase());

}
</script>
