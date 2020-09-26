<?php
if ($ApplicantNo == NULL) {
	$ApplicantNo = '&nbsp;';
}
if ($ApplicantImage == NULL) {
	$ApplicantImage = '&nbsp;';
}
if ($EmployeeID == NULL) {
	$EmployeeID = '&nbsp;';
}
if ($ApplicantID == NULL) {
	$ApplicantID = '&nbsp;';
}
if ($PositionDesired == NULL) {
	$PositionDesired = '&nbsp;';
}
if ($PositionGroup == NULL) {
	$PositionGroup = '&nbsp;';
}
if ($SalaryExpected == NULL) {
	$SalaryExpected = '&nbsp;';
}
if ($LastName == NULL) {
	$LastName = '&nbsp;';
}
if ($FirstName == NULL) {
	$FirstName = '&nbsp;';
}
if ($MiddleInitial == NULL) {
	$MiddleInitial = '&nbsp;';
}
if ($Gender == NULL) {
	$Gender = '&nbsp;';
}
if ($Age == NULL) {
	$Age = '&nbsp;';
}
if ($Height == NULL) {
	$Height = '&nbsp;';
}
if ($Weight == NULL) {
	$Weight = '&nbsp;';
}
if ($Religion == NULL) {
	$Religion = '&nbsp;';
}
if ($BirthDate == NULL) {
	$BirthDate = '&nbsp;';
}
if ($BirthPlace == NULL) {
	$BirthPlace = '&nbsp;';
}
if ($Citizenship == NULL) {
	$Citizenship = '&nbsp;';
}
if ($CivilStatus == NULL) {
	$CivilStatus = '&nbsp;';
}
if ($No_OfChildren == NULL) {
	$No_OfChildren = '&nbsp;';
}
if ($Phone_No == NULL) {
	$Phone_No = '&nbsp;';
}
if ($Address_Present == NULL) {
	$Address_Present = '&nbsp;';
}
if ($Address_Provincial == NULL) {
	$Address_Provincial = '&nbsp;';
}
if ($Address_Manila == NULL) {
	$Address_Manila = '&nbsp;';
}
if ($SSS_No == NULL) {
	$SSS_No = '&nbsp;';
}
if ($EffectiveDateCoverage == NULL) {
	$EffectiveDateCoverage = '&nbsp;';
}
if ($ResidenceCertificateNo == NULL) {
	$ResidenceCertificateNo = '&nbsp;';
}
if ($Rcn_At == NULL) {
	$Rcn_At = '&nbsp;';
}
if ($Rcn_On == NULL) {
	$Rcn_On = '&nbsp;';
}
if ($TIN == NULL) {
	$TIN = '&nbsp;';
}
if ($TIN_At == NULL) {
	$TIN_At = '&nbsp;';
}
if ($TIN_On == NULL) {
	$TIN_On = '&nbsp;';
}
if ($HDMF == NULL) {
	$HDMF = '&nbsp;';
}
if ($HDMF_At == NULL) {
	$HDMF_At = '&nbsp;';
}
if ($HDMF_On == NULL) {
	$HDMF_On = '&nbsp;';
}
if ($PhilHealth == NULL) {
	$PhilHealth = '&nbsp;';
}
if ($PhilHealth_At == NULL) {
	$PhilHealth_At = '&nbsp;';
}
if ($PhilHealth_On == NULL) {
	$PhilHealth_On = '&nbsp;';
}
if ($ATM_No == NULL) {
	$ATM_No = '&nbsp;';
}
if ($Status == NULL) {
	$Status = '&nbsp;';
}
if ($ClientEmployed == NULL) {
	$ClientEployed = '&nbsp;';
}
// if ($AppliedOn == NULL) {
// 	$AppliedOn = '&nbsp;';
// }
// if ($SuspensionStarted == NULL) {
// 	$SuspensionStarted = '&nbsp;';
// }
// if ($SuspensionEnds == NULL) {
// 	$SuspensionEnds = '&nbsp;';
// }
// if ($SuspensionRemarks == NULL) {
// 	$SuspensionRemarks = '&nbsp;';
// }
// if ($Suspended == NULL) {
// 	$Suspended = '&nbsp;';
// }
// if ($ReminderDate == NULL) {
// 	$ReminderDate = '&nbsp;';
// }
// if ($ReminderDateString == NULL) {
// 	$ReminderDateString = '&nbsp;';
// }
if ($NameExtension == NULL) {
	$NameExtension = '&nbsp;';
}
if ($EmergencyPerson == NULL) {
	$EmergencyPerson = '&nbsp;';
}
if ($EmergencyContact == NULL) {
	$EmergencyContact = '&nbsp;';
}
if ($Referral == NULL) {
	$Referral = '&nbsp;';
}
?>
<style>
	html,body
	{
		background-color: #FFFFFF;
	}
</style>
<body>
	<div class="wrapper">
		<?php $this->load->view('_template/users/u_sidebar'); ?>
		<div id="content" class="ncontent">
			<div class="container-fluid">
				<?php $this->load->view('_template/users/u_notifications'); ?>
				<?php if(!isset($_GET['mode'])): ?>
					<div class="row m-5 p-2 eprint-commandcard">
						<div class="col-sm-12 eprint-commandcard-title">
							<i class="fas fa-cog"></i> <b>Command Card</b>
						</div>
						<?php echo $this->session->flashdata('prompts'); ?>
						<div class="col-sm-6 mt-4 eprint-commandcard-text">
							<b>GENERAL FILTERS</b>
							<div class="row">
								<div class="col-sm-6">
									<div class="col-sm-12">
										<div class="row">
											<div class="col-sm-3">
												<?php if($GetAcadHistory->num_rows() > 0): ?>
													<button id="ToggleAcademic" type="button" class="general-filters-btn btn btn-success"><i class="fas fa-check wercher-visible" style="margin-right: -1px;"></i></button>
												<?php else: ?>
													<button id="ToggleAcademic" type="button" class="general-filters-btn btn btn-secondary"><i class="fas fa-check wercher-transparent" style="margin-right: -1px;"></i></button>
												<?php endif; ?>
											</div>
											<div class="col-sm-9" style="margin-left: -15px; margin-top: 5px;">
												Academic&nbsp;History
											</div>
										</div>
									</div>
									<div class="col-sm-12 mt-1">
										<div class="row">
											<div class="col-sm-3">
												<?php if($employment_record->num_rows() > 0): ?>
													<button id="ToggleEmployment" type="button" class="general-filters-btn btn btn-success"><i class="fas fa-check wercher-visible" style="margin-right: -1px;"></i></button>
												<?php else: ?>
													<button id="ToggleEmployment" type="button" class="general-filters-btn btn btn-secondary"><i class="fas fa-check wercher-transparent" style="margin-right: -1px;"></i></button>
												<?php endif; ?>
											</div>
											<div class="col-sm-9" style="margin-left: -15px; margin-top: 5px;">
												Employment&nbsp;Records
											</div>
										</div>
									</div>
									<div class="col-sm-12 mt-1">
										<div class="row">
											<div class="col-sm-3">
												<?php if($Machine_Operatessss->num_rows() > 0): ?>
													<button id="ToggleMachine" type="button" class="general-filters-btn btn btn-success"><i class="fas fa-check wercher-visible" style="margin-right: -1px;"></i></button>
												<?php else: ?>
													<button id="ToggleMachine" type="button" class="general-filters-btn btn btn-secondary"><i class="fas fa-check wercher-transparent" style="margin-right: -1px;"></i></button>
												<?php endif; ?>
											</div>
											<div class="col-sm-9" style="margin-left: -15px; margin-top: 5px;">
												Machine&nbsp;Operated
											</div>
										</div>
									</div>
									<div class="col-sm-12 mt-1">
										<div class="row">
											<div class="col-sm-3">
												<button id="ToggleContract" type="button" class="general-filters-btn btn btn-secondary"><i class="fas fa-check wercher-transparent" style="margin-right: -1px;"></i></button>
											</div>
											<div class="col-sm-9" style="margin-left: -15px; margin-top: 5px;">
												Contract
											</div>
										</div>
									</div>
									<div class="col-sm-12 mt-1">
										<div class="row">
											<div class="col-sm-3">
												<button id="ToggleHistory" type="button" class="general-filters-btn btn btn-secondary"><i class="fas fa-check wercher-transparent" style="margin-right: -1px;"></i></button>
											</div>
											<div class="col-sm-9" style="margin-left: -15px; margin-top: 5px;">
												Contract&nbsp;History
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-6">
									<div class="col-sm-12">
										<div class="row">
											<div class="col-sm-3">
												<button id="TogglePhoto" type="button" class="general-filters-btn btn btn-success"><i class="fas fa-check wercher-visible" style="margin-right: -1px;"></i></button>
											</div>
											<div class="col-sm-9" style="margin-left: -15px; margin-top: 5px;">
												Employee's&nbsp;Photo
											</div>
										</div>
									</div>
									<div class="col-sm-12 mt-1">
										<div class="row">
											<div class="col-sm-3">
												<button id="TogglePersonalInformation" type="button" class="general-filters-btn btn btn-success"><i class="fas fa-check wercher-visible" style="margin-right: -1px;"></i></button>
											</div>
											<div class="col-sm-9" style="margin-left: -15px; margin-top: 5px;">
												Personal&nbsp;Information
											</div>
										</div>
									</div>
									<div class="col-sm-12 mt-1">
										<div class="row">
											<div class="col-sm-3">
												<button id="ToggleWorkInformation" type="button" class="general-filters-btn btn btn-success"><i class="fas fa-check wercher-visible" style="margin-right: -1px;"></i></button>
											</div>
											<div class="col-sm-9" style="margin-left: -15px; margin-top: 5px;">
												Work&nbsp;Information
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-6">
									<hr>
									<div class="col-sm-12 mt-1">
										<div class="row">
											<div class="col-sm-3">
												Opacity:
											</div>
											<div class="col-sm-9" style="margin-left: -15px; margin-top: 5px;">
												<input id="Opacity" type="range" min="1" max="100" value="100">
											</div>
										</div>
									</div>
									<div class="col-sm-12 mt-2">
										<div class="row">
											<div class="col-sm-3">
												Color:
											</div>
											<div class="col-sm-9" style="margin-left: -15px; margin-top: 5px;">
												<input id="Color" type="range" min="1" max="100" value="100">
											</div>
										</div>
									</div>
								</div>
							</div>
							<hr>
							<!-- <ul>
								<li>Academic History, Employment Records, and Machine Operated will be hidden on print if there is no data.</li>
								<li>You can modify the size of the Employee's photo by clicking the buttons on the right.</li>
								<li>Clicking Print will prompt the browser to prepare the page to be printed. It will not print until you confirm it through the prompt.</li>
							</ul> -->
							<div class="row mt-2">
								<div class="col-sm-12">
									<button type="button" class="btn btn-success eprint-print-btn" onClick="printContent('PrintOut')" style="width: 400px;"><i class="fas fa-print"></i> Print</button>
									<a href="<?=base_url();?>ModifyEmployee?id=<?=$ApplicantID;?>" class="btn btn-primary eprint-print-btn"><i class="fas fa-edit"></i> Edit</a>
								</div>
							</div>
						</div>
						<div class="col-sm-6 mt-4 eprint-commandcard-text">
							<b>EMPLOYEE'S PHOTO SIZE</b>
							<div class="row">
								<div id="PhotoSizeBtns" class="col-sm-4">
									<div class="col-sm-12">
										<button id="ResizeHalfInch" type="button" class="btn btn-info" style="width: 150px;">0.5 x 0.5 inches</button>
									</div>
									<div class="col-sm-12 mt-1">
										<button id="ResizeOneInch" type="button" class="btn btn-info" style="width: 150px;">1 x 1 inch</button>
									</div>
									<div class="col-sm-12 mt-1">
										<button id="ResizeOneAndAHalfInch" type="button" class="btn btn-info" style="width: 150px;">1.5 x 1.5 inches</button>
									</div>
									<div class="col-sm-12 mt-1">
										<button id="ResizeTwoInch" type="button" class="btn btn-info" style="width: 150px;">2 x 2 inches</button>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="col-sm-12 mt-2">
										-&nbsp;48&nbsp;pixels
									</div>
									<div class="col-sm-12 mt-3">
										-&nbsp;96&nbsp;pixels
									</div>
									<div class="col-sm-12 mt-3">
										-&nbsp;144&nbsp;pixels
									</div>
									<div class="col-sm-12 mt-3">
										-&nbsp;192&nbsp;pixels
									</div>
								</div>
								<div class="col-sm-5">
									<label>Or custom value in pixels</label>
									<input id="ResizeCustom" class="form-control w-75" type="number" min="1" max="1920">
								</div>
							</div>
						</div>
					</div>
					<div id="PrintContainer" class="row px-5 PrintOut">
						<div class="col-md-6">
							<img class="eprint-logo" src="<?=base_url()?>assets/img/wercher_logo.png">
							<div class="col-sm-12 eprint-logo-text">
								<b>WERCHER SOLUTIONS AND RESOURCES LABOR SERVICE COOPERATIVE</b>
							</div>
							<div class="col-sm-12 eprint-logo-subtext">
								<i>Lower Maingate, Sitio Tagbac, Brgy. San Jose, Antipolo City</i>
							</div>
							<div class="col-sm-12 eprint-logo-info printemployee-tooltip">
								<p id="Name" width="200px" height="50px"><span><b><?php echo $LastName; ?>, <?php echo $NameExtension; ?> <?php echo $FirstName; ?>  <?php echo $MiddleInitial; ?>.</b></span></p>
							</div>
						</div>
						<div class="col-md-6 mb-5 eprint-photo">
							<img id="EPrintPhoto" src="<?php echo $ApplicantImage; ?>" width="192" height="192" style="float: right;">
						</div>
						<div id="EmployeeInformation" class="row">
							<div class="col-md-12 mb-3 printemployee-category">
								<b>
									PERSONAL&nbsp;INFORMATION
								</b>
							</div>

							<div class="col-md-1">
								<h6>
									Address:
								</h6>
							</div>
							<div class="col-md-11 printemployee-tooltip">
								<p>
									<?php echo $Address_Present; ?>
								</p>
							</div>
							<div class="col-md-2">
								<h6>
									Address&nbsp;Provincial:
								</h6>
							</div>
							<div class="col-md-4 printemployee-tooltip">
								<p>
									<?php echo $Address_Provincial; ?>
								</p>
							</div>
							<div class="col-md-2">
								<h6>
									Address&nbsp;Manila:
								</h6>
							</div>
							<div class="col-md-4 printemployee-tooltip">
								<p>
									<?php echo $Address_Manila; ?>
								</p>
							</div>
							<div class="col-md-2">
								<h6>
									Contact&nbsp;Number:
								</h6>
							</div>
							<div class="col-md-4 printemployee-tooltip">
								<p>
									<?php echo $Phone_No; ?>
								</p>
							</div>
							<div class="col-md-3">
								<h6>
									Emergency&nbsp;Contact&nbsp;Number:
								</h6>
							</div>
							<div class="col-md-3 printemployee-tooltip">
								<p>
									<?php echo $EmergencyContact; ?>
								</p>
							</div>
							<div class="col-md-4">
								<h6>
									Person&nbsp;to&nbsp;notify&nbsp;in&nbsp;case&nbsp;of&nbsp;emergency:
								</h6>
							</div>
							<div class="col-md-8 printemployee-tooltip">
								<p>
									<?php echo $EmergencyPerson; ?>
								</p>
							</div>
							<div class="col-md-1">
								<h6>
									Birth&nbsp;Date:
								</h6>
							</div>
							<div class="col-md-3 printemployee-tooltip">
								<p>
									<?php echo $BirthDate; ?>
								</p>
							</div>
							<div class="col-md-2">
								<h6>
									Birth&nbsp;Place:
								</h6>
							</div>
							<div class="col-md-6 printemployee-tooltip">
								<p>
									<?php echo $BirthPlace; ?>
								</p>
							</div>
							<div class="col-md-1">
								<h6>
									Age:
								</h6>
							</div>
							<div class="col-md-2 printemployee-tooltip">
								<p>
									<?php echo $Age; ?>
								</p>
							</div>
							<div class="col-md-1">
								<h6>
									Height:
								</h6>
							</div>
							<div class="col-md-2 printemployee-tooltip">
								<p>
									<?php echo $Height; ?>
								</p>
							</div>
							<div class="col-md-1">
								<h6>
									Weight:
								</h6>
							</div>
							<div class="col-md-2 printemployee-tooltip">
								<p>
									<?php echo $Weight; ?>
								</p>
							</div>
							<div class="col-md-1">
								<h6>
									Religion:
								</h6>
							</div>
							<div class="col-md-2 printemployee-tooltip">
								<p>
									<?php echo $Religion; ?>
								</p>
							</div>
							<div class="col-md-1">
								<h6>
									Citizenship:
								</h6>
							</div>
							<div class="col-md-5 printemployee-tooltip">
								<p>
									<span style="margin-left: 5px;"><?php echo $Citizenship; ?></span>
								</p>
							</div>
							<div class="col-md-1">
								<h6>
									Sex:
								</h6>
							</div>
							<div class="col-md-1 printemployee-tooltip">
								<p>
									<?php echo $Gender; ?>
								</p>
							</div>
							<div class="col-md-1">
								<h6>
									Civil&nbsp;Status:
								</h6>
							</div>
							<div class="col-md-1 printemployee-tooltip">
								<p>
									<span style="margin-left: 5px;"><?php echo $CivilStatus; ?></span>
								</p>
							</div>
							<div class="col-md-1">
								<h6>
									No.&nbsp;of&nbsp;Children:
								</h6>
							</div>
							<div class="col-md-1">
								<p>
									<span style="margin-left: 35px; border-bottom: 1px solid black;"><?php echo $No_OfChildren; ?></span>
								</p>
							</div>
						</div>
						<div id="WorkInformation" class="row mt-3">
							<div class="col-md-12 mb-3 printemployee-category">
								<b>
									WORK&nbsp;INFORMATION
								</b>
							</div>

							<div class="col-md-2">
								<h6>
									Position&nbsp;Desired:
								</h6>
							</div>
							<div class="col-md-2 printemployee-tooltip">
								<p>
									<?php echo $PositionDesired; ?>
								</p>
							</div>
							<div class="col-md-2">
								<h6>
									Position&nbsp;Group:
								</h6>
							</div>
							<div class="col-md-2 printemployee-tooltip">
								<p>
									<?php echo $PositionGroup; ?>
								</p>
							</div>
							<div class="col-md-1">
								<h6>
									Applied&nbsp;On:
								</h6>
							</div>
							<div class="col-md-3 printemployee-tooltip">
								<p>
									<span style="margin-left: 10px;"><?php echo $AppliedOn; ?></span>
								</p>
							</div>
							<div class="col-md-2">
								<h6>
									SSS&nbsp;Number:
								</h6>
							</div>
							<div class="col-md-4 printemployee-tooltip">
								<p>
									<?php echo $SSS_No; ?>
								</p>
							</div>
							<div class="col-md-2">
								<h6>
									HDMF:
								</h6>
							</div>
							<div class="col-md-4 printemployee-tooltip">
								<p>
									<?php echo $HDMF; ?>
								</p>
							</div>
							<div class="col-md-2">
								<h6>
									RCN:
								</h6>
							</div>
							<div class="col-md-4 printemployee-tooltip">
								<p>
									<?php echo $ResidenceCertificateNo; ?>
								</p>
							</div>
							<div class="col-md-2">
								<h6>
									PHILHEALTH:
								</h6>
							</div>
							<div class="col-md-4 printemployee-tooltip">
								<p>
									<?php echo $PhilHealth; ?>
								</p>
							</div>
							<div class="col-md-2">
								<h6>
									TIN:
								</h6>
							</div>
							<div class="col-md-4 printemployee-tooltip">
								<p>
									<?php echo $TIN; ?>
								</p>
							</div>
							<div class="col-md-2">
								<h6>
									ATM Number:
								</h6>
							</div>
							<div class="col-md-4 printemployee-tooltip">
								<p>
									<?php echo $ATM_No; ?>
								</p>
							</div>
						</div>
					</div>
					<div id="AcademicHistory" class="row px-5 mt-3 <?php if($GetAcadHistory->num_rows() > 0): echo 'PrintOut'; else: echo 'd-none'; endif;?>">
						<div class="col-md-12 mb-3 printemployee-category">
							<b>
								ACADEMIC&nbsp;HISTORY
							</b>
						</div>
						<div class="col-sm-12">
							<div class="table-responsive">
								<table class="table">
									<thead style="font-size: 15px;">
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
					<div id="EmploymentRecords" class="row pt-2 pl-5 <?php if($employment_record->num_rows() > 0): echo 'PrintOut'; else: echo 'd-none'; endif;?>">
						<div class="col-md-12 mb-3 printemployee-category">
							<b>
								EMPLOYMENT&nbsp;RECORDS
							</b>
						</div>
						<div class="col-sm-12">
							<div class="table-responsive">
								<table class="table table-condensed">
									<thead style="font-size: 15px;">
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
					<div id="MachineOperated" class="row pt-2 pl-5 <?php if($Machine_Operatessss->num_rows() > 0): echo 'PrintOut'; else: echo 'd-none'; endif;?>">
						<div class="col-md-12 mb-3 printemployee-category">
							<b>
								MACHINE&nbsp;OPERATED
							</b>
						</div>
						<div class="col-sm-12">
							<div class="table-responsive">
								<table class="table table-condensed">
									<thead style="font-size: 15px;">
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
					<?php if(isset($Suspended) && $Suspended != NULL): ?>
					<div id="Suspension" class="row pt-5 pl-5 d-none">
						<div class="col-sm-12">
							<h5>
								<i class="fas fa-user-tie"></i> Suspension
							</h5>
						</div>
						<div class="col-sm-12 col-md-12 employee-dynamic-header">
							<b>
								Suspended For
							</b>
						</div>
						<div class="col-sm-12 col-md-12 mb-2">
							<p>
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
							</p>
						</div>
					</div>
					<?php endif; ?>	
					<?php if($Status == 'Employee'): ?>
					<div id="Contract" class="row pl-5 d-none">
						<div id="ContractInformation" class="row mt-3">
							<div class="col-md-12 mb-3 printemployee-category">
								<b>
									CONTRACT
								</b>
							</div>

							<div class="col-md-2">
								<h6>
									Days&nbsp;Remaining:
								</h6>
							</div>
							<div class="col-md-10 printemployee-tooltip">
								<p>
									<?php
										$currTime = time();
										$strDateEnds = strtotime($DateEnds);
										$strDateStarted = strtotime($DateStarted);
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
								</p>
							</div>
							<div class="col-md-2">
								<h6>
									Client&nbsp;Name:
								</h6>
							</div>
							<div class="col-md-6 printemployee-tooltip">
								<p>
									<?php
										foreach($GetEmployeeMatchingClient->result_array() as $row) {
											echo $row['Name'];
										};
									?>
								</p>
							</div>
							<div class="col-md-2">
								<h6>
									Contact&nbsp;Number:
								</h6>
							</div>
							<div class="col-md-2 printemployee-tooltip">
								<p>
									<?php
										foreach($GetEmployeeMatchingClient->result_array() as $row) {
											echo $row['ContactNumber'];
										};
									?>
								</p>
							</div>
							<div class="col-md-2">
								<h6>
									Client&nbsp;Address:
								</h6>
							</div>
							<div class="col-md-10 printemployee-tooltip">
								<p>
									<?php
										foreach($GetEmployeeMatchingClient->result_array() as $row) {
											echo $row['Address'];
										};
									?>
								</p>
							</div>
							<div class="col-md-2">
								<h6>
									Contract&nbsp;Started:
								</h6>
							</div>
							<div class="col-md-4 printemployee-tooltip">
								<p>
									<?php echo $DateStarted; ?>
								</p>
							</div>
							<div class="col-md-2">
								<h6>
									Contract&nbsp;Ends:
								</h6>
							</div>
							<div class="col-md-4 printemployee-tooltip">
								<p>
									<?php echo $DateEnds; ?>
								</p>
							</div>
						</div>
					</div>
					<?php endif; ?>
					<div id="ContractHistory" class="row pt-2 pl-5 d-none">
						<div class="col-md-12 mb-3 printemployee-category">
							<b>
								CONTRACT&nbsp;HISTORY
							</b>
						</div>

						<div class="col-sm-12">
							<div class="table-responsive">
								<table class="table PrintOutHistory" style="width: 100%;">
									<thead>
										<tr class="text-center align-middle">
											<th> Client </th>
											<th> Contract Started </th>
											<th> Contract Ended </th>
											<th> Position </th>
										</tr>
									</thead>
									<tbody>
										<?php foreach ($GetContractHistory->result_array() as $row): ?>
											<tr>
												<td class="text-center align-middle">
													<?php echo $row['Client'] ; ?>
												</td>
												<td class="text-center align-middle">
													<?php echo $row['PreviousDateStarted'] ; ?>
												</td>
												<td class="text-center align-middle">
													<?php echo $row['PreviousDateEnds'] ; ?>
												</td>
												<td class="text-center align-middle">
													<?php echo $row['PreviousPosition'] ; ?>
												</td>
											</tr>
										<?php endforeach ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				<?php else: ?>
					<?php if($_GET['mode'] == 'Contract'): ?>
						
					<?php endif; ?>
				<?php endif; ?>
			</div>
		</div>
	</div>
</body>
<?php $this->load->view('_template/users/u_scripts');?>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.textfill.min.js"></script>
<script type="text/javascript">
	$(document).ready(function () {
		$('#Name').textfill({
		});
		$('#ToggleAcademic').on('click', function () {
			$('#AcademicHistory').toggleClass('PrintOut');
			$('#AcademicHistory').toggleClass('d-none');
		});
		$('#ToggleEmployment').on('click', function () {
			$('#EmploymentRecords').toggleClass('PrintOut');
			$('#EmploymentRecords').toggleClass('d-none');
		});
		$('#ToggleMachine').on('click', function () {
			$('#MachineOperated').toggleClass('PrintOut');
			$('#MachineOperated').toggleClass('d-none');
		});
		$('#ToggleContract').on('click', function () {
			$('#Contract').toggleClass('PrintOut');
			$('#Contract').toggleClass('d-none');
		});
		$('#ToggleHistory').on('click', function () {
			$('#ContractHistory').toggleClass('PrintOut');
			$('#ContractHistory').toggleClass('d-none');
		});
		$('#TogglePersonalInformation').on('click', function () {
			$('#EmployeeInformation').toggleClass('PrintExclude');
			$('#EmployeeInformation').toggleClass('d-none');
		});
		$('#ToggleWorkInformation').on('click', function () {
			$('#WorkInformation').toggleClass('PrintExclude');
			$('#WorkInformation').toggleClass('d-none');
		});
		$('#TogglePhoto').on('click', function () {
			$('#EPrintPhoto').toggleClass('PrintExclude');
			$('#PhotoSizeBtns').find('button').toggleClass('btn-info btn-secondary');
			$('#EPrintPhoto').toggleClass('d-none');
		});
		$('.general-filters-btn').on('click', function () {
			$(this).toggleClass('btn-success btn-secondary');
			$(this).children('i').toggleClass('wercher-transparent wercher-visible');
		});
		$('[data-toggle="tooltip"]').tooltip();
		$('#ResizeHalfInch').on('click', function () {
			$('#EPrintPhoto').attr('width', '48');
			$('#EPrintPhoto').attr('height', '48');
		});
		$('#ResizeOneInch').on('click', function () {
			$('#EPrintPhoto').attr('width', '96');
			$('#EPrintPhoto').attr('height', '96');
		});
		$('#ResizeOneAndAHalfInch').on('click', function () {
			$('#EPrintPhoto').attr('width', '144');
			$('#EPrintPhoto').attr('height', '144');
		});
		$('#ResizeTwoInch').on('click', function () {
			$('#EPrintPhoto').attr('width', '192');
			$('#EPrintPhoto').attr('height', '192');
		});
		$('#ResizeCustom').bind('input', function () {
			$('#EPrintPhoto').attr('width', $('#ResizeCustom').val());
			$('#EPrintPhoto').attr('height', $('#ResizeCustom').val());
		});
		$('#Opacity').bind('input', function() {
			opacity = $('#Opacity').val();
			opacity = opacity / 100;
			$('#PrintContainer').not('img').find('*').css('opacity', opacity);
		});
		$('#Color').bind('input', function() {
			color = $('#Color').val();
			color = 100 - color; // invert the value
			$('#PrintContainer').not('img').find('*').css('filter', 'grayscale(' + color + '%)');
		});
		$('#ClientSelect').on('change', function() {
			<?php foreach ($getClientOption->result_array() as $row): ?>
			<?php
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

	});
	function hideModal() {
		$("#EmpContractModal").modal('hide');
	}
</script>