<div class="modal fade" id="GeneratePayslipModal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title"><i class="fas fa-file-invoice-dollar"></i> Generate Payslip</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="form-row">
					<div class="form-group col-12">
						<label>Applicant ID</label>
						<input id="PayslipApplicantID" class="payslip-inputs form-control" type="text" name="ApplicantID">
					</div>
					<div class="form-group col-12">
						<label>Mode</label>
						<select id="PayslipModeSelect" class="payslip-inputs form-control" name="Mode">
							<option value="Weekly" selected>
								Weekly
							</option>
							<option value="Semi-monthly">
								Semi-monthly
							</option>
							<option value="Monthly">
								Monthly
							</option>
						</select>
					</div>
					<div class="form-row col-12">
						<div class="form-group col-sm-12 col-md-6">
							<label>Date Range</label>
							<input id="PayslipFromDate" class="payslip-inputs form-control" type="date" name="From">
						</div>
						<div class="form-group col-sm-12 col-md-6">
							<label>To</label>
							<input id="PayslipToDate" class="payslip-inputs form-control" type="date" name="To">
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<a href="#" id="GeneratePayslipLink" class="btn btn-success" target="_blank"><i class="fas fa-sync-alt"></i> Generate</a>
			</div>
		</div>
	</div>
</div>