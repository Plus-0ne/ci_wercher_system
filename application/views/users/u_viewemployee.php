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
								<li class="breadcrumb-item">Employee</li>
								<li class="breadcrumb-item active" aria-current="page">Details</li>
							</ol>
						</nav>
					</div>
				</div>
				<div class="row rcontent p-5">
					<div class="col-sm-12 mb-5">
						<a href="<?php if (isset($_SERVER['HTTP_REFERER'])): ?>
							<?php echo $_SERVER['HTTP_REFERER']; ?>
						<?php else: ?>
							<?=base_url()?>Employee
						<?php endif ?>" class="btn btn-primary btn-sm"><i class="fas fa-chevron-left"></i> Back </a>
					</div>
					<div class="col-sm-12 mb-5">
						<h5>
							<i class="fas fa-user-alt"></i> Personal Information
						</h5>
					</div>
					<div class="col-sm-12 mb-5 e-title">
						<img src="<?php echo $EmployeeImage; ?>" width="120" height="120">
					</div>
					<div class="col-sm-12 col-md-2 e-title">
						<h6>
							Employment Type
						</h6>
					</div>
					<div class="col-sm-12 col-md-4 e-det">
						<p>
							<?php echo $EmploymentType; ?>
						</p>
					</div>
					<div class="col-sm-12 col-md-2 e-title">
						<h6>
							Employee ID
						</h6>
					</div>
					<div class="col-sm-12 col-md-4 e-det">
						<p>
							<?php echo $Employee_ID; ?>
						</p>
					</div>
					<div class="col-sm-12 col-md-2 e-title">
						<h6>
							Name
						</h6>
					</div>
					<div class="col-sm-12 col-md-4 e-det">
						<p>
							<?php echo $LastName; ?> , <?php echo $FirstName; ?>  <?php echo $MiddleInitial; ?>.
						</p>
					</div>
					<div class="col-sm-12 col-md-2 e-title">
						<h6>
							Address
						</h6>
					</div>
					<div class="col-sm-12 col-md-4 e-det">
						<p>
							<?php echo $Address; ?>
						</p>
					</div>
					<div class="col-sm-12 col-md-2 e-title">
						<h6>
							Birth Date
						</h6>
					</div>
					<div class="col-sm-12 col-md-4 e-det">
						<p>
							<?php echo $BirthDate; ?>
						</p>
					</div>
					<div class="col-sm-12 col-md-2 e-title">
						<h6>
							Birth Place
						</h6>
					</div>
					<div class="col-sm-12 col-md-4 e-det">
						<p>
							<?php echo $BirthPlace; ?>
						</p>
					</div>
					<div class="col-sm-12 col-md-2 e-title">
						<h6>
							Date Hired
						</h6>
					</div>
					<div class="col-sm-12 col-md-4 e-det">
						<p>
							<?php echo $DateHired; ?>
						</p>
					</div>
					<div class="col-sm-12 col-md-2 e-title">
						<h6>
							Status
						</h6>
					</div>
					<div class="col-sm-12 col-md-4 e-det">
						<p>
							<?php if ($Status == 'Active') { ?>
								<i class="fas fa-circle" style="color: #1BDB07;"></i> Active
							<?php } else { ?>
								<i class="fas fa-circle" style="color: #DB3E07;"></i> Applicant
							<?php } ?>
						</p>
					</div>
				</div>
				<div class="row rcontent p-5">
					<div class="col-sm-12 mb-5">
						<h5>
							<i class="fas fa-stream"></i> Benificiaries
						</h5>
					</div>
					<div class="col-sm-12 col-md-2 ml-auto text-center">
						<h6>
							SSS
						</h6>
						<p>
							<?php echo $SSS; ?>
						</p>
					</div>
					<div class="col-sm-12 col-md-2 ml-auto text-center">
						<h6>
							PhilHealth
						</h6>
						<p>
							<?php echo $Philhealth; ?>
						</p>
					</div>
					<div class="col-sm-12 col-md-2 ml-auto text-center">
						<h6>
							HDMF
						</h6>
						<p>
							<?php echo $HDMF; ?>
						</p>
					</div>
					<div class="col-sm-12 col-md-2 ml-auto text-center">
						<h6>
							TIN
						</h6>
						<p>
							<?php echo $TIN; ?>
						</p>
					</div>
					<div class="col-sm-12 col-md-2 ml-auto text-center">
						<h6>
							ATM
						</h6>
						<p>
							<?php echo $ATM; ?>
						</p>
					</div>
				</div>
				<div class="row rcontent p-5">
					<div class="col-sm-12 mb-5">
						<h5>
							<i class="fas fa-stream"></i> Academic History
						</h5>
					</div>
					<div class="col-sm-12">
						<div class="table-responsive">
							<table class="table table-condensed">
								<thead>
									<th>Level</th>
									<th>School Name</th>
									<th>From Year</th>
									<th>To Year</th>
								</thead>
								<tbody>
									<?php foreach ($GetAcadHistory->result_array() as $row): ?>
										<?php if ($Employee_ID == $row['EmployeeID']) { ?>
											<tr>
												<td><?php echo $row['Level'];?></td>
												<td><?php echo $row['SchoolName'];?></td>
												<td><?php echo $row['DateStarted'];?></td>
												<td><?php echo $row['DateEnds'];?></td>
											</tr>
										<?php } ?>
									<?php endforeach ?>
								</tbody>
							</table>
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
	});
</script>
</html>