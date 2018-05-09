<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<?php echo $this->Html->charset(); ?>
		<title><?php __('Welcome : '); ?> <?php echo $title_for_layout; ?></title>
		<?php
			echo $this->Html->meta('icon');
			echo $this->Html->css(array('practitioner/bootstrap.min','practitioner/jquery-jvectormap-1.2.2','practitioner/AdminLTE','practitioner/_all-skins.min','practitioner/style'));
			echo $this->Html->script(array('practitioner/jQuery-2.1.4.min','practitioner/bootstrap.min','practitioner/fastclick.min','practitioner/app.min','practitioner/jquery.sparkline.min','practitioner/jquery-jvectormap-1.2.2.min','practitioner/jquery-jvectormap-world-mill-en','practitioner/jquery.slimscroll.min','practitioner/Chart.min','practitioner/demo'));
			echo $scripts_for_layout;
		?>

		<!-- Font Awesome -->
    	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    	<!-- Ionicons -->
    	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

	</head>
	<body class="skin-blue sidebar-mini">
		<div class="wrapper">
			<?php echo $this->element('practitioner-top-header'); ?>
			<?php echo $this->element('practitioner-left-sidebar'); ?>
			<div class="content-wrapper">
				<section class="content-header">
					<?php echo $this->Session->flash(); ?>
				</section>
				<?php echo $content_for_layout; ?>
			</div>
			<?php echo $this->element('practitioner-footer'); ?>
	   	</div><!-- ./wrapper -->
	</body>
</html>



