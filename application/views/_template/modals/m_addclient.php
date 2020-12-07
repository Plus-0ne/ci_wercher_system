<div class="modal fade" id="addClients" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<?php echo form_open(base_url().'Add_newClient','method="post"');?>
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-plus"></i> Add New Client</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div id="InputFields" class="modal-body">
				<div class="form-row">
					<div class="form-group col-sm-12">
						<label>Name <span class="required-field">*</span></label>
						<input id="ClientName" class="form-control" type="text" name="ClientName" autocomplete="off">
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-sm-12">
						<label>Address</label>
						<input class="form-control" type="text" name="ClientAddress" autocomplete="off">
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-sm-12">
						<label>Contact Number</label>
						<input class="form-control" type="text" name="ClientContact" autocomplete="off">
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-sm-5">
						<label>Employee ID Suffix <span style="color: rgba(0, 0, 0, 0.55);" data-toggle="tooltip" data-placement="top" data-html="true" title="Applicants who get hired to this client will be assigned the designated Employee ID with this as the suffix. See the preview for an example.<br><br>By default, all ID follows the format of WC(Suffix)-NUMBER-YEAR. You can manually change the ID of an applicant whenever they are hired."><i>(?)</i></span> <span class="required-field">*</span></label>
						<input id="EmployeeIDSuffix" class="form-control" type="text" name="EmployeeIDSuffix" autocomplete="off">
					</div>
					<div class="form-group col-sm-2 text-center">
						<p><i class="fas fa-arrow-right" style="margin-right: -1px; color: rgba(0, 0, 0, 0.55);"></i></p>
						<p><i class="fas fa-arrow-right" style="margin-right: -1px; color: rgba(0, 0, 0, 0.55);"></i></p>
					</div>
					<div class="form-group col-sm-5">
						<label>Preview</label>
						<input id="SuffixPreview" class="form-control" type="text" autocomplete="off" readonly>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<div class="save-btn-locked-group">
					<span class="mr-2" style="font-size: 18px; color: rgba(255, 25, 25);"><i class="fas fa-exclamation-circle"></i> Name and suffix is required</span>
					<button type="button" class="btn btn-secondary hover-disabled"><i class="fas fa-lock"></i> Add</button>
				</div>
				<div class="save-btn-valid-group" style="display: none;">
					<span class="mr-2" style="font-size: 18px; color: green;"><i class="fas fa-check-circle"></i> Client is valid for saving</span>
					<button type="submit" class="btn btn-success"><i class="fas fa-plus"></i> Add</button>
				</div>
			</div>
			<?php echo form_close();?>
		</div>
	</div>
</div>