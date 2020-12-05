<div class="modal fade" id="EditAdminModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<form action="<?=base_url()?>EditAdmin" method="post" enctype="multipart/form-data">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle"><i class="fas fa-plus"></i> Edit <span id="EditAdminTitle">[Admin ID]</span></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<input id="EditAdminDatabaseID" type="hidden" name="EditAdminDatabaseID">
				<input id="EditNewPasswordHolder" type="hidden" name="EditNewPasswordHolder">
				<input id="EditPasswordChanged" type="hidden" name="EditPasswordChanged">
				<div class="form-row">
					<div class="form-group ml-auto mr-auto">
						<input id="EditpImageChecker" type="hidden" name="EditpImageChecker">
						<input id="EditAdminImage" type="hidden" name="EditAdminImage"> 
						<input type='file' id="EditimgInp" name="EditadminImage" style="display: none;">
						<?php if(!$this->agent->is_mobile()): ?>
							<img class="image-hover" id="EditAdminImageHolder" src="<?php echo base_url() ?>assets/img/wercher_default_photo.png" width="192" height="192">
						<?php else: ?>
							<img class="image-hover" id="EditAdminImageHolder" src="<?php echo base_url() ?>assets/img/wercher_default_photo_mobile.png" width="192" height="192">
						<?php endif; ?>
					</div>
				</div>
				<div class="form-row">
					<input id="EditPermissionsCart" type="hidden" name="EditPermissionsCart">
					<input id="EditPosition" type="hidden" name="EditAdminPosition">
					<div class="form-group col-sm-8">
						<label>Position <span class="required-field">*</span></label>
						<select id="EditPositionSelect" class="edit-position-select form-control" name="EditPositionSelect">
							<option hidden disabled selected>Choose Position</option>
							<option value="Developer">Developer</option>
							<option value="President">President</option>
							<option value="HR Manager">HR Manager</option>
							<option value="HR Assistant">HR Assistant</option>
							<option value="Accounting Manager">Accounting Manager</option>
							<option value="Accounting Assistant">Accounting Assistant</option>
						</select>
					</div>
					<div class="form-group col-sm-4">
						<label>Permissions</label>
						<button type="button" class="edit-setpermissions-btn btn btn-info" data-toggle="modal" data-target="#EditAdminPermissionsModal" style="width: 145px;"><i class="fas fa-eye"></i> Designate</button>
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-sm-8">
						<label>Admin ID <span class="required-field">*</span></label>
						<input id="EditAdminID" class="form-control" type="text" name="EditAdminID">
					</div>
					<div class="form-group col-sm-4">
						<label>Password <span class="required-field">*</span></label>
						<button type="button" class="edit-changepassword-btn btn btn-info" data-toggle="modal" data-target="#EditAdminPasswordModal" style="width: 145px;"><i class="fas fa-key"></i> Change</button>
						<!-- <input id="Password" class="form-control" type="password" name="AdminPassword"> -->
					</div>
				</div>
				<hr>
				<div class="form-row mt-2">
					<div class="form-group col-sm-4">
						<label>Last Name</label>
						<input id="EditAdminLastName" class="form-control" type="text" name="EditAdminLastName">
					</div>
					<div class="form-group col-sm-4">
						<label>First Name</label>
						<input id="EditAdminFirstName" class="form-control" type="text" name="EditAdminFirstName">
					</div>
					<div class="form-group col-sm-4">
						<label>Middle Name</label>
						<input id="EditAdminMiddleName" class="form-control" type="text" name="EditAdminMiddleName">
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-sm-12">
						<label>Notes</label>
						<textarea id="EditAdminNotes" class="form-control" name="EditAdminNotes" rows="2"></textarea>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<?php if ($ShowAdmin->num_rows() > 1): ?>
					<a href="#" id="EditRemoveAdmin" class="btn btn-danger mr-auto" onclick="return confirm('Archive Admin?')"><i class="fas fa-times"></i> Archive Admin</a>
				<?php else: ?>
					<button type="button" data-toggle="tooltip" data-placement="top" data-html="true" title="Must have 1 admin minimum." class="btn btn-secondary mr-auto hover-disabled"><i class="fas fa-lock"></i> Archive Admin</button>
				<?php endif; ?>
				<button type="submit" class="btn btn-success"><i class="fas fa-check"></i> Confirm Changes</button>
				<!-- <div class="edit-save-btn-locked-group">
					<span class="mr-2" style="font-size: 18px; color: rgba(255, 25, 25);"><i class="fas fa-exclamation-circle"></i> ID, password, and position is required</span>
					<button type="button" class="btn btn-secondary hover-disabled"><i class="fas fa-lock"></i> Confirm</button>
				</div>
				<div class="edit-save-btn-valid-group" style="display: none;">
					<span class="mr-2" style="font-size: 18px; color: green;"><i class="fas fa-check-circle"></i> Admin is valid for saving</span>
					<button type="submit" class="btn btn-success"><i class="fas fa-check"></i> Confirm</button>
				</div> -->
			</div>
		</div>
		</form>
	</div>
</div>