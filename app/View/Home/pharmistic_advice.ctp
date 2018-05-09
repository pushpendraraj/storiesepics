<div class="container">     
    <?php 
		extract($PageVar); 
		extract($SubCondition);
	?>
    <?php echo $this->element('frontend-condition-breadcumb'); ?>  
</div>
<div class="container">
	<div class="col-md-9">
		<?=$SubCondition['pharmacist_help']?>
	</div>
	<div class="col-md-3 sidebar">
		<ul class="condition-cta condition-cta-partial condition-cta-all">
			<li class="condition-self-care">
				<a href="/learn-urticaria">
					<h3>I want to help myself</h3>
					<p>Get information and watch videos
					about urticaria
					</p>
				</a>
			</li>
			<li class="condition-treat">
				<a href="<?=WEBROOT?>home/pharmistic_advice/<?=$this->request->params['pass'][0]?>">
					<h3>I want pharmacy advice</h3>
					<p>Information about over the counter treatments</p>
				</a>
			</li>
			<li class="condition-nurse">
				<a href="<?=WEBROOT?>home/callback">
					<h3>I want advice from a 111 clinician</h3>
					<p>Find out how to get advice from a clinician. The service is available 24/7.</p>
				</a>
			</li>
			<li class="condition-consult">
				<a href="<?=WEBROOT?>home/gp_consultation/<?=$this->request->params['pass'][0]?>">
					<h3>I want treatment and advice from my GP</h3>
					<p>Consult your GP via a simple online form - we get back to you <strong>by the end of the next working day</strong></p>
				</a>
			</li>
		</ul> 
	</div>
</div>