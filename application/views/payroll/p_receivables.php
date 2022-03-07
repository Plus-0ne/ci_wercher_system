<?php 

$T_Header;
require 'vendor/autoload.php';
use Carbon\Carbon;

$now = new DateTime();
$toDate = $now->format('Y-m-d');
$fromDate = $now;
$fromDate = $fromDate->modify('-1 month');
$fromDate = $fromDate->format('Y-m-d');


?>
<body>
	<div class="wrapper wercher-background-lowpoly">
		<?php $this->load->view('_template/users/u_sidebar'); ?>
		<div id="content" class="ncontent">
			<div class="container-fluid">
				<?php $this->load->view('_template/users/u_notifications'); //TODO: Limit the bell to HR access? ?>
				<div class="col-12 col-sm-12 tabs">
					<ul>
						<li><a href="<?php echo base_url() ?>Payroll">Salary (<?php echo $ShowClients->num_rows()?>)</a></li>
						<li class="tabs-active"><a href="<?php echo base_url() ?>Receivables">Receivables</a></li>
						<li><a href="<?php echo base_url() ?>Loans">Loans</a></li>
						<li><a href="<?php echo base_url() ?>Provisions">Provisions</a></li>
					</ul>
				</div>
				<div class="row rcontent">
					<div class="col-12">
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
									<tr class="text-center align-middle">
										<th>Applicant</th>
										<th>Name</th>
										<th style="display: none;">Name</th>
										<th style="display: none;">Position</th>
										<th>Client</th>
										<th>Salary</th>
										<th>13th Month</th>
										<th>Final Pay</th>
										<th>VL / SL Remaining</th>
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
										// 13th month pay
										$salary = $row['SalaryExpected'] ?? 0;
										$salaryType = $row['SalaryType'] ?? 'Daily';
										$thirteen = 0;
										switch ($salaryType) {
											case 'Daily':
												$monthlySalary = $salary * 26;
												$annualSalary = $monthlySalary * 12;
												$thirteen = (($salary * $cDiffInDays) / 26) / 12;
												$finalPay = ($annualSalary / 52) / 6;
												break;
											case 'Monthly':
												$dailySalary = $salary / 26;
												$monthlySalary = $salary;
												$thirteen = $salary / 12;
												$finalPay = ($monthlySalary * 12) / 313;
												break;
										}
									?>
										<tr class="table-row-hover">
											<td class="text-center">
												<div class="col-sm-12">
													<a href="ViewEmployee?id=<?php echo $row['ApplicantID']; ?>"><img src="<?php echo $thumbnail; ?>" width="70" height="70" class="rounded-circle" loading="lazy"></a>
												</div>
												<div class="col-sm-12 align-middle">
													<a href="ViewEmployee?id=<?php echo $row['ApplicantID']; ?>"><?php echo $row['ApplicantID']; ?></a>
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
												<?php
												$clientEmployed = $row['ClientEmployed'] ?? 0;
												$clientName = 'N/A';
												$getClientFromID = $this->Model_Selects->GetClientDet($clientEmployed);
												if ($getClientFromID->num_rows() > 0) {
													foreach ($getClientFromID->result_array() as $crow) {
														$clientName = $crow['Name'] ?? 'N/A';
													}
												}
												echo $clientName;
												?>
											</td>
											<td class="text-center align-middle">
												<?php
													$salary = $row['SalaryExpected'] ?? 0;
													$salaryType = $row['SalaryType'];
													$salaryText = '/ day';
													if ($salaryType) {
														switch ($salaryType) {
															case 'Daily':
																$salaryText = '/ day';
																break;
															case 'Monthly':
																$salaryText = '/ mo';
																break;
															case 'Semi-Monthly':
																$salaryText = '/ semi';
																break;
															default:
																$salaryText = '/ day';
																break;
														}
													}
													echo $salary . ' ' . $salaryText;
												?>
											</td>
											<td class="text-center align-middle">
												<?php
													echo round($thirteen, 2);
												?>
											</td>
											<td class="text-center align-middle">
												<?php
													echo round($finalPay, 2);
												?>
											</td>
											<td class="text-center align-middle">
												<?php
													$sickLeave = $row['SickLeave'] ?? 0;
													echo $sickLeave;
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
			"order": [[ 1, "desc" ]],
			buttons: [
            {
	            extend: 'print',
	            exportOptions: {
	                columns: [ 2, 3, 4, 5, 6, 7, 8 ]
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
	                columns: [ 2, 3, 4, 5, 6, 7, 8 ]
	            }
	        },
	        {
	            extend: 'excelHtml5',
	            exportOptions: {
	                columns: [ 2, 3, 4, 5, 6, 7, 8 ]
	            }
	        },
	        {
	            extend: 'csvHtml5',
	            exportOptions: {
	                columns: [ 2, 3, 4, 5, 6, 7, 8 ]
	            }
	        },
	        {
	            extend: 'pdfHtml5',
	            exportOptions: {
	                columns: [ 2, 3, 4, 5, 6, 7, 8 ]
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