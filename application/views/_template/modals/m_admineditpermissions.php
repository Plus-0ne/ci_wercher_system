<div class="modal fade modal-fixed-footer" id="EditAdminPermissionsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-eye"></i> Edit Permissions for <span id="EditAdminPermissionsTitle">[Admin ID]</span></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div id="EditSetPermissions" class="modal-body ml-4">
				<div class="row">
					<div class="form-group col-sm-10">
						<label>Position <span class="required-field">*</span></label>
						<select id="EditPositionSelectPermissions" class="position-select form-control glow-gold" name="EditPositionSelect">
							<option hidden disabled selected>Choose Position</option>
							<option value="Developer">Developer</option>
							<option value="President">President</option>
							<option value="HR Manager">HR Manager</option>
							<option value="HR Assistant">HR Assistant</option>
							<option value="Accounting Manager">Accounting Manager</option>
							<option value="Accounting Assistant">Accounting Assistant</option>
						</select>
					</div>
				</div>
				<hr>
				<!-- Dashboard -->
				<div class="form-row">
					<div class="form-group col-sm-2">
						<button type="button" class="btn btn-secondary w-100" data-permissions="Dashboard"><i class="fas fa-check wercher-transparent" style="margin-right: -1px;"></i></button>
					</div>
					<div class="form-group setpermissions-text col-sm-10">
						<i class="fas fa-tachometer-alt"></i> Dashboard
					</div>
				</div>
				<!-- Subgroups -->
				<div class="form-row">
					<div class="form-group col-sm-1">
						<img width="32" height="32" src="assets/img/documents-folder-tree.png">
					</div>
					<div class="form-group col-sm-2">
						<button type="button" class="btn btn-sm btn-secondary w-100" data-permissions="DashboardLogbook"><i class="fas fa-check wercher-transparent" style="margin-right: -1px;"></i></button>
					</div>
					<div class="form-group setpermissions-subgroup-text col-sm-8">
						<i class="fas fa-book"></i> Logbook
					</div>
				</div>
				<!-- Applicants -->
				<div class="form-row mt-2">
					<div class="form-group col-sm-2">
						<button type="button" class="btn btn-secondary w-100" data-permissions="Applicants"><i class="fas fa-check wercher-transparent" style="margin-right: -1px;"></i></button>
					</div>
					<div class="form-group setpermissions-text col-sm-10">
						<i class="fas fa-user-tie"></i> Applicants
					</div>
				</div>
				<!-- Subgroups -->
				<div class="form-row">
					<div class="form-group col-sm-1">
						<img width="32" height="32" src="assets/img/documents-folder-tree-continuous.png">
					</div>
					<div class="form-group col-sm-2">
						<button type="button" class="btn btn-sm btn-secondary w-100" data-permissions="ApplicantsEditing"><i class="fas fa-check wercher-transparent" style="margin-right: -1px;"></i></button>
					</div>
					<div class="form-group setpermissions-subgroup-text col-sm-8">
						<i class="fas fa-user-edit"></i> Creation and Editing
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-sm-1">
						<img width="32" height="32" src="assets/img/documents-folder-tree-continuous.png">
					</div>
					<div class="form-group col-sm-2">
						<button type="button" class="btn btn-sm btn-secondary w-100" data-permissions="ApplicantsExpired"><i class="fas fa-check wercher-transparent" style="margin-right: -1px;"></i></button>
					</div>
					<div class="form-group setpermissions-subgroup-text col-sm-8">
						<i class="fas fa-user-tie"></i> Access to Expired
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-sm-1">
						<img width="32" height="32" src="assets/img/documents-folder-tree-continuous.png">
					</div>
					<div class="form-group col-sm-2">
						<button type="button" class="btn btn-sm btn-secondary w-100" data-permissions="ApplicantsBlacklisted"><i class="fas fa-check wercher-transparent" style="margin-right: -1px;"></i></button>
					</div>
					<div class="form-group setpermissions-subgroup-text col-sm-8">
						<i class="fas fa-user-slash"></i> Access to Blacklisted
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-sm-1">
						<img width="32" height="32" src="assets/img/documents-folder-tree.png">
					</div>
					<div class="form-group col-sm-2">
						<button type="button" class="btn btn-sm btn-secondary w-100" data-permissions="ApplicantsArchived"><i class="fas fa-check wercher-transparent" style="margin-right: -1px;"></i></button>
					</div>
					<div class="form-group setpermissions-subgroup-text col-sm-8">
						<i class="fas fa-user-lock"></i> Access to Archived
					</div>
				</div>
				<!-- Employees -->
				<div class="form-row mt-2">
					<div class="form-group col-sm-2">
						<button type="button" class="btn btn-secondary w-100" data-permissions="Employees"><i class="fas fa-check wercher-transparent" style="margin-right: -1px;"></i></button>
					</div>
					<div class="form-group setpermissions-text col-sm-10">
						<i class="fas fa-users"></i> Employees
					</div>
				</div>
				<!-- Subgroups -->
				<div class="form-row">
					<div class="form-group col-sm-1">
						<img width="32" height="32" src="assets/img/documents-folder-tree-continuous.png">
					</div>
					<div class="form-group col-sm-2">
						<button type="button" class="btn btn-sm btn-secondary w-100" data-permissions="EmployeesHiring"><i class="fas fa-check wercher-transparent" style="margin-right: -1px;"></i></button>
					</div>
					<div class="form-group setpermissions-subgroup-text col-sm-8">
						<i class="fas fa-user-tie"></i> Hiring
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-sm-1">
						<img width="32" height="32" src="assets/img/documents-folder-tree-continuous.png">
					</div>
					<div class="form-group col-sm-2">
						<button type="button" class="btn btn-sm btn-secondary w-100" data-permissions="EmployeesEditing"><i class="fas fa-check wercher-transparent" style="margin-right: -1px;"></i></button>
					</div>
					<div class="form-group setpermissions-subgroup-text col-sm-8">
						<i class="fas fa-user-edit"></i> Editing
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-sm-1">
						<img width="32" height="32" src="assets/img/documents-folder-tree.png">
					</div>
					<div class="form-group col-sm-2">
						<button type="button" class="btn btn-sm btn-secondary w-100" data-permissions="EmployeesRegulars"><i class="fas fa-check wercher-transparent" style="margin-right: -1px;"></i></button>
					</div>
					<div class="form-group setpermissions-subgroup-text col-sm-8">
						<i class="fas fa-users"></i> Access to Regulars
					</div>
				</div>
				<!-- Admins -->
				<div class="form-row mt-2">
					<div class="form-group col-sm-2">
						<button type="button" class="btn btn-secondary w-100" data-permissions="Admins"><i class="fas fa-check wercher-transparent" style="margin-right: -1px;"></i></button>
					</div>
					<div class="form-group setpermissions-text col-sm-10">
						<i class="fas fa-user-secret"></i> Admins
					</div>
				</div>
				<!-- Subgroups -->
				<div class="form-row">
					<div class="form-group col-sm-1">
						<img width="32" height="32" src="assets/img/documents-folder-tree-continuous.png">
					</div>
					<div class="form-group col-sm-2">
						<button type="button" class="btn btn-sm btn-secondary w-100" data-permissions="AdminsEditing"><i class="fas fa-check wercher-transparent" style="margin-right: -1px;"></i></button>
					</div>
					<div class="form-group setpermissions-subgroup-text col-sm-8">
						<i class="fas fa-user-edit"></i> Creation and Editing
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-sm-1">
						<img width="32" height="32" src="assets/img/documents-folder-tree.png">
					</div>
					<div class="form-group col-sm-2">
						<button type="button" class="btn btn-sm btn-secondary w-100" data-permissions="AdminsArchived"><i class="fas fa-check wercher-transparent" style="margin-right: -1px;"></i></button>
					</div>
					<div class="form-group setpermissions-subgroup-text col-sm-8">
						<i class="fas fa-user-lock"></i> Access to Archived
					</div>
				</div>
				<!-- Clients -->
				<div class="form-row mt-2">
					<div class="form-group col-sm-2">
						<button type="button" class="btn btn-secondary w-100" data-permissions="Clients"><i class="fas fa-check wercher-transparent" style="margin-right: -1px;"></i></button>
					</div>
					<div class="form-group setpermissions-text col-sm-10">
						<i class="fas fa-user-tag"></i> Clients
					</div>
				</div>
				<!-- Subgroups -->
				<div class="form-row">
					<div class="form-group col-sm-1">
						<img width="32" height="32" src="assets/img/documents-folder-tree-continuous.png">
					</div>
					<div class="form-group col-sm-2">
						<button type="button" class="btn btn-sm btn-secondary w-100" data-permissions="ClientsEditing"><i class="fas fa-check wercher-transparent" style="margin-right: -1px;"></i></button>
					</div>
					<div class="form-group setpermissions-subgroup-text col-sm-8">
						<i class="fas fa-user-edit"></i> Creation and Editing
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-sm-1">
						<img width="32" height="32" src="assets/img/documents-folder-tree.png">
					</div>
					<div class="form-group col-sm-2">
						<button type="button" class="btn btn-sm btn-secondary w-100" data-permissions="ClientsArchived"><i class="fas fa-check wercher-transparent" style="margin-right: -1px;"></i></button>
					</div>
					<div class="form-group setpermissions-subgroup-text col-sm-8">
						<i class="fas fa-user-lock"></i> Access to Archived
					</div>
				</div>
				<!-- Payroll -->
				<div class="form-row mt-2">
					<div class="form-group col-sm-2">
						<button type="button" class="btn btn-secondary w-100" data-permissions="Payroll"><i class="fas fa-check wercher-transparent" style="margin-right: -1px;"></i></button>
					</div>
					<div class="form-group setpermissions-text col-sm-10">
						<i class="fas fa-dollar-sign"></i> Payroll
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button id="EditAdminPermissionsBackButton" type="button" class="btn btn-info mr-auto"><i class="fas fa-angle-left"></i> Back</button>
				<button id="EditAdminPermissionsConfirmButton" type="button" class="btn btn-success"><i class="fas fa-check"></i> Confirm</button>
			</div>
		</div>
	</div>
</div>