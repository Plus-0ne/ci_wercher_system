<?php $T_Header;?>
<body>
	<div class="wrapper">
		<?php $this->load->view('_template/users/u_sidebar'); ?>
		<div id="content" class="ncontent">
			<div class="container-fluid">
				<?php $this->load->view('_template/users/u_notifications'); ?>
				<div class="row">
					<div class="col-sm-12">
						<div class="col-sm-12 text-right">
							<button id="DebugFill" type="button" class="btn btn-primary"><i class="fas fa-vial"></i> Debug Fill</button>
						</div>
						<div id="InputFields" class="p-5">
							<?php
							$data = $this->session->flashdata('data'); // Load the data array flashdata 
							if (!isset($data)) {
								$data = array(
									'PositionDesired' => NULL,
									'PositionGroup' => NULL,
									'LastName' => NULL,
									'FirstName' => NULL,
									'MiddleName' => NULL,
									'Gender' => NULL,
									'Age' => NULL,
									'Height' => NULL,
									'Weight' => NULL,
									'Religion' => NULL,
									'bDate' => NULL,
									'bPlace' => NULL,
									'Citizenship' => NULL,
									'CivilStatus' => NULL,
									'No_Children' => NULL,
									'PhoneNumber' => NULL,
									'EmailAddress' => NULL,
									'SSS' => NULL,
									'SSS_Effective' => NULL,
									'RCN' => NULL,
									'TIN' => NULL,
									'HDMF' => NULL,
									'ATM_No' => NULL,
									'PhilHealth' => NULL,
									'HMO' => NULL,

									'EmergencyPerson' => NULL,
									'EmergencyContact' => NULL,
									'Referral' => NULL,
									'NameExtension' => NULL,

									'Address_Present' => NULL,
									'Address_Provincial' => NULL,
									'Address_Manila' => NULL,

									'Notice' => NULL,
								);
							}
							?>
							<?php if($data['Notice'] != NULL): ?>
								<div class="row m-5 p-2 wercher-notice-banner">
									<div class="col-sm-12">
										<h5>
											<i class="fas fa-exclamation-triangle"></i> <b>Notice: <?php echo $data['Notice']; ?></b>
										</h5>
									</div>
									<div class="col-sm-12 mt-4">
										A person with a similar name has been found on the database:
									</div>
									<div class="col-sm-12 mt-2">
										<div class="table-responsive pt-2 pb-5 pl-2 pr-2">
											<table id="MonthlyTable" class="table table-striped table-bordered PrintOut" style="width: 100%;">
												<thead>
													<tr class="text-center">
														<th> Applicant ID </th>
														<th> Full Name </th>
														<th> Position Desired </th>
														<th> Applied On </th>
														<th> Current Status </th>
														<th> Action </th>
													</tr>
												</thead>
												<tbody>
													<?php 
													$CheckLFName = $this->Model_Selects->CheckLFName($data['LastName'], $data['FirstName']);
													foreach ($CheckLFName->result_array() as $row): ?>
														<tr>
															<td class="text-center">
																<div class="col-sm-12">
																	<img src="<?php echo $row['ApplicantImage']; ?>" width="70" height="70" class="rounded-circle">
																</div>
																<div class="col-sm-12 align-middle">
																	<?php echo $row['ApplicantID']; ?>
																</div>
															</td>
															<td class="text-center align-middle">
																<?php echo $row['LastName']; ?> , <?php echo $row['FirstName']; ?> <?php echo $row['MiddleName']; ?>.
															</td>
															<td class="text-center align-middle">
																<?php echo $row['PositionDesired']; ?>
															</td>
															<td class="text-center align-middle">
																<?php echo $row['AppliedOn']; ?>
															</td>
															<td class="text-center align-middle">
																<?php if ($row['Status'] == 'Employed') { ?>
																	<i class="fas fa-square PrintExclude" style="color: #1BDB07;"></i> Employed
																<?php } elseif ($row['Status'] == 'Applicant') { ?>
																	<i class="fas fa-square PrintExclude" style="color: #DB3E07;"></i> Applicant
																<?php } elseif ($row['Status'] == 'Expired') { ?>
																	<i class="fas fa-square PrintExclude" style="color: #0721DB;"></i> Expired
																<?php } elseif ($row['Status'] == 'Blacklisted') { ?>
																	<i class="fas fa-square PrintExclude" style="color: #000000;"></i> Blacklisted
																<?php } else { ?>
																	<i class="fas fa-square PrintExclude" style="color: #DB3E07;"></i> Unknown
																<?php } ?>
															</td>
															<td class="text-center align-middle PrintExclude" width="100">
																<a class="btn btn-primary btn-sm w-100 mb-1" href="<?=base_url()?>ViewEmployee?id=<?php echo $row['ApplicantID']; ?>" target="_blank"><i class="fas fa-external-link-alt"></i> View</a>
															</td>
														</tr>
													<?php endforeach ?>
												</tbody>
											</table>
										</div>
									</div>
									<div class="form-row ml-2">
										<div class="form-group col-sm-12 col-md-3">
											<button id="CreateADuplicate" type="button" class="btn btn-secondary w-100"><i class="fas fa-check wercher-transparent" style="margin-right: -1px;"></i></button>
										</div>
										<div class="form-group col-sm-12 col-md-9" style="margin-top: 5px;">
											Create&nbsp;a&nbsp;duplicate&nbsp;anyways
										</div>
									</div>
								</div>
							<?php endif; ?>
							<div class="mb-3">
								<h6>
									<i class="fas fa-square"></i> PERSONAL
								</h6>
							</div>
							<!-- Start form -->
							<form action="<?=base_url()?>addNewEmployee" method="POST" enctype="multipart/form-data">
								<input id="CreateADuplicateField" type="hidden" name="CreateADuplicate">
								<input id="pImageChecker" type="hidden" name="pImageChecker">
								<input id="pImageURL" type="hidden" name="pImageURL">
								<div class="form-row mb-2">
									
								</div>
								<div class="form-row">
									<div class="form-group col-sm-12 col-md-8">
										<div class="form-row">
											<div class="form-group col-sm-12 col-md-5">
												<label>Last Name</label>
												<input id="LastName" class="form-control" type="text" name="LastName" autocomplete="off" value="<?php echo $data['LastName']; ?>">
											</div>
											<div class="form-group col-sm-12 col-md-5">
												<label>First Name</label>
												<input id="FirstName" class="form-control" type="text" name="FirstName" autocomplete="off" value="<?php echo $data['FirstName']; ?>">
											</div>
											<div class="form-group col-sm-12 col-md-2">
												<label>Middle&nbsp;Name</label>
												<input id="MiddleName" class="form-control" type="text" name="MiddleName" autocomplete="off" value="<?php echo $data['MiddleName']; ?>">
											</div>
											<div class="form-group col-sm-12 col-md-3">
												<label>Name Extension</label>
												<input class="form-control" type="text" name="NameExtension" autocomplete="off" value="<?php echo $data['NameExtension']; ?>">
											</div>
											<div class="form-group col-sm-12 col-md-2">
												<label>Sex</label>
												<select class="form-control" name="Gender">
													<option value="Male" <?php if ($data['Gender'] == 'Male') {
														echo 'selected=""';
													} ?>>
														Male
													</option>
													<option value="Female" <?php if ($data['Gender'] == 'Female') {
														echo 'selected=""';
													} ?>>
														Female
													</option>
												</select>
											</div>
											<div class="form-group col-sm-12 col-md-2">
												<label>Height</label>
												<input class="form-control" type="text" name="Height" autocomplete="off" value="<?php echo $data['Height']; ?>">
											</div>
											<div class="form-group col-sm-12 col-md-2">
												<label>Weight</label>
												<input class="form-control" type="text" name="Weight" autocomplete="off" value="<?php echo $data['Weight']; ?>">
											</div>
											<div class="form-group col-sm-12 col-md-3">
												<label>Religion</label>
												<input class="form-control" type="text" name="Religion" autocomplete="off" value="<?php echo $data['Religion']; ?>">
											</div>
										</div>
									</div>
									<div class="form-group col-sm-12 col-md-4">
										<div class="form-group col-sm-12 text-center">
											<input type='file' id="imgInp" name="pImage" style="display: none;">
											<?php if(!$this->agent->is_mobile()): ?>
												<img class="image-hover" id="blah" src="<?php echo base_url() ?>assets/img/wercher_default_photo.png" width="192" height="192">
											<?php else: ?>
												<img class="image-hover" id="blah" src="<?php echo base_url() ?>assets/img/wercher_default_photo_mobile.png" width="192" height="192">
											<?php endif; ?>
										</div>
									</div>
								</div>
								<div class="form-row">
									<div class="form-group col-sm-10 col-md-2">
										<label>Birth Date</label>
										<input id="BirthDate" class="form-control" type="date" name="bDate" value="<?php echo $data['bDate']; ?>">
									</div>
									<div class="form-group col-sm-2 col-md-1">
										<label>Age</label>
										<input id="Age" class="form-control" type="text" value="<?php echo $data['Age']; ?>" readonly>
									</div>
									<div class="form-group col-sm-12 col-md-9">
										<label>Birth Place</label>
										<input class="form-control" type="text" name="bPlace" autocomplete="off" value="<?php echo $data['bPlace']; ?>">
									</div>
								</div>
								<div class="form-row">
									<div class="form-group col-sm-12 col-md-4">
										<label>Citizenship</label>
										<input class="form-control" type="text" name="Citizenship" autocomplete="off" value="<?php echo $data['Citizenship']; ?>">
									</div>
									<div class="form-group col-sm-12 col-md-2">
										<label>Civil Status</label>
										<select class="form-control" name="CivilStatus">
											<option value="Single" <?php if ($data['CivilStatus'] == 'Single') {
												echo 'selected=""';
											} ?>>
												Single
											</option>
											<option value="Married" <?php if ($data['CivilStatus'] == 'Married') {
												echo 'selected=""';
											} ?>>
												Married
											</option>
											<option value="Widowed" <?php if ($data['CivilStatus'] == 'Widowed') {
												echo 'selected=""';
											} ?>>
												Widowed
											</option>
											<option value="Divorced" <?php if ($data['CivilStatus'] == 'Divorced') {
												echo 'selected=""';
											} ?>>
												Divorced
											</option>
										</select>
									</div>
									<div class="form-group col-sm-12 col-md-2">
										<label>No. of Children</label>
										<input class="form-control" type="number" name="No_Children" autocomplete="off" value="<?php echo $data['No_Children']; ?>">
									</div>
									<div class="form-group col-sm-12 col-md-4">
										<label>Contact Number</label>
										<input class="form-control" type="text" name="PhoneNumber" autocomplete="off" value="<?php echo $data['PhoneNumber']; ?>">
									</div>
									<div class="form-group col-sm-12 col-md-3">
										<label>Email Address (@)</label>
										<input class="form-control" type="text" name="EmailAddress" autocomplete="off" value="<?php echo $data['EmailAddress']; ?>">
									</div>
								</div>
								<div class="mt-5 mb-4">
									<h6>
										<i class="fas fa-square"></i> WORK
									</h6>
								</div>
								<div class="form-row">
									<div class="form-group col-sm-12 col-md-8">
										<div class="form-row">
											<div class="form-group col-sm-12 col-md-6">
												<label>Position Desired</label>
												<input class="form-control" type="text" name="PositionDesired" autocomplete="off" value="<?php echo $data['PositionDesired']; ?>">
											</div>
											<div class="form-group col-sm-12 col-md-6">
												<label>Position Group</label>
												<input class="form-control" type="text" name="PositionGroup" autocomplete="off" value="<?php echo $data['PositionGroup']; ?>">
											</div>
										</div>
										<div class="form-row">
											<div class="form-group col-sm-12 col-lg-6">
												<label id="SSS_Text">S.S.S. No.</label>
												<input id="SSS" class="form-control" type="text" name="SSS" autocomplete="off" value="<?php echo $data['SSS']; ?>">
											</div>
											<div class="form-group col-sm-12 col-lg-6">
												<label id="HDMF_Text">HDMF</label>
												<input id="HDMF" class="form-control" type="text" name="HDMF" autocomplete="off" value="<?php echo $data['HDMF']; ?>">
											</div>
										</div>
										<div class="form-row">
											<div class="form-group col-sm-12 col-lg-6">
												<label id="RCN_Text">Residence Certificate No.</label>
												<input id="RCN" class="form-control" type="text" name="RCN" autocomplete="off" value="<?php echo $data['RCN']; ?>">
											</div>
											<div class="form-group col-sm-12 col-lg-6">
												<label id="PhilHealth_Text">PHILHEALTH</label>
												<input id="PhilHealth" class="form-control" type="text" name="PhilHealth" autocomplete="off" value="<?php echo $data['PhilHealth']; ?>">
											</div>
										</div>
										<div class="form-row">
											<div class="form-group col-sm-12 col-lg-6">
												<label id="TIN_Text">Tax Identification No.</label>
												<input id="TIN" class="form-control" type="text" name="TIN" autocomplete="off" value="<?php echo $data['TIN']; ?>">
											</div>
											<div class="form-group col-sm-12 col-lg-6">
												<label id="ATM_Text">ATM No.</label>
												<input id="ATM" class="form-control" type="text" name="ATM_No" autocomplete="off" value="<?php echo $data['ATM_No']; ?>">
											</div>
										</div>
										<div class="form-row">
											<div class="form-group col-sm-12 col-lg-6">
												<label id="HMO_Text">Health Maintenance Organization No.</label>
												<input id="HMO" class="form-control" type="text" name="HMO" autocomplete="off" value="<?php echo $data['HMO']; ?>">
											</div>
										</div>
									</div>
									<div class="form-group col-sm-12 col-md-4">
										<div class="col-sm-12 col-md-12 mb-4">
											<label>Applied to Wercher on</label>
											<input id="AppliedOn" class="form-control" type="date" name="AppliedOn" value="<?php echo date('Y-m-d'); ?>">
										</div>
										<b>Source of Application / Referral</b>
										<input id="Referral" type="hidden" name="Referral">
										<div class="form-row col-sm-12 mt-2">
											<div class="form-group col-sm-3 col-md-2">
												<button id="ReferralWalkIn" type="button" class="referral-btns btn btn-secondary w-100"><i class="fas fa-check wercher-transparent" style="margin-right: -1px;"></i></button>
											</div>
											<div class="form-group col-sm-9 col-md-10" style="margin-top: 5px;">
												Walk In
											</div>
										</div>
										<div class="form-row col-sm-12">
											<div class="form-group col-sm-3 col-md-2">
												<button id="ReferralJobFair" type="button" class="referral-btns btn btn-secondary w-100"><i class="fas fa-check wercher-transparent" style="margin-right: -1px;"></i></button>
											</div>
											<div class="form-group col-sm-9 col-md-10" style="margin-top: 5px;">
												Job Fair
											</div>
										</div>
										<div class="form-row col-sm-12">
											<div class="form-group col-sm-3 col-md-2">
												<button id="ReferralSocialMedia" type="button" class="referral-btns btn btn-secondary w-100"><i class="fas fa-check wercher-transparent" style="margin-right: -1px;"></i></button>
											</div>
											<div class="form-group col-sm-9 col-md-10" style="margin-top: 5px;">
												Social Media
											</div>
										</div>
										<div class="form-row col-sm-12">
											<div class="form-group col-sm-3 col-md-2">
												<button id="ReferralOthersButton" type="button" class="referral-btns btn btn-secondary w-100"><i class="fas fa-check wercher-transparent" style="margin-right: -1px;"></i></button>
											</div>
											<div class="form-group col-sm-12 col-md-10" style="margin-top: 5px;">
												Or others, please specify:
											</div>
											<div class="form-group col-sm-12 col-md-12" style="margin-top: 5px;">
												<input id="ReferralOthers" class="form-control" type="text" name="ReferralOthers" autocomplete="off" value="<?php echo $data['Referral']; ?>">
											</div>
										</div>
									</div>
								</div>
								<div class="mt-5 mb-4">
									<h6>
										<i class="fas fa-square"></i> ADDRESS
									</h6>
								</div>
								<div class="form-row">
									<div class="form-group col-sm-12 col-md-4">
										<label>Present</label>
										<input class="form-control" type="text" name="Address_Present" autocomplete="off" value="<?php echo $data['Address_Present']; ?>">
									</div>
									<div class="form-group col-sm-12 col-md-4">
										<label>Provincial</label>
										<input class="form-control" type="text" name="Address_Provincial" autocomplete="off" value="<?php echo $data['Address_Provincial']; ?>">
									</div>
									<div class="form-group col-sm-12 col-md-4">
										<label>Manila</label>
										<input class="form-control" type="text" name="Address_Manila" autocomplete="off" value="<?php echo $data['Address_Manila']; ?>">
									</div>
								</div>
								<div class="form-row">
									<div class="form-group col-sm-7 col-md-7">
										<label>Person to notify in case of emergency</label>
										<input class="form-control" type="text" name="EmergencyPerson" autocomplete="off" value="<?php echo $data['Address_Present']; ?>">
									</div>
									<div class="form-group col-sm-1 col-md-1 text-center">
										<p><i class="fas fa-arrow-right" style="margin-right: -1px; color: rgba(0, 0, 0, 0.55);"></i></p>
										<p><i class="fas fa-arrow-right" style="margin-right: -1px; color: rgba(0, 0, 0, 0.55);"></i></p>
									</div>
									<div class="form-group col-sm-4 col-md-4">
										<label>Contact Number</label>
										<input class="form-control" type="text" name="EmergencyContact" autocomplete="off" value="<?php echo $data['Address_Provincial']; ?>">
									</div>
								</div>
								<div class="mt-5">
									<h6>
										<i class="fas fa-square"></i> RECORDS
									</h6>
								</div>
								<div class="form-row pb-5 pt-5">
									<div class="pb-3">
										<h5>Academic History</h5>
									</div>
									<div id="AcadHsssistory" class="" style="width: 100%;">
										
									</div>
								</div>
								<div class="form-row pb-5">
									<div class="pb-3">
										<h5>Employment Record </h5>
									</div>
									<div id="empskills" class="" style="width: 100%;">
										
									</div>
								</div>
								<div class="form-row pb-5">
									<div class="pb-3">
										<h5>Machine Operated </h5>
									</div>
									<div id="mach_Op" class="" style="width: 100%;">
										
									</div>
								</div>
								<hr>
								<div class="form-row pt-5 pb-4 save-button-bg">
									<div class="form-group mr-auto">
										<div class="save-btn-locked-group">
											<div class="row">
												<span style="font-size: 18px; color: rgba(255, 25, 25); padding-bottom: 25px; margin-top: -25px;"><i class="fas fa-exclamation-circle"></i> Requires atleast one of any name</span>
											</div>
											<div class="row">
												<button type="button" class="btn btn-secondary btn-lg hover-disabled" data-toggle="tooltip" data-placement="top" data-html="true" title="Requires atleast a <b>Last Name</b>, <b>First Name</b>, or <b>Middle Name</b>"><i class="fas fa-lock"></i> Save</button>
											</div>
										</div>
										<div class="save-btn-valid-group" style="display: none;">
											<div class="row">
												<span style="font-size: 18px; color: green; padding-bottom: 25px; margin-top: -25px;"><i class="fas fa-check-circle"></i> Applicant is valid for saving</span>
											</div>
											<div class="row">
												<button id="SaveButton" class="btn btn-success btn-lg" type="submit"><i class="fas fa-save"></i> Save</button>
											</div>
										</div>
									</div>
									<div class="form-group ml-auto">
										<button type="button" class="btn btn-info btn-lg" style="float: right;" onclick="backToTop()"><i class="fas fa-level-up-alt"></i> Scroll to Top</button>
									</div>
								</div>
							</form>
							<!-- End Form -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Modal -->
	<div class="modal fade" id="acadFields" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Academic Details</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="Main_Controller/AddtoAcadCart" method="post">
						<div class="form-row">
							<div class="form-group">
								<select id="SchoolLevel" class="form-control" name="SchoolLevel">
									<option hidden="" disabled="" selected="">
										Choose Level
									</option>
									<option>
										High School
									</option>
									<option>
										College
									</option>
									<option>
										Other courses / Special Training
									</option>
								</select>
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-sm-12">
								<label>School Name</label>
								<input id="SchoolName" class="form-control" type="text" name="SchoolName">
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-sm-12">
								<label>School Address</label>
								<input id="SchoolAddress" class="form-control" type="text" name="SchoolAddress">
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-sm-12 col-md-6 m-auto">
								<input id="FromYearSchool" class="form-control" type="text" name="FromYearSchool" placeholder="From year" maxlength="4">
							</div>
							<div class="form-group col-sm-12 col-md-6 m-auto">
								<input id="ToYearSchool" class="form-control" type="text" name="ToYearSchool" placeholder="To year" maxlength="4">
							</div>
						</div>
						<div class="form-row mt-3">
							<div class="form-group col-sm-12 m-auto">
								<label>Highest Degree / Certificate Attained</label>
								<input id="H_Attained" class="form-control" type="text" name="H_Attained">
							</div>
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button id="add_sssscc" type="submit" class="btn btn-primary" data-dismiss="modal" aria-label="Close"><i class="fas fa-plus"></i> Add</button>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="skillsFields" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Employment Details</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="#" method="post">
						<div class="form-row">
							<div class="form-group col-sm-12 col-md-6">
								<label>Employer Name</label>
								<input id="EmployeerName" class="form-control" type="text" name="">
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-sm-12">
								<label>Address</label>
								<input id="emAddress" class="form-control" type="text" name="SchoolName">
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-sm-12 col-md-6 m-auto">
								<label>Period Covered</label>
								<input id="PeriodCovered" class="form-control" type="text" name="FromYearSchool">
							</div>
							<div class="form-group col-sm-12 col-md-6 m-auto">
								<label> Position</label>
								<input id="Position" class="form-control" type="text" name="ToYearSchool">
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-sm-12 col-md-6 m-auto">
								<label>Salary</label>
								<input id="Salary" class="form-control" type="text" name="FromYearSchool">
							</div>
							<div class="form-group col-sm-12 col-md-6 m-auto">
								<label> Cause of separation</label>
								<input id="cos" class="form-control" type="text" name="ToYearSchool">
							</div>
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button id="add_empdet" type="submit" class="btn btn-primary" data-dismiss="modal" aria-label="Close"><i class="fas fa-plus"></i> Add</button>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="Mach_Operated" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Machine Operated</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="#" method="post">
						<div class="form-row">
							<div class="form-group col-sm-12 col-md-12">
								<label>Machine Name</label>
								<input id="MachineName" class="form-control" type="text" name="">
							</div>
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button id="add_machop" type="submit" class="btn btn-primary" data-dismiss="modal" aria-label="Close"><i class="fas fa-plus"></i> Add</button>
				</div>
			</div>
		</div>
	</div>
</body>
<style type="text/css">
	.in-beni:focus { box-shadow: none; }
	.btn-tr { background-color: transparent; border: none; }
	#SalaryTable {
		table-layout: fixed;
		word-wrap: break-word;
	}
</style>
<?php $this->load->view('_template/users/u_scripts'); ?>
<script type="text/javascript">
	function backToTop() {
		document.body.scrollTop = 0;
		document.documentElement.scrollTop = 0;
	}
	$(document).ready(function () {
		$('[data-toggle="tooltip"]').tooltip();
		// Local storage
		// ~ preloading
		var inputCart = {
			items: []
		};
		$('#InputFields').find('input').not('input[type="file"]').not('#ReferralOthers').each(function() {
			let inputFieldName = $(this).attr('name'); // Fetch input location
			let inputFieldValue = localStorage.getItem(inputFieldName); // Fetch input value from storage
			if(inputFieldValue) {
				$(this).val(inputFieldValue); // Assign input value to location from storage
				inputCart.items.push(inputFieldName); // Sending as JSON
				localStorage.setItem('inputCart', JSON.stringify(inputCart));
			}
			if(inputFieldName == 'FirstName' || inputFieldName == 'LastName' || inputFieldName == 'MiddleName') {
				if (inputFieldValue) { // Has data
					$('.save-btn-locked-group').hide();
					$('.save-btn-valid-group').show();
				}
			}
		})
		// profileImage = localStorage.getItem('profileImage');
		// if (profileImage) {
		// 	$('#blah').attr('src', profileImage);
		// 	$('#pImageURL').val(profileImage); // Fetch from data url blob
		// 	$('#pImageChecker').val('url');
		// }
		referral = localStorage.getItem('referral');
		if (referral) {
			let referralValue = localStorage.getItem('referral');
			switch (referralValue.toUpperCase()) { // Insensitive string condition
				case 'WALK IN':
					$('#ReferralWalkIn').addClass('btn-success');
					$('#ReferralWalkIn').children('i').addClass('wercher-visible');
					break;
				case 'JOB FAIR':
					$('#ReferralJobFair').addClass('btn-success');
					$('#ReferralJobFair').children('i').addClass('wercher-visible');
					break;
				case 'SOCIAL MEDIA':
					$('#ReferralSocialMedia').addClass('btn-success');
					$('#ReferralSocialMedia').children('i').addClass('wercher-visible');
					break;
				default:
					$('#ReferralOthersButton').addClass('btn-success');
					$('#ReferralOthersButton').children('i').addClass('wercher-visible');
					$('#ReferralOthers').val(referralValue);
					break;
			}
			$('#Referral').val(referralValue);
			if (!inputCart.items.includes('referral')) {
				inputCart.items.push('referral');
				localStorage.setItem('inputCart', JSON.stringify(inputCart));
			}
		}
		// ~ input
		$('#InputFields').find('input').bind("input", function() {
			let inputName = $(this).attr('name');
			localStorage.setItem(inputName, $(this).val());
			if (!inputCart.items.includes(inputName)) {
				inputCart.items.push(inputName); // Sending as JSON
				localStorage.setItem('inputCart', JSON.stringify(inputCart));
			} else { // Field is inside the cart
				let index = inputCart.items.indexOf(inputName);
				if (!$(this).val()) { // Check if string is empty
					inputCart.items.splice(index, 1);
					localStorage.setItem('inputCart', JSON.stringify(inputCart));
					localStorage.removeItem(inputName); // Remove local storage if empty
				}
			}
			if (inputName == 'FirstName' || inputName == 'LastName' || inputName == 'MiddleName') {
				if (!$('#FirstName').val() && !$('#LastName').val() && !$('#MiddleName').val()) {
					$('.save-btn-locked-group').show();
					$('.save-btn-valid-group').hide();
				} else {
					$('.save-btn-locked-group').hide();
					$('.save-btn-valid-group').show();
				}
			}
		});
		// Documents
		var SSS_List = [];
		var HDMF_List = [];
		var RCN_List = [];
		var PhilHealth_List = [];
		var TIN_List = [];
		var ATM_List = [];
		<?php foreach($this->Model_Selects->GetAllApplicants()->result_array() as $row): ?>
			SSS_List.push("<?php echo $row['SSS_No']; ?>");
			HDMF_List.push("<?php echo $row['HDMF']; ?>");
			RCN_List.push("<?php echo $row['ResidenceCertificateNo']; ?>");
			PhilHealth_List.push("<?php echo $row['PhilHealth']; ?>");
			TIN_List.push("<?php echo $row['TIN']; ?>");
			ATM_List.push("<?php echo $row['ATM_No']; ?>");
		<?php endforeach; ?>
		$('#SSS').bind("input", function () {
			if ($('#SSS').val()) {
				if(SSS_List.includes($('#SSS').val())) {
					$('#SSS_Text').html('S.S.S. No. <span style="color: red;"><i class="fas fa-times-circle"></i> Duplicate found</span>')
				} else {
					$('#SSS_Text').html('S.S.S. No. <i class="fas fa-check-circle" style="color: green;"></i>')
				}
			} else {
				$('#SSS_Text').html('S.S.S. No.');
			}
		});
		$('#HDMF').bind("input", function () {
			if ($('#HDMF').val()) {
				if(HDMF_List.includes($('#HDMF').val())) {
					$('#HDMF_Text').html('HDMF <span style="color: red;"><i class="fas fa-times-circle"></i> Duplicate found</span>')
				} else {
					$('#HDMF_Text').html('HDMF <i class="fas fa-check-circle" style="color: green;"></i>')
				}
			} else {
				$('#HDMF_Text').html('HDMF');
			}
		});
		$('#RCN').bind("input", function () {
			if ($('#RCN').val()) {
				if(RCN_List.includes($('#RCN').val())) {
					$('#RCN_Text').html('Residence Certificate No. <span style="color: red;"><i class="fas fa-times-circle"></i> Duplicate found</span>')
				} else {
					$('#RCN_Text').html('Residence Certificate No. <i class="fas fa-check-circle" style="color: green;"></i>')
				}
			} else {
				$('#RCN_Text').html('Residence Certificate No.');
			}
		});
		$('#PhilHealth').bind("input", function () {
			if ($('#PhilHealth').val()) {
				if(PhilHealth_List.includes($('#PhilHealth').val())) {
					$('#PhilHealth_Text').html('PHILHEALTH <span style="color: red;"><i class="fas fa-times-circle"></i> Duplicate found</span>')
				} else {
					$('#PhilHealth_Text').html('PHILHEALTH <i class="fas fa-check-circle" style="color: green;"></i>')
				}
			} else {
				$('#PhilHealth_Text').html('PHILHEALTH');
			}
		});
		$('#TIN').bind("input", function () {
			if ($('#TIN').val()) {
				if(TIN_List.includes($('#TIN').val())) {
					$('#TIN_Text').html('Tax Identification No. <span style="color: red;"><i class="fas fa-times-circle"></i> Duplicate found</span>')
				} else {
					$('#TIN_Text').html('Tax Identification No. <i class="fas fa-check-circle" style="color: green;"></i>')
				}
			} else {
				$('#TIN_Text').html('Tax Identification No.');
			}
		});
		$('#ATM').bind("input", function () {
			if ($('#ATM').val()) {
				if(ATM_List.includes($('#ATM').val())) {
					$('#ATM_Text').html('ATM No. <span style="color: red;"><i class="fas fa-times-circle"></i> Duplicate found</span>')
				} else {
					$('#ATM_Text').html('ATM No. <i class="fas fa-check-circle" style="color: green;"></i>')
				}
			} else {
				$('#ATM_Text').html('ATM No.');
			}
		});
		var CreateADuplicate = ''; // Boolean
		$('#CreateADuplicate').on('click', function () {
			$(this).toggleClass('btn-secondary btn-success');
			$(this).children('i').toggleClass('wercher-visible wercher-transparent');
			if (CreateADuplicate != 'Yes') {
				CreateADuplicate = 'Yes';
				$('#CreateADuplicateField').val('Yes');
			} else {
				CreateADuplicate = '';
				$('#CreateADuplicateField').val('');
			}
			$('#SaveButton').trigger('click');
		});
		$('#TogglePhoto').on('click', function () {
			$('#EPrintPhoto').toggleClass('PrintExclude');
			$('#PhotoSizeBtns').find('button').toggleClass('btn-info btn-secondary');
			$('#EPrintPhoto').toggleClass('d-none');
		});
		$('.referral-btns').on('click', function () {
			$('.referral-btns').addClass('btn-secondary');
			$('.referral-btns').removeClass('btn-success');
			$('.referral-btns').children('i').addClass('wercher-transparent');
			$('.referral-btns').children('i').removeClass('wercher-visible');
			$('#ReferralOthers').removeClass('glow-gold');
			$('#ReferralOthers').attr('placeholder', '');
			$('#ReferralOthers').val('');
		});
		$('#ReferralWalkIn').on('click', function () {
			$(this).addClass('btn-success');
			$(this).children('i').addClass('wercher-visible');
			$('#Referral').val('Walk In');
			localStorage.setItem('referral', $('#Referral').val());
			if (!inputCart.items.includes('referral')) {
				inputCart.items.push('referral');
				localStorage.setItem('inputCart', JSON.stringify(inputCart));
			}
		});
		$('#ReferralJobFair').on('click', function () {
			$(this).addClass('btn-success');
			$(this).children('i').addClass('wercher-visible');
			$('#Referral').val('Job Fair');
			localStorage.setItem('referral', $('#Referral').val());
			if (!inputCart.items.includes('referral')) {
				inputCart.items.push('referral');
				localStorage.setItem('inputCart', JSON.stringify(inputCart));
			}
		});
		$('#ReferralSocialMedia').on('click', function () {
			$(this).addClass('btn-success');
			$(this).children('i').addClass('wercher-visible');
			$('#Referral').val('Social Media');
			localStorage.setItem('referral', $('#Referral').val());
			if (!inputCart.items.includes('referral')) {
				inputCart.items.push('referral');
				localStorage.setItem('inputCart', JSON.stringify(inputCart));
			}
		});
		$('#ReferralOthersButton').on('click', function () {
			$(this).addClass('btn-success');
			$(this).children('i').addClass('wercher-visible');
			$('#Referral').val($('#ReferralOthers').val());
			$('#ReferralOthers').addClass('glow-gold');
			$('#ReferralOthers').attr('placeholder', 'Specify here...');
			localStorage.setItem('referral', $('#Referral').val());
			if (!inputCart.items.includes('referral')) {
				inputCart.items.push('referral');
				localStorage.setItem('inputCart', JSON.stringify(inputCart));
			}
		});
		$('#ReferralOthers').bind('input', function () {
			$(this).removeClass('glow-gold');
			$('.referral-btns').addClass('btn-secondary');
			$('.referral-btns').removeClass('btn-success');
			$('.referral-btns').children('i').addClass('wercher-transparent');
			$('.referral-btns').children('i').removeClass('wercher-visible');
			switch ($('#ReferralOthers').val().toUpperCase()) { // Insensitive string condition
				case 'WALK IN':
					$('#ReferralWalkIn').addClass('btn-success');
					$('#ReferralWalkIn').children('i').addClass('wercher-visible');
					break;
				case 'JOB FAIR':
					$('#ReferralJobFair').addClass('btn-success');
					$('#ReferralJobFair').children('i').addClass('wercher-visible');
					break;
				case 'SOCIAL MEDIA':
					$('#ReferralSocialMedia').addClass('btn-success');
					$('#ReferralSocialMedia').children('i').addClass('wercher-visible');
					break;
				case '':
					break;
				default:
					$('#ReferralOthersButton').addClass('btn-success');
					$('#ReferralOthersButton').children('i').addClass('wercher-visible');
					break;
			}
			$('#Referral').val($('#ReferralOthers').val());
			localStorage.setItem('referral', $('#Referral').val());
			if (!inputCart.items.includes('referral')) {
				inputCart.items.push('referral');
				localStorage.setItem('inputCart', JSON.stringify(inputCart));
			}
		});
		var today = new Date();
		<?php if(!empty($data['BirthDate'])): ?>
		var birthDate = new Date($('#BirthDate').val());
	    var age = today.getFullYear() - birthDate.getFullYear();
	    var m = today.getMonth() - birthDate.getMonth();
	    if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
	        age--;
	    }
	    $('#Age').val(age);
		<?php endif; ?>
		$("#BirthDate").change(function(){

		    var birthDate = new Date($('#BirthDate').val());
		    var age = today.getFullYear() - birthDate.getFullYear();
		    var m = today.getMonth() - birthDate.getMonth();
		    if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
		        age--;
		    }
		   $('#Age').val(age);
		});
		$('#DebugFill').on('click', function () {
			$('input[type="number"]').val(Math.floor(Math.random() * Math.floor(99)));
			$('input[type="text"]').val('TEST-' + Math.floor(Math.random() * Math.floor(9999999)));
			$('input[type="date"]').val(moment().format('YYYY-MM-DD'));
			$('#ReferralWalkIn').trigger('click');
			$('.save-btn-locked-group').hide();
			$('.save-btn-valid-group').show();
		});
		$('#blah').click(function(){ $('#imgInp').trigger('click'); });
		function readURL(input) {
			if (input.files && input.files[0]) {
				var reader = new FileReader();
				reader.onload = function(e) {
					$('#blah').attr('src', e.target.result);
					// localStorage.setItem('profileImage', e.target.result);
				}
				reader.readAsDataURL(input.files[0]);
			}
		}
		$("#imgInp").change(function() {
			readURL(this);
			$('#pImageChecker').val('manual')
		});
		// Cart Academic History
		$('#add_sssscc').click(function(){

			var SchoolLevel = $('#SchoolLevel').val();
			var SchoolName = $('#SchoolName').val();
			var SchoolAddress = $('#SchoolAddress').val();
			
			var FromYearSchool = $('#FromYearSchool').val();
			var ToYearSchool = $('#ToYearSchool').val();
			var H_Attained = $('#H_Attained').val();
			

			$.ajax({
				url : "<?php echo site_url('Main_Controller/add_to_cart');?>",
				method : "POST",
				data : {SchoolLevel: SchoolLevel, SchoolName: SchoolName,SchoolAddress: SchoolAddress, FromYearSchool: FromYearSchool, ToYearSchool: ToYearSchool,H_Attained: H_Attained},
				success: function(data){
					$('#SchoolLevel option:selected').index();
					$('#SchoolName').val("");
					$('#FromYearSchool').val("");
					$('#ToYearSchool').val("");
					$('#AcadHsssistory').load("<?php echo site_url('Main_Controller/showAcad');?>");
				}
			});
		});
		$(document).on('click','.remoach',function(){
			var row_id = $(this).attr("id");
            // alert(row_id);
            $.ajax({
            	url : "<?php echo site_url('Main_Controller/removeAcad');?>",
            	method : "POST",
            	data : {row_id : row_id},
            	success :function(data){
            		$('#AcadHsssistory').load("<?php echo site_url('Main_Controller/showAcad');?>");
            	}
            });
        });
		$('#AcadHsssistory').load("<?php echo site_url('Main_Controller/showAcad');?>");

		// ADD EMPLOYMENT DETAILS
		$('#add_empdet').click(function(){

			var EmployeerName = $('#EmployeerName').val();
			var emAddress = $('#emAddress').val();
			var PeriodCovered = $('#PeriodCovered').val();
			
			var Position = $('#Position').val();
			var Salary = $('#Salary').val();
			var cos = $('#cos').val();
			

			$.ajax({
				url : "<?php echo site_url('Main_Controller/add_toemp');?>",
				method : "POST",
				data : {EmployeerName: EmployeerName, emAddress: emAddress,PeriodCovered: PeriodCovered, Position: Position, Salary: Salary,cos: cos},
				success: function(data){
					$('#empskills').load("<?php echo site_url('Main_Controller/showSkills');?>");
				}
			});
		});
		$(document).on('click','.remoaemop',function(){
			var row_id = $(this).attr("id");
            // alert(row_id);
            $.ajax({
            	url : "<?php echo site_url('Main_Controller/removeemp');?>",
            	method : "POST",
            	data : {row_id : row_id},
            	success :function(data){
            		$('#empskills').load("<?php echo site_url('Main_Controller/showSkills');?>");
            	}
            });
        });
		$('#empskills').load("<?php echo site_url('Main_Controller/showSkills');?>");

		// ADD Machine Operated
		$('#add_machop').click(function(){

			var MachineName = $('#MachineName').val();
			
			$.ajax({
				url : "<?php echo site_url('Main_Controller/Add_MachineOP');?>",
				method : "POST",
				data : {MachineName: MachineName},
				success: function(data){
					$('#mach_Op').load("<?php echo site_url('Main_Controller/ShowMachineOperated');?>");
				}
			});
		});
		$(document).on('click','.removemachine',function(){
			var row_id = $(this).attr("id");
            // alert(row_id);
            $.ajax({
            	url : "<?php echo site_url('Main_Controller/remomanchine');?>",
            	method : "POST",
            	data : {row_id : row_id},
            	success :function(data){
            		$('#mach_Op').load("<?php echo site_url('Main_Controller/ShowMachineOperated');?>");
            	}
            });
        });
		$('#mach_Op').load("<?php echo site_url('Main_Controller/ShowMachineOperated');?>");
		// $('#SalaryRaw,#HoursDayOne,#HoursDayTwo,#HoursDayThree,#HoursDayFour,#HoursDayFive,#HoursDaySix').on('input', function() {
		// 	// TODO: Clean & optimize this.
		//     $('#SalaryOvertimeFade').fadeIn();
		//     $('#SalaryDays').fadeIn();

		//     var HourOne = $("#HoursDayOne").val();
		//     var HourTwo = $("#HoursDayTwo").val();
		//     var HourThree = $("#HoursDayThree").val();
		//     var HourFour = $("#HoursDayFour").val();
		//     var HourFive = $("#HoursDayFive").val();
		//     var HourSix = $("#HoursDaySix").val();

		//     var SalaryWeekly = $('#SalaryRaw').val();
		//     var TotalHoursInAWeek = parseFloat(HourOne) + parseFloat(HourTwo) + parseFloat(HourThree) + parseFloat(HourFour) + parseFloat(HourFive) + parseFloat(HourSix);
		//     var SalaryPerHour = SalaryWeekly / TotalHoursInAWeek;
		//     $('#SalaryPerHour').val(SalaryPerHour.toFixed(2));

		//     var SalaryPerDay = SalaryPerHour * parseFloat(HourOne);
		//     $('#SalaryDayOne').val(SalaryPerDay.toFixed(2));
		//     SalaryPerDay = SalaryPerHour * parseFloat(HourTwo);
		//     $('#SalaryDayTwo').val(SalaryPerDay.toFixed(2));
		//     SalaryPerDay = SalaryPerHour * parseFloat(HourThree);
		//     $('#SalaryDayThree').val(SalaryPerDay.toFixed(2));
		//     SalaryPerDay = SalaryPerHour * parseFloat(HourFour);
		//     $('#SalaryDayFour').val(SalaryPerDay.toFixed(2));
		//     SalaryPerDay = SalaryPerHour * parseFloat(HourFive);
		//     $('#SalaryDayFive').val(SalaryPerDay.toFixed(2));
		//     SalaryPerDay = SalaryPerHour * parseFloat(HourSix);
		//     $('#SalaryDaySix').val(SalaryPerDay.toFixed(2));
		// });
	});
</script>
</html>