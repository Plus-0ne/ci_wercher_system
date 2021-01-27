<div class="modal fade" id="hirthis" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<?php echo form_open(base_url().'EmployApplicant','method="POST"');?>
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">Hire Applicant</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div id="ClientModal" class="modal-body">
				<?php if (isset($_GET['id'])): ?>
				<input id="idToHire" type="hidden" name="ApplicantID" value="<?php echo $ApplicantID; ?>">
				<?php else: ?>
				<input id="idToHire" type="hidden" name="ApplicantID" value="">
				<?php endif; ?>
				<div class="form-row">
					<div class="form-group col-8">
						<label>Choose Client</label>
						<select id="ClientSelect" class="form-control" name="ClientID">
							<option hidden="" disabled="" selected="">
								--
							</option>
							<?php foreach ($getClientOption->result_array() as $row): ?>
								<option value="<?=$row['ClientID'];?>">
									<?=$row['Name'];?>
								</option>
							<?php endforeach ?>
						</select>
					</div>
					<div class="form-group col-4">
						<label>Salary Per Month</label>
						<div class="input-icon-sm">
							<input class="form-control" type="number" name="Salary" value="">
							<i>₱</i>
						</div>
					</div>
				</div>
				<div class="form-row my-2">
					<div class="form-row col-12">
						<div class="col-sm-4" style="margin-top: 5px;">
							Employment Type
						</div>
						<div class="col-sm-8">
							<select id="EmploymentType" class="form-control" name="EmploymentType">
								<option value="Contractual" selected>Contractual</option>
								<option value="Regular">Regular</option>
							</select>
						</div>
					</div>
				</div>
				<div class="form-row">
					<div class="form-row col-12">
						<div class="col-sm-4" style="margin-top: 5px;">
							Employee ID
						</div>
						<div class="col-sm-8">
							<input id="EmployeeID" class="form-control" type="text" name="EmployeeID" value="">
						</div>
					</div>
				</div>
				<div class="contractual-group">
					<hr>
					<div class="form-row ml-1 my-2">
						<h5 class="text-center">
							Contract Duration
						</h5>
					</div>
					<div class="form-row mx-1">
						<div class="form-group col-4">
							<label>Years</label>
							<input class="form-control" type="number" name="H_Years" value="1">
						</div>
						<div class="form-group col-4">
							<label>Months</label>
							<input class="form-control" type="number" name="H_Months" value="0">
						</div>
						<div class="form-group col-4">
							<label>Days</label>
							<input class="form-control" type="number" name="H_Days" value="0">
						</div>
					</div>
				</div>
				
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-success"><i class="fas fa-user-edit"></i> Hire</button>
			</div>
			<?php echo form_close();?>
		</div>
	</div>
</div>