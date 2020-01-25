<?php foreach ($GetWeeklyListEmployee->result_array() as $erow): ?>
<div class="modal fade" id="HoursWeeklyModal_<?php echo $erow['ApplicantID']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-xxl" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Work Hours for <?php echo $erow['LastName'] . ', ' . $erow['FirstName'] . ' ' . $erow['MiddleInitial'] ?> | <span class="TotalHoursInAWeek">48</span> Hours Total</h5>
					<!-- <div class="ml-auto" data-toggle="tooltip" data-placement="bottom" title="Autosaves to the Database with each input">
						<label>Autosave&nbsp;<span style="color: rgba(125, 125, 125, 0.9)">(?)</span></label>
						<button type="button" class="btn btn-success"><i class="fas fa-check"></i> On</button>
					</div> -->
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="<?php echo base_url().'SetWeeklyHours'; ?>" method="post">
						<input id="ApplicantID" type="hidden" name="ApplicantID" value="<?php echo $erow['ApplicantID']; ?>">
						<input id="ClientID" type="hidden" name="ClientID" value="<?php echo $erow['ClientEmployed']; ?>">
						<div class="form-row">
							<div class="form-group col-sm-12 col-md-2">
								<label>Type</label>
								<input id="SalaryType" class="form-control" type="text" name="" value="Weekly" readonly>
							</div>
							<div class="form-group col-sm-12 col-md-2">
								<label>Salary</label>
								<div class="input-icon-sm">
									<input id="Salary" class="form-control" type="number" name="" value="" readonly>
									<i>₱</i>
								</div>
							</div>
							<div class="form-group col-sm-12 col-md-2">
								<label>Average&nbsp;Per&nbsp;Hour</label>
								<div class="input-icon-sm">
									<input id="AveragePerHour" class="form-control" type="number" name="" value="" readonly>
									<i>₱</i>
								</div>
							</div>
							
<!-- 							<div id="SalaryOvertimeFade" class="form-group col-sm-12 col-md-2 ml-auto">
								<label>Overtime Bonus</label>
								<input id="SalaryOvertime" class="form-control" type="text" name="" readonly>
							</div> -->
						</div>
						<div id="SalaryDays" class="form-row">
							<?php foreach ($GetWeeklyDates->result_array() as $row): ?>
								<input id="<?php echo $row['Time']; ?>" type="hidden" name="<?php echo $row['Time']; ?>" value="<?php echo $row['Time']; ?>">
								<!-- <input type="hidden" name="<?php echo $row['DayType']; ?>" value="<?php echo $row['DayType']; ?>"> -->
								<div class="day-hover day-container_<?php echo $row['Time']; ?> col-sm-12 col-md-3 text-center rcontent mr-4 <?php 
										// foreach ($this->Model_Selects->GetMatchingDatesType($erow['ApplicantID'], $row['Time'])->result_array() as $nrow):
										// 	if ($nrow['Type'] == 'Normal')
										// 	{ 
										// 		$Type = 'Normal';
										// 		echo 'day-indicator-success'; 
										// 	}
										// 	elseif ($nrow['Type'] == 'Rest Day') 
										// 	{ 
										// 		$Type = 'Rest Day';
										// 		echo 'day-indicator-primary'; 
										// 	}
										// 	elseif ($nrow['Type'] == 'Holiday')
										// 	{
										// 		$Type = 'Holiday';
										// 		echo 'day-indicator-warning';
										// 	}
										// 	elseif ($nrow['Type'] == 'Special')
										// 	{
										// 		$Type = 'Special';
										// 		echo 'day-indicator-danger';
										// 	}
										// endforeach;
										?>">
									<b><?php echo $row['Time']; ?></b>
									<div class="form-row mt-2">
										<!-- data-toggle="tooltip" data-placement="bottom" title="Regular Hours" -->
										<div class="form-group col-8">
											<div>Hours</div>
											<input id="Hours_<?php echo $row['Time']; ?>" class="form-control" type="number" name="Hours_<?php echo $row['Time']; ?>" value="<?php
													foreach ($this->Model_Selects->GetMatchingDates($erow['ApplicantID'], $row['Time'])->result_array() as $nrow):
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
											<input id="OTHours_<?php echo $row['Time']; ?>" class="form-control" type="number" name="OTHours_<?php echo $row['Time']; ?>" value="<?php
													foreach ($this->Model_Selects->GetMatchingDates($erow['ApplicantID'], $row['Time'])->result_array() as $nrow):
														if($nrow['Overtime'] != NULL) {
															echo $nrow['Overtime'];
														} else {
															echo '0';
														}
													endforeach;
											?>">
										</div>
										<!-- <div data-toggle="tooltip" data-placement="bottom" title="????? Hours" class="form-group col-4">
											<div class="">SH?</div>
											<input id="Hours_<?php echo $row['Time']; ?>" class="form-control" type="number" name="Hours_<?php echo $row['Time']; ?>" value="<?php
													foreach ($this->Model_Selects->GetMatchingDates($erow['ApplicantID'], $row['Time'])->result_array() as $nrow):
														echo $nrow['Hours'];
													endforeach;
											?>">
										</div>
										<div data-toggle="tooltip" data-placement="bottom" title="????? Hours" class="form-group col-4">
											<div class="">NH?</div>
											<input id="Hours_<?php echo $row['Time']; ?>" class="form-control" type="number" name="Hours_<?php echo $row['Time']; ?>" value="<?php
													foreach ($this->Model_Selects->GetMatchingDates($erow['ApplicantID'], $row['Time'])->result_array() as $nrow):
														echo $nrow['Hours'];
													endforeach;
											?>">
										</div>
										<div data-toggle="tooltip" data-placement="bottom" title="????? Hours" class="form-group col-4">
											<div class="">SPHRD?</div>
											<input id="Hours_<?php echo $row['Time']; ?>" class="form-control" type="number" name="Hours_<?php echo $row['Time']; ?>" value="<?php
													foreach ($this->Model_Selects->GetMatchingDates($erow['ApplicantID'], $row['Time'])->result_array() as $nrow):
														echo $nrow['Hours'];
													endforeach;
											?>">
										</div> -->
									</div>
									<div class="form-row">
										<div class="form-group col-4">
											<input id="REGCheck_<?php echo $row['Time']; ?>" type="checkbox" data-toggle="toggle" data-on="Regular" data-off="Regular" data-onstyle="success" data-offstyle="secondary" data-width="85" <?php if (isset($Regular)) { echo 'checked'; } ?>>
											<!-- <select class="form-control" name="Type_<?php echo $row['Time']; ?>">
												<option value="Normal" <?php if ($Type == 'Normal') { echo 'selected=""'; } ?>>
													Normal
												</option>
												<option value="Rest Day" <?php if ($Type == 'Rest Day') { echo 'selected=""'; } ?>>
													Rest Day
												</option>
												<option value="Holiday" <?php if ($Type == 'Holiday') { echo 'selected=""'; } ?>>
													Holiday
												</option>
												<option value="Special" <?php if ($Type == 'Special') { echo 'selected=""'; } ?>>
													Special (non-working)
												</option>
											</select> -->
										</div>
										<div class="form-group col-4">
											<input id="NCheck_<?php echo $row['Time']; ?>" type="checkbox" data-toggle="toggle" data-on="Night" data-off="Night" data-onstyle="primary" data-offstyle="secondary" data-width="85" <?php if (isset($RestDay)) { echo 'checked'; } ?>>
										</div>
										<div class="form-group col-4">
											<input id="HCheck_<?php echo $row['Time']; ?>" type="checkbox" data-toggle="toggle" data-on="Holiday" data-off="Holiday" data-onstyle="danger" data-offstyle="secondary" data-width="85" <?php if (isset($Holiday)) { echo 'checked'; } ?>>
										</div>
									</div>
									<!-- <p class="mr-auto ml-auto">Hours</p> -->
									<div class="form-row">
										<div class="form-group col-6 input-icon">
											<input id="PerDay" class="form-control" type="text" name="" readonly>
											<i>₱/d</i>
										</div>
										<div class="form-group col-6 input-icon">
											<input id="PerHour" class="form-control" type="text" name="" readonly>
											<i>₱/h</i>
										</div>
									</div>
								</div>
							<?php endforeach; ?>
								<!-- <table id="SalaryTable" class="table table-condensed">
									<th>Monday</th>
									<th>Tuesday</th>
									<th>Wednesday</th>
									<th>Thursday</th>
									<th>Friday</th>
									<th>Saturday</th>
									<th>Monday</th>
									<th>Tuesday</th>
									<th>Wednesday</th>
									<th>Thursday</th>
									<th>Friday</th>
									<th>Saturday</th>
									<tr>
										<td>
											<div class="input-icon">
												<input id="HoursDayOne" class="form-control" type="number" name="HoursDayOne" value="8">
												<i>₱</i>
											</div>
										</td>
										<td><input id="HoursDayTwo" class="form-control" type="number" name="HoursDayTwo" value="8"></td>
										<td><input id="HoursDayThree" class="form-control" type="number" name="HoursDayThree" value="8"></td>
										<td><input id="HoursDayFour" class="form-control" type="number" name="HoursDayFour" value="8"></td>
										<td><input id="HoursDayFive" class="form-control" type="number" name="HoursDayFive" value="8"></td>
										<td><input id="HoursDaySix" class="form-control" type="number" name="HoursDaySix" value="8"></td>
										<td><input id="HoursDayTwo" class="form-control" type="number" name="HoursDayTwo" value="8"></td>
										<td><input id="HoursDayThree" class="form-control" type="number" name="HoursDayThree" value="8"></td>
										<td><input id="HoursDayFour" class="form-control" type="number" name="HoursDayFour" value="8"></td>
										<td><input id="HoursDayFive" class="form-control" type="number" name="HoursDayFive" value="8"></td>
										<td><input id="HoursDaySix" class="form-control" type="number" name="HoursDaySix" value="8"></td>
										<td><input id="HoursDaySix" class="form-control" type="number" name="HoursDaySix" value="8"></td>
									</tr>
									<tr>
										<td>Hours</td>
										<td>Hours</td>
										<td>Hours</td>
										<td>Hours</td>
										<td>Hours</td>
										<td>Hours</td>
									</tr>
									<tr>
										<td>
											<div class="input-icon">
												<input id="SalaryDayOne" class="form-control" type="text" name="" readonly>
												<i>₱</i>
											</div>
										</td>
										<td>
											<div class="input-icon">
												<input id="SalaryDayTwo" class="form-control" type="text" name="" readonly>
												<i>₱</i>
											</div>
										</td>
										<td>
											<div class="input-icon">
												<input id="SalaryDayThree" class="form-control" type="text" name="" readonly>
												<i>₱</i>
											</div>
										</td>
										<td>
											<div class="input-icon">
												<input id="SalaryDayFour" class="form-control" type="text" name="" readonly>
												<i>₱</i>
											</div>
										</td>
										<td><input id="SalaryDayFive" class="form-control" type="text" name="" readonly></td>
										<td><input id="SalaryDaySix" class="form-control" type="text" name="" readonly></td>
									</tr>
									<tr>
										<td colspan="2">Estimated Per Hour</td>
									</tr>
									<tr>
										<td colspan="2"><input id="SalaryPerHour" class="form-control" type="text" name="" readonly></td>	
									</tr>
								</table> -->
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
					<button type="submit" class="btn btn-primary"><i class="fas fa-clock"></i> Set</button>
				</div>
				</form>
			</div>
		</div>
	</div>
<?php endforeach; ?>