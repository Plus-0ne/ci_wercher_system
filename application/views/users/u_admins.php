<?php 

$T_Header;
require 'vendor/autoload.php';
use Carbon\Carbon;

?>
<body>
	<div class="wrapper wercher-background-lowpoly-red">
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
						<?php if($this->Model_Security->CheckPermissions('AdminsEditing')): ?>
						<button class="btn btn-success" data-toggle="modal" data-target="#add_UserAdmin">
							<i class="fas fa-user-plus"></i> New
						</button>
						<?php endif; ?>
						<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ExportModal"><i class="fas fa-download"></i> Export</button>
					</div>
					<div class="col-sm-12">
						<div class="table-responsive pt-2 pb-5 pl-2 pr-2">
							<table id="ListAdmins" class="table PrintOut" style="width: 100%;">
								<thead>
									<tr class="text-center">
										<th> Admin ID </th>
										<th> Full Name / Position </th>
										<th class="d-none"> Full Name </th>
										<th class="d-none"> Position </th>
										<th> Date Added </th>
										<th class="d-none"> Date Added </th>
										<th style="width: 325px;"> Latest Activity </th>
										<th class="PrintExclude" style="width: 100px;"> Action </th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($ShowAdmin->result_array() as $row):
										$isDateAddedValid = false;
										if ($row['DateAdded']) {
											$date = new DateTime($row['DateAdded']);
											$day = $date->format('Y-m-d');
											$day = DateTime::createFromFormat('Y-m-d', $day)->format('F d, Y');
											$hours = $date->format('h:i:s A');
											$elapsed = Carbon::parse($date);
											$isDateAddedValid = true;
										}

										$thumbnail = $row['Image'];
										$thumbnailType = substr($thumbnail, -4);
										$thumbnail = substr($thumbnail, 0, -4);
										$thumbnail = $thumbnail . '_thumb' . $thumbnailType;

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

										// Name Handler
										$fullName = '';
										$fullNameHover = '';
										$isFullNameHoverable = false;
										if ($row['LastName']) {
											$fullName = $fullName . $row['LastName'] . ', ';
											$fullNameHover = $fullNameHover . $row['LastName'] . ', ';
										} else {
											$fullNameHover = $fullNameHover . '[<i>No Last Name</i>], ';
											$isFullNameHoverable = true;
										}
										if ($row['FirstName']) {
											$fullName = $fullName . $row['FirstName'] . ' ';
											$fullNameHover = $fullNameHover . $row['FirstName'] . ' ';
										} else {
											$fullNameHover = $fullNameHover . '[<i>No First Name</i>] ';
											$isFullNameHoverable = true;
										}
										if ($row['MiddleName']) {
											$fullName = $fullName . $row['MiddleName'][0] . '.';
											$fullNameHover = $fullNameHover . $row['MiddleName'][0] . '.';
										} else {
											$fullNameHover = $fullNameHover . '[<i>No MI</i>].';
											$isFullNameHoverable = true;
										}
										if (strlen($fullName) > 25) {
											$fullName = substr($fullName, 0, 25);
											$fullName = $fullName . '...';
											$isFullNameHoverable = true;
										}

										?>
										<tr class="table-row-hover">
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
												<a href="Logbook?admin=<?php echo $row['AdminID']; ?>"<?php if($isFullNameHoverable): ?> data-toggle="tooltip" data-placement="top" data-html="true" title="<?php echo $fullNameHover; ?>"<?php endif; ?>><?php echo $fullName; ?></a>
												<br>
												<i style="color: gray;"><?php echo $row['Position']; ?></i>
												<br>
											</td>
											<td class="text-center align-middle d-none">
												<?php echo $fullName; ?>
											</td>
											<td class="text-center align-middle d-none">
												<?php echo $row['Position']; ?>
											</td>
											<?php if ($isDateAddedValid): ?>
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
											<?php else: ?>
											<td class="text-center align-middle">
												<i style="color: gray;">No record.</i>
											</td>
											<td class="text-center align-middle d-none">
												--
											</td>
											<?php endif; ?>
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
												<i style="color: gray;">No record.</i>
											</td>
											<?php endif; ?>
											<td class="text-center align-middle PrintExclude">
												<!-- <a href="<?=base_url()?>Logbook?admin=<?php echo $row['AdminID']; ?>" class="btn btn-primary btn-sm w-100 mb-1"><i class="fas fa-book"></i> Logbook</a> -->
												<button type="button" class="btn btn-primary btn-sm w-100 admin-moreinfo-btn mb-1" data-toggle="modal" data-target="#AdminMoreInfoModal" data-adminid="<?php echo $row['AdminID']; ?>" data-adminimage="<?php echo $row['Image']; ?>" data-adminposition="<?php echo $row['Position']; ?>" data-adminpermissions="<?php echo $row['Permissions']; ?>" data-adminlastname="<?php echo $row['LastName']; ?>" data-adminfirstname="<?php echo $row['FirstName']; ?>" data-adminmiddlename="<?php echo $row['MiddleName']; ?>" data-adminnotes="<?php echo $row['Notes']; ?>" data-activityelapsed="<?php echo $activityElapsed->diffForHumans(); ?>"><i class="fas fa-address-card"></i> More Info</button>
												<?php if($this->Model_Security->CheckPermissions('AdminsEditing')): ?>
												<button type="button" class="btn btn-info btn-sm w-100 edit-admin-btn" data-toggle="modal" data-target="#EditAdminModal" data-admindatabaseid="<?php echo $row['AdminNo']; ?>" data-adminid="<?php echo $row['AdminID']; ?>" data-adminimage="<?php echo $row['Image']; ?>" data-adminposition="<?php echo $row['Position']; ?>" data-adminpermissions="<?php echo $row['Permissions']; ?>" data-adminlastname="<?php echo $row['LastName']; ?>" data-adminfirstname="<?php echo $row['FirstName']; ?>" data-adminmiddlename="<?php echo $row['MiddleName']; ?>" data-adminnotes="<?php echo $row['Notes']; ?>" data-status="<?php echo $row['Status']; ?>"><i class="fas fa-edit"></i> Edit</button>
												<?php endif; ?>
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
	<!-- ADD NEW ADMIN MODAL -->
	<?php $this->load->view('_template/modals/m_addadmin'); ?>
	<!-- SET PERMISSIONS MODAL -->
	<?php $this->load->view('_template/modals/m_adminpermissions'); ?>
	<!-- SET PASSWORDS MODAL -->
	<?php $this->load->view('_template/modals/m_adminpassword'); ?>
	<!-- ADMIN EDIT MODAL -->
	<?php $this->load->view('_template/modals/m_adminedit'); ?>
	<!-- EDIT PERMISSIONS MODAL -->
	<?php $this->load->view('_template/modals/m_admineditpermissions'); ?>
	<!-- EDIT PASSWORD MODAL -->
	<?php $this->load->view('_template/modals/m_admineditpassword'); ?>
	<!-- EXPORT MODAL -->
	<?php $this->load->view('_template/modals/m_export'); ?>
	<!-- MORE INFO MODAL -->
	<?php $this->load->view('_template/modals/m_adminmoreinfo'); ?>
</body>
<?php $this->load->view('_template/users/u_scripts'); ?>
<script type="text/javascript">
	$(document).ready(function () {
		var permissionsCart = [];
		var permissionsCartForEdit = [];
		function resetPermissionsCart() {
			permissionsCart = [];
			$('#SetPermissions').find('.form-row').each(function() {
				$(this).find('.form-group').removeClass('setpermissions-checked-text');
				$(this).find('button').removeClass('btn-success');
				$(this).find('button').children('i').removeClass('wercher-visible');
				$(this).find('button').addClass('btn-secondary');
				$(this).find('button').children('i').addClass('wercher-transparent');
			});
		}
		function resetEditPermissionsCart() {
			permissionsCartForEdit = [];
			$('#EditSetPermissions').find('.form-row').each(function() {
				$(this).find('.form-group').removeClass('setpermissions-checked-text');
				$(this).find('button').removeClass('btn-success');
				$(this).find('button').children('i').removeClass('wercher-visible');
				$(this).find('button').addClass('btn-secondary');
				$(this).find('button').children('i').addClass('wercher-transparent');
			});
		}
		// Local storage
		// ~ preloading
		var inputCart = {
			items: []
		};
		var cartName = 'inputAdminCart';
		let inputFieldCounter = 0;
		<?php if(!empty($this->session->flashdata('isAdminAdded'))): ?>
			inputCart = JSON.parse(localStorage.getItem(cartName));
			if (inputCart) {
				let inputCartLength = inputCart.items.length;
				for(let i = 0; i < inputCartLength; i++) {
					localStorage.removeItem(inputCart.items[i]);
				}
			}
		<?php endif; ?>
		var adminIDList = [];
		<?php foreach($this->Model_Selects->GetAllAdmins()->result_array() as $row): ?>
		adminIDList.push("<?php echo $row['AdminID']; ?>");
		<?php endforeach; ?>
		var permissionsList = localStorage.getItem('PermissionsCart');
		if (permissionsList) {
			var permissionsListString = permissionsList.toString().replace(/[\[\]']+/g,'');
			permissionsListString = permissionsListString.replace(/"/g,'');
		}
		// console.log(permissionsListString);
		$('#InputFields input, textarea, select, #PasswordFields input, #SetPermissions button').each(function() {
			let inputFieldName = $(this).attr('name'); // Fetch input location
			let inputFieldValue = localStorage.getItem(inputFieldName); // Fetch input value from storage
			if(inputFieldValue) {
				if (inputFieldName != 'PermissionsCart') { // Excluded
					$(this).val(inputFieldValue); // Assign input value to location from storage
					inputCart.items.push(inputFieldName); // Sending as JSON
					localStorage.setItem(cartName, JSON.stringify(inputCart));
				}
			}
			if (inputFieldName == 'PermissionsCart') {
				if (inputFieldValue) {
					let inputFieldArray = inputFieldValue.toString().replace(/[\[\]']+/g,'');
					inputFieldArray = inputFieldArray.replace(/"/g,'');
					inputFieldArray = inputFieldArray.split(',');
					for (i = 0; i < inputFieldArray.length; i++) {
						permissionsCart.push(inputFieldArray[i]);
					}
					console.log(permissionsCart);
				}
			}
			let permissionsFieldName = $(this).data('permissions');
			if (permissionsCart.includes(permissionsFieldName)) { // Permissions
				// console.log(permissionsFieldName);
				$(this).parent('.form-group').parent('.form-row').find('.form-group').addClass('setpermissions-checked-text');
				$(this).addClass('btn-success');
				$(this).removeClass('btn-secondary');
				$(this).children('i').addClass('wercher-visible');
				$(this).children('i').removeClass('wercher-transparent');
				$('#PermissionsCart').val(permissionsListString);
			}
			if (inputFieldName == 'AdminPosition') {
				if (inputFieldValue) {
					$('#Position').val(inputFieldValue);
					$('.position-select').val(inputFieldValue);
					$('.position-select').removeClass('glow-gold');
					$('.setpermissions-valid-group').show();
					$('.setpermissions-locked-group').hide();
					$('.setpermissions-btn').addClass('glow-gold');
				}
			}
			if (inputFieldName == 'AdminID' || inputFieldName == 'PasswordHolder' || inputFieldName == 'AdminPosition') { // Required fields
				if (inputFieldValue) { // Has data
					inputFieldCounter++;
					if (inputFieldCounter >= 3) {
						$('.save-btn-locked-group').hide();
						$('.save-btn-valid-group').show();
					}
				}
				if (inputFieldName == 'AdminID' && adminIDList.includes(inputFieldValue)) {
					$('.save-btn-locked-group-text').text('Admin ID exists');
					$('.save-btn-locked-group').show();
					$('.save-btn-valid-group').hide();
				}
				if (inputFieldName == 'PasswordHolder') {
					if (inputFieldValue) {
						$('#PasswordHolder').val(inputFieldValue);
						$('#AdminPassword').toggleClass('btn-success btn-info');
						$('.password-btn-locked-group').hide();
						$('.password-btn-valid-group').show();
					}
				}
			}
		});
		// ~ input
		$('#InputFields input, textarea, select, #PasswordFields input').bind("input", function() {
			let inputName = $(this).attr('name');
			localStorage.setItem(inputName, $(this).val());
			if (!inputCart.items.includes(inputName)) {
				inputCart.items.push(inputName); // Sending as JSON
				localStorage.setItem(cartName, JSON.stringify(inputCart));
			} else { // Field is inside the cart
				let index = inputCart.items.indexOf(inputName);
				if (!$(this).val()) { // Check if string is empty
					inputCart.items.splice(index, 1);
					localStorage.setItem(cartName, JSON.stringify(inputCart));
					localStorage.removeItem(inputName); // Remove local storage if empty
				}
			}
			if (inputName == 'AdminID' || inputName == 'AdminPassword' || inputName == 'AdminPosition') {
				if (!$('#AdminID').val() || !$('#PasswordHolder').val() || !$('#Position').val()) { // Required fields
					$('.save-btn-locked-group-text').text('ID, password, and position is required');
					$('.save-btn-locked-group').show();
					$('.save-btn-valid-group').hide();
				} else {
					if (adminIDList.includes($('#AdminID').val())) {
						$('.save-btn-locked-group-text').text('Admin ID exists');
						$('.save-btn-locked-group').show();
						$('.save-btn-valid-group').hide();
					} else {
						$('.save-btn-locked-group').hide();
						$('.save-btn-valid-group').show();
					}
				}
			}
			if (inputName == 'NewPassword' || inputName == 'RepeatPassword') {
				if ($('#NewPassword').val() == $('#RepeatPassword').val() && $('#NewPassword').val() && $('#RepeatPassword').val()) {
					$('.password-btn-locked-group').hide();
					$('.password-btn-valid-group').show();
				} else {
					$('.password-btn-locked-group').show();
					$('.password-btn-valid-group').hide();
				}
			}
		});
		$('.setpermissions-btn').on('click', function() {
			$('#add_UserAdmin').modal('toggle');
			$(this).removeClass('glow-gold');
		});
		$('#AdminPermissionsBackButton').on('click', function() {
			$('#add_UserAdmin').modal('toggle');
			$('#AdminPermissionsModal').modal('toggle');
		});
		$('#AdminPermissionsConfirmButton').on('click', function() {
			$('#add_UserAdmin').modal('toggle');
			$('#AdminPermissionsModal').modal('toggle');
		});
		$('#PositionSelect').on('change', function() {
			resetPermissionsCart();
			let positionSelectValue = $('#PositionSelect').val();
			$('#PositionSelectPermissions').val(positionSelectValue);
			$('#Position').val(positionSelectValue);
			if (positionSelectValue == 'Developer' || positionSelectValue == 'President' || positionSelectValue == 'HR Manager' || positionSelectValue == 'HR Assistant') {
				let noPermissions = [];
				$('#SetPermissions').find('.form-row button').each(function() {
					if (!noPermissions.includes($(this).data('permissions'))) {
						$(this).trigger('click');
					}
				});
			} else if (positionSelectValue == 'Accounting Manager' || positionSelectValue == 'Accounting Assistant') {
				let noPermissions = ['Admins', 'AdminsArchived', 'AdminsEditing', 'EmployeesHiring', 'EmployeesEditing', 'ApplicantsEditing', 'ClientsEditing'];
				$('#SetPermissions').find('.form-row button').each(function() {
					if (!noPermissions.includes($(this).data('permissions'))) {
						$(this).trigger('click');
					}
				});
			}

		});
		$('#PositionSelectPermissions').on('change', function() {
			resetPermissionsCart();
			let positionSelectValue = $('#PositionSelectPermissions').val();
			$('#PositionSelect').val(positionSelectValue);
			$('#Position').val(positionSelectValue);
			if (positionSelectValue == 'Developer' || positionSelectValue == 'President' || positionSelectValue == 'HR Manager' || positionSelectValue == 'HR Assistant') {
				let noPermissions = [];
				$('#SetPermissions').find('.form-row button').each(function() {
					if (!noPermissions.includes($(this).data('permissions'))) {
						$(this).trigger('click');
					}
				});
			} else if (positionSelectValue == 'Accounting Manager' || positionSelectValue == 'Accounting Assistant') {
				let noPermissions = ['Admins', 'AdminsArchived', 'AdminsEditing', 'EmployeesHiring', 'EmployeesEditing', 'ApplicantsEditing', 'ClientsEditing'];
				$('#SetPermissions').find('.form-row button').each(function() {
					if (!noPermissions.includes($(this).data('permissions'))) {
						$(this).trigger('click');
					}
				});
			}
		});
		$('.position-select').on('change', function() {
			$('.position-select').removeClass('glow-gold');
			$('.setpermissions-valid-group').show();
			$('.setpermissions-locked-group').hide();
			$('.setpermissions-btn').addClass('glow-gold');
			if (!$('#AdminID').val() || !$('#PasswordHolder').val() || !$('#Position').val()) { // Required fields
				$('.save-btn-locked-group-text').text('ID, password, and position is required');
				$('.save-btn-locked-group').show();
				$('.save-btn-valid-group').hide();
			} else {
				if (adminIDList.includes($('#AdminID').val())) {
					$('.save-btn-locked-group-text').text('Admin ID exists');
					$('.save-btn-locked-group').show();
					$('.save-btn-valid-group').hide();
				} else {
					$('.save-btn-locked-group').hide();
					$('.save-btn-valid-group').show();
				}
			}
			localStorage.setItem('AdminPosition', $('#Position').val());
			if (!inputCart.items.includes('AdminPosition')) {
				inputCart.items.push('AdminPosition'); // Sending as JSON
				localStorage.setItem(cartName, JSON.stringify(inputCart));
			}
		});
		$('#SetPermissions').find('.form-row').on('click', function() {
			$(this).find('.form-group').toggleClass('setpermissions-checked-text');
			$(this).find('button').toggleClass('btn-success btn-secondary');
			$(this).find('button').children('i').toggleClass('wercher-visible wercher-transparent');
			let permissionsData = $(this).find('button').data('permissions');
			if (!permissionsCart.includes(permissionsData)) {
				permissionsCart.push(permissionsData);
			} else {
				let index = permissionsCart.indexOf(permissionsData);
				permissionsCart.splice(index, 1);
			}
			$('#PermissionsCart').val(permissionsCart);
			localStorage.setItem('PermissionsCart', JSON.stringify(permissionsCart));
			if (!inputCart.items.includes('PermissionsCart')) {
				inputCart.items.push('PermissionsCart'); // Sending as JSON
				localStorage.setItem(cartName, JSON.stringify(inputCart));
			}
			console.log(permissionsCart);
		});
		$('.changepassword-btn').on('click', function() {
			$('#add_UserAdmin').modal('toggle');
		});
		$('.showpassword-btn').on('click', function() {
			let input = $(this).parent('.input-group-append').parent('.input-group').find('input');
			let inputType = input.attr('type');
			if (inputType === 'password') {
				input.attr('type', 'text');
			} else {
				input.attr('type', 'password');
			}
			$(this).children('i').toggleClass('fa-low-vision fa-eye');
		});
		$('#AdminPasswordBackButton').on('click', function() {
			$('#add_UserAdmin').modal('toggle');
			$('#AdminPasswordModal').modal('toggle');
		});
		$('#AdminPasswordConfirmButton').on('click', function() {
			$('#add_UserAdmin').modal('toggle');
			$('#AdminPasswordModal').modal('toggle');
			$('#PasswordHolder').val($('#NewPassword').val());
			$('#AdminPassword').toggleClass('btn-success btn-info');
			localStorage.setItem('PasswordHolder', $('#NewPassword').val());
			if (!inputCart.items.includes('PasswordHolder')) {
				inputCart.items.push('PasswordHolder'); // Sending as JSON
				localStorage.setItem(cartName, JSON.stringify(inputCart));
			}
			if (!$('#AdminID').val() || !$('#PasswordHolder').val() || !$('#Position').val()) { // Required fields
				$('.save-btn-locked-group-text').text('ID, password, and position is required');
				$('.save-btn-locked-group').show();
				$('.save-btn-valid-group').hide();
			} else {
				if (adminIDList.includes($('#AdminID').val())) {
					$('.save-btn-locked-group-text').text('Admin ID exists');
					$('.save-btn-locked-group').show();
					$('.save-btn-valid-group').hide();
				} else {
					$('.save-btn-locked-group').hide();
					$('.save-btn-valid-group').show();
				}
			}
		});
		// =====================
		// Edit Admin
		$('.edit-admin-btn').on('click', function() {
			// Set ID
			let adminDatabaseID = $(this).data('admindatabaseid');
			let adminID = $(this).data('adminid');
			$('#EditAdminDatabaseID').val(adminDatabaseID);
			// Admin info
			$('#EditAdminTitle').html('<a href="#" data-toggle="modal" data-target="#AdminMoreInfoModal">' + adminID + '</a>');
			$('#EditAdminID').val(adminID);
			$('#EditAdminImage').val($(this).data('adminimage'));
			$('#EditAdminImageHolder').attr('src', $(this).data('adminimage'));
			$('#EditPosition').val($(this).data('adminposition'));
			$('#EditPositionSelect').val($(this).data('adminposition'));
			$('#EditAdminLastName').val($(this).data('adminlastname'));
			$('#EditAdminFirstName').val($(this).data('adminfirstname'));
			$('#EditAdminMiddleName').val($(this).data('adminmiddlename'));
			$('#EditAdminNotes').val($(this).data('adminnotes'));
			let adminStatus = $(this).data('status');
			if (adminStatus == 'Active') {
				$('#EditRemoveAdmin').attr('href', 'RemoveAdmin?id=' + adminDatabaseID);
				$('.removeadmin-btn').show();
				$('.restoreadmin-btn').hide();
			} else {
				$('#EditRestoreAdmin').attr('href', 'RestoreAdmin?id=' + adminDatabaseID);
				$('.removeadmin-btn').hide();
				$('.restoreadmin-btn').show();
			}
			// Admin permissions
			resetEditPermissionsCart();
			$('#EditAdminPermissionsTitle').html(adminID);
			$('#EditPositionSelectPermissions').val($(this).data('adminposition'));
			let adminPermissions = $(this).data('adminpermissions');
			let adminPermissionsArray = adminPermissions.split(",");
			$('#EditSetPermissions').find('.form-row').each(function() {
				if (adminPermissionsArray.includes($(this).find('button').data('permissions'))) {
					$(this).find('.form-group').toggleClass('setpermissions-checked-text');
					$(this).find('button').toggleClass('btn-success btn-secondary');
					$(this).find('button').children('i').toggleClass('wercher-visible wercher-transparent');
					let permissionsData = $(this).find('button').data('permissions');
					if (!permissionsCartForEdit.includes(permissionsData)) {
						permissionsCartForEdit.push(permissionsData);
					} else {
						let index = permissionsCartForEdit.indexOf(permissionsData);
						permissionsCartForEdit.splice(index, 1);
					}
					$('#EditPermissionsCart').val(permissionsCartForEdit);
				}
			});
			// Admin password
			$('#EditAdminPasswordTitle').text(adminID);
		});
		$('.edit-setpermissions-btn').on('click', function() {
			$('#EditAdminModal').modal('toggle');
			$(this).removeClass('glow-gold');
		});
		$('#EditAdminPermissionsBackButton').on('click', function() {
			$('#EditAdminModal').modal('toggle');
			$('#EditAdminPermissionsModal').modal('toggle');
		});
		$('#EditAdminPermissionsConfirmButton').on('click', function() {
			$('#EditAdminModal').modal('toggle');
			$('#EditAdminPermissionsModal').modal('toggle');
		});
		$('#EditPositionSelect').on('change', function() {
			resetEditPermissionsCart();
			let positionSelectValue = $('#EditPositionSelect').val();
			$('#EditPositionSelectPermissions').val(positionSelectValue);
			$('#EditPosition').val(positionSelectValue);
			if (positionSelectValue == 'Developer' || positionSelectValue == 'President' || positionSelectValue == 'HR Manager' || positionSelectValue == 'HR Assistant') {
				let noPermissions = [];
				$('#EditSetPermissions').find('.form-row button').each(function() {
					if (!noPermissions.includes($(this).data('permissions'))) {
						$(this).trigger('click');
					}
				});
			} else if (positionSelectValue == 'Accounting Manager' || positionSelectValue == 'Accounting Assistant') {
				let noPermissions = ['Admins', 'AdminsArchived', 'AdminsEditing', 'EmployeesHiring', 'EmployeesEditing', 'ApplicantsEditing', 'ClientsEditing'];
				$('#EditSetPermissions').find('.form-row button').each(function() {
					if (!noPermissions.includes($(this).data('permissions'))) {
						$(this).trigger('click');
					}
				});
			}

		});
		$('#EditPositionSelectPermissions').on('change', function() {
			resetEditPermissionsCart();
			let positionSelectValue = $('#EditPositionSelectPermissions').val();
			$('#EditPositionSelect').val(positionSelectValue);
			$('#EditPosition').val(positionSelectValue);
			if (positionSelectValue == 'Developer' || positionSelectValue == 'President' || positionSelectValue == 'HR Manager' || positionSelectValue == 'HR Assistant') {
				let noPermissions = [];
				$('#EditSetPermissions').find('.form-row button').each(function() {
					if (!noPermissions.includes($(this).data('permissions'))) {
						$(this).trigger('click');
					}
				});
			} else if (positionSelectValue == 'Accounting Manager' || positionSelectValue == 'Accounting Assistant') {
				let noPermissions = ['Admins', 'AdminsArchived', 'AdminsEditing', 'EmployeesHiring', 'EmployeesEditing', 'ApplicantsEditing', 'ClientsEditing'];
				$('#EditSetPermissions').find('.form-row button').each(function() {
					if (!noPermissions.includes($(this).data('permissions'))) {
						$(this).trigger('click');
					}
				});
			}
		});
		$('.edit-position-select').on('change', function() {
			$('.edit-position-select').removeClass('glow-gold');
			$('.edit-setpermissions-btn').addClass('glow-gold');
		});
		$('#EditSetPermissions').find('.form-row').on('click', function() {
			$(this).find('.form-group').toggleClass('setpermissions-checked-text');
			$(this).find('button').toggleClass('btn-success btn-secondary');
			$(this).find('button').children('i').toggleClass('wercher-visible wercher-transparent');
			let permissionsData = $(this).find('button').data('permissions');
			if (!permissionsCartForEdit.includes(permissionsData)) {
				permissionsCartForEdit.push(permissionsData);
			} else {
				let index = permissionsCartForEdit.indexOf(permissionsData);
				permissionsCartForEdit.splice(index, 1);
			}
			$('#EditPermissionsCart').val(permissionsCartForEdit);
			console.log(permissionsCartForEdit);
		});
		$('#EditAdminImageHolder').click(function(){ $('#EditimgInp').trigger('click'); });
		function editReadURL(input) {
			if (input.files && input.files[0]) {
				var reader = new FileReader();
				reader.onload = function(e) {
					$('#EditAdminImageHolder').attr('src', e.target.result);
				}
				reader.readAsDataURL(input.files[0]);
			}
		}
		$("#EditimgInp").change(function() {
			editReadURL(this);
			$('#EditpImageChecker').val('Has Image')
		});
		$('.edit-changepassword-btn').on('click', function() {
			$('#EditAdminModal').modal('toggle');
		});
		$('#EditAdminPasswordBackButton').on('click', function() {
			$('#EditAdminModal').modal('toggle');
			$('#EditAdminPasswordModal').modal('toggle');
		});
		let checkPasswordOnProgress = false;
		$('#EditAdminPasswordConfirmButton').on('click', function() {
			if (checkPasswordOnProgress == false) {
				checkPasswordOnProgress = true;
				let AdminID = $('#EditAdminID').val();
				let CurrentPassword = $('#EditCurrentPassword').val();
				$(this).find('i').removeClass('fas fa-redo');
				$(this).find('i').addClass('spinner-border spinner-border-sm');
				$.ajax({
					url : "<?php echo base_url() . 'AJAX_checkPassword';?>",
					method : "POST",
					data: {AdminID: AdminID, CurrentPassword: CurrentPassword},
					dataType: "json",
					success: function(data){
						console.log('Current password check: ' + data);
						if (data == true) { // Returns true
							$('#EditPasswordChanged').val('true');
							$('#EditAdminModal').modal('toggle');
							$('#EditAdminPasswordModal').modal('toggle');
							$('#EditNewPasswordHolder').val($('#EditNewPassword').val());
							$('.edit-changepassword-btn').toggleClass('btn-success btn-info');
							$('.edit-password-text-container').hide();
						} else {
							$('.edit-password-text-container').show();
							$('.edit-password-text').text('Invalid current password');
							$('#EditCurrentPasswordContainer').addClass('glow-gold');
						}
						checkPasswordOnProgress = false;
						$('#EditAdminPasswordConfirmButton').find('i').addClass('fas fa-redo');
						$('#EditAdminPasswordConfirmButton').find('i').removeClass('spinner-border spinner-border-sm');
					}
				});
			}
		});
		$('#EditNewPassword, #EditRepeatPassword').bind('input', function() {
			if ($('#EditNewPassword').val() == $('#EditRepeatPassword').val() && $('#EditNewPassword').val() && $('#EditRepeatPassword').val()) {
				$('.edit-password-text-container').hide();
				$('.edit-password-btn-locked-group').hide();
				$('.edit-password-btn-valid-group').show();
			} else {
				$('.edit-password-text-container').show();
				$('.edit-password-text').text('Password does not match');
				$('.edit-password-btn-locked-group').show();
				$('.edit-password-btn-valid-group').hide();
			}
		});
		$('#EditCurrentPassword').bind('input', function() {
			$(this).parent('#EditCurrentPasswordContainer').removeClass('glow-gold');
		});
		// =====================
		// Admin More Info
		$('.admin-moreinfo-btn').on('click', function() {
			// Set ID
			let adminDatabaseID = $(this).data('admindatabaseid');
			let adminID = $(this).data('adminid');
			let adminImage = $(this).data('adminimage');
			let adminPermissions = $(this).data('adminpermissions');
			let adminLastName = $(this).data('adminlastname');
			let adminFirstName = $(this).data('adminfirstname');
			let adminMiddleName = $(this).data('adminmiddlename');
			let adminRealName = '';
			if (adminLastName) {
				adminRealName = adminRealName + adminLastName + ', ';
			}
			if (adminFirstName) {
				adminRealName = adminRealName + adminFirstName;
			}
			if (adminMiddleName) {
				adminRealName = adminRealName + ' ' + adminMiddleName;
			}
			let adminPosition = $(this).data('adminposition');
			let adminNotes = $(this).data('adminnotes');
			// Admin info
			$('#AdminMoreInfoTitle').html('<a href="Logbook?admin=' + adminID + '"><img class="rounded-circle" src="' + adminImage + '" height="48" width="48"><span class="ml-2">' + adminID + '</span></a>');
			$('#AdminMoreInfoActivityExpand').html('<a href="Logbook?admin=' + adminID + '">Expand</a>');
			$('#AdminMoreInfoPermissions').text(adminPermissions);
			$('#AdminMoreInfoRealName').text(adminRealName);
			$('#AdminMoreInfoPosition').text(adminPosition);
			$('#AdminMoreInfoNotes').text(adminNotes);
			$.ajax({
				url : "<?php echo base_url() . 'AJAX_showLatestAdminActivity';?>",
				method : "POST",
				data: {AdminID: adminID},
				dataType: "html",
				success: function(data){
					$('.admin-moreinfo-activity-container').html(data);
				}
			});
			$.ajax({
				url : "<?php echo base_url() . 'AJAX_showLogbookDataForAdmin';?>",
				method : "POST",
				data: {AdminID: adminID},
				dataType: "json",
				success: function(data){
					$('#AdminMoreInfoTotalLogEntries').text(data[0]);
					$('#AdminMoreInfoTotalLogEntries').attr('href', 'Logbook?admin=' + adminID);
					$('#AdminMoreInfoApplicantEntries').text(data[1]);
					$('#AdminMoreInfoApplicantEntries').attr('href', 'Logbook?admin=' + adminID + '&type=Applicant');
					$('#AdminMoreInfoEmployeeEntries').text(data[2]);
					$('#AdminMoreInfoEmployeeEntries').attr('href', 'Logbook?admin=' + adminID + '&type=Employee');
					$('#AdminMoreInfoClientEntries').text(data[3]);
					$('#AdminMoreInfoClientEntries').attr('href', 'Logbook?admin=' + adminID + '&type=Client');
					$('#AdminMoreInfoSalaryEntries').text(data[4]);
					$('#AdminMoreInfoSalaryEntries').attr('href', 'Logbook?admin=' + adminID + '&type=Salary');
					$('#AdminMoreInfoAdminEntries').text(data[5]);
					$('#AdminMoreInfoAdminEntries').attr('href', 'Logbook?admin=' + adminID + '&type=Admin');
					$('#AdminMoreInfoNotesMade').text(data[6]);
					$('#AdminMoreInfoNotesMade').attr('href', 'Logbook?admin=' + adminID + '&type=Note');
				},
				error: function(XMLHttpRequest, textStatus, errorThrown) {
					console.log(textStatus);
					console.log(errorThrown);
				}
			});
		});
		// =====================
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
		                columns: [ 0, 2, 3, 5 ]
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
		                columns: [ 0, 2, 3, 5 ]
		            }
		        },
		        {
		            extend: 'excelHtml5',
		            exportOptions: {
		                columns: [ 0, 2, 3, 5 ]
		            }
		        },
		        {
		            extend: 'csvHtml5',
		            exportOptions: {
		                columns: [ 0, 2, 3, 5 ]
		            }
		        },
		        {
		            extend: 'pdfHtml5',
		            exportOptions: {
		                columns: [ 0, 2, 3, 5 ]
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
<style>
	.modal-body{
	    max-height: calc(100vh - 200px);
	    overflow-y: auto;
	}
</style>
</html>