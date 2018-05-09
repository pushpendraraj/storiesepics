<section class="content-header">
  <h1>
    <?php echo __('Add Condition');?>
    <small>Add new condition</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?=PRACTITIONER_WEBROOT;?>home"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active"><?php echo __('Add Condition');?></li>
  </ol>
</section>
<section class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box box-primary">
				<?php echo $this->Form->create('Condition');?>
        <div class="box-body">
          <div class="form-group col-sm-12">	
          <label class="col-sm-2 control-label" for="inputPassword3">Condition</label>
            <div class="col-sm-6">
             <?php echo $this->Form->input('condition', array('label'=>false,'class'=>'form-control')); ?>
           </div>
         </div>
       <div class="form-group col-sm-12">
        <label class="col-sm-2 control-label" for="inputPassword3">Slug</label>
        <div class="col-sm-6">
         <?php echo $this->Form->input('slug', array('onfocus'=>'getPageSlug();','label'=>false,'class'=>'form-control')); ?>
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
<script type="text/javascript">
function getPageSlug(){
	var str='';
	str+=$("input[name='data[Condition][condition]']").val().replace(/ /g,"_");
	$("input[name='data[Condition][slug]']").val(str.toLowerCase());

}
</script>