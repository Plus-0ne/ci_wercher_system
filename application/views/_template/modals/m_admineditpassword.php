<div class="modal fade" id="EditAdminPasswordModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<form action="<?=base_url()?>EditAdmin" method="post" enctype="multipart/form-data">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle"><i class="fas fa-key"></i> Set a new password for <span id="EditAdminPasswordTitle">[Admin ID]</span></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="form-row">
					<div class="form-group col-sm-12">
						<label>Current Password</label>
						<div id="EditCurrentPasswordContainer" class="input-group">
							<input id="EditCurrentPassword" class="form-control" type="password" name="EditCurrentPassword">
							<div class="input-group-append">
								<button type="button" class="showpassword-btn btn btn-secondary"><i class="fas fa-low-vision" style="margin-right: -1px;"></i> </button>
							</div>
						</div>
					</div>
					<div class="form-group col-sm-12">
						<label>New Password</label>
						<div class="input-group">
							<input id="EditNewPassword" class="form-control" type="password" name="EditNewPassword">
							<div class="input-group-append">
								<button type="button" class="showpassword-btn btn btn-secondary"><i class="fas fa-low-vision" style="margin-right: -1px;"></i> </button>
							</div>
						</div>
					</div>
					<div class="form-group col-sm-12">
						<label>Repeat New Password</label>
						<div class="input-group">
							<input id="EditRepeatPassword" class="form-control" type="password">
							<div class="input-group-append">
								<button type="button" class="showpassword-btn btn btn-secondary"><i class="fas fa-low-vision" style="margin-right: -1px;"></i> </button>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button id="EditAdminPasswordBackButton" type="button" class="btn btn-info mr-auto"><i class="fas fa-angle-left"></i> Back</button>
				<span class="edit-password-text-container mr-2" style="font-size: 18px; color: rgba(255, 25, 25);"><i class="fas fa-exclamation-circle"></i> <span class="edit-password-text">Password does not match</span></span>
				<div class="edit-password-btn-locked-group">
					<button type="button" class="btn btn-secondary hover-disabled"><i class="fas fa-lock"></i> Change</button>
				</div>
				<div class="edit-password-btn-valid-group" style="display: none;">
					<button id="EditAdminPasswordConfirmButton" type="button" class="btn btn-success"><i class="fas fa-redo"></i> Change</button>
				</div>
			</div>
		</div>
		</form>
	</div>
</div>