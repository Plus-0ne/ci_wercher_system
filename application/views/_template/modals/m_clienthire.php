<div class="modal fade" id="hirthis" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<?php echo form_open(base_url().'EmployApplicant','method="POST"');?>
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">Hire applicant</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<?php if (isset($_GET['id'])): ?>
				<input id="idToHire" type="hidden" name="ApplicantID" value="<?php echo $ApplicantNo; ?>">
				<?php else: ?>
				<input id="idToHire" type="hidden" name="ApplicantID" value="">
				<?php endif; ?>
				<div class="form-row">
					<div class="form-group col">
						<label>Choose Client</label>
						<select class="form-control" name="ClientID">
							<?php foreach ($getClientOption->result_array() as $row): // TODO: Fix so it doesn't show 'Deleted' status clients.?>
								<option value="<?=$row['ClientID'];?>">
									<?=$row['Name'];?>
								</option>
							<?php endforeach ?>
						</select>
					</div>
					<div class="form-group col">
						<label>Choose Months</label>
						<input class="form-control" type="number" name="H_Months">
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-primary">Save changes</button>
			</div>
			<?php echo form_close();?>
		</div>
	</div>
</div>