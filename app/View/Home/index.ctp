<?php extract($PageVar); ?>
<div class="white_sec">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-sm-7">
                <div class="whitebox">
				<?php $welcomeCare = $PageVar['Content'][2]['Content']; if(!empty($welcomeCare)){ ?>
					<p><?=$welcomeCare['page_title']?></p>
				<?php } ?>
                </div>
            </div>
            <div class="col-md-4 col-sm-5">
                <div class="whitebox text-center">
                    <a href="#"><img src="<?=IMG_FRONT?>logo-circle.png" alt=""></a>
                    <div>
                    <a href="#"><img src="<?=IMG_FRONT?>appstore.png" alt=""></a>
                    <a href="#"><img src="<?=IMG_FRONT?>googleplay.png" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <h3 class="home-title text-center">WELCOME TO <span>CLARENDON MEDICAL CENTRE</span></h3>
    <div class="welcome_content">
		<?php $patientCare = $PageVar['Content'][0]['Content']; if(!empty($patientCare)){ ?>
			<h3 class="ptitle"><?=$patientCare['page_title']?></h3>
			<?=$patientCare['page_content']?>
		<?php } ?>
    </div>
    <div class="welcome_content about-content">
		<?php $aboutPatientCare = $PageVar['Content'][1]['Content']; if(!empty($aboutPatientCare)){ ?>
			<h3 class="ptitle"><?=$aboutPatientCare['page_title']?></h3>
			<?=$aboutPatientCare['page_content']?>   
		<?php } ?>
    </div>
    <?php echo $this->element('frontend-testimonials'); ?>
</div>