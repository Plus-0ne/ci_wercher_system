<div class="modal fade" id="SuspendModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content suspend-background">
			<?php echo form_open(base_url().'Suspend','method="POST"');?>
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle"><span style="color: gold;"><i class="fas fa-exclamation-triangle"></i> Suspension</span></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<?php if (isset($_GET['id'])): ?>
				<input id="SuspendID" type="hidden" name="SuspendID" value="<?php echo $ApplicantID; ?>">
				<?php else: ?>
				<input id="SuspendID" type="hidden" name="SuspendID" value="">
				<?php endif; ?>
				<div class="form-row mx-1">
					<div class="form-group col-4">
						<label>Years</label>
						<input class="form-control" type="number" name="S_Years">
					</div>
					<div class="form-group col-4">
						<label>Months</label>
						<input class="form-control" type="number" name="S_Months">
					</div>
					<div class="form-group col-4">
						<label>Days</label>
						<input class="form-control" type="number" name="S_Days">
					</div>
					<div class="form-group col-12">
						<label>Remarks</label>
						<input class="form-control" type="text" name="S_Remarks">
					</div>
				</div>
			</div>
			<div class="modal-footer">

				<button type="submit" class="btn btn-primary"><i class="fas fa-stopwatch"></i>Suspend</button>
			</div>
			<?php echo form_close();?>
		</div>
	</div>
</div>