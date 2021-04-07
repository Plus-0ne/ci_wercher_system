<div class="modal fade" id="ChangeEmploymentTypeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<?php echo form_open(base_url().'ChangeEmploymentType','method="POST"');?>
			<div id="ClientModal" class="modal-body">
				<?php if (isset($_GET['id'])): ?>
				<input id="ChangeEmploymentTypeID" type="hidden" name="ApplicantID" value="<?php echo $ApplicantID; ?>">
				<?php else: ?>
				<input id="ChangeEmploymentTypeID" type="hidden" name="ApplicantID" value="">
				<?php endif; ?>
				<div class="form-row">
					<div class="form-group col-12">
						<label>Change Employment Type to</label>
						<select id="EmploymentTypeSelect" class="form-control" name="EmploymentType">
							<option value="Regular"<?php if($Status == 'Employed (Permanent)') { echo ' selected'; } ?>>Regular</option>
							<option value="Absorbed"<?php if($Status == 'Absorbed') { echo ' selected'; } ?>>Absorbed</option>
							<option value="Resigned"<?php if($Status == 'Resigned') { echo ' selected'; } ?>>Resigned</option>
							<option value="Terminated"<?php if($Status == 'Termninated') { echo ' selected'; } ?>>Terminated</option>
						</select>
					</div>
				</div>	
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Save Changes</button>
			</div>
			<?php echo form_close();?>
		</div>
	</div>
</div>