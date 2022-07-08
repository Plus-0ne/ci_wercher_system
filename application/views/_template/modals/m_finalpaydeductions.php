<div class="modal fade" id="FinalPayDeductionsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">Add a New Deduction</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="form-row mx-1">
					<div class="form-group col-6">
						<label>Name</label>
						<input class="deduction-name form-control" type="text">
					</div>
					<div class="form-group col-6">
						<label>Amount</label>
						<input class="deduction-amount form-control" type="number" step="0.01">
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="deduction-add-btn btn btn-primary"><i class="fas fa-plus"></i> Add</button>
			</div>
		</div>
	</div>
</div>