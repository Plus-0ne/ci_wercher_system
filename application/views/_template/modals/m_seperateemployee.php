<div class="modal fade" id="SeperateEmployeeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<?php echo form_open(base_url().'SeperateEmployee','method="POST"');?>
			<div id="ClientModal" class="modal-body">
				<?php if (isset($_GET['id'])): ?>
				<input id="SeperateEmployeeID" type="hidden" name="ApplicantID" value="<?php echo $ApplicantID; ?>">
				<?php else: ?>
				<input id="SeperateEmployeeID" type="hidden" name="ApplicantID" value="">
				<?php endif; ?>
				<div class="form-row">
					<div class="form-group col-12">
						<label>Select seperation date:</label>
					</div>
					<div class="form-group col-12">
						<input type="date" class="form-control" name="SeperationDate">
					</div>
				</div>	
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-info"><i class="fas fa-check-circle"></i> Seperate</button>
			</div>
			<?php echo form_close();?>
		</div>
	</div>
</div>