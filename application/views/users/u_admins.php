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
								<li class="breadcrumb-item active" aria-current="page">Admins</li>
							</ol>
						</nav>
					</div>
				</div>
				<div class="row rcontent">
					<?php echo $this->session->flashdata('prompts'); ?>
					<div class="col-4 col-sm-4 col-md-4 PrintPageName PrintOut">
						<h4 >
							<i class="fas fa-user-secret fa-fw"></i>Admins (<?php echo $ShowAdmin->num_rows() ?>)
						</h4>
					</div>
					<div class="col-8 col-sm-8 col-md-8 text-right PrintExclude">
						<button onClick="printContent('PrintOut')" type="button" class="btn btn-primary mr-auto"><i class="fas fa-print"></i> Print</button>
					</div>
					<div class="col-sm-12">
						<div class="table-responsive pt-5 pb-5 pl-2 pr-2">
							<table id="ListAdmins" class="table table-striped table-bordered PrintOut" style="width: 100%;">
								<thead>
									<tr>
										<th> Level </th>
										<th> Position </th>
										<th> Employee ID </th>
										<th> Full Name </th>
										<th> Gender </th>
										<th> Date Added </th>
										<th class="PrintExclude"> Action </th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($ShowAdmin->result_array() as $row): ?>
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
												<?php echo $row['FirstName'] ; ?> <?php echo $row['MiddleInitial'] ; ?>. <?php echo $row['LastName'] ; ?>
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
											<td class="text-center align-middle PrintExclude">
												<?php if ($ShowAdmin->num_rows() > 1) { ?>
													<a href="<?=base_url()?>RemoveAdmin?id=<?php echo $row['AdminNo']; ?>" class="btn btn-danger btn-sm w-100 mb-1" onclick="return confirm('Remove Admin?')"><i class="fas fa-trash"></i> Delete</a>
												<?php } else { ?>
													<button class="btn btn-secondary btn-sm w-100 mb-1" onclick="alert('Must have 1 admin minimum.')"><i class="fas fa-lock"></i> Delete</button>
												<?php } ?>
											</td>
										</tr>
									<?php endforeach ?>
								</tbody>
							</table>
						</div>
					</div>
					<div class="p-2">
						<a href="#" class="btn btn-primary" onclick="return confirm('Add Admin?')" data-toggle="modal" data-target="#add_UserAdmin" data-backdrop="static" data-keyboard="false">
							<i class="fas fa-user-plus"></i> New
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- MODALS -->
	<div class="modal fade" id="add_UserAdmin" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
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
</body>
<?php $this->load->view('_template/users/u_scripts'); ?>
<script type="text/javascript">
	$(document).ready(function () {
		$('#sidebarCollapse').on('click', function () {
			$('#sidebar').toggleClass('active');
			$('.ncontent').toggleClass('shContent');
		});
		$('#ListAdmins').DataTable();
	});
</script>
</html>