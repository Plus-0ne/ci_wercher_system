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
				<br>
				<div class="col-12 col-sm-12 payroll-tabs">
					<ul>
						<li class="payroll-tabs-active"><a href="#">Attendance</a></li>
						<li><a href="#">Payroll</a></li>
					</ul>
				</div>
				<div class="rcontent">
					<div class="row">
						<div class="col-8 mb-2">
							<div class="form-row">
								<form class="form-group mr-1">
									<button id="ImportButton" type="button" class="btn btn-success btn-sm form-control"><i class="fas fa-file-excel"></i> Import</button>
								</form>
								<form class="form-group">
								    <button id="ImportButton" type="submit" class="btn btn-success btn-sm form-control"><i class="fas fa-file-download"></i> Download Excel</button>
							  	</form>
							<!-- <div id="datatables-export"></div> -->
							</div>
						</div>
						<div class="col-4 mb-2 text-right">
							<button id="ImportButton" type="button" class="btn btn-secondary btn-sm"><i class="fas fa-lock"></i> Generate Payslip (WIP)</button>
						</div>
						<div class="col-sm-12 col-mb-12">
							<div class="table-responsive w-100">
								<table id="WeeklyTable" class="table table-condensed">
									<thead>
										<th style="min-width: 100px;">Applicant ID</th>
										<th style="min-width: 300px;">Name</th>
										<th style="min-width: 75px;">Salary (₱)</th>
										<th><i class="loading-fill-cell">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</i></th>
										<th><i class="loading-fill-cell">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</i></th>
										<th><i class="loading-fill-cell">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</i></th>
										<th><i class="loading-fill-cell">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</i></th>
										<th><i class="loading-fill-cell">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</i></th>
										<th style="min-width: 50px;">Reg. Hrs</th>
										<th style="min-width: 50px;">OT Hrs</th>
									</thead>
									<tbody>
										<tr>
											<td><i class="spinner-border spinner-border-sm m-2" role="status"></i></td>
											<td><i class="loading-fill-cell">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</i></td>
											<td><i class="spinner-border spinner-border-sm m-2" role="status"></i></td>
											<td><i class="spinner-border spinner-border-sm m-2" role="status"></i></td>
											<td><i class="spinner-border spinner-border-sm m-2" role="status"></i></td>
											<td><i class="spinner-border spinner-border-sm m-2" role="status"></i></td>
											<td><i class="spinner-border spinner-border-sm m-2" role="status"></i></td>
											<td><i class="spinner-border spinner-border-sm m-2" role="status"></i></td>
											<td><i class="spinner-border spinner-border-sm m-2" role="status"></i></td>
											<td><i class="spinner-border spinner-border-sm m-2" role="status"></i></td>
										</tr>
										<tr>
											<td><i class="spinner-border spinner-border-sm text-secondary m-2" role="status"></i></td>
											<td><i class="loading-fill-cell">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</i></td>
											<td><i class="spinner-border spinner-border-sm text-secondary m-2" role="status"></i></td>
											<td><i class="spinner-border spinner-border-sm text-secondary m-2" role="status"></i></td>
											<td><i class="spinner-border spinner-border-sm text-secondary m-2" role="status"></i></td>
											<td><i class="spinner-border spinner-border-sm text-secondary m-2" role="status"></i></td>
											<td><i class="spinner-border spinner-border-sm text-secondary m-2" role="status"></i></td>
											<td><i class="spinner-border spinner-border-sm text-secondary m-2" role="status"></i></td>
											<td><i class="spinner-border spinner-border-sm text-secondary m-2" role="status"></i></td>
											<td><i class="spinner-border spinner-border-sm text-secondary m-2" role="status"></i></td>
										</tr>
										<tr>
											<td><i class="spinner-border spinner-border-sm text-secondary m-2" role="status"></i></td>
											<td><i class="loading-fill-cell">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</i></td>
											<td><i class="spinner-border spinner-border-sm text-secondary m-2" role="status"></i></td>
											<td><i class="spinner-border spinner-border-sm text-secondary m-2" role="status"></i></td>
											<td><i class="spinner-border spinner-border-sm text-secondary m-2" role="status"></i></td>
											<td><i class="spinner-border spinner-border-sm text-secondary m-2" role="status"></i></td>
											<td><i class="spinner-border spinner-border-sm text-secondary m-2" role="status"></i></td>
											<td><i class="spinner-border spinner-border-sm text-secondary m-2" role="status"></i></td>
											<td><i class="spinner-border spinner-border-sm text-secondary m-2" role="status"></i></td>
											<td><i class="spinner-border spinner-border-sm text-secondary m-2" role="status"></i></td>
										</tr>
										<tr>
											<td><i class="spinner-border spinner-border-sm text-secondary m-2" role="status"></i></td>
											<td><i class="loading-fill-cell">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</i></td>
											<td><i class="spinner-border spinner-border-sm text-secondary m-2" role="status"></i></td>
											<td><i class="spinner-border spinner-border-sm text-secondary m-2" role="status"></i></td>
											<td><i class="spinner-border spinner-border-sm text-secondary m-2" role="status"></i></td>
											<td><i class="spinner-border spinner-border-sm text-secondary m-2" role="status"></i></td>
											<td><i class="spinner-border spinner-border-sm text-secondary m-2" role="status"></i></td>
											<td><i class="spinner-border spinner-border-sm text-secondary m-2" role="status"></i></td>
											<td><i class="spinner-border spinner-border-sm text-secondary m-2" role="status"></i></td>
											<td><i class="spinner-border spinner-border-sm text-secondary m-2" role="status"></i></td>
										</tr>
										<tr>
											<td><i class="spinner-border spinner-border-sm text-secondary m-2" role="status"></i></td>
											<td><i class="loading-fill-cell">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</i></td>
											<td><i class="spinner-border spinner-border-sm text-secondary m-2" role="status"></i></td>
											<td><i class="spinner-border spinner-border-sm text-secondary m-2" role="status"></i></td>
											<td><i class="spinner-border spinner-border-sm text-secondary m-2" role="status"></i></td>
											<td><i class="spinner-border spinner-border-sm text-secondary m-2" role="status"></i></td>
											<td><i class="spinner-border spinner-border-sm text-secondary m-2" role="status"></i></td>
											<td><i class="spinner-border spinner-border-sm text-secondary m-2" role="status"></i></td>
											<td><i class="spinner-border spinner-border-sm text-secondary m-2" role="status"></i></td>
											<td><i class="spinner-border spinner-border-sm text-secondary m-2" role="status"></i></td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- LOAD MODAL -->
	<div class="modal fade" id="ExcelImportSuccessfulModal" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-body">
					<div class="form-row">
						<div class="text-center ml-auto mr-auto">
							<i class="fas fa-check m-4 text-success" style="margin-right: -1px; font-size: 75px;"></i>
							<h4>Import successful</h4>
							<p>Loaded <b><?php echo $this->session->userdata('DatesTotal'); ?></b> days.
							<br>
							Preview table?
							<br>
							Previewing more than 7 days may cause slow performance.</p>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<a href="Payroll" class="btn btn-primary mr-auto"><i class="fas fa-times"></i> No</a>
					<a href="ViewClient?id=excel&mode=<?php echo $this->session->userdata('SalaryMode'); ?>" class="btn btn-success"><i class="fas fa-check"></i> Yes</a>
				</div>
			</div>
		</div>
	</div>
</body>
<?php $this->load->view('_template/users/u_scripts'); ?>
<script type="text/javascript">
	$(document).ready(function () {
		$(".nav-item a[href*='Payroll']").addClass("nactive");
		$('#ExcelImportSuccessfulModal').modal('show');
		$("#ExcelImportSuccessfulModal").on("hidden.bs.modal", function () { // Change URL on modal close
		    window.location.href="<?php echo base_url() . 'Payroll';  ?>";
		});
	});
</script>
<style>
	.loading-fill-cell {
		background-color: gray;
	}
	#WeeklyTable th {
		font-size: 14px;
	}
	#WeeklyTable td {

	}
	#WeeklyTable tbody tr:hover {
		background-color: rgba(125, 125, 125, 0.11);
		cursor: pointer;
	}
	.modal-open {
		overflow-y: auto !important;
		padding-right: 0 !important;
	}
</style>
</html>