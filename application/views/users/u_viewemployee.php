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
	// $cTotalMonths = $cEnds->diff($cStarts)->format('%m');
	$cDiff = $cEnds->diff($cStarts);
	if ($cDiff->m > 1) {
		$cTotalMonths = ($cDiff->y * 12) + ($cDiff->m) + ($cDiff->d / 30);
	} else {
		$cTotalMonths = (($cDiff->y) * 12) + ($cDiff->m);
	}
	$cDiffDays = $cEnds->diff($cStarts)->format('%a');
	if ($cDiffDays > 1) {
		$isThirteenEligible = true;
	} else {
		$isThirteenEligible = false;
	}
	// if ($cTotalMonths == 0) {
	// 	$cTotalMonths = 1;
	// }
	if ($Status == 'Employed') {
		$salaryMonthly = $SalaryExpected / $cTotalMonths;
	} else {
		$salaryMonthly = $SalaryExpected / 12;
	}
	// if ($SalaryExpected != NULL && $cTotalMonths > 0) {
	// 	if ($cTotalMonths < 12) {
	// 		$salaryMonthly = $SalaryExpected / $cTotalMonths;
	// 	} else {
	// 		$salaryMonthly = $SalaryExpected / 12;
	// 	}
	// } else {
	// 	$salaryMonthly = 0;
	// }
	$thirteen = (($salaryMonthly * $cElapsed) / 30) / 12;

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

}
//Calculate Age
$pBirthdate = new DateTime($BirthDate);
$pAge = $currentDate->diff($pBirthdate)->format('%y');

?>
<body>
<style>
	.rounded-circle {
		border: 4px solid white;
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
										<li id="TabEditBtn"><a href="<?=base_url()?>ModifyEmployee?id=<?=$ApplicantID?>" onclick="" target="_blank" type="button" data-toggle="tooltip" data-placement="top" data-html="true" title="Edit" style="color: gold;"><i class="fas fa-edit" style="margin-right: -1px;"></i></a></li>
									</ul>
								</div>
								<div class="col-2 mb-5 employee-image">
									<img class="rounded-circle" src="<?php echo $ApplicantImage; ?>">
								</div>
							</div>
							<div class="row w-100 rcontent employee-content">
								<div class="col-2 employee-static mt-5 d-none d-sm-block">
									<div class="col-sm-12">
										<?php echo $LastName; ?>, <?php echo $FirstName; ?>  <?php echo $MiddleInitial; ?>.<?php if ($NameExtension != NULL): echo ', ' . $NameExtension; endif; ?>
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
											<div class="col-sm-12 col-mb-12 pb-2" style="min-width: 125px;">
												<a href="<?=base_url()?>RestoreEmployee?id=<?php echo $ApplicantID; ?>" class="btn btn-success"><i class="fas fa-redo"></i> Restore</a>
											</div>
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
											<div class="col-sm-12 col-mb-12 pb-2" style="min-width: 125px;">
												<a href="<?=base_url()?>RestoreEmployee?id=<?php echo $ApplicantID; ?>" class="btn btn-success"><i class="fas fa-redo"></i> Restore</a>
											</div>
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
													<button id="<?php echo $ApplicantID; ?>" data-dismiss="modal" type="button" class="btn btn-primary btn-sm ExtendButton mr-1" data-toggle="modal" data-target="#ModifyContractModal"><i class="fas fa-edit"></i> Modify Contract</button>
													<button id="<?php echo $ApplicantID; ?>" data-dismiss="modal" type="button" class="btn btn-info btn-sm ExtendButton mr-1" data-toggle="modal" data-target="#ExtendContractModal"><i class="fas fa-plus"></i> Extend Contract</button>
													<button class="btn btn-info btn-sm" data-toggle="modal" data-target="#EmpContractHistory"><i class="fas fa-book"></i> Contract History</button>
													<div class="ml-auto">
														<button id="<?php echo $ApplicantID; ?>" class="btn btn-danger btn-sm SuspendButton" data-toggle="modal" data-target="#SuspendModal" type="button"><i class="fas fa-exclamation-triangle"></i> Suspend</button>
													</div>
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
																		<b>Monthly Salary</b>
																	</div>
																	<div class="col-sm-12">
																		<?php echo '<span style="user-select: none;">₱ </span>' . round($salaryMonthly, 2); ?>
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
											</div>
											<?php elseif ($Status == 'Employed (Permanent)'): ?>
											<div class="employee-content-header">
												<div class="ml-1 row">
													<button id="<?php echo $ApplicantID; ?>" data-dismiss="modal" type="button" class="btn btn-primary btn-sm ExtendButton mr-1" data-toggle="modal" data-target="#ModifyContractModal"><i class="fas fa-edit"></i> Modify Contract</button>
													<button class="btn btn-info btn-sm" data-toggle="modal" data-target="#EmpContractHistory"><i class="fas fa-book"></i> Contract History</button>
													<div class="ml-auto">
														<button id="<?php echo $ApplicantID; ?>" class="btn btn-danger btn-sm SuspendButton" data-toggle="modal" data-target="#SuspendModal" type="button"><i class="fas fa-exclamation-triangle"></i> Suspend</button>
													</div>
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
												<button id="<?php echo $ApplicantID; ?>" data-dismiss="modal" type="button" class="btn btn-primary btn-sm mr-auto ModalHire" data-toggle="modal" data-target="#hirthis"><i class="fas fa-plus"></i> New Contract</button>
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
												<button id="<?php echo $ApplicantID; ?>" class="btn btn-primary btn-sm doc_btn" data-toggle="modal" data-target="#AddSuppDoc"><i class="fas fa-file-upload"></i> Upload Documents</button>
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
																				<br>
																				<a href="ModifyEmployee?id=<?php echo $ApplicantID; ?>#Academic_History" class="btn btn-sm btn-primary mt-2"><i class="fas fa-plus"></i> Add Data</a>
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
																				<br>
																				<a href="ModifyEmployee?id=<?php echo $ApplicantID; ?>#Employment_Record" class="btn btn-sm btn-primary mt-2"><i class="fas fa-plus"></i> Add Data</a>
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
																				<br>
																				<a href="ModifyEmployee?id=<?php echo $ApplicantID; ?>#Machine_Operated" class="btn btn-sm btn-primary mt-2"><i class="fas fa-plus"></i> Add Data</a>
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
					<h4 class="modal-title">Contract Report for <?=$LastName?>, <?=$FirstName?> <?=$MiddleInitial?>.</h4>
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
					<h4 class="modal-title">Previous Contract Report for <?=$LastName?>, <?=$FirstName?> <?=$MiddleInitial?>.</h4>
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
	</body>
	<?php $this->load->view('_template/users/u_scripts');?>
	<script type="text/javascript">
		$(document).ready(function () {
			<?php if ($Status == 'Employed'): ?>
				var defaultEmployeeID = '<?php echo $EmployeeID; ?>';
				var defaultClientID = <?php echo $ClientEmployed; ?>;
				var defaultSalary = <?php echo $SalaryExpected; ?>;
				var defaultdsText = <?php echo $dsText; ?>;
				var defaultdsH = <?php echo $dsH; ?>;
				var defaultdsi = <?php echo $dsi; ?>;
				var defaultdss = <?php echo $dss; ?>;
				var defaultdsType = '<?php echo $dsType; ?>';
				var defaultdeText = <?php echo $deText; ?>;
				var defaultdeH = <?php echo $deH; ?>;
				var defaultdei = <?php echo $dei; ?>;
				var defaultdes = <?php echo $des; ?>;
				var defaultdeType = '<?php echo $deType; ?>';
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
			$('.progressRemaining').animate({width:rPercentage + "%"},1500);
			$('.SuspensionRemaining').animate({width:SuspensionPercentage + "%"},1500);
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