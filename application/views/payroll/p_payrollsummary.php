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
		font-size: 14px;
	}
	.table td {
		padding: 0.15rem;
	}
	@media print {
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
						<li><a href="<?php echo base_url() ?>PayrollGrossPay">Gross Pay</a></li>
						<li><a href="<?php echo base_url() ?>PayrollMandatoryDed">Mandatory Ded.</a></li>
						<li><a href="<?php echo base_url() ?>PayrollNetPay">Net Pay</a></li>
						<li class="tabs-active"><a href="<?php echo base_url() ?>PayrollSummary">Summary</a></li>
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
					<div class="col-sm-12">
						<div class="table-responsive pt-2 pl-2 pr-2">
							<table id="ListClients" class="table PrintOut" style="width: 100%;">
								<thead>
									<tr class="align-middle">
										<th style="width: 250px;">NAME</th>
										<th style="width:">NET PAY</th>
										<th>ATM</th>
										<th>BPI FAMILY ATM</th>
										<th>CASH</th>
										<th>NOTES</th>
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

										$seperationPay = ($monthlySalary / 2) * $totalWorkYears;
									?>
										<tr class="table-row-hover">
											<td class="align-middle">
												<a href="ViewEmployee?id=<?php echo $row['ApplicantID']; ?>"<?php if($isFullNameHoverable): ?> data-toggle="tooltip" data-placement="top" data-html="true" title="<?php echo $fullNameHover; ?>"<?php endif; ?>><?php echo $fullName; ?></a>
											</td>
											<td class="align-middle">
												TBD
											</td>
											<!-- regular day -->
											<td class="align-middle">
												<?php
													if ($row['ATM_No']) {
														echo $row['ATM_No'];
													} else {
														echo '<span style="color: red;">NO ATM FOUND</span>';
													}
												?>
											</td>
											<td>
												TBD
											</td>
											<td>
												TBD
											</td>
											<td>
												TBD
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
		                columns: [ 0, 1, 2, 3, 4, 5 ]
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
		                columns: [ 0, 1, 2, 3, 4, 5 ]
		            }
		        },
		        {
		            extend: 'excelHtml5',
		            exportOptions: {
		                columns: [ 0, 1, 2, 3, 4, 5 ]
		            }
		        },
		        {
		            extend: 'csvHtml5',
		            exportOptions: {
		                columns: [ 0, 1, 2, 3, 4, 5 ]
		            }
		        },
		        {
		            extend: 'pdfHtml5',
		            exportOptions: {
		                columns: [ 0, 1, 2, 3, 4, 5 ]
		            }
		        }
       		],
       		lengthMenu: [
	            [50, 100, 200, -1],
	            [500, 100, 200, 'All'],
	        ],
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
	});
</script>
</html>