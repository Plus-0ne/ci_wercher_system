<?php $T_Header;?>
<?php
	// $IsFromExcel = False;
	$date = new DateTime();
	$currentYear = $date->format('Y');
	$currentMonth = $date->format('m');
	$currentMonthReadable = DateTime::createFromFormat('!m', $currentMonth);
	$currentMonthReadable = $currentMonthReadable->format('F');

	// Identifier
	$ClientID = $_GET['id'];
	$Mode = $_GET['mode'];
	if (!empty($_GET['year'])) {
		$Year = $_GET['year'];
	} else {
		$Year = $currentYear;
	}
	if (!empty($_GET['month'])) {
		$Month = $_GET['month'];
	} else {
		$Month = $currentMonth;
	}

	$selectedMonthReadable = DateTime::createFromFormat('!m', $Month);
	$selectedMonthReadable = $selectedMonthReadable->format('F');

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
							<a href="<?php echo base_url() ?>ViewPayroll?id=<?php echo $ClientID; ?>&mode=<?php echo $Mode; ?>">Payroll</a>
						</li>
					</ul>
				</div>
				<div class="rcontent">
					<div class="row">
						<div class="col-8 mb-2">
							<?php echo form_open(base_url().'ViewPayroll','method="GET" name="PayrollFilterForm"');?>
							<div class="form-row">
								<!-- Client -->
								<div class="form-group col-sm-4 col-md-2">
									<select id="ClientSelect" class="payroll-select form-control" name="id">
										<?php
										$GetClients = $this->Model_Selects->GetClients($ClientID);
										if ($GetClients->num_rows() > 0) {
											foreach($GetClients->result_array() as $row) { ?>
												<option value="<?php echo $row['ClientID']; ?>" <?php if ($row['ClientID'] == $ClientID) { echo 'selected'; } ?>><?php echo $row['Name']; ?></option>
											<?php }
										}
										?>
									</select>
								</div>
								<!-- Mode -->
								<div class="form-group col-sm-4 col-md-2">
									<select id="ModeSelect" class="payroll-select form-control" name="mode">
										<option value="0" <?php if ($Mode == 0) { echo 'selected'; } ?>>Weekly</option>
										<option value="1" <?php if ($Mode == 1) { echo 'selected'; } ?>>Semi-monthly</option>
										<option value="2" <?php if ($Mode == 2) { echo 'selected'; } ?>>Monthly</option>
									</select>
								</div>
								<!-- Years -->
								<div class="form-group col-sm-4 col-md-2">
									<select id="YearsSelect" class="payroll-select form-control" name="year">
										<?php
										$yearCountIteration = 100;
										$yearCountStart = $currentYear + ($yearCountIteration / 2);
										$yearCount = $yearCountStart;
										for($i = 0; $i <= $yearCountIteration; $i++):
											$yearCount = $yearCountStart - $i; ?>
											<option value="<?php echo $yearCount; ?>" <?php if ($yearCount == $Year) { echo 'selected'; } ?>><?php echo $yearCount; ?></option>
										<?php endfor; ?>
									</select>
								</div>
								<!-- Months -->
								<div class="form-group col-sm-6 col-md-2">
									<select id="MonthsSelect" class="payroll-select form-control" name="month">
										<?php for($i = 1; $i <= 12; $i++): 
											$monthCount = DateTime::createFromFormat('!m', $i);
											$monthCount = $monthCount->format('F'); ?>
											<option value="<?php echo $i; ?>" <?php if ($i == $Month) { echo 'selected'; } ?>><?php echo $monthCount; ?></option>
										<?php endfor; ?>
									</select>
								</div>
								<!-- Filter -->
								<div class="form-group col-sm-6 col-md-2">
									<button type="submit" class="btn btn-primary"><i class="fas fa-search"></i> Find</button>
								</div>
							</div>
						<?php echo form_close();?>
						</div>
						<div class="col-4 mb-2 text-right">
							<!-- Config -->
							<a href="ViewPayroll?id=<?php echo $ClientID; ?>&mode=<?php echo $Mode; ?>" class="btn btn-primary" data-toggle="tooltip" data-placement="top" data-html="true" title="Reset to current year (<?php echo $currentYear; ?>) and month (<?php echo $currentMonthReadable; ?>)"><i class="fas fa-redo"></i> Reset</a>
							<!-- <button type="button" class="btn btn-info"><i class="fas fa-cog"></i> Config</button> -->
							<button type="button" class="btn btn-success" data-toggle="modal" data-target="#GeneratePayslipModal"><i class="fas fa-file-invoice-dollar"></i> Generate Payslip</button>
						</div>
						<div class="col-sm-12">
							<?php 
							if (!empty($_GET['year'])) {
								$FetchYear = $_GET['year'];
							} else {
								$FetchYear = new DateTime();
								$FetchYear = $FetchYear->format('Y');
							}

							$GetPayrollYear = $this->Model_Selects->GetPayrollYear($FetchYear, $Mode);
							if ($GetPayrollYear->num_rows() > 0): ?>
								<div class="payroll-container row" style="font-size: 14px;">
									<?php
									if (!empty($_GET['month'])) {
										$FetchMonth = $_GET['month'];
									} else {
										$FetchMonth = new DateTime();
										$FetchMonth = $FetchMonth->format('m');
									}
									$GetPayrollMonth = $this->Model_Selects->GetPayrollMonth($FetchYear, $FetchMonth, $Mode);
									if ($GetPayrollMonth->num_rows() > 0): 
										$ReadableMonth   = DateTime::createFromFormat('!m', $FetchMonth);
										$ReadableMonth = $ReadableMonth->format('F');
										?>
										<div class="payroll-month-container col-sm-12">
											<?php if($Mode == 0): // Weekly ?>
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
																	<th>Inputs</th>
																	<th>Net Pay</th>
																	<th>Generate</th>
																</thead>
																<tbody>
																	<?php foreach ($GetWeeklyListEmployee->result_array() as $row):
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
																		}
																		$ApplicantID = $row['ApplicantID'];
																		$ApplicantName = $fullName;
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

																		$SSSToBePaid = $this->Model_Selects->GetSSSToBePaid($ApplicantID, $ClientID, $FetchYear, $FetchMonth, $Mode);
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
																				'Mode' => $Mode,
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
																			'Mode' => $Mode
																		);
																		$UpdateSSSToBePaidAmount = $this->Model_Updates->UpdateSSSToBePaidAmount($data);

																		$ShowPayrollLoans = $this->Model_Selects->ShowPayrollLoans($ApplicantID, $FetchYear, $FetchMonth, $Week, $Mode);
																		$loansTotal = 0;
																		if ($ShowPayrollLoans->num_rows() > 0) {
																			foreach($ShowPayrollLoans->result_array() as $lrow) {
																				$loansTotal = $loansTotal + $lrow['Amount'];
																			}
																		}

																		$totalDeduction = $hdmf_contriCalc + $philhealth_contri + $tax + $loansTotal + $toBePaid;
																		$net_pay = $GetPayrollWeekGrossPay - $totalDeduction;
																		if ($net_pay < 0) {
																			$net_pay = 0;
																		}

																		?>
																		<tr class="payroll-week-row">
																			<td><a href="ViewEmployee?id=<?php echo $row['ApplicantID']; ?>"><?php echo $fullName; ?></a></td>
																			<td class="payroll-hours" data-toggle="tooltip" data-placement="top" data-html="true" title="Regular Hours: <?php echo round($GetPayrollWeekHours, 2) . '<br>Overtime Hours: ' . round($GetPayrollWeekOTHours, 2); ?>"><?php echo $TotalHours; ?></td>
																			<td class="payroll-grosspay"><?php echo round($GetPayrollWeekGrossPay, 2); ?></td>
																			<td class="payroll-philhealth" data-toggle="tooltip" data-placement="top" data-html="true" title="<?php echo round($philhealth_percentage, 2) . ' / ' . $cutoffTaxDivider . '<br><i>PhilHealth Percentage x Mode</i>'; ?>"><?php echo round($philhealth_contri, 2); ?></td>
																			<td class="payroll-hdmf" data-toggle="tooltip" data-placement="top" data-html="true" title="(<?php echo round($GetPayrollWeekGrossPay, 2) . ' x ' . $hdmf_rate . ') / ' . $cutoffTaxDivider . '<br><i>(Gross Pay x HDMF Rate) / Mode</i>'; ?>"><?php echo round($hdmf_contriCalc, 2); ?></td>

																			<td class="payroll-tax" data-toggle="tooltip" data-placement="top" data-html="true" title="<?php echo 'Annual Salary: ' . round($annualSalary, 2) . '<br>Monthly Salary: ' . round($salaryMonthly, 2); ?>"><?php echo $tax; ?></td>
																			<td class="payroll-sss" data-toggle="tooltip" data-placement="top" data-html="true" title="<?php echo $sss_contri . ' / ' . $cutoffTaxDivider; ?><br><i>SSS Contribution / Mode</i>"><?php echo $sss_contriCalc; ?></td>
																			<td><i class="fas fa-arrow-right" style="margin-right: -1px; color: rgba(0, 0, 0, 0.55);"></i></td>
																			<td class="payroll-tobepaid"><?php echo $toBePaid; ?></td>
																			<td>
																				<div class="row">
																					<div class="col-sm-12 col-md-8">
																						<input type="number" class="payroll-paidthisweek payroll-weekrow-input form-control" value="<?php echo $WeekPaid; ?>">
																					</div>
																					<div class="col-sm-12 col-md-4">
																						<button class="payroll-weekrow-btn btn btn-success btn-sm w-100" data-payroll-weekrow-applicantid="<?php echo $ApplicantID; ?>" data-payroll-weekrow-clientid="<?php echo $ClientID; ?>" data-payroll-weekrow-year="<?php echo $FetchYear; ?>" data-payroll-weekrow-month="<?php echo $FetchMonth; ?>" data-payroll-weekrow-week="<?php echo $Week; ?>" style="margin-left: -25px; padding-top: 5px; padding-bottom: 5px; margin-top: 1px; display: none;"><i class="fas fa-check" style="margin-right: -1px;"></i></button>
																					</div>
																				</div>
																			</td>
																			<td>
																				<button type="button" class="loans-btn btn btn-info btn-sm w-100" data-toggle="modal" data-target="#ModalLoans" data-applicantid="<?php echo $ApplicantID; ?>" data-applicantname="<?php echo $ApplicantName; ?>" data-year="<?php echo $FetchYear; ?>" data-month="<?php echo $FetchMonth; ?>" data-week="<?php echo $Week; ?>" data-loanstotal="<?php echo $loansTotal; ?>"><i class="fas fa-piggy-bank"></i> Loans</button>
																				<button type="button" class="provisions-btn btn btn-success btn-sm w-100" data-toggle="modal" data-target="#ModalProvisions" data-applicantid="<?php echo $ApplicantID; ?>" data-applicantname="<?php echo $ApplicantName; ?>" data-year="<?php echo $FetchYear; ?>" data-month="<?php echo $FetchMonth; ?>" data-week="<?php echo $Week; ?>" data-provisionstotal="<?php echo $loansTotal; ?>" style="margin-top: 1px;"><i class="fas fa-donate"></i> Provisions</button>
																			</td>
																			<td class="payroll-net-pay" data-toggle="tooltip" data-placement="top" data-html="true" title="<?php echo round($GetPayrollWeekGrossPay, 2) . ' - (' . $hdmf_contriCalc . ' + ' . $philhealth_contri . ' + ' . $tax . ' + ' . $toBePaid . ')<br><i>Gross Pay - (HDMF Contribution + PhilHealth Contribution + Tax + SSS left to be paid)</i>'; ?>"><?php echo round($net_pay, 2); ?></td>
																			<td>
																				<button type="button" class="individual-payslip-btn btn btn-success btn-sm w-100" data-toggle="modal" data-target="#GeneratePayslipModal" data-applicantid="<?php echo $ApplicantID; ?>" data-periodmode="<?php echo $Mode; ?>"><i class="fas fa-file-invoice-dollar"></i> Payslip</button>
																			</td>
																		</tr>
																	<?php endforeach; ?>
																</tbody>
															</table>
														</div>
													</div>
												</div>
											<?php endfor; ?>
										<?php elseif($Mode == 1): // Semi-monthly ?>
												<?php for($Week=1; $Week<=2; $Week++): ?>
												<div class="payroll-week-container col-sm-12">
													<div class="payroll-week col-sm-12">
														<b>Period <?php echo $Week; ?></b>
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
																	<th>Inputs</th>
																	<th>Net Pay</th>
																	<th>Generate</th>
																</thead>
																<tbody>
																	<?php foreach ($GetWeeklyListEmployee->result_array() as $row):

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
																		}
																		$ApplicantID = $row['ApplicantID'];
																		$ApplicantName = $fullName;
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

																		$SSSToBePaid = $this->Model_Selects->GetSSSToBePaid($ApplicantID, $ClientID, $FetchYear, $FetchMonth, $Mode);
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
																				'Mode' => $Mode,
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
																			'Mode' => $Mode
																		);
																		$UpdateSSSToBePaidAmount = $this->Model_Updates->UpdateSSSToBePaidAmount($data);

																		$ShowPayrollLoans = $this->Model_Selects->ShowPayrollLoans($ApplicantID, $FetchYear, $FetchMonth, $Week, $Mode);
																		$loansTotal = 0;
																		if ($ShowPayrollLoans->num_rows() > 0) {
																			foreach($ShowPayrollLoans->result_array() as $lrow) {
																				$loansTotal = $loansTotal + $lrow['Amount'];
																			}
																		}

																		$totalDeduction = $hdmf_contriCalc + $philhealth_contri + $tax + $loansTotal + $toBePaid;
																		$net_pay = $GetPayrollWeekGrossPay - $totalDeduction;
																		if ($net_pay < 0) {
																			$net_pay = 0;
																		}

																		?>
																		<tr class="payroll-week-row">
																			<td><a href="ViewEmployee?id=<?php echo $row['ApplicantID']; ?>"><?php echo $fullName; ?></a></td>
																			<td class="payroll-hours" data-toggle="tooltip" data-placement="top" data-html="true" title="Regular Hours: <?php echo round($GetPayrollWeekHours, 2) . '<br>Overtime Hours: ' . round($GetPayrollWeekOTHours, 2); ?>"><?php echo $TotalHours; ?></td>
																			<td class="payroll-grosspay"><?php echo round($GetPayrollWeekGrossPay, 2); ?></td>
																			<td class="payroll-philhealth" data-toggle="tooltip" data-placement="top" data-html="true" title="<?php echo round($philhealth_percentage, 2) . ' / ' . $cutoffTaxDivider . '<br><i>PhilHealth Percentage x Mode</i>'; ?>"><?php echo round($philhealth_contri, 2); ?></td>
																			<td class="payroll-hdmf" data-toggle="tooltip" data-placement="top" data-html="true" title="(<?php echo round($GetPayrollWeekGrossPay, 2) . ' x ' . $hdmf_rate . ') / ' . $cutoffTaxDivider . '<br><i>(Gross Pay x HDMF Rate) / Mode</i>'; ?>"><?php echo round($hdmf_contriCalc, 2); ?></td>

																			<td class="payroll-tax" data-toggle="tooltip" data-placement="top" data-html="true" title="<?php echo 'Annual Salary: ' . round($annualSalary, 2) . '<br>Monthly Salary: ' . round($salaryMonthly, 2); ?>"><?php echo $tax; ?></td>
																			<td class="payroll-sss" data-toggle="tooltip" data-placement="top" data-html="true" title="<?php echo $sss_contri . ' / ' . $cutoffTaxDivider; ?><br><i>SSS Contribution / Mode</i>"><?php echo $sss_contriCalc; ?></td>
																			<td><i class="fas fa-arrow-right" style="margin-right: -1px; color: rgba(0, 0, 0, 0.55);"></i></td>
																			<td class="payroll-tobepaid"><?php echo $toBePaid; ?></td>
																			<td>
																				<div class="row">
																					<div class="col-sm-12 col-md-8">
																						<input type="number" class="payroll-paidthisweek payroll-weekrow-input form-control" value="<?php echo $WeekPaid; ?>">
																					</div>
																					<div class="col-sm-12 col-md-4">
																						<button class="payroll-weekrow-btn btn btn-success btn-sm w-100" data-payroll-weekrow-applicantid="<?php echo $ApplicantID; ?>" data-payroll-weekrow-clientid="<?php echo $ClientID; ?>" data-payroll-weekrow-year="<?php echo $FetchYear; ?>" data-payroll-weekrow-month="<?php echo $FetchMonth; ?>" data-payroll-weekrow-week="<?php echo $Week; ?>" style="margin-left: -25px; padding-top: 5px; padding-bottom: 5px; margin-top: 1px; display: none;"><i class="fas fa-check" style="margin-right: -1px;"></i></button>
																					</div>
																				</div>
																			</td>
																			<td>
																				<button type="button" class="loans-btn btn btn-info btn-sm w-100" data-toggle="modal" data-target="#ModalLoans" data-applicantid="<?php echo $ApplicantID; ?>" data-applicantname="<?php echo $ApplicantName; ?>" data-year="<?php echo $FetchYear; ?>" data-month="<?php echo $FetchMonth; ?>" data-week="<?php echo $Week; ?>" data-loanstotal="<?php echo $loansTotal; ?>"><i class="fas fa-piggy-bank"></i> Loans</button>
																				<button type="button" class="provisions-btn btn btn-success btn-sm w-100" data-toggle="modal" data-target="#ModalProvisions" data-applicantid="<?php echo $ApplicantID; ?>" data-applicantname="<?php echo $ApplicantName; ?>" data-year="<?php echo $FetchYear; ?>" data-month="<?php echo $FetchMonth; ?>" data-week="<?php echo $Week; ?>" data-provisionstotal="<?php echo $loansTotal; ?>" style="margin-top: 1px;"><i class="fas fa-donate"></i> Provisions</button>
																			</td>
																			<td class="payroll-net-pay" data-toggle="tooltip" data-placement="top" data-html="true" title="<?php echo round($GetPayrollWeekGrossPay, 2) . ' - (' . $hdmf_contriCalc . ' + ' . $philhealth_contri . ' + ' . $tax . ' + ' . $toBePaid . ')<br><i>Gross Pay - (HDMF Contribution + PhilHealth Contribution + Tax + SSS left to be paid)</i>'; ?>"><?php echo round($net_pay, 2); ?></td>
																			<td>
																				<button type="button" class="individual-payslip-btn btn btn-success btn-sm w-100" data-toggle="modal" data-target="#GeneratePayslipModal" data-applicantid="<?php echo $ApplicantID; ?>" data-periodmode="<?php echo $Mode; ?>"><i class="fas fa-file-invoice-dollar"></i> Payslip</button>
																			</td>
																		</tr>
																	<?php endforeach; ?>
																</tbody>
															</table>
														</div>
													</div>
												</div>
											<?php endfor; ?>
										<?php elseif($Mode == 2): // Monthly 
												$Week = 1;?>
												<div class="payroll-week-container col-sm-12">
													<div class="payroll-week col-sm-12">
														<b><?php echo $selectedMonthReadable; ?></b>
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
																	<th>Inputs</th>
																	<th>Net Pay</th>
																	<th>Generate</th>
																</thead>
																<tbody>
																	<?php foreach ($GetWeeklyListEmployee->result_array() as $row):
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
																		}
																		$ApplicantID = $row['ApplicantID'];
																		$ApplicantName = $fullName;
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

																		$SSSToBePaid = $this->Model_Selects->GetSSSToBePaid($ApplicantID, $ClientID, $FetchYear, $FetchMonth, $Mode);
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
																				'Mode' => $Mode,
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
																			'Mode' => $Mode
																		);
																		$UpdateSSSToBePaidAmount = $this->Model_Updates->UpdateSSSToBePaidAmount($data);

																		$ShowPayrollLoans = $this->Model_Selects->ShowPayrollLoans($ApplicantID, $FetchYear, $FetchMonth, $Week, $Mode);
																		$loansTotal = 0;
																		if ($ShowPayrollLoans->num_rows() > 0) {
																			foreach($ShowPayrollLoans->result_array() as $lrow) {
																				$loansTotal = $loansTotal + $lrow['Amount'];
																			}
																		}

																		$totalDeduction = $hdmf_contriCalc + $philhealth_contri + $tax + $loansTotal + $toBePaid;
																		$net_pay = $GetPayrollWeekGrossPay - $totalDeduction;
																		if ($net_pay < 0) {
																			$net_pay = 0;
																		}

																		?>
																		<tr class="payroll-week-row">
																			<td><a href="ViewEmployee?id=<?php echo $row['ApplicantID']; ?>"><?php echo $fullName; ?></a></td>
																			<td class="payroll-hours" data-toggle="tooltip" data-placement="top" data-html="true" title="Regular Hours: <?php echo round($GetPayrollWeekHours, 2) . '<br>Overtime Hours: ' . round($GetPayrollWeekOTHours, 2); ?>"><?php echo $TotalHours; ?></td>
																			<td class="payroll-grosspay"><?php echo round($GetPayrollWeekGrossPay, 2); ?></td>
																			<td class="payroll-philhealth" data-toggle="tooltip" data-placement="top" data-html="true" title="<?php echo round($philhealth_percentage, 2) . ' / ' . $cutoffTaxDivider . '<br><i>PhilHealth Percentage x Mode</i>'; ?>"><?php echo round($philhealth_contri, 2); ?></td>
																			<td class="payroll-hdmf" data-toggle="tooltip" data-placement="top" data-html="true" title="(<?php echo round($GetPayrollWeekGrossPay, 2) . ' x ' . $hdmf_rate . ') / ' . $cutoffTaxDivider . '<br><i>(Gross Pay x HDMF Rate) / Mode</i>'; ?>"><?php echo round($hdmf_contriCalc, 2); ?></td>

																			<td class="payroll-tax" data-toggle="tooltip" data-placement="top" data-html="true" title="<?php echo 'Annual Salary: ' . round($annualSalary, 2) . '<br>Monthly Salary: ' . round($salaryMonthly, 2); ?>"><?php echo $tax; ?></td>
																			<td class="payroll-sss" data-toggle="tooltip" data-placement="top" data-html="true" title="<?php echo $sss_contri . ' / ' . $cutoffTaxDivider; ?><br><i>SSS Contribution / Mode</i>"><?php echo $sss_contriCalc; ?></td>
																			<td><i class="fas fa-arrow-right" style="margin-right: -1px; color: rgba(0, 0, 0, 0.55);"></i></td>
																			<td class="payroll-tobepaid"><?php echo $toBePaid; ?></td>
																			<td>
																				<div class="row">
																					<div class="col-sm-12 col-md-8">
																						<input type="number" class="payroll-paidthisweek payroll-weekrow-input form-control" value="<?php echo $WeekPaid; ?>">
																					</div>
																					<div class="col-sm-12 col-md-4">
																						<button class="payroll-weekrow-btn btn btn-success btn-sm w-100" data-payroll-weekrow-applicantid="<?php echo $ApplicantID; ?>" data-payroll-weekrow-clientid="<?php echo $ClientID; ?>" data-payroll-weekrow-year="<?php echo $FetchYear; ?>" data-payroll-weekrow-month="<?php echo $FetchMonth; ?>" data-payroll-weekrow-week="<?php echo $Week; ?>" style="margin-left: -25px; padding-top: 5px; padding-bottom: 5px; margin-top: 1px; display: none;"><i class="fas fa-check" style="margin-right: -1px;"></i></button>
																					</div>
																				</div>
																			</td>
																			<td>
																				<button type="button" class="loans-btn btn btn-info btn-sm w-100" data-toggle="modal" data-target="#ModalLoans" data-applicantid="<?php echo $ApplicantID; ?>" data-applicantname="<?php echo $ApplicantName; ?>" data-year="<?php echo $FetchYear; ?>" data-month="<?php echo $FetchMonth; ?>" data-week="<?php echo $Week; ?>" data-loanstotal="<?php echo $loansTotal; ?>"><i class="fas fa-piggy-bank"></i> Loans</button>
																				<button type="button" class="provisions-btn btn btn-success btn-sm w-100" data-toggle="modal" data-target="#ModalProvisions" data-applicantid="<?php echo $ApplicantID; ?>" data-applicantname="<?php echo $ApplicantName; ?>" data-year="<?php echo $FetchYear; ?>" data-month="<?php echo $FetchMonth; ?>" data-week="<?php echo $Week; ?>" data-provisionstotal="<?php echo $loansTotal; ?>" style="margin-top: 1px;"><i class="fas fa-donate"></i> Provisions</button>
																			</td>
																			<td class="payroll-net-pay" data-toggle="tooltip" data-placement="top" data-html="true" title="<?php echo round($GetPayrollWeekGrossPay, 2) . ' - (' . $hdmf_contriCalc . ' + ' . $philhealth_contri . ' + ' . $tax . ' + ' . $toBePaid . ')<br><i>Gross Pay - (HDMF Contribution + PhilHealth Contribution + Tax + SSS left to be paid)</i>'; ?>"><?php echo round($net_pay, 2); ?></td>
																			<td>
																				<button type="button" class="individual-payslip-btn btn btn-success btn-sm w-100" data-toggle="modal" data-target="#GeneratePayslipModal" data-applicantid="<?php echo $ApplicantID; ?>" data-periodmode="<?php echo $Mode; ?>"><i class="fas fa-file-invoice-dollar"></i> Payslip</button>
																			</td>
																		</tr>
																	<?php endforeach; ?>
																</tbody>
															</table>
														</div>
													</div>
												</div>
											<?php
										endif; ?>
										</div>
									<?php
									else:
										echo '<span class="ml-5" style="font-size: 24px; color: rgba(0, 0, 0, 0.45);"><i class="fas fa-info-circle"></i> No data found for this month.</span>';
									endif;

									?>
								</div>
							<?php
							else:
								echo '<span class="ml-5" style="font-size: 24px; color: rgba(0, 0, 0, 0.45);"><i class="fas fa-info-circle"></i> No data found for this year.</span>';
							endif;
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php $this->load->view('_template/modals/m_p_loans'); ?>
	<?php $this->load->view('_template/modals/m_p_generatepayslip'); ?>
	<?php $this->load->view('_template/modals/m_p_provisions'); ?>
</body>
<?php $this->load->view('_template/users/u_scripts'); ?>
<script type="text/javascript">
	$(document).ready(function () {
		// Initialization
		function updateCalculation() {
			$('.payroll-net-pay').each(function() {
				// $(this).parents('.payroll-week-row').find('.payroll-net-pay').html('<i class="spinner-border spinner-border-sm"></i>');
				// Essential identifiers
				let ApplicantID = $(this).parents('.payroll-week-row').find('.loans-btn').data('applicantid');
				let Year = $(this).parents('.payroll-week-row').find('.loans-btn').data('year');
				let Month = $(this).parents('.payroll-week-row').find('.loans-btn').data('month');
				let Week = $(this).parents('.payroll-week-row').find('.loans-btn').data('week');

				// Calculation
				let GrossPay = parseInt($(this).parents('.payroll-week-row').find('.payroll-grosspay').text());
				let PhilHealth = parseInt($(this).parents('.payroll-week-row').find('.payroll-philhealth').text());
				let HDMF = parseInt($(this).parents('.payroll-week-row').find('.payroll-hdmf').text());
				let Tax = parseInt($(this).parents('.payroll-week-row').find('.payroll-tax').text());
				let SSSToBePaid = parseInt($(this).parents('.payroll-week-row').find('.payroll-tobepaid').text());
				// let SSSPaidThisWeek = $(this).parents('.payroll-week-row').find('.payroll-paidthisweek').val();
				let LoansTotal = $(this).parents('.payroll-week-row').find('.loans-btn').data('loanstotal');

				if (SSSToBePaid < 0) {
					SSSToBePaid = 0;
				}
				if (LoansTotal < 0 || LoansTotal == null) {
					LoansTotal = 0;
				}

				let NetPay = GrossPay - (PhilHealth + HDMF + Tax + LoansTotal + SSSToBePaid);

				if (NetPay < 0) {
					NetPay = 0;
				}

				$(this).parents('.payroll-week-row').find('.payroll-net-pay').text(NetPay);
				console.log('==============================');
				// console.log('ApplicantID: ' + ApplicantID);
				// console.log('GrossPay: ' + GrossPay);
				// console.log('PhilHealth: ' + PhilHealth);
				// console.log('HDMF: ' + HDMF);
				// console.log('Tax: ' + Tax);
				// console.log('LoansTotal: ' + LoansTotal);
				console.log('SSSToBePaid: ' + SSSToBePaid);
				// console.log('SSSPaidThisWeek: ' + SSSPaidThisWeek);
				console.log('Updated payroll calculations: ' + NetPay);
			})
		}
		updateCalculation();
		// =================
		$('.year-select').on('change', function() {
			history.pushState(null, null, '<?php echo base_url() . 'Payrollss?id=' . $ApplicantID ?>');
		});
		// Loan remove
		var LoansArray = [];
		$('body').on('click', '.loan-remove', function () { // Using body for dynamic appends.
			$(this).parents('.loan-input').toggleClass('row-transparent');
			LoanID = $(this).closest('.loan-input').find('.loan-id').val();
			$(this).toggleClass('btn-secondary btn-danger');
			if ($(this).hasClass('btn-danger')) {
				// Add to array
				LoansArray.push(LoanID);
			} else {
				// Remove from array
				let index = LoansArray.indexOf(LoanID); // Search in array
				if (index > -1) {
					LoansArray.splice(index, 1);
				}
			}
			console.log(LoansArray);
		});
		$("#ModalLoans").on("hidden.bs.modal", function () { // Resets modal on close
			$('#NewLoanContainer').empty();
			$('.new-loan-row').hide();
			updateCalculation();
		});
		var AJAX_onCall = false; <?php // Prevents repeated button mashing. ?>
		var Mode = <?php echo $_GET['mode']; ?>;
		$('.save-loan-btn').on('click', function () {
			if (AJAX_onCall == false) {
				$(this).find('i').removeClass('fas');
				$(this).find('i').removeClass('fa-check');
				$(this).removeClass('btn-success');
				$(this).addClass('btn-secondary');
				$(this).find('i').addClass('spinner-border');
				$(this).find('i').addClass('spinner-border-sm');
				$('.loan-input > div').children().prop('readonly', true);
				$('.loan-input > div').children().css('opacity', '0.5');
				AJAX_onCall = true;
				// AJAX Call
				let ApplicantID = $('#LoansApplicantID').text();
				let Year = $('#LoansYear').val();
				let Month = $('#LoansMonth').val();
				let Week = $('#LoansWeek').val();
				if (LoansArray.length > 0) {
					$.ajax({
						url : "<?php echo base_url() . 'AJAX_removePayrollLoans';?>",
						method : "POST",
						data: {LoansArray: JSON.stringify(LoansArray), ApplicantID: ApplicantID, Year: Year, Month: Month, Week: Week, Mode: Mode},
						dataType: "html",
						success: function(data){
							console.log('success');
							// $("body").html(data);

						}
					})
				}
				$('.loan-input').each(function() {
					let LoanName = $(this).find(".loan-name").val();
					let Amount = $(this).find(".loan-amount").val();
					let ID = $(this).find(".loan-id").val();
					// console.log(ApplicantID);
					// console.log(LoanName);
					// console.log(Amount);
					// console.log(ID);
					let totalCounter = 0;
					$.ajax({
						url : "<?php echo base_url() . 'AJAX_insertPayrollLoans';?>",
						method : "POST",
						data: {ID: ID, ApplicantID: ApplicantID, LoanName: LoanName, Amount: Amount, Year: Year, Month: Month, Week: Week, Mode: Mode},
						dataType: "html",
						success: function(data){
							console.log('success');
							console.log(ApplicantID);
							console.log(Year);
							console.log(Month);
							console.log(Week);
							$("#LoadLoanContainer").html(data);
							$('.save-loan-btn').closest('.save-loan-btn').find('i').addClass('fas');
							$('.save-loan-btn').closest('.save-loan-btn').find('i').addClass('fa-check');
							$('.save-loan-btn').closest('.save-loan-btn').addClass('btn-success');
							$('.save-loan-btn').closest('.save-loan-btn').removeClass('btn-secondary');
							$('.save-loan-btn').closest('.save-loan-btn').find('i').removeClass('spinner-border');
							$('.save-loan-btn').closest('.save-loan-btn').find('i').removeClass('spinner-border-sm');
							$('.new-loan-row').hide();
							$('#NewLoanContainer').children().empty();
							$('.loan-input').each(function() {
								totalCounter = totalCounter + parseFloat($(this).find('.loan-amount').val());
								console.log(totalCounter);
								$('.loans-btn[data-applicantid=' + ApplicantID + '][data-year=' + Year + '][data-month=' + Month + '][data-week=' + Week + ']').data('loanstotal', totalCounter);
							})
							AJAX_onCall = false;
							updateCalculation();
						}
					})
				})
			}
		});
		$('.new-loan-add-btn').on('click', function () {
			$('.new-loan-row').show();
			$('.new-loan-row').animate({opacity: '1.0'});
			$('#NewLoanContainer').append('<div class="form-row loan-input w-100"><input class="form-control loan-id" type="hidden" value="-1"><div class="col-sm-7 mt-1"><input class="form-control loan-name" type="text" name="LoanName[]"></div><div class="col-sm-4 mt-1"><input class="form-control loan-amount" type="number" name="LoanAmount[]"></div><div class="col-sm-1 mt-1"><button class="form-control loan-discard btn-danger" type="button" data-toggle="tooltip" data-placement="top" data-html="true" title="Discard?"><i class="fas fa-times" style="font-size: 12px; margin-left: -4px;"></i></button></div></div>');
		});
		$('.loans-btn').on('click', function () {
			$('#LoansApplicantID').text($(this).data('applicantid'));
			$('#LoansApplicantName').text($(this).data('applicantname'));
			let ApplicantURL = "ViewEmployee?id=" + $(this).data('applicantid');
			$('#LoansApplicantName').attr('href', ApplicantURL);
			$('#LoansYear').val($(this).data('year'));
			$('#LoansMonth').val($(this).data('month'));
			$('#LoansWeek').val($(this).data('week'));
			// AJAX Call
			let ApplicantID = $('#LoansApplicantID').text();
			let Year = $('#LoansYear').val();
			let Month = $('#LoansMonth').val();
			let Week = $('#LoansWeek').val();
			let totalCounter = 0;
			$.ajax({
				url : "<?php echo base_url() . 'AJAX_showPayrollLoans';?>",
				method : "POST",
				data: {ApplicantID: ApplicantID, Year: Year, Month: Month, Week: Week, Mode: Mode},
				dataType: "html",
				success: function(response){
					$("#LoadLoanContainer").html(response);
					$('.ajax-load-container').show();
					$('.loan-input').each(function() {
						totalCounter = totalCounter + parseFloat($(this).find('.loan-amount').val());
						$('#LoanTotal').text(totalCounter);
					})
			}

			});
			updateCalculation();
		});
		// Loan discard
		$('body').on('click', '.loan-discard', function () { // Using body for dynamic appends.
			$(this).parents('.loan-input').remove();
			if ($('#NewLoanContainer > div').length <= 0) {
				$('.new-loan-row').fadeOut('fast');
			}
		});
		// Provision remove
		var ProvisionsArray = [];
		$('body').on('click', '.provision-remove', function () { // Using body for dynamic appends.
			$(this).parents('.provision-input').toggleClass('row-transparent');
			ProvisionID = $(this).closest('.provision-input').find('.provision-id').val();
			$(this).toggleClass('btn-secondary btn-danger');
			if ($(this).hasClass('btn-danger')) {
				// Add to array
				ProvisionsArray.push(ProvisionID);
			} else {
				// Remove from array
				let index = ProvisionsArray.indexOf(ProvisionID); // Search in array
				if (index > -1) {
					ProvisionsArray.splice(index, 1);
				}
			}
			console.log(ProvisionsArray);
		});
		$("#ModalProvisions").on("hidden.bs.modal", function () { // Resets modal on close
			$('#NewProvisionContainer').empty();
			$('.new-provision-row').hide();
		});
		$('.save-provision-btn').on('click', function () {
			if (AJAX_onCall == false) {
				$(this).find('i').removeClass('fas');
				$(this).find('i').removeClass('fa-check');
				$(this).removeClass('btn-success');
				$(this).addClass('btn-secondary');
				$(this).find('i').addClass('spinner-border');
				$(this).find('i').addClass('spinner-border-sm');
				$('.provision-input > div').children().prop('readonly', true);
				$('.provision-input > div').children().css('opacity', '0.5');
				AJAX_onCall = true;
				// AJAX Call
				let ApplicantID = $('#ProvisionsApplicantID').text();
				let Year = $('#ProvisionsYear').val();
				let Month = $('#ProvisionsMonth').val();
				let Week = $('#ProvisionsWeek').val();
				if (ProvisionsArray.length > 0) {
					$.ajax({
						url : "<?php echo base_url() . 'AJAX_removePayrollProvisions';?>",
						method : "POST",
						data: {ProvisionsArray: JSON.stringify(ProvisionsArray), ApplicantID: ApplicantID, Year: Year, Month: Month, Week: Week, Mode: Mode},
						dataType: "html",
						success: function(data){
							console.log('success');
							// $("body").html(data);

						}
					})
				}
				$('.provision-input').each(function() {
					let ProvisionName = $(this).find(".provision-name").val();
					let Amount = $(this).find(".provision-amount").val();
					let ID = $(this).find(".provision-id").val();
					let totalCounter = 0;
					$.ajax({
						url : "<?php echo base_url() . 'AJAX_insertPayrollProvisions';?>",
						method : "POST",
						data: {ID: ID, ApplicantID: ApplicantID, ProvisionName: ProvisionName, Amount: Amount, Year: Year, Month: Month, Week: Week, Mode: Mode},
						dataType: "html",
						success: function(data){
							console.log('success');
							console.log(ApplicantID);
							console.log(Year);
							console.log(Month);
							console.log(Week);
							$("#LoadProvisionContainer").html(data);
							$('.save-provision-btn').closest('.save-provision-btn').find('i').addClass('fas');
							$('.save-provision-btn').closest('.save-provision-btn').find('i').addClass('fa-check');
							$('.save-provision-btn').closest('.save-provision-btn').addClass('btn-success');
							$('.save-provision-btn').closest('.save-provision-btn').removeClass('btn-secondary');
							$('.save-provision-btn').closest('.save-provision-btn').find('i').removeClass('spinner-border');
							$('.save-provision-btn').closest('.save-provision-btn').find('i').removeClass('spinner-border-sm');
							$('.new-provision-row').hide();
							$('#NewProvisionContainer').children().empty();
							$('.provision-input').each(function() {
								totalCounter = totalCounter + parseFloat($(this).find('.provision-amount').val());
								console.log(totalCounter);
								$('.provisions-btn[data-applicantid=' + ApplicantID + '][data-year=' + Year + '][data-month=' + Month + '][data-week=' + Week + ']').data('loanstotal', totalCounter);
							})
							AJAX_onCall = false;
						}
					})
				})
			}
		});
		$('.new-provision-add-btn').on('click', function () {
			$('.new-provision-row').show();
			$('.new-provision-row').animate({opacity: '1.0'});
			$('#NewProvisionContainer').append('<div class="form-row provision-input w-100"><input class="form-control provision-id" type="hidden" value="-1"><div class="col-sm-7 mt-1"><input class="form-control provision-name" type="text" name="ProvisionName[]"></div><div class="col-sm-4 mt-1"><input class="form-control provision-amount" type="number" name="ProvisionAmount[]"></div><div class="col-sm-1 mt-1"><button class="form-control provision-discard btn-danger" type="button" data-toggle="tooltip" data-placement="top" data-html="true" title="Discard?"><i class="fas fa-times" style="font-size: 12px; margin-left: -4px;"></i></button></div></div>')
		});
		$('.provisions-btn').on('click', function () {
			$('#ProvisionsApplicantID').text($(this).data('applicantid'));
			$('#ProvisionsApplicantName').text($(this).data('applicantname'));
			let ApplicantURL = "ViewEmployee?id=" + $(this).data('applicantid');
			$('#ProvisionsApplicantName').attr('href', ApplicantURL);
			$('#ProvisionsYear').val($(this).data('year'));
			$('#ProvisionsMonth').val($(this).data('month'));
			$('#ProvisionsWeek').val($(this).data('week'));
			// AJAX Call
			let ApplicantID = $('#ProvisionsApplicantID').text();
			let Year = $('#ProvisionsYear').val();
			let Month = $('#ProvisionsMonth').val();
			let Week = $('#ProvisionsWeek').val();
			let totalCounter = 0;
			$.ajax({
				url : "<?php echo base_url() . 'AJAX_showPayrollProvisions';?>",
				method : "POST",
				data: {ApplicantID: ApplicantID, Year: Year, Month: Month, Week: Week, Mode: Mode},
				dataType: "html",
				success: function(response){
					$("#LoadProvisionContainer").html(response);
					$('.ajax-load-container').show();
					$('.provision-input').each(function() {
						totalCounter = totalCounter + parseFloat($(this).find('.provision-amount').val());
						$('#ProvisionTotal').text(totalCounter);
					})
			}

			});
		});
		// Provision discard
		$('body').on('click', '.provision-discard', function () { // Using body for dynamic appends.
			$(this).parents('.provision-input').remove();
			if ($('#NewProvisionContainer > div').length <= 0) {
				$('.new-provision-row').fadeOut('fast');
			}
		});
		$(".payroll-weekrow-input").bind("input", function () {
			if ($(this).val()) {
				$(this).closest(".payroll-week-row").find('.payroll-weekrow-btn').show();
			} else {
				$(this).closest(".payroll-week-row").find('.payroll-weekrow-btn').hide();
			}
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
				data : {Input: ptwInput, ApplicantID: ptwApplicantID, ClientID: ptwClientID, Year: ptwYear, Month: ptwMonth, Week: ptwWeek, Mode: Mode},
				success: function(data){
					location.reload();
				}

			});
		});
		$('.individual-payslip-btn').on('click', function() {
			let applicantID = $(this).data('applicantid');
			let modeRaw = $(this).data('periodmode');
			switch (modeRaw) {
				case 0:
					mode = 'Weekly';
					break;
				case 1:
					mode = 'Semi-monthly';
					break;
				case 2:
					mode = 'Monthly';
					break;
				default:
					mode = 'Weekly';
					break;
			}
			$('#PayslipApplicantID').val(applicantID);
			$('#PayslipModeSelect option[value=' + mode + ']').attr('selected', 'selected');
			console.log(modeRaw);
		});
		$('.payslip-inputs').bind('input', function() {
			let payslipApplicantID = $('#PayslipApplicantID').val();
			let payslipMode = $('#PayslipModeSelect').val();
			let payslipFromDate = new Date($('#PayslipFromDate').val());
			let payslipFromDateDay = payslipFromDate.getUTCDate();
			let payslipFromDateMonth = payslipFromDate.getUTCMonth() + 1;
			let payslipFromDateYear = payslipFromDate.getFullYear();
			let payslipToDate = new Date($('#PayslipToDate').val());
			let payslipToDateDay = payslipToDate.getUTCDate();
			let payslipToDateMonth = payslipToDate.getUTCMonth() + 1;
			let payslipToDateYear = payslipToDate.getFullYear();
			$('#GeneratePayslipLink').attr('href', 'GeneratePayslip?id=' + payslipApplicantID + '&mode=' + payslipMode + '&from_day=' + payslipFromDateDay + '&from_month=' + payslipFromDateMonth + '&from_year=' + payslipFromDateYear + '&to_day=' + payslipToDateDay + '&to_month=' + payslipToDateMonth + '&to_year=' + payslipToDateYear);
			if (Date.parse(payslipFromDate) && Date.parse(payslipToDate)) {
				$('.gpm-locked-group').hide();
				$('.gpm-valid-group').show();
			}
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
	.modal-body{
	    max-height: calc(100vh - 200px);
	    overflow-y: auto;
	}
	.btn-danger:focus{
		color: #ffffff !important;
	    background-color: #dc3545 !important;
	    opacity: 1;
	}
	.btn-secondary:focus{
		color: #ffffff !important;
	    background-color: #6c757d !important;
	    opacity: 1;
	}
</style>
</html>