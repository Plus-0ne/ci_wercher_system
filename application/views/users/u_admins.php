<?php $T_Header;?>
<body>
	<div class="wrapper wercher-background-lowpoly">
		<?php $this->load->view('_template/users/u_sidebar'); ?>
		<div id="content" class="ncontent">
			<div class="container-fluid">
				<?php $this->load->view('_template/users/u_notifications'); ?>
				<div class="row wercher-tablelist-container">
					<?php echo $this->session->flashdata('prompts'); ?>
					<div class="col-4 col-sm-4 col-md-4 PrintPageName PrintOut">
						<h4 class="tabs-icon">
							<i class="fas fa-user-secret fa-fw"></i> Admins x <?php echo $ShowAdmin->num_rows() ?>
						</h4>
					</div>
					<div class="col-8 col-sm-8 col-md-8 text-right">
						<a href="#" class="btn btn-primary" data-toggle="modal" data-target="#add_UserAdmin">
							<i class="fas fa-user-plus"></i> New
						</a>
						<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ExportModal"><i class="fas fa-download"></i> Export</button>
					</div>
					<div class="col-sm-12">
						<div class="table-responsive pt-2 pb-5 pl-2 pr-2">
							<table id="ListAdmins" class="table table-bordered PrintOut" style="width: 100%;">
								<thead>
									<tr class="text-center">
										<th> Username </th>
										<th> Full Name </th>
										<th> Level </th>
										<th> Date Added </th>
										<th class="PrintExclude" style="width: 5%;"> Action </th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($ShowAdmin->result_array() as $row): ?>
										<tr>
											<td class="text-center">
												<div class="col-sm-12">
													<?php if(!empty($row['Image'])): ?>
														<img src="<?php echo $row['Image']; ?>" width="70" height="70" class="rounded-circle">
													<?php else: ?>
														<img src="<?=base_url()?>assets/img/wercher_noimage_blue.png" width="70" height="70" class="rounded-circle">
													<?php endif; ?>
												</div>
												<div class="col-sm-12 align-middle">
													<?php if($row['AdminID'] != NULL): ?>
														<?php echo $row['AdminID']; ?>
													<?php else: ?>
														<?php echo 'No username'; ?>
													<?php endif; ?>
												</div>
											</td>
											<td class="text-center align-middle">
												<?php echo $row['LastName']; ?>, <?php echo $row['FirstName']; ?> <?php if($row['MiddleInitial'] != ''): echo $row['MiddleInitial'] . '.'; endif; ?>
											</td>
											<td class="text-center align-middle">
												<?php
												switch ($row['AdminLevel']) {
													case 'Level_1':
														echo "Level 1 - " . $row['Position'];
														break;
													case 'Level_2':
														echo "Level 2 - " . $row['Position'];
														break;
													case 'Level_3':
														echo "Level 3 - " . $row['Position'];
														break;
													
													default:
														echo "ERROR";
														break;
												}
												?>
											</td>
											<td class="text-center align-middle">
												<?php
													echo date('m-d-Y H:i:s A',$row['DateAdded']);
												?>
											</td>
											<td class="text-center align-middle PrintExclude">
												<?php if ($ShowAdmin->num_rows() > 1) { ?>
													<a href="<?=base_url()?>RemoveAdmin?id=<?php echo $row['AdminNo']; ?>" class="btn btn-danger btn-sm w-100 mb-1" onclick="return confirm('Remove Admin?')"><i class="fas fa-trash"></i> Delete</a>
												<?php } else { ?>
													<button data-toggle="tooltip" data-placement="top" data-html="true" title="Must have 1 admin minimum." class="btn btn-secondary btn-sm w-100 mb-1 wercher-hover-disabled" onclick="alert('Must have 1 admin minimum.')"><i class="fas fa-lock"></i> Delete</button>
												<?php } ?>
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
	<!-- MODALS -->
	<div class="modal fade" id="add_UserAdmin" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<form action="<?=base_url()?>Add_NewAdmin" method="post" enctype="multipart/form-data">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle">Add Admin</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body p-5">
					<div class="form-row">
						<div class="form-group ml-auto mr-auto">
							<input id="pImageChecker" type="hidden" name="pImageChecker">
							<input type='file' id="imgInp" name="adminImage" style="display: none;">
							<?php if(!$this->agent->is_mobile()): ?>
								<img class="image-hover" id="blah" src="<?php echo base_url() ?>assets/img/wercher_default_photo.png" width="192" height="192">
							<?php else: ?>
								<img class="image-hover" id="blah" src="<?php echo base_url() ?>assets/img/wercher_default_photo_mobile.png" width="192" height="192">
							<?php endif; ?>
						</div>
					</div>
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
							<input class="form-control" type="password" name="Password">
						</div>
					</div>
					<div class="form-row">
						<div class="form-group m-1 col">
							<label>First Name</label>
							<input class="form-control" type="text" name="FirstName">
						</div>
						<div class="form-group m-1 col">
							<label>Middle Name</label>
							<input class="form-control" type="text" name="MiddleIN">
						</div>
						<div class="form-group m-1 col">
							<label>Last Name</label>
							<input class="form-control" type="text" name="LastName">
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary">Save</button>
				</div>
			</div>
			</form>
		</div>
	</div>
	<!-- EXPORT MODAL -->
	<?php $this->load->view('_template/modals/m_export'); ?>
</body>
<?php $this->load->view('_template/users/u_scripts'); ?>
<script type="text/javascript">
	$(document).ready(function () {
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
		$('[data-toggle="tooltip"]').tooltip();
		var table = $('#ListAdmins').DataTable( {
        buttons: [
            {
	            extend: 'print',
	            exportOptions: {
	                columns: [ 1, 2, 3, 4, 5 ]
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