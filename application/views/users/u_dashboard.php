<?php $T_Header;?>
<body>
	<div class="wrapper">
		<?php $this->load->view('_template/users/u_sidebar'); ?>
		<div id="content" class="ncontent">
			<div class="container-fluid">
				<?php $this->load->view('_template/users/u_notifications'); ?>
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
									<i class="fas fa-user-tag fa-fw"></i> <?php if ($result_cclients->num_rows() > 0) {
										echo $result_cclients->num_rows();
									} ?>
								</span>
							</div>
							<div class="card-bodys clearfix">
								<a class="dc-links float-left" href="<?=base_url()?>Clients"><i class="fas fa-angle-right fa-fw"></i> View </a>
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
								<i class="fas fa-chart-pie fa-fw"></i> Total Applicant
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

					<!-- LOGBOOK -->
					<div class="col-sm-12 col-lg-12 mt-5">
						<div class="chart-title text-center">
							<h5>
								<i class="fas fa-list"></i> Logbook
							</h5>
						</div>
					</div>
					<div class="col-sm-12 col-lg-12 mt-2">
						<div class="text-center">
							<button class="btn btn-primary btn-sm" type="button" data-toggle="modal" data-target="#AddNote"><i class="fas fa-plus"></i> Add Note</button>
						</div>
					</div>
					<div class="col-sm-12">
						<div class="table-responsive pt-5 pb-5 pl-2 pr-2">
							<table id="emp" class="table table-condensed PrintOut" style="width: 100%;">
								<thead>
									<tr class="text-center align-middle">
										<th> Time </th>
										<th> Type </th>
										<th> Event </th>
										<th> Action </th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($GetLogbook->result_array() as $row): ?>
										<tr class="
											<?php 
												if ($row['Type'] == 'New' || $row['Type'] == 'Employment') 
												{ 
													echo 'logbook-success'; 
												}
												elseif ($row['Type'] == 'Deletion') 
												{
													echo 'logbook-danger';
												} 
												elseif ($row['Type'] == 'Update')
												{
													echo 'logbook-info';
												}
												elseif ($row['Type'] == 'Reminder' || $row['Type'] == 'Note') 
												{
													echo 'logbook-warning';
												}
											?>">
											<td class="text-center align-middle">
												<?php echo $row['Time']; ?>
											</td>
											<td class="text-center align-middle">
												<?php echo $row['Type']; ?>
											</td>
											<td class="text-center align-middle">
												<?php echo $row['Event']; ?>
											</td>
											<td class="text-center align-middle PrintExclude" width="100">
												<a href="<?php echo $row['Link'] ?>" class="btn btn-primary btn-sm w-100 mb-1" href="#"><i class="fas fa-list"></i> View</a>
											</td>
										</tr>
									<?php endforeach ?>
								</tbody>
							</table>
						</div>
					</div>
					
				</div>
			</div>
		</div>
	</div>
	<!-- CLIENT HIRE MODAL -->
	<?php $this->load->view('_template/modals/m_addnote'); ?>
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