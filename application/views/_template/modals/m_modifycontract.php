<div class="modal fade" id="ModifyContractModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<?php echo form_open(base_url().'ModifyContract','method="POST"');?>
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">Modify Contract</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div id="ClientModal" class="modal-body">
				<?php if (isset($_GET['id'])): ?>
				<input id="idToHire" type="hidden" name="M_ApplicantID" value="<?php echo $ApplicantID; ?>">
				<?php else: ?>
				<input id="idToHire" type="hidden" name="M_ApplicantID" value="">
				<?php endif; ?>
				<div class="form-row">
					<div class="form-group col-8">
						<label>Client</label>
						<select id="ClientSelect" class="form-control" name="M_ClientID">
							<?php foreach ($getClientOption->result_array() as $row): ?>
								<option value="<?=$row['ClientID'];?>" <?php if ($row['ClientID'] == $ClientEmployed) { echo 'selected'; } ?>>
									<?=$row['Name'];?>
								</option>
							<?php endforeach ?>
						</select>
					</div>
					<div class="form-group col-4">
						<label>Salary</label>
						<div class="input-icon-sm">
							<input class="form-control" type="number" name="M_Salary" value="<?php echo $SalaryExpected ?>">
							<i>₱</i>
						</div>
					</div>
				</div>
				<div class="form-row my-1">
					<div class="form-group col-sm-12 col-md-6">
						<?php
							$ds = new DateTime($DateStarted);
							$dsText = $ds->format('Y-m-d');
							$dsH = $ds->format('H');
							$dsi = $ds->format('i');
							$dss = $ds->format('s');
							$dsType = $ds->format('A');

							if ($dsH > 12) {
								$dsH = $dsH - 12;
								if ($dsH < 10) {
									$dsH = '0' . $dsH;
								}
							}
						?>
						<label>Contract Started</label>
						<input class="form-control" type="date" name="M_DateStarted" value="<?php echo $dsText; ?>">
					</div>
					<div class="form-group col-sm-12 col-md-6">
						<?php if($Status == 'Employed'): ?>
						<?php
							$de = new DateTime($DateEnds);
							$deText = $de->format('Y-m-d');
							$deH = $de->format('H');
							$dei = $de->format('i');
							$des = $de->format('s');
							$deType = $de->format('A');

							if ($deH > 12) {
								$deH = $deH - 12;
								if ($deH < 10) {
									$deH = '0' . $deH;
								}
							}
						?>
						<label>Contract Ends</label>
						<input class="form-control" type="date" name="M_DateEnds" value="<?php echo $deText; ?>">
						<?php endif; ?>
					</div>
					<div class="form-row col-sm-6">
						<div class="form-group col-sm-4">
							<input class="form-control" type="number" name="M_DateStartedHour" value="<?php echo $dsH; ?>">
						</div>
						<div class="form-group col-sm-4">
							<div class="input-icon-sm">
								<input class="form-control" type="number" name="M_DateStartedMinute" value="<?php echo $dsi; ?>">
								<i>:</i>
							</div>
						</div>
						<div class="form-group col-sm-4">
							<div class="input-icon-sm">
								<input class="form-control" type="number" name="M_DateStartedSecond" value="<?php echo $dss; ?>">
								<i>:</i>
							</div>
						</div>
					</div>
					<div class="form-row col-sm-6 ml-auto">
						<?php if($Status == 'Employed'): ?>
						<div class="form-group col-sm-4">
							<input class="form-control" type="number" name="M_DateEndsHour" value="<?php echo $deH; ?>">
						</div>
						<div class="form-group col-sm-4">
							<div class="input-icon-sm">
								<input class="form-control" type="number" name="M_DateEndsMinute" value="<?php echo $dei; ?>">
								<i>:</i>
							</div>
						</div>
						<div class="form-group col-sm-4">
							<div class="input-icon-sm">
								<input class="form-control" type="number" name="M_DateEndsSecond" value="<?php echo $des; ?>">
								<i>:</i>
							</div>
						</div>
						<?php endif; ?>
					</div>
					<div class="form-row col-sm-6 mr-auto">
						<div class="form-group col-sm-6">
							<input type="radio" id="M_DateStartedHourTypeAM" name="M_DateStartedHourType" value="AM" <?php if($dsType == 'AM') { echo 'checked'; } ?>>
							<label for="M_DateStartedHourTypeAM">AM</label>
							<input type="radio" id="M_DateStartedHourTypePM" name="M_DateStartedHourType" value="PM" <?php if($dsType == 'PM') { echo 'checked'; } ?>>
							<label for="M_DateStartedHourTypePM">PM</label>
						</div>
					</div>
					<div class="form-row col-sm-6 ml-auto">
						<?php if($row['Status'] == 'Employed'): ?>
						<div class="form-group col-sm-6">
							<input type="radio" id="M_DateEndsHourTypeAM" name="M_DateEndsHourType" value="AM" <?php if($deType == 'AM') { echo 'checked'; } ?>>
							<label for="M_DateEndsHourTypeAM">AM</label>
							<input type="radio" id="M_DateEndsHourTypePM" name="M_DateEndsHourType" value="PM" <?php if($deType == 'PM') { echo 'checked'; } ?>>
							<label for="M_DateEndsHourTypePM">PM</label>
						</div>
						<?php endif; ?>
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-12">
						<label>Employee ID</label>
						<input class="form-control" type="text" name="M_EmployeeID" value="<?php echo $EmployeeID; ?>">
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<!-- <button type="submit" class="btn btn-primary mr-auto"><i class="fas fa-redo"></i> Reset</button> -->
				<button type="submit" class="btn btn-success"><i class="fas fa-check"></i> Save Changes</button>
			</div>
			<?php echo form_close();?>
		</div>
	</div>
</div>