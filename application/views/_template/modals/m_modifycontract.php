<div class="modal fade" id="ModifyContractModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<?php echo form_open(base_url().'ModifyContract','method="POST"');
				$modifyText = 'Employment';
				if ($Status == 'Employed') {
					$modifyText = 'Contract';
				} else {
					$modifyText = 'Employment';
				}

			?>
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">Modify <?php echo $modifyText; ?></h5>
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
							<input class="form-control" type="number" step=".01" name="M_Salary" value="<?php echo $SalaryExpected ?>">
							<i>₱</i>
						</div>
					</div>
				</div>
				<div class="form-row my-2">
					<div class="form-row col-12">
						<div class="col-sm-4" style="margin-top: 5px;">
							Salary Distribution
						</div>
						<div class="col-sm-8">
							<select id="SalaryType" class="form-control" name="M_SalaryType">
								<option value="Daily"<?php if ($SalaryType == 'Daily') { echo ' selected'; } ?>>Daily</option>
								<option value="Monthly"<?php if ($SalaryType == 'Monthly') { echo ' selected'; } ?>>Monthly</option>
								<option value="Total"<?php if ($SalaryType == 'Total') { echo ' selected'; } ?>>Total for duration</option>
							</select>
						</div>
					</div>
				</div>
				<div class="salarytotal-group my-2"<?php if ($SalaryType != 'Total') { echo 'style="display: none;"'; } ?>>
					<div class="form-row mx-1">
						<div class="form-group col-4">
							<label>Years</label>
							<input class="form-control" type="number" name="M_ST_Years" value="0">
						</div>
						<div class="form-group col-4">
							<label>Months</label>
							<input class="form-control" type="number" name="M_ST_Months" value="0">
						</div>
						<div class="form-group col-4">
							<label>Days</label>
							<input class="form-control" type="number" name="M_ST_Days" value="0">
						</div>
					</div>
				</div>
				<div class="form-row my-1">
				<?php if($Status == 'Employed'): ?>
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
				<?php else: ?>
					<div class="form-row col-sm-12 col-md-12">
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
						<div class="col-sm-4" style="margin-top: 5px;">
							Employment Started
						</div>
						<div class="col-sm-8">
							<input class="form-control" type="date" name="M_DateStarted" value="<?php echo $dsText; ?>">
						</div>
					</div>
					<div class="form-row col-sm-6 mt-2">
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
					<div class="form-row col-sm-6 mr-auto mt-3">
						<div class="form-group col-sm-6">
							<input type="radio" id="M_DateStartedHourTypeAM" name="M_DateStartedHourType" value="AM" <?php if($dsType == 'AM') { echo 'checked'; } ?>>
							<label for="M_DateStartedHourTypeAM">AM</label>
							<input type="radio" id="M_DateStartedHourTypePM" name="M_DateStartedHourType" value="PM" <?php if($dsType == 'PM') { echo 'checked'; } ?>>
							<label for="M_DateStartedHourTypePM">PM</label>
						</div>
					</div>
				<?php endif; // End of contract check ?>
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