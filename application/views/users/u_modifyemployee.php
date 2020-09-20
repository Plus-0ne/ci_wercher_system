<?php $T_Header;?>
<body>
	<div class="wrapper">
		<?php $this->load->view('_template/users/u_sidebar'); ?>
		<div id="content" class="ncontent">
			<div class="container-fluid">
				<?php $this->load->view('_template/users/u_notifications'); ?>
				<div class="row">
					<div class="col-sm-12">
						<div class="p-5">
							<?php echo $this->session->flashdata('prompts'); ?>
							<div class="mb-3">
								<h6>
									<i class="fas fa-square"></i> PERSONAL
								</h6>
							</div>
							<!-- Start form -->
							<form action="<?=base_url()?>UpdateEmployee" method="POST" enctype="multipart/form-data">
								<input id="CreateADuplicateField" type="hidden" name="CreateADuplicate">
								<input id="pImageChecker" type="hidden" name="pImageChecker">
								<div class="form-row mb-2">
									
								</div>
								<div class="form-row">
									<div class="form-group col-sm-12 col-md-8">
										<div class="form-row">
											<div class="form-group col-sm-12 col-md-5">
												<label>Last Name</label>
												<input class="form-control" type="text" name="LastName" autocomplete="off" value="<?php echo $LastName; ?>">
											</div>
											<div class="form-group col-sm-12 col-md-5">
												<label>First Name</label>
												<input class="form-control" type="text" name="FirstName" autocomplete="off" value="<?php echo $FirstName; ?>">
											</div>
											<div class="form-group col-sm-12 col-md-2">
												<label>Middle&nbsp;Initial</label>
												<input class="form-control" type="text" name="MI" autocomplete="off" value="<?php echo $MiddleInitial; ?>" maxlength="1">
											</div>
											<div class="form-group col-sm-12 col-md-3">
												<label>Name Extension</label>
												<input class="form-control" type="text" name="NameExtension" autocomplete="off" value="<?php echo $NameExtension; ?>">
											</div>
											<div class="form-group col-sm-12 col-md-2">
												<label>Sex</label>
												<select class="form-control" name="Gender">
													<option value="Male" <?php if ($Gender == 'Male') {
														echo 'selected=""';
													} ?>>
														Male
													</option>
													<option value="Female" <?php if ($Gender == 'Female') {
														echo 'selected=""';
													} ?>>
														Female
													</option>
												</select>
											</div>
											<div class="form-group col-sm-12 col-md-2">
												<label>Height</label>
												<input class="form-control" type="text" name="Height" autocomplete="off" value="<?php echo $Height; ?>">
											</div>
											<div class="form-group col-sm-12 col-md-2">
												<label>Weight</label>
												<input class="form-control" type="text" name="Weight" autocomplete="off" value="<?php echo $Weight; ?>">
											</div>
											<div class="form-group col-sm-12 col-md-3">
												<label>Religion</label>
												<input class="form-control" type="text" name="Religion" autocomplete="off" value="<?php echo $Religion; ?>">
											</div>
										</div>
									</div>
									<div class="form-group col-sm-12 col-md-4">
										<div class="form-group col-sm-12 text-center image-holder">
											<input type="hidden" name="M_ApplicantID" value="<?php echo $ApplicantID; ?>"> 
											<input type="hidden" name="M_ApplicantImage" value="<?php echo $ApplicantImage; ?>"> 
											<input type='file' id="imgInp" name="pImage" style="display: none;">
											<img class="image-hover" id="blah" src="<?php echo $ApplicantImage; ?>" width="192" height="192">
										</div>
									</div>
								</div>
								<div class="form-row">
									<div class="form-group col-sm-10 col-md-2">
										<label>Birth Date</label>
										<input id="BirthDate" class="form-control" type="date" name="bDate" value="<?php echo $BirthDate; ?>">
									</div>
									<div class="form-group col-sm-2 col-md-1">
										<label>Age</label>
										<input id="Age" class="form-control" type="text" value="<?php echo $Age; ?>" readonly>
									</div>
									<div class="form-group col-sm-12 col-md-9">
										<label>Birth Place</label>
										<input class="form-control" type="text" name="bPlace" autocomplete="off" value="<?php echo $BirthPlace; ?>">
									</div>
								</div>
								<div class="form-row">
									<div class="form-group col-sm-12 col-md-4">
										<label>Citizenship</label>
										<input class="form-control" type="text" name="Citizenship" autocomplete="off" value="<?php echo $Citizenship; ?>">
									</div>
									<div class="form-group col-sm-12 col-md-2">
										<label>Civil Status</label>
										<select class="form-control" name="CivilStatus">
											<option value="Single" <?php if ($CivilStatus == 'Single') {
												echo 'selected=""';
											} ?>>
												Single
											</option>
											<option value="Married" <?php if ($CivilStatus == 'Married') {
												echo 'selected=""';
											} ?>>
												Married
											</option>
											<option value="Widowed" <?php if ($CivilStatus == 'Widowed') {
												echo 'selected=""';
											} ?>>
												Widowed
											</option>
											<option value="Divorced" <?php if ($CivilStatus == 'Divorced') {
												echo 'selected=""';
											} ?>>
												Divorced
											</option>
										</select>
									</div>
									<div class="form-group col-sm-12 col-md-2">
										<label>No. of Children</label>
										<input class="form-control" type="number" name="No_Children" autocomplete="off" value="<?php echo $No_OfChildren; ?>">
									</div>
									<div class="form-group col-sm-12 col-md-4">
										<label>Contact Number</label>
										<input class="form-control" type="text" name="PhoneNumber" autocomplete="off" value="<?php echo $Phone_No; ?>">
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
												<label>Employee ID</label>
												<input class="form-control" type="text" name="EmployeeID" autocomplete="off" value="<?php echo $EmployeeID; ?>">
											</div>
											<div class="form-group col-sm-12 col-md-6">
												<label>Salary Expected</label>
												<input class="form-control" type="text" name="SalaryExpected" autocomplete="off" value="<?php echo $SalaryExpected; ?>">
											</div>
										</div>
										<div class="form-row">
											<div class="form-group col-sm-12 col-md-6">
												<label>Position Desired</label>
												<input class="form-control" type="text" name="PositionDesired" autocomplete="off" value="<?php echo $PositionDesired; ?>">
											</div>
											<div class="form-group col-sm-12 col-md-6">
												<label>Position Group</label>
												<input class="form-control" type="text" name="PositionGroup" autocomplete="off" value="<?php echo $PositionGroup; ?>">
											</div>
										</div>
										<hr>
										<div class="form-row">
											<div class="form-group col-sm-12 col-lg-6">
												<label id="SSS_Text">S.S.S. No.</label>
												<input id="SSS" class="form-control" type="text" name="SSS" autocomplete="off" value="<?php echo $SSS_No; ?>">
											</div>
											<div class="form-group col-sm-12 col-lg-6">
												<label id="HDMF_Text">HDMF</label>
												<input id="HDMF" class="form-control" type="text" name="HDMF" autocomplete="off" value="<?php echo $HDMF; ?>">
											</div>
										</div>
										<div class="form-row">
											<div class="form-group col-sm-12 col-lg-6">
												<label id="RCN_Text">Residence Certificate No.</label>
												<input id="RCN" class="form-control" type="text" name="RCN" autocomplete="off" value="<?php echo $ResidenceCertificateNo; ?>">
											</div>
											<div class="form-group col-sm-12 col-lg-6">
												<label id="PhilHealth_Text">PHILHEALTH</label>
												<input id="PhilHealth" class="form-control" type="text" name="PhilHealth" autocomplete="off" value="<?php echo $PhilHealth; ?>">
											</div>
										</div>
										<div class="form-row">
											<div class="form-group col-sm-12 col-lg-6">
												<label id="TIN_Text">Tax Identification No.</label>
												<input id="TIN" class="form-control" type="text" name="TIN" autocomplete="off" value="<?php echo $TIN; ?>">
											</div>
											<div class="form-group col-sm-12 col-lg-6">
												<label id="ATM_Text">ATM No.</label>
												<input id="ATM" class="form-control" type="text" name="ATM_No" autocomplete="off" value="<?php echo $ATM_No; ?>">
											</div>
										</div>
									</div>
									<div class="form-group col-sm-12 col-md-4">
										<b>Source of Application / Referral</b>
										<input id="Referral" type="hidden" name="Referral" value="<?php echo $Referral; ?>">
										<div class="form-row col-sm-12 mt-2">
											<div class="form-group col-sm-3 col-md-3">
												<button id="ReferralWalkIn" type="button" class="referral-btns btn btn-secondary w-100"><i class="fas fa-check wercher-transparent" style="margin-right: -1px;"></i></button>
											</div>
											<div class="form-group col-sm-9 col-md-9" style="margin-top: 5px;">
												Walk In
											</div>
										</div>
										<div class="form-row col-sm-12">
											<div class="form-group col-sm-3 col-md-3">
												<button id="ReferralJobFair" type="button" class="referral-btns btn btn-secondary w-100"><i class="fas fa-check wercher-transparent" style="margin-right: -1px;"></i></button>
											</div>
											<div class="form-group col-sm-9 col-md-9" style="margin-top: 5px;">
												Job Fair
											</div>
										</div>
										<div class="form-row col-sm-12">
											<div class="form-group col-sm-3 col-md-3">
												<button id="ReferralSocialMedia" type="button" class="referral-btns btn btn-secondary w-100"><i class="fas fa-check wercher-transparent" style="margin-right: -1px;"></i></button>
											</div>
											<div class="form-group col-sm-9 col-md-9" style="margin-top: 5px;">
												Social Media
											</div>
										</div>
										<div class="form-row col-sm-12">
											<div class="form-group col-sm-12 col-md-12">
												Or others, please specify:
											</div>
											<div class="form-group col-sm-12 col-md-12" style="margin-top: 5px;">
												<input id="ReferralOthers" class="form-control" type="text" name="ReferralOthers" autocomplete="off" value="<?php echo $Referral; ?>">
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
										<input class="form-control" type="text" name="Address_Present" autocomplete="off" value="<?php echo $Address_Present; ?>">
									</div>
									<div class="form-group col-sm-12 col-md-4">
										<label>Provincial</label>
										<input class="form-control" type="text" name="Address_Provincial" autocomplete="off" value="<?php echo $Address_Provincial; ?>">
									</div>
									<div class="form-group col-sm-12 col-md-4">
										<label>Manila</label>
										<input class="form-control" type="text" name="Address_Manila" autocomplete="off" value="<?php echo $Address_Manila; ?>">
									</div>
								</div>
								<div class="form-row">
									<div class="form-group col-sm-7 col-md-7">
										<label>Person to notify in case of emergency</label>
										<input class="form-control" type="text" name="EmergencyPerson" autocomplete="off" value="<?php echo $Address_Present; ?>">
									</div>
									<div class="form-group col-sm-1 col-md-1 text-center">
										<p><i class="fas fa-arrow-right" style="margin-right: -1px; color: rgba(0, 0, 0, 0.55);"></i></p>
										<p><i class="fas fa-arrow-right" style="margin-right: -1px; color: rgba(0, 0, 0, 0.55);"></i></p>
									</div>
									<div class="form-group col-sm-4 col-md-4">
										<label>Contact Number</label>
										<input class="form-control" type="text" name="EmergencyContact" autocomplete="off" value="<?php echo $Address_Provincial; ?>">
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
													<th class="text-center">Remove</th>
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
																	<td class="text-center"><input type="checkbox" name="AcadHCheckbox[]" value="<?php echo $row['Acad_No']; ?>"></td>
																</tr>
															<?php } ?>
														<?php endforeach ?>
													<?php } else { ?>
														<tr class="w-100 text-center">
															<td colspan="7">
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
									<div id="AcadHsssistory" class="" style="width: 100%;">
										
									</div>
								</div>
								<div class="form-row pb-5">
									<div class="pb-3">
										<h5>Employment Record </h5>
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
													<th class="text-center">Remove</th>
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
																	<td class="text-center"><input type="checkbox" name="EmpRecordCheckbox[]" value="<?php echo $row['No']; ?>"></td>
																</tr>
															<?php } ?>
														<?php endforeach ?>
													<?php } else { ?>
														<tr class="w-100 text-center">
															<td colspan="7">
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
									<div id="empskills" class="" style="width: 100%;">
										
									</div>
								</div>
								<div class="form-row pb-5">
									<div class="pb-3">
										<h5>Machine Operated </h5>
									</div>
									<div class="col-sm-12">
										<div class="table-responsive">
											<table class="table table-condensed">
												<thead>
													<th>Machine Name</th>
													<th class="text-center">Remove</th>
													
												</thead>
												<tbody>
													<?php if ($Machine_Operatessss->num_rows() > 0) { ?>
														<?php foreach ($Machine_Operatessss->result_array() as $row): ?>
															<?php if ($ApplicantID == $row['ApplicantID']) { ?>
																<tr>
																	<td><?php echo $row['MachineName'];?></td>
																	<td class="text-center"><input type="checkbox" name="MachOpCheckbox[]" value="<?php echo $row['No']; ?>"></td>
																</tr>
															<?php } ?>
														<?php endforeach ?>
													<?php } else { ?>
														<tr class="w-100 text-center">
															<td colspan="2">
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
									<div id="mach_Op" class="" style="width: 100%;">
										
									</div>
								</div>
								<hr>
								<div class="form-row pt-5 pb-4 save-button-bg">
									<div class="form-group mr-auto">
										<button class="btn btn-success btn-lg" type="submit"><i class="fas fa-save"></i> Save</button>
									</div>
									<div class="form-group ml-auto">
										<a href="<?=base_url();?>PrintEmployee?id=<?=$ApplicantID;?>" class="btn btn-success btn-lg"><i class="fas fa-print"></i> Print</a>
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
								<label>Employeer Name</label>
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
	.image-holder {
		position: relative;
		display: block;
	}
	.image-hover:hover {
		border: 2px dotted rgba(155, 155, 155, 1.0);
	}
	.image-hover:hover + .image-text {
		display: block;
		position: absolute;
		top: 1%;
	}
	.image-text {
		display: none;
		pointer-events:none; 
	}
</style>
<?php $this->load->view('_template/users/u_scripts'); ?>
<script type="text/javascript">
	$(document).ready(function () {
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
			if(SSS_List.includes($('#SSS').val())) {
				$('#SSS_Text').html('S.S.S. No. <i class="fas fa-times" style="color: red;"></i>')
			} else {
				$('#SSS_Text').html('S.S.S. No. <i class="fas fa-check" style="color: green;"></i>')
			}
		});
		$('#HDMF').bind("input", function () {
			if(HDMF_List.includes($('#HDMF').val())) {
				$('#HDMF_Text').html('HDMF <i class="fas fa-times" style="color: red;"></i>')
			} else {
				$('#HDMF_Text').html('HDMF <i class="fas fa-check" style="color: green;"></i>')
			}
		});
		$('#RCN').bind("input", function () {
			if(RCN_List.includes($('#RCN').val())) {
				$('#RCN_Text').html('Residence Certificate No. <i class="fas fa-times" style="color: red;"></i>')
			} else {
				$('#RCN_Text').html('Residence Certificate No. <i class="fas fa-check" style="color: green;"></i>')
			}
		});
		$('#PhilHealth').bind("input", function () {
			if(PhilHealth_List.includes($('#PhilHealth').val())) {
				$('#PhilHealth_Text').html('PHILHEALTH <i class="fas fa-times" style="color: red;"></i>')
			} else {
				$('#PhilHealth_Text').html('PHILHEALTH <i class="fas fa-check" style="color: green;"></i>')
			}
		});
		$('#TIN').bind("input", function () {
			if(TIN_List.includes($('#TIN').val())) {
				$('#TIN_Text').html('Tax Identification No. <i class="fas fa-times" style="color: red;"></i>')
			} else {
				$('#TIN_Text').html('Tax Identification No. <i class="fas fa-check" style="color: green;"></i>')
			}
		});
		$('#ATM').bind("input", function () {
			if(ATM_List.includes($('#ATM').val())) {
				$('#ATM_Text').html('ATM No. <i class="fas fa-times" style="color: red;"></i>')
			} else {
				$('#ATM_Text').html('ATM No <i class="fas fa-check" style="color: green;"></i>')
			}
		});
		$('.referral-btns').on('click', function () {
			$('.referral-btns').addClass('btn-secondary');
			$('.referral-btns').removeClass('btn-success');
			$('.referral-btns').children('i').addClass('wercher-transparent');
			$('.referral-btns').children('i').removeClass('wercher-visible');
			$('#ReferralOthers').val('');
		});
		$('#ReferralWalkIn').on('click', function () {
			$(this).addClass('btn-success');
			$(this).children('i').addClass('wercher-visible');
			$('#Referral').val('Walk In');
		});
		$('#ReferralJobFair').on('click', function () {
			$(this).addClass('btn-success');
			$(this).children('i').addClass('wercher-visible');
			$('#Referral').val('Job Fair');
		});
		$('#ReferralSocialMedia').on('click', function () {
			$(this).addClass('btn-success');
			$(this).children('i').addClass('wercher-visible');
			$('#Referral').val('Social Media');
		});
		$('#ReferralOthers').on('change', function () {
			$('.referral-btns').addClass('btn-secondary');
			$('.referral-btns').removeClass('btn-success');
			$('.referral-btns').children('i').addClass('wercher-transparent');
			$('.referral-btns').children('i').removeClass('wercher-visible');
			$('#Referral').val($('#ReferralOthers').val());
		});
		var today = new Date();
		$("#BirthDate").change(function(){

		    var birthDate = new Date($('#BirthDate').val());
		    var age = today.getFullYear() - birthDate.getFullYear();
		    var m = today.getMonth() - birthDate.getMonth();
		    if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
		        age--;
		    }
		   $('#Age').val(age);
		});
		if (localStorage.getItem('SidebarVisible') == 'true') {
			$('#sidebar').addClass('active');
			$('.ncontent').addClass('shContent');
		} else {
			$('#sidebar').css('transition', 'all 0.3s');
			$('#content').css('transition', 'all 0.3s');
		}
		$('#sidebarCollapse').on('click', function () {
			if (localStorage.getItem('SidebarVisible') == 'false') {
				$('#sidebar').addClass('active');
				$('.ncontent').addClass('shContent');
				$('#sidebar').css('transition', 'all 0.3s');
				$('#content').css('transition', 'all 0.3s');
		    	localStorage.setItem('SidebarVisible', 'true');
			} else {
				$('#sidebar').removeClass('active');
				$('.ncontent').removeClass('shContent');
				$('#sidebar').css('transition', 'all 0.3s');
				$('#content').css('transition', 'all 0.3s');
		    	localStorage.setItem('SidebarVisible', 'false');
			}
		});
		$('#blah').click(function(){ $('#imgInp').trigger('click'); });
		function readURL(input) {
			if (input.files && input.files[0]) {
				var reader = new FileReader();
				reader.onload = function(e) {
					$('#blah').attr('src', e.target.result);
				}
				reader.readAsDataURL(input.files[0]);
			}
		}
		$("#imgInp").change(function() {
			readURL(this);
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
	});
</script>
</html>