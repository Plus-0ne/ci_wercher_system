<?php foreach ($GetWeeklyListEmployee->result_array() as $erow): ?>
<div class="modal fade wercher-modal-background modal-fixed-footer" id="HoursWeeklyModal_<?php echo $erow['ApplicantID']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-payroll" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Work Hours for <?php echo $erow['LastName'] . ', ' . $erow['FirstName'] . ' ' . $erow['MiddleInitial'] ?> | <span class="TotalHoursInAWeek">48</span> Hours Total</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="<?php echo base_url().'SetWeeklyHours'; ?>" method="post">
						<input id="ApplicantID" type="hidden" name="ApplicantID" value="<?php echo $erow['ApplicantID']; ?>">
						<input id="ClientID" type="hidden" name="ClientID" value="<?php echo $erow['ClientEmployed']; ?>">
						<input id="ModeType" type="hidden" name="ModeType" value="<?php echo $_GET['mode']; ?>">
						<div class="form-row">
							<div class="form-group col-sm-12 col-md-2">
								<label>Type</label>
								<input id="SalaryType" class="form-control" type="text" name="" value="<?php echo $Mode==0?"Weekly":($Mode==1?"Semi-monthly":"Monthly"); ?>" readonly>
							</div>
							<div class="form-group col-sm-12 col-md-2">
								<label>Salary</label>
								<div class="input-icon-sm">
									<input id="Salary" class="form-control" type="number" name="" value="<?php echo $erow['SalaryExpected']; ?>" readonly>
									<i>₱</i>
								</div>
							</div>
							<div class="form-group col-sm-12 col-md-2">
								<label>Per&nbsp;Day</label>
								<div class="input-icon-sm">
									<?php
										if(!empty($erow['SalaryExpected']) || $erow['SalaryExpected'] != NULL) {
											if ($Mode == 2) {
												$RatePerDay = $erow['SalaryExpected'] / 24; // (days) Monthly
											} elseif ($Mode == 1) {
												$RatePerDay = $erow['SalaryExpected'] / 12; // (days) Semi-monthly
											} elseif ($Mode == 0) {
												$RatePerDay = $erow['SalaryExpected'] / 6; // (days) Weekly
											}
											$RatePerDay = round($RatePerDay, 2);
										} else {
											$RarePerDay = 0;
										}
									?>
									<input id="AveragePerHour" class="form-control" type="number" name="" value="<?=$RatePerDay;?>" readonly>
									<i>₱</i>
								</div>
							</div>
						</div>
						<div id="SalaryDays" class="form-row">
							<?php foreach ($GetWeeklyDates->result_array() as $row): ?>
								<?php 
									$pdate = new DateTime($row['Time']);
									$pdayRaw = $pdate->format('Y-m-d');
									$pday = DateTime::createFromFormat('Y-m-d', $pdayRaw)->format('M d, Y');
									$pdayText = DateTime::createFromFormat('Y-m-d', $pdayRaw)->format('D');
									$pdayTooltip = DateTime::createFromFormat('Y-m-d', $pdayRaw)->format('l'); 
								?>
								<div class="day-container_<?php echo $row['Time']; ?> col-sm-12 col-md-2" style="margin-left: 25px;">
									<div class="card mb-3">
										<input id="<?php echo $row['Time']; ?>" type="hidden" name="<?php echo $row['Time']; ?>" value="<?php echo $row['Time']; ?>">
										<div class="card-header" data-toggle="tooltip" data-placement="top" data-html="true" title="<?php echo $pdayTooltip; ?>">
											<div class="col-sm-12 day-container-date text-center">
												<b><?php echo $pday . ' - ' . strtoupper($pdayText); ?></b>
											</div>
										</div>
										<div class="card-body">
											<div class="form-row">
												<div class="form-group col-8">
													<div>Hours</div>
													<input id="" class="form-control Hours_<?php echo $row['Time']; ?>" type="number" name="Hours_<?php echo $row['Time']; ?>" value="<?php
															foreach ($this->Model_Selects->GetMatchingDates($erow['ApplicantID'], $row['Time'], $_GET['mode'])->result_array() as $nrow):
																if($nrow['Hours'] != NULL) {
																	echo $nrow['Hours'];
																} else {
																	echo '0';
																}
															endforeach;
													?>">
												</div>
												<div class="form-group col-4">
													<div class="">Overtime</div>
													<input class="form-control OTHours_<?php echo $row['Time']; ?>" type="number" name="OTHours_<?php echo $row['Time']; ?>" value="<?php
															foreach ($this->Model_Selects->GetMatchingDates($erow['ApplicantID'], $row['Time'], $_GET['mode'])->result_array() as $nrow):
																if($nrow['Overtime'] != NULL) {
																	echo $nrow['Overtime'];
																} else {
																	echo '0';
																}
															endforeach;
													?>">
												</div>
											</div>
											<div class="btn-group form-row">
												<div class="regular-btn-group form-group col-sm-1 col-md-2 mr-1">
													<button  type="button" class="regular-btn btn btn-success SalaryButtons"><i class="fas fa-sun wercher-visible text-primary" style="margin-right: -1px;"></i></button>
													<input class="REGCheck_<?php echo $row['Time']; ?> regular-btn" type="checkbox" <?php if (isset($Regular)) { echo 'checked'; } ?> checked>
												</div>
												<div class="rest-btn-group form-group col-sm-1 col-md-2 mr-2">
													<button type="button" class="rest-btn btn btn-secondary SalaryButtons"><i class="fas fa-bed wercher-visible" style="margin-right: -1px;"></i></button>
													<input class="RESTCheck_<?php echo $row['Time']; ?>" type="checkbox" <?php if (isset($RestDay)) { echo 'checked'; } ?>>
												</div>
												<div class="special-btn-group form-group col-sm-1 col-md-2 mr-1">
													<button type="button" class="special-btn btn btn-secondary SalaryButtons"><i class="fas fa-flag wercher-visible" style="margin-right: -1px;"></i></button>
													<input class="SPCheck_<?php echo $row['Time']; ?>" type="checkbox" <?php if (isset($Holiday)) { echo 'checked'; } ?>>
												</div>
												<div class="national-btn-group form-group col-sm-1 col-md-2 mr-3">
													<button type="button" class="national-btn btn btn-secondary SalaryButtons"><i class="fas fa-candy-cane wercher-visible" style="margin-right: -1px;"></i></button>
													<input class="NHCheck_<?php echo $row['Time']; ?>" type="checkbox" <?php if (isset($Holiday)) { echo 'checked'; } ?>>
												</div>
												<div class="night-btn-group form-group col-sm-1 col-md-2">
													<button type="button" class="night-btn NCheck_<?php echo $row['Time']; ?> btn btn-secondary SalaryButtons"><i class="fas fa-moon wercher-visible" style="margin-right: -1px;"></i></button>
												</div>
												<!-- <div class="form-group col-6">
													<input class="SLCheck_<?php echo $row['Time']; ?> SalaryButtons" type="checkbox" data-toggle="toggle" data-on="SL" data-off="SL" data-onstyle="danger" data-offstyle="secondary" data-width="85" <?php if (isset($Holiday)) { echo 'checked'; } ?>>
												</div>
												<div class="form-group col-6">
													<input class="VLCheck_<?php echo $row['Time']; ?> SalaryButtons" type="checkbox" data-toggle="toggle" data-on="VL" data-off="VL" data-onstyle="danger" data-offstyle="secondary" data-width="85" <?php if (isset($Holiday)) { echo 'checked'; } ?>>
												</div> -->
											</div>
											<div class="form-row night-premium-container" style="display: none;">
												<div class="col-sm-12 text-center NightPremium">
													<b>Night Premium</b>
												</div>
												<div class="form-group col-8 NightPremium">
													<div>Hours</div>
													<input id="" class="form-control NightHours_<?php echo $row['Time']; ?>" type="number" name="NightHours_<?php echo $row['Time']; ?>" value="<?php
															foreach ($this->Model_Selects->GetMatchingDates($erow['ApplicantID'], $row['Time'], $_GET['mode'])->result_array() as $nrow):
																if($nrow['NightHours'] != NULL) {
																	echo $nrow['NightHours'];
																} else {
																	echo '0';
																}
															endforeach;
													?>">
												</div>
												<div class="form-group col-4 NightPremium">
													<div class="">Overtime</div>
													<input class="form-control NightOTHours_<?php echo $row['Time']; ?>" type="number" name="NightOTHours_<?php echo $row['Time']; ?>" value="<?php
															foreach ($this->Model_Selects->GetMatchingDates($erow['ApplicantID'], $row['Time'], $_GET['mode'])->result_array() as $nrow):
																if($nrow['NightOvertime'] != NULL) {
																	echo $nrow['NightOvertime'];
																} else {
																	echo '0';
																}
															endforeach;
													?>">
												</div>
											</div>
											<div class="form-row hhhh">
												<div class="form-group col-6 input-icon">
													<label>Per Hour</label>
													<div class="input-icon-sm">
														<input class="form-control  h_valueh" type="hidden" name="total_hoursperday_<?php echo $row['Time']; ?>" value="<?php if(isset($nrow['Hours'])) {
															$totalho = $nrow['Hours'];
														} else {
															$totalho = '0';
														}
														if(isset($nrow['Overtime'])) {
															$totalover = $nrow['Overtime'];
														} else {
															$totalover = '0';
														}
														$totalhaha = $totalho + $totalover;
														echo $totalhaha;
														?>">
														<input class="form-control PerHour" type="text" name="dayRate_<?php echo $row['Time']; ?>" value="<?php 
														$RatePerHour = $RatePerDay / 8;
														echo round($RatePerHour, 2);
																?>" readonly>
														<i>₱</i>
													</div>
												</div>
												<div class="form-group col-6 input-icon">
													<label>Total Day Pay</label>
													<div class="input-icon-sm">
														<input id="t_pay" class="form-control t_pay_<?php echo $row['Time']; ?>" type="text" name="TdRate_<?php echo $row['Time']; ?>" value="" readonly>
														<i>₱</i>
													</div>
												</div>
												<div class="form-group col-12">
													<label>Remarks</label>
													<div class="input-icon-sm">
														<input class="form-control" type="text" name="Remarks_<?php echo $row['Time']; ?>" value="<?php
															foreach ($this->Model_Selects->GetMatchingDates($erow['ApplicantID'], $row['Time'], $_GET['mode'])->result_array() as $nrow):
																if($nrow['Remarks'] != NULL) {
																	echo $nrow['Remarks'];
																}
															endforeach; ?>">
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							<?php endforeach; ?>
							</div>
					<div class="modal-fade text-center" style="display: none;">
						<hr>
						<div class="form-row">
							<div class="col-4 col-sm-2">
								<label>Fill All</label>
								<input id="HoursDayOne" class="form-control" type="number" name="" value="8">
								<button id="add_machop" type="submit" class="btn btn-info mt-2" data-dismiss="modal" aria-label="Close"><i class="fas fa-angle-double-right"></i></button>
							</div>
							<div class="col-4 col-sm-2">
								<label>Increment</label>
								<input id="HoursDayOne" class="form-control" type="number" name="" value="1">
								<button id="add_machop" type="submit" class="btn btn-info mt-2" data-dismiss="modal" aria-label="Close"><i class="fas fa-angle-double-right"></i></button>
							</div>
							<div class="col-4 col-sm-2">
								<label>Decrement</label>
								<input id="HoursDayOne" class="form-control" type="number" name="" value="1">
								<button id="add_machop" type="submit" class="btn btn-info mt-2" data-dismiss="modal" aria-label="Close"><i class="fas fa-angle-double-right"></i></button>
							</div>
						</div>
					</div>											
				</div>
				<div class="modal-footer">
					<button id="MoreOptions" type="button" class="btn btn-primary mr-auto"><i class="fas fa-cog"></i> More Options</button>
					<input type="hidden" name="CutoffMode" value="<?php echo $Mode ?>" />
					<input type="radio" id="" name="DeductionOption" value="0">
					<label for="rdNoDeductions">No Deductions</label><br>
					<input type="radio" id="rdWithDeductions" name="DeductionOption" value="1" checked>
					<label for="rdWithDeductions">With Deductions</label><br>
					<input type="radio" id="rdDeferredDeductions" name="DeductionOption" value="2">
					<label for="rdDeferredDeductions">Defer Deductions</label>
					<button type="submit" class="btn btn-primary"><i class="fas fa-clock"></i> Set</button>
				</div>
				</form>
			</div>
		</div>
	</div>
<?php endforeach; ?>