<div class="modal fade" id="AddSuppDoc" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<?php echo form_open_multipart(base_url().'AddSupDoc','method="post"'); ?>
				<input id="pImageChecker" type="hidden" name="pImageChecker">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Upload Documents</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<input id="Pass_ID" type="hidden" name="ApplicantID">
					<div class="form-row" style="margin-left: 15px; margin-right: 15px;">
						<?php if($this->agent->is_mobile()): ?>
						<div class="form-group col-sm-12 mt-5">
							<div class="input-icon-sm">
								<input id="pFile" type="file" name="pFile" placeholder="Choose PDF file to upload" style="padding-left: 45px;" value="">
								<i class="fas fa-file-pdf" style="width: 45px;"></i>
							</div>
						</div>
						<?php else: ?>
						<input type="hidden" id="MAX_FILE_SIZE" name="MAX_FILE_SIZE" value="300000" />

						<div class="wercher-drop-area form-group col-sm-12 text-center">
							<div id="output">
								<div class="wercher-drop-area-file">
									<p>
										<i class="fas fa-download"></i>
									</p>
									<label for="fileselect">Choose a PDF file</label>
									<input type="file" id="fileselect" name="pFile" />
								</div>
								<div id="output-output">
								</div>
							</div>
						</div>
						<?php endif; ?>
					</div>
					<hr>
					<div class="form-row" style="margin-left: 10px; margin-right: 10px;">
						<div class="form-group col-sm-4 text-center">
							<label>Type</label>
							<select id="Type" class="form-control" name="Type">
								<option value="Document">Document</option>
								<option value="Violation">Violation</option>
								<option value="Suspension">Suspension</option>
								<option value="Blacklist">Blacklist</option>
							</select>
						</div>
						<div class="form-group col-sm-8 text-center">
							<label>Subject</label>
							<input class="form-control" type="text" name="Subject">
						</div>
					</div>
					<div class="suspension-group form-row mx-1" style="display: none;">
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
					</div>
					<div class="form-group col-sm-12 text-center">
						<label>Description</label>
						<textarea class="form-control" name="Description" rows="6"></textarea>
					</div>
					<div class="form-group col-sm-12 text-center">
						<label>Remarks</label>
						<textarea class="form-control" name="Remarks" rows="6"></textarea>
					</div>
					</div>
					<div class="modal-footer">
						<div id="ViolationNotice" class="row ml-auto mr-auto w-100" style="display: none; float: left;">
							<div class="col-sm-12 col-mb-12 w-100 text-center document-notice-violation py-2">
								<div class="col-sm-12">
									<i class="fas fa-exclamation-triangle" style="font-size: 24px;"></i>
									This document will be a violation.
								</div>
							</div>
						</div>
						<div id="BlacklistNotice" class="row ml-auto mr-auto w-100" style="display: none; float: left;">
							<div class="col-sm-12 col-mb-12 w-100 text-center document-notice-blacklist py-2">
								<div class="col-sm-12">
									<i class="fas fa-exclamation-triangle" style="font-size: 24px;"></i>
									This individual will be blacklisted.
								</div>
							</div>
						</div>
						<div id="SuspensionNotice" class="row ml-auto mr-auto w-100" style="display: none; float: left;">
							<div class="col-sm-12 col-mb-12 w-100 text-center document-notice-violation py-2">
								<div class="col-sm-12">
									<i class="fas fa-exclamation-triangle" style="font-size: 24px;"></i>
									This individual will be suspended.
								</div>
							</div>
						</div>
						<button type="submit" class="btn btn-success"><i class="fas fa-upload"></i> Upload</button>
					</div>
				</div>
			<?php echo form_close(); ?>
		</div>
	</div>
</div>