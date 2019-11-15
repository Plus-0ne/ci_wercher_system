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
						<img src="<?php echo $ApplicantImage; ?>" width="120" height="120">
					</div>
					<div class="col-sm-12 col-md-2 e-title">
						<h6>
							Position Desired
						</h6>
					</div>
					<div class="col-sm-12 col-md-4 e-det">
						<p>
							<?php echo $PositionDesired; ?>
						</p>
					</div>
					<div class="col-sm-12 col-md-2 e-title">
						<h6>
							Salary Expected
						</h6>
					</div>
					<div class="col-sm-12 col-md-4 e-det">
						<p>
							<?php echo $SalaryExpected; ?>
						</p>
					</div>
					<div class="col-sm-12 col-md-2 e-title">
						<h6>
							Applicant ID
						</h6>
					</div>
					<div class="col-sm-12 col-md-4 e-det">
						<p>
							<?php echo $ApplicantID; ?>
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
							Gender
						</h6>
					</div>
					<div class="col-sm-12 col-md-4 e-det">
						<p>
							<?php echo $Gender; ?>
						</p>
					</div>
					<div class="col-sm-12 col-md-2 e-title">
						<h6>
							Age
						</h6>
					</div>
					<div class="col-sm-12 col-md-4 e-det">
						<p>
							<?php echo $Age; ?>
						</p>
					</div>
					<div class="col-sm-12 col-md-2 e-title">
						<h6>
							Height
						</h6>
					</div>
					<div class="col-sm-12 col-md-4 e-det">
						<p>
							<?php echo $Height; ?>
						</p>
					</div>
					<div class="col-sm-12 col-md-2 e-title">
						<h6>
							Weight
						</h6>
					</div>
					<div class="col-sm-12 col-md-4 e-det">
						<p>
							<?php echo $Weight; ?>
						</p>
					</div>
					<div class="col-sm-12 col-md-2 e-title">
						<h6>
							Religion
						</h6>
					</div>
					<div class="col-sm-12 col-md-4 e-det">
						<p>
							<?php echo $Religion; ?>
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
							Citizenship
						</h6>
					</div>
					<div class="col-sm-12 col-md-4 e-det">
						<p>
							<?php echo $Citizenship; ?>
						</p>
					</div>
					<div class="col-sm-12 col-md-2 e-title">
						<h6>
							Civil Status
						</h6>
					</div>
					<div class="col-sm-12 col-md-4 e-det">
						<p>
							<?php echo $CivilStatus; ?>
						</p>
					</div>
					<div class="col-sm-12 col-md-2 e-title">
						<h6>
							# of Children
						</h6>
					</div>
					<div class="col-sm-12 col-md-4 e-det">
						<p>
							<?php echo $No_OfChildren; ?>
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
					<div class="col-sm-12 mt-5 mb-3">
						<h6>
							<i class="fas fa-stream"></i> Address
						</h6>
					</div>
					<div class="col-sm-12 col-md-4 e-title">
						<h6>
							Present
						</h6>
					</div>
					<div class="col-sm-12 col-md-8 e-det">
						<p>
							<?php echo $Address_Present; ?>
						</p>
					</div>
					<div class="col-sm-12 col-md-4 e-title">
						<h6>
							Provincial
						</h6>
					</div>
					<div class="col-sm-12 col-md-8 e-det">
						<p>
							<?php echo $Address_Provincial; ?>
						</p>
					</div>
					<div class="col-sm-12 col-md-4 e-title">
						<h6>
							Manila
						</h6>
					</div>
					<div class="col-sm-12 col-md-8 e-det">
						<p>
							<?php echo $Address_Manila; ?>
						</p>
					</div>
				</div>
				<div class="row rcontent p-5">
					<div class="col-sm-12 mb-5">
						<h5>
							<i class="fas fa-stream"></i> Documents
						</h5>
					</div>
					<div class="col-sm-12 col-md-2 e-title">
						<h6>
							S.S.S. #
						</h6>
					</div>
					<div class="col-sm-12 col-md-4 e-det">
						<p>
							<?php echo $SSS_No; ?>
						</p>
					</div>
					<div class="col-sm-12 col-md-2 e-title">
						<h6>
							Effective Date of Coverage
						</h6>
					</div>
					<div class="col-sm-12 col-md-4 e-det">
						<p>
							<?php echo $EffectiveDateCoverage; ?>
						</p>
					</div>
					<div class="col-sm-12 col-md-2 e-title">
						<h6>
							Residence Certificate No.
						</h6>
					</div>
					<div class="col-sm-12 col-md-4 e-det">
						<p>
							<?php echo $ResidenceCertificateNo; ?>
						</p>
					</div>
					<div class="col-sm-12 col-md-2 e-title">
						<h6>
							Issued At
						</h6>
						<h6>
							Issued On
						</h6>
					</div>
					<div class="col-sm-12 col-md-4 e-det">
						<p>
							<?php echo $Rcn_At; ?>
							<br>
							<?php echo $Rcn_On; ?>
						</p>
					</div>
					<div class="col-sm-12 col-md-2 e-title">
						<h6>
							Tax Identification No.
						</h6>
					</div>
					<div class="col-sm-12 col-md-4 e-det">
						<p>
							<?php echo $TIN; ?>
						</p>
					</div>
					<div class="col-sm-12 col-md-2 e-title">
						<h6>
							Issued At
						</h6>
						<h6>
							Issued On
						</h6>
					</div>
					<div class="col-sm-12 col-md-4 e-det">
						<p>
							<?php echo $TIN_At; ?>
							<br>
							<?php echo $TIN_On; ?>
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
									<th>School Address</th>
									<th>From Year</th>
									<th>To Year</th>
									<th>Highest Degree / Certificate Attained</th>
								</thead>
								<tbody>
									<?php foreach ($GetAcadHistory->result_array() as $row): ?>
										<?php if ($ApplicantID == $row['ApplicantID']) { ?>
											<tr>
												<td><?php echo $row['Level'];?></td>
												<td><?php echo $row['SchoolName'];?></td>
												<td><?php echo $row['SchoolAddress'];?></td>
												<td><?php echo $row['DateStarted'];?></td>
												<td><?php echo $row['DateEnds'];?></td>
												<td><?php echo $row['HighDegree'];?></td>
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