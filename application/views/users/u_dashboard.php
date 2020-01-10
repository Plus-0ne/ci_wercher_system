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
							<a href="Applicants">
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
							</a>
						</div>
					</div>
					<div class="col-md-12 col-lg-3 mb-4">
						<div class="card-container">
							<a href="Employee">
							<div class="card-headers clearfix" style="background-color: rgba(153, 102, 255, 1);">
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
							<a href="Clients">
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
							<a href="Admin_List">
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
					<div id="PieChartButton" class="col-sm-12 col-lg-6 mt-5 mb-5 chart-hover">
						<div class="chart-title text-center">
							<h5 class="titless">
								<i class="fas fa-chart-pie fa-fw"></i> Total Applicant
							</h5>
						</div>
						<!-- <div class="col-1 ml-auto chart-hover-settings" style="margin-top: -30px; display: none;">
							<button type="button" class="btn btn-primary btn-sm"><i class="fas fa-cog" style="margin-right: -1px;"></i></button>
						</div> -->
						<canvas id="pie-chart" width="800" height="450"></canvas>
					</div>
					<div id="BarChartButton" class="col-sm-12 col-lg-6 mt-5 mb-5 chart-hover">
						<div class="chart-title text-center">
							<h5 class="titless">
								<i class="fas fa-chart-line fa-fw"></i> Total Employed
							</h5>
						</div>
						<!-- <div class="col-1 ml-auto chart-hover-settings" style="margin-top: -30px; display: none;">
							<button type="button" class="btn btn-primary btn-sm"><i class="fas fa-cog" style="margin-right: -1px;"></i></button>
						</div> -->
						<canvas id="bar-chart-horizontal" width="800" height="450"></canvas>
					</div>
					<div id="GraphChartButton" class="col-sm-12 col-lg-12 mt-5 mb-5 chart-hover">
						<div class="chart-title text-center">
							<h5 class="titless">
								<i class="fas fa-calendar-week fa-fw chart-hover-static"></i> <?php echo $CurrentYear; ?> Applicants
							</h5>
						</div>
						<!-- <div class="col-1 ml-auto chart-hover-settings" style="margin-top: -30px; display: none;">
							<button type="button" class="btn btn-primary btn-sm"><i class="fas fa-cog" style="margin-right: -1px;"></i></button>
						</div> -->
						<canvas id="ApplicantChart" class="w-100" width="800" height="250"></canvas>
					</div>

					<!-- LOGBOOK -->
					<div id="Logbook" class="col-sm-12 col-lg-12 mt-5">
						<div class="chart-title text-center">
							<h5>
								<i class="fas fa-list"></i> Logbook
							</h5>
						</div>
					</div>
					<div class="col-sm-12 col-lg-12 mt-2">
						<div class="text-center">
							<button class="btn btn-primary btn-sm" type="button" data-toggle="modal" data-target="#AddNote"><i class="fas fa-plus"></i> Add Note</button>
							<button class="btn btn-primary btn-sm" type="button" data-toggle="modal" data-target="#ExportModal"><i class="fas fa-download" style="margin-right: -1px;"></i></button>
						</div>
					</div>
					<div class="col-sm-12">
						<div class="table-responsive pt-5 pb-5 pl-2 pr-2">
							<table id="ListLogbook" class="table table-condensed PrintOut" style="width: 100%;">
								<thead>
									<tr class="text-center align-middle">
										<th> Time </th>
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
												elseif ($row['Type'] == 'Archival') 
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
											</td>
											<td class="text-center align-middle">
												<?php echo $row['Time']; ?>
											</td>
											<td class="text-center align-middle">
												<?php echo $row['Event']; ?>
											</td>
											<td class="text-center align-middle PrintExclude" width="100">
												<a href="<?php echo $row['Link'] ?>" class="btn btn-primary btn-sm w-100 mb-1" href="#" target="_blank"><i class="fas fa-external-link-alt"></i> View</a>
											</td>
										</tr>
									<?php endforeach; ?>
								</tbody>
							</table>
						</div>
					</div>
					
				</div>
			</div>
		</div>
	</div>
	<!-- ADD NOTE MODAL -->
	<?php $this->load->view('_template/modals/m_addnote'); ?>
	<!-- EXPORT MODAL -->
	<?php $this->load->view('_template/modals/m_export'); ?>
	<!-- PIE CHART MODAL -->
	<?php $this->load->view('_template/modals/m_dashboard_pie'); ?>
	<!-- BAR CHART MODAL -->
	<?php $this->load->view('_template/modals/m_dashboard_bar'); ?>
	<!-- GRAPH CHART MODAL -->
	<?php $this->load->view('_template/modals/m_dashboard_graph'); ?>
</body>
<?php $this->load->view('_template/users/u_scripts'); ?>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>
<?php
	// BAR CHART COUNTER
	$BarClientsLabel = '';
	$BarClientsData = '';
	foreach ($result_cclients->result_array() as $row):
		$BarClientsLabel = $BarClientsLabel . $row['Name'] . '", "';
		$BarClientsData = $BarClientsData . $this->Model_Selects->GetClientsEmployed($row['ClientID'])->num_rows() . '", "';
	endforeach;
	$BarClientsLabel = substr($BarClientsLabel, 0, -4);
	$BarClientsData = str_replace('"', "", $BarClientsData);
	// GRAPH CHART COUNTER FOR CURRENT YEAR
	if (isset($_GET['Year'])) {
		$GraphMonthData = '';
		// echo date('Y');
		foreach ($result_monthly->result_array() as $row):
			$GraphMonthData = $GraphMonthData . $row['Total'] . '", "';
		endforeach;
		$GraphMonthData = str_replace('"', "", $GraphMonthData);
		// echo $GraphMonthData;
	}
	// GRAPH CHART COUNTER FOR SELECTED YEAR
	$GraphMonthDataCurrent = '';
	// echo date('Y');
	foreach ($result_monthly_current_year->result_array() as $row):
		$GraphMonthDataCurrent = $GraphMonthDataCurrent . $row['Total'] . '", "';
	endforeach;
	$GraphMonthDataCurrent = str_replace('"', "", $GraphMonthDataCurrent);
	// echo $GraphMonthData;
?>
<script type="text/javascript">
	$(document).ready(function () {
		$('[data-toggle="tooltip"]').tooltip();
		<?php if (isset($_GET['Year'])): ?>
			$('#GraphChartModal').modal('show');
		<?php endif; ?>
		<?php if (isset($_GET['Year']) && isset($_GET['Month'])): ?>
			location.href = "#ByMonth";
		<?php endif; ?>
		$("#GraphYear").change(function() {
			$(this).parents('form').submit();
		});
		$('.load-div').hide();
		$('#PieChartButton').on('click', function () {
			$('#PieChartModal').modal('show');
		});
		// $('#BarChartButton').on('click', function () {
		// 	$('#BarChartModal').modal('show');
		// });
		$('#GraphChartButton').on('click', function () {
			$('#GraphChartModal').modal('show');
		});
		// $(".chart-hover").hover(function(){
		// 	$(this).find('.chart-hover-settings').show();
		// },function(){
		// 	$(this).find('.chart-hover-settings').hide();
		// });
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
					text: 'Total Applicant / Position by Group'
				}
			}
		});
		new Chart(document.getElementById("bar-chart-horizontal"), {
			type: 'horizontalBar',
			data: {
				labels: ["<?php echo $BarClientsLabel; ?>"],
				datasets: [
				{
					label : "",
					backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
					data: [<?php echo $BarClientsData; ?>, 0]
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
					data: [<?php echo $GraphMonthDataCurrent; ?>],
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
							stepValue: 1,
							beginAtZero: true
						}
					}]
				},
				title: {
					display: true,
					text: '<?php echo $CurrentYearTotal; ?> Applicants Total'
				},
				legend: {
					display: false
				}
			}
		});
		var GraphChartID = document.getElementById('GraphChartModal_Chart');
		var GraphChart = new Chart(GraphChartID, {
			type: 'line',
			data: {
				labels: ['January', 'February', 'March', 'April', 'May', 'June' , 'July', 'August', 'September', 'October', 'November', 'December'],
				datasets: [{
					label: '# of Applicants',
					data: [<?php if (isset($_GET['Year'])) { echo $GraphMonthData; } else { echo $GraphMonthDataCurrent; } ?>],
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
                            stepValue: 1,
							beginAtZero: true
						}
					}]
				},
				title: {
					display: true,
					text: '<?php if (isset($_GET['Year'])) { echo $SelectedYearTotal; } else { echo $CurrentYearTotal; } ?> Total Applicants for <?php if (isset($_GET['Year'])) { echo $SelectedYear; } else { echo $CurrentYear; } ?>'
				},
				legend: {
					display: false
				}
			}
		});
		$.fn.dataTable.moment('MM/dd/yyyy hh:mm:ss A');
		var table = $('#ListLogbook').DataTable( {
        	"order": [[ 0, "desc" ]],
        	columnDefs: [{ targets: [0], type: 'date'}],
        	buttons: [
	            {
		            extend: 'print',
		            exportOptions: {
		                columns: [ 0, 1 ]
		            }
		        },
		        {
		            extend: 'copyHtml5',
		            exportOptions: {
		                columns: [ 0, 1 ]
		            }
		        },
		        {
		            extend: 'excelHtml5',
		            exportOptions: {
		                columns: [ 0, 1 ]
		            }
		        },
		        {
		            extend: 'csvHtml5',
		            exportOptions: {
		                columns: [ 0, 1 ]
		            }
		        },
		        {
		            extend: 'pdfHtml5',
		            exportOptions: {
		                columns: [ 0, 1 ]
		            }
		        }
	        ]
   		});
		$('#ExportPrint').on('click', function () {
	        table.button('0').trigger();
	    });
	    $('#ExportCopy').on('click', function () {
	        table.button('1').trigger();
	    });
	    $('#ExportExcel').on('click', function () {
	        table.button('2').trigger();
	    });
	    $('#ExportCSV').on('click', function () {
	        table.button('3').trigger();
	    });
	    $('#ExportPDF').on('click', function () {
	        table.button('4').trigger();
    	});
		$('#MoreOptions').on('click', function () {
			$('#MoreOptions').hide();
			$('.modal-fade').fadeIn();
		});
		var	MonthlyGraph = $('#MonthlyTable').DataTable( {
        	"order": [[ 0, "desc" ]],
        	columnDefs: [{ targets: [0], type: 'date'}],
        	buttons: [
	            {
		            extend: 'print',
		            exportOptions: {
		                columns: [ 0, 1, 2, 3, 4 ]
		            }
		        },
		        {
		            extend: 'copyHtml5',
		            exportOptions: {
		                columns: [ 0, 1, 2, 3, 4 ]
		            }
		        },
		        {
		            extend: 'excelHtml5',
		            exportOptions: {
		                columns: [ 0, 1, 2, 3, 4 ]
		            }
		        },
		        {
		            extend: 'csvHtml5',
		            exportOptions: {
		                columns: [ 0, 1, 2, 3, 4 ]
		            }
		        },
		        {
		            extend: 'pdfHtml5',
		            exportOptions: {
		                columns: [ 0, 1, 2, 3, 4 ]
		            }
		        }
	        ]
   		});
		$('#MG_ExportPrint').on('click', function () {
	       	MonthlyGraph.button('0').trigger();
	    });
	    $('#MG_ExportCopy').on('click', function () {
	       	MonthlyGraph.button('1').trigger();
	    });
	    $('#MG_ExportExcel').on('click', function () {
	       	MonthlyGraph.button('2').trigger();
	    });
	    $('#MG_ExportCSV').on('click', function () {
	       	MonthlyGraph.button('3').trigger();
	    });
	    $('#MG_ExportPDF').on('click', function () {
	       	MonthlyGraph.button('4').trigger();
    	});
		$('#MoreOptions').on('click', function () {
			$('#MoreOptions').hide();
			$('.modal-fade').fadeIn();
		});
		new Chart(document.getElementById("GM_pie-chart"), {
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
			}
		});
		var cDataExpired = JSON.parse(`<?php echo $chart_data_expired; ?>`);
		new Chart(document.getElementById("GM_pie-chart-expired"), {
			type: 'pie',
			data: {
				labels: cDataExpired.label,
				datasets: [{
					label: cDataExpired.label,
					backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
					data: cDataExpired.data,
				}]
			},
			options: {
				legend:
				{
					display: true,
				},
			}
		});
	});
</script>
</html>