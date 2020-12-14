<?php
$T_Header;
require 'vendor/autoload.php';
use Carbon\Carbon;

$currentDate = new DateTime();
if ($Status == 'Employed' || $Status == 'Employed (Permanent)') {
	if ($SalaryExpected == NULL) {
		$SalaryExpected = 0;
	}

	// Contract elapsed
	$cStarts = new DateTime($DateStarted);
	$cEnds = new DateTime($DateEnds);

	$cElapsed = $cStarts->diff($currentDate)->format('%a');
	$cElapsedText = $cStarts->diff($currentDate)->format('%m months, %d days');

	// 13th Month Pay Calculation
	$cDiff = $cEnds->diff($cStarts);
	if ($cDiff->m > 1) {
		$cTotalMonths = ($cDiff->y * 12) + ($cDiff->m) + ($cDiff->d / 30);
	} else {
		$cTotalMonths = (($cDiff->y) * 12) + ($cDiff->m);
	}
	$cDiffDays = $cEnds->diff($cStarts)->format('%a');
	if ($cDiff->m > 0) {
		$isThirteenEligible = true;
	} else {
		$isThirteenEligible = false;
	}
	if ($Status == 'Employed') {
		if ($cTotalMonths > 0) {
			// Monthly salary
			$salaryInterval = $SalaryExpected / $cTotalMonths;
		} else {
			// Calculate to as daily salary instead of monthly salary
			$salaryInterval = $SalaryExpected / $cDiff->d;
		}
	} else {
		// Permanent salary
		$salaryInterval = $SalaryExpected / 12;
	}
	$thirteen = (($salaryInterval * $cElapsed) / 30) / 12;

	//Contract Dates
	$dsdate = new DateTime($DateStarted);
	$dsday = $dsdate->format('Y-m-d');
	$dsday = DateTime::createFromFormat('Y-m-d', $dsday)->format('F d, Y');
	$dshours = $dsdate->format('h:i:s A');
	$dselapsed = Carbon::parse($DateStarted);

	$ds = new DateTime($DateStarted);
	$dsText = $ds->format('Y-m-d');
	$dsH = $ds->format('H');
	$dsi = $ds->format('i');
	$dss = $ds->format('s');
	$dsType = $ds->format('A');

	if ($dsH > 12) {
		$dsH = $dsH - 12;
		if ($dsH < 10) {
			$dsH = '0' . $dsH;
		}
	}

	if ($Status == 'Employed') {
		$dedate = new DateTime($DateEnds);
		$deday = $dedate->format('Y-m-d');
		$deday = DateTime::createFromFormat('Y-m-d', $deday)->format('F d, Y');
		$dehours = $dedate->format('h:i:s A');
		$deelapsed = Carbon::parse($DateEnds);

		$de = new DateTime($DateEnds);
		$deText = $de->format('Y-m-d');
		$deH = $de->format('H');
		$dei = $de->format('i');
		$des = $de->format('s');
		$deType = $de->format('A');

		if ($deH > 12) {
			$deH = $deH - 12;
			if ($deH < 10) {
				$deH = '0' . $deH;
			}
		}
	}
	$currentYear = $currentDate->format('Y');
	$currentMonth = $currentDate->format('m');
	$currentMonthReadable = DateTime::createFromFormat('!m', $currentMonth);
	$currentMonthReadable = $currentMonthReadable->format('F');

	// Identifier
	foreach($GetEmployeeMatchingClient->result_array() as $row) {
		$ClientID = $row['ClientEmployed'];
	};
	if (!empty($_GET['client'])) {
		$GetClient = $_GET['client'];
	} else {
		$GetClient = $ClientID;
	}
	$GetWeeklyListEmployeeWithSpecificApplicant = $this->Model_Selects->GetWeeklyListEmployeeWithSpecificApplicant($GetClient, $ApplicantID);
	if (!empty($_GET['mode'])) {
		$Mode = $_GET['mode'];
	} else {
		$Mode = 0;
	}
	if (!empty($_GET['year'])) {
		$Year = $_GET['year'];
	} else {
		$Year = $currentYear;
	}
	if (!empty($_GET['month'])) {
		$Month = $_GET['month'];
	} else {
		$Month = $currentMonth;
	}

	$selectedMonthReadable = DateTime::createFromFormat('!m', $Month);
	$selectedMonthReadable = $selectedMonthReadable->format('F');

}
//Calculate Age
$pBirthdate = new DateTime($BirthDate);
$pAge = $currentDate->diff($pBirthdate)->format('%y');

?>
<body>
<style>
	.rounded-circle-profile-picture {
		border: 4px solid #ebebeb;
	}
</style>
	<div class="wrapper wercher-background-lowpoly">
		<?php $this->load->view('_template/users/u_sidebar'); ?>
		<div id="content" class="ncontent">
			<div class="container-fluid">
				<?php $this->load->view('_template/users/u_notifications'); ?>
				<div class="d-none d-sm-block">
					<div class="row">
							<div class="row employee-container">
								<div class="col-10 employee-tabs">
									<ul>
										<li id="TabPersonalBtn" class="employee-tabs-select employee-tabs-active"><a href="#Personal" onclick="">Personal</a></li>
										<li id="TabContractBtn" class="employee-tabs-select"><a href="#Contract" onclick="">Contract</a></li>
										<?php if($Status == 'Employed' || $Status == 'Employed (Permanent)' || $Status == 'Blacklisted' || $Status == 'Expired'): ?>
											<li id="TabDocumentsBtn" class="employee-tabs-select"><a href="#Documents" onclick="">Documents</a></li>
										<?php endif; ?>
										<li id="TabAcademicBtn" class="employee-tabs-select<?php if ($GetAcadHistory->num_rows() <= 0) { echo ' employee-tabs-inactive'; }?>"><a href="#Academic" onclick="">Academic</a></li>
										<li id="TabEmploymentsBtn" class="employee-tabs-select<?php if ($employment_record->num_rows() <= 0) { echo ' employee-tabs-inactive'; }?>"><a href="#Employments" onclick="">Employments</a></li>
										<li id="TabMachineBtn" class="employee-tabs-select<?php if ($Machine_Operatessss->num_rows() <= 0) { echo ' employee-tabs-inactive'; }?>"><a href="#Machine" onclick="">Machine</a></li>
										<li><a href="<?=base_url()?>PrintEmployee?id=<?=$ApplicantID?>" type="button" data-toggle="tooltip" data-placement="top" data-html="true" title="Print Employee" style="color: gold;"><i class="fas fa-print" style="margin-right: -1px;"></i> </a></li>
										<?php if((in_array('ApplicantsEditing', $this->session->userdata('Permissions')) && ($Status == 'Applicant' || $Status == 'Expired' || $Status == 'Blacklisted' || $Status == 'Deleted')) || (in_array('EmployeesEditing', $this->session->userdata('Permissions')) && ($Status == 'Employed' || $Status == 'Employed (Permanent)'))): ?>
										<li id="TabEditBtn"><a href="<?=base_url()?>ModifyEmployee?id=<?=$ApplicantID?>" onclick="" target="_blank" type="button" data-toggle="tooltip" data-placement="top" data-html="true" title="Edit" style="color: gold;"><i class="fas fa-edit" style="margin-right: -1px;"></i></a></li>
										<?php endif; ?>
									</ul>
								</div>
								<div class="col-2 mb-5 employee-image">
									<img class="rounded-circle rounded-circle-profile-picture" src="<?php echo $ApplicantImage; ?>">
								</div>
							</div>
							<div class="row w-100 rcontent employee-content">
								<div class="col-2 employee-static mt-5 d-none d-sm-block">
									<?php
									// Name Handler
									$fullName = '';
									$fullNameHover = '';
									$isFullNameHoverable = false;
									if ($LastName) {
										$fullName = $fullName . $LastName . ', ';
										$fullNameHover = $fullNameHover . $LastName . ', ';
									} else {
										$fullNameHover = $fullNameHover . '[<i>No Last Name</i>], ';
										$isFullNameHoverable = true;
									}
									if ($FirstName) {
										$fullName = $fullName . $FirstName . ' ';
										$fullNameHover = $fullNameHover . $FirstName . ' ';
									} else {
										$fullNameHover = $fullNameHover . '[<i>No First Name</i>] ';
										$isFullNameHoverable = true;
									}
									if ($MiddleName) {
										$fullName = $fullName . $MiddleName[0] . '.';
										$fullNameHover = $fullNameHover . $MiddleName[0] . '.';
									} else {
										$fullNameHover = $fullNameHover . '[<i>No MI</i>].';
										$isFullNameHoverable = true;
									}
									if ($NameExtension) {
										$fullName = $fullName . ', ' . $NameExtension;
										$fullNameHover = $fullNameHover . ', ' . $NameExtension;
									}
									if (strlen($fullName) > 90) {
										$fullName = substr($fullName, 0, 90);
										$fullName = $fullName . '...';
										$isFullNameHoverable = true;
									}

									?>
									<div class="col-sm-12"<?php if($isFullNameHoverable): ?> data-toggle="tooltip" data-placement="top" data-html="true" title="<?php echo $fullNameHover; ?>"<?php endif; ?>>
										<?php echo $fullName; ?>
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
										<?php if($Status == 'Employed' || $Status == 'Employed (Permanent)'): ?>
											<?php if($EmployeeID != NULL): ?>
												<i class="fas fa-user-tie"></i> <?php echo $EmployeeID; ?>
											<?php else: ?>
												<i class="fas fa-user-tie"></i> <a href="<?php echo base_url() ?>ModifyEmployee?id=<?php echo $ApplicantID; ?>">Employee ID not assigned</a>
											<?php endif; ?>
										<?php else: ?>
											<i class="fas fa-user"></i> <?php echo $ApplicantID; ?>
										<?php endif; ?>
									</div>
									<div class="col-sm-12 mt-2">
										<?php if ($Status == 'Employed') { ?>
											<i class="fas fa-square PrintExclude" style="color: #1BDB07;"></i> Employed
										<?php } elseif ($Status == 'Employed (Permanent)') { ?>
											<i class="fas fa-square PrintExclude" style="color: #1BDB07;"></i> Employed (Permanent)
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
									<hr>
									<div class="row ml-auto mr-auto pb-5 w-100">
										<div class="col-sm-12 col-mb-12 w-100 text-center blacklisted-notice">
											<div class="col-sm-12 pb-1 pt-4">
												<h5>
													<i class="fas fa-exclamation-circle"></i><b>&nbsp;Notice&nbsp;</b>
												</h5>
											</div>
											<div class="col-sm-12 pb-2">
												This individual is <b>Blacklisted</b>
											</div>
											<div class="col-sm-12 col-mb-12 pb-2">
												<a href="#Violations" class="btn btn-danger"><i class="fas fa-book"></i> Violations</a>
											</div>
											<?php if(in_array('ApplicantsEditing', $this->session->userdata('Permissions'))): ?>
											<div class="col-sm-12 col-mb-12 pb-2" style="min-width: 125px;">
												<a href="<?=base_url()?>RestoreEmployee?id=<?php echo $ApplicantID; ?>" class="btn btn-success"><i class="fas fa-redo"></i> Restore</a>
											</div>
											<?php endif; ?>
										</div>
									</div>
									<?php elseif ($Status == 'Deleted'): ?>
									<hr>
									<div class="row ml-auto mr-auto pb-5 w-100">
										<div class="col-sm-12 col-mb-12 w-100 text-center archived-notice">
											<div class="col-sm-12 pb-1 pt-4">
												<h5>
													<i class="fas fa-exclamation-circle"></i><b>&nbsp;Notice&nbsp;</b>
												</h5>
											</div>
											<div class="col-sm-12 pb-2">
												This individual is <b>Archived</b>
											</div>
											<?php if(in_array('ApplicantsEditing', $this->session->userdata('Permissions'))): ?>
											<div class="col-sm-12 col-mb-12 pb-2" style="min-width: 125px;">
												<a href="<?=base_url()?>RestoreEmployee?id=<?php echo $ApplicantID; ?>" class="btn btn-success"><i class="fas fa-redo"></i> Restore</a>
											</div>
											<?php endif; ?>
										</div>
									</div>
									<?php endif; ?>
								</div>
								<div class="col-10">
									<div id="TabPersonal">
										<div class="employee-tabs-group-content">
											<div class="employee-content-header">
												<div class="ml-1 row">
													<?php if ($Status == 'Employed' || $Status == 'Employed (Permanent)'): ?> 
														<?php if ($ReminderDate == NULL): ?> 
															<button id="<?php echo $ApplicantID; ?>" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#ReminderModal"><i class="fas fa-exclamation"></i> No reminder set</button>
														<?php else: ?>
															<button id="<?php echo $ApplicantID; ?>" class="btn btn-success btn-sm" data-toggle="modal" data-target="#ReminderModal"><i class="fas fa-check"></i> You will be notified <?php echo $ReminderDateString; ?> before expiring</button>
														<?php endif; ?>
														<div class="ml-auto">
															<a href="GenerateIDCard?id=<?php echo $ApplicantID; ?>" class="btn btn-primary btn-sm" target="_blank"><i class="fas fa-id-card"></i> Generate ID Card</a>
														</div>
													<?php endif; ?>
												</div>
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
												<div class="age-container col-sm-2 employee-dynamic-item">
													<?php echo $pAge; ?>
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
												<div class="col-sm-2 employee-dynamic-header">
													<b>Referral</b>
												</div>
											</div>
											<div class="row">
												<div class="col-sm-2 employee-dynamic-item">
													<?php echo $BirthPlace; ?>
												</div>
												<div class="col-sm-2 employee-dynamic-item">
													<?php 
														$date = new DateTime($BirthDate);
														$day = $date->format('Y-m-d');
														$day = DateTime::createFromFormat('Y-m-d', $day)->format('F d, Y');

														echo $day;
													?>
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
												<div class="col-sm-2 employee-dynamic-item">
													<?php echo $Referral; ?>
												</div>
											</div>
											<hr class="mt-5 mb-3">
											<div class="row">
												<div class="col-sm-3 employee-dynamic-header">
													<b>S.S.S. No.</b>
												</div>
												<div class="col-sm-3 employee-dynamic-item">
													<?php echo $SSS_No; ?>
												</div>
												<div class="col-sm-3 employee-dynamic-header">
													<b>HDMF</b>
												</div>
												<div class="col-sm-3 employee-dynamic-item">
													<?php echo $HDMF; ?>
												</div>
											</div>
											<div class="row mt-4">
												<div class="col-sm-3 employee-dynamic-header">
													<b>Residence Certificate No.</b>
												</div>
												<div class="col-sm-3 employee-dynamic-item">
													<?php echo $ResidenceCertificateNo; ?>
												</div>
												<div class="col-sm-3 employee-dynamic-header">
													<b>PHILHEALTH</b>
												</div>
												<div class="col-sm-3 employee-dynamic-item">
													<?php echo $PhilHealth; ?>
												</div>
											</div>
											<div class="row mt-4">
												<div class="col-sm-3 employee-dynamic-header">
													<b>Tax Identification No.</b>
												</div>
												<div class="col-sm-3 employee-dynamic-item">
													<?php echo $TIN; ?>
												</div>
												<div class="col-sm-3 employee-dynamic-header">
													<b>ATM No.</b>
												</div>
												<div class="col-sm-3 employee-dynamic-item">
													<?php echo $ATM_No; ?>
												</div>
											</div>
											<hr>
											<div class="row mt-3">
												<div class="col-sm-6 employee-dynamic-header">
													<b>Person to notify in case of emergency</b>
												</div>
												<div class="col-sm-4 employee-dynamic-header">
													<b>Emergency Contact Number</b>
												</div>
											</div>
											<div class="row">
												<div class="col-sm-6 employee-dynamic-item">
													<?php echo $EmergencyPerson; ?>
												</div>
												<div class="col-sm-4 employee-dynamic-item">
													<?php echo $EmergencyContact; ?>
												</div>
											</div>
										</div>
									</div>
									<div id="TabContract">
										<div class="employee-tabs-group-content">
											<?php if ($Status == 'Employed'): ?>
											<div class="employee-content-header">
												<div class="ml-1 row">
													<?php if(in_array('EmployeesEditing', $this->session->userdata('Permissions'))): ?>
													<button id="<?php echo $ApplicantID; ?>" data-dismiss="modal" type="button" class="btn btn-primary btn-sm ExtendButton mr-1" data-toggle="modal" data-target="#ModifyContractModal"><i class="fas fa-edit"></i> Modify Contract</button>
													<?php endif; ?>
													<?php if(in_array('EmployeesEditing', $this->session->userdata('Permissions'))): ?>
													<button id="<?php echo $ApplicantID; ?>" data-dismiss="modal" type="button" class="btn btn-info btn-sm ExtendButton mr-1" data-toggle="modal" data-target="#ExtendContractModal"><i class="fas fa-plus"></i> Extend Contract</button>
													<?php endif; ?>
													<button class="btn btn-info btn-sm" data-toggle="modal" data-target="#EmpContractHistory"><i class="fas fa-book"></i> Contract History</button>
													<?php if(in_array('EmployeesEditing', $this->session->userdata('Permissions'))): ?>
													<div class="ml-auto">
														<button id="<?php echo $ApplicantID; ?>" class="btn btn-danger btn-sm SuspendButton" data-toggle="modal" data-target="#SuspendModal" type="button"><i class="fas fa-exclamation-triangle"></i> Suspend</button>
													</div>
													<?php endif; ?>
												</div>
											</div>
											<hr>
											<?php if($Suspended == 'Yes'): ?>
												<div class="employee-suspension-container">
													<div class="col-sm-12 col-md-12 mt-2 employee-dynamic-header text-center">
														<b>
															<span style="color: #dc3545"><i class="fas fa-exclamation-triangle"></i> Suspended For</span>
														</b>
													</div>
													<div class="col-sm-12 col-md-12 text-center">
														<p style="font-size: 18px; font-weight: bold;">
															<?php

																$scurrTime = time();
																$SuspendedString = "";
																$sstrDateEnds = strtotime($SuspensionEnds);
																$sstrDateStarted = strtotime($SuspensionStarted);
																// PERCENTAGE
																$SuspensionPercentage = (($sstrDateEnds - $scurrTime) * 100) / ($sstrDateEnds - $sstrDateStarted);
																$SuspensionPercentage = round($SuspensionPercentage);
																// DAYS REMAINING
																$sdateTimeZone = new DateTimeZone("Asia/Manila");
																$sdatetime1 = new DateTime('@' . $scurrTime, $sdateTimeZone);
																$sdatetime2 = new DateTime('@' . $sstrDateEnds, $sdateTimeZone);
																$sinterval = $sdatetime1->diff($sdatetime2);
																if($sinterval->format('%y years, %m months, %d days') == '0 years, 0 months, 0 days') {
																	if($sinterval->format('%H') == '1') {
																		$SuspendedString = $sinterval->format('%H hour');
																		if($sinterval->format('%I') != NULL || $sinterval->format('%S') != NULL) {
																			$SuspendedString = $SuspendedString . ', ';
																		}
																	} else {
																		$SuspendedString = $sinterval->format('%H hours');
																		if($sinterval->format('%I') != NULL || $sinterval->format('%S') != NULL) {
																			$SuspendedString = $SuspendedString . ', ';
																		}
																	}
																	if($sinterval->format('%I') == '1') {
																		$SuspendedString = $SuspendedString . $sinterval->format('%I minute');
																		if($sinterval->format('%S') != NULL) {
																			$SuspendedString = $SuspendedString . ', ';
																		}
																	} else {
																		$SuspendedString = $SuspendedString . $sinterval->format('%I minutes');
																		if($sinterval->format('%S') != NULL) {
																			$SuspendedString = $SuspendedString . ', ';
																		}
																	}
																	if($sinterval->format('%S') == '1') {
																		$SuspendedString = $SuspendedString . $sinterval->format('%S second');
																	} else {
																		$SuspendedString = $SuspendedString . $sinterval->format('%S seconds');
																	}
																	echo $SuspendedString;
																} else {
																	if($sinterval->format('%y') == '1') {
																		$SuspendedString = $sinterval->format('%y year');
																		if($sinterval->format('%m') != NULL || $sinterval->format('%d') != NULL) {
																			$SuspendedString = $SuspendedString . ', ';
																		}
																	} else {
																		$SuspendedString = $sinterval->format('%y years');
																		if($sinterval->format('%m') != NULL || $sinterval->format('%d') != NULL) {
																			$SuspendedString = $SuspendedString . ', ';
																		}
																	}
																	if($sinterval->format('%m') == '1') {
																		$SuspendedString = $SuspendedString . $sinterval->format('%m month');
																		if($sinterval->format('%d') != NULL) {
																			$SuspendedString = $SuspendedString . ', ';
																		}
																	} else {
																		$SuspendedString = $SuspendedString . $sinterval->format('%m months');
																		if($sinterval->format('%d') != NULL) {
																			$SuspendedString = $SuspendedString . ', ';
																		}
																	}
																	if($sinterval->format('%d') == '1') {
																		$SuspendedString = $SuspendedString . $sinterval->format('%d day');
																	} else {
																		$SuspendedString = $SuspendedString . $sinterval->format('%d days');
																	}
																	echo $SuspendedString;
																}
															?>
															<input type="hidden" id="SuspensionTimeLeft" value="<?php echo $SuspensionPercentage;?>">
														</p>
													</div>
													<!-- <div class="col-sm-12 col-md-12 PrintExclude">
														<div class="progressBar">
															<div class="progressBarTitle SuspensionRemainingTitle">Time Left</div>
															<div class="progress SuspensionRemaining"></div>
															<div class="SuspensionValue">45%</div>
														</div>
													</div> -->
													<div class="col-sm-12 col-md-12 text-center PrintExclude">
														<span style="color: #dc3545"><b>Remarks:</b></span>
													</div>
													<div class="col-sm-12 col-md-12 text-center mb-5 PrintExclude">
														<?php echo $SuspensionRemarks; ?>
													</div>
												</div>
											<?php endif; ?>
											<div class="col-sm-12 col-md-12 employee-dynamic-header text-center">
												<b>
													Days Remaining on Contract
												</b>
											</div>
											<div class="col-sm-12 col-md-12 text-center">
												<p>
													<?php

														$currTime = time();
														$TimeString = "";
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
															if($interval->format('%H') == '1') {
																$TimeString = $interval->format('%H hour');
																if($interval->format('%I') != NULL || $interval->format('%S') != NULL) {
																	$TimeString = $TimeString . ', ';
																}
															} else {
																$TimeString = $interval->format('%H hours');
																if($interval->format('%I') != NULL || $interval->format('%S') != NULL) {
																	$TimeString = $TimeString . ', ';
																}
															}
															if($interval->format('%I') == '1') {
																$TimeString = $TimeString . $interval->format('%I minute');
																if($interval->format('%S') != NULL) {
																	$TimeString = $TimeString . ', ';
																}
															} else {
																$TimeString = $TimeString . $interval->format('%I minutes');
																if($interval->format('%S') != NULL) {
																	$TimeString = $TimeString . ', ';
																}
															}
															if($interval->format('%S') == '1') {
																$TimeString = $TimeString . $interval->format('%S second');
															} else {
																$TimeString = $TimeString . $interval->format('%S seconds');
															}
															echo $TimeString;
														} else {
															if($interval->format('%y') == '1') {
																$TimeString = $interval->format('%y year');
																if($interval->format('%m') != NULL || $interval->format('%d') != NULL) {
																	$TimeString = $TimeString . ', ';
																}
															} else {
																$TimeString = $interval->format('%y years');
																if($interval->format('%m') != NULL || $interval->format('%d') != NULL) {
																	$TimeString = $TimeString . ', ';
																}
															}
															if($interval->format('%m') == '1') {
																$TimeString = $TimeString . $interval->format('%m month');
																if($interval->format('%d') != NULL) {
																	$TimeString = $TimeString . ', ';
																}
															} else {
																$TimeString = $TimeString . $interval->format('%m months');
																if($interval->format('%d') != NULL) {
																	$TimeString = $TimeString . ', ';
																}
															}
															if($interval->format('%d') == '1') {
																$TimeString = $TimeString . $interval->format('%d day');
															} else {
																$TimeString = $TimeString . $interval->format('%d days');
															}
															echo $TimeString;
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
											<div class="row">
												<div class="col-sm-3">
													<div class="card mb-3" style="max-width: 18rem; height: 300px;">
														<div class="card-header employee-dynamic-header text-center"><b><i class="fas fa-user-tag"></i> Client</b></div>
														<div class="card-body text-dark">
															<h5 class="card-title text-center wercher-card-title">
																<?php
																	foreach($GetEmployeeMatchingClient->result_array() as $row) {
																		echo $row['Name'];
																	};
																?>
															</h5>
															<p class="card-text">
																<div class="col-sm-12 employee-static-item text-center mt-3">
																	<div class="col-sm-12 employee-dynamic-header">
																		<b>Contact</b>
																	</div>
																	<div class="col-sm-12">
																		<?php
																			foreach($GetEmployeeMatchingClient->result_array() as $row) {
																				echo $row['ContactNumber'];
																			};
																		?>
																	</div>
																</div>
																<div class="col-sm-12 employee-static-item text-center">
																	<div class="col-sm-12 employee-dynamic-header">
																		<b>Address</b>
																	</div>
																	<div class="col-sm-12">
																		<?php
																			foreach($GetEmployeeMatchingClient->result_array() as $row) {
																				echo $row['Address'];
																			};
																		?>
																	</div>
																</div>
															</p>
														</div>
													</div>
												</div>
												<div class="col-sm-3">
													<div class="card mb-3" style="max-width: 18rem; height: 300px;">
														<div class="card-header employee-dynamic-header text-center"><b><i class="fas fa-user-tie"></i> Position</b></div>
														<div class="card-body text-dark">
															<h5 class="card-title text-center wercher-card-title"><?php echo $PositionDesired; ?></h5>
															<p class="card-text">
																<div class="col-sm-12 employee-static-item text-center mt-3">
																	<div class="col-sm-12 employee-dynamic-header">
																		<b>Contract Started</b>
																	</div>
																	<div class="col-sm-12" data-toggle="tooltip" data-placement="top" data-html="true" title="<?php echo $dselapsed->diffForHumans(); ?>">
																		<?php echo $dsday . '<br>' . $dshours; ?>
																	</div>
																</div>
																<div class="col-sm-12 employee-static-item text-center">
																	<div class="col-sm-12 employee-dynamic-header">
																		<b>Contract Ends</b>
																	</div>
																	<div class="col-sm-12" data-toggle="tooltip" data-placement="top" data-html="true" title="<?php echo $deelapsed->diffForHumans(); ?>">
																		<?php echo $deday . '<br>' . $dehours; ?>
																	</div>
																</div>
															</p>
														</div>
													</div>
												</div>
												<div class="col-sm-3">
													<div class="card mb-3" style="max-width: 18rem; height: 300px;">
														<div class="card-header employee-dynamic-header text-center"><b><i class="fas fa-dollar-sign"></i> Salary Expected</b></div>
														<div class="card-body text-dark">
															<h5 class="card-title text-center wercher-card-title"><span style="user-select: none;">₱ </span><?php echo $SalaryExpected; ?></h5>
															<p class="card-text">
																<div class="col-sm-12 employee-static-item text-center mt-3">
																	<div class="col-sm-12 employee-dynamic-header">
																		<b>Documents (<?php echo $GetDocuments->num_rows(); ?>)</b>
																	</div>
																	<div class="col-sm-12">
																		<a href="#Documents" class="btn-sm btn btn-primary"><i class="far fa-eye"></i> View</a>
																	</div>
																</div>
																<div class="col-sm-12 employee-static-item text-center">
																	<div class="col-sm-12 employee-dynamic-header">
																		<b>Violations (<?php echo $GetDocumentsViolations->num_rows(); ?>)</b>
																	</div>
																	<div class="col-sm-12">
																		<a href="#Violations" class="btn-sm btn btn-danger"><i class="far fa-eye"></i> View</a>
																	</div>
																</div>
															</p>
														</div>
													</div>
												</div>
												<div class="col-sm-3">
													<div class="card mb-3" style="max-width: 18rem; height: 300px;">
														<div class="card-header employee-dynamic-header text-center"><b><i class="fas fa-dollar-sign"></i> Additional Info</b></div>
														<div class="card-body text-dark">
															<p class="card-text">
																<div class="col-sm-12 employee-static-item text-center">
																	<div class="col-sm-12 employee-dynamic-header">
																		<b>13th Month Pay</b>
																	</div>
																	<div class="col-sm-12">
																		<?php
																			if ($isThirteenEligible) {
																				echo '<span style="user-select: none;">₱ </span>' . round($thirteen, 2);
																			} else {
																				echo '<span class="p-1" style="color: #735600;" data-toggle="tooltip" data-placement="top" data-html="true" title="Contract duration is lower than 1 day"><i class="fas fa-info-circle"></i> Not eligible</span>';
																			}
																		?>
																	</div>
																	<div class="col-sm-12 employee-dynamic-header mt-2">
																		<b><?php if ($cDiff->m > 0) { echo 'Monthly Salary'; } else { echo 'Daily Salary'; } ?></b>
																	</div>
																	<div class="col-sm-12">
																		<?php echo '<span style="user-select: none;">₱ </span>' . round($salaryInterval, 2); ?>
																	</div>
																	<div class="col-sm-12 employee-dynamic-header mt-2">
																		<b>Contract Elapsed</b>
																	</div>
																	<div class="col-sm-12">
																		<?php echo $cElapsedText; ?>
																	</div>
																</div>
															</p>
														</div>
													</div>
												</div>
												<div class="col-12 mb-2">
													<hr>
													<?php echo form_open(base_url() . 'ViewEmployee?id=' . $ApplicantID . '#Contract','method="GET" name="PayrollFilterForm"');?>
													<div class="form-row ml-2">
														<input type="hidden" name="id" value="<?php echo $ApplicantID; ?>">
														<!-- Client -->
														<div class="form-group col-sm-4 col-md-2">
															<select id="ClientSelect" class="payroll-select form-control" name="client">
																<?php
																$GetClients = $this->Model_Selects->GetClients($ClientID);
																if ($GetClients->num_rows() > 0) {
																	foreach($GetClients->result_array() as $row) { ?>
																		<option value="<?php echo $row['ClientID']; ?>" <?php if ($row['ClientID'] == $ClientID) { echo 'selected'; } ?>><?php echo $row['Name']; ?></option>
																	<?php }
																}
																?>
															</select>
														</div>
														<!-- Mode -->
														<div class="form-group col-sm-4 col-md-2">
															<select id="ModeSelect" class="payroll-select form-control" name="mode">
																<option value="0" <?php if ($Mode == 0) { echo 'selected'; } ?>>Weekly</option>
																<option value="1" <?php if ($Mode == 1) { echo 'selected'; } ?>>Semi-monthly</option>
																<option value="2" <?php if ($Mode == 2) { echo 'selected'; } ?>>Monthly</option>
															</select>
														</div>
														<!-- Years -->
														<div class="form-group col-sm-4 col-md-2">
															<select id="YearsSelect" class="payroll-select form-control" name="year">
																<?php
																$yearCountIteration = 100;
																$yearCountStart = $currentYear + ($yearCountIteration / 2);
																$yearCount = $yearCountStart;
																for($i = 0; $i <= $yearCountIteration; $i++):
																	$yearCount = $yearCountStart - $i; ?>
																	<option value="<?php echo $yearCount; ?>" <?php if ($yearCount == $Year) { echo 'selected'; } ?>><?php echo $yearCount; ?></option>
																<?php endfor; ?>
															</select>
														</div>
														<!-- Months -->
														<div class="form-group col-sm-6 col-md-2">
															<select id="MonthsSelect" class="payroll-select form-control" name="month">
																<?php for($i = 0; $i <= 12; $i++): 
																	$monthCount = DateTime::createFromFormat('!m', $i);
																	$monthCount = $monthCount->format('F'); ?>
																	<option value="<?php echo $i; ?>" <?php if ($i == $Month) { echo 'selected'; } ?>><?php echo $monthCount; ?></option>
																<?php endfor; ?>
															</select>
														</div>
														<!-- Filter -->
														<div class="form-group col-sm-6 col-md-2">
															<button type="submit" class="btn btn-primary"><i class="fas fa-search"></i> Find</button>
														</div>
													</div>
													<?php echo form_close();?>
												</div>
												<?php if (!empty($_GET['client']) || !empty($_GET['mode']) || !empty($_GET['year']) || !empty($_GET['month'])): ?>
												<div class="col-sm-12">
												<?php 
												if (!empty($_GET['year'])) {
													$FetchYear = $_GET['year'];
												} else {
													$FetchYear = new DateTime();
													$FetchYear = $FetchYear->format('Y');
												}

												$GetPayrollYear = $this->Model_Selects->GetPayrollYear($FetchYear, $Mode);
												if ($GetPayrollYear->num_rows() > 0): ?>
													<div class="payroll-year-container row">
														<?php
														if (!empty($_GET['month'])) {
															$FetchMonth = $_GET['month'];
														} else {
															$FetchMonth = new DateTime();
															$FetchMonth = $FetchMonth->format('m');
														}
														$GetPayrollMonth = $this->Model_Selects->GetPayrollMonth($FetchYear, $FetchMonth, $Mode);
														if ($GetPayrollMonth->num_rows() > 0): 
															$ReadableMonth   = DateTime::createFromFormat('!m', $FetchMonth);
															$ReadableMonth = $ReadableMonth->format('F');
															?>
															<div class="payroll-month-container col-sm-12">
																<?php if($Mode == 0): // Weekly ?>
																	<?php for($Week=1; $Week<=4; $Week++): ?>
																	<div class="payroll-week-container col-sm-12">
																		<div class="payroll-week col-sm-12">
																			<b>Week <?php echo $Week; ?></b>
																		</div>
																		<div class="payroll-data col-sm-12 col-mb-12">
																			<div class="table-responsive w-100">
																				<table id="WeeklyTable" class="table table-condensed">
																					<thead>
																						<th>Hours</th>
																						<th>Gross Pay</th>
																						<th>PhilHealth</th>
																						<th>HDMF</th>
																						<th>Tax</th>
																						<th>SSS</th>
																						<th style="width: 50px;"><i class="fas fa-arrow-right" style="margin-right: -1px; color: rgba(0, 0, 0, 0.55);"></i></th>
																						<th data-toggle="tooltip" data-placement="top" data-html="true" title="Amount left to be paid for this week's SSS contribution">To be paid <i style="color: gray">(?)</i></th>
																						<th data-toggle="tooltip" data-placement="top" data-html="true" title="Amount that is paid for this week's SSS contribution. Used to subtract next week's SSS contribution." style="width: 225px;">Paid this week <i style="color: gray">(?)</i></th>
																						<th>Loans</th>
																						<th>Net Pay</th>
																					</thead>
																					<tbody>
																						<?php foreach ($GetWeeklyListEmployeeWithSpecificApplicant->result_array() as $row):
																							$ApplicantID = $row['ApplicantID'];
																							$ApplicantName = $row['LastName'] . ', ' . $row['FirstName'] . ' ' . $row['MiddleName'] . '.';
																							if ($row['NameExtension'] != NULL) {
																								$ApplicantName = $ApplicantName . ', ' . $row['NameExtension'];
																							}
																							$GetPayrollWeekGrossPay = $this->Model_Selects->GetPayrollWeekGrossPay($ApplicantID, $FetchYear, $FetchMonth, $Week, $Mode);
																							if ($GetPayrollWeekGrossPay == NULL) {
																								$GetPayrollWeekGrossPay = 0;
																							}
																							$GetPayrollWeekHours = $this->Model_Selects->GetPayrollWeekHours($ApplicantID, $FetchYear, $FetchMonth, $Week, $Mode);
																							if ($GetPayrollWeekHours == NULL) {
																								$GetPayrollWeekHours = 0;
																							}
																							$GetPayrollWeekOTHours = $this->Model_Selects->GetPayrollWeekOTHours($ApplicantID, $FetchYear, $FetchMonth, $Week, $Mode);
																							if ($GetPayrollWeekOTHours == NULL) {
																								$GetPayrollWeekOTHours = 0;
																							}
																							$TotalHours = $GetPayrollWeekHours + $GetPayrollWeekOTHours;
																							$sssTable = $this->Model_Selects->GetAllSSSTable();
																							$hdmfTable = $this->Model_Selects->GetAllHDMFTable();
																							$philhealthTable = $this->Model_Selects->GetAllPhilHealthTable();
																							// SSS Table
																							foreach ($sssTable->result_array() as $srow) {
																								if ($GetPayrollWeekGrossPay >= $srow['f_range'] && $GetPayrollWeekGrossPay <= $srow['t_range']) {
																									$sss_contri = $srow['contribution_ee'];
																								}
																							}
																							// HDMF Table
																							foreach ($hdmfTable->result_array() as $hrow) {
																								if ($GetPayrollWeekGrossPay >= $hrow['f_range'] && $GetPayrollWeekGrossPay <= $hrow['t_range']) {
																									$hdmf_rate = $hrow['contribution_ee'];
																								}
																							}
																							// PhilHealth Table
																							$philhealthArray=$philhealthTable->result_array();
																							if ($GetPayrollWeekGrossPay >= $philhealthArray[0]['f_range'] && $GetPayrollWeekGrossPay <= $philhealthArray[0]['t_range'])
																							{
																								$philhealth_percentage=300;
																							}
																							else if($GetPayrollWeekGrossPay >= $philhealthArray[1]['f_range'] && $GetPayrollWeekGrossPay <= $philhealthArray[1]['t_range'])
																							{
																								$philhealth_percentage=($GetPayrollWeekGrossPay * 0.03);

																							}
																							else
																							{
																								$philhealth_percentage=1800;
																							}

																							if($Mode==0)//weekly
																							{
																								$cutoffTaxDivider=4;
																							}
																							else if($Mode==1)//semi monthly
																							{
																								$cutoffTaxDivider=2;
																							}
																							else if($Mode==2) //monthly
																							{
																								$cutoffTaxDivider=1;
																							}

																							$sss_contriCalc = $sss_contri/$cutoffTaxDivider;
																							$hdmf_contri = $GetPayrollWeekGrossPay*$hdmf_rate;
																							$hdmf_contriCalc = $hdmf_contri/$cutoffTaxDivider;
																							$hdmf_contriText = $hdmf_contri * 100;
																							$philhealth_contri=$philhealth_percentage/$cutoffTaxDivider;

																							// Tax
																							$tStarts = new DateTime($row['DateStarted']);
																							$tEnds = new DateTime($row['DateEnds']);

																							// Calculating monthly salary to annual salary
																							$tDiff = $tEnds->diff($tStarts);
																							if ($tDiff->m > 1) {
																								$tTotalMonths = $tDiff->y * 12 + $tDiff->m + $tDiff->d / 30;
																							} else {
																								$tTotalMonths = $tDiff->d;
																							}
																							if ($row['SalaryExpected'] != NULL && $tTotalMonths > 0) {
																								$salaryMonthly = $row['SalaryExpected'] / $tTotalMonths;
																							} else {
																								$salaryMonthly = 0;
																							}
																							$annualSalary = $salaryMonthly * 12;
																							$year=date("Y");
																							if($year<=2022)
																							{
																								if($annualSalary<=250000) //Not over P250,000 -- 0%
																								{
																									$tax=0; 
																								}
																								else if($annualSalary>=250000.01 && $annualSalary <= 400000) 	//Over P250,000 but not over P400,000 -- 20% of the excess over P250,000
																								{
																									$tax=((($annualSalary-250000)*0.2)/12)/$cutoffTaxDivider;
																								} 
																								else if($annualSalary>=400000.01 && $annualSalary <= 800000) 	//Over P400,000 but not over P800,000 -- P30,000 + 25% of the excess over P400,000
																								{
																									$tax=((30000+(($annualSalary-400000)*0.25))/12)/$cutoffTaxDivider; 		 	//divided into 12 for monthly, then divided by 4 for weekly, 2 for semi monthly, 1 for monthly
																								}
																								else if($annualSalary>=800000.01 && $annualSalary <= 2000000) 	//Over P800,000 but not over P2,000,000 -- P130,000 + 30% of the excess over P800,000
																								{
																									$tax=((130000+(($annualSalary-800000)*0.3))/12)/$cutoffTaxDivider; 		  	//divided into 12 for monthly, then divided by 4 for weekly, 2 for semi monthly, 1 for monthly
																								}
																								else if($annualSalary>=2000000.01 && $annualSalary <= 8000000) 	//Over P2,000,000 but not over P8,000,000 -- P490,000 + 32% of the excess over P2,000,000
																								{
																									$tax=((490000+(($annualSalary-2000000)*0.32))/12)/$cutoffTaxDivider; 		//divided into 12 for monthly, then divided by 4 for weekly, 2 for semi monthly, 1 for monthly
																								}
																								else 															//Over P8,000,000 -- P2,410,000 + 35% of the excess over P8,000,000
																								{
																									$tax=((2410000+(($annualSalary-8000000)*0.35))/12)/$cutoffTaxDivider; 		//divided into 12 for monthly, then divided by 4 for weekly, 2 for semi monthly, 1 for monthly
																								}

																							}
																							else
																							{
																								if($annualSalary<=250000) //Not over P250,000 -- 0%
																								{
																									$tax=0; 
																								}
																								else if($annualSalary>=250000.01 && $annualSalary <= 400000) 	//Over P250,000 but not over P400,000 -- 15% of the excess over P250,000
																								{
																									$tax=((($annualSalary-250000)*0.15)/12)/$cutoffTaxDivider;
																								} 
																								else if($annualSalary>=400000.01 && $annualSalary <= 800000) 	//Over P400,000 but not over P800,000 -- P22,500 + 20% of the excess over P400,000
																								{
																									$tax=((22500+(($annualSalary-400000)*0.20))/12)/$cutoffTaxDivider; 		 	//divided into 12 for monthly, then divided by 4 for weekly, 2 for semi monthly, 1 for monthly
																								}
																								else if($annualSalary>=800000.01 && $annualSalary <= 2000000) 	//Over P800,000 but not over P2,000,000 -- P102,500 + 25% of the excess over P800,000
																								{
																									$tax=((102500+(($annualSalary-800000)*0.25))/12)/$cutoffTaxDivider; 		  	//divided into 12 for monthly, then divided by 4 for weekly, 2 for semi monthly, 1 for monthly
																								}
																								else if($annualSalary>=2000000.01 && $annualSalary <= 8000000) 	//Over P2,000,000 but not over P8,000,000 -- P402,500 + 30% of the excess over P2,000,000
																								{
																									$tax=((402500+(($annualSalary-2000000)*0.30))/12)/$cutoffTaxDivider; 		//divided into 12 for monthly, tthen divided by 4 for weekly, 2 for semi monthly, 1 for monthly
																								}
																								else 															//Over P8,000,000 -- P2,202,500 + 35% of the excess over P8,000,000
																								{
																									$tax=((202500+(($annualSalary-8000000)*0.35))/12)/$cutoffTaxDivider; 		//divided into 12 for monthly, then divided by 4 for weekly, 2 for semi monthly, 1 for monthly
																								}
																							}

																							$SSSToBePaid = $this->Model_Selects->GetSSSToBePaid($ApplicantID, $ClientID, $FetchYear, $FetchMonth, $Mode);
																							if ($SSSToBePaid->num_rows() > 0) {
																								$stbprow = $SSSToBePaid->result_array()[0];
																								switch($Week) {
																									case 1:
																										$WeekAmount = $sss_contriCalc;
																										$WeekPaid = $stbprow['Week1Paid'];
																										$toBePaid = $WeekAmount;
																										break;
																									case 2:
																										$WeekAmountPrevious = $stbprow['Week1Amount'];
																										$WeekAmount = $stbprow['Week2Amount'];
																										$WeekPaidPrevious = $stbprow['Week1Paid'];
																										$WeekPaid = $stbprow['Week2Paid'];

																										$toBePaid = ($WeekAmount + $WeekAmountPrevious) - $WeekPaidPrevious;
																										break;
																									case 3:
																										$WeekAmountPreviousPrevious = $stbprow['Week1Amount'];
																										$WeekAmountPrevious = $stbprow['Week2Amount'];
																										$WeekAmount = $stbprow['Week3Amount'];

																										$WeekPaidPreviousPrevious = $stbprow['Week1Paid'];
																										$WeekPaidPrevious = $stbprow['Week2Paid'];
																										$WeekPaid = $stbprow['Week3Paid'];

																										$toBePaid = ($WeekAmount + $WeekAmountPrevious + $WeekAmountPreviousPrevious) - ($WeekPaidPrevious + $WeekPaidPreviousPrevious);
																										break;
																									case 4:
																										$WeekAmountPreviousPreviousPrevious = $stbprow['Week1Amount'];
																										$WeekAmountPreviousPrevious = $stbprow['Week2Amount'];
																										$WeekAmountPrevious = $stbprow['Week3Amount'];
																										$WeekAmount = $stbprow['Week4Amount'];

																										$WeekPaidPreviousPreviousPrevious = $stbprow['Week1Paid'];
																										$WeekPaidPreviousPrevious = $stbprow['Week2Paid'];
																										$WeekPaidPrevious = $stbprow['Week3Paid'];
																										$WeekPaid = $stbprow['Week4Paid'];

																										$toBePaid = ($WeekAmount + $WeekAmountPrevious + $WeekAmountPreviousPrevious + $WeekAmountPreviousPreviousPrevious) - ($WeekPaidPrevious + $WeekPaidPreviousPrevious + $WeekPaidPreviousPreviousPrevious);
																										break;
																									default:
																										$WeekAmount = $sss_contriCalc;
																										$WeekPaid = $stbprow['Week1Paid'];
																										$toBePaid = $WeekAmount;
																										break;
																								}
																							} else {
																								$WeekPaid = 0;
																								$toBePaid = $sss_contriCalc;
																								$now = new DateTime();
																								$DateAdded = $now->format('Y-m-d H:i:s');
																								$data = array(
																									'Amount' => $sss_contriCalc,
																									'ApplicantID' => $ApplicantID,
																									'ClientID' => $ClientID,
																									'Month' => $FetchMonth,
																									'Year' => $FetchYear,
																									'Week' => $Week,
																									'Mode' => $Mode,
																									'DateAdded' => $DateAdded,
																								);
																								$AddSSSToBePaidAmount = $this->Model_Updates->AddSSSToBePaidAmount($data);
																							}
																							$data = array(
																								'Amount' => $sss_contriCalc,
																								'ApplicantID' => $ApplicantID,
																								'ClientID' => $ClientID,
																								'Month' => $FetchMonth,
																								'Year' => $FetchYear,
																								'Week' => $Week,
																								'Mode' => $Mode
																							);
																							$UpdateSSSToBePaidAmount = $this->Model_Updates->UpdateSSSToBePaidAmount($data);

																							$ShowPayrollLoans = $this->Model_Selects->ShowPayrollLoans($ApplicantID, $FetchYear, $FetchMonth, $Week, $Mode);
																							$loansTotal = 0;
																							if ($ShowPayrollLoans->num_rows() > 0) {
																								foreach($ShowPayrollLoans->result_array() as $lrow) {
																									$loansTotal = $loansTotal + $lrow['Amount'];
																								}
																							}

																							$totalDeduction = $hdmf_contriCalc + $philhealth_contri + $tax + $loansTotal + $toBePaid;
																							$net_pay = $GetPayrollWeekGrossPay - $totalDeduction;
																							if ($net_pay < 0) {
																								$net_pay = 0;
																							}

																							?>
																							<tr class="payroll-week-row">
																								<td class="payroll-hours" data-toggle="tooltip" data-placement="top" data-html="true" title="Regular Hours: <?php echo round($GetPayrollWeekHours, 2) . '<br>Overtime Hours: ' . round($GetPayrollWeekOTHours, 2); ?>"><?php echo $TotalHours; ?></td>
																								<td class="payroll-grosspay"><?php echo round($GetPayrollWeekGrossPay, 2); ?></td>
																								<td class="payroll-philhealth" data-toggle="tooltip" data-placement="top" data-html="true" title="<?php echo round($philhealth_percentage, 2) . ' / ' . $cutoffTaxDivider . '<br><i>PhilHealth Percentage x Mode</i>'; ?>"><?php echo round($philhealth_contri, 2); ?></td>
																								<td class="payroll-hdmf" data-toggle="tooltip" data-placement="top" data-html="true" title="(<?php echo round($GetPayrollWeekGrossPay, 2) . ' x ' . $hdmf_rate . ') / ' . $cutoffTaxDivider . '<br><i>(Gross Pay x HDMF Rate) / Mode</i>'; ?>"><?php echo round($hdmf_contriCalc, 2); ?></td>

																								<td class="payroll-tax" data-toggle="tooltip" data-placement="top" data-html="true" title="<?php echo 'Annual Salary: ' . round($annualSalary, 2) . '<br>Monthly Salary: ' . round($salaryMonthly, 2); ?>"><?php echo $tax; ?></td>
																								<td class="payroll-sss" data-toggle="tooltip" data-placement="top" data-html="true" title="<?php echo $sss_contri . ' / ' . $cutoffTaxDivider; ?><br><i>SSS Contribution / Mode</i>"><?php echo $sss_contriCalc; ?></td>
																								<td><i class="fas fa-arrow-right" style="margin-right: -1px; color: rgba(0, 0, 0, 0.55);"></i></td>
																								<td class="payroll-tobepaid"><?php echo $toBePaid; ?></td>
																								<td>
																									<div class="row">
																										<div class="col-sm-12 col-md-8">
																											<input type="number" class="payroll-paidthisweek payroll-weekrow-input form-control" value="<?php echo $WeekPaid; ?>">
																										</div>
																										<div class="col-sm-12 col-md-4">
																											<button class="payroll-weekrow-btn btn btn-success btn-sm w-100" data-payroll-weekrow-applicantid="<?php echo $ApplicantID; ?>" data-payroll-weekrow-clientid="<?php echo $ClientID; ?>" data-payroll-weekrow-year="<?php echo $FetchYear; ?>" data-payroll-weekrow-month="<?php echo $FetchMonth; ?>" data-payroll-weekrow-week="<?php echo $Week; ?>" style="margin-left: -25px; padding-top: 5px; padding-bottom: 5px; margin-top: 1px; display: none;"><i class="fas fa-check" style="margin-right: -1px;"></i></button>
																										</div>
																									</div>
																								</td>
																								<td><button type="button" class="loans-btn btn btn-info btn-sm SetPrimaryClientIDButton" data-toggle="modal" data-target="#ModalLoans" data-applicantid="<?php echo $ApplicantID; ?>" data-applicantname="<?php echo $ApplicantName; ?>" data-year="<?php echo $FetchYear; ?>" data-month="<?php echo $FetchMonth; ?>" data-week="<?php echo $Week; ?>" data-loanstotal="<?php echo $loansTotal; ?>"><i class="fas fa-piggy-bank"></i> Loans</button></td>
																								<td class="payroll-net-pay" data-toggle="tooltip" data-placement="top" data-html="true" title="<?php echo round($GetPayrollWeekGrossPay, 2) . ' - (' . $hdmf_contriCalc . ' + ' . $philhealth_contri . ' + ' . $tax . ' + ' . $toBePaid . ')<br><i>Gross Pay - (HDMF Contribution + PhilHealth Contribution + Tax + SSS left to be paid)</i>'; ?>"><?php echo round($net_pay, 2); ?></td>
																							</tr>
																						<?php endforeach; ?>
																					</tbody>
																				</table>
																			</div>
																		</div>
																	</div>
																<?php endfor; ?>
															<?php elseif($Mode == 1): // Semi-monthly ?>
																	<?php for($Week=1; $Week<=2; $Week++): ?>
																	<div class="payroll-week-container col-sm-12">
																		<div class="payroll-week col-sm-12">
																			<b>Week <?php echo $Week; ?></b>
																		</div>
																		<div class="payroll-data col-sm-12 col-mb-12">
																			<div class="table-responsive w-100">
																				<table id="WeeklyTable" class="table table-condensed">
																					<thead>
																						<th>Applicant ID</th>
																						<th>Hours</th>
																						<th>Gross Pay</th>
																						<th>PhilHealth</th>
																						<th>HDMF</th>
																						<th>Tax</th>
																						<th>SSS</th>
																						<th style="width: 50px;"><i class="fas fa-arrow-right" style="margin-right: -1px; color: rgba(0, 0, 0, 0.55);"></i></th>
																						<th data-toggle="tooltip" data-placement="top" data-html="true" title="Amount left to be paid for this week's SSS contribution">To be paid <i style="color: gray">(?)</i></th>
																						<th data-toggle="tooltip" data-placement="top" data-html="true" title="Amount that is paid for this week's SSS contribution. Used to subtract next week's SSS contribution." style="width: 225px;">Paid this week <i style="color: gray">(?)</i></th>
																						<th>Loans</th>
																						<th>Net Pay</th>
																					</thead>
																					<tbody>
																						<?php foreach ($GetWeeklyListEmployeeWithSpecificApplicant->result_array() as $row):
																							$ApplicantID = $row['ApplicantID'];
																							$ApplicantName = $row['LastName'] . ', ' . $row['FirstName'] . ' ' . $row['MiddleName'] . '.';
																							if ($row['NameExtension'] != NULL) {
																								$ApplicantName = $ApplicantName . ', ' . $row['NameExtension'];
																							}
																							$GetPayrollWeekGrossPay = $this->Model_Selects->GetPayrollWeekGrossPay($ApplicantID, $FetchYear, $FetchMonth, $Week, $Mode);
																							if ($GetPayrollWeekGrossPay == NULL) {
																								$GetPayrollWeekGrossPay = 0;
																							}
																							$GetPayrollWeekHours = $this->Model_Selects->GetPayrollWeekHours($ApplicantID, $FetchYear, $FetchMonth, $Week, $Mode);
																							if ($GetPayrollWeekHours == NULL) {
																								$GetPayrollWeekHours = 0;
																							}
																							$GetPayrollWeekOTHours = $this->Model_Selects->GetPayrollWeekOTHours($ApplicantID, $FetchYear, $FetchMonth, $Week, $Mode);
																							if ($GetPayrollWeekOTHours == NULL) {
																								$GetPayrollWeekOTHours = 0;
																							}
																							$TotalHours = $GetPayrollWeekHours + $GetPayrollWeekOTHours;
																							$sssTable = $this->Model_Selects->GetAllSSSTable();
																							$hdmfTable = $this->Model_Selects->GetAllHDMFTable();
																							$philhealthTable = $this->Model_Selects->GetAllPhilHealthTable();
																							// SSS Table
																							foreach ($sssTable->result_array() as $srow) {
																								if ($GetPayrollWeekGrossPay >= $srow['f_range'] && $GetPayrollWeekGrossPay <= $srow['t_range']) {
																									$sss_contri = $srow['contribution_ee'];
																								}
																							}
																							// HDMF Table
																							foreach ($hdmfTable->result_array() as $hrow) {
																								if ($GetPayrollWeekGrossPay >= $hrow['f_range'] && $GetPayrollWeekGrossPay <= $hrow['t_range']) {
																									$hdmf_rate = $hrow['contribution_ee'];
																								}
																							}
																							// PhilHealth Table
																							$philhealthArray=$philhealthTable->result_array();
																							if ($GetPayrollWeekGrossPay >= $philhealthArray[0]['f_range'] && $GetPayrollWeekGrossPay <= $philhealthArray[0]['t_range'])
																							{
																								$philhealth_percentage=300;
																							}
																							else if($GetPayrollWeekGrossPay >= $philhealthArray[1]['f_range'] && $GetPayrollWeekGrossPay <= $philhealthArray[1]['t_range'])
																							{
																								$philhealth_percentage=($GetPayrollWeekGrossPay * 0.03);

																							}
																							else
																							{
																								$philhealth_percentage=1800;
																							}

																							if($Mode==0)//weekly
																							{
																								$cutoffTaxDivider=4;
																							}
																							else if($Mode==1)//semi monthly
																							{
																								$cutoffTaxDivider=2;
																							}
																							else if($Mode==2) //monthly
																							{
																								$cutoffTaxDivider=1;
																							}

																							$sss_contriCalc = $sss_contri/$cutoffTaxDivider;
																							$hdmf_contri = $GetPayrollWeekGrossPay*$hdmf_rate;
																							$hdmf_contriCalc = $hdmf_contri/$cutoffTaxDivider;
																							$hdmf_contriText = $hdmf_contri * 100;
																							$philhealth_contri=$philhealth_percentage/$cutoffTaxDivider;

																							// Tax
																							$tStarts = new DateTime($row['DateStarted']);
																							$tEnds = new DateTime($row['DateEnds']);

																							// Calculating monthly salary to annual salary
																							$tDiff = $tEnds->diff($tStarts);
																							if ($tDiff->m > 1) {
																								$tTotalMonths = $tDiff->y * 12 + $tDiff->m + $tDiff->d / 30;
																							} else {
																								$tTotalMonths = $tDiff->d;
																							}
																							if ($row['SalaryExpected'] != NULL && $tTotalMonths > 0) {
																								$salaryMonthly = $row['SalaryExpected'] / $tTotalMonths;
																							} else {
																								$salaryMonthly = 0;
																							}
																							$annualSalary = $salaryMonthly * 12;
																							$year=date("Y");
																							if($year<=2022)
																							{
																								if($annualSalary<=250000) //Not over P250,000 -- 0%
																								{
																									$tax=0; 
																								}
																								else if($annualSalary>=250000.01 && $annualSalary <= 400000) 	//Over P250,000 but not over P400,000 -- 20% of the excess over P250,000
																								{
																									$tax=((($annualSalary-250000)*0.2)/12)/$cutoffTaxDivider;
																								} 
																								else if($annualSalary>=400000.01 && $annualSalary <= 800000) 	//Over P400,000 but not over P800,000 -- P30,000 + 25% of the excess over P400,000
																								{
																									$tax=((30000+(($annualSalary-400000)*0.25))/12)/$cutoffTaxDivider; 		 	//divided into 12 for monthly, then divided by 4 for weekly, 2 for semi monthly, 1 for monthly
																								}
																								else if($annualSalary>=800000.01 && $annualSalary <= 2000000) 	//Over P800,000 but not over P2,000,000 -- P130,000 + 30% of the excess over P800,000
																								{
																									$tax=((130000+(($annualSalary-800000)*0.3))/12)/$cutoffTaxDivider; 		  	//divided into 12 for monthly, then divided by 4 for weekly, 2 for semi monthly, 1 for monthly
																								}
																								else if($annualSalary>=2000000.01 && $annualSalary <= 8000000) 	//Over P2,000,000 but not over P8,000,000 -- P490,000 + 32% of the excess over P2,000,000
																								{
																									$tax=((490000+(($annualSalary-2000000)*0.32))/12)/$cutoffTaxDivider; 		//divided into 12 for monthly, then divided by 4 for weekly, 2 for semi monthly, 1 for monthly
																								}
																								else 															//Over P8,000,000 -- P2,410,000 + 35% of the excess over P8,000,000
																								{
																									$tax=((2410000+(($annualSalary-8000000)*0.35))/12)/$cutoffTaxDivider; 		//divided into 12 for monthly, then divided by 4 for weekly, 2 for semi monthly, 1 for monthly
																								}

																							}
																							else
																							{
																								if($annualSalary<=250000) //Not over P250,000 -- 0%
																								{
																									$tax=0; 
																								}
																								else if($annualSalary>=250000.01 && $annualSalary <= 400000) 	//Over P250,000 but not over P400,000 -- 15% of the excess over P250,000
																								{
																									$tax=((($annualSalary-250000)*0.15)/12)/$cutoffTaxDivider;
																								} 
																								else if($annualSalary>=400000.01 && $annualSalary <= 800000) 	//Over P400,000 but not over P800,000 -- P22,500 + 20% of the excess over P400,000
																								{
																									$tax=((22500+(($annualSalary-400000)*0.20))/12)/$cutoffTaxDivider; 		 	//divided into 12 for monthly, then divided by 4 for weekly, 2 for semi monthly, 1 for monthly
																								}
																								else if($annualSalary>=800000.01 && $annualSalary <= 2000000) 	//Over P800,000 but not over P2,000,000 -- P102,500 + 25% of the excess over P800,000
																								{
																									$tax=((102500+(($annualSalary-800000)*0.25))/12)/$cutoffTaxDivider; 		  	//divided into 12 for monthly, then divided by 4 for weekly, 2 for semi monthly, 1 for monthly
																								}
																								else if($annualSalary>=2000000.01 && $annualSalary <= 8000000) 	//Over P2,000,000 but not over P8,000,000 -- P402,500 + 30% of the excess over P2,000,000
																								{
																									$tax=((402500+(($annualSalary-2000000)*0.30))/12)/$cutoffTaxDivider; 		//divided into 12 for monthly, tthen divided by 4 for weekly, 2 for semi monthly, 1 for monthly
																								}
																								else 															//Over P8,000,000 -- P2,202,500 + 35% of the excess over P8,000,000
																								{
																									$tax=((202500+(($annualSalary-8000000)*0.35))/12)/$cutoffTaxDivider; 		//divided into 12 for monthly, then divided by 4 for weekly, 2 for semi monthly, 1 for monthly
																								}
																							}

																							$SSSToBePaid = $this->Model_Selects->GetSSSToBePaid($ApplicantID, $ClientID, $FetchYear, $FetchMonth, $Mode);
																							if ($SSSToBePaid->num_rows() > 0) {
																								$stbprow = $SSSToBePaid->result_array()[0];
																								switch($Week) {
																									case 1:
																										$WeekAmount = $sss_contriCalc;
																										$WeekPaid = $stbprow['Week1Paid'];
																										$toBePaid = $WeekAmount;
																										break;
																									case 2:
																										$WeekAmountPrevious = $stbprow['Week1Amount'];
																										$WeekAmount = $stbprow['Week2Amount'];
																										$WeekPaidPrevious = $stbprow['Week1Paid'];
																										$WeekPaid = $stbprow['Week2Paid'];

																										$toBePaid = ($WeekAmount + $WeekAmountPrevious) - $WeekPaidPrevious;
																										break;
																									case 3:
																										$WeekAmountPreviousPrevious = $stbprow['Week1Amount'];
																										$WeekAmountPrevious = $stbprow['Week2Amount'];
																										$WeekAmount = $stbprow['Week3Amount'];

																										$WeekPaidPreviousPrevious = $stbprow['Week1Paid'];
																										$WeekPaidPrevious = $stbprow['Week2Paid'];
																										$WeekPaid = $stbprow['Week3Paid'];

																										$toBePaid = ($WeekAmount + $WeekAmountPrevious + $WeekAmountPreviousPrevious) - ($WeekPaidPrevious + $WeekPaidPreviousPrevious);
																										break;
																									case 4:
																										$WeekAmountPreviousPreviousPrevious = $stbprow['Week1Amount'];
																										$WeekAmountPreviousPrevious = $stbprow['Week2Amount'];
																										$WeekAmountPrevious = $stbprow['Week3Amount'];
																										$WeekAmount = $stbprow['Week4Amount'];

																										$WeekPaidPreviousPreviousPrevious = $stbprow['Week1Paid'];
																										$WeekPaidPreviousPrevious = $stbprow['Week2Paid'];
																										$WeekPaidPrevious = $stbprow['Week3Paid'];
																										$WeekPaid = $stbprow['Week4Paid'];

																										$toBePaid = ($WeekAmount + $WeekAmountPrevious + $WeekAmountPreviousPrevious + $WeekAmountPreviousPreviousPrevious) - ($WeekPaidPrevious + $WeekPaidPreviousPrevious + $WeekPaidPreviousPreviousPrevious);
																										break;
																									default:
																										$WeekAmount = $sss_contriCalc;
																										$WeekPaid = $stbprow['Week1Paid'];
																										$toBePaid = $WeekAmount;
																										break;
																								}
																							} else {
																								$WeekPaid = 0;
																								$toBePaid = $sss_contriCalc;
																								$now = new DateTime();
																								$DateAdded = $now->format('Y-m-d H:i:s');
																								$data = array(
																									'Amount' => $sss_contriCalc,
																									'ApplicantID' => $ApplicantID,
																									'ClientID' => $ClientID,
																									'Month' => $FetchMonth,
																									'Year' => $FetchYear,
																									'Week' => $Week,
																									'Mode' => $Mode,
																									'DateAdded' => $DateAdded,
																								);
																								$AddSSSToBePaidAmount = $this->Model_Updates->AddSSSToBePaidAmount($data);
																							}
																							$data = array(
																								'Amount' => $sss_contriCalc,
																								'ApplicantID' => $ApplicantID,
																								'ClientID' => $ClientID,
																								'Month' => $FetchMonth,
																								'Year' => $FetchYear,
																								'Week' => $Week,
																								'Mode' => $Mode
																							);
																							$UpdateSSSToBePaidAmount = $this->Model_Updates->UpdateSSSToBePaidAmount($data);

																							$ShowPayrollLoans = $this->Model_Selects->ShowPayrollLoans($ApplicantID, $FetchYear, $FetchMonth, $Week, $Mode);
																							$loansTotal = 0;
																							if ($ShowPayrollLoans->num_rows() > 0) {
																								foreach($ShowPayrollLoans->result_array() as $lrow) {
																									$loansTotal = $loansTotal + $lrow['Amount'];
																								}
																							}

																							$totalDeduction = $hdmf_contriCalc + $philhealth_contri + $tax + $loansTotal + $toBePaid;
																							$net_pay = $GetPayrollWeekGrossPay - $totalDeduction;
																							if ($net_pay < 0) {
																								$net_pay = 0;
																							}

																							?>
																							<tr class="payroll-week-row">
																								<td><?php echo $row['ApplicantID']; ?></td>
																								<td class="payroll-hours" data-toggle="tooltip" data-placement="top" data-html="true" title="Regular Hours: <?php echo round($GetPayrollWeekHours, 2) . '<br>Overtime Hours: ' . round($GetPayrollWeekOTHours, 2); ?>"><?php echo $TotalHours; ?></td>
																								<td class="payroll-grosspay"><?php echo round($GetPayrollWeekGrossPay, 2); ?></td>
																								<td class="payroll-philhealth" data-toggle="tooltip" data-placement="top" data-html="true" title="<?php echo round($philhealth_percentage, 2) . ' / ' . $cutoffTaxDivider . '<br><i>PhilHealth Percentage x Mode</i>'; ?>"><?php echo round($philhealth_contri, 2); ?></td>
																								<td class="payroll-hdmf" data-toggle="tooltip" data-placement="top" data-html="true" title="(<?php echo round($GetPayrollWeekGrossPay, 2) . ' x ' . $hdmf_rate . ') / ' . $cutoffTaxDivider . '<br><i>(Gross Pay x HDMF Rate) / Mode</i>'; ?>"><?php echo round($hdmf_contriCalc, 2); ?></td>

																								<td class="payroll-tax" data-toggle="tooltip" data-placement="top" data-html="true" title="<?php echo 'Annual Salary: ' . round($annualSalary, 2) . '<br>Monthly Salary: ' . round($salaryMonthly, 2); ?>"><?php echo $tax; ?></td>
																								<td class="payroll-sss" data-toggle="tooltip" data-placement="top" data-html="true" title="<?php echo $sss_contri . ' / ' . $cutoffTaxDivider; ?><br><i>SSS Contribution / Mode</i>"><?php echo $sss_contriCalc; ?></td>
																								<td><i class="fas fa-arrow-right" style="margin-right: -1px; color: rgba(0, 0, 0, 0.55);"></i></td>
																								<td class="payroll-tobepaid"><?php echo $toBePaid; ?></td>
																								<td>
																									<div class="row">
																										<div class="col-sm-12 col-md-8">
																											<input type="number" class="payroll-paidthisweek payroll-weekrow-input form-control" value="<?php echo $WeekPaid; ?>">
																										</div>
																										<div class="col-sm-12 col-md-4">
																											<button class="payroll-weekrow-btn btn btn-success btn-sm w-100" data-payroll-weekrow-applicantid="<?php echo $ApplicantID; ?>" data-payroll-weekrow-clientid="<?php echo $ClientID; ?>" data-payroll-weekrow-year="<?php echo $FetchYear; ?>" data-payroll-weekrow-month="<?php echo $FetchMonth; ?>" data-payroll-weekrow-week="<?php echo $Week; ?>" style="margin-left: -25px; padding-top: 5px; padding-bottom: 5px; margin-top: 1px; display: none;"><i class="fas fa-check" style="margin-right: -1px;"></i></button>
																										</div>
																									</div>
																								</td>
																								<td><button type="button" class="loans-btn btn btn-info btn-sm SetPrimaryClientIDButton" data-toggle="modal" data-target="#ModalLoans" data-applicantid="<?php echo $ApplicantID; ?>" data-applicantname="<?php echo $ApplicantName; ?>" data-year="<?php echo $FetchYear; ?>" data-month="<?php echo $FetchMonth; ?>" data-week="<?php echo $Week; ?>" data-loanstotal="<?php echo $loansTotal; ?>"><i class="fas fa-piggy-bank"></i> Loans</button></td>
																								<td class="payroll-net-pay" data-toggle="tooltip" data-placement="top" data-html="true" title="<?php echo round($GetPayrollWeekGrossPay, 2) . ' - (' . $hdmf_contriCalc . ' + ' . $philhealth_contri . ' + ' . $tax . ' + ' . $toBePaid . ')<br><i>Gross Pay - (HDMF Contribution + PhilHealth Contribution + Tax + SSS left to be paid)</i>'; ?>"><?php echo round($net_pay, 2); ?></td>
																							</tr>
																						<?php endforeach; ?>
																					</tbody>
																				</table>
																			</div>
																		</div>
																	</div>
																<?php endfor; ?>
															<?php elseif($Mode == 2): // Monthly 
																	$Week = 1;?>
																	<div class="payroll-week-container col-sm-12">
																		<div class="payroll-week col-sm-12">
																			<b><?php echo $selectedMonthReadable; ?></b>
																		</div>
																		<div class="payroll-data col-sm-12 col-mb-12">
																			<div class="table-responsive w-100">
																				<table id="WeeklyTable" class="table table-condensed">
																					<thead>
																						<th>Applicant ID</th>
																						<th>Hours</th>
																						<th>Gross Pay</th>
																						<th>PhilHealth</th>
																						<th>HDMF</th>
																						<th>Tax</th>
																						<th>SSS</th>
																						<th style="width: 50px;"><i class="fas fa-arrow-right" style="margin-right: -1px; color: rgba(0, 0, 0, 0.55);"></i></th>
																						<th data-toggle="tooltip" data-placement="top" data-html="true" title="Amount left to be paid for this week's SSS contribution">To be paid <i style="color: gray">(?)</i></th>
																						<th data-toggle="tooltip" data-placement="top" data-html="true" title="Amount that is paid for this week's SSS contribution. Used to subtract next week's SSS contribution." style="width: 225px;">Paid this week <i style="color: gray">(?)</i></th>
																						<th>Loans</th>
																						<th>Net Pay</th>
																					</thead>
																					<tbody>
																						<?php foreach ($GetWeeklyListEmployeeWithSpecificApplicant->result_array() as $row):
																							$ApplicantID = $row['ApplicantID'];
																							$ApplicantName = $row['LastName'] . ', ' . $row['FirstName'] . ' ' . $row['MiddleName'] . '.';
																							if ($row['NameExtension'] != NULL) {
																								$ApplicantName = $ApplicantName . ', ' . $row['NameExtension'];
																							}
																							$GetPayrollWeekGrossPay = $this->Model_Selects->GetPayrollWeekGrossPay($ApplicantID, $FetchYear, $FetchMonth, $Week, $Mode);
																							if ($GetPayrollWeekGrossPay == NULL) {
																								$GetPayrollWeekGrossPay = 0;
																							}
																							$GetPayrollWeekHours = $this->Model_Selects->GetPayrollWeekHours($ApplicantID, $FetchYear, $FetchMonth, $Week, $Mode);
																							if ($GetPayrollWeekHours == NULL) {
																								$GetPayrollWeekHours = 0;
																							}
																							$GetPayrollWeekOTHours = $this->Model_Selects->GetPayrollWeekOTHours($ApplicantID, $FetchYear, $FetchMonth, $Week, $Mode);
																							if ($GetPayrollWeekOTHours == NULL) {
																								$GetPayrollWeekOTHours = 0;
																							}
																							$TotalHours = $GetPayrollWeekHours + $GetPayrollWeekOTHours;
																							$sssTable = $this->Model_Selects->GetAllSSSTable();
																							$hdmfTable = $this->Model_Selects->GetAllHDMFTable();
																							$philhealthTable = $this->Model_Selects->GetAllPhilHealthTable();
																							// SSS Table
																							foreach ($sssTable->result_array() as $srow) {
																								if ($GetPayrollWeekGrossPay >= $srow['f_range'] && $GetPayrollWeekGrossPay <= $srow['t_range']) {
																									$sss_contri = $srow['contribution_ee'];
																								}
																							}
																							// HDMF Table
																							foreach ($hdmfTable->result_array() as $hrow) {
																								if ($GetPayrollWeekGrossPay >= $hrow['f_range'] && $GetPayrollWeekGrossPay <= $hrow['t_range']) {
																									$hdmf_rate = $hrow['contribution_ee'];
																								}
																							}
																							// PhilHealth Table
																							$philhealthArray=$philhealthTable->result_array();
																							if ($GetPayrollWeekGrossPay >= $philhealthArray[0]['f_range'] && $GetPayrollWeekGrossPay <= $philhealthArray[0]['t_range'])
																							{
																								$philhealth_percentage=300;
																							}
																							else if($GetPayrollWeekGrossPay >= $philhealthArray[1]['f_range'] && $GetPayrollWeekGrossPay <= $philhealthArray[1]['t_range'])
																							{
																								$philhealth_percentage=($GetPayrollWeekGrossPay * 0.03);

																							}
																							else
																							{
																								$philhealth_percentage=1800;
																							}

																							if($Mode==0)//weekly
																							{
																								$cutoffTaxDivider=4;
																							}
																							else if($Mode==1)//semi monthly
																							{
																								$cutoffTaxDivider=2;
																							}
																							else if($Mode==2) //monthly
																							{
																								$cutoffTaxDivider=1;
																							}

																							$sss_contriCalc = $sss_contri/$cutoffTaxDivider;
																							$hdmf_contri = $GetPayrollWeekGrossPay*$hdmf_rate;
																							$hdmf_contriCalc = $hdmf_contri/$cutoffTaxDivider;
																							$hdmf_contriText = $hdmf_contri * 100;
																							$philhealth_contri=$philhealth_percentage/$cutoffTaxDivider;

																							// Tax
																							$tStarts = new DateTime($row['DateStarted']);
																							$tEnds = new DateTime($row['DateEnds']);

																							// Calculating monthly salary to annual salary
																							$tDiff = $tEnds->diff($tStarts);
																							if ($tDiff->m > 1) {
																								$tTotalMonths = $tDiff->y * 12 + $tDiff->m + $tDiff->d / 30;
																							} else {
																								$tTotalMonths = $tDiff->d;
																							}
																							if ($row['SalaryExpected'] != NULL && $tTotalMonths > 0) {
																								$salaryMonthly = $row['SalaryExpected'] / $tTotalMonths;
																							} else {
																								$salaryMonthly = 0;
																							}
																							$annualSalary = $salaryMonthly * 12;
																							$year=date("Y");
																							if($year<=2022)
																							{
																								if($annualSalary<=250000) //Not over P250,000 -- 0%
																								{
																									$tax=0; 
																								}
																								else if($annualSalary>=250000.01 && $annualSalary <= 400000) 	//Over P250,000 but not over P400,000 -- 20% of the excess over P250,000
																								{
																									$tax=((($annualSalary-250000)*0.2)/12)/$cutoffTaxDivider;
																								} 
																								else if($annualSalary>=400000.01 && $annualSalary <= 800000) 	//Over P400,000 but not over P800,000 -- P30,000 + 25% of the excess over P400,000
																								{
																									$tax=((30000+(($annualSalary-400000)*0.25))/12)/$cutoffTaxDivider; 		 	//divided into 12 for monthly, then divided by 4 for weekly, 2 for semi monthly, 1 for monthly
																								}
																								else if($annualSalary>=800000.01 && $annualSalary <= 2000000) 	//Over P800,000 but not over P2,000,000 -- P130,000 + 30% of the excess over P800,000
																								{
																									$tax=((130000+(($annualSalary-800000)*0.3))/12)/$cutoffTaxDivider; 		  	//divided into 12 for monthly, then divided by 4 for weekly, 2 for semi monthly, 1 for monthly
																								}
																								else if($annualSalary>=2000000.01 && $annualSalary <= 8000000) 	//Over P2,000,000 but not over P8,000,000 -- P490,000 + 32% of the excess over P2,000,000
																								{
																									$tax=((490000+(($annualSalary-2000000)*0.32))/12)/$cutoffTaxDivider; 		//divided into 12 for monthly, then divided by 4 for weekly, 2 for semi monthly, 1 for monthly
																								}
																								else 															//Over P8,000,000 -- P2,410,000 + 35% of the excess over P8,000,000
																								{
																									$tax=((2410000+(($annualSalary-8000000)*0.35))/12)/$cutoffTaxDivider; 		//divided into 12 for monthly, then divided by 4 for weekly, 2 for semi monthly, 1 for monthly
																								}

																							}
																							else
																							{
																								if($annualSalary<=250000) //Not over P250,000 -- 0%
																								{
																									$tax=0; 
																								}
																								else if($annualSalary>=250000.01 && $annualSalary <= 400000) 	//Over P250,000 but not over P400,000 -- 15% of the excess over P250,000
																								{
																									$tax=((($annualSalary-250000)*0.15)/12)/$cutoffTaxDivider;
																								} 
																								else if($annualSalary>=400000.01 && $annualSalary <= 800000) 	//Over P400,000 but not over P800,000 -- P22,500 + 20% of the excess over P400,000
																								{
																									$tax=((22500+(($annualSalary-400000)*0.20))/12)/$cutoffTaxDivider; 		 	//divided into 12 for monthly, then divided by 4 for weekly, 2 for semi monthly, 1 for monthly
																								}
																								else if($annualSalary>=800000.01 && $annualSalary <= 2000000) 	//Over P800,000 but not over P2,000,000 -- P102,500 + 25% of the excess over P800,000
																								{
																									$tax=((102500+(($annualSalary-800000)*0.25))/12)/$cutoffTaxDivider; 		  	//divided into 12 for monthly, then divided by 4 for weekly, 2 for semi monthly, 1 for monthly
																								}
																								else if($annualSalary>=2000000.01 && $annualSalary <= 8000000) 	//Over P2,000,000 but not over P8,000,000 -- P402,500 + 30% of the excess over P2,000,000
																								{
																									$tax=((402500+(($annualSalary-2000000)*0.30))/12)/$cutoffTaxDivider; 		//divided into 12 for monthly, tthen divided by 4 for weekly, 2 for semi monthly, 1 for monthly
																								}
																								else 															//Over P8,000,000 -- P2,202,500 + 35% of the excess over P8,000,000
																								{
																									$tax=((202500+(($annualSalary-8000000)*0.35))/12)/$cutoffTaxDivider; 		//divided into 12 for monthly, then divided by 4 for weekly, 2 for semi monthly, 1 for monthly
																								}
																							}

																							$SSSToBePaid = $this->Model_Selects->GetSSSToBePaid($ApplicantID, $ClientID, $FetchYear, $FetchMonth, $Mode);
																							if ($SSSToBePaid->num_rows() > 0) {
																								$stbprow = $SSSToBePaid->result_array()[0];
																								switch($Week) {
																									case 1:
																										$WeekAmount = $sss_contriCalc;
																										$WeekPaid = $stbprow['Week1Paid'];
																										$toBePaid = $WeekAmount;
																										break;
																									case 2:
																										$WeekAmountPrevious = $stbprow['Week1Amount'];
																										$WeekAmount = $stbprow['Week2Amount'];
																										$WeekPaidPrevious = $stbprow['Week1Paid'];
																										$WeekPaid = $stbprow['Week2Paid'];

																										$toBePaid = ($WeekAmount + $WeekAmountPrevious) - $WeekPaidPrevious;
																										break;
																									case 3:
																										$WeekAmountPreviousPrevious = $stbprow['Week1Amount'];
																										$WeekAmountPrevious = $stbprow['Week2Amount'];
																										$WeekAmount = $stbprow['Week3Amount'];

																										$WeekPaidPreviousPrevious = $stbprow['Week1Paid'];
																										$WeekPaidPrevious = $stbprow['Week2Paid'];
																										$WeekPaid = $stbprow['Week3Paid'];

																										$toBePaid = ($WeekAmount + $WeekAmountPrevious + $WeekAmountPreviousPrevious) - ($WeekPaidPrevious + $WeekPaidPreviousPrevious);
																										break;
																									case 4:
																										$WeekAmountPreviousPreviousPrevious = $stbprow['Week1Amount'];
																										$WeekAmountPreviousPrevious = $stbprow['Week2Amount'];
																										$WeekAmountPrevious = $stbprow['Week3Amount'];
																										$WeekAmount = $stbprow['Week4Amount'];

																										$WeekPaidPreviousPreviousPrevious = $stbprow['Week1Paid'];
																										$WeekPaidPreviousPrevious = $stbprow['Week2Paid'];
																										$WeekPaidPrevious = $stbprow['Week3Paid'];
																										$WeekPaid = $stbprow['Week4Paid'];

																										$toBePaid = ($WeekAmount + $WeekAmountPrevious + $WeekAmountPreviousPrevious + $WeekAmountPreviousPreviousPrevious) - ($WeekPaidPrevious + $WeekPaidPreviousPrevious + $WeekPaidPreviousPreviousPrevious);
																										break;
																									default:
																										$WeekAmount = $sss_contriCalc;
																										$WeekPaid = $stbprow['Week1Paid'];
																										$toBePaid = $WeekAmount;
																										break;
																								}
																							} else {
																								$WeekPaid = 0;
																								$toBePaid = $sss_contriCalc;
																								$now = new DateTime();
																								$DateAdded = $now->format('Y-m-d H:i:s');
																								$data = array(
																									'Amount' => $sss_contriCalc,
																									'ApplicantID' => $ApplicantID,
																									'ClientID' => $ClientID,
																									'Month' => $FetchMonth,
																									'Year' => $FetchYear,
																									'Week' => $Week,
																									'Mode' => $Mode,
																									'DateAdded' => $DateAdded,
																								);
																								$AddSSSToBePaidAmount = $this->Model_Updates->AddSSSToBePaidAmount($data);
																							}
																							$data = array(
																								'Amount' => $sss_contriCalc,
																								'ApplicantID' => $ApplicantID,
																								'ClientID' => $ClientID,
																								'Month' => $FetchMonth,
																								'Year' => $FetchYear,
																								'Week' => $Week,
																								'Mode' => $Mode
																							);
																							$UpdateSSSToBePaidAmount = $this->Model_Updates->UpdateSSSToBePaidAmount($data);

																							$ShowPayrollLoans = $this->Model_Selects->ShowPayrollLoans($ApplicantID, $FetchYear, $FetchMonth, $Week, $Mode);
																							$loansTotal = 0;
																							if ($ShowPayrollLoans->num_rows() > 0) {
																								foreach($ShowPayrollLoans->result_array() as $lrow) {
																									$loansTotal = $loansTotal + $lrow['Amount'];
																								}
																							}

																							$totalDeduction = $hdmf_contriCalc + $philhealth_contri + $tax + $loansTotal + $toBePaid;
																							$net_pay = $GetPayrollWeekGrossPay - $totalDeduction;
																							if ($net_pay < 0) {
																								$net_pay = 0;
																							}

																							?>
																							<tr class="payroll-week-row">
																								<td><?php echo $row['ApplicantID']; ?></td>
																								<td class="payroll-hours" data-toggle="tooltip" data-placement="top" data-html="true" title="Regular Hours: <?php echo round($GetPayrollWeekHours, 2) . '<br>Overtime Hours: ' . round($GetPayrollWeekOTHours, 2); ?>"><?php echo $TotalHours; ?></td>
																								<td class="payroll-grosspay"><?php echo round($GetPayrollWeekGrossPay, 2); ?></td>
																								<td class="payroll-philhealth" data-toggle="tooltip" data-placement="top" data-html="true" title="<?php echo round($philhealth_percentage, 2) . ' / ' . $cutoffTaxDivider . '<br><i>PhilHealth Percentage x Mode</i>'; ?>"><?php echo round($philhealth_contri, 2); ?></td>
																								<td class="payroll-hdmf" data-toggle="tooltip" data-placement="top" data-html="true" title="(<?php echo round($GetPayrollWeekGrossPay, 2) . ' x ' . $hdmf_rate . ') / ' . $cutoffTaxDivider . '<br><i>(Gross Pay x HDMF Rate) / Mode</i>'; ?>"><?php echo round($hdmf_contriCalc, 2); ?></td>

																								<td class="payroll-tax" data-toggle="tooltip" data-placement="top" data-html="true" title="<?php echo 'Annual Salary: ' . round($annualSalary, 2) . '<br>Monthly Salary: ' . round($salaryMonthly, 2); ?>"><?php echo $tax; ?></td>
																								<td class="payroll-sss" data-toggle="tooltip" data-placement="top" data-html="true" title="<?php echo $sss_contri . ' / ' . $cutoffTaxDivider; ?><br><i>SSS Contribution / Mode</i>"><?php echo $sss_contriCalc; ?></td>
																								<td><i class="fas fa-arrow-right" style="margin-right: -1px; color: rgba(0, 0, 0, 0.55);"></i></td>
																								<td class="payroll-tobepaid"><?php echo $toBePaid; ?></td>
																								<td>
																									<div class="row">
																										<div class="col-sm-12 col-md-8">
																											<input type="number" class="payroll-paidthisweek payroll-weekrow-input form-control" value="<?php echo $WeekPaid; ?>">
																										</div>
																										<div class="col-sm-12 col-md-4">
																											<button class="payroll-weekrow-btn btn btn-success btn-sm w-100" data-payroll-weekrow-applicantid="<?php echo $ApplicantID; ?>" data-payroll-weekrow-clientid="<?php echo $ClientID; ?>" data-payroll-weekrow-year="<?php echo $FetchYear; ?>" data-payroll-weekrow-month="<?php echo $FetchMonth; ?>" data-payroll-weekrow-week="<?php echo $Week; ?>" style="margin-left: -25px; padding-top: 5px; padding-bottom: 5px; margin-top: 1px; display: none;"><i class="fas fa-check" style="margin-right: -1px;"></i></button>
																										</div>
																									</div>
																								</td>
																								<td><button type="button" class="loans-btn btn btn-info btn-sm SetPrimaryClientIDButton" data-toggle="modal" data-target="#ModalLoans" data-applicantid="<?php echo $ApplicantID; ?>" data-applicantname="<?php echo $ApplicantName; ?>" data-year="<?php echo $FetchYear; ?>" data-month="<?php echo $FetchMonth; ?>" data-week="<?php echo $Week; ?>" data-loanstotal="<?php echo $loansTotal; ?>"><i class="fas fa-piggy-bank"></i> Loans</button></td>
																								<td class="payroll-net-pay" data-toggle="tooltip" data-placement="top" data-html="true" title="<?php echo round($GetPayrollWeekGrossPay, 2) . ' - (' . $hdmf_contriCalc . ' + ' . $philhealth_contri . ' + ' . $tax . ' + ' . $toBePaid . ')<br><i>Gross Pay - (HDMF Contribution + PhilHealth Contribution + Tax + SSS left to be paid)</i>'; ?>"><?php echo round($net_pay, 2); ?></td>
																							</tr>
																						<?php endforeach; ?>
																					</tbody>
																				</table>
																			</div>
																		</div>
																	</div>
																<?php
															endif; ?>
															</div>
														<?php
														else:
															echo '<span class="ml-5" style="font-size: 24px; color: rgba(0, 0, 0, 0.45);"><i class="fas fa-info-circle"></i> No data found for this month.</span>';
														endif;

														?>
													</div>
												<?php
												else:
													echo '<span class="ml-5" style="font-size: 24px; color: rgba(0, 0, 0, 0.45);"><i class="fas fa-info-circle"></i> No data found for this year.</span>';
												endif;
												?>
											</div>
												<?php endif; ?>
											</div>
											<?php elseif ($Status == 'Employed (Permanent)'): ?>
											<div class="employee-content-header">
												<div class="ml-1 row">
													<?php if(in_array('EmployeesEditing', $this->session->userdata('Permissions'))): ?>
													<button id="<?php echo $ApplicantID; ?>" data-dismiss="modal" type="button" class="btn btn-primary btn-sm ExtendButton mr-1" data-toggle="modal" data-target="#ModifyContractModal"><i class="fas fa-edit"></i> Modify Contract</button>
													<?php endif; ?>
													<button class="btn btn-info btn-sm" data-toggle="modal" data-target="#EmpContractHistory"><i class="fas fa-book"></i> Contract History</button>
													<?php if(in_array('EmployeesEditing', $this->session->userdata('Permissions'))): ?>
													<div class="ml-auto">
														<button id="<?php echo $ApplicantID; ?>" class="btn btn-danger btn-sm SuspendButton" data-toggle="modal" data-target="#SuspendModal" type="button"><i class="fas fa-exclamation-triangle"></i> Suspend</button>
													</div>
													<?php endif; ?>
												</div>
											</div>
											<hr>
											<div class="col-sm-12 col-md-12 employee-dynamic-header text-center">
												<b>
													Permanently employed since
												</b>
											</div>
											<div class="col-sm-12 col-md-12 text-center">
												<p>
													<?php
														echo $cElapsedText;
													?>
												</p>
											</div>
											<div class="col-sm-12 col-md-12 text-center">
												<p>
													<input type="hidden" id="TimeLeft" value="100">
												</p>
											</div>
											<div class="col-sm-12 col-md-12 PrintExclude">
												<div class="progressBar">
													<div class="progressBarTitle progressRemainingColor">Permanent</div>
													<div class="progress progressRemaining"></div>
													<div class="progress_value">45%</div>
												</div>
											</div>
											<div class="row">
												<div class="col-sm-3">
													<div class="card mb-3" style="max-width: 18rem; height: 300px;">
														<div class="card-header employee-dynamic-header text-center"><b><i class="fas fa-user-tag"></i> Client</b></div>
														<div class="card-body text-dark">
															<h5 class="card-title text-center wercher-card-title">
																<?php
																	foreach($GetEmployeeMatchingClient->result_array() as $row) {
																		echo $row['Name'];
																	};
																?>
															</h5>
															<p class="card-text">
																<div class="col-sm-12 employee-static-item text-center mt-3">
																	<div class="col-sm-12 employee-dynamic-header">
																		<b>Contact</b>
																	</div>
																	<div class="col-sm-12">
																		<?php
																			foreach($GetEmployeeMatchingClient->result_array() as $row) {
																				echo $row['ContactNumber'];
																			};
																		?>
																	</div>
																</div>
																<div class="col-sm-12 employee-static-item text-center">
																	<div class="col-sm-12 employee-dynamic-header">
																		<b>Address</b>
																	</div>
																	<div class="col-sm-12">
																		<?php
																			foreach($GetEmployeeMatchingClient->result_array() as $row) {
																				echo $row['Address'];
																			};
																		?>
																	</div>
																</div>
															</p>
														</div>
													</div>
												</div>
												<div class="col-sm-3">
													<div class="card mb-3" style="max-width: 18rem; height: 300px;">
														<div class="card-header employee-dynamic-header text-center"><b><i class="fas fa-user-tie"></i> Position</b></div>
														<div class="card-body text-dark">
															<h5 class="card-title text-center wercher-card-title"><?php echo $PositionDesired; ?></h5>
															<p class="card-text">
																<div class="col-sm-12 employee-static-item text-center mt-3">
																	<div class="col-sm-12 employee-dynamic-header">
																		<b>Employment Started</b>
																	</div>
																	<div class="col-sm-12" data-toggle="tooltip" data-placement="top" data-html="true" title="<?php echo $dselapsed->diffForHumans(); ?>">
																		<?php echo $dsday . '<br>' . $dshours; ?>
																	</div>
																</div>
															</p>
														</div>
													</div>
												</div>
												<div class="col-sm-3">
													<div class="card mb-3" style="max-width: 18rem; height: 300px;">
														<div class="card-header employee-dynamic-header text-center"><b><i class="fas fa-dollar-sign"></i> Salary Expected</b></div>
														<div class="card-body text-dark">
															<h5 class="card-title text-center wercher-card-title"><span style="user-select: none;">₱ </span><?php echo $SalaryExpected; ?></h5>
															<p class="card-text">
																<div class="col-sm-12 employee-static-item text-center mt-3">
																	<div class="col-sm-12 employee-dynamic-header">
																		<b>Documents (<?php echo $GetDocuments->num_rows(); ?>)</b>
																	</div>
																	<div class="col-sm-12">
																		<a href="#Documents" class="btn-sm btn btn-primary"><i class="far fa-eye"></i> View</a>
																	</div>
																</div>
																<div class="col-sm-12 employee-static-item text-center">
																	<div class="col-sm-12 employee-dynamic-header">
																		<b>Violations (<?php echo $GetDocumentsViolations->num_rows(); ?>)</b>
																	</div>
																	<div class="col-sm-12">
																		<a href="#Violations" class="btn-sm btn btn-danger"><i class="far fa-eye"></i> View</a>
																	</div>
																</div>
															</p>
														</div>
													</div>
												</div>
												<div class="col-sm-3">
													<div class="card mb-3" style="max-width: 18rem; height: 300px;">
														<div class="card-header employee-dynamic-header text-center"><b><i class="fas fa-dollar-sign"></i> Additional Info</b></div>
														<div class="card-body text-dark">
															<p class="card-text">
																<div class="col-sm-12 employee-static-item text-center">
																	<div class="col-sm-12 employee-dynamic-header">
																		<b>13th Month Pay</b>
																	</div>
																	<div class="col-sm-12">
																		<?php
																			echo '<span style="user-select: none;">₱ </span>' . round($thirteen, 2);
																		?>
																	</div>
																</div>
															</p>
														</div>
													</div>
												</div>
											</div>
											<?php else: ?>
											<div class="employee-content-header">
												<?php if(in_array('EmployeesEditing', $this->session->userdata('Permissions')) || in_array('EmployeesHiring', $this->session->userdata('Permissions'))): ?>
												<button id="<?php echo $ApplicantID; ?>" data-dismiss="modal" type="button" class="btn btn-primary btn-sm mr-auto ModalHire" data-toggle="modal" data-target="#hirthis"><i class="fas fa-plus"></i> New Contract</button>
												<?php endif; ?>
												<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#EmpContractHistory"><i class="fas fa-book"></i> Contract History</button>
											</div>
											<hr>
											<div class="row mt-4">
												<div class="col-sm-12">
													<i class="fas fa-info-circle"></i> No available contract to show.
												</div>
											</div>
											<?php endif; ?>
										</div>
									</div>
									<div id="TabDocuments">
										<div class="employee-tabs-group-content">
											<div class="employee-content-header">
												<?php if(in_array('EmployeesEditing', $this->session->userdata('Permissions'))): ?>
												<button id="<?php echo $ApplicantID; ?>" class="btn btn-primary btn-sm doc_btn" data-toggle="modal" data-target="#AddSuppDoc"><i class="fas fa-file-upload"></i> Upload Documents</button>
												<?php endif; ?>
											</div>
											<hr>
											<div class="row">
												<div class="col-sm-8">
													<div class="row ml-3">
														<div class="col-sm-12">
															<span id="FolderDocumentsIcon" class="folder-button"><i class="fas fa-folder-open"></i> Documents (<?php echo $GetDocuments->num_rows(); ?>)</span>
														</div>
														<div id="FolderDocuments" class="folder-documents folder-active col-sm-12 mt-4 ml-5">
														<?php if ($GetDocuments->num_rows() > 0) { ?>
															<?php
																$len = $GetDocuments->num_rows();
																$iteration = 0;
															 ?>
															<?php foreach ($GetDocuments->result_array() as $row): ?>
																<?php $iteration++; ?>
																	<div class="mb-3">
																		<?php if ($iteration == $len): ?>
																			<img class="folder-documents-tree" src="assets/img/documents-folder-tree.png">
																		<?php else: ?>
																			<img class="folder-documents-tree" src="assets/img/documents-folder-tree-continuous.png">
																		<?php endif; ?>
																		<div class="folder-documents-icon"><i class="fas fa-file-pdf"></i></div>
																		<div class="col-sm-12 ml-3">
																			<a class="ml-2" href="<?php echo $row['Doc_File'];?>" target="_blank">
																			<b><?php echo $row['Doc_FileName']; ?></b></a>
																		</div>
																		<div class="folder-documents-info col-sm-12 ml-4">
																			<?php echo $row['Subject']; ?> | Created by <?php echo $row['DateAdded']; ?>  (0MB)
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
															<span id="FolderViolationsIcon" class="folder-button"><i class="fas fa-folder"></i> Violations (<?php echo $GetDocumentsViolations->num_rows(); ?>)</span>
														</div>
														<div id="FolderViolations" class="folder-documents col-sm-12 mt-4 ml-5">
														<?php if ($GetDocumentsViolations->num_rows() > 0) { ?>
															<?php
																$len = $GetDocumentsViolations->num_rows();
																$iteration = 0;
															 ?>
															<?php foreach ($GetDocumentsViolations->result_array() as $row): ?>
																<?php $iteration++; ?>
																	<div class="mb-3">
																		<?php if ($iteration == $len): ?>
																			<img class="folder-documents-tree" src="assets/img/documents-folder-tree.png">
																		<?php else: ?>
																			<img class="folder-documents-tree" src="assets/img/documents-folder-tree-continuous.png">
																		<?php endif; ?>
																		<div class="folder-documents-icon"><i class="fas fa-file-pdf"></i></div>
																		<div class="col-sm-12 ml-3">
																			<a class="ml-2" href="<?php echo $row['Doc_File'];?>" target="_blank">
																			<b>													<?php
																					if ($row['Type'] == 'Blacklist') {
																						echo '[BLACKLIST] - ' . $row['Doc_FileName'];
																					} else {
																						echo $row['Doc_FileName'];
																					}
																				?>		
																			</b></a>
																		</div>
																		<div class="folder-documents-info col-sm-12 ml-4">
																			<?php echo $row['Subject']; ?> | Created by <?php echo $row['DateAdded']; ?> (0MB)
																		</div>
																	</div>
															<?php endforeach ?>
														<?php } else { ?>
															No documents available.
														<?php } ?>
														</div>
													</div>
												</div>
												<div class="col-sm-4 employee-documents-notes">
													<div class="row mt-3 employee-documents-title">
														<div class="col-sm-10">
															<i class="fas fa-list"></i> Notes
														</div>
														<div class="col-sm-2 text-right">
															<button id="AddNoteBtn" applicant-id="<?php echo $ApplicantID; ?>" class="btn btn-primary btn-sm" type="button" data-toggle="modal" data-target="#AddNote"><i class="fas fa-plus" style="margin-right: -1px;"></i></button>
														</div>
													</div>
													<div class="row mt-2">
														<div class="col-sm-12 mb-4">
															<?php
															$RowCount = 0;
															if ($GetDocumentsNotes->num_rows() > 0):
																foreach ($GetDocumentsNotes->result_array() as $row):
																	$RowCount++;?>
																	<div class="row mt-3">
																		<div class="col-sm-1" style="margin-top: -3px;">
																			<i class="fas fa-circle" style="font-size: 8px; margin-right: -1px;"></i>
																		</div>
																		<div class="col-sm-8">
																			<?php echo $row['Note'] ; ?>
																		</div>
																		<div class="col-sm-3 text-right employee-documents-notes-edit">
																			<a class="btn btn-danger btn-sm" href="<?=base_url()?>RemoveDocumentsNote?id=<?php echo $row['DatabaseID']; ?>&user=<?php echo $ApplicantID; ?>"><i class="fas fa-times" style="margin-right: -1px;"></i></a>
																		</div>
																	</div>
																<?php endforeach;
															else: ?>
																<div class="mt-2">
																	No notes found.
																</div>
															<?php endif; ?>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div id="TabAcademic">
										<div class="employee-tabs-group-content" id="TabAcademic">
											<div class="row">
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
																				No data available.
																				<?php if((in_array('ApplicantsEditing', $this->session->userdata('Permissions')) && ($Status == 'Applicant' || $Status == 'Expired' || $Status == 'Blacklisted' || $Status == 'Deleted')) || (in_array('EmployeesEditing', $this->session->userdata('Permissions')) && ($Status == 'Employed' || $Status == 'Employed (Permanent)'))): ?>
																				<br>
																				<a href="ModifyEmployee?id=<?php echo $ApplicantID; ?>#Academic_History" class="btn btn-sm btn-primary mt-2"><i class="fas fa-plus"></i> Add Data</a>
																				<?php endif; ?>
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
											<div class="row">
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
																				No data available.
																				<?php if((in_array('ApplicantsEditing', $this->session->userdata('Permissions')) && ($Status == 'Applicant' || $Status == 'Expired' || $Status == 'Blacklisted' || $Status == 'Deleted')) || (in_array('EmployeesEditing', $this->session->userdata('Permissions')) && ($Status == 'Employed' || $Status == 'Employed (Permanent)'))): ?>
																				<br>
																				<a href="ModifyEmployee?id=<?php echo $ApplicantID; ?>#Employment_Record" class="btn btn-sm btn-primary mt-2"><i class="fas fa-plus"></i> Add Data</a>
																				<?php endif; ?>
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
											<div class="row">
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
																				No data available.
																				<?php if((in_array('ApplicantsEditing', $this->session->userdata('Permissions')) && ($Status == 'Applicant' || $Status == 'Expired' || $Status == 'Blacklisted' || $Status == 'Deleted')) || (in_array('EmployeesEditing', $this->session->userdata('Permissions')) && ($Status == 'Employed' || $Status == 'Employed (Permanent)'))): ?>
																				<br>
																				<a href="ModifyEmployee?id=<?php echo $ApplicantID; ?>#Machine_Operated" class="btn btn-sm btn-primary mt-2"><i class="fas fa-plus"></i> Add Data</a>
																				<?php endif; ?>
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
					<h4 class="modal-title">Contract Report for <?=$LastName?>, <?=$FirstName?> <?=$MiddleName?>.</h4>
					<div class="text-right">
						<button onClick="printContent('PrintOutModal')" type="button" class="btn btn-primary mr-auto"><i class="fas fa-print"></i> Print</button>
						<button type="button" class="close d-none d-sm-block" data-dismiss="modal">&times;</button>
					</div>
				</div>

				<!-- Modal body -->
				<div class="modal-body">
					<div class="row rcontent">
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
					</div>
				</div>

				<!-- Modal footer -->
				<div class="modal-footer">
					<?php if(in_array('EmployeesEditing', $this->session->userdata('Permissions')) || in_array('EmployeesHiring', $this->session->userdata('Permissions'))): ?>
					<button id="<?php echo $ApplicantID; ?>" data-dismiss="modal" type="button" class="btn btn-primary mr-auto ExtendButton" data-toggle="modal" data-target="#ExtendContractModal"><i class="fas fa-plus"></i> Extend Contract</button>
					<?php endif; ?>
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
					<h4 class="modal-title">Previous Contract Report for <?=$LastName?>, <?=$FirstName?> <?=$MiddleName?>.</h4>
					<div class="text-right">
						<button onClick="printContent('PrintOutModalExpired')" type="button" class="btn btn-primary mr-auto"><i class="fas fa-print"></i> Print</button>
						<button type="button" class="close d-none d-sm-block" data-dismiss="modal">&times;</button>
					</div>
				</div>

				<!-- Modal body -->
				<div class="modal-body">
					<div class="row rcontent">
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
		<!-- CONTRACT HISTORY MODAL -->
		<?php $this->load->view('_template/modals/m_contracthistory'); ?>
		<?php if($Status == 'Employed' || $Status == 'Employed (Permanent)'): ?>
			<!-- EXTEND CONTRACT MODAL -->
			<?php $this->load->view('_template/modals/m_extendcontract'); ?>
			<!-- SET A REMINDER MODAL -->
			<?php $this->load->view('_template/modals/m_setreminder'); ?>
			<!-- DOCUMENT MODAL -->
			<?php $this->load->view('_template/modals/m_documents'); ?>
			<!-- DOCUMENTS NOTE MODAL -->
			<?php $this->load->view('_template/modals/m_addnote_documents'); ?>
			<!-- ADD DOCUMENTS MODAL -->
			<?php $this->load->view('_template/modals/m_adddocuments'); ?>
			<!-- GENERATE ID CARD MODAL -->
			<?php $this->load->view('_template/modals/m_generateid'); ?>
			<!-- SUSPEND MODAL -->
			<?php $this->load->view('_template/modals/m_suspend'); ?>
			<!-- MODIFY CONTRACT MODAL -->
			<?php $this->load->view('_template/modals/m_modifycontract'); ?>
		<?php else: ?>
			<!-- CLIENT HIRE MODAL -->
			<?php $this->load->view('_template/modals/m_clienthire'); ?>
		<?php endif; ?>
		<?php $this->load->view('_template/modals/m_p_loans'); ?>
	</body>
	<?php $this->load->view('_template/users/u_scripts');?>
	<script type="text/javascript">
		$(document).ready(function () {
			<?php if ($Status == 'Employed' || $Status == 'Employed (Permanent)'): ?>
			// Initialization
			function updateCalculation() {
				$('.payroll-net-pay').each(function() {
					// $(this).parents('.payroll-week-row').find('.payroll-net-pay').html('<i class="spinner-border spinner-border-sm"></i>');
					// Essential identifiers
					let ApplicantID = $(this).parents('.payroll-week-row').find('.loans-btn').data('applicantid');
					let Year = $(this).parents('.payroll-week-row').find('.loans-btn').data('year');
					let Month = $(this).parents('.payroll-week-row').find('.loans-btn').data('month');
					let Week = $(this).parents('.payroll-week-row').find('.loans-btn').data('week');

					// Calculation
					let GrossPay = parseInt($(this).parents('.payroll-week-row').find('.payroll-grosspay').text());
					let PhilHealth = parseInt($(this).parents('.payroll-week-row').find('.payroll-philhealth').text());
					let HDMF = parseInt($(this).parents('.payroll-week-row').find('.payroll-hdmf').text());
					let Tax = parseInt($(this).parents('.payroll-week-row').find('.payroll-tax').text());
					let SSSToBePaid = parseInt($(this).parents('.payroll-week-row').find('.payroll-tobepaid').text());
					// let SSSPaidThisWeek = $(this).parents('.payroll-week-row').find('.payroll-paidthisweek').val();
					let LoansTotal = $(this).parents('.payroll-week-row').find('.loans-btn').data('loanstotal');

					if (SSSToBePaid < 0) {
						SSSToBePaid = 0;
					}
					if (LoansTotal < 0 || LoansTotal == null) {
						LoansTotal = 0;
					}

					let NetPay = GrossPay - (PhilHealth + HDMF + Tax + LoansTotal + SSSToBePaid);

					if (NetPay < 0) {
						NetPay = 0;
					}

					$(this).parents('.payroll-week-row').find('.payroll-net-pay').text(NetPay);
					console.log('==============================');
					// console.log('ApplicantID: ' + ApplicantID);
					// console.log('GrossPay: ' + GrossPay);
					// console.log('PhilHealth: ' + PhilHealth);
					// console.log('HDMF: ' + HDMF);
					// console.log('Tax: ' + Tax);
					// console.log('LoansTotal: ' + LoansTotal);
					console.log('SSSToBePaid: ' + SSSToBePaid);
					// console.log('SSSPaidThisWeek: ' + SSSPaidThisWeek);
					console.log('Updated payroll calculations: ' + NetPay);
				})
			}
			updateCalculation();
			// =================
			$('.year-select').on('change', function() {
				history.pushState(null, null, '<?php echo base_url() . 'Payrollss?id=' . $ApplicantID ?>');
			});
			// Loan remove
			var LoansArray = [];
			$('body').on('click', '.loan-remove', function () { // Using body for dynamic appends.
				$(this).parents('.loan-input').toggleClass('row-transparent');
				LoanID = $(this).closest('.loan-input').find('.loan-id').val();
				$(this).toggleClass('btn-secondary btn-danger');
				if ($(this).hasClass('btn-danger')) {
					// Add to array
					LoansArray.push(LoanID);
				} else {
					// Remove from array
					let index = LoansArray.indexOf(LoanID); // Search in array
					if (index > -1) {
						LoansArray.splice(index, 1);
					}
				}
				console.log(LoansArray);
			});
			$("#ModalLoans").on("hidden.bs.modal", function () { // Resets modal on close
				$('#NewLoanContainer').empty();
				$('.new-loan-row').hide();
				updateCalculation();
			});
			var AJAX_onCall = false; <?php // Prevents repeated button mashing. ?>
			var Mode = <?php echo $Mode; ?>;
			$('.save-loan-btn').on('click', function () {
				if (AJAX_onCall == false) {
					$(this).find('i').removeClass('fas');
					$(this).find('i').removeClass('fa-check');
					$(this).removeClass('btn-success');
					$(this).addClass('btn-secondary');
					$(this).find('i').addClass('spinner-border');
					$(this).find('i').addClass('spinner-border-sm');
					$('.loan-input > div').children().prop('readonly', true);
					$('.loan-input > div').children().css('opacity', '0.5');
					AJAX_onCall = true;
					// AJAX Call
					let ApplicantID = $('#LoansApplicantID').text();
					let Year = $('#LoansYear').val();
					let Month = $('#LoansMonth').val();
					let Week = $('#LoansWeek').val();
					if (LoansArray.length > 0) {
						$.ajax({
							url : "<?php echo base_url() . 'AJAX_removePayrollLoans';?>",
							method : "POST",
							data: {LoansArray: JSON.stringify(LoansArray), ApplicantID: ApplicantID, Year: Year, Month: Month, Week: Week, Mode: Mode},
							dataType: "html",
							success: function(data){
								console.log('success');
								// $("body").html(data);

							}
						})
					}
					$('.loan-input').each(function() {
						let LoanName = $(this).find(".loan-name").val();
						let Amount = $(this).find(".loan-amount").val();
						let ID = $(this).find(".loan-id").val();
						// console.log(ApplicantID);
						// console.log(LoanName);
						// console.log(Amount);
						// console.log(ID);
						let totalCounter = 0;
						$.ajax({
							url : "<?php echo base_url() . 'AJAX_insertPayrollLoans';?>",
							method : "POST",
							data: {ID: ID, ApplicantID: ApplicantID, LoanName: LoanName, Amount: Amount, Year: Year, Month: Month, Week: Week, Mode: Mode},
							dataType: "html",
							success: function(data){
								console.log('success');
								console.log(ApplicantID);
								console.log(Year);
								console.log(Month);
								console.log(Week);
								$("#LoadLoanContainer").html(data);
								$('.save-loan-btn').closest('.save-loan-btn').find('i').addClass('fas');
								$('.save-loan-btn').closest('.save-loan-btn').find('i').addClass('fa-check');
								$('.save-loan-btn').closest('.save-loan-btn').addClass('btn-success');
								$('.save-loan-btn').closest('.save-loan-btn').removeClass('btn-secondary');
								$('.save-loan-btn').closest('.save-loan-btn').find('i').removeClass('spinner-border');
								$('.save-loan-btn').closest('.save-loan-btn').find('i').removeClass('spinner-border-sm');
								$('.new-loan-row').hide();
								$('#NewLoanContainer').children().empty();
								$('.loan-input').each(function() {
									totalCounter = totalCounter + parseFloat($(this).find('.loan-amount').val());
									console.log(totalCounter);
									$('.loans-btn[data-applicantid=' + ApplicantID + '][data-year=' + Year + '][data-month=' + Month + '][data-week=' + Week + ']').data('loanstotal', totalCounter);
								})
								AJAX_onCall = false;
								updateCalculation();
							}
						})
					})
				}
			});
			$('.new-loan-add-btn').on('click', function () {
				$('.new-loan-row').show();
				$('.new-loan-row').animate({opacity: '1.0'});
				$('#NewLoanContainer').append('<div class="form-row loan-input w-100"><input class="form-control loan-id" type="hidden" value="-1"><div class="col-sm-7 mt-1"><input class="form-control loan-name" type="text" name="LoanName[]"></div><div class="col-sm-4 mt-1"><input class="form-control loan-amount" type="number" name="LoanAmount[]"></div><div class="col-sm-1 mt-1"><button class="form-control loan-discard btn-danger" type="button" data-toggle="tooltip" data-placement="top" data-html="true" title="Discard?"><i class="fas fa-times" style="font-size: 12px; margin-left: -4px;"></i></button></div></div>')
			});
			$('.loans-btn').on('click', function () {
				$('#LoansApplicantID').text($(this).data('applicantid'));
				$('#LoansApplicantName').text($(this).data('applicantname'));
				let ApplicantURL = "ViewEmployee?id=" + $(this).data('applicantid');
				$('#LoansApplicantName').attr('href', ApplicantURL);
				$('#LoansYear').val($(this).data('year'));
				$('#LoansMonth').val($(this).data('month'));
				$('#LoansWeek').val($(this).data('week'));
				// AJAX Call
				let ApplicantID = $('#LoansApplicantID').text();
				let Year = $('#LoansYear').val();
				let Month = $('#LoansMonth').val();
				let Week = $('#LoansWeek').val();
				let totalCounter = 0;
				$.ajax({
					url : "<?php echo base_url() . 'AJAX_showPayrollLoans';?>",
					method : "POST",
					data: {ApplicantID: ApplicantID, Year: Year, Month: Month, Week: Week, Mode: Mode},
					dataType: "html",
					success: function(response){
						$("#LoadLoanContainer").html(response);
						$('.ajax-load-container').show();
						$('.loan-input').each(function() {
							totalCounter = totalCounter + parseFloat($(this).find('.loan-amount').val());
							$('#LoanTotal').text(totalCounter);
						})
				}

				});
				updateCalculation();
			});
			// Loan discard
			$('body').on('click', '.loan-discard', function () { // Using body for dynamic appends.
				$(this).parents('.loan-input').remove();
				if ($('#NewLoanContainer > div').length <= 0) {
					$('.new-loan-row').fadeOut('fast');
				}
			});
			$(".payroll-weekrow-input").bind("input", function () {
				if ($(this).val()) {
					$(this).closest(".payroll-week-row").find('.payroll-weekrow-btn').show();
				} else {
					$(this).closest(".payroll-week-row").find('.payroll-weekrow-btn').hide();
				}
	    	 });
			$('.payroll-weekrow-btn').click(function(){
				let ptwInput = $(this).closest(".payroll-week-row").find('.payroll-weekrow-input').val();
				let ptwApplicantID = $(this).data('payroll-weekrow-applicantid');
				let ptwClientID = $(this).data('payroll-weekrow-clientid');
				let ptwYear = $(this).data('payroll-weekrow-year');
				let ptwMonth = $(this).data('payroll-weekrow-month');
				let ptwWeek = $(this).data('payroll-weekrow-week');

				$.ajax({
					url : "<?php echo base_url() . 'AJAX_updateSSSToBePaid';?>",
					method : "POST",
					data : {Input: ptwInput, ApplicantID: ptwApplicantID, ClientID: ptwClientID, Year: ptwYear, Month: ptwMonth, Week: ptwWeek},
					success: function(data){
						location.reload();
					}

				});
			});
			<?php endif; ?>
			$('.modify-contract-reset-btn').on('click', function () {
				$('#AddNote_ApplicantID').val($(this).attr('applicant-id'));
			});
			<?php if ($Status == 'Employed') { ?>
				$(".nav-item a[href*='Employee']").addClass("nactive");
			<?php } else { ?>
				$(".nav-item a[href*='Applicants']").addClass("nactive");
			<?php } ?>
			<?php if (isset($_GET['v_client'])): ?>
				$('#EmpContractHistory').modal('show');
			<?php endif; ?>
			$("#EmpContractHistory").on("hidden.bs.modal", function () { // Change URL on modal close
			    history.pushState(null, null, '<?php echo base_url() . 'ViewEmployee?id=' . $ApplicantID ?>');
			});
			// $('.age-container').text('123');
			$('[data-toggle="tooltip"]').tooltip();
			$('#ClientSelect').on('change', function() {
				<?php foreach ($getClientOption->result_array() as $row):
				// Count how many employees are on the client
				$CountEmployees = $this->Model_Selects->GetClientsEmployed($row['ClientID'])->num_rows();
				$CountEmployees++;
				$CountEmployees = str_pad($CountEmployees,4,0,STR_PAD_LEFT);
				// Get the current year
				$Year = date('Y');
				$Year = substr($Year, 2);
				// Concatenate them all together
				$EmployeeID = 'WC' . $row['EmployeeIDSuffix'] . '-' . $CountEmployees . '-' . $Year;
				?>
				if ($(this).val() == '<?php echo $row['ClientID']; ?>') {
					$(this).closest('#ClientModal').find('#EmployeeID').val('<?php echo $EmployeeID; ?>');
				}
				<?php endforeach; ?>
			});
			$("#Type").change(function(){
				$('#ViolationNotice').hide();
				$('#BlacklistNotice').hide();
				if ( $(this).val() == "Violation" ) { 
					$("#ViolationNotice").fadeIn();
			    }
			    if ( $(this).val() == "Blacklist" ) { 
					$("#BlacklistNotice").fadeIn();
			    }
			});
			$('.doc_btn').on('click', function () {
				$('#Pass_ID').val($(this).attr('id'));
			});
			$('.employee-tabs-select').removeClass('employee-tabs-active');
			$('.employee-tabs-group-content').hide();
			var hashValue = window.location.hash.substr(1);
			if (hashValue == 'Personal') {
				$('#TabPersonal').children('.employee-tabs-group-content').show();
				$('#TabPersonalBtn').addClass('employee-tabs-active');
			}
			else if (hashValue == 'Contract') {
				$('#TabContract').children('.employee-tabs-group-content').show();
				$('#TabContractBtn').addClass('employee-tabs-active');
			}
			else if (hashValue == 'Documents') {
				$('#TabDocuments').children('.employee-tabs-group-content').show();
				$('#TabDocumentsBtn').addClass('employee-tabs-active');
			}
			else if (hashValue == 'Violations') {
				$('#TabDocuments').children('.employee-tabs-group-content').show();
				$('#TabDocumentsBtn').addClass('employee-tabs-active');
				$('#FolderViolationsIcon').children('i').toggleClass('fa-folder');
				$('#FolderViolationsIcon').children('i').toggleClass('fa-folder-open');
				$('#FolderDocumentsIcon').children('i').toggleClass('fa-folder');
				$('#FolderDocumentsIcon').children('i').toggleClass('fa-folder-open');
				$('#FolderViolations').closest('.row').find('.folder-documents').toggleClass('folder-active');
				$('#FolderDocuments').closest('.row').find('.folder-documents').toggleClass('folder-active');
			}
			else if (hashValue == 'Academic') {
				$('#TabAcademic').children('.employee-tabs-group-content').show();
				$('#TabAcademicBtn').addClass('employee-tabs-active');
			}
			else if (hashValue == 'Employments') {
				$('#TabEmployments').children('.employee-tabs-group-content').show();
				$('#TabEmploymentsBtn').addClass('employee-tabs-active');
			}
			else if (hashValue == 'Machine') {
				$('#TabMachine').children('.employee-tabs-group-content').show();
				$('#TabMachineBtn').addClass('employee-tabs-active');
			} else {
				$('#TabPersonal').children('.employee-tabs-group-content').show();
				$('#TabPersonalBtn').addClass('employee-tabs-active');
			}
			$(window).on('hashchange',function(){ 
				$('.employee-tabs-select').removeClass('employee-tabs-active');
				$('.employee-tabs-group-content').hide();
				var hashValue = window.location.hash.substr(1);
				if (hashValue == 'Personal') {
					$('#TabPersonal').children('.employee-tabs-group-content').show();
					$('#TabPersonalBtn').addClass('employee-tabs-active');
				}
				else if (hashValue == 'Contract') {
					$('#TabContract').children('.employee-tabs-group-content').show();
					$('#TabContractBtn').addClass('employee-tabs-active');
				}
				else if (hashValue == 'Documents') {
					$('#TabDocuments').children('.employee-tabs-group-content').show();
					$('#TabDocumentsBtn').addClass('employee-tabs-active');
				}
				else if (hashValue == 'Violations') {
					$('#TabDocuments').children('.employee-tabs-group-content').show();
					$('#TabDocumentsBtn').addClass('employee-tabs-active');
					$('#FolderViolationsIcon').children('i').toggleClass('fa-folder');
					$('#FolderViolationsIcon').children('i').toggleClass('fa-folder-open');
					$('#FolderDocumentsIcon').children('i').toggleClass('fa-folder');
					$('#FolderDocumentsIcon').children('i').toggleClass('fa-folder-open');
					$('#FolderViolations').closest('.row').find('.folder-documents').toggleClass('folder-active');
					$('#FolderDocuments').closest('.row').find('.folder-documents').toggleClass('folder-active');
				}
				else if (hashValue == 'Academic') {
					$('#TabAcademic').children('.employee-tabs-group-content').show();
					$('#TabAcademicBtn').addClass('employee-tabs-active');
				}
				else if (hashValue == 'Employments') {
					$('#TabEmployments').children('.employee-tabs-group-content').show();
					$('#TabEmploymentsBtn').addClass('employee-tabs-active');
				}
				else if (hashValue == 'Machine') {
					$('#TabMachine').children('.employee-tabs-group-content').show();
					$('#TabMachineBtn').addClass('employee-tabs-active');
				} else {
					$('#TabPersonal').children('.employee-tabs-group-content').show();
					$('#TabPersonalBtn').addClass('employee-tabs-active');
				}
			});
			$('#AddNoteBtn').on('click', function () {
				$('#AddNote_ApplicantID').val($(this).attr('applicant-id'));
			});
			$('.folder-button').on('click', function () {
				$(this).children('i').toggleClass('fa-folder');
				$(this).children('i').toggleClass('fa-folder-open');
				$(this).closest('.row').find('.folder-documents').toggleClass('folder-active');
			});
			// $('.employee-tabs-select').on('click', function () {
			// 	$('.employee-tabs-select').removeClass('employee-tabs-active');
			// 	$(this).addClass('employee-tabs-active');
			// 	$('.employee-tabs-group-content').hide();
			// });
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
			$('.ModalHire').on('click', function () {
				$('#idToHire').val($(this).attr('id'));
				console.log($('#idToHire').val());
			});
			$('.ExtendButton').on('click', function () {
				$('#ExtendID').val($(this).attr('id'));
				console.log($('#ExtendID').val());
				console.log($('#ExtendDate').val());
			});
			$('.SuspendButton').on('click', function () {
				$('#SuspendID').val($(this).attr('id'));
				console.log($('#SuspendID').val());
			});
			$('.ReminderButton').on('click', function () {
				$('#ReminderID').val($(this).attr('id'));
				console.log($('#ReminderID').val());
			});
			$('#ListContractHistory').DataTable();
			$('#ListViolations').DataTable();
			// Contract Bar
			var rPercentage = $("#TimeLeft").val();
			var SuspensionPercentage = $("#SuspensionTimeLeft").val();
			// if (rPercentage > 100) {
			// 	rPercentage = 100;
			// }
			$('.progressRemaining').animate({width:rPercentage + "%"},500);
			$('.SuspensionRemaining').animate({width:SuspensionPercentage + "%"},500);
			$('.progress_value').text(rPercentage + "%");
			$('.SuspensionValue').text(SuspensionPercentage + "%");
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
		.archived-notice {
			border-radius: 6px;
			background-color: rgba(0, 0, 0, 0.08);
		}
	</style>
	<textarea id="text" style="display: none;"></textarea>
	</html>