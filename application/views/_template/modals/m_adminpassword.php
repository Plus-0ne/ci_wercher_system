<div class="modal fade" id="AdminPasswordModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<form action="<?=base_url()?>EditAdmin" method="post" enctype="multipart/form-data">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle"><i class="fas fa-key"></i> Set Password</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div id="PasswordFields" class="modal-body">
				<div class="form-row">
					<div class="form-group col-sm-12">
						<label>Password</label>
						<div class="input-group">
							<input id="NewPassword" class="form-control" type="password" name="NewPassword">
							<div class="input-group-append">
								<button type="button" class="showpassword-btn btn btn-secondary"><i class="fas fa-low-vision" style="margin-right: -1px;"></i> </button>
							</div>
						</div>
					</div>
					<div class="form-group col-sm-12">
						<label>Repeat Password</label>
						<div class="input-group">
							<input id="RepeatPassword" class="form-control" type="password" name="RepeatPassword">
							<div class="input-group-append">
								<button type="button" class="showpassword-btn btn btn-secondary"><i class="fas fa-low-vision" style="margin-right: -1px;"></i> </button>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button id="AdminPasswordBackButton" type="button" class="btn btn-info mr-auto"><i class="fas fa-angle-left"></i> Back</button>
				<div class="password-btn-locked-group">
					<span class="mr-2" style="font-size: 18px; color: rgba(255, 25, 25);"><i class="fas fa-exclamation-circle"></i> Password does not match</span>
					<button type="button" class="btn btn-secondary hover-disabled"><i class="fas fa-lock"></i> Confirm</button>
				</div>
				<div class="password-btn-valid-group" style="display: none;">
					<button id="AdminPasswordConfirmButton" type="button" class="btn btn-success"><i class="fas fa-check"></i> Confirm</button>
				</div>
			</div>
		</div>
		</form>
	</div>
</div>