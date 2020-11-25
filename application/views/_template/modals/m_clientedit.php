<div class="modal fade" id="editClient" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<?php echo form_open(base_url().'EditClient','method="post"');?>
			<input type="hidden" id="EditClientID" name="EditClientID">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-user-tag"></i> Edit <span id="EditClientNameTitle">[Client Name]</span></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="form-row">
					<div class="form-group col-sm-12">
						<label>Name</label>
						<input class="form-control" type="text" id="EditClientName" name="EditClientName" autocomplete="off">
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-sm-12">
						<label>Address</label>
						<input class="form-control" type="text" id="EditClientAddress" name="EditClientAddress" autocomplete="off">
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-sm-12">
						<label>Contact Number</label>
						<input class="form-control" type="text" id="EditClientContact" name="EditClientContact" autocomplete="off">
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-sm-5">
						<label>Employee ID Suffix <span style="color: rgba(0, 0, 0, 0.55);" data-toggle="tooltip" data-placement="top" data-html="true" title="Applicants who get hired to this client will be assigned the designated Employee ID with this as the suffix. See the preview for an example.<br><br>By default, all ID follows the format of WC(Suffix)-NUMBER-YEAR. You can manually change the ID of an applicant whenever they are hired."><i>(?)</i></span></label>
						<input id="EditEmployeeIDSuffix" class="form-control" type="text" name="EditEmployeeIDSuffix" autocomplete="off">
					</div>
					<div class="form-group col-sm-2 text-center">
						<p><i class="fas fa-arrow-right" style="margin-right: -1px; color: rgba(0, 0, 0, 0.55);"></i></p>
						<p><i class="fas fa-arrow-right" style="margin-right: -1px; color: rgba(0, 0, 0, 0.55);"></i></p>
					</div>
					<div class="form-group col-sm-5">
						<label>Preview</label>
						<input id="EditSuffixPreview" class="form-control" type="text" autocomplete="off" readonly>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<a href="#" id="EditRemoveClient" class="btn btn-danger mr-auto" onclick="return confirm('Remove Client?')"><i class="fas fa-times"></i> Archive Client</a>
				<button type="submit" class="btn btn-success"><i class="fas fa-check"></i> Confirm Changes</button>
			</div>
			<?php echo form_close();?>
		</div>
	</div>
</div>