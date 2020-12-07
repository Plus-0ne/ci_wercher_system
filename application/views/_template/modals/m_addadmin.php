<div class="modal fade" id="add_UserAdmin" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<form action="<?=base_url()?>Add_NewAdmin" method="post" enctype="multipart/form-data">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle"><i class="fas fa-plus"></i> Add New Admin</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div id="InputFields" class="modal-body">
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
					<input id="PermissionsCart" type="hidden" name="PermissionsCart">
					<input id="Position" type="hidden" name="AdminPosition">
					<input id="PasswordHolder" type="hidden" name="PasswordHolder">
					<div class="form-group col-sm-8">
						<label>Position <span class="required-field">*</span></label>
						<select id="PositionSelect" class="position-select form-control glow-gold" name="PositionSelect">
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
						<div class="setpermissions-locked-group">
							<button type="button" class="hover-disabled btn btn-secondary" data-toggle="tooltip" data-placement="top" data-html="true" title="Choose a position first" style="width: 145px;"><i class="fas fa-lock"></i> Designate</button>
						</div>
						<div class="setpermissions-valid-group" style="display: none">
							<button type="button" class="setpermissions-btn btn btn-info" data-toggle="modal" data-target="#AdminPermissionsModal" style="width: 145px;"><i class="fas fa-eye"></i> Designate</button>
						</div>
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-sm-8">
						<label>Admin ID <span class="required-field">*</span></label>
						<input id="AdminID" class="form-control" type="text" name="AdminID">
					</div>
					<div class="form-group col-sm-4">
						<label>Password <span class="required-field">*</span></label>
						<button id="AdminPassword" type="button" class="changepassword-btn btn btn-info" data-toggle="modal" data-target="#AdminPasswordModal" style="width: 145px;"><i class="fas fa-key"></i> Set</button>
					</div>
				</div>
				<hr>
				<div class="form-row mt-2">
					<div class="form-group col-sm-4">
						<label>Last Name</label>
						<input class="form-control" type="text" name="AdminLastName">
					</div>
					<div class="form-group col-sm-4">
						<label>First Name</label>
						<input class="form-control" type="text" name="AdminFirstName">
					</div>
					<div class="form-group col-sm-4">
						<label>Middle Name</label>
						<input class="form-control" type="text" name="AdminMiddleName">
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-sm-12">
						<label>Notes</label>
						<textarea class="form-control" name="AdminNotes" rows="2"></textarea>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<div class="save-btn-locked-group">
					<span class="mr-2" style="font-size: 18px; color: rgba(255, 25, 25);"><i class="fas fa-exclamation-circle"></i> <span class="save-btn-locked-group-text">ID, password, and position is required</span></span>
					<button type="button" class="btn btn-secondary hover-disabled"><i class="fas fa-lock"></i> Save</button>
				</div>
				<div class="save-btn-valid-group" style="display: none;">
					<span class="mr-2" style="font-size: 18px; color: green;"><i class="fas fa-check-circle"></i> Admin is valid for saving</span>
					<button type="submit" class="btn btn-success"><i class="fas fa-check"></i> Save</button>
				</div>
			</div>
		</div>
		</form>
	</div>
</div>