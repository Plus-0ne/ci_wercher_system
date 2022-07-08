<div class="modal fade" id="ModifySILModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<?php echo form_open(base_url().'ModifySIL','method="POST"');?>
			<div id="ClientModal" class="modal-body">
				<?php if (isset($_GET['id'])): ?>
				<input id="ModifySILApplicantID" type="hidden" name="ApplicantID" value="<?php echo $ApplicantID; ?>">
				<?php else: ?>
				<input id="ModifySILApplicantID" type="hidden" name="ApplicantID" value="">
				<?php endif; ?>
				<div class="form-row">
					<div class="form-group col-12">
						<label>Modify SIL remaining to (Current: <?=$SickLeave ?? 0;?>/5):</label>
					</div>
					<div class="form-group col-12">
						<input type="number" min="0" max="5" class="form-control" name="ModifySILValue">
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