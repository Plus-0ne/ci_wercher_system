<div class="modal fade" id="ModalProvisions" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Provisions for <a href="" id="ProvisionsApplicantName"></a></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<input id="ProvisionsApplicantID" type="hidden" readonly>
				<input id="ProvisionsYear" type="hidden" readonly>
				<input id="ProvisionsMonth" type="hidden" readonly>
				<input id="ProvisionsWeek" type="hidden" readonly>
				<div class="form-row ml-1 my-2" style="position: sticky;">
					<div class="col-sm-3">
						Prov. Name
					</div>
					<div class="col-sm-3">
						Amount
					</div>
					<div class="col-sm-5">
						Date
					</div>
					<div class="col-sm-1">
					</div>
				</div>
				<div id="LoadProvisionContainer" class="form-row ml-1 my-2">
					<i class="spinner-border m-2 mr-auto ml-auto" role="status"></i>
					<br>
					Loading...
				</div>
				<div class="new-provision-row form-row ml-1" style="display: none; opacity: 0.5; border-bottom: 1px solid #28a745;">
					<div class="col-sm-12 ml-1 my-2">
						<span style="font-size: 14px; color: #28a745"><i class="fas fa-info-circle"></i> NEW</span>
					</div>
				</div>
				<div class="new-provision-row form-row ml-1 my-2" style="position: sticky; display: none;">
					<div class="col-sm-3">
						Prov. Name
					</div>
					<div class="col-sm-3">
						Amount
					</div>
					<div class="col-sm-5">
						Date
					</div>
					<div class="col-sm-1">
					</div>
				</div>
				<div id="NewProvisionContainer" class="new-provision-row form-row ml-1" style="display: none; opacity: 0.5;">
					<!-- New rows goes here... -->
				</div>
				<datalist id="payroll-provisions">
					<?php
					$getProvisions = $this->Model_Selects->GetDistinctPayrollProvisionsNames();
					if ($getProvisions->num_rows() > 0) {
						foreach ($getProvisions->result_array() as $row) {
							echo '<option value="' . $row['ProvisionName'] . '">' ?? 'Unknown';
						}
					}
					?>
				</datalist>
				<div class="form-row mt-3 ajax-load-container" style="display: none;">
					<div class="col-sm-12">
						<button type="button" class="new-provision-add-btn btn btn-info w-100"><i class="fas fa-plus"></i> Add More Provision</button>
					</div>
				</div>
			</div>
			<div class="modal-footer ajax-load-container" style="display: none;">
				<span class="mr-auto" style="font-size: 14px;">TOTAL: <b id="ProvisionsTotal"></b></span>
				<button id="SaveProvisions" type="button" class="save-provision-btn btn btn-success"><i class="fas fa-check"></i> Save</button>
			</div>
		</div>
	</div>
</div>