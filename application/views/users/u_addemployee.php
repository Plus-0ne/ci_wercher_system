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
								<li class="breadcrumb-item" aria-current="page">Employee</li>
								<li class="breadcrumb-item active" aria-current="page">Add</li>
							</ol>
						</nav>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12 rcontent">
						<div class="p-5">
							<?php echo $this->session->flashdata('prompts'); ?>
							<div class="pb-3">
								<h5>
									<i class="fas fa-user-alt"></i> Personal Information
								</h5>
							</div>
							<!-- Start form -->
							<form action="<?=base_url()?>addNewEmployee" method="POST" enctype="multipart/form-data">
								<div class="form-row mb-2">
									<div class="form-group col-sm-12 col-md-1 mr-5">
										<input type='file' id="imgInp" name="pImage" style="display: none;">
										<img id="blah" src="https://avatarsed1.serversdev.getgo.com/2205256774854474505_medium.jpg" width="120" height="120">
									</div>
								</div>
								<div class="form-row">
									<div class="form-group col-sm-12 col-md-2">
										<label>Employment Type</label>
										<select class="form-control" name="EmploymentType">
											<option>
												Employee
											</option>
											<option>
												On-Call
											</option>
										</select>
									</div>
								</div>
								<div class="form-row">
									<div class="form-group col-sm-12 col-md-4">
										<label>Last Name</label>
										<input class="form-control" type="text" name="LastName">
									</div>
									<div class="form-group col-sm-12 col-md-4">
										<label>First Name</label>
										<input class="form-control" type="text" name="FirstName">
									</div>
									<div class="form-group col-sm-12 col-md-2">
										<label>Middle Initial</label>
										<input class="form-control" type="text" name="MI">
									</div>
									<div class="form-group col-sm-12 col-md-2">
										<label>Gender</label>
										<select class="form-control" name="Gender">
											<option>
												Male
											</option>
											<option>
												Female
											</option>
										</select>
									</div>
								</div>
								<div class="form-row">

									<div class="form-group col-sm-12 col-md-8">
										<label>Address</label>
										<input class="form-control" type="text" name="Address">
									</div>
									<div class="form-group col-sm-12 col-md-2">
										<label>Marital Status</label>
										<select class="form-control" name="MaritalStatus">
											<option>
												Single
											</option>
											<option>
												Married
											</option>
											<option>
												Widow
											</option>
											<option>
												Divorce
											</option>
										</select>
									</div>
									<div class="form-group col-sm-12 col-md-2">
										<label>Birth Date</label>
										<input class="form-control" type="date" name="bDate">
									</div>
								</div>
								<div class="form-row">
									<div class="form-group col-sm-12 col-md-8">
										<label>Birth Place</label>
										<input class="form-control" type="text" name="bPlace">
									</div>
									<div class="form-group col-sm-12 col-md-4">
										<label>Project Assigned</label>
										<input class="form-control" type="text" name="ProjectAssigned">
									</div>
								</div>
								<div class="form-row">
									<div class="form-group col-sm-12 col-md-2">
										<label>Date Separated</label>
										<input class="form-control" type="date" name="DateSeparated">
									</div>
								</div>
								<div class="pb-3">
									<h5>
										<i class="fas fa-user-alt"></i> Benificiaries
									</h5>
								</div>
								<div class="form-row pt-4 pb-4">
									<div class="form-group col-sm-12 col-md-2 text-center m-auto">
										<!-- <img src="assets/img/sss_logo_yugatech1.jpg" width="200"> -->
										<input id="ssstb" class=" mt-3 text-center form-control" type="text" name="SSS" placeholder="SSS #">
									</div>
									<div class="form-group col-sm-12 col-md-2 text-center m-auto">
										<!-- <img src="assets/img/1200px-Philippine_Health_Insurance_Corporation_(PhilHealth).svg (1).png" width="200"> -->
										<input id="phealtb" class=" mt-3 text-center form-control" type="text" name="Philhealth" placeholder="Philhealth #">
									</div>
									<div class="form-group col-sm-12 col-md-2 text-center m-auto">
										<!-- <img src="assets/img/2000px-Pag-IBIG.svg.png" width="80"> -->
										<input id="HDMFb" class=" mt-3 text-center form-control" type="text" name="HDMF" placeholder="HDMF #">
									</div>
									<div class="form-group col-sm-12 col-md-2 text-center m-auto">
										<!-- <img src="assets/img/Bureau_of_Internal_Revenue_(BIR).svg.png" width="85"> -->
										<input id="TINb" class=" mt-3 text-center form-control" type="text" name="TIN" placeholder="TIN #">
									</div>
									<div class="form-group col-sm-12 col-md-2 text-center m-auto">
										<!-- <img src="assets/img/iStock_ATMSmallw.jpg" width="70"> -->
										<input id="ATMb" class=" mt-3 text-center form-control" type="text" name="ATM" placeholder="ATM">
									</div>
								</div>
								<!-- <div class="form-row pb-4">
									<div class="form-group col-sm-12 col-md-2 text-center m-auto">
										<input id="ssscbox" class="in-beni form-control" type="checkbox" name="" value="Ok">
									</div>
									<div class="form-group col-sm-12 col-md-2 text-center m-auto">
										<input id="phealtcbox" class="in-beni form-control" type="checkbox" name="" value="Ok">
									</div>
									<div class="form-group col-sm-12 col-md-2 text-center m-auto">
										<input id="HDMFcbox" class="in-beni form-control" type="checkbox" name="" value="Ok">
									</div>
									<div class="form-group col-sm-12 col-md-2 text-center m-auto">
										<input id="TINcbox" class="in-beni form-control" type="checkbox" name="" value="Ok">
									</div>
									<div class="form-group col-sm-12 col-md-2 text-center m-auto">
										<input id="ATMcbox" class="in-beni form-control" type="checkbox" name="" value="Ok">
										
									</div>
								</div> -->
								<div class="form-row pt-4 pb-4">
									<div class="form-group col-sm-12 col-md-2 text-center m-auto">
										<div id="sssa">
											
										</div>
									</div>
									<div class="form-group col-sm-12 col-md-2 text-center m-auto">
										<div id="phealta">
											
										</div>
									</div>
									<div class="form-group col-sm-12 col-md-2 text-center m-auto">
										<div id="HDMFa">
											
										</div>
									</div>
									<div class="form-group col-sm-12 col-md-2 text-center m-auto">
										<div id="TINa">
											
										</div>
									</div>
									<div class="form-group col-sm-12 col-md-2 text-center m-auto">
										<div id="ATMa">
											
										</div>
									</div>
								</div>
								<div class="form-row pb-5 pt-5">
									<div id="AcadHsssistory" class="" style="width: 100%;">
										
									</div>
								</div>
								<div class="form-row pb-5">
									<div id="empskills" class="" style="width: 100%;">
										
									</div>
								</div>
								<div class="form-row pt-5 pb-4">
									<div class="form-group mr-auto">
										<button class="btn btn-primary" type="submit"><i class="fas fa-save"></i> Save</button>
									</div>
									<div class="form-group ml-auto">
										<a href="<?=base_url()?>Employee" class="btn btn-secondary"><i class="fas fa-chevron-left"></i> Back</a>
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
										Primary
									</option>
									<option>
										Secodary
									</option>
									<option>
										Tertiary
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
							<div class="form-group col-sm-3 m-auto">
								<input id="FromYearSchool" class="form-control" type="text" name="FromYearSchool" placeholder="From year" maxlength="4">
							</div>
							<div class="form-group col-sm-3 m-auto">
								<input id="ToYearSchool" class="form-control" type="text" name="ToYearSchool" placeholder="To year" maxlength="4">
							</div>
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button id="add_sssscc" type="submit" class="btn btn-primary" data-dismiss="modal" aria-label="Close">Add changes</button>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="skillsFields" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Skill Details</h5>
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
										Primary
									</option>
									<option>
										Secodary
									</option>
									<option>
										Tertiary
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
							<div class="form-group col-sm-3 m-auto">
								<input id="FromYearSchool" class="form-control" type="text" name="FromYearSchool" placeholder="From year" maxlength="4">
							</div>
							<div class="form-group col-sm-3 m-auto">
								<input id="ToYearSchool" class="form-control" type="text" name="ToYearSchool" placeholder="To year" maxlength="4">
							</div>
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button id="add_sssscc" type="submit" class="btn btn-primary" data-dismiss="modal" aria-label="Close">Add changes</button>
				</div>
			</div>
		</div>
	</div>
</body>
<style type="text/css">
	.in-beni:focus { box-shadow: none; }
	.btn-tr { background-color: transparent; border: none; }
</style>
<?php $this->load->view('_template/users/u_scripts'); ?>
<script type="text/javascript">
	$(document).ready(function () {
		$('#sidebarCollapse').on('click', function () {
			$('#sidebar').toggleClass('active');
			$('.ncontent').toggleClass('shContent');
		});
		// $('#ssscbox').on('click', function () {
		// 	if ($('#ssscbox').prop("checked") == true) 
		// 	{
		// 		$('#sssa').append('<input id="ssstb" class=" mt-3 text-center form-control" type="text" name="SSS" placeholder="SSS #">');
		// 	}
		// 	else
		// 	{
		// 		$('#ssstb').remove();
		// 	}
		// });
		// $('#phealtcbox').on('click', function () {
		// 	if ($('#phealtcbox').prop("checked") == true) 
		// 	{
		// 		$('#phealta').append('<input id="phealtb" class=" mt-3 text-center form-control" type="text" name="Philhealth" placeholder="Philhealth #">');
		// 	}
		// 	else
		// 	{
		// 		$('#phealtb').remove();
		// 	}
		// });
		// $('#HDMFcbox').on('click', function () {
		// 	if ($('#HDMFcbox').prop("checked") == true) 
		// 	{
		// 		$('#HDMFa').append('<input id="HDMFb" class=" mt-3 text-center form-control" type="text" name="HDMF" placeholder="HDMF #">');
		// 	}
		// 	else
		// 	{
		// 		$('#HDMFb').remove();
		// 	}
		// });
		// $('#TINcbox').on('click', function () {
		// 	if ($('#TINcbox').prop("checked") == true) 
		// 	{
		// 		$('#TINa').append('<input id="TINb" class=" mt-3 text-center form-control" type="text" name="TIN" placeholder="TIN #">');
		// 	}
		// 	else
		// 	{
		// 		$('#TINb').remove();
		// 	}
		// });
		// $('#ATMcbox').on('click', function () {
		// 	if ($('#ATMcbox').prop("checked") == true) 
		// 	{
		// 		$('#ATMa').append('<input id="ATMb" class=" mt-3 text-center form-control" type="text" name="ATM" placeholder="ATM">');
		// 	}
		// 	else
		// 	{
		// 		$('#ATMb').remove();
		// 	}
		// });
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
			var FromYearSchool = $('#FromYearSchool').val();
			var ToYearSchool = $('#ToYearSchool').val();
			$.ajax({
				url : "<?php echo site_url('Main_Controller/add_to_cart');?>",
				method : "POST",
				data : {SchoolLevel: SchoolLevel, SchoolName: SchoolName, FromYearSchool: FromYearSchool, ToYearSchool: ToYearSchool},
				success: function(data){
					$('#SchoolLevel').val("");
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

		$('#empskills').load("<?php echo site_url('Main_Controller/showSkills');?>");
	});
</script>
</html>