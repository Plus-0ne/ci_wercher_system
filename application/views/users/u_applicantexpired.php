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
								<li class="breadcrumb-item active" aria-current="page">Applicants</li>
							</ol>
						</nav>
					</div>
				</div>
				<div class="row rcontent">
					<div class="col-sm-12 col-md-4 PrintPageName PrintOut">
						<h4>
							<i class="fas fa-user-friends fa-fw"></i>Expired Contracts (<?php echo $get_ApplicantExpired->num_rows() ?>)
						</h4>
					</div>
					<div class="col-sm-12 col-md-8 text-right PrintExclude">
						<a href="<?=base_url()?>Applicants" class="btn btn-info mr-auto"><i class="fas fa-user-friends fa-fw"></i> New Applicants (<?php echo $get_employee->num_rows()?>)</a>
						<button onClick="printContent('PrintOut')" type="button" class="btn btn-primary mr-auto"><i class="fas fa-print"></i> Print</button>
					</div>
					<div class="col-sm-12">
						<?php echo $this->session->flashdata('prompts'); ?>
						<div class="table-responsive pt-5 pb-5 pl-2 pr-2">
							<table id="emp" class="table table-striped table-bordered PrintOut" style="width: 100%;">
								<thead>
									<tr>
										<th> Applicant </th>
										<th> Applicant ID </th>
										<th> Previous Position </th>
										<th> Full Name </th>
										<th> Gender </th>
										<th> Applied On </th>
										<th> Expired Since </th>
										<th class="PrintExclude"> Action </th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($get_ApplicantExpired->result_array() as $row): ?>
										<tr>
											<td class="text-center">
												<img src="<?php echo $row['ApplicantImage']; ?>" width="70" height="70">
											</td>
											<td class="text-center align-middle">
												<?php echo $row['ApplicantID']; ?>
											</td>
											<td class="text-center align-middle">
												<?php echo $row['PositionDesired']; ?>
											</td>
											<td class="text-center align-middle">
												<?php echo $row['LastName']; ?> , <?php echo $row['FirstName']; ?> <?php echo $row['MiddleInitial']; ?>.
											</td>
											<td class="text-center align-middle">
												<?php echo $row['Gender']; ?>
											</td>
											<td class="text-center align-middle">
												<?php echo $row['AppliedOn']; ?>
											</td>
											<td class="text-center align-middle">
												<?php echo $row['DateEnds']; ?>
											</td>
											<td class="text-center align-middle PrintExclude" width="100">
												<a class="btn btn-primary btn-sm w-100 mb-1" href="<?=base_url()?>ViewEmployee?id=<?php echo $row['ApplicantNo']; ?>"><i class="far fa-eye"></i> View</a>
												<!-- <a class="btn btn-info btn-sm w-100 mb-1" href="<?=base_url()?>EmployApplicant?id=<?php echo $row['ApplicantNo']; ?>"onclick=" return confirm('Hire Employee?')"><i class="fas fa-user-edit"></i> Hire</a> -->
												<button id="<?php echo $row['ApplicantNo']; ?>" type="button" class="btn btn-info btn-sm w-100 mb-1 ModalHire"  data-toggle="modal" data-target="#hirthis"><i class="fas fa-user-edit"></i> Hire</button>

												<a href="<?=base_url()?>RemoveEmployee?id=<?php echo $row['ApplicantNo']; ?>" class="btn btn-danger btn-sm w-100 mb-1" onclick="return confirm('Remove Applicant?')"><i class="fas fa-trash"></i> Delete</a>
											</td>
										</tr>
									<?php endforeach ?>
								</tbody>
							</table>
						</div>
						<div class="p-2">
							<a href="<?=base_url()?>NewEmployee" class="btn btn-primary" onclick="return confirm('Add Employee?')">
								<i class="fas fa-user-plus"></i> New
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- MODAL -->
	<div class="modal fade" id="hirthis" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<?php echo form_open(base_url().'EmployApplicant','method="POST"');?>
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle">Hire applicant</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<input id="idToHire" type="hidden" name="ApplicantID" value="">
					<div class="form-row">
						<div class="form-group col">
							<label>Choose Client</label>
							<select class="form-control" name="ClientID">
								<?php foreach ($getClientOption->result_array() as $row): ?>
									<option value="<?=$row['ClientID'];?>">
										<?=$row['Name'];?>
									</option>
								<?php endforeach ?>
							</select>
						</div>
						<div class="form-group col">
							<label>Choose Months</label>
							<input class="form-control" type="number" name="H_Months">
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary">Save changes</button>
				</div>
				<?php echo form_close();?>
			</div>
		</div>
	</div>
</body>
<?php $this->load->view('_template/users/u_scripts'); ?>
<script type="text/javascript">
	$(document).ready(function () {
		$('#sidebarCollapse').on('click', function () {
			$('#sidebar').toggleClass('active');
			$('.ncontent').toggleClass('shContent');
		});
		$('#emp').DataTable();
		$('.ModalHire').on('click', function () {
			$('#idToHire').val($(this).attr('id'));
		});

		$('[data-toggle="expired_tooltip"]').tooltip();   
		
	});
</script>
</html>