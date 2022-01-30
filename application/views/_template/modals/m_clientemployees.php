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
					<div class="pl-2 pr-2">
						<?php if (isset($_GET['id'])): ?>
							<div class="row">
								<div class="table-responsive pb-5 pl-2 pr-2">
									<table id="ClientEmployedTable" class="table" style="width: 100%;">
										<thead>
											<tr class="text-center">
												<th> Employee ID </th>
												<th> Full Name / Position </th>
												<th class="d-none"> Full Name </th>
												<th class="d-none"> Position </th>
												<th> Contact Number </th>
												<th> Hired On </th>
												<th class="d-none"> Contract Started </th>
												<th class="d-none"> Contract Ends </th>
												<th> Contract Lifespan </th>
											</tr>
										</thead>
										<tbody>
											<?php 
											$GetClientsEmployed = $this->Model_Selects->GetClientsEmployed($_GET['id']);
											foreach ($GetClientsEmployed->result_array() as $row): 
												// Name Handler
												$fullName = '';
												$fullNameHover = '';
												$isFullNameHoverable = false;
												if ($row['LastName']) {
													$fullName = $fullName . $row['LastName'] . ', ';
													$fullNameHover = $fullNameHover . $row['LastName'] . ', ';
												} else {
													$fullNameHover = $fullNameHover . '[<i>No Last Name</i>], ';
													$isFullNameHoverable = true;
												}
												if ($row['FirstName']) {
													$fullName = $fullName . $row['FirstName'] . ' ';
													$fullNameHover = $fullNameHover . $row['FirstName'] . ' ';
												} else {
													$fullNameHover = $fullNameHover . '[<i>No First Name</i>] ';
													$isFullNameHoverable = true;
												}
												if ($row['MiddleName']) {
													$fullName = $fullName . $row['MiddleName'][0] . '.';
													$fullNameHover = $fullNameHover . $row['MiddleName'][0] . '.';
												} else {
													$fullNameHover = $fullNameHover . '[<i>No MI</i>].';
													$isFullNameHoverable = true;
												}
												if ($row['NameExtension']) {
													$fullName = $fullName . ', ' . $row['NameExtension'];
													$fullNameHover = $fullNameHover . ', ' . $row['NameExtension'];
												}
												if (strlen($fullName) > 45) {
													$fullName = substr($fullName, 0, 45);
													$fullName = $fullName . '...';
													$isFullNameHoverable = true;
												} ?>
												<tr>
													<td class="text-center">
														<div class="col-sm-12">
															<?php
															// Thumbnail
															$thumbnail = $row['ApplicantImage'];
															$thumbnail = substr($thumbnail, 0, -4);
															$thumbnail = $thumbnail . '_thumb.jpg';
															// TODO: getimagesize() severely lags the server on large amount of fetches.
															// if(!getimagesize($thumbnail)) {
															// 	$thumbnail = $row['ApplicantImage'];
															// }
															?>
															<a href="ViewEmployee?id=<?php echo $row['ApplicantID']; ?>"><img src="<?php echo $thumbnail; ?>" width="70" height="70" class="rounded-circle"></a>
														</div>
														<div class="col-sm-12 align-middle">
															<?php if($row['EmployeeID'] != NULL): ?>
																<a href="ViewEmployee?id=<?php echo $row['ApplicantID']; ?>"><?php echo $row['EmployeeID']; ?></a>
															<?php else: ?>
																<?php echo 'No Employee ID'; ?>
															<?php endif; ?>
														</div>
													</td>
													<td class="text-center align-middle">
														<a href="ViewEmployee?id=<?php echo $row['ApplicantID']; ?>"<?php if($isFullNameHoverable): ?> data-toggle="tooltip" data-placement="top" data-html="true" title="<?php echo $fullNameHover; ?>"<?php endif; ?>><?php echo $fullName; ?></a>
														<br>
														<i style="color: gray;"><?php echo $row['PositionDesired']; ?></i>
														<br>
													</td>
													<td class="text-center align-middle d-none">
														<?php echo $fullName; ?>
													</td>
													<td class="text-center align-middle d-none">
														<?php echo $row['PositionDesired']; ?>
													</td>
													<td class="text-center align-middle">
														<?php echo $row['Phone_No']; ?>
													</td>
													<td class="text-center align-middle">
														<div class="d-none"> 
															<?php echo $row['DateStarted']; // For sorting ?>
														</div>
														<?php
															$dateStarts = new DateTime($row['DateStarted']);
															$dayStarts = $dateStarts->format('Y-m-d');
															$dayStarts = DateTime::createFromFormat('Y-m-d', $dayStarts)->format('F d, Y');

															echo $dayStarts;
														?>
													</td>
													<?php
														$currTime = time();
														$strDateStarted = 1;
														$strDateEnds = 1;
														if ($row['DateEnds']) {
															$strDateEnds = strtotime($row['DateEnds']);
														}
														if ($row['DateStarted']) {
															$strDateStarted = strtotime($row['DateStarted']);
														}
														// PERCENTAGE
														if ($row['DateStarted'] && $row['DateEnds']):
															$rPercentage = (($strDateEnds - $currTime) * 100) / ($strDateEnds - $strDateStarted);
															$rPercentage = round($rPercentage);
														endif;
														// DAYS REMAINING
														$dateTimeZone = new DateTimeZone("Asia/Manila");
														$datetime1 = new DateTime('@' . $currTime, $dateTimeZone);
														$datetime2 = new DateTime('@' . $strDateEnds, $dateTimeZone);
														$interval = $datetime1->diff($datetime2);
														$TimeString = "";
														if($interval->format('%y years, %m months, %d days') == '0 years, 0 months, 0 days') {
															if($interval->format('%H') == '1') {
																$TimeString = $interval->format('%H hour');
																if($interval->format('%I') != NULL || $interval->format('%S') != NULL) {
																	$TimeString = $TimeString . ', ';
																}
															} else {
																$TimeString = $interval->format('%H hours');
																if($interval->format('%I') != NULL || $interval->format('%S') != NULL) {
																	$TimeString = $TimeString . ', ';
																}
															}
															if($interval->format('%I') == '1') {
																$TimeString = $TimeString . $interval->format('%I minute');
																if($interval->format('%S') != NULL) {
																	$TimeString = $TimeString . ', ';
																}
															} else {
																$TimeString = $TimeString . $interval->format('%I minutes');
																if($interval->format('%S') != NULL) {
																	$TimeString = $TimeString . ', ';
																}
															}
															if($interval->format('%S') == '1') {
																$TimeString = $TimeString . $interval->format('%S second');
															} else {
																$TimeString = $TimeString . $interval->format('%S seconds');
															}
														} else {
															if($interval->format('%y') == '1') {
																$TimeString = $interval->format('%y year');
																if($interval->format('%m') != NULL || $interval->format('%d') != NULL) {
																	$TimeString = $TimeString . ', ';
																}
															} else {
																$TimeString = $interval->format('%y years');
																if($interval->format('%m') != NULL || $interval->format('%d') != NULL) {
																	$TimeString = $TimeString . ', ';
																}
															}
															if($interval->format('%m') == '1') {
																$TimeString = $TimeString . $interval->format('%m month');
																if($interval->format('%d') != NULL) {
																	$TimeString = $TimeString . ', ';
																}
															} else {
																$TimeString = $TimeString . $interval->format('%m months');
																if($interval->format('%d') != NULL) {
																	$TimeString = $TimeString . ', ';
																}
															}
															if($interval->format('%d') == '1') {
																$TimeString = $TimeString . $interval->format('%d day');
															} else {
																$TimeString = $TimeString . $interval->format('%d days');
															}
														}
													?>
													<td class="text-center align-middle d-none">
														<?php
															$dateStarts = new DateTime($row['DateStarted']);
															$dayStarts = $dateStarts->format('Y-m-d');
															$dayStarts = DateTime::createFromFormat('Y-m-d', $dayStarts)->format('F d, Y');
															$hoursStarts = $dateStarts->format('h:i:s A');

															$dateEnds = new DateTime($row['DateEnds']);
															$dayEnds = $dateEnds->format('Y-m-d');
															$dayEnds = DateTime::createFromFormat('Y-m-d', $dayEnds)->format('F d, Y');
															$hoursEnds = $dateEnds->format('h:i:s A');

															echo $dayStarts . ' at ' . $hoursStarts;
														?>
													</td>
													<td class="text-center align-middle d-none">
														<?php
															$dateStarts = new DateTime($row['DateStarted']);
															$dayStarts = $dateStarts->format('Y-m-d');
															$dayStarts = DateTime::createFromFormat('Y-m-d', $dayStarts)->format('F d, Y');
															$hoursStarts = $dateStarts->format('h:i:s A');

															$dateEnds = new DateTime($row['DateEnds']);
															$dayEnds = $dateEnds->format('Y-m-d');
															$dayEnds = DateTime::createFromFormat('Y-m-d', $dayEnds)->format('F d, Y');
															$hoursEnds = $dateEnds->format('h:i:s A');

															echo $dayEnds . ' at ' . $hoursEnds;
														?>
													</td>
													<?php if ($row['Status'] == 'Employed'): ?>
													<td class="text-center align-middle" data-toggle="tooltip" data-placement="top" data-html="true" title="<b>Contract Started</b><br><?php echo $dayStarts . '<br>' . $hoursStarts; ?><br><br><b>Contract Ends</b><br><?php echo $dayEnds . '<br>' . $hoursEnds; ?><br><br><b>Salary</b><br>₱<?php echo $row['SalaryExpected']; ?><br><br><i>Click the bar to open the Contract tab</i>">
														<div class="d-none"> 
															<?php echo $row['DateEnds']; // For sorting ?>
														</div>
														<div class="wercher-progress-daysremaining"><?php
														if ($TimeString != NULL) {
															echo $TimeString;
														} else {
															echo 'Less than 1 day';
														} ?>
													 	</div>
														<a href="<?=base_url()?>ViewEmployee?id=<?php echo $row['ApplicantID']; ?>#Contract" class="employee-table-progress-bar" style="position: relative; box-shadow: none; background-color: rgba(0, 0, 0, 0.11);">
															<?php if ($row['DateStarted'] && $row['DateEnds']): ?>
															<div class="progress-bar wercher-progress-bar" role="progressbar" style="width: <?php echo $rPercentage; ?>%;" aria-valuenow="<?php echo $rPercentage; ?>" aria-valuemin="0" aria-valuemax="100"><?php echo $rPercentage; ?>%</div>
															<?php endif; ?>
														</a>
													</td>
													<?php elseif ($row['Status'] == 'Employed (Permanent)'): ?>
													<td class="text-center align-middle">
														Regular
													</td>
													<?php endif; ?>
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