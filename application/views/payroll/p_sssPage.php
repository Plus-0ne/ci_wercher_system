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
								<li class="breadcrumb-item active" aria-current="page">SSS Table</li>
							</ol>
						</nav>
					</div>
				</div>
				<div class="row rcontent PrintOutTable">
					<?php echo $this->session->flashdata('prompts'); ?>
					<div class="col-sm-12 col-md-12 mb-5">
						<h4>
							<i class="fas fa-vial"></i> SSS Table
						</h4>
					</div>
					<div class="col-sm-12 col-mb-12">
						<div class="table-responsive">
							<table id="SalaryTable" class="table table-condensed">
								<thead>
									<th>From</th>
									<th>To</th>
									<th>Contribution</th>
									<th>Action</th>
								</thead>
								<tbody>
									<?php foreach ($sss_Contri->result_array() as $row) { ?>
										<tr>
											<td>
												<?php print $row['f_range']; ?>
											</td>
											<td>
												<?php print $row['t_range']; ?>
											</td>
											<td>
												<?php print $row['contribution']; ?>
											</td>
											<td width="140">
												<a class="btn btn-primary btn-sm w-100 mb-1" href="#"><i class="fas fa-edit fa-fw"></i> Update</a>
												<a class="btn btn-secondary btn-sm w-100 mb-1" href="#"><i class="fas fa-trash-alt fa-fw"></i> Delete</a>
											</td>
										</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>
						<button class="btn btn-primary" data-toggle="modal" data-target="#AddSSSdata"><i class="fas fa-plus fa-fw"></i> Add Data</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Modal -->
	<div class="modal fade" id="AddSSSdata" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<?php echo form_open(base_url().'AddthisSss','method="post"'); ?>
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Add to SSS table</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="text-center">
						<h6>
							Range of Compensation
						</h6>
					</div>
					<div class="form-row text-center">
						<div class="form-group m-auto w-50">
							<label>From</label>
							<input class="form-control text-center" type="text" name="f_range">
						</div>
						<div class="form-group m-auto w-50">
							<label>To</label>
							<input class="form-control text-center" type="text" name="t_range">
						</div>
					</div>
					<div class="form-row text-center">
						<div class="form-group m-auto w-100">
							<label>Contribution</label>
							<input class="form-control text-center" type="text" name="contribution">
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary">Save changes</button>
				</div>
			</div>
			<?php echo form_close(); ?>
		</div>
	</div>
</body>
<?php $this->load->view('_template/users/u_scripts'); ?>
<script type="text/javascript">
	$(document).ready(function () {
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
		$('#TaxTable').hide();
	});
</script>
</html>