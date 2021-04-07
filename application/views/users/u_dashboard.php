<?php 

$T_Header;

require 'vendor/autoload.php';
use Carbon\Carbon;

$logbookIteration = 0;
$GetLogbookNotes = $this->Model_Selects->GetLogbookNotes();

?>
<body>
	<div class="wrapper">
		<?php $this->load->view('_template/users/u_sidebar'); ?>
		<div id="content" class="ncontent" style="overflow: hidden;">
			<div class="container-fluid">
				<?php $this->load->view('_template/users/u_notifications'); ?>
				<style type="text/css">
					.bcolor3BB515 {
						background-color: rgba(235, 200, 0, 1);
					}
					.bcolorD9B319 {
						background-color: #e7af3e;
					}
					.bcolor199EC4 {
						background-color: #b95c1a;
					}
					.bcolorE75858 {
						background-color: #42100d;
					}
					.hei-100
					{
						min-height: 100% !important;
					}
					.card-container a {
						text-decoration: none;
					}
					.card-headers {
						border-radius: 3px 3px 0px 0px;
						padding-top: 20px;
						padding-bottom: 20px;
						padding-right: 20px;
						padding-left: 20px;
						color: #FFFFFF;
					}
					.card-bodys {
						border-radius: 0px 0px 3px 3px;
						padding-top: 20px;
						padding-bottom: 20px;
						padding-right: 20px;
						padding-left: 20px;
						background-color: #EBEBEB;
						border-right: 1px solid #D0D0D0;
						border-bottom: 1px solid #D0D0D0;
						border-left: 1px solid #D0D0D0;
						font-family: 'Open Sans', sans-serif;
					}
					.titless
					{
						color: #434343;
					}
					.head-text
					{
						font-size: 1em;
					}
					.head-ico-text
					{
						font-size: 2em;
					}
					.card-icon {
						font-size: 45px;
						color: rgba(255, 255, 255, 0.33);
					}
					.latesthires-container {
						border-radius: 6px;
						background-color: rgba(0, 0, 0, 0.08);
					}
				</style>
				<div class="row col-sm-12 p-4">
					<div class="col-md-12 col-lg-3 mb-4">
						<div class="card-container">
							<a href="Applicants">
								<div class="card-headers bcolor3BB515">
									<div class="row ml-2">
										<span class="head-text">
											Applicants
										</span>
									</div>
									<div class="row ml-2">
										<span class="head-ico-text">
											<b>
												<?php if ($result_capp->num_rows() > 0) {
												echo $result_capp->num_rows(); } ?>
											</b>
										</span>
										<i class="fas fa-user-friends fa-fw card-icon ml-auto mr-2"></i>
									</div>
								</div>
								<?php if($WeeklyApplicants>0): ?>
								<div class="wercher-card-weekly-tracker-container">
									<div class="wercher-card-weekly-tracker">
										<i class="fas fa-caret-up"></i><?php echo $WeeklyApplicants; ?> this week
									</div>
								</div>
								<?php endif; ?>
							</a>
						</div>
					</div>
					<div class="col-md-12 col-lg-3 mb-4">
						<div class="card-container">
							<a href="Employee">
								<div class="card-headers bcolorD9B319">
									<div class="row ml-2">
										<span class="head-text">
											Employees
										</span>
									</div>
									<div class="row ml-2">
										<span class="head-ico-text">
											<b>
												<?php if ($result_cemployee->num_rows() > 0) {
												echo $result_cemployee->num_rows(); } ?>
											</b>
										</span>
										<i class="fas fa-user-tie fa-fw card-icon ml-auto mr-2"></i>
									</div>
								</div>
								<?php if($WeeklyEmployees>0): ?>
								<div class="wercher-card-weekly-tracker-container">
									<div class="wercher-card-weekly-tracker">
										<i class="fas fa-caret-up"></i><?php echo $WeeklyEmployees; ?> this week
									</div>
								</div>
								<?php endif; ?>
							</a>
						</div>
					</div>
					<div class="col-md-12 col-lg-3 mb-4">
						<div class="card-container">
							<a href="Clients">
								<div class="card-headers bcolor199EC4">
									<div class="row ml-2">
										<span class="head-text">
											Clients
										</span>
									</div>
									<div class="row ml-2">
										<span class="head-ico-text">
											<b>
												<?php if ($result_cclients->num_rows() > 0) {
												echo $result_cclients->num_rows(); } ?>
											</b>
										</span>
										<i class="fas fa-user-tag fa-fw card-icon ml-auto mr-2"></i>
									</div>
								</div>
								<!-- <div class="wercher-card-weekly-tracker-container">
									<div class="wercher-card-weekly-tracker">
										<i class="fas fa-caret-up"></i>0 this week (placeholder)
									</div>
								</div> -->
							</a>
						</div>
					</div>
					<div class="col-md-12 col-lg-3 mb-4">
						<div class="card-container">
							<a href="Admins">
								<div class="card-headers bcolorE75858">
									<div class="row ml-2">
										<span class="head-text">
											Admins
										</span>
									</div>
									<div class="row ml-2">
										<span class="head-ico-text">
											<b>
												<?php if ($result_cadmin->num_rows() > 0) {
												echo $result_cadmin->num_rows(); } ?>
											</b>
										</span>
										<i class="fas fa-user-secret fa-fw card-icon ml-auto mr-2"></i>
									</div>
								</div>
								<!-- <div class="wercher-card-weekly-tracker-container">
									<div class="wercher-card-weekly-tracker">
										<i class="fas fa-caret-up"></i>0 this week (placeholder)
									</div>
								</div> -->
							</a>
						</div>
					</div>
					<div id="GraphChartButton" class="col-sm-12 col-lg-8 mb-5 chart-hover">
						<div class="chart-title text-center">
							<h5 class="titless">
								<i class="fas fa-chart-line fa-fw chart-hover-static"></i> <?php echo $CurrentYear; ?> Applicants
							</h5>
						</div>
						<!-- <div class="col-1 ml-auto chart-hover-settings" style="margin-top: -30px; display: none;">
							<button type="button" class="btn btn-primary btn-sm"><i class="fas fa-cog" style="margin-right: -1px;"></i></button>
						</div> -->
						<canvas id="ApplicantChart" class="w-100" width="800" height="350"></canvas>
					</div>
					<div class="col-sm-12 col-lg-4">
						<div class="chart-title text-center">
							<h5 class="titless">
								<i class="fas fa-users fa-fw chart-hover-static"></i> Latest Applicants
							</h5>
						</div>
						<div class="latesthires-container">
							<?php
							$GetLatestApplicants = $this->Model_Selects->GetLatestApplicants(5);
							if($GetLatestApplicants->num_rows() > 0):
								foreach($GetLatestApplicants->result_array() as $row):
									$thumbnail = $row['ApplicantImage'];
									$thumbnail = substr($thumbnail, 0, -4);
									$thumbnail = $thumbnail . '_thumb.jpg';
									$employeeName = '<div class="col-sm-12"><a href="ViewEmployee?id=' . $row['ApplicantID'] . '">' . '<img src="' . $thumbnail .'" height="18px; width: 18px;" class="rounded-circle"> ' . $row['LastName'] . ', ' . $row['FirstName'] . ' ' . $row['MiddleName'][0]  .'.';
									if ($row['NameExtension'] != NULL) {
										$employeeName = $employeeName . ', ' . $row['NameExtension'];
									}
									$GetClientID = $this->Model_Selects->GetClientID($row['ClientEmployed']);
									if ($GetClientID->num_rows() > 0) {
										foreach($GetClientID->result_array() as $crow) {
											$clientName = $crow['Name'];
										}
									} else {
										$clientName = 'N/A';
									}
									?>
									<div class="row">
										<div class="col-sm-12 ml-4 mt-2">
											<div class="row">
												<div class="col-sm-12">
													<?php echo $employeeName . '</a>' ?>
												</div>
												<div class="col-sm-12">
													<i style="color: gray;">
														<?php 
															$date = new DateTime($row['DateStarted']);
															$day = $date->format('Y-m-d');
															$day = DateTime::createFromFormat('Y-m-d', $day)->format('F d, Y');

															echo '<a href="#" id="' . $row['ApplicantID'] . '" class="ModalHire"  data-toggle="modal" data-target="#hirthis"><i class="fas fa-user-edit"></i> Click to hire</a> - Applied on ' . $day . '</div>';
														?>
													</i>
												</div>
											</div>
										</div>
									</div>
									<hr>
								<?php endforeach;
							else:
								echo 'No data';
							endif; ?>
						</div>
					</div>
					<!-- <div id="PieChartButton" class="col-sm-12 col-lg-6 mt-5 mb-5">
						<div class="chart-title text-center">
							<h5 class="titless">
								<i class="fas fa-chart-pie fa-fw"></i> Applicants Pool
							</h5>
						</div>
						<div class="col-1 ml-auto chart-hover-settings" style="margin-top: -30px; display: none;">
							<button type="button" class="btn btn-primary btn-sm"><i class="fas fa-cog" style="margin-right: -1px;"></i></button>
						</div>
						<canvas id="pie-chart" width="800" height="800"></canvas>
					</div> -->
					<div id="BarChartButton" class="col-sm-12 col-lg-4 mb-5">
						<div class="chart-title text-center">
							<h5 class="titless">
								<i class="fas fa-chart-line fa-fw"></i> Total Employed
							</h5>
						</div>
						<!-- <div class="col-1 ml-auto chart-hover-settings" style="margin-top: -30px; display: none;">
							<button type="button" class="btn btn-primary btn-sm"><i class="fas fa-cog" style="margin-right: -1px;"></i></button>
						</div> -->
						<canvas id="bar-chart-horizontal" width="800" height="300"></canvas>
					</div>
					<div class="col-sm-12 col-lg-4">
						<div class="chart-title text-center">
							<h5 class="titless">
								<i class="fas fa-users fa-fw chart-hover-static"></i> Expiring Soon
							</h5>
						</div>
						<div class="latesthires-container">
							<?php
							$GetExpiringSoon = $this->Model_Selects->GetExpiringSoon(5);
							if($GetExpiringSoon->num_rows() > 0):
								foreach($GetExpiringSoon->result_array() as $row):
									$currTime = time();
									$strDateEnds = strtotime($row['DateEnds']);
									$strDateStarted = strtotime($row['DateStarted']);
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
									$thumbnail = $row['ApplicantImage'];
									$thumbnail = substr($thumbnail, 0, -4);
									$thumbnail = $thumbnail . '_thumb.jpg';
									$employeeName = '<a href="ViewEmployee?id=' . $row['ApplicantID'] . '">' . '<img src="' . $thumbnail .'" height="18px; width: 18px;" class="rounded-circle"> ' . $row['LastName'] . ', ' . $row['FirstName'] . ' ' . $row['MiddleName'][0]  .'.';
									if ($row['NameExtension'] != NULL) {
										$employeeName = $employeeName . ', ' . $row['NameExtension'];
									}
									$GetClientID = $this->Model_Selects->GetClientID($row['ClientEmployed']);
									if ($GetClientID->num_rows() > 0) {
										foreach($GetClientID->result_array() as $crow) {
											$clientName = $crow['Name'];
										}
									} else {
										$clientName = 'N/A';
									}
									?>
									<div class="row">
										<div class="col-sm-12 ml-4 mt-2">
											<div class="row">
												<div class="col-sm-12">
													<?php echo $employeeName . '</a>' ?>
												</div>
												<div class="col-sm-12">
													<i style="color: gray;">
														<?php 
															if ($TimeString != NULL) {
																echo 'Expiring in ' . $TimeString;
															} else {
																echo 'Expiring in less than 1 day';
															}
														?>
													</i>
												</div>
											</div>
										</div>
									</div>
									<hr>
								<?php endforeach;
							else:
								echo 'No data';
							endif; ?>
						</div>
					</div>
					<div class="col-sm-12 col-lg-4">
						<div class="chart-title text-center">
							<h5 class="titless">
								<i class="fas fa-users fa-fw chart-hover-static"></i> Latest Hires
							</h5>
						</div>
						<div class="latesthires-container">
							<?php
							$GetLatestEmployees = $this->Model_Selects->GetLatestEmployees(5);
							if($GetLatestEmployees->num_rows() > 0):
								foreach($GetLatestEmployees->result_array() as $row):
									$thumbnail = $row['ApplicantImage'];
									$thumbnail = substr($thumbnail, 0, -4);
									$thumbnail = $thumbnail . '_thumb.jpg';
									$employeeName = '<a href="ViewEmployee?id=' . $row['ApplicantID'] . '">' . '<img src="' . $thumbnail .'" height="18px; width: 18px;" class="rounded-circle"> ' . $row['LastName'] . ', ' . $row['FirstName'] . ' ' . $row['MiddleName'][0]  .'.';
									if ($row['NameExtension'] != NULL) {
										$employeeName = $employeeName . ', ' . $row['NameExtension'];
									}
									$GetClientID = $this->Model_Selects->GetClientID($row['ClientEmployed']);
									if ($GetClientID->num_rows() > 0) {
										foreach($GetClientID->result_array() as $crow) {
											$clientName = $crow['Name'];
										}
									} else {
										$clientName = 'N/A';
									}
									?>
									<div class="row">
										<div class="col-sm-12 ml-4 mt-2">
											<div class="row">
												<div class="col-sm-12">
													<?php echo $employeeName . '</a>' ?>
												</div>
												<div class="col-sm-12">
													<i style="color: gray;">
														<?php 
															$date = new DateTime($row['DateStarted']);
															$day = $date->format('Y-m-d');
															$day = DateTime::createFromFormat('Y-m-d', $day)->format('F d, Y');

															echo 'Employed to ' . $clientName . ' on ' . $day;
														?>
													</i>
												</div>
											</div>
										</div>
									</div>
									<hr>
								<?php endforeach;
							else:
								echo 'No data';
							endif; ?>
						</div>
					</div>
					<!-- LOGBOOK -->
					<hr>
					<div class="col-sm-8">
						<div class="chart-title text-center">
							<h5 class="titless">
								<i class="fas fa-book fa-fw chart-hover-static"></i> Logbook - <a href="Logbook">View all</a>
							</h5>
						</div>
						<div class="pt-2 pb-5 pl-2 pr-2">
							<?php if ($GetLogbook->num_rows() > 0): ?>
								<?php foreach ($GetLogbook->result_array() as $row): 
										$logbookIteration++;
										$GetLogbookLogExtended = $this->Model_Selects->GetLogbookLogExtended($row['No']);
										$logbookType = $row['Type'];
										switch($logbookType) {
											case 'Blue':
												$logbookTypeClass = 'logbook-log-type-blue';
												break;
											case 'Red':
												$logbookTypeClass = 'logbook-log-type-red';
												break;
											case 'Green':
												$logbookTypeClass = 'logbook-log-type-green';
												break;
											case 'Yellow':
												$logbookTypeClass = 'logbook-log-type-yellow';
												break;
											default:
												$logbookTypeClass = 'logbook-log-type-unknown';
												break;
										}
									?>
									<div id="navigateTo_<?=$logbookIteration;?>" class="row logbook-log-container logbook-log logbook-log-toggle <?php if ($GetLogbookLogExtended->num_rows() > 0): echo 'logbook-log-hover '; endif; echo $logbookTypeClass; ?>">
										<div class="col-sm-1">
											<div class="text-center align-middle logbook-tooltip-icon">
												<?php
													$icon = $row['Icon'];
													if ($icon == 'Applicant'):
												?>
													<i class="fas fa-user-tie" style="margin-right: -1px;"></i>
												<?php elseif ($icon == 'Employee'): ?>
													<i class="fas fa-users" style="margin-right: -1px;"></i>
												<?php elseif ($icon == 'Admin'): ?>
													<i class="fas fa-user-secret" style="margin-right: -1px;"></i>
												<?php elseif ($icon == 'Client'): ?>
													<i class="fas fa-user-tag" style="margin-right: -1px;"></i>
												<?php elseif ($icon == 'Note'): ?>
													<i class="fas fa-sticky-note" style="margin-right: -1px;"></i>
												<?php elseif ($icon == 'Salary'): ?>
													<i class="fas fa-dollar-sign" style="margin-right: -1px;"></i>
												<?php else: ?>
													<i class="fas fa-cog" style="margin-right: -1px;"></i>
												<?php endif; ?>
											</div>
										</div>
										<div class="col-sm-1">
											<?php
												$GetLogbookAdminImage = $this->Model_Selects->GetLogbookAdminImage($row['AdminID']);
												if ($GetLogbookAdminImage->num_rows() > 0 || !empty($row['Image'])): 
													foreach ($GetLogbookAdminImage->result_array() as $nrow):
														$AdminImage = $nrow['Image'];
													endforeach;
													echo '
													<div class="logbook-admin-image text-center align-middle">
														<a href="?admin=' . $row['AdminID'] . '"><img src="' . $AdminImage . '" width="45px" height="45px" class="rounded-circle"></a>
													</div>
													';
												else:
													$AdminImage = base_url() . 'assets/img/wercher_logo.png';
													echo '
													<div class="logbook-admin-image text-center align-middle">
														<a href="?admin=' . $row['AdminID'] . '"><img src="' . $AdminImage . '" width="53px" height="46px" class="rounded-circle"></a>
													</div>
													';
												endif;

											?>
										</div>
										<div class="col-sm-10">
											<div class="row">
												<div class="col-sm-12" style="word-wrap: break-word;">
													<?php echo '<a href="?admin=' . $row['AdminID'] . '" class="logbook-tooltip-highlight">' . $row['AdminID'] . '</a> ' . $row['Event']; ?>
													<span class="logbook-log-number" style="float: right; display: none;" value="<?php echo $row['No']; ?>">
														<i class="fas fa-paperclip" style="font-size: 13px;"></i><?php echo $row['No']; ?>
													</span>
												</div>
												<div class="col-sm-12">
													<div class="logbook-tooltip-date">
														<?php 
															$date = new DateTime($row['Time']);
															$day = $date->format('Y-m-d');
															$day = DateTime::createFromFormat('Y-m-d', $day)->format('F d, Y');
															$hours = $date->format('h:i:s A');
															$elapsed = Carbon::parse($row['Time']);

															echo $elapsed->diffForHumans() . ' - ' . $day . ' at ' . $hours;
														?>
														<?php if ($GetLogbookLogExtended->num_rows() > 0): ?>
															<span class="logbook-log-toggle" style="float: right;">
																<i class="fas fa-angle-right" style="margin-right: -1px;"></i>
															</span>
														<?php endif; ?>
													</div>
												</div>
											</div>
										</div>
										<?php if ($GetLogbookLogExtended->num_rows() > 0):
											$iteration = 0;
											foreach ($GetLogbookLogExtended->result_array() as $nrow):
												$iteration++; ?>
												<div class="col-sm-12">
													<div class="logbook-tooltip-extended" style="display: none;">
														<?php if ($iteration == $GetLogbookLogExtended->num_rows()): ?>
															<img class="logbook-tooltip-extended-tree" src="assets/img/documents-folder-tree.png">
														<?php else: ?>
															<img class="logbook-tooltip-extended-tree" src="assets/img/documents-folder-tree-continuous.png">
														<?php endif; ?>
														<div class="logbook-tooltip-extended-text">
															<?php
															if($nrow['Type'] == 1):
																$date = new DateTime($nrow['Time']);
																$day = $date->format('Y-m-d');
																$day = DateTime::createFromFormat('Y-m-d', $day)->format('F d, Y');
																$hours = $date->format('h:i:s A');
																echo '<div class="col-sm-12"><span class="logbook-tooltip-extended-note"><b>Note:</b></span> ' . $nrow['EventTooltip'] . '</div><div class="col-sm-12 logbook-tooltip-extended-note-admin">- ' . $nrow['AdminID'] . ' <span class="logbook-tooltip-extended-note-date">' . $day . ' at ' . $hours . '</span></div>';
															else:
																echo $nrow['EventTooltip'];
															endif;
															?>
														</div>
													</div>
												</div>
											<?php endforeach;
										endif; ?>
									</div>
								<?php endforeach;
							else: ?>
								<div class="logbook-log-nodata">
									We've come up empty! No data is available to show.
									<br>
									<i class="fas fa-bell-slash" style="margin-right: -1px;"></i>
								</div>
							<?php endif; ?>
						</div>
					</div>
					<!-- Notes -->
					<div class="col-md-4">
						<div class="chart-title text-center">
							<h5 class="titless">
								<i class="fas fa-book fa-fw chart-hover-static"></i> Notes
							</h5>
						</div>
						<div id="NotesArea" class="col-sm-12">
							<?php foreach ($GetLogbookNotes->result_array() as $row): 
								$GetLogbookLogExtended = $this->Model_Selects->GetLogbookLogExtended($row['No']);
							?>
							<div class="row logbook-log-container logbook-log logbook-log-toggle <?php if ($GetLogbookLogExtended->num_rows() > 0): echo 'logbook-log-hover '; endif; ?>">
								<div class="col-sm-2">
									<?php
										$GetLogbookAdminImage = $this->Model_Selects->GetLogbookAdminImage($row['AdminID']);
										if ($GetLogbookAdminImage->num_rows() > 0 || !empty($row['Image'])): 
											foreach ($GetLogbookAdminImage->result_array() as $nrow):
												$AdminImage = $nrow['Image'];
											endforeach;
											echo '
											<div class="logbook-notes-admin-image ml-2">
												<a href="?user=' . $row['AdminID'] . '"><img src="' . $AdminImage . '" width="45px" height="45px" class="rounded-circle"></a>
											</div>
											';
										else:
											$AdminImage = base_url() . 'assets/img/wercher_logo.png';
											echo '
											<div class="logbook-notes-admin-image ml-2">
												<a href="?user=' . $row['AdminID'] . '"><img src="' . $AdminImage . '" width="53px" height="46px" class="rounded-circle"></a>
											</div>
											';
										endif;

									?>
								</div>
								<div class="col-sm-10">
									<div class="row">
										<div class="col-sm-12" style="word-wrap: break-word;">
											<?php echo '<a href="?user=' . $row['AdminID'] . '" class="logbook-tooltip-highlight">' . $row['AdminID'] . '</a>' . $row['Event']; ?>
											<span class="logbook-log-number" style="float: right; display: none;" value="<?php echo $row['No']; ?>">
												<i class="fas fa-paperclip" style="font-size: 13px;"></i><?php echo $row['No']; ?>
											</span>
										</div>
										<div class="col-sm-12">
											<div class="logbook-tooltip-date">
												<?php 
													$date = new DateTime($row['Time']);
													$day = $date->format('Y-m-d');
													$day = DateTime::createFromFormat('Y-m-d', $day)->format('F d, Y');
													$hours = $date->format('h:i:s A');

													echo $day . ' at ' . $hours;
												?>
												<?php if ($GetLogbookLogExtended->num_rows() > 0): ?>
													<span class="logbook-log-toggle" style="float: right;">
														<i class="fas fa-angle-right" style="margin-right: -1px;"></i>
													</span>
												<?php endif; ?>
											</div>
										</div>
									</div>
								</div>
								<?php if ($GetLogbookLogExtended->num_rows() > 0):
									$iteration = 0;
									foreach ($GetLogbookLogExtended->result_array() as $nrow):
										$iteration++; ?>
										<div class="col-sm-12">
											<div class="logbook-tooltip-extended" style="display: none;">
												<?php if ($iteration == $GetLogbookLogExtended->num_rows()): ?>
													<img class="logbook-tooltip-extended-tree" src="assets/img/documents-folder-tree.png">
												<?php else: ?>
													<img class="logbook-tooltip-extended-tree" src="assets/img/documents-folder-tree-continuous.png">
												<?php endif; ?>
												<div class="logbook-tooltip-extended-text">
													<?php
													if($nrow['Type'] == 1):
														echo '<span class="logbook-tooltip-extended-note">Note:</span> ' . $nrow['EventTooltip'];
													else:
														echo $nrow['EventTooltip'];
													endif;
													?>
												</div>
											</div>
										</div>
									<?php endforeach;
								endif; ?>
							</div>
						<?php endforeach ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- ADD NOTE MODAL -->
	<?php $this->load->view('_template/modals/m_addnote'); ?>
	<!-- EXPORT MODAL -->
	<?php $this->load->view('_template/modals/m_export'); ?>
	<!-- PIE CHART MODAL -->
	<?php $this->load->view('_template/modals/m_dashboard_pie'); ?>
	<!-- BAR CHART MODAL -->
	<?php $this->load->view('_template/modals/m_dashboard_bar'); ?>
	<!-- GRAPH CHART MODAL -->
	<?php $this->load->view('_template/modals/m_dashboard_graph'); ?>
	<!-- CLIENT HIRE MODAL -->
	<?php $this->load->view('_template/modals/m_clienthire'); ?>
</body>
<?php $this->load->view('_template/users/u_scripts'); ?>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.css">
<script src="<?php base_url(); ?>assets/js/Chart.bundle.js"></script>
<script src="<?php base_url(); ?>assets/js/Chart.bundle.min.js"></script>
<?php
	// BAR CHART COUNTER
	$BarClientsLabel = '';
	$BarClientsData = '';
	foreach ($result_cclients->result_array() as $row):
		$BarClientsLabel = $BarClientsLabel . $row['Name'] . '", "';
		$BarClientsData = $BarClientsData . $this->Model_Selects->GetClientsEmployed($row['ClientID'])->num_rows() . '", "';
	endforeach;
	$BarClientsLabel = substr($BarClientsLabel, 0, -4);
	$BarClientsData = str_replace('"', "", $BarClientsData);
	// GRAPH CHART COUNTER FOR CURRENT YEAR
	if (isset($_GET['Year'])) {
		$GraphMonthData = '';
		// echo date('Y');
		foreach ($result_monthly->result_array() as $row):
			$GraphMonthData = $GraphMonthData . $row['Total'] . '", "';
		endforeach;
		$GraphMonthData = str_replace('"', "", $GraphMonthData);
		// echo $GraphMonthData;
	}
	// GRAPH CHART COUNTER FOR SELECTED YEAR
	$GraphMonthDataCurrent = '';
	// echo date('Y');
	foreach ($result_monthly_current_year->result_array() as $row):
		$GraphMonthDataCurrent = $GraphMonthDataCurrent . $row['Total'] . '", "';
	endforeach;
	$GraphMonthDataCurrent = str_replace('"', "", $GraphMonthDataCurrent);
	// echo $GraphMonthData;
?>
<script type="text/javascript">
	$(document).ready(function () {
		$('.ModalHire').on('click', function () {
			$('#idToHire').val($(this).attr('id'));
			console.log($('#idToHire').val());
		});
		$('#ClientSelect').on('change', function() {
			<?php foreach ($getClientOption->result_array() as $row): ?>
			<?php
			// Count how many employees are on the client
			$CountEmployees = $this->Model_Selects->GetClientsEmployed($row['ClientID'])->num_rows();
			$CountEmployees++;
			$CountEmployees = str_pad($CountEmployees,4,0,STR_PAD_LEFT);
			// Get the current year
			$Year = date('Y');
			$Year = substr($Year, 2);
			// Concatenate them all together
			$EmployeeID = 'WC' . $row['EmployeeIDSuffix'] . '-' . $CountEmployees . '-' . $Year;
			?>
			if ($(this).val() == '<?php echo $row['ClientID']; ?>') {
				$(this).closest('#ClientModal').find('#EmployeeID').val('<?php echo $EmployeeID; ?>');
			}
			<?php endforeach; ?>
		});
		$('#EmploymentType').on('change', function() {
			if ($(this).val() == 'Contractual') {
				$('.contractual-group').show();
			} else {
				$('.contractual-group').hide();
			}
		});
		$(document).on('click', '.logbook-log-hover', function () {
			$(this).closest('.logbook-log-container').find('.logbook-tooltip-extended').toggle('fast');
			$(this).closest('.logbook-log-container').find('.fas').toggleClass('fa-angle-right');
			$(this).closest('.logbook-log-container').find('.fas').toggleClass('fa-angle-down');
			$(this).toggleClass('logbook-log');
			$(this).toggleClass('logbook-log-active');
		});
		$('[data-toggle="tooltip"]').tooltip();
		<?php if (isset($_GET['Year'])): ?>
			$('#GraphChartModal').modal('show');
		<?php endif; ?>
		<?php if (isset($_GET['Year']) && isset($_GET['Month'])): ?>
			location.href = "#ByMonth";
		<?php endif; ?>
		$("#GraphChartModal").on("hidden.bs.modal", function () { // Change URL on modal close
		    history.pushState(null, null, '<?php echo base_url() . 'Dashboard';  ?>');
		});
		$("#GraphYear").change(function() {
			$(this).parents('form').submit();
			$('#LoadingIcon').fadeIn();
		});
		$('.load-div').hide();
		$('#GraphChartButton').on('click', function () {
			$('#GraphChartModal').modal('show');
		});
		// $(".chart-hover").hover(function(){
		// 	$(this).find('.chart-hover-settings').show();
		// },function(){
		// 	$(this).find('.chart-hover-settings').hide();
		// });
		new Chart(document.getElementById("bar-chart-horizontal"), {
			type: 'horizontalBar',
			data: {
				labels: ["<?php echo $BarClientsLabel; ?>"],
				datasets: [
				{
					label : "",
					backgroundColor: ["#FFDB00", "#FFA600","#FF7900","#FF5900","#FF3900","#E32B2B", "#FF004D","#FF0071","#FF009E","#FF00D3","#FF00FB", "#DB00FF","#9A00FF","#6900FF","#2C00FF","#0014FF", "#0051FF","#0086FF","#00BAFF","#00E7FF","#37C6A9", "#37C682","#37C659","#42DA00","#ACE72D", "#FFDB00", "#FFA600","#FF7900","#FF5900","#FF3900","#E32B2B", "#FF004D","#FF0071","#FF009E","#FF00D3","#FF00FB", "#DB00FF","#9A00FF","#6900FF","#2C00FF","#0014FF", "#0051FF","#0086FF","#00BAFF","#00E7FF","#37C6A9", "#37C682","#37C659","#42DA00","#ACE72D", "#FFDB00", "#FFA600","#FF7900","#FF5900","#FF3900","#E32B2B", "#FF004D","#FF0071","#FF009E","#FF00D3","#FF00FB", "#DB00FF","#9A00FF","#6900FF","#2C00FF","#0014FF", "#0051FF","#0086FF","#00BAFF","#00E7FF","#37C6A9", "#37C682","#37C659","#42DA00","#ACE72D"],
					data: [<?php echo $BarClientsData; ?>, 0]
				}
				]
			},
			options: {
				legend: {
					display: false
				},
			}
		});
		var ctx = document.getElementById('ApplicantChart');
		var myChart = new Chart(ctx, {
			type: 'line',
			data: {
				labels: ['January', 'February', 'March', 'April', 'May', 'June' , 'July', 'August', 'September', 'October', 'November', 'December'],
				datasets: [{
					label: '# of Applicants',
					data: [<?php echo $GraphMonthDataCurrent; ?>],
					backgroundColor: [
					'rgba(185, 92, 26, 0.5)',
					],
					borderColor: [
					'rgba(185, 92, 26, 1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)',
					'rgba(153, 102, 255, 1)',
					'rgba(255, 159, 64, 1)',
					'rgba(255, 99, 132, 1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)',
					'rgba(153, 102, 255, 1)',
					'rgba(255, 159, 64, 1)'
					],
					borderWidth: 2
				}]
			},
			options: {
				scales: {
					yAxes: [{

						ticks: {
							stepValue: 1,
							beginAtZero: true
						}
					}]
				},
				title: {
					display: true,
					text: '<?php echo $CurrentYearTotal; ?> Applicants Total'
				},
				legend: {
					display: false
				}
			}
		});
		var GraphChartID = document.getElementById('GraphChartModal_Chart');
		var GraphChart = new Chart(GraphChartID, {
			type: 'line',
			data: {
				labels: ['January', 'February', 'March', 'April', 'May', 'June' , 'July', 'August', 'September', 'October', 'November', 'December'],
				datasets: [{
					label: '# of Applicants',
					data: [<?php if (isset($_GET['Year'])) { echo $GraphMonthData; } else { echo $GraphMonthDataCurrent; } ?>],
					backgroundColor: [
					'rgba(185, 92, 26, 0.5)',
					],
					borderColor: [
					'rgba(185, 92, 26, 1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)',
					'rgba(153, 102, 255, 1)',
					'rgba(255, 159, 64, 1)',
					'rgba(255, 99, 132, 1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)',
					'rgba(153, 102, 255, 1)',
					'rgba(255, 159, 64, 1)'
					],
					borderWidth: 2
				}]
			},
			options: {
				scales: {
					yAxes: [{

						ticks: {
                            stepValue: 1,
							beginAtZero: true
						}
					}]
				},
				title: {
					display: true,
					text: '<?php if (isset($_GET['Year'])) { echo $SelectedYearTotal; } else { echo $CurrentYearTotal; } ?> Total Applicants for <?php if (isset($_GET['Year'])) { echo $SelectedYear; } else { echo $CurrentYear; } ?>'
				},
				legend: {
					display: false
				}
			}
		});
		$.fn.dataTable.moment('MM/dd/yyyy hh:mm:ss A');
		var table = $('#ListLogbook').DataTable( {
        	"order": [[ 0, "desc" ]],
        	columnDefs: [{ targets: [0], type: 'date'}],
        	buttons: [
	            {
		            extend: 'print',
		            exportOptions: {
		                columns: [ 0, 1 ]
		            },
		            customize: function ( doc ) {
		            	$(doc.document.body).find('h1').prepend('<img src="<?=base_url()?>assets/img/wercher_logo.png" width="63px" height="56px" />');
						$(doc.document.body).find('h1').css('font-size', '24px');
						$(doc.document.body).find('h1').css('text-align', 'center'); 
					}
		        },
		        {
		            extend: 'copyHtml5',
		            exportOptions: {
		                columns: [ 0, 1 ]
		            }
		        },
		        {
		            extend: 'excelHtml5',
		            exportOptions: {
		                columns: [ 0, 1 ]
		            }
		        },
		        {
		            extend: 'csvHtml5',
		            exportOptions: {
		                columns: [ 0, 1 ]
		            }
		        },
		        {
		            extend: 'pdfHtml5',
		            exportOptions: {
		                columns: [ 0, 1 ]
		            }
		        }
	        ]
   		});
		$('#ExportPrint').on('click', function () {
	        table.button('0').trigger();
	    });
	    $('#ExportCopy').on('click', function () {
	        table.button('1').trigger();
	    });
	    $('#ExportExcel').on('click', function () {
	        table.button('2').trigger();
	    });
	    $('#ExportCSV').on('click', function () {
	        table.button('3').trigger();
	    });
	    $('#ExportPDF').on('click', function () {
	        table.button('4').trigger();
    	});
		$('#MoreOptions').on('click', function () {
			$('#MoreOptions').hide();
			$('.modal-fade').fadeIn();
		});
		var	MonthlyGraph = $('#MonthlyTable').DataTable( {
        	"order": [[ 0, "desc" ]],
        	columnDefs: [{ targets: [0], type: 'date'}],
        	buttons: [
	            {
		            extend: 'print',
		            exportOptions: {
		                columns: [ 2, 3, 4, 6, 7 ]
		            },
		            customize: function ( doc ) {
		            	$(doc.document.body).find('h1').prepend('<img src="<?=base_url()?>assets/img/wercher_logo.png" width="63px" height="56px" />');
						$(doc.document.body).find('h1').css('font-size', '24px');
						$(doc.document.body).find('h1').css('text-align', 'center'); 
					}
		        },
		        {
		            extend: 'copyHtml5',
		            exportOptions: {
		                columns: [ 2, 3, 4, 6, 7 ]
		            }
		        },
		        {
		            extend: 'excelHtml5',
		            exportOptions: {
		                columns: [ 2, 3, 4, 6, 7 ]
		            }
		        },
		        {
		            extend: 'csvHtml5',
		            exportOptions: {
		                columns: [ 2, 3, 4, 6, 7 ]
		            }
		        },
		        {
		            extend: 'pdfHtml5',
		            exportOptions: {
		                columns: [ 2, 3, 4, 6, 7 ]
		            }
		        }
	        ]
   		});
		$('#MG_ExportPrint').on('click', function () {
	       	MonthlyGraph.button('0').trigger();
	    });
	    $('#MG_ExportCopy').on('click', function () {
	       	MonthlyGraph.button('1').trigger();
	    });
	    $('#MG_ExportExcel').on('click', function () {
	       	MonthlyGraph.button('2').trigger();
	    });
	    $('#MG_ExportCSV').on('click', function () {
	       	MonthlyGraph.button('3').trigger();
	    });
	    $('#MG_ExportPDF').on('click', function () {
	       	MonthlyGraph.button('4').trigger();
    	});
		$('#MoreOptions').on('click', function () {
			$('#MoreOptions').hide();
			$('.modal-fade').fadeIn();
		});
	});
</script>
</html>