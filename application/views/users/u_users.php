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
								<li class="breadcrumb-item"><a href="">Home</a></li>
								<li class="breadcrumb-item active" aria-current="page">Employee</li>
							</ol>
						</nav>
					</div>
				</div>
				<div class="row rcontent">
					<?php echo $this->session->flashdata('prompts'); ?>
					<div class="col-4 col-sm-4 col-md-4 PrintPageName PrintOut">
						<h4>
							<i class="fas fa-user-tie fa-fw"></i> Employees (<?php echo $get_employee->num_rows() ?>)
						</h4>
					</div>
					<div class="col-8 col-sm-8 col-md-8 text-right PrintExclude">
						<div id="datatables-export"></div>
					</div>
					<div class="col-sm-12">
						<div class="table-responsive pt-5 pb-5 pl-2 pr-2">
							<table id="emp" class="table table-striped table-bordered PrintOut" style="width: 100%;">
								<thead>
									<tr>
										<th> Applicant </th>
										<th> Applicant ID </th>
										<th> Position </th>
										<th> Full Name </th>
										<th> Client </th>
										<th> Date Hired </th>
										<th> End of Contract </th>
										<th class="PrintExclude"> Action </th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($get_employee->result_array() as $row): ?>
										<tr>
											<td class="text-center">
												<img src="<?php echo $row['ApplicantImage']; ?>" width="70" height="70">
											</td>
											<td class="text-center align-middle">
												<?php echo $row['ApplicantID']; ?>
											</td>
											<td class="text-center align-middle">
												<?php echo $row['PositionDesired']; ?>
											</td>
											<td class="text-center align-middle">
												<?php echo $row['LastName']; ?>, <?php echo $row['FirstName']; ?> <?php echo $row['MiddleInitial']; ?>.
											</td>
											<?php foreach ($getClientOption->result_array() as $nrow): ?>
												<?php if ($row['ClientEmployed'] == $nrow['ClientID']) {
													echo '<td class="text-center align-middle">
													'.$nrow['Name'].'
													</td>';
												} ?>
											<?php endforeach ?>
											<td class="text-center align-middle">
												<?php echo $row['DateStarted']; ?>
											</td>
											<td class="text-center align-middle">
												<?php echo $row['DateEnds']; ?>
											</td>
											<td class="text-center align-middle PrintExclude" width="110">
												<a class="btn btn-primary btn-sm w-100 mb-1" href="<?=base_url()?>ViewEmployee?id=<?php echo $row['ApplicantID']; ?>"><i class="far fa-eye"></i> View</a>
												<button id="<?php echo $row['ApplicantID']; ?>" type="button" class="btn btn-info btn-sm w-100 mb-1 doc_btn" data-toggle="modal" data-target="#AddSuppDoc"><i class="fas fa-file-upload"></i> Documents</button>
												<!-- <button type="button" class="btn btn-info btn-sm w-100 mb-1" data-toggle="modal" data-target="#HoursWeeklyModal"><i  class="fas fa-clock"></i> Work</button> -->
												<!-- <a class="btn btn-secondary btn-sm w-100 mb-1" href="#"onclick=" return confirm('Update Employee?')"><i class="fas fa-user-edit"></i> Update</a> -->
												<a href="<?=base_url()?>RemoveEmployee?id=<?php echo $row['ApplicantID']; ?>" class="btn btn-danger btn-sm w-100 mb-1" href="#" onclick="return confirm('Remove Employee?')"><i class="fas fa-lock"></i> Archive</a>
											</td>
										</tr>
									<?php endforeach ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Modal -->
	<div class="modal fade" id="AddSuppDoc" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			
			<div class="modal-content">
				<?php echo form_open_multipart(base_url().'AddSupDoc','method="post"'); ?>
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Add Documents</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<input id="Pass_ID" type="hidden" name="ApplicantID">
					<div class="form-group col-sm-12 text-center">
						<input type='file' id="imgInp" name="pImage" style="display: none;">
						<?php if(!$this->agent->is_mobile()): ?>
							<img class="image-hover" id="blah" src="<?php echo base_url() ?>assets/img/wercher_default_photo.png" width="120" height="120">
							<?php else: ?>
								<img class="image-hover" id="blah" src="<?php echo base_url() ?>assets/img/wercher_default_photo_mobile.png" width="120" height="120">
							<?php endif; ?>
						</div>
						<div class="form-group col-sm-12 text-center">
							<label>Subject</label>
							<input class="form-control" type="text" name="Subject">
						</div>
						<div class="form-group col-sm-12 text-center">
							<label>Description</label>
							<textarea class="form-control" name="Description" rows="6"></textarea>
						</div>
						<div class="form-group col-sm-12 text-center">
							<label>Remarks</label>
							<textarea class="form-control" name="Remarks" rows="6"></textarea>
						</div>
					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-primary">Add changes</button>
					</div>
					<?php echo form_close(); ?>
				</div>
				
			</div>
		</div>
	</body>
	<?php $this->load->view('_template/users/u_scripts'); ?>
	<script type="text/javascript">
		$(document).ready(function () {
			$('#sidebarCollapse').on('click', function () {
				$('#sidebar').toggleClass('active');
				$('.ncontent').toggleClass('shContent');
			});
			var emp_dt = $('#emp').DataTable( {
				"order": [[ 5, "desc" ]]
			});
			var dd_buttons = new $.fn.dataTable.Buttons(emp_dt, {
				buttons: [
				{
					extend: 'collection',
					text: '<i class="fas fa-download"></i> Export',
					className: 'btn btn-primary',

					buttons: [
					{
						extend: 'copy',
						text: '<div class="btn btn-sm btn-info w-100">Copy</div>',
						className: 'dropdown-item w-25 ml-auto',
						exportOptions: {
							columns: [ 1, 2, 3, 4, 5 ]
						}
					},
					{
						extend: 'csv',
						text: '<div class="btn btn-sm btn-info w-100">CSV</div>',
						className: 'dropdown-item w-25 ml-auto',
						exportOptions: {
							columns: [ 1, 2, 3, 4, 5 ]
						}
					},
					{
						extend: 'excel',
						text: '<div class="btn btn-sm btn-info w-100">Excel</div>',
						className: 'dropdown-item w-25 ml-auto',
						exportOptions: {
							columns: [ 1, 2, 3, 4, 5 ]
						}
					},
					{
						extend: 'pdf',
						text: '<div class="btn btn-sm btn-info w-100">PDF</div>',
						className: 'dropdown-item w-25 ml-auto',
						exportOptions: {
							columns: [ 1, 2, 3, 4, 5 ]
						}
					},
					{
						extend: 'print',
						text: '<div class="btn btn-sm btn-info w-100">Print</div>',
						className: 'dropdown-item w-25 ml-auto',
						exportOptions: {
							columns: [ 1, 2, 3, 4, 5 ]
						}
					},
					]
				}
				]
			}).container().appendTo($('#datatables-export'));
			$('#MoreOptions').on('click', function () {
				$('#MoreOptions').hide();
				$('.modal-fade').fadeIn();
			});

			$('#SalaryRaw,#HoursDayOne,#HoursDayTwo,#HoursDayThree,#HoursDayFour,#HoursDayFive,#HoursDaySix').on('input', function() {
			// TODO: Clean & optimize this.
			$('#SalaryOvertimeFade').fadeIn();
			$('#SalaryDays').fadeIn();

			var HourOne = $("#HoursDayOne").val();
			var HourTwo = $("#HoursDayTwo").val();
			var HourThree = $("#HoursDayThree").val();
			var HourFour = $("#HoursDayFour").val();
			var HourFive = $("#HoursDayFive").val();
			var HourSix = $("#HoursDaySix").val();

			var SalaryWeekly = $('#SalaryRaw').val();
			var TotalHoursInAWeek = parseFloat(HourOne) + parseFloat(HourTwo) + parseFloat(HourThree) + parseFloat(HourFour) + parseFloat(HourFive) + parseFloat(HourSix);
			var SalaryPerHour = SalaryWeekly / TotalHoursInAWeek;
			$('#SalaryPerHour').val(SalaryPerHour.toFixed(2));

			var SalaryPerDay = SalaryPerHour * parseFloat(HourOne);
			$('#SalaryDayOne').val(SalaryPerDay.toFixed(2));
			SalaryPerDay = SalaryPerHour * parseFloat(HourTwo);
			$('#SalaryDayTwo').val(SalaryPerDay.toFixed(2));
			SalaryPerDay = SalaryPerHour * parseFloat(HourThree);
			$('#SalaryDayThree').val(SalaryPerDay.toFixed(2));
			SalaryPerDay = SalaryPerHour * parseFloat(HourFour);
			$('#SalaryDayFour').val(SalaryPerDay.toFixed(2));
			SalaryPerDay = SalaryPerHour * parseFloat(HourFive);
			$('#SalaryDayFive').val(SalaryPerDay.toFixed(2));
			SalaryPerDay = SalaryPerHour * parseFloat(HourSix);
			$('#SalaryDaySix').val(SalaryPerDay.toFixed(2));
		});
			$('.doc_btn').on('click', function () {
				$('#Pass_ID').val($(this).attr('id'));
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
		});
	</script>
	</html>