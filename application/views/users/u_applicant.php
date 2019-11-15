<?php $T_Header;?>
<body>
	<div class="wrapper">
		<?php $this->load->view('_template/users/u_sidebar'); ?>
		<div id="content" class="ncontent">
			<div class="container-fluid">
				<div class="row">
					<div class="col-sm-12">
						<nav class="navbar navbar-expand-lg">
							<button type="button" id="sidebarCollapse" class="btn btn-primary"><i class="fas fa-bars"></i></button>
						</nav>
					</div>
				</div>
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
					<div class="col-sm-12">
						<div class="table-responsive pt-5 pb-5 pl-2 pr-2">
							<table id="emp" class="table table-striped table-bordered" style="width: 100%;">
								<thead>
									<tr>
										<th> Applicant </th>
										<th> Applicant ID </th>
										<th> Full Name </th>
										<th> Gender </th>
										<th> Action </th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($get_employee->result_array() as $row): ?>
										<tr>
											<td class="text-center">
												<img src="<?php echo $row['ApplicantImage']; ?>" width="70" height="70">
											</td>
											<td class="text-center align-middle">
												<?php echo $row['ApplicantID']; ?>
											</td>
											<td class="text-center align-middle">
												<?php echo $row['LastName']; ?> , <?php echo $row['FirstName']; ?> <?php echo $row['MiddleInitial']; ?>.
											</td>
											<td class="text-center align-middle">
												<?php echo $row['Gender']; ?>
											</td>
											<td class="text-center align-middle" width="100">
												<a class="btn btn-primary btn-sm w-100 mb-1" href="<?=base_url()?>ViewEmployee?id=<?php echo $row['ApplicantNo']; ?>"onclick=" return confirm('View Employee?')"><i class="far fa-eye"></i> View</a>
												<a class="btn btn-info btn-sm w-100 mb-1" href="#<?php echo $row['ApplicantNo']; ?>"onclick=" return confirm('Hire Employee?')"><i class="fas fa-user-edit"></i> Hire</a>
												<a href="<?=base_url()?>RemoveEmployee?id=<?php echo $row['ApplicantNo']; ?>" class="btn btn-danger btn-sm w-100 mb-1" onclick="return confirm('Remove Employee?')"><i class="fas fa-trash"></i> Delete</a>
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
</body>
<?php $this->load->view('_template/users/u_scripts'); ?>
<script type="text/javascript">
	$(document).ready(function () {
		$('#sidebarCollapse').on('click', function () {
			$('#sidebar').toggleClass('active');
			$('.ncontent').toggleClass('shContent');
		});
		$('#emp').DataTable();
	});
</script>
</html>