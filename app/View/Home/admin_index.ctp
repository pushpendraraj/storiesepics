<div class="col-md-12" style="margin-bottom:5%;">
	<section class="content-header">
		<h1>Dashboard</h1>
		<?php extract($PageVar);?>
		<ol class="breadcrumb">
			<li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active">Dashboard</li>
		</ol>
	</section>
</div>
<section class="content">
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<div class="col-md-6">
	<div class="panel-group">
		<div class="panel panel-primary welcome">
			<div class="panel-heading" style="height:100%;">Welcome to stories & epics admin panel</div>
		</div>
	</div>
</div>
<div class="col-md-6">
	<div class="panel-group">
		<div class="panel panel-primary">
			<div id="piechart" style="height:350px;"></div>
		</div>
	</div>
</div>
</section>
<script type="text/javascript">
google.charts.load('current', {'packages':['corechart']});
	  google.charts.setOnLoadCallback(drawChart);

	  function drawChart() {

		var data = google.visualization.arrayToDataTable([
		  ['Active Module', 'Active Numbers'],
		  ['Users',     <?php echo $user_count; ?>],
		  ['Email Templates',  <?php echo $template_count; ?>],
		]);

		var options = {
		  title: 'Active Number of module count'
		};

		var chart = new google.visualization.PieChart(document.getElementById('piechart'));

		chart.draw(data, options);
	  }
</script>
<div class="clearfix"></div>
    

      

 