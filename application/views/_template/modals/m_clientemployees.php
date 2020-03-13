<div class="modal fade" id="ClientsEmployedModal">
			<div class="modal-dialog modal-xl">
				<div class="modal-content">

				<!-- Modal Header -->
				<div class="modal-header">
					<h4 class="modal-title">Employees of <?php
					$ClientID = $_GET['id'];
					$GetClient = $this->Model_Selects->GetClientID($ClientID);
					foreach($GetClient->result_array() as $row):
						echo $row['Name'];
					endforeach;
					?> (<?php echo $this->Model_Selects->GetClientsEmployed($ClientID)->num_rows(); ?>)</h4>
					<div class="text-right">
						<button id="ClientExportPrint" type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Print"><i class="fas fa-print" style="margin-right: -1px;"></i></button>
						<button id="ClientExportCopy" type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Copy to Clipboard"><i class="fas fa-clipboard-list" style="margin-right: -1px;"></i></button>
						<button id="ClientExportExcel" type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Export as an Excel file (.xlsx)"><i class="fas fa-file-excel" style="margin-right: -1px;"></i></button>
						<button id="ClientExportCSV" type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Export as a CSV file (.csv)"><i class="fas fa-file-csv" style="margin-right: -1px;"></i></button>
						<button id="ClientExportPDF" type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Export as a PDF file (.pdf)"><i class="fas fa-file-pdf" style="margin-right: -1px;"></i></button>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
				</div>

				<!-- Modal body -->
				<div class="modal-body">
					<div class="row">
						<div class="col-sm-12">
							<div class="pt-5 pb-5 pl-2 pr-2">
								<?php if (isset($_GET['id'])): ?>
									<div class="row">
										<div class="table-responsive pb-5 pl-2 pr-2">
											<table id="ClientEmployedTable" class="table" style="width: 100%;">
												<thead>
													<tr class="text-center">
														<th> Employee </th>
														<th> Full Name </th>
														<th> Position </th>
														<th> Salary </th>
														<th> Contract Lifespan </th>
														<th> Action </th>
													</tr>
												</thead>
												<tbody>
													<?php 
													$GetClientsEmployed = $this->Model_Selects->GetClientsEmployed($_GET['id']);
													foreach ($GetClientsEmployed->result_array() as $row): ?>
														<tr>
															<td class="text-center">
																<div class="col-sm-12">
																	<img src="<?php echo $row['ApplicantImage']; ?>" width="70" height="70" class="rounded-circle">
																</div>
																<div class="col-sm-12 align-middle">
																	<?php if($row['EmployeeID'] != NULL): ?>
																		<?php echo $row['EmployeeID']; ?>
																	<?php else: ?>
																		<?php echo 'No Employee ID'; ?>
																	<?php endif; ?>
																</div>
															</td>
															<td class="text-center align-middle">
																<?php echo $row['LastName']; ?> , <?php echo $row['FirstName']; ?> <?php echo $row['MiddleInitial']; ?>.
															</td>
															<td class="text-center align-middle">
																<?php echo $row['PositionDesired']; ?>
															</td>
															<td class="text-center align-middle">
																<?php echo $row['SalaryExpected']; ?>
															</td>
															<?php
																$currTime = time();
																$strDateEnds = strtotime($row['DateEnds']);
																$strDateStarted = strtotime($row['DateStarted']);
																// PERCENTAGE
																$rPercentage = (($strDateEnds - $currTime) * 100) / ($strDateEnds - $strDateStarted);
																$rPercentage = round($rPercentage);
																// DAYS REMAINING
																$dateTimeZone = new DateTimeZone("Asia/Manila");
																$datetime1 = new DateTime('@' . $currTime, $dateTimeZone);
																$datetime2 = new DateTime('@' . $strDateEnds, $dateTimeZone);
																$interval = $datetime1->diff($datetime2);
																$DaysRemaining = "";
																if($interval->format('%y years') != '0 years') {
																	$DaysRemaining = $DaysRemaining . $interval->format('%y years');
																	if($interval->format('%m months') != '0 months') {
																		$DaysRemaining = $DaysRemaining . ', ';
																	}
																}
																if($interval->format('%m months') != '0 months') {
																	$DaysRemaining = $DaysRemaining . $interval->format('%m months');
																	if($interval->format('%d days') != '0 days') {
																		$DaysRemaining = $DaysRemaining . ', ';
																	}
																}
																if($interval->format('%d days') != '0 days') {
																	$DaysRemaining = $DaysRemaining . $interval->format('%d days');
																}
															?>
															<td class="text-center align-middle">
																<div class="wercher-progress-daysremaining"><?php
																if ($DaysRemaining != NULL) {
																	echo $DaysRemaining;
																} else {
																	echo 'Less than 1 day';
																} ?>
															 	</div>
																<a href="<?=base_url()?>ViewEmployee?id=<?php echo $row['ApplicantID']; ?>#Contract" class="progress" style="position: relative; box-shadow: none; background-color: rgba(0, 0, 0, 0.11);" data-toggle="tooltip" data-placement="top" data-html="true" title="Contract Started<br><?php echo $row['DateStarted']; ?><br><br>Contract Ends<br><?php echo $row['DateEnds']; ?><br><br>Salary Expected<br>₱<?php echo $row['SalaryExpected']; ?><br><br><i>Click to open the Contract tab</i>">
																	<div class="progress-bar wercher-progress-bar" role="progressbar" style="width: <?php echo $rPercentage; ?>%;" aria-valuenow="<?php echo $rPercentage; ?>" aria-valuemin="0" aria-valuemax="100"><?php echo $rPercentage; ?>%</div>
																</a>
															</td>
															<td class="text-center align-middle PrintExclude" width="100">
																<a class="btn btn-primary btn-sm w-100 mb-1" href="<?=base_url()?>ViewEmployee?id=<?php echo $row['ApplicantID']; ?>" target="_blank"><i class="fas fa-external-link-alt"></i> View</a>
															</td>
														</tr>
													<?php endforeach ?>
												</tbody>
											</table>
										</div>
									</div>
									<?php endif; ?>
							</div>
						</div>
					</div>
				</div>

				<!-- Modal footer -->
				<div class="modal-footer">
					<button type="button" class="btn btn-danger ml-auto" data-dismiss="modal">Close</button>
				</div>

				</div>
			</div>
		</div>