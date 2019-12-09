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
								<li class="breadcrumb-item"><a href="<?=base_url()?>Dashboard">Home</a></li>
								<li class="breadcrumb-item">
									<?php if ($Status == 'Employed') { 
										echo '<a href="'. base_url() . 'Employee">Employee</a>';
									} else { 
										echo '<a href="'. base_url() . 'Applicants">Applicants</a>';
									} ?>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Details</li>
							</ol>
						</nav>
					</div>
				</div>
				<div class="row rcontent p-5 PrintOut">
					<div class="col-sm-6 col-md-6 mb-5 PrintExclude">
						<a href="<?php if (isset($_SERVER['HTTP_REFERER'])): ?>
						<?php echo $_SERVER['HTTP_REFERER']; ?>
						<?php else: ?>
							<?=base_url()?>Employee
							<?php endif ?>" class="btn btn-primary btn-sm"><i class="fas fa-chevron-left"></i> Back </a>
					</div>
						<div class="col-sm-6 col-md-6 text-right PrintExclude">
							<button onClick="printContent('PrintOut')" type="button" class="btn btn-primary mr-auto"><i class="fas fa-print"></i> Print</button>
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
								<?php if ($Status == 'Employed') { ?>
									<i class="fas fa-circle PrintExclude" style="color: #1BDB07;"></i> Employed
								<?php } else { ?>
									<i class="fas fa-circle PrintExclude" style="color: #DB3E07;"></i> Applicant
								<?php } ?>
							</p>
						</div>
						<div class="col-sm-12 col-md-2 e-title">
							<h6>
								Applied On
							</h6>
						</div>
						<div class="col-sm-12 col-md-4 e-det">
							<p>
								<?php echo $AppliedOn; ?>
							</p>
						</div>
						<!-- CONTRACT REPORT -->
						<?php if ($Status == 'Employed') { ?>
							<div class="col-sm-12 col-md-2 e-title PrintExclude">
								<h6>
									Contract
								</h6>
							</div>
							<div class="col-sm-12 col-md-4 e-det PrintExclude">
								<p>
									<button id="EmpContractButton" class="btn btn-primary btn-sm w-50 mb-1" data-toggle="modal" data-target="#EmpContractModal"><i class="far fa-eye"></i> View Contract</button>
								</p>
							</div>
						<?php } ?>
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
					<div class="row rcontent p-5 PrintOut">
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
					<div class="row rcontent p-5 PrintOut">
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
										<?php if ($GetAcadHistory->num_rows() > 0) { ?>
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
										<?php } else { ?>
											<tr class="w-100 text-center">
												<td>
													<h5>
														No Data
													</h5>
												</td>
											</tr>
										<?php } ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<div class="row rcontent p-5 PrintOut">
						<div class="col-sm-12 mb-5">
							<h5>
								<i class="fas fa-stream"></i> Employment Details
							</h5>
						</div>
						<div class="col-sm-12">
							<div class="table-responsive">
								<table class="table table-condensed">
									<thead>
										<th>Name</th>
										<th>Address</th>
										<th>Period Covered</th>
										<th>Position</th>
										<th>Salary</th>
										<th>Cause of separation</th>
									</thead>
									<tbody>
										<?php if ($employment_record->num_rows() > 0) { ?>
											<?php foreach ($employment_record->result_array() as $row): ?>
												<?php if ($ApplicantID == $row['ApplicantID']) { ?>
													<tr>
														<td><?php echo $row['Name'];?></td>
														<td><?php echo $row['Address'];?></td>
														<td><?php echo $row['PeriodCovered'];?></td>
														<td><?php echo $row['Position'];?></td>
														<td><?php echo $row['Salary'];?></td>
														<td><?php echo $row['CauseOfSeparation'];?></td>
													</tr>
												<?php } ?>
											<?php endforeach ?>
										<?php } else { ?>
											<tr class="w-100 text-center">
												<td>
													<h5>
														No Data
													</h5>
												</td>
											</tr>
										<?php } ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<div class="row rcontent p-5">
						<div class="col-sm-12 mb-5">
							<h5>
								<i class="fas fa-stream"></i> Machine Operated
							</h5>
						</div>
						<div class="col-sm-12">
							<div class="table-responsive">
								<table class="table table-condensed">
									<thead>
										<th>Machine Name</th>
										
									</thead>
									<tbody>
										<?php if ($Machine_Operatessss->num_rows() > 0) { ?>
											<?php foreach ($Machine_Operatessss->result_array() as $row): ?>
												<?php if ($ApplicantID == $row['ApplicantID']) { ?>
													<tr>
														<td><?php echo $row['MachineName'];?></td>
													</tr>
												<?php } ?>
											<?php endforeach ?>
										<?php } else { ?>
											<tr class="w-100 text-center">
												<td>
													<h5>
														No Data
													</h5>
												</td>
											</tr>
										<?php } ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
					
				</div>
			</div>
		</div>
		<!-- The Modal -->          
		<?php if($Status == 'Employed') { ?>          
		<div class="modal" id="EmpContractModal">
			<div class="modal-dialog modal-xl">
				<div class="modal-content">

				<!-- Modal Header -->
				<div class="modal-header">
					<h4 class="modal-title PrintOut PrintOutModal">Contract Report for <?=$LastName?>, <?=$FirstName?> <?=$MiddleInitial?>.</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>

				<!-- Modal body -->
				<div class="modal-body">
					<div class="row rcontent PrintOut PrintOutModal">
						<div class="col-sm-2 col-md-2">
							<h6>
								Client Name
							</h6>
						</div>
						<div class="col-sm-4 col-md-4">
							<p>
								<?php
								// TODO: Find a better solution than this.
								$found = false;
								foreach ($get_employee->result_array() as $row) {
									foreach ($getClientOption->result_array() as $nrow) {
										if ($row['ClientEmployed'] == $nrow['ClientID'] && $found == false) {
											$found = true;
											echo $nrow['Name'];
										}
									}
								}?>
							</p>
						</div>
						<div class="col-sm-2 col-md-2">
							<h6>
								Applied On
							</h6>
						</div>
						<div class="col-sm-4 col-md-4">
							<p>
								<?php echo $AppliedOn; ?>
							</p>
						</div>
						<div class="col-sm-2 col-md-2">
							<h6>
								Client Contact #
							</h6>
						</div>
						<div class="col-sm-4 col-md-4">
							<p>
								<?php
								// TODO: Find a better solution than this.
								$found = false;
								foreach ($get_employee->result_array() as $row) {
									foreach ($getClientOption->result_array() as $nrow) {
										if ($row['ClientEmployed'] == $nrow['ClientID'] && $found == false) {
											$found = true;
											echo $nrow['ContactNumber'];
										}
									}
								}?>
							</p>
						</div>
						<div class="col-sm-2 col-md-2">
							<h6>
								Contract Started
							</h6>
						</div>
						<div class="col-sm-4 col-md-4">
							<p>
								<?php echo $DateStarted; ?>
							</p>
						</div>
						<div class="col-sm-2 col-md-2">
							<h6>
								Client Address
							</h6>
						</div>
						<div class="col-sm-4 col-md-4">
							<p>
								<?php
								// TODO: Find a better solution than this.
								$found = false;
								foreach ($get_employee->result_array() as $row) {
									foreach ($getClientOption->result_array() as $nrow) {
										if ($row['ClientEmployed'] == $nrow['ClientID'] && $found == false) {
											$found = true;
											echo $nrow['Address'];
										}
									}
								}?>
							</p>
						</div>
						<div class="col-sm-2 col-md-2">
							<h6>
								Contract Ends
							</h6>
						</div>
						<div class="col-sm-4 col-md-4">
							<p>
								<?php echo $DateEnds; ?>
							</p>
						</div>
					</div>
					<div class="row rcontent">
						<div class="col-sm-12 col-md-12 text-center PrintOut PrintOutModal">
							<h6>
								Days Remaining on Contract
							</h6>
						</div>
						<div class="col-sm-12 col-md-12 text-center PrintOut PrintOutModal">
							<p>
								<?php
									$currTime = time();
									$strDateEnds = strtotime($DateEnds);
									$strDateStarted = strtotime($DateStarted);
									// PERCENTAGE
									$rPercentage = (($strDateEnds - $currTime) * 100) / ($strDateEnds - $strDateStarted);
									$rPercentage = round($rPercentage);
									// DAYS REMAINING
									$dateTimeZone = new DateTimeZone("Asia/Manila");
									$datetime1 = new DateTime('@' . $currTime, $dateTimeZone);
									$datetime2 = new DateTime('@' . $strDateEnds, $dateTimeZone);
									$interval = $datetime1->diff($datetime2);
									echo $interval->format('%y years, %m months, %d days');
								?>
							</p>
						</div>
						<div class="col-sm-12 col-md-12">
							<div class="progressBar">
								<div class="progressBarTitle progressRemainingColor">Percentage</div>
								<div class="progress progressRemaining"></div>
								<div class="progress_value">45%</div>
							</div>
						</div>
					</div>
				</div>

				<!-- Modal footer -->
				<div class="modal-footer">
					<button onClick="printContent('PrintOutModal')" type="button" class="btn btn-primary mr-auto"><i class="fas fa-print"></i> Print</button>
					<button type="button" class="btn btn-danger ml-auto" data-dismiss="modal">Close</button>
				</div>

				</div>
			</div>
		</div>
		<?php } ?>
	</body>
	<?php $this->load->view('_template/users/u_scripts');?>
	<script type="text/javascript">
		$(document).ready(function () {
			$('#sidebarCollapse').on('click', function () {
				$('#sidebar').toggleClass('active');
				$('.ncontent').toggleClass('shContent');
			});
		});
		$("#EmpContractButton").click(function(){
			var rPercentage = '<?php echo $rPercentage;?>';
			$('.progressRemaining').animate({width:rPercentage + "%"},1500);
			$('.progress_value').text(rPercentage + "%");
		});
	</script>
	<textarea id="text"></textarea>
	</html>