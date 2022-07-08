<div class="modal fade" id="ModalLoans" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Loans for <a href="" id="LoansApplicantName"></a> on this week</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<input id="LoansApplicantID" type="hidden" readonly>
				<input id="LoansYear" type="hidden" readonly>
				<input id="LoansMonth" type="hidden" readonly>
				<input id="LoansWeek" type="hidden" readonly>
				<div class="form-row ml-1 my-2" style="position: sticky;">
					<div class="col-sm-3">
						Loan Name
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
				<div id="LoadLoanContainer" class="form-row ml-1 my-2">
					<i class="spinner-border m-2 mr-auto ml-auto" role="status"></i>
					<br>
					Loading...
				</div>
				<div class="new-loan-row form-row ml-1" style="display: none; opacity: 0.5; border-bottom: 1px solid #28a745;">
					<div class="col-sm-12 ml-1 my-2">
						<span style="font-size: 14px; color: #28a745"><i class="fas fa-info-circle"></i> NEW</span>
					</div>
				</div>
				<div class="new-loan-row form-row ml-1 my-2" style="position: sticky; display: none;">
					<div class="col-sm-3">
						Loan Name
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
				<div id="NewLoanContainer" class="new-loan-row form-row ml-1" style="display: none; opacity: 0.5;">
					<!-- New rows goes here... -->
				</div>
				<div class="form-row mt-3 ajax-load-container" style="display: none;">
					<div class="col-sm-12">
						<button type="button" class="new-loan-add-btn btn btn-info w-100"><i class="fas fa-plus"></i> Add More Loan</button>
					</div>
				</div>
				<datalist id="payroll-loans">
					<?php
					$getLoans = $this->Model_Selects->GetDistinctPayrollLoansNames();
					if ($getLoans->num_rows() > 0) {
						foreach ($getLoans->result_array() as $row) {
							echo '<option value="' . $row['LoanName'] . '">' ?? 'Unknown';
						}
					}
					?>
				</datalist>
			</div>
			<div class="modal-footer ajax-load-container" style="display: none;">
				<span class="mr-auto" style="font-size: 14px;">TOTAL: <b id="LoanTotal"></b></span>
				<button id="SaveLoans" type="button" class="save-loan-btn btn btn-success"><i class="fas fa-check"></i> Save</button>
			</div>
		</div>
	</div>
</div>