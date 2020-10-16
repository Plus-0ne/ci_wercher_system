<?php $T_Header;?>
<?php
	// $IsFromExcel = False;
?>
<body>
	<div class="wrapper wercher-background-lowpoly">
		<?php $this->load->view('_template/users/u_sidebar'); ?>
		<div id="content" class="ncontent">
			<div class="container-fluid">
				<?php $this->load->view('_template/users/u_notifications'); ?>
				<br>
				<div class="col-12 col-sm-12 payroll-tabs">
					<ul>
						<li>
							<a href="<?php echo base_url() ?>ViewClient?id=<?php echo $ClientID; ?>&mode=<?php echo $Mode; ?>">Attendance</a>
						</li>
						<li class="payroll-tabs-active">
							<a href="<?php echo base_url() ?>Payrollsss?id=<?php echo $ClientID; ?>&mode=<?php echo $Mode; ?>">Payroll</a>
						</li>
					</ul>
				</div>
				<div class="rcontent">
					<div class="row">
						<div class="col-8 mb-2">
							<form action="<?php echo base_url().'ImportExcel'; ?>" method="post" enctype="multipart/form-data">
								<input id="ExcelClientID" type="hidden" name="ExcelClientID" value="<?php echo $ClientID; ?>">
								<input id="file" type="file" name="file" class="btn btn-success btn-sm" style="display: none;" onchange="form.submit()">
								<!-- <button id="ImportButton" type="button" class="btn btn-success btn-sm"><i class="fas fa-file-excel"></i> Import</button> -->
								<button type="button" class="btn btn-secondary btn-sm"><i class="fas fa-lock"></i> Export (WIP)</button>
							</form>
							<!-- <div id="datatables-export"></div> -->
						</div>
						<div class="col-4 mb-2 text-right">
							<button type="button" class="btn btn-secondary btn-sm"><i class="fas fa-lock"></i> Generate Payslip (WIP)</button>
						</div>
						<div class="col-sm-12">
							<?php 
							$ClientID = $_GET['id'];
							$Mode = $_GET['mode'];
							if (!empty($_GET['year'])) {
								$FetchYear = $_GET['year'];
							} else {
								$FetchYear = new DateTime();
								$FetchYear = $FetchYear->format('Y');
							}

							$GetPayrollYear = $this->Model_Selects->GetPayrollYear($FetchYear, $Mode);
							if ($GetPayrollYear->num_rows() > 0): ?>
								<div class="payroll-year-container row">
									<div class="payroll-year col-sm-12">
										<b>Year <?php echo $FetchYear; ?></b>
									</div>
									<?php
									for ($i=1; $i<=12; $i++) {
										$FetchMonth = $i;
										$GetPayrollMonth = $this->Model_Selects->GetPayrollMonth($FetchYear, $FetchMonth, $Mode);
										if ($GetPayrollMonth->num_rows() > 0): 
											$ReadableMonth   = DateTime::createFromFormat('!m', $FetchMonth);
											$ReadableMonth = $ReadableMonth->format('F');
											?>
											<div class="payroll-month-container col-sm-12">
												<div class="payroll-month col-sm-12">
													<b><?php echo $ReadableMonth; ?></b>
												</div>
												<?php for($Week=1; $Week<=4; $Week++): ?>
												<div class="payroll-week-container col-sm-12">
													<div class="payroll-week col-sm-12">
														<b>Week <?php echo $Week; ?></b>
													</div>
													<div class="payroll-data col-sm-12 col-mb-12">
														<div class="table-responsive w-100">
															<table id="WeeklyTable" class="table table-condensed">
																<thead>
																	<th>Applicant ID</th>
																	<th>Hours</th>
																	<th>Gross Pay</th>
																	<th>PhilHealth</th>
																	<th>HDMF</th>
																	<th>Tax</th>
																	<th>SSS</th>
																	<th style="width: 50px;"><i class="fas fa-arrow-right" style="margin-right: -1px; color: rgba(0, 0, 0, 0.55);"></i></th>
																	<th data-toggle="tooltip" data-placement="top" data-html="true" title="Amount left to be paid for this week's SSS contribution">To be paid <i style="color: gray">(?)</i></th>
																	<th data-toggle="tooltip" data-placement="top" data-html="true" title="Amount that is paid for this week's SSS contribution. Used to subtract next week's SSS contribution." style="width: 225px;">Paid this week <i style="color: gray">(?)</i></th>
																	<th>Net Pay</th>
																</thead>
																<tbody>
																	<?php foreach ($GetWeeklyListEmployee->result_array() as $row):
																		$ApplicantID = $row['ApplicantID'];
																		$GetPayrollWeekGrossPay = $this->Model_Selects->GetPayrollWeekGrossPay($ApplicantID, $FetchYear, $FetchMonth, $Week, $Mode);
																		if ($GetPayrollWeekGrossPay == NULL) {
																			$GetPayrollWeekGrossPay = 0;
																		}
																		$GetPayrollWeekHours = $this->Model_Selects->GetPayrollWeekHours($ApplicantID, $FetchYear, $FetchMonth, $Week, $Mode);
																		if ($GetPayrollWeekHours == NULL) {
																			$GetPayrollWeekHours = 0;
																		}
																		$GetPayrollWeekOTHours = $this->Model_Selects->GetPayrollWeekOTHours($ApplicantID, $FetchYear, $FetchMonth, $Week, $Mode);
																		if ($GetPayrollWeekOTHours == NULL) {
																			$GetPayrollWeekOTHours = 0;
																		}
																		$TotalHours = $GetPayrollWeekHours + $GetPayrollWeekOTHours;
																		$sssTable = $this->Model_Selects->GetAllSSSTable();
																		$hdmfTable = $this->Model_Selects->GetAllHDMFTable();
																		$philhealthTable = $this->Model_Selects->GetAllPhilHealthTable();
																		// SSS Table
																		foreach ($sssTable->result_array() as $srow) {
																			if ($GetPayrollWeekGrossPay >= $srow['f_range'] && $GetPayrollWeekGrossPay <= $srow['t_range']) {
																				$sss_contri = $srow['contribution_ee'];
																			}
																		}
																		// HDMF Table
																		foreach ($hdmfTable->result_array() as $hrow) {
																			if ($GetPayrollWeekGrossPay >= $hrow['f_range'] && $GetPayrollWeekGrossPay <= $hrow['t_range']) {
																				$hdmf_rate = $hrow['contribution_ee'];
																			}
																		}
																		// PhilHealth Table
																		$philhealthArray=$philhealthTable->result_array();
																		if ($GetPayrollWeekGrossPay >= $philhealthArray[0]['f_range'] && $GetPayrollWeekGrossPay <= $philhealthArray[0]['t_range'])
																		{
																			$philhealth_percentage=300;
																		}
																		else if($GetPayrollWeekGrossPay >= $philhealthArray[1]['f_range'] && $GetPayrollWeekGrossPay <= $philhealthArray[1]['t_range'])
																		{
																			$philhealth_percentage=($GetPayrollWeekGrossPay * 0.03);

																		}
																		else
																		{
																			$philhealth_percentage=1800;
																		}

																		if($Mode==0)//weekly
																		{
																			$cutoffTaxDivider=4;
																		}
																		else if($Mode==1)//semi monthly
																		{
																			$cutoffTaxDivider=2;
																		}
																		else if($Mode==2) //monthly
																		{
																			$cutoffTaxDivider=1;
																		}

																		$sss_contriCalc = $sss_contri/$cutoffTaxDivider;
																		$hdmf_contri = $GetPayrollWeekGrossPay*$hdmf_rate;
																		$hdmf_contriCalc = $hdmf_contri/$cutoffTaxDivider;
																		$hdmf_contriText = $hdmf_contri * 100;
																		$philhealth_contri=$philhealth_percentage/$cutoffTaxDivider;

																		// Tax
																		$tStarts = new DateTime($row['DateStarted']);
																		$tEnds = new DateTime($row['DateEnds']);

																		// Calculating monthly salary to annual salary
																		$tDiff = $tEnds->diff($tStarts);
																		if ($tDiff->m > 1) {
																			$tTotalMonths = $tDiff->y * 12 + $tDiff->m + $tDiff->d / 30;
																		} else {
																			$tTotalMonths = $tDiff->d;
																		}
																		if ($row['SalaryExpected'] != NULL && $tTotalMonths > 0) {
																			$salaryMonthly = $row['SalaryExpected'] / $tTotalMonths;
																		} else {
																			$salaryMonthly = 0;
																		}
																		$annualSalary = $salaryMonthly * 12;
																		$year=date("Y");
																		if($year<=2022)
																		{
																			if($annualSalary<=250000) //Not over P250,000 -- 0%
																			{
																				$tax=0; 
																			}
																			else if($annualSalary>=250000.01 && $annualSalary <= 400000) 	//Over P250,000 but not over P400,000 -- 20% of the excess over P250,000
																			{
																				$tax=((($annualSalary-250000)*0.2)/12)/$cutoffTaxDivider;
																			} 
																			else if($annualSalary>=400000.01 && $annualSalary <= 800000) 	//Over P400,000 but not over P800,000 -- P30,000 + 25% of the excess over P400,000
																			{
																				$tax=((30000+(($annualSalary-400000)*0.25))/12)/$cutoffTaxDivider; 		 	//divided into 12 for monthly, then divided by 4 for weekly, 2 for semi monthly, 1 for monthly
																			}
																			else if($annualSalary>=800000.01 && $annualSalary <= 2000000) 	//Over P800,000 but not over P2,000,000 -- P130,000 + 30% of the excess over P800,000
																			{
																				$tax=((130000+(($annualSalary-800000)*0.3))/12)/$cutoffTaxDivider; 		  	//divided into 12 for monthly, then divided by 4 for weekly, 2 for semi monthly, 1 for monthly
																			}
																			else if($annualSalary>=2000000.01 && $annualSalary <= 8000000) 	//Over P2,000,000 but not over P8,000,000 -- P490,000 + 32% of the excess over P2,000,000
																			{
																				$tax=((490000+(($annualSalary-2000000)*0.32))/12)/$cutoffTaxDivider; 		//divided into 12 for monthly, then divided by 4 for weekly, 2 for semi monthly, 1 for monthly
																			}
																			else 															//Over P8,000,000 -- P2,410,000 + 35% of the excess over P8,000,000
																			{
																				$tax=((2410000+(($annualSalary-8000000)*0.35))/12)/$cutoffTaxDivider; 		//divided into 12 for monthly, then divided by 4 for weekly, 2 for semi monthly, 1 for monthly
																			}

																		}
																		else
																		{
																			if($annualSalary<=250000) //Not over P250,000 -- 0%
																			{
																				$tax=0; 
																			}
																			else if($annualSalary>=250000.01 && $annualSalary <= 400000) 	//Over P250,000 but not over P400,000 -- 15% of the excess over P250,000
																			{
																				$tax=((($annualSalary-250000)*0.15)/12)/$cutoffTaxDivider;
																			} 
																			else if($annualSalary>=400000.01 && $annualSalary <= 800000) 	//Over P400,000 but not over P800,000 -- P22,500 + 20% of the excess over P400,000
																			{
																				$tax=((22500+(($annualSalary-400000)*0.20))/12)/$cutoffTaxDivider; 		 	//divided into 12 for monthly, then divided by 4 for weekly, 2 for semi monthly, 1 for monthly
																			}
																			else if($annualSalary>=800000.01 && $annualSalary <= 2000000) 	//Over P800,000 but not over P2,000,000 -- P102,500 + 25% of the excess over P800,000
																			{
																				$tax=((102500+(($annualSalary-800000)*0.25))/12)/$cutoffTaxDivider; 		  	//divided into 12 for monthly, then divided by 4 for weekly, 2 for semi monthly, 1 for monthly
																			}
																			else if($annualSalary>=2000000.01 && $annualSalary <= 8000000) 	//Over P2,000,000 but not over P8,000,000 -- P402,500 + 30% of the excess over P2,000,000
																			{
																				$tax=((402500+(($annualSalary-2000000)*0.30))/12)/$cutoffTaxDivider; 		//divided into 12 for monthly, tthen divided by 4 for weekly, 2 for semi monthly, 1 for monthly
																			}
																			else 															//Over P8,000,000 -- P2,202,500 + 35% of the excess over P8,000,000
																			{
																				$tax=((202500+(($annualSalary-8000000)*0.35))/12)/$cutoffTaxDivider; 		//divided into 12 for monthly, then divided by 4 for weekly, 2 for semi monthly, 1 for monthly
																			}
																		}

																		$SSSToBePaid = $this->Model_Selects->GetSSSToBePaid($ApplicantID, $ClientID, $FetchYear, $FetchMonth);
																		if ($SSSToBePaid->num_rows() > 0) {
																			$stbprow = $SSSToBePaid->result_array()[0];
																			switch($Week) {
																				case 1:
																					$WeekAmount = $sss_contriCalc;
																					$WeekPaid = $stbprow['Week1Paid'];
																					$toBePaid = $WeekAmount;
																					break;
																				case 2:
																					$WeekAmountPrevious = $stbprow['Week1Amount'];
																					$WeekAmount = $stbprow['Week2Amount'];
																					$WeekPaidPrevious = $stbprow['Week1Paid'];
																					$WeekPaid = $stbprow['Week2Paid'];

																					$toBePaid = ($WeekAmount + $WeekAmountPrevious) - $WeekPaidPrevious;
																					break;
																				case 3:
																					$WeekAmountPreviousPrevious = $stbprow['Week1Amount'];
																					$WeekAmountPrevious = $stbprow['Week2Amount'];
																					$WeekAmount = $stbprow['Week3Amount'];

																					$WeekPaidPreviousPrevious = $stbprow['Week1Paid'];
																					$WeekPaidPrevious = $stbprow['Week2Paid'];
																					$WeekPaid = $stbprow['Week3Paid'];

																					$toBePaid = ($WeekAmount + $WeekAmountPrevious + $WeekAmountPreviousPrevious) - ($WeekPaidPrevious + $WeekPaidPreviousPrevious);
																					break;
																				case 4:
																					$WeekAmountPreviousPreviousPrevious = $stbprow['Week1Amount'];
																					$WeekAmountPreviousPrevious = $stbprow['Week2Amount'];
																					$WeekAmountPrevious = $stbprow['Week3Amount'];
																					$WeekAmount = $stbprow['Week4Amount'];

																					$WeekPaidPreviousPreviousPrevious = $stbprow['Week1Paid'];
																					$WeekPaidPreviousPrevious = $stbprow['Week2Paid'];
																					$WeekPaidPrevious = $stbprow['Week3Paid'];
																					$WeekPaid = $stbprow['Week4Paid'];

																					$toBePaid = ($WeekAmount + $WeekAmountPrevious + $WeekAmountPreviousPrevious + $WeekAmountPreviousPreviousPrevious) - ($WeekPaidPrevious + $WeekPaidPreviousPrevious + $WeekPaidPreviousPreviousPrevious);
																					break;
																				default:
																					$WeekAmount = $sss_contriCalc;
																					$WeekPaid = $stbprow['Week1Paid'];
																					$toBePaid = $WeekAmount;
																					break;
																			}
																		} else {
																			$WeekPaid = 0;
																			$toBePaid = $sss_contriCalc;
																			$now = new DateTime();
																			$DateAdded = $now->format('Y-m-d H:i:s');
																			$data = array(
																				'Amount' => $sss_contriCalc,
																				'ApplicantID' => $ApplicantID,
																				'ClientID' => $ClientID,
																				'Month' => $FetchMonth,
																				'Year' => $FetchYear,
																				'Week' => $Week,
																				'DateAdded' => $DateAdded,
																			);
																			$AddSSSToBePaidAmount = $this->Model_Updates->AddSSSToBePaidAmount($data);
																		}
																		$data = array(
																			'Amount' => $sss_contriCalc,
																			'ApplicantID' => $ApplicantID,
																			'ClientID' => $ClientID,
																			'Month' => $FetchMonth,
																			'Year' => $FetchYear,
																			'Week' => $Week,
																		);
																		$UpdateSSSToBePaidAmount = $this->Model_Updates->UpdateSSSToBePaidAmount($data);

																		$totalDeduction = $hdmf_contriCalc + $philhealth_contri + $tax + $toBePaid;
																		$net_pay = $GetPayrollWeekGrossPay - $totalDeduction;
																		if ($net_pay < 0) {
																			$net_pay = 0;
																		}

																		?>
																		<tr class="payroll-week-row">
																			<td><?php echo $row['ApplicantID']; ?></td>
																			<td data-toggle="tooltip" data-placement="top" data-html="true" title="Regular Hours: <?php echo round($GetPayrollWeekHours, 2) . '<br>Overtime Hours: ' . round($GetPayrollWeekOTHours, 2); ?>"><?php echo $TotalHours; ?></td>
																			<td><?php echo round($GetPayrollWeekGrossPay, 2); ?></td>
																			<td data-toggle="tooltip" data-placement="top" data-html="true" title="<?php echo round($philhealth_percentage, 2) . ' / ' . $cutoffTaxDivider . '<br><i>PhilHealth Percentage x Mode</i>'; ?>"><?php echo round($philhealth_contri, 2); ?></td>
																			<td data-toggle="tooltip" data-placement="top" data-html="true" title="(<?php echo round($GetPayrollWeekGrossPay, 2) . ' x ' . $hdmf_rate . ') / ' . $cutoffTaxDivider . '<br><i>(Gross Pay x HDMF Rate) / Mode</i>'; ?>"><?php echo round($hdmf_contriCalc, 2); ?></td>

																			<td data-toggle="tooltip" data-placement="top" data-html="true" title="<?php echo 'Annual Salary: ' . round($annualSalary, 2) . '<br>Monthly Salary: ' . round($salaryMonthly, 2); ?>"><?php echo $tax; ?></td>
																			<td data-toggle="tooltip" data-placement="top" data-html="true" title="<?php echo $sss_contri . ' / ' . $cutoffTaxDivider; ?><br><i>SSS Contribution / Mode</i>"><?php echo $sss_contriCalc; ?></td>
																			<td><i class="fas fa-arrow-right" style="margin-right: -1px; color: rgba(0, 0, 0, 0.55);"></i></td>
																			<td><?php echo $toBePaid; ?></td>
																			<td>
																				<div class="row">
																					<div class="col-sm-12 col-md-8">
																						<input type="number" class="payroll-weekrow-input form-control" value="<?php echo $WeekPaid; ?>">
																					</div>
																					<div class="col-sm-12 col-md-4">
																						<button class="payroll-weekrow-btn btn btn-success btn-sm w-100" data-payroll-weekrow-applicantid="<?php echo $ApplicantID; ?>" data-payroll-weekrow-clientid="<?php echo $ClientID; ?>" data-payroll-weekrow-year="<?php echo $FetchYear; ?>" data-payroll-weekrow-month="<?php echo $FetchMonth; ?>" data-payroll-weekrow-week="<?php echo $Week; ?>" style="margin-left: -25px; padding-top: 5px; padding-bottom: 5px; margin-top: 1px; display: none;"><i class="fas fa-check" style="margin-right: -1px;"></i></button>
																					</div>
																				</div>
																			</td>
																			<td data-toggle="tooltip" data-placement="top" data-html="true" title="<?php echo round($GetPayrollWeekGrossPay, 2) . ' - (' . $hdmf_contriCalc . ' + ' . $philhealth_contri . ' + ' . $tax . ' + ' . $toBePaid . ')<br><i>Gross Pay - (HDMF Contribution + PhilHealth Contribution + Tax + SSS left to be paid)</i>'; ?>"><?php echo round($net_pay, 2); ?>
																		</tr>
																	<?php endforeach; ?>
																</tbody>
															</table>
														</div>
													</div>
												</div>
											<?php endfor; ?>
											</div>
										<?php endif;
									}

									?>
								</div>
							<?php
							else:
								echo 'No data found for this year.';
							endif;
							?>
						</div>
						<!-- <div class="col-sm-12 col-mb-12">
							<div class="table-responsive w-100">
								<table id="WeeklyTable" class="table table-condensed">
									<thead>
										<th>Applicant ID</th>
										<th>Gross Pay</th>
										<th>Reg. Hrs.</th>
										<th>OT. Hrs.</th>
										<th>SSS Contribution</th>
										<th>TAX</th>
										<th>Net Pay</th>
										<th>Mode</th>
										<th>Date</th>
										<th>PDF</th>
									</thead>
									<tbody>
										<?php foreach ($get_applicantContri->result_array() as $row): ?>
											<tr>
												<td>
													<?php echo $row['ApplicantID'];?>
												</td>
												<td>
													<?php echo $row['gross_pay'];?>
												</td>
												<td>
													<?php echo $row['TotalHours'];?>
												</td>
												<td>
													<?php echo $row['TotaOT'];?>
												</td>
												<td>
													<?php echo $row['sss_contri'];?>
												</td>
												<td>
													SAMPLE
												</td>
												<td>
													<?php echo $row['net_pay'];?>
												</td>
												<td>
													<?php switch ($row['c_week']) {
														case '1':
															echo "Weekly";
															break;
														case '2':
															echo "Semi-Weekly";
															break;
														case '4':
															echo "Monthly";
															break;
														default:
															echo "NULL";
															break;
													} ?>
												</td>
												<td>
													<?php echo $row['c_month'];?>
												</td>
												<td>
													<a class="btn btn-primary btn-sm" href="<?=base_url()?>CreatePDF/GeneratePaySlip?id=<?php echo $row['id'];?>"><i class="fas fa-file fa-fw"></i> Print </a>
												</td>
											</tr>
										<?php endforeach ?>
									</tbody>
								</table>
							</div>
						</div> -->
					</div>
				</div>
			</div>
			<!-- Modal -->
			<!-- <?php foreach ($GetWeeklyListEmployee->result_array() as $row): ?>
				<div class="modal fade" id="applicantPay_<?php echo $row['ApplicantID']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel"><?php echo $row['ApplicantID'];?> Contributions</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<table class="table table-condensed table-bordered">
									<thead>
										<th>
											Gross Pay
										</th>
										<th>
											SSS Contribution
										</th>
									</thead>
									<tbody>
										<?php foreach ($get_applicantContri->result_array() as $nrow): ?>
									<?php if ($row['ApplicantID'] == $nrow['ApplicantID']): ?>
										<tr>
											<td>
												<?php echo $nrow['gross_pay']; ?>
											</td>
											<td>
												<?php echo $nrow['sss_contri']; ?>
											</td>
										</tr>
									<?php endif ?>
								<?php endforeach ?>
									</tbody>
								</table>
								
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								<button type="button" class="btn btn-primary">Save changes</button>
							</div>
						</div>
					</div>
				</div>
			<?php endforeach ?> -->
			
			<!-- LOAD MODAL -->
			<div class="modal fade" id="LoadModal" tabindex="-1" role="dialog" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-body">
							<div class="form-row">
								<div class="text-center ml-auto mr-auto">
									<div class="spinner-border m-5" role="status"></div>
									<h4>Fetching the table, just for you...</h4>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
<?php $this->load->view('_template/users/u_scripts'); ?>
<script type="text/javascript">
	$(document).ready(function () {
		$(".payroll-weekrow-input").bind("input", function () {
 			$(this).closest(".payroll-week-row").find('.payroll-weekrow-btn').show();
     });
		$('.payroll-weekrow-btn').click(function(){
			let ptwInput = $(this).closest(".payroll-week-row").find('.payroll-weekrow-input').val();
			let ptwApplicantID = $(this).data('payroll-weekrow-applicantid');
			let ptwClientID = $(this).data('payroll-weekrow-clientid');
			let ptwYear = $(this).data('payroll-weekrow-year');
			let ptwMonth = $(this).data('payroll-weekrow-month');
			let ptwWeek = $(this).data('payroll-weekrow-week');

			$.ajax({
				url : "<?php echo base_url() . 'AJAX_updateSSSToBePaid';?>",
				method : "POST",
				data : {Input: ptwInput, ApplicantID: ptwApplicantID, ClientID: ptwClientID, Year: ptwYear, Month: ptwMonth, Week: ptwWeek},
				success: function(data){
					location.reload();
				}

			});
		});
		$(".nav-item a[href*='Payroll']").addClass("nactive");
		$('[data-toggle="tooltip"]').tooltip();
		$('#ImportButton').click(function(){ $('#file').trigger('click'); });
		function readURL(input) {
			if (input.files && input.files[0]) {
				var reader = new FileReader();
				reader.onload = function(e) {
					$('#ImportButton').attr('src', e.target.result);
				}
				reader.readAsDataURL(input.files[0]);
			}
		}
		$("#file").change(function() {
			$('#LoadModal').modal('show');
			readURL(this);
			setTimeout(function (){

				$('.load-hidden-1').fadeIn();

			}, 2000);
		});

		var dd_buttons = new $.fn.dataTable.Buttons(table, {
			buttons: [
			{
				extend: 'collection',
				text: '<i class="fas fa-download"></i>',
				className: 'btn btn-primary',

				buttons: [
				{
					extend: 'copy',
					text: '<div class="btn btn-sm btn-info w-100">Copy</div>',
					className: 'dropdown-item w-25 ml-auto',
				},
				{
					extend: 'csv',
					text: '<div class="btn btn-sm btn-info w-100">CSV</div>',
					className: 'dropdown-item w-25 ml-auto',
				},
				{
					extend: 'excel',
					text: '<div class="btn btn-sm btn-info w-100">Excel</div>',
					className: 'dropdown-item w-25 ml-auto',
				},
				{
					extend: 'pdf',
					text: '<div class="btn btn-sm btn-info w-100">PDF</div>',
					className: 'dropdown-item w-25 ml-auto',
				},
				{
					extend: 'print',
					text: '<div class="btn btn-sm btn-info w-100">Print</div>',
					className: 'dropdown-item w-25 ml-auto',
				},
				]
			}
			]
		}).container().appendTo($('#datatables-export'));
	});
</script>
<style>
	#WeeklyTable th {
		font-size: 14px;
	}
	#WeeklyTable td {

	}
	#WeeklyTable tbody tr:hover {
		background-color: rgba(125, 125, 125, 0.11);
	}
	.modal-open {
		overflow-y: auto !important;
		padding-right: 0 !important;
	}
</style>
</html>