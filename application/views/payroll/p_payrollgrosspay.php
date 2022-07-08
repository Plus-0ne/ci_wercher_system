<?php 

$T_Header;
require 'vendor/autoload.php';
use Carbon\Carbon;

$mode = $_GET['mode'] ?? 1;
$isSearching = $_GET['searching'] ?? false;

$now = new DateTime();
$fromDate = $now;
if (!empty($_GET['toDate'])) {
	$toDate = $_GET['toDate'];
} else {
	$toDate = $now->format('Y-m-d');
}
if (!empty($_GET['fromDate'])) {
	$fromDate = $_GET['fromDate'];	
} else {
	$fromDate = $fromDate->modify('-15 days');
	$fromDate = $fromDate->format('Y-m-d');
}

$rowCount = 1;

$date = new DateTime();
$currentDay = $date->format('d');
$currentYear = $date->format('Y');
$currentMonth = $date->format('m');
$currentMonthReadable = DateTime::createFromFormat('!m', $currentMonth);
$currentMonthReadable = $currentMonthReadable->format('F');

if (!$isSearching) {
	if ($mode == 0) {
		if ($currentDay <= 7) {
			$fromDate = $date->format('Y-m-01');
			$toDate = $date->format('Y-m-07');
		} else if ($currentDay > 7 && $currentDay <= 14) {
			$fromDate = $date->format('Y-m-08');
			$toDate = $date->format('Y-m-15');
		} else if ($currentDay > 15 && $currentDay <= 21) {
			$fromDate = $date->format('Y-m-16');
			$toDate = $date->format('Y-m-21');
		} else {
			$fromDate = $date->format('Y-m-21');
			$toDate = $date->format('Y-m-31');
		}
	} else if ($mode == 1) {
		if ($currentDay <= 15) {
			$fromDate = $date->format('Y-m-01');
			$toDate = $date->format('Y-m-16');
		} else {
			$fromDate = $date->format('Y-m-16');
			$toDate = $date->format('Y-m-31');
		}
	} else {
		$fromDate = $date->format('Y-m-01');
		$toDate = $date->format('Y-m-31');
	}
}

// Identifier
$ClientID = $_GET['id'] ?? 0;
$Mode = $_GET['mode'] ?? 0;
if (!empty($_GET['year']) && !$_GET['year']) {
	$Year = $_GET['year'];
} else {
	$Year = $currentYear;
}
if (!empty($_GET['month']) && $_GET['month']) {
	$Month = $_GET['month'];
} else {
	$Month = $currentMonth;
}

?>
<style>
	table {
		font-size: 13px;
	}
	.table td {
		padding: 0.1rem;
		border-bottom: 1px solid black;
		border-left: 1px solid black;
	}
	.table tr:first-child td {
		border-top: 1px solid black;
	}
	.table td:last-child {
		border-right: 1px solid black;
	}
	.table th {
		border-top: 1px solid black;
		border-bottom: 1px solid black;
		border-left: 1px solid black;
	}
	.table th:last-child {
		border-right: 1px solid black;
	}
	@media print {
		table {
			font-size: 9px;
		}	
		@page { 
	        size: landscape;
	    }
	}
</style>
<body>
	<div class="wrapper wercher-background-lowpoly">
		<?php $this->load->view('_template/users/u_sidebar'); ?>
		<div id="content" class="ncontent">
			<div class="container-fluid">
				<?php $this->load->view('_template/users/u_notifications'); //TODO: Limit the bell to HR access? ?>
				<div class="col-12 col-sm-12 tabs">
					<ul>
						<li><a href="<?php echo base_url() ?>Payroll">Salary (<?php echo $ShowClients->num_rows()?>)</a></li>
						<li><a href="<?php echo base_url() ?>Receivables">Receivables</a></li>
						<li><a href="<?php echo base_url() ?>Loans">Loans</a></li>
						<li><a href="<?php echo base_url() ?>Provisions">Provisions</a></li>
						<li><a href="<?php echo base_url() ?>PayrollAttendance">Attendance</a></li>
						<li class="tabs-active"><a href="<?php echo base_url() ?>PayrollGrossPay">Gross Pay</a></li>
						<li><a href="<?php echo base_url() ?>PayrollMandatoryDed">Mandatory Ded.</a></li>
						<li><a href="<?php echo base_url() ?>PayrollNetPay">Net Pay</a></li>
						<li><a href="<?php echo base_url() ?>PayrollSummary">Summary</a></li>
					</ul>
				</div>
				<div class="row rcontent">
					<div class="col-8">
						<?php echo form_open(base_url().'PayrollAttendance','method="GET" name="PayrollFilterForm"');?>
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
										<option value="0" <?php if ($mode == 0) { echo 'selected'; } ?>>Weekly</option>
										<option value="1" <?php if ($mode == 1) { echo 'selected'; } ?>>Semi-monthly</option>
										<option value="2" <?php if ($mode == 2) { echo 'selected'; } ?>>Monthly</option>
									</select>
								</div>
								<!-- Date -->
								<div class="form-group col-sm-4 col-md-2">
									<input type="date" class="form-control" name="fromDate" value="<?=$fromDate;?>">
								</div>
								<div class="form-group col-sm-1 col-md-1">
									<input type="text" class="form-control" value="to" disabled style="width: 50px;">
								</div>
								<div class="form-group col-sm-4 col-md-2">
									<input type="date" class="form-control" name="toDate" style="margin-left: -28px;" value="<?=$toDate;?>">
								</div>
								<!-- Filter -->
								<div class="form-group col-sm-6 col-md-2">
									<button type="submit" class="btn btn-primary" style="margin-left: -28px;"><i class="fas fa-search"></i> Find</button>
								</div>
								<div class="form-group col-sm-6 col-md-1">
									<a href="<?=base_url();?>PayrollAttendance" class="btn btn-primary" style="margin-left: -110px;"><i class="fas fa-redo" style="margin-right: -1px;"></i></a>
									<button type="button" class="filters-group-btn btn btn-primary"><i class="fa fa-filter" style="margin-right: -1px;"></i></button>
								</div>
								<input type="hidden" name="searching" value="true">
							</div>
						<?php echo form_close();?>
					</div>
					<div class="col-4">
						<div class="text-left">
							<!-- <input class="form-control" type="date" name="fromDate" value="<?=$fromDate;?>">
						 	<input class="form-control" type="date" name="toDate" value="<?=$toDate;?>"> -->
						</div>
						<div class="text-right">
							<span class="input-bootstrap">
								<i class="sorting-table-icon spinner-border spinner-border-sm mr-2"></i>
								<input id="DTSearch" type="search" class="input-bootstrap" placeholder="Sorting table..." readonly>
							</span>
							<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ExportModal"><i class="fas fa-download"></i> Export</button>
						</div>
					</div>
					<div class="col-sm-12 filters-group" style="display: none;">
						<div class="col-sm-2">
							<h6>FILTER COLUMNS</h6>
							<div class="row">
								<div class="col-sm-6">
									Name:
								</div>
								<div class="col-sm-6">
									<button type="button" class="filters-btn btn btn-sm btn-success" data-active="true" data-target="name" style="width: 40px;"><i class="fa fa-check" style="margin-right: -1px;"></i></button>
								</div>
								<div class="col-sm-6">
									Rate:
								</div>
								<div class="col-sm-6">
									<button type="button" class="filters-btn btn btn-sm btn-success" data-active="true" data-target="rate" style="width: 40px;"><i class="fa fa-check" style="margin-right: -1px;"></i></button>
								</div>
								<div class="col-sm-6">
									Regular Day:
								</div>
								<div class="col-sm-6">
									<button type="button" class="filters-btn btn btn-sm btn-success" data-active="true" data-target="reg" style="width: 40px;"><i class="fa fa-check" style="margin-right: -1px;"></i></button>
								</div>
								<div class="col-sm-6">
									Rest Day:
								</div>
								<div class="col-sm-6">
									<button type="button" class="filters-btn btn btn-sm btn-success" data-active="true" data-target="rest" style="width: 40px;"><i class="fa fa-check" style="margin-right: -1px;"></i></button>
								</div>
								<div class="col-sm-6">
									SPH:
								</div>
								<div class="col-sm-6">
									<button type="button" class="filters-btn btn btn-sm btn-success" data-active="true" data-target="sph" style="width: 40px;"><i class="fa fa-check" style="margin-right: -1px;"></i></button>
								</div>
								<div class="col-sm-6">
									SPHRD:
								</div>
								<div class="col-sm-6">
									<button type="button" class="filters-btn btn btn-sm btn-success" data-active="true" data-target="sphrd" style="width: 40px;"><i class="fa fa-check" style="margin-right: -1px;"></i></button>
								</div>
								<div class="col-sm-6">
									NH100%:
								</div>
								<div class="col-sm-6">
									<button type="button" class="filters-btn btn btn-sm btn-success" data-active="true" data-target="nh100" style="width: 40px;"><i class="fa fa-check" style="margin-right: -1px;"></i></button>
								</div>
								<div class="col-sm-6">
									NH200%:
								</div>
								<div class="col-sm-6">
									<button type="button" class="filters-btn btn btn-sm btn-success" data-active="true" data-target="nh200" style="width: 40px;"><i class="fa fa-check" style="margin-right: -1px;"></i></button>
								</div>
								<div class="col-sm-6">
									NHRD:
								</div>
								<div class="col-sm-6">
									<button type="button" class="filters-btn btn btn-sm btn-success" data-active="true" data-target="nhrd" style="width: 40px;"><i class="fa fa-check" style="margin-right: -1px;"></i></button>
								</div>
								<div class="col-sm-6">
									Allowance:
								</div>
								<div class="col-sm-6">
									<button type="button" class="filters-btn btn btn-sm btn-success" data-active="true" data-target="allowance" style="width: 40px;"><i class="fa fa-check" style="margin-right: -1px;"></i></button>
								</div>
								<div class="col-sm-6">
									SIL Availment:
								</div>
								<div class="col-sm-6">
									<button type="button" class="filters-btn btn btn-sm btn-success" data-active="true" data-target="sil" style="width: 40px;"><i class="fa fa-check" style="margin-right: -1px;"></i></button>
								</div>
								<div class="col-sm-6">
									Total:
								</div>
								<div class="col-sm-6">
									<button type="button" class="filters-btn btn btn-sm btn-success" data-active="true" data-target="total" style="width: 40px;"><i class="fa fa-check" style="margin-right: -1px;"></i></button>
								</div>
								<div class="col-sm-6">
									13th Month:
								</div>
								<div class="col-sm-6">
									<button type="button" class="filters-btn btn btn-sm btn-success" data-active="true" data-target="13th" style="width: 40px;"><i class="fa fa-check" style="margin-right: -1px;"></i></button>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-12">
						<div class="table-responsive pt-2 pl-2 pr-2">
							<table id="ListClients" class="table PrintOut" style="width: 100%;">
								<thead>
									<tr class="text-center">
										<th class="name-group"></th>
										<th class="rate-group"></th>
										<th class="reg-group" colspan="4">REGULAR DAY</th>
										<th class="rest-group" colspan="4">REST DAY</th>
										<th class="sph-group" colspan="4">SPH</th>
										<th class="sphrd-group" colspan="4">SPHRD</th>
										<th class="nh100-group">NH100%</th>
										<th class="nh200-group" colspan="4">NH200%</th>
										<th class="nhrd-group" colspan="4">NHRD</th>
										<th class="allowance-group"></th>
										<th class="sil-group"></th>
										<th class="total-group">TOTAL</th>
										<th class="13th-group"></th>
									</tr>
									<tr class="align-middle">
										<th class="name-group" style="width: 300px;">NAME</th>
										<th class="rate-group" style="width:">RATE</th>
										<!-- regular day -->
										<th class="reg-group">REG</th>
										<th class="reg-group">NP</th>
										<th class="reg-group">OT</th>
										<th class="reg-group">NPOT</th>
										<!-- rest day -->
										<th class="rest-group">REG</th>
										<th class="rest-group">NP</th>
										<th class="rest-group">OT</th>
										<th class="rest-group">NPOT</th>
										<!-- sph -->
										<th class="sph-group">REG</th>
										<th class="sph-group">NP</th>
										<th class="sph-group">OT</th>
										<th class="sph-group">NPOT</th>
										<!-- sphrd -->
										<th class="sphrd-group">REG</th>
										<th class="sphrd-group">NP</th>
										<th class="sphrd-group">OT</th>
										<th class="sphrd-group">NPOT</th>
										<!-- nh100% -->
										<th class="nh100-group">100%</th>
										<!-- nh200% -->
										<th class="nh200-group">REG</th>
										<th class="nh200-group">NP</th>
										<th class="nh200-group">OT</th>
										<th class="nh200-group">NPOT</th>
										<!-- nhrd -->
										<th class="nhrd-group">REG</th>
										<th class="nhrd-group">NP</th>
										<th class="nhrd-group">OT</th>
										<th class="nhrd-group">NPOT</th>
										<!-- others -->
										<th class="allowance-group">ALLOWANCE</th>
										<th class="sil-group">SIL AVAILMENT</th>
										<th class="total-group">LABOR COST</th>
										<th class="13th-group">13TH MONTH</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($get_employee->result_array() as $row): 
										// Hours checker
										$salaryType = $row['SalaryType'] ?? 'Daily';
										switch ($salaryType) {
											case 'Daily':
												$Mode = 'Weekly';
												break;
											case 'Monthly':
												$Mode = 'Monthly';
												break;
											case 'Semi-Monthly':
												$Mode = 'Semi-Monthly';
												break;
											default:
												$Mode = 'Daily';
												break;
										}
										$ApplicantID = $row['ApplicantID'];
										$SalaryExpected = $row['SalaryExpected'];
										$totalHours = 0;
										$regularHours = number_format($this->Model_Selects->GetPayslipRegularHours($ApplicantID, $Mode, $fromDate, $toDate), 2, '.', '') ?? 0;
										$totalHours += $regularHours;
										$regularOvertime = number_format($this->Model_Selects->GetPayslipRegularOvertime($ApplicantID, $Mode, $fromDate, $toDate), 2, '.', '');
										$totalHours += $regularOvertime;
										$regularNightHours = number_format($this->Model_Selects->GetPayslipRegularNightHours($ApplicantID, $Mode, $fromDate, $toDate), 2, '.', '');
										$totalHours += $regularNightHours;
										$regularNightOvertime = number_format($this->Model_Selects->GetPayslipRegularNightOvertime($ApplicantID, $Mode, $fromDate, $toDate), 2, '.', '');
										$totalHours += $regularNightOvertime;
										$restDayHours = number_format($this->Model_Selects->GetPayslipRestDayHours($ApplicantID, $Mode, $fromDate, $toDate), 2, '.', '');
										$totalHours += $restDayHours;
										$restDayOvertime = number_format($this->Model_Selects->GetPayslipRestDayOvertime($ApplicantID, $Mode, $fromDate, $toDate), 2, '.', '');
										$totalHours += $restDayOvertime;
										$restDayNightHours = number_format($this->Model_Selects->GetPayslipRestDayNightHours($ApplicantID, $Mode, $fromDate, $toDate), 2, '.', '');
										$totalHours += $restDayNightHours;
										$restDayNightOvertime = number_format($this->Model_Selects->GetPayslipRestDayNightOvertime($ApplicantID, $Mode, $fromDate, $toDate), 2, '.', '');
										$totalHours += $restDayNightOvertime;
										// ~ special holiday
										$specialHolidayHours = number_format($this->Model_Selects->GetPayslipSpecialHolidayHours($ApplicantID, $Mode, $fromDate, $toDate), 2, '.', '');
										$totalHours += $specialHolidayHours;
										$specialHolidayOvertime = number_format($this->Model_Selects->GetPayslipSpecialHolidayOvertime($ApplicantID, $Mode, $fromDate, $toDate), 2, '.', '');
										$totalHours += $specialHolidayHours;
										$specialHolidayNightHours = number_format($this->Model_Selects->GetPayslipSpecialHolidayNightHours($ApplicantID, $Mode, $fromDate, $toDate), 2, '.', '');
										$totalHours += $specialHolidayNightHours;
										$specialHolidayNightOvertime = number_format($this->Model_Selects->GetPayslipSpecialHolidayNightOvertime($ApplicantID, $Mode, $fromDate, $toDate), 2, '.', '');
										$totalHours += $specialHolidayNightOvertime;
										// ~ special holiday & rest day
										$SPHRDHours = number_format($this->Model_Selects->GetPayslipSPHRDHours($ApplicantID, $Mode, $fromDate, $toDate), 2, '.', '');
										$totalHours += $SPHRDHours;
										$SPHRDOvertime = number_format($this->Model_Selects->GetPayslipSPHRDOvertime($ApplicantID, $Mode, $fromDate, $toDate), 2, '.', '');
										$totalHours += $SPHRDOvertime;
										$SPHRDNightHours = number_format($this->Model_Selects->GetPayslipSPHRDNightHours($ApplicantID, $Mode, $fromDate, $toDate), 2, '.', '');
										$totalHours += $SPHRDNightHours;
										$SPHRDNightOvertime = number_format($this->Model_Selects->GetPayslipSPHRDNightOvertime($ApplicantID, $Mode, $fromDate, $toDate), 2, '.', '');
										$totalHours += $SPHRDNightOvertime;
										// ~ national holiday 100%
										$NHOHPHoursRaw = 0; // National Holiday One Hundred Percent Hours
										$NHOHPHours = 0;
										$NationalHolidayOneHundredHours = $this->Model_Selects->GetPayslipNationalHolidayOneHundredHours($ApplicantID, $Mode, $fromDate, $toDate);
										if ($NationalHolidayOneHundredHours->num_rows() > 0) {
											$NHOHPHoursRaw = $NationalHolidayOneHundredHours->num_rows();
											$NHOHPHours = number_format(($NHOHPHoursRaw * 8), 2, '.', '');
										}
										$totalHours += $NHOHPHours;
										// ~ national holiday 200%
										$NationalHolidayHours = number_format($this->Model_Selects->GetPayslipNationalHolidayHours($ApplicantID, $Mode, $fromDate, $toDate), 2, '.', '');
										$totalHours += $NationalHolidayHours;
										$NationalHolidayOvertime = number_format($this->Model_Selects->GetPayslipNationalHolidayOvertime($ApplicantID, $Mode, $fromDate, $toDate), 2, '.', '');
										$totalHours += $NationalHolidayOvertime;
										$NationalHolidayNightHours = number_format($this->Model_Selects->GetPayslipNationalHolidayNightHours($ApplicantID, $Mode, $fromDate, $toDate), 2, '.', '');
										$totalHours += $NationalHolidayNightHours;
										$NationalHolidayNightOvertime = number_format($this->Model_Selects->GetPayslipNationalHolidayNightOvertime($ApplicantID, $Mode, $fromDate, $toDate), 2, '.', '');
										$totalHours += $NationalHolidayNightOvertime;
										// ~ national holiday & rest day
										$NHRDHours = number_format($this->Model_Selects->GetPayslipNHRDHours($ApplicantID, $Mode, $fromDate, $toDate), 2, '.', '');
										$totalHours += $NHRDHours;
										$NHRDOvertime = number_format($this->Model_Selects->GetPayslipNHRDOvertime($ApplicantID, $Mode, $fromDate, $toDate), 2, '.', '');
										$totalHours += $NHRDOvertime;
										$NHRDNightHours = number_format($this->Model_Selects->GetPayslipNHRDNightHours($ApplicantID, $Mode, $fromDate, $toDate), 2, '.', '');
										$totalHours += $NHRDNightHours;
										$NHRDNightOvertime = number_format($this->Model_Selects->GetPayslipNHRDNightOvertime($ApplicantID, $Mode, $fromDate, $toDate), 2, '.', '');
										$totalHours += $NHRDNightOvertime;

										if ($regularHours <= 0) {
											$regularHours = '-';
										}
										if ($regularNightHours <= 0) {
											$regularNightHours = '-';
										}
										if ($regularOvertime <= 0) {
											$regularOvertime = '-';
										}
										if ($regularNightOvertime <= 0) {
											$regularNightOvertime = '-';
										}
										if ($restDayHours <= 0) {
											$restDayHours = '-';
										}
										if ($restDayNightHours <= 0) {
											$restDayNightHours = '-';
										}
										if ($restDayOvertime <= 0) {
											$restDayOvertime = '-';
										}
										if ($restDayNightOvertime <= 0) {
											$restDayNightOvertime = '-';
										}
										if ($specialHolidayHours <= 0) {
											$specialHolidayHours = '-';
										}
										if ($specialHolidayNightHours <= 0) {
											$specialHolidayNightHours = '-';
										}
										if ($specialHolidayOvertime <= 0) {
											$specialHolidayOvertime = '-';
										}
										if ($specialHolidayNightOvertime <= 0) {
											$specialHolidayNightOvertime = '-';
										}
										if ($NHOHPHours <= 0) {
											$NHOHPHours = '-';
										}
										if ($NationalHolidayHours <= 0) {
											$NationalHolidayHours = '-';
										}
										if ($NationalHolidayNightHours <= 0) {
											$NationalHolidayNightHours = '-';
										}
										if ($NationalHolidayOvertime <= 0) {
											$NationalHolidayOvertime = '-';
										}
										if ($NationalHolidayNightOvertime <= 0) {
											$NationalHolidayNightOvertime = '-';
										}
										if ($NHRDHours <= 0) {
											$NHRDHours = '-';
										}
										if ($NHRDNightHours <= 0) {
											$NHRDNightHours = '-';
										}
										if ($NHRDOvertime <= 0) {
											$NHRDOvertime = '-';
										}
										if ($NHRDNightOvertime <= 0) {
											$NHRDNightOvertime = '-';
										}

										// Gross Pay
										// ~ regular
										$EarningsTotal = 0;
										$NightPremiumTotal = 0;
										$RegularGrossPay = number_format($this->Model_Selects->GetPayslipRegularGrossPay($ApplicantID, $Mode, $fromDate, $toDate), 1, '.', '');
										if ($RegularGrossPay <= 0) {
											$RegularGrossPay = '-';
										} else {
											$EarningsTotal = $EarningsTotal + $RegularGrossPay;
										}
										$RegularOvertimeGrossPay = number_format($this->Model_Selects->GetPayslipRegularOvertimeGrossPay($ApplicantID, $Mode, $fromDate, $toDate), 2, '.', '');
										if ($RegularOvertimeGrossPay <= 0) {
											$RegularOvertimeGrossPay = '-';
										} else {
											$EarningsTotal = $EarningsTotal + $RegularOvertimeGrossPay;
										}
										$RegularNPGrossPay = number_format($this->Model_Selects->GetPayslipRegularNPGrossPay($ApplicantID, $Mode, $fromDate, $toDate), 2, '.', '');
										if ($RegularNPGrossPay <= 0) {
											$RegularNPGrossPay = '-';
										} else {
											$NightPremiumTotal = $NightPremiumTotal + $RegularNPGrossPay;
										}
										$RegularNPOvertimeGrossPay = number_format($this->Model_Selects->GetPayslipRegularNPOvertimeGrossPay($ApplicantID, $Mode, $fromDate, $toDate), 2, '.', '');
										if ($RegularNPOvertimeGrossPay <= 0) {
											$RegularNPOvertimeGrossPay = '-';
										} else {
											$NightPremiumTotal = $NightPremiumTotal + $RegularNPOvertimeGrossPay;
										}
										// ~ rest day
										$RestDayGrossPay = number_format($this->Model_Selects->GetPayslipRestDayGrossPay($ApplicantID, $Mode, $fromDate, $toDate), 2, '.', '');
										if ($RestDayGrossPay <= 0) {
											$RestDayGrossPay = '-';
										} else {
											$EarningsTotal = $EarningsTotal + $RestDayGrossPay;
										}
										$RestDayOvertimeGrossPay = number_format($this->Model_Selects->GetPayslipRestDayOvertimeGrossPay($ApplicantID, $Mode, $fromDate, $toDate), 2, '.', '');
										if ($RestDayOvertimeGrossPay <= 0) {
											$RestDayOvertimeGrossPay = '-';
										} else {
											$EarningsTotal = $EarningsTotal + $RestDayOvertimeGrossPay;
										}
										$RestDayNPGrossPay = number_format($this->Model_Selects->GetPayslipRestDayNPGrossPay($ApplicantID, $Mode, $fromDate, $toDate), 2, '.', '');
										if ($RestDayNPGrossPay <= 0) {
											$RestDayNPGrossPay = '-';
										} else {
											$NightPremiumTotal = $NightPremiumTotal + $RestDayNPGrossPay;
										}
										$RestDayNPOvertimeGrossPay = number_format($this->Model_Selects->GetPayslipRestDayNPOvertimeGrossPay($ApplicantID, $Mode, $fromDate, $toDate), 2, '.', '');
										if ($RestDayNPOvertimeGrossPay <= 0) {
											$RestDayNPOvertimeGrossPay = '-';
										} else {
											$NightPremiumTotal = $NightPremiumTotal + $RestDayNPOvertimeGrossPay;
										}
										// ~ special holiday
										$SpecialHolidayGrossPay = number_format($this->Model_Selects->GetPayslipSpecialHolidayGrossPay($ApplicantID, $Mode, $fromDate, $toDate), 2, '.', '');
										if ($SpecialHolidayGrossPay <= 0) {
											$SpecialHolidayGrossPay = '-';
										} else {
											$EarningsTotal = $EarningsTotal + $SpecialHolidayGrossPay;
										}
										$SpecialHolidayOvertimeGrossPay = number_format($this->Model_Selects->GetPayslipSpecialHolidayOvertimeGrossPay($ApplicantID, $Mode, $fromDate, $toDate), 2, '.', '');
										if ($SpecialHolidayOvertimeGrossPay <= 0) {
											$SpecialHolidayOvertimeGrossPay = '-';
										} else {
											$EarningsTotal = $EarningsTotal + $SpecialHolidayOvertimeGrossPay;
										}
										$SpecialHolidayNPGrossPay = number_format($this->Model_Selects->GetPayslipSpecialHolidayNPGrossPay($ApplicantID, $Mode, $fromDate, $toDate), 2, '.', '');
										if ($SpecialHolidayNPGrossPay <= 0) {
											$SpecialHolidayNPGrossPay = '-';
										} else {
											$NightPremiumTotal = $NightPremiumTotal + $SpecialHolidayNPGrossPay;
										}
										$SpecialHolidayNPOvertimeGrossPay = number_format($this->Model_Selects->GetPayslipSpecialHolidayNPOvertimeGrossPay($ApplicantID, $Mode, $fromDate, $toDate), 2, '.', '');
										if ($SpecialHolidayNPOvertimeGrossPay <= 0) {
											$SpecialHolidayNPOvertimeGrossPay = '-';
										} else {
											$NightPremiumTotal = $NightPremiumTotal + $SpecialHolidayNPOvertimeGrossPay;
										}
										// ~ special holiday & rest day
										$SPHRDGrossPay = number_format($this->Model_Selects->GetPayslipSPHRDGrossPay($ApplicantID, $Mode, $fromDate, $toDate), 2, '.', '');
										if ($SPHRDGrossPay <= 0) {
											$SPHRDGrossPay = '-';
										} else {
											$EarningsTotal = $EarningsTotal + $SPHRDGrossPay;
										}
										$SPHRDOvertimeGrossPay = number_format($this->Model_Selects->GetPayslipSPHRDOvertimeGrossPay($ApplicantID, $Mode, $fromDate, $toDate), 2, '.', '');
										if ($SPHRDOvertimeGrossPay <= 0) {
											$SPHRDOvertimeGrossPay = '-';
										} else {
											$EarningsTotal = $EarningsTotal + $SPHRDOvertimeGrossPay;
										}
										$SPHRDNPGrossPay = number_format($this->Model_Selects->GetPayslipSPHRDNPGrossPay($ApplicantID, $Mode, $fromDate, $toDate), 2, '.', '');
										if ($SPHRDNPGrossPay <= 0) {
											$SPHRDNPGrossPay = '-';
										} else {
											$NightPremiumTotal = $NightPremiumTotal + $SPHRDNPGrossPay;
										}
										$SPHRDNPOvertimeGrossPay = number_format($this->Model_Selects->GetPayslipSPHRDNPOvertimeGrossPay($ApplicantID, $Mode, $fromDate, $toDate), 2, '.', '');
										if ($SPHRDNPOvertimeGrossPay <= 0) {
											$SPHRDNPOvertimeGrossPay = '-';
										} else {
											$NightPremiumTotal = $NightPremiumTotal + $SPHRDNPOvertimeGrossPay;
										}
										// ~ national holiday 100%
										$NHOHPHoursRaw = 0; // National Holiday One Hundred Percent Hours
										$NHOHPHours = 0;
										$NationalHolidayOneHundredHours = $this->Model_Selects->GetPayslipNationalHolidayOneHundredHours($ApplicantID, $Mode, $fromDate, $toDate);
										if ($NationalHolidayOneHundredHours->num_rows() > 0) {
											$NHOHPHoursRaw = $NationalHolidayOneHundredHours->num_rows();
											$NHOHPHours = number_format(($NHOHPHoursRaw * 8), 2, '.', '');
										}
										$NHOHPGrossPay = number_format(($NHOHPHoursRaw * $SalaryExpected), 2, '.', '');
										if ($NHOHPHours <= 0) {
											$NHOHPHours = '-';
										} else {
											$NHOHPHours = $NHOHPHours / 8;
										}
										if ($NHOHPGrossPay <= 0) {
											$NHOHPGrossPay = '-';
										} else {
											$EarningsTotal = $EarningsTotal + $NHOHPGrossPay;
										}
										// ~ national holiday 200%
										$NationalHolidayGrossPay = number_format($this->Model_Selects->GetPayslipNationalHolidayGrossPay($ApplicantID, $Mode, $fromDate, $toDate), 2, '.', '');
										if ($NationalHolidayGrossPay <= 0) {
											$NationalHolidayGrossPay = '-';
										} else {
											$EarningsTotal = $EarningsTotal + $NationalHolidayGrossPay;
										}
										$NationalHolidayOvertimeGrossPay = number_format($this->Model_Selects->GetPayslipNationalHolidayOvertimeGrossPay($ApplicantID, $Mode, $fromDate, $toDate), 2, '.', '');
										if ($NationalHolidayOvertimeGrossPay <= 0) {
											$NationalHolidayOvertimeGrossPay = '-';
										} else {
											$EarningsTotal = $EarningsTotal + $NationalHolidayOvertimeGrossPay;
										}
										$NationalHolidayNPGrossPay = number_format($this->Model_Selects->GetPayslipNationalHolidayNPGrossPay($ApplicantID, $Mode, $fromDate, $toDate), 2, '.', '');
										if ($NationalHolidayNPGrossPay <= 0) {
											$NationalHolidayNPGrossPay = '-';
										} else {
											$NightPremiumTotal = $NightPremiumTotal + $NationalHolidayNPGrossPay;
										}
										$NationalHolidayNPOvertimeGrossPay = number_format($this->Model_Selects->GetPayslipNationalHolidayNPOvertimeGrossPay($ApplicantID, $Mode, $fromDate, $toDate), 2, '.', '');
										if ($NationalHolidayNPOvertimeGrossPay <= 0) {
											$NationalHolidayNPOvertimeGrossPay = '-';
										} else {
											$NightPremiumTotal = $NightPremiumTotal + $NationalHolidayNPOvertimeGrossPay;
										}
										// ~ national holiday & rest day
										$NHRDGrossPay = number_format($this->Model_Selects->GetPayslipNHRDGrossPay($ApplicantID, $Mode, $fromDate, $toDate), 2, '.', '');
										if ($NHRDGrossPay <= 0) {
											$NHRDGrossPay = '-';
										} else {
											$EarningsTotal = $EarningsTotal + $NHRDGrossPay;
										}
										$NHRDOvertimeGrossPay = number_format($this->Model_Selects->GetPayslipNHRDOvertimeGrossPay($ApplicantID, $Mode, $fromDate, $toDate), 2, '.', '');
										if ($NHRDOvertimeGrossPay <= 0) {
											$NHRDOvertimeGrossPay = '-';
										} else {
											$EarningsTotal = $EarningsTotal + $NHRDOvertimeGrossPay;
										}
										$NHRDNPGrossPay = number_format($this->Model_Selects->GetPayslipNHRDNPGrossPay($ApplicantID, $Mode, $fromDate, $toDate), 2, '.', '');
										if ($NHRDNPGrossPay <= 0) {
											$NHRDNPGrossPay = '-';
										} else {
											$NightPremiumTotal = $NightPremiumTotal + $NHRDNPGrossPay;
										}
										$NHRDNPOvertimeGrossPay = number_format($this->Model_Selects->GetPayslipNHRDNPOvertimeGrossPay($ApplicantID, $Mode, $fromDate, $toDate), 2, '.', '');
										if ($NHRDNPOvertimeGrossPay <= 0) {
											$NHRDNPOvertimeGrossPay = '-';
										} else {
											$NightPremiumTotal = $NightPremiumTotal + $NHRDNPOvertimeGrossPay;
										}
										$GrossPayTotal = $EarningsTotal + $NightPremiumTotal;
										if ($GrossPayTotal < 0) {
											$GrossPayTotal = 0;
										}
										
										// Contract elapsed
										$cNow = Carbon::parse(date('Y-m-d h:i:s A'));
										$cStarts = Carbon::parse($row['DateStarted']);
										if ($row['Status'] != 'Employed (Permanent)') {
											$cEnds = Carbon::parse($row['DateEnds']);
										} else {
											$cEnds = Carbon::parse($row['SalaryDistDate']);
										}

										// 13th Month Pay Calculation
										if ($row['Status'] != 'Employed (Permanent)') {
											$cDiffInDays = $cNow->diffInDays($cStarts);
										} else {
											$cDiffInDays = $cNow->diffInDays($cStarts);
										}
										if ($cDiffInDays <= 0) {
											$cDiffInDays = 1;
										}
										$cDiffInMonths = $cNow->diffInMonths($cStarts);
										if ($cDiffInMonths > 1) {
											$isThirteenEligible = true;
										} else {
											$isThirteenEligible = false;
										}

										$date = new DateTime($row['AppliedOn']);
										$day = $date->format('Y-m-d');
										$day = DateTime::createFromFormat('Y-m-d', $day)->format('F d, Y');
										$hours = $date->format('h:i:s A');
										$elapsed = Carbon::parse($row['AppliedOn']);
										$sortAppliedOn = strtotime($row['AppliedOn']);

										$thumbnail = $row['ApplicantImage'];
										$thumbnailType = substr($thumbnail, -4);
										$thumbnail = substr($thumbnail, 0, -4);
										$thumbnail = $thumbnail . '_thumb' . $thumbnailType;
										// TODO: getimagesize() severely lags the server on large amount of fetches.
										// if(!getimagesize($thumbnail)) {
										// 	$thumbnail = $row['ApplicantImage'];
										// }

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
										$SalaryExpected = (int)$row['SalaryExpected'] ?? 0;
										$SalaryType = $row['SalaryType'] ?? 'Daily';
										// Payroll
										$totalWeeklyHours = 0;
										$totalSemiHours = 0;
										$totalMonthlyHours = 0;
										$getTotalWeeklyHours = $this->Model_Selects->GetTotalWeeklyHours($ApplicantID);
										$getTotalSemiHours = $this->Model_Selects->GetTotalSemiHours($ApplicantID);
										$getTotalMonthlyHours = $this->Model_Selects->GetTotalMonthlyHours($ApplicantID);
										if ($getTotalWeeklyHours->num_rows() > 0) {
											foreach ($getTotalWeeklyHours->result_array() as $brow) {
												$totalWeeklyHours = $brow['Total'];
											}
										}
										if ($getTotalSemiHours->num_rows() > 0) {
											foreach ($getTotalSemiHours->result_array() as $brow) {
												$totalSemiHours = $brow['Total'];
											}
										}
										if ($getTotalMonthlyHours->num_rows() > 0) {
											foreach ($getTotalMonthlyHours->result_array() as $brow) {
												$totalMonthlyHours = $brow['Total'];
											}
										}
										$totalWorkHours = $totalWeeklyHours + $totalSemiHours + $totalMonthlyHours;
										$totalWorkDays = round(($totalWorkHours / 8), 2);
										$totalWorkMonths = round(($totalWorkDays / 26.16667), 2);
										$totalWorkYears = round(($totalWorkMonths / 12), 1);

										$dailySalary = 0;
										$semiSalary = 0;
										$monthlySalary = 0;
										$annualSalary = 0;
										$thirteen = 0;
										$finalPay = 0;
										switch($SalaryType) {
											case 'Daily':
												$dailySalary = $SalaryExpected;
												$monthlySalary = $SalaryExpected * 26.16667;
												$semiSalary = $monthlySalary / 2;
												$annualSalary = $monthlySalary * 12;
												$thirteen = ($dailySalary * $totalWorkDays) / 12;
												$finalPay = ($annualSalary / 52) / 6;
												break;
											case 'Monthly':
												$dailySalary = $SalaryExpected / 26.16667;
												$monthlySalary = $SalaryExpected;
												$semiSalary = $monthlySalary / 2;
												$annualSalary = $SalaryExpected * 12;
												$thirteen = ($dailySalary * $totalWorkDays) / 12;
												$finalPay = ($monthlySalary * 12) / 313;
												break;
											case 'Total':
												$salaryInterval = 0;
												// Monthly salary
												$monthlySalary = $SalaryExpected / $cDiffInMonths;
												$semiSalary = $monthlySalary / 2;
												// Calculate to as daily salary instead of monthly salary
												$dailySalary = $SalaryExpected / $cDiffInDays;
												$thirteen = ($dailySalary * $totalWorkDays) / 12;
												break;
											default:
												$dailySalary = $SalaryExpected;
												$monthlySalary = $SalaryExpected * 26.16667;
												$semiSalary = $monthlySalary / 2;
												$annualSalary = $monthlySalary * 12;
												$thirteen = ($dailySalary * $totalWorkDays) / 12;
												$finalPay = ($annualSalary / 52) / 6;
												break;
										}
										$thirteen = number_format($thirteen, 2, '.', '');

										$seperationPay = ($monthlySalary / 2) * $totalWorkYears;
									?>
										<tr class="table-row-hover">
											<td class="name-group align-middle">
												<a href="ViewEmployee?id=<?php echo $row['ApplicantID']; ?>"<?php if($isFullNameHoverable): ?> data-toggle="tooltip" data-placement="top" data-html="true" title="<?php echo $fullNameHover; ?>"<?php endif; ?>><?php echo $fullName; ?></a>
											</td>
											<td class="rate-group align-middle">
												<?php
													$salary = $row['SalaryExpected'] ?? 0;
													$salaryType = $row['SalaryType'];
													$salaryText = '/ day';
													if ($salaryType) {
														switch ($salaryType) {
															case 'Daily':
																$salaryText = '/day';
																break;
															case 'Monthly':
																$salaryText = '/mo';
																break;
															case 'Semi-Monthly':
																$salaryText = '/semi';
																break;
															default:
																$salaryText = '/day';
																break;
														}
													}
													echo $salary . ' ' . $salaryText;
												?>
											</td>
											<!-- regular day -->
											<td class="reg-group text-center align-middle">
												<?php
													echo $RegularGrossPay;
												?>
											</td>
											<td class="reg-group text-center align-middle">
												<?php
													echo $RegularNPGrossPay;
												?>
											</td>
											<td class="reg-group text-center align-middle">
												<?php
													echo $RegularOvertimeGrossPay;
												?>
											</td>
											<td class="reg-group text-center align-middle">
												<?php
													echo $RegularNPOvertimeGrossPay;
												?>
											</td>
											<!-- rest day -->
											<td class="rest-group text-center align-middle">
												<?php
													echo $RestDayGrossPay;
												?>
											</td>
											<td class="rest-group text-center align-middle">
												<?php
													echo $RestDayNPGrossPay;
												?>
											</td>
											<td class="rest-group text-center align-middle">
												<?php
													echo $RestDayOvertimeGrossPay;
												?>
											</td>
											<td class="rest-group text-center align-middle">
												<?php
													echo $RestDayNPOvertimeGrossPay;
												?>
											</td>
											<!-- sph -->
											<td class="sph-group text-center align-middle">
												<?php
													echo $SpecialHolidayGrossPay;
												?>
											</td>
											<td class="sph-group text-center align-middle">
												<?php
													echo $SpecialHolidayNPGrossPay;
												?>
											</td>
											<td class="sph-group text-center align-middle">
												<?php
													echo $SpecialHolidayOvertimeGrossPay;
												?>
											</td>
											<td class="sph-group text-center align-middle">
												<?php
													echo $SpecialHolidayNPOvertimeGrossPay;
												?>
											</td>
											<!-- sphrd -->
											<td class="sphrd-group text-center align-middle">
												<?php
													echo $SPHRDGrossPay;
												?>
											</td>
											<td class="sphrd-group text-center align-middle">
												<?php
													echo $SPHRDNPGrossPay;
												?>
											</td>
											<td class="sphrd-group text-center align-middle">
												<?php
													echo $SPHRDOvertimeGrossPay;
												?>
											</td>
											<td class="sphrd-group text-center align-middle">
												<?php
													echo $SPHRDNPOvertimeGrossPay;
												?>
											</td>
											<!-- nh100% -->
											<td class="nh100-group text-center align-middle">
												<?php
													echo $NHOHPGrossPay;
												?>
											</td>
											<!-- nh200% -->
											<td class="nh200-group text-center align-middle">
												<?php
													echo $NationalHolidayGrossPay;
												?>
											</td>
											<td class="nh200-group text-center align-middle">
												<?php
													echo $NationalHolidayNPGrossPay;
												?>
											</td>
											<td class="nh200-group text-center align-middle">
												<?php
													echo $NationalHolidayOvertimeGrossPay;
												?>
											</td>
											<td class="nh200-group text-center align-middle">
												<?php
													echo $NationalHolidayNPOvertimeGrossPay;
												?>
											</td>
											<!-- nhrd -->
											<td class="nhrd-group text-center align-middle">
												<?php
													echo $NHRDGrossPay;
												?>
											</td>
											<td class="nhrd-group text-center align-middle">
												<?php
													echo $NHRDNPGrossPay;
												?>
											</td>
											<td class="nhrd-group text-center align-middle">
												<?php
													echo $NHRDOvertimeGrossPay;
												?>
											</td>
											<td class="nhrd-group text-center align-middle">
												<?php
													echo $NHRDNPOvertimeGrossPay;
												?>
											</td>
											<!-- others -->
											<td class="allowance-group text-center align-middle">
												TBD
											</td>
											<td class="sil-group text-center align-middle">
												TBD
											</td>
											<td class="total-group text-center align-middle">
												<?php
													echo $GrossPayTotal;
												?>
											</td>
											<td class="13th-group text-center align-middle">
												<?php
													echo $thirteen;
												?>
											</td>
										</tr>
									<?php endforeach ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- MODALS -->
	<?php $this->load->view('_template/modals/m_p_clientview'); ?>
	<?php $this->load->view('_template/modals/m_p_setweek'); ?>
</body>
<!-- EXPORT MODAL -->
<?php $this->load->view('_template/modals/m_export'); ?>
<!-- EXPORT EXCEL MODAL -->
<?php $this->load->view('_template/modals/m_export_excel'); ?>

<?php $this->load->view('_template/users/u_scripts'); ?>
<!-- FORM -->
<form action="<?php echo base_url().'ImportExcel'; ?>" method="post" enctype="multipart/form-data">
	<input type="hidden" name="ExcelClientID">
	<input id="file" type="file" name="file" class="btn btn-success" style="display: none;" onchange="form.submit()">
</form>
<script type="text/javascript">
	$(document).ready(function () {
		$('#FromDate').val(moment().subtract(30,'d').format('YYYY-MM-DD'));
		$('#ToDate').val(moment().format('YYYY-MM-DD'));
		$('[data-toggle="tooltip"]').tooltip();
		$('.sorting-table-icon').hide();
		$('#DTSearch').attr('placeholder', 'Search table');
		$('#DTSearch').attr('readonly', false);
		$('#ExportFromDate, #ExportToDate').on('change', function() {
			$('#ExportFileName').val($('#DesignatedClientName').val() + ' (' + $('#ExportFromDate').val() + ' - ' + $('#ExportToDate').val() + ')' );
		});
		$('#FromDate').val(moment().subtract(6,'d').format('YYYY-MM-DD'));
		$('#ToDate').val(moment().format('YYYY-MM-DD'));
		$('.ImportButton').click(function(){ $('#file').trigger('click'); });
		function readURL(input) {
			if (input.files && input.files[0]) {
				var reader = new FileReader();
				reader.onload = function(e) {
					$('.ImportButton').attr('src', e.target.result);
				}
				reader.readAsDataURL(input.files[0]);
			}
		}
		$("#file").change(function() {
			$('#LoadModal').modal('show');
			readURL(this);
		});
		$('.load-div').hide();
		var table = $('#ListClients').DataTable( {
			sDom: 'lrtip',
			"bLengthChange": false,
			"order": [[ 0, "asc" ]],
			buttons: [
	            {
		            extend: 'print',
		            exportOptions: {
		                columns: [ ':visible' ]
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
		                columns: [ ':visible' ]
		            }
		        },
		        {
		            extend: 'excelHtml5',
		            exportOptions: {
		                columns: [ ':visible' ]
		            }
		        },
		        {
		            extend: 'csvHtml5',
		            exportOptions: {
		                columns: [ ':visible' ]
		            }
		        },
		        {
		            extend: 'pdfHtml5',
		            exportOptions: {
		                columns: [ ':visible' ]
		            }
		        }
       		],
       		lengthMenu: [
	            [50, 100, 200, -1],
	            [500, 100, 200, 'All'],
	        ],
	        columnDefs: [ {
	            visible: false
	        } ]
   		});
		$('#ExportPrint').on('click', function () {
			$('table').css('font-size', '10px');
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
    	$('#DTSearch').on('keyup change', function(){
			table.search($(this).val()).draw();
		});
		$('.ViewClientIDButton').on('click', function () {
			$('#ViewClientID').val($(this).attr('id'));
			console.log($('#ViewClientID').val());
		});
		$('.SetPrimaryClientIDButton').on('click', function () {
			$('#SetPrimaryClientID').val($(this).attr('id'));
			console.log($('#SetPrimaryClientID').val());
		});
		$('#LoadButton').on('click', function () {
			$('.load-container').children().hide();
			$('.load-div').show();
		});
		$('.excel_formatbtn').on('click', function () {
			$('#idforFormatex').val($(this).attr('id'));
			$('#DesignatedClientName').val($(this).attr('value'));
			// $('#ExportFileName').val('');
		});
		$('.payrollconfig-btn').on('click', function() {
			let week = $(this).data('startingweek');
			let sssFrom = $(this).data('sssfrom');
			let sssTo = $(this).data('sssto');
			let hdmfFrom = $(this).data('hdmffrom');
			let hdmfTo = $(this).data('hdmfto');
			$('#Week').val(week);
			$('#PayrollHDMFDayStart').val(hdmfFrom);
			$('#PayrollHDMFDayEnds').val(hdmfTo);
			$('#PayrollSSSDayStart').val(sssFrom);
			$('#PayrollSSSDayEnds').val(sssTo);
		});
		$('.filters-btn').on('click', function() {
			let active = $(this).data('active');
			let target = $(this).data('target');
			if (!active) {
				// show
				$(this).data('active', true);
				$(`.${target}-group`).fadeIn('fast');
				$(this).removeClass('btn-secondary');
				$(this).addClass('btn-success');
				$(this).html('<i class="fa fa-check" style="margin-right: -1px;"></i>');
			} else {
				// hide
				$(this).data('active', false);
				$(`.${target}-group`).fadeOut('fast');
				$(this).removeClass('btn-success');
				$(this).addClass('btn-secondary');
				$(this).html('&nbsp;');
			}
			console.log(target);
		});
		let isFiltersShown = false;
		$('.filters-group-btn').on('click', function() {
			if (!isFiltersShown) {
				// show
				isFiltersShown = true;
				$('.filters-group').show();
				$(this).html('<i class="fa fa-times" style="margin-right: -1px;"></i>');
			} else {
				// hide
				isFiltersShown = false;
				$('.filters-group').hide();
				$(this).html('<i class="fa fa-filter" style="margin-right: -1px;"></i>');
			}
		});
	});
</script>
</html>