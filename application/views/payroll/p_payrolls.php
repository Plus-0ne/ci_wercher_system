<?php $T_Header;?>
<?php
	// $IsFromExcel = False;
?>
<body>
	<div class="wrapper wercher-background-lowpoly">
		<?php $this->load->view('_template/users/u_sidebar'); ?>
		<div id="content" class="ncontent">
			<div class="container-fluid">
				<?php $this->load->view('_template/users/u_notifications'); ?>
				<?php echo $this->session->flashdata('prompts'); ?>
				?>
				<div class="col-12 col-sm-12 payroll-tabs">
					<ul>
						<li class="payroll-tabs-active"><a href="<?php echo base_url() ?>ViewClient?id=<?php echo $ClientID; ?>">Attendance</a></li>
						<li><a href="<?php echo base_url() ?>Payrollsss?id=<?php echo $ClientID; ?>">Payroll</a></li>
					</ul>
				</div>
				<div class="rcontent">
					<div class="row">
						<div class="col-8 mb-2">
							<form action="<?php echo base_url().'ImportExcel'; ?>" method="post" enctype="multipart/form-data">
								<input id="ExcelClientID" type="hidden" name="ExcelClientID" value="<?php echo $ClientID; ?>">
								<input id="file" type="file" name="file" class="btn btn-success" style="display: none;" onchange="form.submit()">
								<button id="ImportButton" type="button" class="btn btn-success"><i class="fas fa-file-excel"></i> Import</button>
								<button id="ImportButton" type="button" class="btn btn-secondary"><i class="fas fa-lock"></i> Export (WIP)</button>
							</form>
							<!-- <div id="datatables-export"></div> -->
						</div>
						<div class="col-4 mb-2 text-right">
							<button id="ImportButton" type="button" class="btn btn-secondary"><i class="fas fa-lock"></i> Generate Payslip (WIP)</button>
						</div>
						<div class="col-sm-12 col-mb-12">
							<div class="table-responsive w-100">
								<table id="WeeklyTable" class="table table-condensed">
									<thead>
										<th style="min-width: 100px;">Applicant ID</th>
										<th style="min-width: 300px;">Name</th>
										<th style="min-width: 75px;">Salary (₱)</th>
										<th>
											Action
										</th>
									</thead>
									<tbody>
										<?php foreach ($GetWeeklyListEmployee->result_array() as $row):
											$TotalRegHours = 0;
											$TotalOTHours = 0;?>
											<tr id="<?php echo $row['SalaryExpected']; ?>" data-clientid="<?php echo $row['ClientEmployed']; ?>" data="<?php echo $row['ApplicantID']; ?>" class='clickable-row' data-toggle="modal" data-target="#HoursWeeklyModal_<?php echo $row['ApplicantID']; ?>">
												<td><?php echo $row['ApplicantID'];?></td>
												<td><?php echo $row['LastName'] . ', ' . $row['FirstName'] . ' ' . $row['MiddleInitial'];?></td>
												<td><?php echo $row['SalaryExpected'];?></td>
										</tr>
									<?php endforeach; ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- LOAD MODAL -->
		<div class="modal fade" id="LoadModal" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-body">
						<div class="form-row">
							<div class="text-center ml-auto mr-auto">
								<div class="spinner-border m-5" role="status"></div>
								<h4>Please wait warmly</h4>
								<p>This will only take a little bit</p>
								<p class="load-hidden-1" style="display: none;">This is taking longer than necessary...</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
<?php $this->load->view('_template/users/u_scripts'); ?>
<script type="text/javascript">
	$(document).ready(function () {
		$('[data-toggle="tooltip"]').tooltip();
		$('#ImportButton').click(function(){ $('#file').trigger('click'); });
		function readURL(input) {
			if (input.files && input.files[0]) {
				var reader = new FileReader();
				reader.onload = function(e) {
					$('#ImportButton').attr('src', e.target.result);
				}
				reader.readAsDataURL(input.files[0]);
			}
		}
		$("#file").change(function() {
			$('#LoadModal').modal('show');
			readURL(this);
			setTimeout(function (){

				$('.load-hidden-1').fadeIn();

			}, 2000);
		});
		if (localStorage.getItem('SidebarVisible') == 'true') {
			$('#sidebar').addClass('active');
			$('.ncontent').addClass('shContent');
		} else {
			$('#sidebar').css('transition', 'all 0.3s');
			$('#content').css('transition', 'all 0.3s');
		}
		$('#sidebarCollapse').on('click', function () {
			if (localStorage.getItem('SidebarVisible') == 'false') {
				$('#sidebar').addClass('active');
				$('.ncontent').addClass('shContent');
				$('#sidebar').css('transition', 'all 0.3s');
				$('#content').css('transition', 'all 0.3s');
				localStorage.setItem('SidebarVisible', 'true');
			} else {
				$('#sidebar').removeClass('active');
				$('.ncontent').removeClass('shContent');
				$('#sidebar').css('transition', 'all 0.3s');
				$('#content').css('transition', 'all 0.3s');
				localStorage.setItem('SidebarVisible', 'false');
			}
		});

		var dd_buttons = new $.fn.dataTable.Buttons(table, {
			buttons: [
			{
				extend: 'collection',
				text: '<i class="fas fa-download"></i>',
				className: 'btn btn-primary',

				buttons: [
				{
					extend: 'copy',
					text: '<div class="btn btn-sm btn-info w-100">Copy</div>',
					className: 'dropdown-item w-25 ml-auto',
				},
				{
					extend: 'csv',
					text: '<div class="btn btn-sm btn-info w-100">CSV</div>',
					className: 'dropdown-item w-25 ml-auto',
				},
				{
					extend: 'excel',
					text: '<div class="btn btn-sm btn-info w-100">Excel</div>',
					className: 'dropdown-item w-25 ml-auto',
				},
				{
					extend: 'pdf',
					text: '<div class="btn btn-sm btn-info w-100">PDF</div>',
					className: 'dropdown-item w-25 ml-auto',
				},
				{
					extend: 'print',
					text: '<div class="btn btn-sm btn-info w-100">Print</div>',
					className: 'dropdown-item w-25 ml-auto',
				},
				]
			}
			]
		}).container().appendTo($('#datatables-export'));
	});
</script>
<style>
	#WeeklyTable th {
		font-size: 14px;
	}
	#WeeklyTable td {

	}
	#WeeklyTable tbody tr:hover {
		background-color: rgba(125, 125, 255, 0.25);
		cursor: pointer;
	}
	.modal-open {
		overflow-y: auto !important;
		padding-right: 0 !important;
	}
</style>
</html>