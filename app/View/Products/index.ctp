<?php
App::uses('String', 'Utility');
?>
<div class="contents index">
    <div class="col-lg-12">
    <?php
	foreach ($Products as $content):  ?>
                    <div class="col-sm-4 product col-lg-4 col-md-4">
                        <div class="thumbnail">
                           <?php echo $this->html->image('upload/big/'.$content['Product']['product_image'], array('height'=>'100px')); ?>
                            <div class="caption">
                                <h4 class="pull-right"><?php echo '&#8377;'.$content['Product']['product_cost']; ?></h4>
                                <h4><?php echo $this->html->link($content['Product']['product_title'],array('action'=>'view',$content['Product']['product_id'])); ?></h4>
                                <p><?php echo substr($content['Product']['product_description'],0,100).'....'; ?></p>
                                <?php echo $this->html->link('Add to cart',array('action'=>'cart',$content['Product']['product_id']),array('class'=>'btn btn-info standard-button')); ?> <?php echo $this->html->link('Details',array('action'=>'view',$content['Product']['product_id']),array('class'=>'btn btn-default pull-right')); ?>
                            </div>
                        </div>
                    </div>
          
                    <?php endforeach; ?>
                   
              <div style="clear:both"></div> 
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>

	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
    </div>
</div>
<div class="actions">
		<h3><?php echo __('Products'); ?></h3>
</div>