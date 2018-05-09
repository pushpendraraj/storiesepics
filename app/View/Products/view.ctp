<div class="contents view">
<h2><?php App::uses('Sanitize','Utility');   echo __('Products'); ?></h2>
<div class="col-md-9">
                <div class="thumbnail">
                <?php echo $this->html->image('upload/big/'.$product['Product']['product_image'],array('width'=>'auto')); ?>
                    <div class="caption-full ">
                        <h4 class="pull-right"><?php echo '&#8377;'.$product['Product']['product_cost']; ?></h4>
                        <h4><?php echo $product['Product']['product_title'];  ?></h4>
                        <p><?php echo $product['Product']['product_description'];  ?></p>
                        <p><?php echo 'Specification : '.$product['Product']['product_specification'];  ?></p>
                        <p><?php echo 'SQ Code : '.$product['Product']['product_sqcode'];  ?></p>
                        <p><?php echo 'Category : '.$product['Product']['product_category'];  ?></p>
         <p><?php echo $this->html->link('Add to cart',array('action'=>'cart',$product['Product']['product_id']),array('class'=>'btn btn-default')); ?></p>
                    </div>
                   
                </div>
            </div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('All Products'), array('action' => 'index')); ?> </li>
	</ul>
</div>
