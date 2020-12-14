<?php $T_Header;?>
<body>
	<div class="wrapper wercher-background-lowpoly">
		<?php $this->load->view('_template/users/u_sidebar'); ?>
		<div id="content" class="ncontent">
			<div class="container-fluid">
				<?php $this->load->view('_template/users/u_notifications'); ?>
				<?php if(!isset($_GET['query']) || ($SearchApplicantID->num_rows() < 1 AND $SearchEmployeeID->num_rows < 1 AND $SearchPeople->num_rows() < 1 AND $SearchClients->num_rows() < 1 AND $SearchPositionGroups->num_rows() < 1 AND $SearchPositionSpecific->num_rows() < 1 AND $SearchAdmins->num_rows() < 1 )): ?>
					<div class="row wercher-tablelist-container">
						<div class="col-sm-12">
							<i class="fas fa-exclamation-triangle"></i> We've come up empty! No data found.
						</div>
					</div>
				<?php else: 
					if ($this->Model_Security->CheckPermissions('DashboardLogbook')): ?>
					<!-- APPLICANT ID -->
					<?php if($SearchApplicantID->num_rows() > 0): ?>
					<div class="row wercher-tablelist-container">
						<div class="col-4 col-sm-4 col-md-4 PrintPageName PrintOut">
							<h4 class="tabs-icon">
								<i class="fas fa-id-card fa-fw"></i> Applicant ID x <?php echo $SearchApplicantID->num_rows() ?>
							</h4>
						</div>
						<div class="col-sm-12">
							<div class="table-responsive pt-2 pb-5">
								<table id="emp" class="table PrintOut" style="width: 100%;">
									<thead>
										<tr class="text-center">
											<th> Applicant </th>
											<th> Full Name </th>
											<th> Position Desired </th>
											<th> Applied On </th>
											<th class="PrintExclude"> Action </th>
										</tr>
									</thead>
									<tbody>
										<?php foreach ($SearchApplicantID->result_array() as $row): ?>
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
												<td class="text-center align-middle PrintExclude" width="100">
													<a class="btn btn-primary btn-sm w-100 mb-1" href="<?=base_url()?>ViewEmployee?id=<?php echo $row['ApplicantID']; ?>"><i class="far fa-eye"></i> View</a>
												</td>
											</tr>
										<?php endforeach ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<?php endif; ?>
					<?php if($SearchEmployeeID->num_rows() > 0): ?>
					<!-- EMPLOYEE ID -->
					<div class="row wercher-tablelist-container">
						<div class="col-4 col-sm-4 col-md-4 PrintPageName PrintOut">
							<h4 class="tabs-icon">
								<i class="fas fa-user-secret fa-fw"></i> Employee ID x <?php echo $SearchEmployeeID->num_rows() ?>
							</h4>
						</div>
						<div class="col-sm-12">
							<div class="table-responsive pt-2 pb-5 pl-2 pr-2">
								<table id="emp" class="table table-bordered PrintOut" style="width: 100%;">
									<thead>
										<tr class="text-center">
											<th style="width: 25%"> Employee </th>
											<th> Full Name </th>
											<th> Position </th>
											<th class="PrintExclude"> Action </th>
										</tr>
									</thead>
									<tbody>
										<?php foreach ($SearchEmployeeID->result_array() as $row): ?>
											<tr>
												<td class="text-center">
													<div class="col-sm-12">
														<img src="<?php echo $row['ApplicantImage']; ?>" width="70" height="70" class="rounded-circle">
													</div>
													<div class="col-sm-12 align-middle">
														<?php if($row['EmployeeID'] != NULL): ?>
															<?php echo $row['EmployeeID']; ?>
														<?php else: ?>
															<?php echo 'No Employee ID'; ?>
														<?php endif; ?>
													</div>
												</td>
												<td class="text-center align-middle">
													<?php echo $row['LastName']; ?>, <?php echo $row['FirstName']; ?> <?php if($row['MiddleName'] != ''): echo $row['MiddleName'] . '.'; endif; ?>
												</td>
												<td class="text-center align-middle">
													<?php echo $row['PositionDesired']; ?>
												</td>
												<td class="text-center align-middle PrintExclude" width="110">
													<a class="btn btn-primary btn-sm w-100 mb-1" href="<?=base_url()?>ViewEmployee?id=<?php echo $row['ApplicantID']; ?>"><i class="far fa-eye"></i> View</a>
												</td>
											</tr>
										<?php endforeach ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<?php endif; ?>
					<?php if($SearchPeople->num_rows() > 0): ?>
					<!-- PEOPLE (NAMES) -->
					<div class="row wercher-tablelist-container">
						<div class="col-4 col-sm-4 col-md-4 PrintPageName PrintOut">
							<h4 class="tabs-icon">
								<i class="fas fa-users fa-fw"></i> People x <?php echo $SearchPeople->num_rows() ?>
							</h4>
						</div>
						<div class="col-sm-12">
							<?php echo $this->session->flashdata('prompts'); ?>
							<div class="table-responsive pt-2 pb-5">
								<table id="emp" class="table PrintOut" style="width: 100%;">
									<thead>
										<tr class="text-center">
											<th> Applicant </th>
											<th> Full Name </th>
											<th> Position Desired </th>
											<th> Applied On </th>
											<th class="PrintExclude"> Action </th>
										</tr>
									</thead>
									<tbody>
										<?php foreach ($SearchPeople->result_array() as $row): ?>
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
												<td class="text-center align-middle PrintExclude" width="100">
													<a class="btn btn-primary btn-sm w-100 mb-1" href="<?=base_url()?>ViewEmployee?id=<?php echo $row['ApplicantID']; ?>"><i class="far fa-eye"></i> View</a>
												</td>
											</tr>
										<?php endforeach ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<?php endif; ?>
					<?php if($SearchClients->num_rows() > 0): ?>
					<!-- CLIENTS (NAMES) -->
					<div class="row wercher-tablelist-container">
						<div class="col-4 col-sm-4 col-md-4 PrintPageName PrintOut">
							<h4 class="tabs-icon">
								<i class="fas fa-users fa-fw"></i> Clients x <?php echo $SearchClients->num_rows() ?>
							</h4>
						</div>
						<div class="col-sm-12">
							<div class="table-responsive pt-2 pb-5 pl-2 pr-2">
								<table id="ListClients" class="table PrintOut" style="width: 100%;">
									<thead>
										<tr class="text-center align-middle">
											<th> Name </th>
											<th> Address </th>
											<th> Contact </th>
											<th> Employees </th>
											<th class="text-center PrintExclude" style="width: 5%;"> Action </th>
										</tr>
									</thead>
									<tbody>
										<?php foreach ($SearchClients->result_array() as $row): ?>
											<tr class="text-center align-middle">
												<td>
													<?php echo $row['Name']; ?>
												</td>
												<td>
													<?php echo $row['Address']; ?>
												</td>
												<td>
													<?php echo $row['ContactNumber']; ?>
												</td>
												<td>
													<?php echo $this->Model_Selects->GetWeeklyListEmployee($row['ClientID'])->num_rows(); ?>
												</td>
												<td class="text-center align-middle PrintExclude">
													<a class="btn btn-primary btn-sm w-100 mb-1" href="<?=base_url()?>Clients?id=<?php echo $row['ClientID']; ?>"><i class="fas fa-users"></i> Employees</a>
												</td>
											</tr>
										<?php endforeach ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<?php endif; ?>
					<?php if($SearchPositionGroups->num_rows() > 0): ?>
					<!-- POSITION GROUPS -->
					<div class="row wercher-tablelist-container">
						<div class="col-4 col-sm-4 col-md-4 PrintPageName PrintOut">
							<h4 class="tabs-icon">
								<i class="fas fa-user-secret fa-fw"></i> Position Groups x <?php echo $SearchPositionGroups->num_rows() ?>
							</h4>
						</div>
						<div class="col-sm-12">
							<div class="table-responsive pt-2 pb-5 pl-2 pr-2">
								<table id="emp" class="table table-bordered PrintOut" style="width: 100%;">
									<thead>
										<tr class="text-center">
											<th style="width: 25%"> Employee </th>
											<th> Full Name </th>
											<th> Position Desired </th>
											<th> Position Group </th>
											<th class="PrintExclude"> Action </th>
										</tr>
									</thead>
									<tbody>
										<?php foreach ($SearchPositionGroups->result_array() as $row): ?>
											<tr>
												<td class="text-center">
													<div class="col-sm-12">
														<img src="<?php echo $row['ApplicantImage']; ?>" width="70" height="70" class="rounded-circle">
													</div>
													<div class="col-sm-12 align-middle">
														<?php if($row['EmployeeID'] != NULL): ?>
															<?php echo $row['EmployeeID']; ?>
														<?php else: ?>
															<?php echo 'No Employee ID'; ?>
														<?php endif; ?>
													</div>
												</td>
												<td class="text-center align-middle">
													<?php echo $row['LastName']; ?>, <?php echo $row['FirstName']; ?> <?php if($row['MiddleName'] != ''): echo $row['MiddleName'] . '.'; endif; ?>
												</td>
												<td class="text-center align-middle">
													<?php echo $row['PositionDesired']; ?>
												</td>
												<td class="text-center align-middle">
													<?php echo $row['PositionGroup']; ?>
												</td>
												<td class="text-center align-middle PrintExclude" width="110">
													<a class="btn btn-primary btn-sm w-100 mb-1" href="<?=base_url()?>ViewEmployee?id=<?php echo $row['ApplicantID']; ?>"><i class="far fa-eye"></i> View</a>
												</td>
											</tr>
										<?php endforeach ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<?php endif; ?>
					<?php if($SearchPositionSpecific->num_rows() > 0): ?>
					<!-- POSITION Specific -->
					<div class="row wercher-tablelist-container">
						<div class="col-4 col-sm-4 col-md-4 PrintPageName PrintOut">
							<h4 class="tabs-icon">
								<i class="fas fa-user-secret fa-fw"></i> Position Desired x <?php echo $SearchPositionSpecific->num_rows() ?>
							</h4>
						</div>
						<div class="col-sm-12">
							<div class="table-responsive pt-2 pb-5 pl-2 pr-2">
								<table id="emp" class="table table-bordered PrintOut" style="width: 100%;">
									<thead>
										<tr class="text-center">
											<th style="width: 25%"> Employee </th>
											<th> Full Name </th>
											<th> Position Desired </th>
											<th> Position Group </th>
											<th class="PrintExclude"> Action </th>
										</tr>
									</thead>
									<tbody>
										<?php foreach ($SearchPositionSpecific->result_array() as $row): ?>
											<tr>
												<td class="text-center">
													<div class="col-sm-12">
														<img src="<?php echo $row['ApplicantImage']; ?>" width="70" height="70" class="rounded-circle">
													</div>
													<div class="col-sm-12 align-middle">
														<?php if($row['EmployeeID'] != NULL): ?>
															<?php echo $row['EmployeeID']; ?>
														<?php else: ?>
															<?php echo 'No Employee ID'; ?>
														<?php endif; ?>
													</div>
												</td>
												<td class="text-center align-middle">
													<?php echo $row['LastName']; ?>, <?php echo $row['FirstName']; ?> <?php if($row['MiddleName'] != ''): echo $row['MiddleName'] . '.'; endif; ?>
												</td>
												<td class="text-center align-middle">
													<?php echo $row['PositionDesired']; ?>
												</td>
												<td class="text-center align-middle">
													<?php echo $row['PositionGroup']; ?>
												</td>
												<td class="text-center align-middle PrintExclude" width="110">
													<a class="btn btn-primary btn-sm w-100 mb-1" href="<?=base_url()?>ViewEmployee?id=<?php echo $row['ApplicantID']; ?>"><i class="far fa-eye"></i> View</a>
												</td>
											</tr>
										<?php endforeach ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<?php endif; ?>
					<?php if($SearchAdmins->num_rows() > 0): ?>
					<!-- POSITION Specific -->
					<div class="row wercher-tablelist-container">
						<div class="col-4 col-sm-4 col-md-4 PrintPageName PrintOut">
							<h4 class="tabs-icon">
								<i class="fas fa-user-secret fa-fw"></i> Admins x <?php echo $SearchAdmins->num_rows() ?>
							</h4>
						</div>
						<div class="col-sm-12">
							<div class="table-responsive pt-2 pb-5 pl-2 pr-2">
								<table id="ListAdmins" class="table table-bordered PrintOut" style="width: 100%;">
									<thead>
										<tr>
											<th> Level </th>
											<th> Position </th>
											<th> Employee ID </th>
											<th> Full Name </th>
											<th> Gender </th>
											<th> Date Added </th>
										</tr>
									</thead>
									<tbody>
										<?php foreach ($SearchAdmins->result_array() as $row): ?>
											<tr>
												<td class="text-center align-middle">
													<?php
													switch ($row['AdminLevel']) {
														case 'Level_1':
															echo "Level 1";
															break;
														case 'Level_2':
															echo "Level 2";
															break;
														case 'Level_3':
															echo "Level 3";
															break;
														
														default:
															echo "ERROR";
															break;
													}
													?>
												</td>
												<td class="text-center align-middle">
													<?php echo $row['Position'] ; ?>
												</td>
												<td class="text-center align-middle">
													<?php echo $row['AdminID'] ; ?>
												</td>
												<td class="text-center align-middle">
													<?php echo $row['FirstName'] ; ?> <?php echo $row['MiddleName'] ; ?>. <?php echo $row['LastName'] ; ?>
												</td>
												<td class="text-center align-middle">
													<?php echo $row['Gender'] ; ?>
												</td>
												<td class="text-center align-middle">
													<?php
													date_default_timezone_set('Asia/Manila');
													echo date('m/d/Y H:i:s a',$row['DateAdded']);
													?>
												</td>
											</tr>
										<?php endforeach ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<?php endif; ?>
				<?php endif; ?>
			</div>
		</div>
	</div>
	<!-- MODALS -->
	<div class="modal fade" id="add_UserAdmin" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<?php echo form_open(base_url().'Add_NewAdmin','method="post"');?>
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle">Add Admin</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body p-5">
					<div class="form-row">
						<div class="form-group m-1 col">
							<label>Admin Level</label>
							<select class="form-control" name="AdminLevel">
								<option value="Level_1">Level 1 President / Developer</option>
								<option value="Level_2">Level 2 Human Resource</option>
								<option value="Level_3">Level 3 Accounting</option>
							</select>
						</div>
						<div class="form-group m-1 col">
							<label>Position</label>
							<select class="form-control" name="Position">
								<option value="Developer">Developer</option>
								<option value="President">President</option>
								<option value="HR_Manager">HR Manager</option>
								<option value="HR_Assistant">HR Assistant</option>
								<option value="Accounting_Manager">Accounting Manager</option>
								<option value="Accounting_Assistant">Accounting Assistant</option>
							</select>
						</div>
					</div>
					<div class="form-row">
						<div class="form-group m-1 col">
							<label>Admin ID</label>
							<input class="form-control" type="text" name="AdminID">
						</div>
						<div class="form-group m-1 col">
							<label>Password</label>
							<input class="form-control" type="text" name="Password">
						</div>
					</div>
					<div class="form-row">
						<div class="form-group m-1 col">
							<label>First Name</label>
							<input class="form-control" type="text" name="FirstName">
						</div>
						<div class="form-group m-1 col">
							<label>Middle Initial/Name</label>
							<input class="form-control" type="text" name="MiddleIN">
						</div>
						<div class="form-group m-1 col">
							<label>Last Name</label>
							<input class="form-control" type="text" name="LastName">
						</div>
					</div>
					<div class="form-row">
						<div class="form-group m-1">
							<label>Gender</label>
							<select class="form-control" name="Gender">
								<option>Male</option>
								<option>Female</option>
							</select>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary">Save</button>
				</div>
			</div>
			<?php echo form_close();?>
		</div>
	</div>
	<!-- EXPORT MODAL -->
	<?php $this->load->view('_template/modals/m_export'); ?>
</body>
<?php $this->load->view('_template/users/u_scripts'); ?>
<script type="text/javascript">
	$(document).ready(function () {
		$('[data-toggle="tooltip"]').tooltip();
		var table = $('#ListAdmins').DataTable( {
        buttons: [
            {
	            extend: 'print',
	            exportOptions: {
	                columns: [ 1, 2, 3, 4, 5 ]
	            },
	            customize: function ( doc ) {
	            	$(doc.document.body).find('h1').prepend('<img src="<?=base_url()?>assets/img/wercher_logo.png" width="63px" height="56px" />');
					$(doc.document.body).find('h1').css('font-size', '24px');
					$(doc.document.body).find('h1').css('text-align', 'center'); 
				}
	        },
	        {
	            extend: 'copyHtml5',
	            exportOptions: {
	                columns: [ 1, 2, 3, 4, 5 ]
	            }
	        },
	        {
	            extend: 'excelHtml5',
	            exportOptions: {
	                columns: [ 1, 2, 3, 4, 5 ]
	            }
	        },
	        {
	            extend: 'csvHtml5',
	            exportOptions: {
	                columns: [ 1, 2, 3, 4, 5 ]
	            }
	        },
	        {
	            extend: 'pdfHtml5',
	            exportOptions: {
	                columns: [ 1, 2, 3, 4, 5 ]
	            }
	        }
        ]
    } );
		$('#ExportPrint').on('click', function () {
	        table.button('0').trigger();
	    });
	    $('#ExportCopy').on('click', function () {
	        table.button('1').trigger();
	    });
	    $('#ExportExcel').on('click', function () {
	        table.button('2').trigger();
	    });
	    $('#ExportCSV').on('click', function () {
	        table.button('3').trigger();
	    });
	    $('#ExportPDF').on('click', function () {
	        table.button('4').trigger();
	    });
	});
</script>
</html>