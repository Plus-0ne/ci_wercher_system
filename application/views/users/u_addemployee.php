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
						<div class="p-5">
							<?php echo $this->session->flashdata('prompts'); ?>
							<div class="mb-3">
								<h5>
									<i class="fas fa-user-alt"></i> Personal Information
								</h5>
							</div>
							<!-- Start form -->
							<form action="<?=base_url()?>addNewEmployee" method="POST" enctype="multipart/form-data">
								<input id="pImageChecker" type="hidden" name="pImageChecker">
								<div class="form-row mb-2">
									<div class="form-group col-sm-12">
										<input type='file' id="imgInp" name="pImage" style="display: none;">
										<?php if(!$this->agent->is_mobile()): ?>
											<img class="image-hover" id="blah" src="<?php echo base_url() ?>assets/img/wercher_default_photo.png" width="120" height="120">
										<?php else: ?>
											<img class="image-hover" id="blah" src="<?php echo base_url() ?>assets/img/wercher_default_photo_mobile.png" width="120" height="120">
										<?php endif; ?>
									</div>
								</div>
								<div class="form-row">
									<div class="form-group col-sm-12 col-md-2">
										<label>Position Desired</label>
										<input class="form-control" type="text" name="PositionDesired" autocomplete="off" value="<?php echo $this->session->flashdata('PositionDesired'); ?>">
									</div>
									<div class="form-group col-sm-12 col-md-2">
										<label>Position Group</label>
										<input class="form-control" type="text" name="PositionGroup" autocomplete="off" value="<?php echo $this->session->flashdata('PositionGroup'); ?>">
										<!-- <select class="form-control" name="PositionGroup">
											<option value="TEST GROUP 1" <?php if ($this->session->flashdata('PositionGroup') == 'TEST GROUP 1') {
												echo 'selected=""';
											} ?>>
												TEST GROUP 1
											</option>
											<option value="TEST GROUP 2" <?php if ($this->session->flashdata('PositionGroup') == 'TEST GROUP 2') {
												echo 'selected=""';
											} ?>>
												TEST GROUP 2
											</option>
											<option value="TEST GROUP 3" <?php if ($this->session->flashdata('PositionGroup') == 'TEST GROUP 3') {
												echo 'selected=""';
											} ?>>
												TEST GROUP 3
											</option>
											<option value="TEST GROUP 4" <?php if ($this->session->flashdata('PositionGroup') == 'TEST GROUP 4') {
												echo 'selected=""';
											} ?>>
												TEST GROUP 4
											</option>
										</select> -->
									</div>
									<div class="form-group col-sm-12 col-md-2">
										<label>Application Date</label>
										<input class="form-control" type="date" name="ApplicationDate" autocomplete="off" value="<?php if ($this->session->flashdata('ApplicationDate')) { echo $this->session->flashdata('ApplicationDate'); } else { echo date('Y-m-d'); } ?>">
									</div>
								</div>
								<div class="form-row">
									<div class="form-group col-sm-12 col-md-4">
										<label>Last Name</label>
										<input class="form-control" type="text" name="LastName" autocomplete="off" value="<?php echo $this->session->flashdata('LastName'); ?>">
									</div>
									<div class="form-group col-sm-12 col-md-4">
										<label>First Name</label>
										<input class="form-control" type="text" name="FirstName" autocomplete="off" value="<?php echo $this->session->flashdata('FirstName'); ?>">
									</div>
									<div class="form-group col-sm-12 col-md-2">
										<label>Middle Initial</label>
										<input class="form-control" type="text" name="MI" autocomplete="off" value="<?php echo $this->session->flashdata('MI'); ?>" maxlength="1">
									</div>
									<div class="form-group col-sm-12 col-md-2">
										<label>Sex</label>
										<select class="form-control" name="Gender">
											<option value="Male" <?php if ($this->session->flashdata('Gender') == 'Male') {
												echo 'selected=""';
											} ?>>
												Male
											</option>
											<option value="Female" <?php if ($this->session->flashdata('Gender') == 'Female') {
												echo 'selected=""';
											} ?>>
												Female
											</option>
										</select>
									</div>
								</div>
								<div class="form-row">
									<div class="form-group col-sm-12 col-md-1">
										<label>Age</label>
										<input id="Age" class="form-control" type="text" value="<?php echo $this->session->flashdata('Age'); ?>" readonly>
									</div>
									<div class="form-group col-sm-12 col-md-1">
										<label>Height</label>
										<input class="form-control" type="text" name="Height" autocomplete="off" value="<?php echo $this->session->flashdata('Height'); ?>">
									</div>
									<div class="form-group col-sm-12 col-md-1">
										<label>Weight</label>
										<input class="form-control" type="text" name="Weight" autocomplete="off" value="<?php echo $this->session->flashdata('Weight'); ?>">
									</div>
									<div class="form-group col-sm-12 col-md-2">
										<label>Religion</label>
										<input class="form-control" type="text" name="Religion" autocomplete="off" value="<?php echo $this->session->flashdata('Religion'); ?>">
									</div>
									<div class="form-group col-sm-12 col-md-2">
										<label>Birth Date</label>
										<input id="BirthDate" class="form-control" type="date" name="bDate" value="<?php echo $this->session->flashdata('bDate'); ?>">
									</div>
									<div class="form-group col-sm-12 col-md-5">
										<label>Birth Place</label>
										<input class="form-control" type="text" name="bPlace" autocomplete="off" value="<?php echo $this->session->flashdata('bPlace'); ?>">
									</div>
								</div>
								<div class="form-row">
									<div class="form-group col-sm-12 col-md-4">
										<label>Citizenship</label>
										<input class="form-control" type="text" name="Citizenship" autocomplete="off" value="<?php echo $this->session->flashdata('Citizenship'); ?>">
									</div>
									<div class="form-group col-sm-12 col-md-2">
										<label>Civil Status</label>
										<select class="form-control" name="CivilStatus">
											<option value="Single" <?php if ($this->session->flashdata('CivilStatus') == 'Single') {
												echo 'selected=""';
											} ?>>
												Single
											</option>
											<option value="Married" <?php if ($this->session->flashdata('CivilStatus') == 'Married') {
												echo 'selected=""';
											} ?>>
												Married
											</option>
											<option value="Widowed" <?php if ($this->session->flashdata('CivilStatus') == 'Widowed') {
												echo 'selected=""';
											} ?>>
												Widowed
											</option>
											<option value="Divorced" <?php if ($this->session->flashdata('CivilStatus') == 'Divorced') {
												echo 'selected=""';
											} ?>>
												Divorced
											</option>
										</select>
									</div>
									<div class="form-group col-sm-12 col-md-2">
										<label>No. of Children</label>
										<input class="form-control" type="number" name="No_Children" autocomplete="off" value="<?php echo $this->session->flashdata('No_Children'); ?>">
									</div>
									<div class="form-group col-sm-12 col-md-4">
										<label>Contact Number</label>
										<input class="form-control" type="text" name="PhoneNumber" autocomplete="off" value="<?php echo $this->session->flashdata('PhoneNumber'); ?>">
									</div>
								</div>
								<div class="mt-5 mb-4">
									<h5>
										<i class="fas fa-user-alt"></i> Documents
									</h5>
								</div>
								<div class="form-row">
									<div class="form-group col-sm-12 col-lg-3">
										<label>S.S.S. #</label>
										<input class="form-control" type="text" name="SSS" autocomplete="off" value="<?php echo $this->session->flashdata('SSS'); ?>">
									</div>
									<div class="form-group col-sm-12 col-lg-3">
										<label>Effective Date of Coverage</label>
										<input class="form-control" type="date" name="SSS_Effective" value="<?php echo $this->session->flashdata('SSS_Effective'); ?>">
									</div>
								</div>
								<div class="form-row">
									<div class="form-group col-sm-12 col-lg-3">
										<label>Residence Certificate No.</label>
										<input class="form-control" type="text" name="RCN" autocomplete="off" value="<?php echo $this->session->flashdata('RCN'); ?>">
									</div>
								</div>
								<div class="form-row">
									<div class="form-group col-sm-12 col-lg-3">
										<label>Tax Identification No.</label>
										<input class="form-control" type="text" name="TIN" autocomplete="off" value="<?php echo $this->session->flashdata('TIN'); ?>">
									</div>
								</div>
								<div class="form-row">
									<div class="form-group col-sm-12 col-lg-3">
										<label>HDMF</label>
										<input class="form-control" type="text" name="HDMF" autocomplete="off" value="<?php echo $this->session->flashdata('HDMF'); ?>">
									</div>
								</div>
								<div class="form-row">
									<div class="form-group col-sm-12 col-lg-3">
										<label>PHILHEALTH</label>
										<input class="form-control" type="text" name="PhilHealth" autocomplete="off" value="<?php echo $this->session->flashdata('PhilHealth'); ?>">
									</div>
								</div>
								<div class="form-row">
									<div class="form-group col-sm-12 col-lg-3">
										<label>ATM #</label>
										<input class="form-control" type="text" name="ATM_No" autocomplete="off" value="<?php echo $this->session->flashdata('ATM_No'); ?>">
									</div>
								</div>
								<div class="mt-5 mb-4">
									<h5>
										<i class="fas fa-user-alt"></i> Addresses
									</h5>
								</div>
								<div class="form-row">
									<div class="form-group col-sm-12 col-md-4">
										<label>Present</label>
										<input class="form-control" type="text" name="Address_Present" autocomplete="off" value="<?php echo $this->session->flashdata('Address_Present'); ?>">
									</div>
									<div class="form-group col-sm-12 col-md-4">
										<label>Provincial</label>
										<input class="form-control" type="text" name="Address_Provincial" autocomplete="off" value="<?php echo $this->session->flashdata('Address_Provincial'); ?>">
									</div>
									<div class="form-group col-sm-12 col-md-4">
										<label>Manila</label>
										<input class="form-control" type="text" name="Address_Manila" autocomplete="off" value="<?php echo $this->session->flashdata('Address_Manila'); ?>">
									</div>
								</div>
								<div class="form-row pb-5 pt-5">
									<div class="pb-3">
										<h5><i class="fas fa-stream"></i> Academic History</h5>
									</div>
									<div id="AcadHsssistory" class="" style="width: 100%;">
										
									</div>
								</div>
								<div class="form-row pb-5">
									<div class="pb-3">
										<h5><i class="fas fa-stream"></i> Employment Record </h5>
									</div>
									<div id="empskills" class="" style="width: 100%;">
										
									</div>
								</div>
								<div class="form-row pb-5">
									<div class="pb-3">
										<h5><i class="fas fa-stream"></i> Machine Operated </h5>
									</div>
									<div id="mach_Op" class="" style="width: 100%;">
										
									</div>
								</div>
								
								<div class="form-row pt-5 pb-4">
									<div class="form-group mr-auto">
										<button class="btn btn-primary" type="submit"><i class="fas fa-save"></i> Save</button>
									</div>
									<div class="form-group ml-auto">
										<a href="<?=base_url()?>Applicants" class="btn btn-secondary"><i class="fas fa-chevron-left"></i> Back</a>
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
	<div class="modal fade" id="SalaryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-xl" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Salary Expected</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="#" method="post">
						<div class="form-row">
							<div class="form-group col-sm-12 col-md-2">
								<label>Type</label>
								<select class="form-control" name="SalaryType">
									<option value="Weekly">
										Weekly
									</option>
									<option value="Monthly">
										Monthly
									</option>
									<option value="Semi-Monthly">
										Semi-Monthly
									</option>
								</select>
							</div>
							<div class="form-group col-sm-12 col-md-2">
								<label>Salary</label>
								<input id="SalaryRaw" class="form-control" type="number" name="">
							</div>
							<div id="SalaryOvertimeFade" class="form-group col-sm-12 col-md-2 ml-auto" style="display: none;">
								<label>Overtime Bonus</label>
								<input id="SalaryOvertime" class="form-control" type="text" name="" readonly>
							</div>
						</div>
						<div id="SalaryDays" class="form-row" style="display: none;">
							<div class="form-group col-sm-12 col-md-12 text-center">
								<table id="SalaryTable" class="table table-condensed">
									<th>Monday</th>
									<th>Tuesday</th>
									<th>Wednesday</th>
									<th>Thursday</th>
									<th>Friday</th>
									<th>Saturday</th>
									<tr>
										<td><input id="SalaryDayOne" class="form-control" type="text" name="" readonly></td>
										<td><input id="SalaryDayTwo" class="form-control" type="text" name="" readonly></td>
										<td><input id="SalaryDayThree" class="form-control" type="text" name="" readonly></td>
										<td><input id="SalaryDayFour" class="form-control" type="text" name="" readonly></td>
										<td><input id="SalaryDayFive" class="form-control" type="text" name="" readonly></td>
										<td><input id="SalaryDaySix" class="form-control" type="text" name="" readonly></td>
									</tr>
									<tr>
										<td>Hours</td>
										<td>Hours</td>
										<td>Hours</td>
										<td>Hours</td>
										<td>Hours</td>
										<td>Hours</td>
									</tr>
									<tr>
										<td><input id="HoursDayOne" class="form-control" type="number" name="" value="8"></td>
										<td><input id="HoursDayTwo" class="form-control" type="number" name="" value="8"></td>
										<td><input id="HoursDayThree" class="form-control" type="number" name="" value="8"></td>
										<td><input id="HoursDayFour" class="form-control" type="number" name="" value="8"></td>
										<td><input id="HoursDayFive" class="form-control" type="number" name="" value="8"></td>
										<td><input id="HoursDaySix" class="form-control" type="number" name="" value="8"></td>
									</tr>
									<tr>
										<td colspan="2">Estimated Per Hour</td>
									</tr>
									<tr>
										<td colspan="2"><input id="SalaryPerHour" class="form-control" type="text" name="" readonly></td>	
									</tr>
								</table>
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
	$(document).ready(function () {
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
		$('#DebugFill').on('click', function () {
			$('input[type="number"]').val(Math.floor(Math.random() * Math.floor(99)));
			$('input[type="text"]').val('TEST-' + Math.floor(Math.random() * Math.floor(9999999)));
			$('input[type="date"]').val(moment().format('YYYY-MM-DD'));
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
			$('#pImageChecker').val('Has Image')
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