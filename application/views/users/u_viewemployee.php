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
					<?php echo $this->session->flashdata('prompts'); ?>
					<div class="col-6 col-sm-6 col-md-6 mb-5 PrintExclude">
						<a href="
						<?php if ($Status == 'Employed') {
							echo base_url() . 'Employee';
						} else {
							echo base_url() . 'Applicants';
						} ?>" class="btn btn-primary btn-sm"><i class="fas fa-chevron-left"></i> Back </a>
					</div>
						<div class="col-6 col-sm-6 col-md-6 text-right PrintExclude dropdown">
							<?php if ($Status == 'Employed'): ?> 
								<?php if ($ReminderDate == NULL): ?> 
									<button id="<?php echo $ApplicantID; ?>" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#ReminderModal"><i class="fas fa-exclamation"></i> No reminder set</button>
								<?php else: ?>
									<button id="<?php echo $ApplicantID; ?>" class="btn btn-success btn-sm" data-toggle="modal" data-target="#ReminderModal"><i class="fas fa-check"></i> You will be notified TEST months before expiring</button>
								<?php endif; ?>
							<?php endif; ?>
							<button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<i class="fas fa-cog"></i>
							</button>
							<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
								<a href="<?=base_url()?>ModifyEmployee?id=<?=$ApplicantID?>" class="dropdown-item"><i class="fas fa-edit"></i> Edit</a>
								<?php if ($Status == 'Employed'): ?> 
									<button id="<?php echo $ApplicantID; ?>" class="dropdown-item ReminderButton" data-toggle="modal" data-target="#ReminderModal"><i class="fas fa-stopwatch"></i> Set a Reminder</button>
								<?php endif; ?>
								<button onClick="printContent('PrintOut')" type="button" class="dropdown-item"><i class="fas fa-print"></i> Print</button>
								<div class="dropdown-divider"></div>
								<a href="<?=base_url()?>BlacklistEmployee?id=<?=$ApplicantID?>" class="dropdown-item"><i class="fas fa-times"></i> Blacklist</a>
							</div>
						</div>
						<?php if ($Status == 'Blacklisted'): ?>
						<div class="row ml-auto mr-auto pb-5 w-100">
							<div class="col-sm-12 col-mb-12 w-100 text-center blacklisted-notice">
								<div class="col-sm-12 pb-2 pt-4">
									<h2>
										<i class="fas fa-exclamation-triangle"></i><b> Notice </b><i class="fas fa-exclamation-triangle"></i>
									</h2>
								</div>
								<div class="col-sm-12 pb-2">
									This applicant has been marked as <b>Blacklisted</b> for the following reason:
								</div>
								<div class="col-sm-12 pb-5">
									TEST TEST TEST TEST
								</div>
								<div class="col-sm-12 col-mb-12 pb-2">
									<button id="ViolationsButton" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#ViolationsModal"><i class="far fa-eye"></i> View Violations</button>
									<button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#EmpContractHistory"><i class="fas fa-book"></i> Relevant Document</button>
								</div>
							</div>
						</div>
						<?php endif; ?>
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
								<?php echo $PositionDesired; ?> <?php if($PositionGroup != NULL) { echo ' (' . $PositionGroup . ')'; } ?>
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
								<?php } elseif ($Status == 'Applicant') { ?>
									<i class="fas fa-circle PrintExclude" style="color: #DB3E07;"></i> Applicant
								<?php } elseif ($Status == 'Expired') { ?>
									<i class="fas fa-circle PrintExclude" style="color: #DB3E07;"></i> Applicant (Expired)
								<?php } elseif ($Status == 'Blacklisted') { ?>
									<i class="fas fa-circle PrintExclude" style="color: #000000;"></i> Blacklisted
								<?php } else { ?>
									<i class="fas fa-circle PrintExclude" style="color: #DB3E07;"></i> Unknown
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
									<button class="btn btn-primary btn-sm w-50 mb-1" data-toggle="modal" data-target="#EmpContractHistory"><i class="fas fa-book"></i> History</button>
								</p>
							</div>
						<?php } elseif ($Status == 'Expired') { ?>
							<div class="col-sm-12 col-md-2 e-title PrintExclude">
								<h6>
									Last Contract
								</h6>
							</div>
							<div class="col-sm-12 col-md-4 e-det PrintExclude">
								<p>
									<button id="EmpContractButton" class="btn btn-info btn-sm w-50 mb-1" data-toggle="modal" data-target="#EmpContractModal"><i class="far fa-eye"></i> View Contract</button>
									<button class="btn btn-info btn-sm w-50 mb-1" data-toggle="modal" data-target="#EmpContractHistory"><i class="fas fa-book"></i> History</button>
								</p>
							</div>
						<?php } elseif ($Status == 'Applicant') { ?>
							<div class="col-sm-12 col-md-2 e-title PrintExclude">
								<h6>
									Contract
								</h6>
							</div>
							<div class="col-sm-12 col-md-4 e-det PrintExclude">
								<p>
									No contract history.
								</p>
								<p>
									<button id="<?php echo $ApplicantID; ?>" data-dismiss="modal" type="button" class="btn btn-info btn-sm mr-auto ModalHire" data-toggle="modal" data-target="#hirthis"><i class="fas fa-user-edit"></i> Hire</button>
								</p>
							</div>
						<?php } ?>
						<div class="col-sm-12 col-md-2 e-title PrintExclude">
							<h6>
								Violations (<?php echo $GetViolations->num_rows(); ?>)
							</h6>
						</div>
						<div class="col-sm-12 col-md-4 e-det PrintExclude">
							<p>
								<?php if ($GetViolations->num_rows() > 0): ?>
									<button id="ViolationsButton" class="btn btn-danger btn-sm w-50 mb-1" data-toggle="modal" data-target="#ViolationsModal"><i class="far fa-eye"></i> View Violations</button>
								<?php else: ?>
									No violations on record.
								<?php endif; ?>
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
						<div class="col-sm-12 col-md-2 e-title">
							<h6>
								HDMF
							</h6>
						</div>
						<div class="col-sm-12 col-md-4 e-det">
							<p>
								<?php echo $HDMF; ?>
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
								<?php echo $HDMF_At; ?>
								<br>
								<?php echo $HDMF_On; ?>
							</p>
						</div>
						<div class="col-sm-12 col-md-2 e-title">
							<h6>
								PHILHEALTH
							</h6>
						</div>
						<div class="col-sm-12 col-md-4 e-det">
							<p>
								<?php echo $PhilHealth; ?>
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
								<?php echo $PhilHealth_At; ?>
								<br>
								<?php echo $PhilHealth_On; ?>
							</p>
						</div>
						<div class="col-sm-12 col-md-2 e-title">
							<h6>
								ATM #
							</h6>
						</div>
						<div class="col-sm-12 col-md-4 e-det">
							<p>
								<?php echo $ATM_No; ?>
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
												<td colspan="6">
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
								<i class="fas fa-stream"></i> Employment Record
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
										<th>Cause of Separation</th>
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
												<td colspan="6">
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
					<div class="row rcontent p-5">
						<div class="col-sm-12 mb-5">
							<h5>
								<i class="fas fa-stream"></i> Documents
							</h5>
						</div>
						<div class="col-sm-12">
							<div class="table-responsive">
								<table class="table table-condensed">
									<thead>
										<th>File</th>
										<th>Subject</th>
										<th>Description</th>
										<th>Remarks</th>
										<th>Date</th>
									</thead>
									<tbody>
										<?php if ($GetDocuments->num_rows() > 0) { ?>
											<?php foreach ($GetDocuments->result_array() as $row): ?>
												<?php if ($ApplicantID == $row['ApplicantID']) { ?>
													<tr>
														<td><a id="<?php echo $row['Doc_Image'];?>" class="a_eImage" href="#" data-toggle="modal" data-target="#docModals"><img class="small_docimage" src="<?php echo $row['Doc_Image'];?>" width="200"></a></td>
														<td><?php echo $row['Subject'];?></td>
														<td><?php echo $row['Description'];?></td>
														<td><?php echo $row['Remarks'];?></td>
														<td><?php echo $row['DateAdded'];?></td>
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
		<!-- EMPLOYED MODAL -->          
		<?php if($Status == 'Employed') { ?>          
		<div class="modal fade" id="EmpContractModal">
			<div class="modal-dialog modal-xl">
				<div class="modal-content">

				<!-- Modal Header -->
				<div class="modal-header">
					<h4 class="modal-title PrintOut PrintOutModal">Contract Report for <?=$LastName?>, <?=$FirstName?> <?=$MiddleInitial?>.</h4>
					<div class="text-right">
						<button onClick="printContent('PrintOutModal')" type="button" class="btn btn-primary mr-auto"><i class="fas fa-print"></i> Print</button>
						<button type="button" class="close d-none d-sm-block" data-dismiss="modal">&times;</button>
					</div>
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
								Violations
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
						<div class="col-sm-12 col-md-12 mt-5 text-center">
							<h6>
								Days Remaining on Contract
							</h6>
						</div>
						<div class="col-sm-12 col-md-12 text-center">
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
									if($interval->format('%y years, %m months, %d days') == '0 years, 0 months, 0 days') {
										echo $interval->format('%H hours, %I minutes, %S seconds');
									} else {
										echo $interval->format('%y years, %m months, %d days');
									}
								?>
								<input type="hidden" id="TimeLeft" value="<?php echo $rPercentage;?>">
							</p>
						</div>
						<div class="col-sm-12 col-md-12 PrintExclude">
							<div class="progressBar">
								<div class="progressBarTitle progressRemainingColor">Time Left</div>
								<div class="progress progressRemaining"></div>
								<div class="progress_value">45%</div>
							</div>
						</div>
					</div>
				</div>

				<!-- Modal footer -->
				<div class="modal-footer">
					<button id="<?php echo $ApplicantID; ?>" data-dismiss="modal" type="button" class="btn btn-primary mr-auto ExtendButton" data-toggle="modal" data-target="#ExtendContractModal"><i class="fas fa-plus"></i> Extend Contract</button>
					<button type="button" class="btn btn-danger ml-auto" data-dismiss="modal">Close</button>
				</div>

				</div>
			</div>
		</div>
		<?php } ?>
		<!-- EXPIRED MODAL -->
		<?php if($Status == 'Expired') { ?>          
		<div class="modal fade" id="EmpContractModal">
			<div class="modal-dialog modal-xl">
				<div class="modal-content">

				<!-- Modal Header -->
				<div class="modal-header">
					<h4 class="modal-title PrintOutModalExpired">Previous Contract Report for <?=$LastName?>, <?=$FirstName?> <?=$MiddleInitial?>.</h4>
					<div class="text-right">
						<button onClick="printContent('PrintOutModalExpired')" type="button" class="btn btn-primary mr-auto"><i class="fas fa-print"></i> Print</button>
						<button type="button" class="close d-none d-sm-block" data-dismiss="modal">&times;</button>
					</div>
				</div>

				<!-- Modal body -->
				<div class="modal-body">
					<div class="row rcontent PrintOutModalExpired">
						<div class="col-sm-2 col-md-2">
							<h6>
								Previous Client
							</h6>
						</div>
						<div class="col-sm-4 col-md-4">
							<p>
								<?php
								foreach ($GetPreviousContract->result_array() as $row) {
									echo $row['Client'];
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
								foreach ($GetPreviousContract->result_array() as $row) {
									$ClientName = $row['Client'];
									foreach ($this->Model_Selects->GetPreviousContractInfo($ClientName)->result_array() as $row) {
										echo $row['ContactNumber'];
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
								<?php
								foreach ($GetPreviousContract->result_array() as $row) {
									echo $row['PreviousDateStarted'];
								}?>
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
								foreach ($GetPreviousContract->result_array() as $row) {
									$ClientName = $row['Client'];
									foreach ($this->Model_Selects->GetPreviousContractInfo($ClientName)->result_array() as $row) {
										echo $row['Address'];
									}
								}?>
							</p>
						</div>
						<div class="col-sm-2 col-md-2">
							<h6>
								Contract Ended
							</h6>
						</div>
						<div class="col-sm-4 col-md-4">
							<p>
								<?php
								foreach ($GetPreviousContract->result_array() as $row) {
									echo $row['PreviousDateEnds'];
								}?>
							</p>
						</div>
						<div class="col-sm-12 col-md-12 mt-5 text-center PrintOutModalExpired">
							<button id="<?php echo $ApplicantID; ?>" data-dismiss="modal" type="button" class="btn btn-primary mr-auto ModalHire" data-toggle="modal" data-target="#hirthis"><i class="fas fa-plus"></i> New Contract</button>
						</div>
					</div>
				</div>

				<!-- Modal footer -->
				<div class="modal-footer">
					<button type="button" class="btn btn-danger ml-auto" data-dismiss="modal">Close</button>
				</div>

				</div>
			</div>
		</div>
		<?php } ?>
		<!-- CLIENT HIRE MODAL -->
		<?php $this->load->view('_template/modals/m_clienthire'); ?>
		<!-- CONTRACT HISTORY MODAL -->
		<?php $this->load->view('_template/modals/m_contracthistory'); ?>
		<!-- EXTEND CONTRACT MODAL -->
		<?php $this->load->view('_template/modals/m_extendcontract'); ?>
		<!-- SET A REMINDER MODAL -->
		<?php $this->load->view('_template/modals/m_setreminder'); ?>
		<!-- VIOLATIONS MODAL -->
		<?php $this->load->view('_template/modals/m_violations'); ?>
		<!-- DOCUMENT MODAL -->
		<?php $this->load->view('_template/modals/m_documents'); ?>
	</body>
	<?php $this->load->view('_template/users/u_scripts');?>
	<script type="text/javascript">
		$(document).ready(function () {
			$('#sidebarCollapse').on('click', function () {
				$('#sidebar').toggleClass('active');
				$('.ncontent').toggleClass('shContent');
			});
			$('.ModalHire').on('click', function () {
				$('#idToHire').val($(this).attr('id'));
				console.log($('#idToHire').val());
			});
			$('.ExtendButton').on('click', function () {
				$('#ExtendID').val($(this).attr('id'));
				console.log($('#ExtendID').val());
				console.log($('#ExtendDate').val());
			});
			$('.ReminderButton').on('click', function () {
				$('#ReminderID').val($(this).attr('id'));
				console.log($('#ReminderID').val());
			});
			$('#ListContractHistory').DataTable();
			$('#ListViolations').DataTable();
			$("#EmpContractButton").click(function(){
				var rPercentage = $("#TimeLeft").val();
				// if (rPercentage > 100) {
				// 	rPercentage = 100;
				// }
				$('.progressRemaining').animate({width:rPercentage + "%"},1500);
				$('.progress_value').text(rPercentage + "%");
			});
			$('.a_eImage').on('click', function () {
				var src1 = $(this).attr('id');
				$("#enlargeImage_doc").attr("src", src1);
			});

		});
		function hideModal() {
			$("#EmpContractModal").modal('hide');
		}
	</script>
	<style>
		.dropdown-item:hover {
			background-color: rgba(235, 235, 235, 1.0);
		}
		.blacklisted-notice {
			border-top: 0px;
			border-bottom: 0px;
			border-left: 8px;
			border-right: 0px;
			border-style: solid;
			border-color: rgba(255, 50, 50);
			background-color: rgba(255, 50, 50, 0.25);
		}
	</style>
	<textarea id="text"></textarea>
	</html>