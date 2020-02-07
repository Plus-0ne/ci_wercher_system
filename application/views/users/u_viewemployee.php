<?php $T_Header;?>
<body>
<style>
	body {
		background-image: url("assets/img/lowpoly.png");
		background-repeat: repeat-y;
        background-attachment: fixed;
	}
	.rounded-circle {
		border: 4px solid white;
	}
</style>
	<div class="wrapper">
		<?php $this->load->view('_template/users/u_sidebar'); ?>
		<div id="content" class="ncontent">
			<div class="container-fluid">
				<?php $this->load->view('_template/users/u_notifications'); ?>
				<div class="d-none d-sm-block">
					<div class="row PrintOut">
						<!-- <div class="col-6 col-sm-6 col-md-6 mb-5 PrintExclude">
							<a href="
							<?php if ($Status == 'Employed') {
								echo base_url() . 'Employee';
							} else {
								echo base_url() . 'Applicants';
							} ?>" class="btn btn-primary"><i class="fas fa-chevron-left"></i> Back </a>
						</div>
							<div class="col-6 col-sm-6 col-md-6 text-right PrintExclude dropdown">
								<?php if ($Status == 'Employed'): ?> 
									<?php if ($ReminderDate == NULL): ?> 
										<button id="<?php echo $ApplicantID; ?>" class="btn btn-warning" data-toggle="modal" data-target="#ReminderModal"><i class="fas fa-exclamation"></i> No reminder set</button>
									<?php else: ?>
										<button id="<?php echo $ApplicantID; ?>" class="btn btn-success" data-toggle="modal" data-target="#ReminderModal"><i class="fas fa-check"></i> You will be notified TEST months before expiring</button>
									<?php endif; ?>
								<?php endif; ?>
								<button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fas fa-cog px-1" style="margin-right: -1px;"></i>
								</button>
								<div class="dropdown-menu w-50" aria-labelledby="dropdownMenuButton">
									<a href="<?=base_url()?>ModifyEmployee?id=<?=$ApplicantID?>" class="dropdown-item"><i class="fas fa-edit"></i> Edit</a>
									<?php if ($Status == 'Employed'): ?> 
										<button id="<?php echo $ApplicantID; ?>" class="dropdown-item ReminderButton" data-toggle="modal" data-target="#ReminderModal"><i class="fas fa-stopwatch"></i> Set a Reminder</button>
									<?php endif; ?>
									<button onClick="printContent('PrintOut')" type="button" class="dropdown-item"><i class="fas fa-print"></i> Print</button>
									<div class="dropdown-divider"></div>
									<a href="<?=base_url()?>BlacklistEmployee?id=<?=$ApplicantID?>" class="dropdown-item"><i class="fas fa-times"></i> Blacklist</a>
								</div>
							</div> -->
							<div class="row employee-container">
								<div class="col-10 employee-tabs">
									<ul>
										<li id="TabPersonalBtn" class="employee-tabs-select employee-tabs-active"><a href="#Personal" onclick="">Personal</a></li>
										<li id="TabContractBtn" class="employee-tabs-select"><a href="#Contract" onclick="">Contract</a></li>
										<li id="TabDocumentsBtn" class="employee-tabs-select"><a href="#Documents" onclick="">Documents</a></li>
										<li id="TabAcademicBtn" class="employee-tabs-select"><a href="#Academic" onclick="">Academic</a></li>
										<li id="TabEmploymentsBtn" class="employee-tabs-select"><a href="#Employments" onclick="">Employments</a></li>
										<li id="TabMachineBtn" class="employee-tabs-select"><a href="#Machine" onclick="">Machine</a></li>
										<li id="TabNotesBtn" class="employee-tabs-select"><a href="#Notes" onclick="">Notes</a></li>
									</ul>
								</div>
								<div class="col-2 mb-5 employee-image">
									<img class="rounded-circle" src="<?php echo $ApplicantImage; ?>">
								</div>
							</div>
							<div class="row w-100 rcontent employee-content">
								<div class="col-2 employee-static mt-5 d-none d-sm-block">
									<div class="col-sm-12">
										<?php echo $LastName; ?> , <?php echo $FirstName; ?>  <?php echo $MiddleInitial; ?>.
									</div>
									<hr>
									<div class="col-sm-12 employee-static-item">
										<i class="fas fa-phone"></i> <?php echo $Phone_No; ?>
									</div>
									<div class="col-sm-12 employee-static-item">
										<i class="fas fa-map-marker-alt"></i> <?php echo $Address_Present; ?>
									</div>
									<hr>
									<div class="col-sm-12">
										<i class="fas fa-user-tie"></i> <?php echo $ApplicantID; ?>
									</div>
									<div class="col-sm-12 mt-2">
										<?php if ($Status == 'Employed') { ?>
											<i class="fas fa-square PrintExclude" style="color: #1BDB07;"></i> Employed (<?php echo 'EmployeeID'; ?>)
										<?php } elseif ($Status == 'Applicant') { ?>
											<i class="fas fa-square PrintExclude" style="color: #DB3E07;"></i> Applicant
										<?php } elseif ($Status == 'Expired') { ?>
											<i class="fas fa-square PrintExclude" style="color: #0721DB;"></i> Applicant (Expired)
										<?php } elseif ($Status == 'Blacklisted') { ?>
											<i class="fas fa-square PrintExclude" style="color: #000000;"></i> Blacklisted
										<?php } else { ?>
											<i class="fas fa-square PrintExclude" style="color: #DB3E07;"></i> Unknown
										<?php } ?>
									</div>
									<?php if ($Status == 'Blacklisted'): ?>
									<div class="row ml-auto mr-auto pb-5 pt-5 w-100">
										<div class="col-sm-12 col-mb-12 w-100 text-center blacklisted-notice">
											<div class="col-sm-12 pb-2 pt-4">
												<h5>
													<i class="fas fa-exclamation-triangle"></i><b> Notice </b><i class="fas fa-exclamation-triangle"></i>
												</h5>
											</div>
											<div class="col-sm-12 pb-2">
												This individual has been marked as <b>Blacklisted</b>
											</div>
											<div class="col-sm-12 col-mb-12 pb-2">
												<button id="TabDocumentsBtnAlt" class="employee-tabs-select btn btn-danger"><i class="far fa-eye"></i> Documents</button>
											</div>
										</div>
									</div>
									<?php endif; ?>
								</div>
								<div class="col-10">
									<div id="TabPersonal">
										<div class="employee-tabs-group-content">
											<div class="employee-content-header">
												<?php if ($Status == 'Employed'): ?> 
													<?php if ($ReminderDate == NULL): ?> 
														<button id="<?php echo $ApplicantID; ?>" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#ReminderModal"><i class="fas fa-exclamation"></i> No reminder set</button>
													<?php else: ?>
														<button id="<?php echo $ApplicantID; ?>" class="btn btn-success btn-sm" data-toggle="modal" data-target="#ReminderModal"><i class="fas fa-check"></i> You will be notified TEST months before expiring</button>
													<?php endif; ?>
												<?php endif; ?>
											</div>
											<hr>
											<div class="row mt-3">
												<div class="col-sm-4 employee-dynamic-header">
													<b>Present Address</b>
												</div>
												<div class="col-sm-4 employee-dynamic-header">
													<b>Provincial Address</b>
												</div>
												<div class="col-sm-4 employee-dynamic-header">
													<b>Manila</b>
												</div>
											</div>
											<div class="row">
												<div class="col-sm-4 employee-dynamic-item">
													<?php echo $Address_Present; ?>
												</div>
												<div class="col-sm-4 employee-dynamic-item">
													<?php echo $Address_Provincial; ?>
												</div>
												<div class="col-sm-4 employee-dynamic-item">
													<?php echo $Address_Manila; ?>
												</div>
											</div>
											<!-- ------------------ -->
											<div class="row mt-4">
												<div class="col-sm-2 employee-dynamic-header">
													<b>Sex</b>
												</div>
												<div class="col-sm-2 employee-dynamic-header">
													<b>Age</b>
												</div>
												<div class="col-sm-2 employee-dynamic-header">
													<b>Height</b>
												</div>
												<div class="col-sm-2 employee-dynamic-header">
													<b>Weight</b>
												</div>
												<div class="col-sm-2 employee-dynamic-header">
													<b>Religion</b>
												</div>
											</div>
											<div class="row">
												<div class="col-sm-2 employee-dynamic-item">
													<?php echo $Gender; ?>
												</div>
												<div class="col-sm-2 employee-dynamic-item">
													<?php echo $Age; ?>
												</div>
												<div class="col-sm-2 employee-dynamic-item">
													<?php echo $Height; ?>
												</div>
												<div class="col-sm-2 employee-dynamic-item">
													<?php echo $Weight; ?>
												</div>
												<div class="col-sm-2 employee-dynamic-item">
													<?php echo $Religion; ?>
												</div>
											</div>
											<!-- ------------------ -->
											<div class="row mt-3">
												<div class="col-sm-2 employee-dynamic-header">
													<b>Birth Place</b>
												</div>
												<div class="col-sm-2 employee-dynamic-header">
													<b>Birth Date</b>
												</div>
												<div class="col-sm-2 employee-dynamic-header">
													<b>Citizenship</b>
												</div>
												<div class="col-sm-2 employee-dynamic-header">
													<b>Civil Status</b>
												</div>
												<div class="col-sm-2 employee-dynamic-header">
													<b>No. of Children</b>
												</div>
											</div>
											<div class="row">
												<div class="col-sm-2 employee-dynamic-item">
													<?php echo $BirthPlace; ?>
												</div>
												<div class="col-sm-2 employee-dynamic-item">
													<?php echo $BirthDate; ?>
												</div>
												<div class="col-sm-2 employee-dynamic-item">
													<?php echo $Citizenship; ?>
												</div>
												<div class="col-sm-2 employee-dynamic-item">
													<?php echo $CivilStatus; ?>
												</div>
												<div class="col-sm-2 employee-dynamic-item">
													<?php echo $No_OfChildren; ?>
												</div>
											</div>
											<hr class="mt-5 mb-3">
											<div class="row employee-personal-row">
												<div class="col-sm-2 employee-dynamic-header">
													<b>S.S.S. No.</b>
												</div>
												<div class="col-sm-2 employee-dynamic-item">
													<?php echo $SSS_No; ?>
												</div>
												<div class="col-sm-2 ml-5 employee-dynamic-header">
													<b>Effective Date of Coverage</b>
												</div>
												<div class="col-sm-2 employee-dynamic-item">
													<?php echo $EffectiveDateCoverage; ?>
												</div>
											</div>
											<div class="row employee-personal-row mt-4">
												<div class="col-sm-2 employee-dynamic-header">
													<b>Residence Certificate No.</b>
												</div>
												<div class="col-sm-2 employee-dynamic-item">
													<?php echo $ResidenceCertificateNo; ?>
												</div>
												<div class="col-sm-2 ml-5 employee-dynamic-header">
													<b>Issued At</b>
													<br>
													<b>Issued On</b>
												</div>
												<div class="col-sm-2 employee-dynamic-item">
													<?php echo $Rcn_At; ?>
													<br>
													<?php echo $Rcn_On; ?>
												</div>
											</div>
											<div class="row employee-personal-row mt-4">
												<div class="col-sm-2 employee-dynamic-header">
													<b>Tax Identification No.</b>
												</div>
												<div class="col-sm-2 employee-dynamic-item">
													<?php echo $TIN; ?>
												</div>
												<div class="col-sm-2 ml-5 employee-dynamic-header">
													<b>Issued At</b>
													<br>
													<b>Issued On</b>
												</div>
												<div class="col-sm-2 employee-dynamic-item">
													<?php echo $TIN_At; ?>
													<br>
													<?php echo $TIN_On; ?>
												</div>
											</div>
											<div class="row employee-personal-row mt-4">
												<div class="col-sm-2 employee-dynamic-header">
													<b>HDMF</b>
												</div>
												<div class="col-sm-2 employee-dynamic-item">
													<?php echo $HDMF; ?>
												</div>
												<div class="col-sm-2 ml-5 employee-dynamic-header">
													<b>Issued At</b>
													<br>
													<b>Issued On</b>
												</div>
												<div class="col-sm-2 employee-dynamic-item">
													<?php echo $HDMF_At; ?>
													<br>
													<?php echo $HDMF_On; ?>
												</div>
											</div>
											<div class="row employee-personal-row mt-4">
												<div class="col-sm-2 employee-dynamic-header">
													<b>PHILHEALTH</b>
												</div>
												<div class="col-sm-2 employee-dynamic-item">
													<?php echo $PhilHealth; ?>
												</div>
												<div class="col-sm-2 ml-5 employee-dynamic-header">
													<b>Issued At</b>
													<br>
													<b>Issued On</b>
												</div>
												<div class="col-sm-2 employee-dynamic-item">
													<?php echo $PhilHealth_At; ?>
													<br>
													<?php echo $PhilHealth_On; ?>
												</div>
											</div>
											<div class="row employee-personal-row mt-4">
												<div class="col-sm-2 employee-dynamic-header">
													<b>ATM No.</b>
												</div>
												<div class="col-sm-2 employee-dynamic-item">
													<?php echo $ATM_No; ?>
												</div>
											</div>
										</div>
									</div>
									<div id="TabContract">
										<div class="employee-tabs-group-content">
											<?php if ($Status == 'Employed'): ?>
											<div class="employee-content-header">
												<button id="<?php echo $ApplicantID; ?>" data-dismiss="modal" type="button" class="btn btn-primary btn-sm mr-auto ExtendButton" data-toggle="modal" data-target="#ExtendContractModal"><i class="fas fa-plus"></i> Extend Contract</button>
												<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#EmpContractHistory"><i class="fas fa-book"></i> Contract History</button>
											</div>
											<hr>
											<div class="col-sm-12 col-md-12 text-center">
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
											<div class="row mt-4">
												<div class="col-sm-2 employee-dynamic-header">
													<b>Position</b>
												</div>
												<div class="col-sm-2 employee-dynamic-header">
													<b>Salary</b>
												</div>
											</div>
											<div class="row">
												<div class="col-sm-2 employee-dynamic-item">
													<?php echo $PositionDesired; ?>
												</div>
												<div class="col-sm-2 employee-dynamic-item">
													<?php echo $SalaryExpected; ?>
												</div>
											</div>
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
											<?php else: ?>
											<div class="employee-content-header">
												<button id="<?php echo $ApplicantID; ?>" data-dismiss="modal" type="button" class="btn btn-primary btn-sm mr-auto ModalHire" data-toggle="modal" data-target="#hirthis"><i class="fas fa-plus"></i> New Contract</button>
											</div>
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
											<?php endif; ?>
										</div>
									</div>
									<div id="TabDocuments">
										<div class="employee-tabs-group-content">
											<div class="employee-content-header">
												<button class="btn btn-secondary btn-sm"><i class="fas fa-lock"></i> Upload (WIP)</button>
											</div>
											<hr>
											<div class="row ml-3">
												<div class="col-sm-12">
													<span class="folder-button"><i class="fas fa-folder-open"></i> Documents (<?php echo $GetDocuments->num_rows(); ?>)</span>
												</div>
												<div class="folder-documents folder-active col-sm-12 mt-4 ml-5">
												<?php if ($GetDocuments->num_rows() > 0) { ?>
													<?php foreach ($GetDocuments->result_array() as $row): ?>
															<div class="mb-3">
																<div class="folder-documents-icon"><i class="fas fa-file-pdf"></i></div>
																<div class="col-sm-12 ml-3">
																	<a class="ml-2" href="<?php echo $row['Doc_File'];?>" target="_blank">
																	<b><?php echo $row['Doc_FileName']; ?></b></a>
																</div>
																<div class="folder-documents-info col-sm-12 ml-4">
																	Created by <?php echo $row['DateAdded']; ?>  (0MB)
																</div>
															</div>
													<?php endforeach ?>
												<?php } else { ?>
													No documents available.
												<?php } ?>
												</div>
											</div>
											<div class="row mt-4 ml-3">
												<div class="col-sm-12">
													<span class="folder-button"><i class="fas fa-folder"></i> Violations (<?php echo $GetDocumentsViolations->num_rows(); ?>)</span>
												</div>
												<div class="folder-documents col-sm-12 mt-4 ml-5">
												<?php if ($GetDocumentsViolations->num_rows() > 0) { ?>
													<?php foreach ($GetDocumentsViolations->result_array() as $row): ?>
															<div class="mb-3">
																<div class="folder-documents-icon"><i class="fas fa-file-pdf"></i></div>
																<div class="col-sm-12 ml-3">
																	<a class="ml-2" href="<?php echo $row['Doc_File'];?>" target="_blank">
																	<b><?php echo $row['Doc_FileName']; ?></b></a>
																</div>
																<div class="folder-documents-info col-sm-12 ml-4">
																	Created by <?php echo $row['DateAdded']; ?> (0MB)
																</div>
															</div>
													<?php endforeach ?>
												<?php } else { ?>
													No documents available.
												<?php } ?>
												</div>
											</div>
										</div>
									</div>
									<div id="TabAcademic">
										<div class="employee-tabs-group-content" id="TabAcademic">
											<div class="row rcontent PrintOut">
												<div class="col-sm-12">
													<div class="table-responsive">
														<table class="table table-condensed">
															<thead class="employee-table-header">
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
										</div>
									</div>
									<div id="TabEmployments">
										<div class="employee-tabs-group-content" id="TabEmployments">
											<div class="row rcontent PrintOut">
												<div class="col-sm-12">
													<div class="table-responsive">
														<table class="table table-condensed">
															<thead class="employee-table-header">
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
										</div>
									</div>
									<div id="TabMachine">
										<div class="employee-tabs-group-content" id="TabMachine">
											<div class="row rcontent">
												<div class="col-sm-12">
													<div class="table-responsive">
														<table class="table table-condensed">
															<thead class="employee-table-header">
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
							</div>
						</div>
					</div>
					<!-- MOBILE VIEW -->
					<div class="d-block d-sm-none">
						<?php $this->load->view('users/u_viewemployee_mobile'); ?>
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
			$('.employee-tabs-group-content').hide();
			$('#TabPersonal').children('.employee-tabs-group-content').show();
			$('.folder-button').on('click', function () {
				$(this).children('i').toggleClass('fa-folder');
				$(this).children('i').toggleClass('fa-folder-open');
				$(this).closest('.row').find('.folder-documents').toggleClass('folder-active');
			});
			$('.employee-tabs-select').on('click', function () {
				$('.employee-tabs-select').removeClass('employee-tabs-active');
				$(this).addClass('employee-tabs-active');
				$('.employee-tabs-group-content').hide();
			});
			$('#TabDocumentsBtnAlt').on('click', function () {
				$('.employee-tabs-select').removeClass('employee-tabs-active');
				$('#TabDocumentsBtn').addClass('employee-tabs-active');
				$('.employee-tabs-group-content').hide();
			});
			$('#TabPersonalBtn').on('click', function () {
				$('#TabPersonal').children('.employee-tabs-group-content').fadeIn(100);
			});
			$('#TabContractBtn').on('click', function () {
				$('#TabContract').children('.employee-tabs-group-content').fadeIn(100);
			});
			$('#TabDocumentsBtn, #TabDocumentsBtnAlt').on('click', function () {
				$('#TabDocuments').children('.employee-tabs-group-content').fadeIn(100);
			});
			$('#TabAcademicBtn').on('click', function () {
				$('#TabAcademic').children('.employee-tabs-group-content').fadeIn(100);
			});
			$('#TabEmploymentsBtn').on('click', function () {
				$('#TabEmployments').children('.employee-tabs-group-content').fadeIn(100);
			});
			$('#TabMachineBtn').on('click', function () {
				$('#TabMachine').children('.employee-tabs-group-content').fadeIn(100);
			});
			$('#TabNotesBtn').on('click', function () {
				$('#TabNotes').children('.employee-tabs-group-content').fadeIn(100);
			});
			$('#sidebar').toggleClass('active');
			$('.ncontent').toggleClass('shContent');
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
			$("#TabContractBtn").click(function(){
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
			border-radius: 6px;
			background-color: rgba(255, 50, 50, 0.25);
		}
	</style>
	<textarea id="text" style="display: none;"></textarea>
	</html>