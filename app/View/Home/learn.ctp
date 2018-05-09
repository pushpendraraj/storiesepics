<div class="container">     
    <?php 
		extract($PageVar); 
		extract($SubCondition);
		
		// pr($SubCondition);
	?>
    <?php echo $this->element('frontend-condition-breadcumb'); ?>  
</div>
<div class="container" id="tabs">
	<div class="col-md-9">
		<div id="Introduction"><?=(!empty($SubCondition['introduction']))?$SubCondition['introduction']:''?></div>
		<div id="Symptoms"><?=(!empty($SubCondition['symptoms']))?$SubCondition['symptoms']:''?></div>
		<div id="Causes"><?=(!empty($SubCondition['causes']))?$SubCondition['causes']:''?></div>
		<div id="Diagnosis"><?=(!empty($SubCondition['diagnosis']))?$SubCondition['diagnosis']:''?></div>
		<div id="Treatment"><?=(!empty($SubCondition['treatment']))?$SubCondition['treatment']:''?></div>
		<div id="Complications"><?=(!empty($SubCondition['complications']))?$SubCondition['complications']:''?></div>
		<div id="Prevention"><?=(!empty($SubCondition['prevention']))?$SubCondition['prevention']:''?></div>
		<div id="Lisa"><?=(!empty($SubCondition['lisa_story']))?$SubCondition['lisa_story']:''?></div> 
		<div id="videoGuide"><?=(!empty($SubCondition['video_guide']))?$SubCondition['video_guide']:''?></div> 
	</div>
	<div class="col-md-3 sidebar">
		<ul class="learn-tabs">
			<li><a href="#Introduction">Introduction</a></li>
			<li><a href="#Symptoms">Symptoms</a></li>
			<li><a href="#Causes">Causes</a></li>
			<li><a href="#Diagnosis">Diagnosis</a></li>
			<li><a href="#Treatment">Treatment</a></li>
			<li><a href="#Complications">Complications</a></li>
			<li><a href="#Prevention">Prevention</a></li>
			<li><a href="#Lisa">Lisa's Story</a></li>
			<li><a href="#videoGuide">video Guide</a></li>
		</ul>
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
 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
  $( function() {
    $( "#tabs" ).tabs();
  } );
  </script>