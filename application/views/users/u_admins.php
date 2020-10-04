<?php 

$T_Header;
require 'vendor/autoload.php';
use Carbon\Carbon;

?>
<body>
	<div class="wrapper wercher-background-lowpoly">
		<?php $this->load->view('_template/users/u_sidebar'); ?>
		<div id="content" class="ncontent">
			<div class="container-fluid">
				<?php $this->load->view('_template/users/u_notifications'); ?>
				<div class="col-12 col-sm-12 tabs">
					<ul>
						<li class="tabs-active"><a href="<?php echo base_url() ?>Admins">Admins (<?php echo $ShowAdmin->num_rows()?>)</a></li>
						<li><a href="<?php echo base_url() ?>AdminsArchived">Archived</a></li>
					</ul>
				</div>
				<div class="row rcontent">
					<div class="col-5 PrintPageName PrintOut">
						<i class="fas fa-info-circle"></i>
						<i>Found <?php echo $ShowAdmin->num_rows(); ?> admin<?php if($ShowAdmin->num_rows() != 1): echo 's'; endif;?> currently stored in the database.
						</i>
					</div>
					<div class="col-7 text-right">
						<span class="input-bootstrap">
							<i class="sorting-table-icon spinner-border spinner-border-sm mr-2"></i>
							<input id="DTSearch" type="search" class="input-bootstrap" placeholder="Sorting table..." readonly>
						</span>
						<button class="btn btn-success" data-toggle="modal" data-target="#add_UserAdmin">
							<i class="fas fa-user-plus"></i> New
						</button>
						<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ExportModal"><i class="fas fa-download"></i> Export</button>
					</div>
					<div class="col-sm-12">
						<div class="table-responsive pt-2 pb-5 pl-2 pr-2">
							<table id="ListAdmins" class="table PrintOut" style="width: 100%;">
								<thead>
									<tr class="text-center">
										<th> Username </th>
										<th> Full Name </th>
										<th> Access Level </th>
										<th> Date Added </th>
										<th class="d-none"> Date Added </th>
										<th style="width: 325px;"> Latest Activity </th>
										<th class="PrintExclude" style="width: 100px;"> Action </th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($ShowAdmin->result_array() as $row): 
										$date = new DateTime($row['DateAdded']);
										$day = $date->format('Y-m-d');
										$day = DateTime::createFromFormat('Y-m-d', $day)->format('F d, Y');
										$hours = $date->format('h:i:s A');
										$elapsed = Carbon::parse($date);

										$thumbnail = $row['Image'];
										$thumbnail = substr($thumbnail, 0, -4);
										$thumbnail = $thumbnail . '_thumb.jpg';

										$GetLatestAdminActivity = $this->Model_Selects->GetLatestAdminActivity($row['AdminID'], 1);
										if ($GetLatestAdminActivity->num_rows() > 0) {
											$isActivityNotEmpty = true;
											foreach($GetLatestAdminActivity->result_array() as $arow) {
												$LatestActivityEvent = $arow['Event'];
												$LatestActivityEvent[1]= strtoupper($LatestActivityEvent[1]); // Capitalize second letter (first letter is a space)
												$LatestActivityTime = $arow['Time'];
												$activityDate = new DateTime($LatestActivityTime);
												$activityDay = $activityDate->format('Y-m-d');
												$activityDay = DateTime::createFromFormat('Y-m-d', $activityDay)->format('F d, Y');
												$activityHours = $activityDate->format('h:i:s A');
												$activityElapsed = Carbon::parse($activityDate);
											}
										} else {
											$isActivityNotEmpty = false;
										}

										?>
										<tr>
											<td class="text-center">
												<div class="col-sm-12">
													<?php if(!empty($row['Image'])): ?>
														<img src="<?php echo $thumbnail; ?>" width="70" height="70" class="rounded-circle">
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
											<td class="text-center align-middle" data-toggle="tooltip" data-placement="top" data-html="true" title="<?php echo $elapsed->diffForHumans(); ?>">
												<div class="d-none">
													<?php echo $row['DateAdded']; ?>
												</div>
												<?php
													echo $day . '<br>' . $hours;
												?>
											</td>
											<td class="text-center align-middle d-none">
												<?php echo $day . ' at ' . $hours; ?>
											</td>
											<?php if ($isActivityNotEmpty): ?>
 											<td class="text-center align-middle" data-toggle="tooltip" data-placement="top" data-html="true" title="<?php echo $activityDay . '<br>' . $activityHours; ?>">
												<div class="d-none">
													<?php echo $LatestActivityTime; ?>
												</div>
												<?php
													echo ucfirst($LatestActivityEvent) . '<br>' . '<span style="color: rgba(0, 0, 0, 0.5);"><i>' . $activityElapsed->diffForHumans() . '</i></span>';
												?>
											</td>
											<?php else: ?>
											<td class="text-center align-middle">
												No record.
											</td>
											<?php endif; ?>
											<td class="text-center align-middle PrintExclude">
												<a href="<?=base_url()?>Logbook?admin=<?php echo $row['AdminID']; ?>" class="btn btn-primary btn-sm w-100 mb-1"><i class="fas fa-book"></i> Logbook</a>
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
							<label>Access Level</label>
							<select class="form-control" name="AdminLevel">
								<option value="Level_1">Level 1</option>
								<option value="Level_2">Level 2</option>
								<option value="Level_3">Level 3</option>
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
		$('.sorting-table-icon').hide();
		$('#DTSearch').attr('placeholder', 'Search table');
		$('#DTSearch').attr('readonly', false);
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
			sDom: 'lrtip',
			"bLengthChange": false,
	        buttons: [
	            {
		            extend: 'print',
		            exportOptions: {
		                columns: [ 0, 1, 2, 4 ]
		            }
		        },
		        {
		            extend: 'copyHtml5',
		            exportOptions: {
		                columns: [ 0, 1, 2, 4 ]
		            }
		        },
		        {
		            extend: 'excelHtml5',
		            exportOptions: {
		                columns: [ 0, 1, 2, 4 ]
		            }
		        },
		        {
		            extend: 'csvHtml5',
		            exportOptions: {
		                columns: [ 0, 1, 2, 4 ]
		            }
		        },
		        {
		            extend: 'pdfHtml5',
		            exportOptions: {
		                columns: [ 0, 1, 2, 4 ]
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
	    $('#DTSearch').on('keyup change', function(){
			table.search($(this).val()).draw();
		})
	});
</script>
</html>