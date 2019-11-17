<?php $T_Header;?>
<body>
	<div class="wrapper">
		<?php $this->load->view('_template/users/u_sidebar'); ?>
		<div id="content" class="ncontent">
			<div class="container-fluid">
				<div class="row">
					<div class="col-sm-12">
						<style type="text/css">
							.notif-link { text-decoration: none; width: 100%; color: #2262A9; }
							.notif-link:hover { text-decoration: none; }
							.dropdown-menu { width: 300px; }
							.notif-li { padding-left: 21px; padding-right: 21px ; padding-top: 11px ;padding-bottom: 11px ; font-size: 12px;}
						</style>
						<nav class="navbar navbar-expand-lg">
							<button type="button" id="sidebarCollapse" class="btn btn-primary"><i class="fas fa-bars"></i></button>
							<!-- <div class="dropdown ml-auto">
								<a class="btn btn-light ddToggle" data-toggle="dropdown"><i class="fas fa-bell"></i></a>
								<ul class="dropdown-menu dropdown-menu-right">
									<li class="notif-li">
										<a class="notif-link" href="#">
											<i class="fas fa-edit"></i> 00001-A has been updated 1 min ago
										</a>
									</li>
									<li class="notif-li">
										<a class="notif-link" href="#">
											<i class="fas fa-edit"></i> 00002-A has been updated 1 min ago
										</a>
									</li>
									<li class="notif-li text-center">
										<a class="notif-link" href="#">
											<i class="fas fa-list"></i> View All
										</a>
									</li>
								</ul>
							</div> -->
						</nav>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12 pt-3 pb-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb" style="background-color: transparent;">
								<li class="breadcrumb-item"><a href="">Home</a></li>
								<li class="breadcrumb-item active" aria-current="page">Dashboard</li>
							</ol>
						</nav>
					</div>
				</div>
				<style type="text/css">
					.bcolor3BB515 {
						background-color: #3BB515;
					}
					.bcolorD9B319 {
						background-color: #D9B319;
					}
					.bcolor199EC4 {
						background-color: #199EC4;
					}
					.bcolorE75858 {
						background-color: #E75858;
					}
					.hei-100
					{
						min-height: 100% !important;
					}
					.card-container
					{
						height: 100% !important;
					}
					.card-headers {
						border-radius: 3px 3px 0px 0px;
						padding-top: 20px;
						padding-bottom: 20px;
						padding-right: 20px;
						padding-left: 20px;
						color: #FFFFFF;
					}
					.card-bodys {
						border-radius: 0px 0px 3px 3px;
						padding-top: 20px;
						padding-bottom: 20px;
						padding-right: 20px;
						padding-left: 20px;
						background-color: #EBEBEB;
						border-right: 1px solid #D0D0D0;
						border-bottom: 1px solid #D0D0D0;
						border-left: 1px solid #D0D0D0;
						font-family: 'Open Sans', sans-serif;
					}
					.titless
					{
						color: #434343;
					}
					.head-text
					{
						font-size: 1em;
					}
					.head-ico-text
					{
						font-size: 2em;
					}
				</style>
				<div class="row rcontent p-5">
					<div class="col-md-12 col-lg-3 mb-4">
						<div class="card-container">
							<div class="card-headers clearfix bcolor3BB515">
								<span class="float-left head-text">
									Applicant
								</span>
								<span class="ml-auto float-right head-ico-text">
									<i class="fas fa-user-friends fa-fw"></i> <?php if ($result_capp->num_rows() > 0) {
										echo $result_capp->num_rows();
									} ?>
								</span>
							</div>
							<div class="card-bodys clearfix">
								<a class="dc-links float-left" href="<?=base_url()?>Applicants"><i class="fas fa-angle-right fa-fw"></i> View </a>
							</div>
						</div>
					</div>
					<div class="col-md-12 col-lg-3 mb-4">
						<div class="card-container">
							<div class="card-headers clearfix bcolorD9B319">
								<span class="float-left head-text">
									Employee 
								</span>
								<span class="ml-auto float-right head-ico-text">
									<i class="fas fa-user-tie fa-fw"></i> <?php if ($result_cemployee->num_rows() > 0) {
										echo $result_cemployee->num_rows();
									} ?>
								</span>
							</div>
							<div class="card-bodys clearfix">
								<a class="dc-links float-left" href="<?=base_url()?>Employee"><i class="fas fa-angle-right fa-fw"></i> View </a>
							</div>
						</div>
					</div>
					<div class="col-md-12 col-lg-3 mb-4">
						<div class="card-container">
							<div class="card-headers clearfix bcolor199EC4">
								<span class="float-left head-text">
									Client
								</span>
								<span class="ml-auto float-right head-ico-text">
									<i class="fas fa-user-tag fa-fw"></i> 0
								</span>
							</div>
							<div class="card-bodys clearfix">
								<a class="dc-links float-left" href="#"><i class="fas fa-angle-right fa-fw"></i> View </a>
							</div>
						</div>
					</div>
					<div class="col-md-12 col-lg-3 mb-4">
						<div class="card-container">
							<div class="card-headers clearfix bcolorE75858">
								<span class="float-left head-text">
									Admin
								</span>
								<span class="ml-auto float-right head-ico-text">
									<i class="fas fa-user-secret fa-fw"></i> <?php if ($result_cadmin->num_rows() > 0) {
										echo $result_cadmin->num_rows();
									} ?>
								</span>
							</div>
							<div class="card-bodys clearfix">
								<a class="dc-links float-left" href="<?=base_url()?>Admin_List"><i class="fas fa-angle-right fa-fw"></i> View </a>
							</div>
						</div>
					</div>
					<div class="col-sm-12 col-lg-6 mt-5 mb-5">
						<div class="chart-title text-center">
							<h5 class="titless">
								<i class="fas fa-chart-pie fa-fw"></i> Total Appilicant
							</h5>
						</div>
						<canvas id="pie-chart" width="800" height="450"></canvas>
					</div>
					<div class="col-sm-12 col-lg-6 mt-5 mb-5">
						<div class="chart-title text-center">
							<h5 class="titless">
								<i class="fas fa-chart-line fa-fw"></i> Total Employed
							</h5>
						</div>
						<canvas id="bar-chart-horizontal" width="800" height="450"></canvas>
					</div>
					<div class="col-sm-12 col-lg-12 mt-5 mb-5">
						<div class="chart-title text-center">
							<h5 class="titless">
								<i class="fas fa-calendar-week fa-fw"></i> 2019 Applicants
							</h5>
						</div>
						<canvas id="ApplicantChart" class="w-100" width="800" height="250"></canvas>
					</div>
					
				</div>
			</div>
		</div>
	</div>
</body>
<?php $this->load->view('_template/users/u_scripts'); ?>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>
<script type="text/javascript">
	$(document).ready(function () {
		$('#sidebarCollapse').on('click', function () {
			$('#sidebar').toggleClass('active');
			$('.ncontent').toggleClass('shContent');
		});
		var cData = JSON.parse(`<?php echo $chart_data; ?>`);
		new Chart(document.getElementById("pie-chart"), {
			type: 'pie',
			data: {
				labels: cData.label,
				datasets: [{
					label: cData.label,
					backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
					data: cData.data,
				}]
			},
			options: {
				legend:
				{
					display: true,
				},
				title: {
					display: true,
					text: 'Total Applicant / Position'
				}
			}
		});
		new Chart(document.getElementById("bar-chart-horizontal"), {
			type: 'horizontalBar',
			data: {
				labels: ["Client #", "Client #", "Client #", "Client #", "Client #"],
				datasets: [
				{
					label : "",
					backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
					data: [2478,5267,734,784,433]
				}
				]
			},
			options: {
				legend: {
					display: false
				},
				title: {
					display: true,
					text: 'Total / Client'
				}
			}
		});
		var ctx = document.getElementById('ApplicantChart');
		var myChart = new Chart(ctx, {
			type: 'line',
			data: {
				labels: ['January', 'February', 'March', 'April', 'May', 'June' , 'July', 'August', 'September', 'October', 'November', 'December'],
				datasets: [{
					label: '# of Applicants',
					data: [100, 19, 3, 5, 2, 3,21, 19, 3, 5, 2, 3],
					backgroundColor: [
					'rgba(255, 99, 132, 0.5)',
					],
					borderColor: [
					'rgba(255, 99, 132, 1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)',
					'rgba(153, 102, 255, 1)',
					'rgba(255, 159, 64, 1)',
					'rgba(255, 99, 132, 1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)',
					'rgba(153, 102, 255, 1)',
					'rgba(255, 159, 64, 1)'
					],
					borderWidth: 2
				}]
			},
			options: {
				scales: {
					yAxes: [{

						ticks: {
							beginAtZero: true
						}
					}]
				},
				title: {
					display: true,
					text: 'Total Applicant this year'
				},
				legend: {
					display: false
				}
			}
		});
	});
</script>
</html>