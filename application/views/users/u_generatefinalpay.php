<?php
	if (!$_GET['id']) {
		redirect('FourOhFour');
	} else {
		// Data
		$ApplicantID = $_GET['id'];
		$CheckApplicant = $this->Model_Selects->CheckApplicant($ApplicantID);
		if ($CheckApplicant->num_rows() > 0) {
			foreach($CheckApplicant->result_array() as $row) {
				// Fetch Client
				if ($row['ClientEmployed']) {
					$GetClientID = $this->Model_Selects->GetClientID($row['ClientEmployed']);
					if ($GetClientID->num_rows() > 0) {
						foreach($GetClientID->result_array() as $crow) {
							$ClientName = $crow['Name'];
						}
					} else {
						$ClientName = 'No Client';
					}
				} else {
					$ClientName = 'No Client';
				}
				if (strlen($ClientName) > 25) {
					$ClientName = substr($ClientName, 0, 25);
					$ClientName = $ClientName . '...';
				}
				// Name Handler
				$fullName = '';
				if ($row['LastName']) {
					$fullName = $fullName . strtoupper($row['LastName']) . ', ';
				} else {
					$fullName = $fullName . '[<i>No Last Name</i>], ';
				}
				if ($row['FirstName']) {
					$fullName = $fullName . $row['FirstName'] . ' ';
				} else {
					$fullName = $fullName . '[<i>No First Name</i>] ';
				}
				if ($row['MiddleName']) {
					$fullName = $fullName . $row['MiddleName'][0] . '.';
				} else {
					$fullName = $fullName . '[<i>No MI</i>].';
				}
				if ($row['NameExtension']) {
					$fullName = $fullName . ', ' . $row['NameExtension'];
				}
				if (strlen($fullName) > 60) {
					$fullName = substr($fullName, 0, 60);
					$fullName = $fullName . '...';
				}
				// Salary Rate
				$SalaryExpected = $row['SalaryExpected'] ?? 0;
				$SalaryType = $row['SalaryType'] ?? 'Daily';
				// Salary Data
				$totalWeeklyHours = 0;
				$totalSemiHours = 0;
				$totalMonthlyHours = 0;
				$getTotalWeeklyHours = $this->Model_Selects->GetTotalWeeklyHours($ApplicantID);
				$getTotalSemiHours = $this->Model_Selects->GetTotalSemiHours($ApplicantID);
				$getTotalMonthlyHours = $this->Model_Selects->GetTotalMonthlyHours($ApplicantID);
				if ($getTotalWeeklyHours->num_rows() > 0) {
					foreach ($getTotalWeeklyHours->result_array() as $row) {
						$totalWeeklyHours = $row['Total'];
					}
				}
				if ($getTotalSemiHours->num_rows() > 0) {
					foreach ($getTotalSemiHours->result_array() as $row) {
						$totalSemiHours = $row['Total'];
					}
				}
				if ($getTotalMonthlyHours->num_rows() > 0) {
					foreach ($getTotalMonthlyHours->result_array() as $row) {
						$totalMonthlyHours = $row['Total'];
					}
				}
				$totalWorkHours = $totalWeeklyHours + $totalSemiHours + $totalMonthlyHours;
				$totalWorkDays = round(($totalWorkHours / 8), 2);
				$totalWorkMonths = round(($totalWorkDays / 26.16667), 2);
				$totalWorkYears = round(($totalWorkMonths / 12), 1);

				$dailySalary = 0.0;
				$semiSalary = 0.0;
				$monthlySalary = 0.0;
				$annualSalary = 0.0;
				$thirteen = 0.0;
				$finalPay = 0.0;
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
				$sickLeave = $row['SickLeave'] ?? 0;
				$sickLeavePay = $sickLeave * $dailySalary;

				$grossPay = $seperationPay + $sickLeavePay + $thirteen;
				$dateOfSeperation = $row['DateOfSeperation'] ?? 'Not Seperated';
			}
		} else {
			redirect('FourOhFour');
		}
	}
?>
<style>
	html,body
	{
		
	}
	.payslip-container input {
		border: none;
		border-color: transparent;
		width: 100%;
		height: 100%;
		margin: 0;
		padding: 0;
	}
	input[type]:focus {
		box-shadow: none !important;
		background-color: rgba(0, 0, 0, 0.08);
	}
	/*.payslip-container .payslip-text {
		margin-top: -2px;
	}*/
	.payslip-container .payslip-number {
		font-family: Arial;
		text-align: right;
		font-size: 11px;
		padding-left: 5px;
	}
	.payslip-field {
		padding-right: 8px;
	}
</style>
<body>
	<div class="wrapper">
		<?php $this->load->view('_template/users/u_sidebar'); ?>
		<div id="content" class="ncontent">
			<div class="container-fluid">
				<?php $this->load->view('_template/users/u_notifications'); ?>
					<div class="my-3" style="margin-left: 10px;">
						<div class="row">
							<div class="col-sm-12">
								<button type="button" class="btn btn-success glow-gold" onClick="printContent('PrintOut')" style="width: 400px;"><i class="fas fa-print"></i> Print</button>
								<button type="button" class="btn btn-info" data-toggle="modal" data-target="#FinalPayDeductionsModal" style="width: 200px;"><i class="fas fa-plus"></i> Add Deductions</button>
							</div>
						</div>
					</div>
					<div class="row PrintOut" style="margin-left: 20px;">
						<?php for ($i = 0; $i < 2; $i++): ?>
							<div class="payslip-container col-sm-5" style="margin-left: 5px;">
								<div class="row mt-2" style="border-bottom: 1px solid black;">
									<div class="col-sm-1">
										<img src="<?=base_url()?>assets/img/wercher_logo.png" width="78" height="69" style="filter: grayscale(100%); margin-top: -5px;">
									</div>
									<div class="col-sm-11 text-center">
										<span style="font-size: 16px;"><b>WERCHER SOLUTIONS AND RESOURCES</b></span>
										<p><span style="font-size: 16px;"><b>LABOR SERVICE COOPERATIVE</b></span></p>
									</div>
								</div>
								<div class="row mt-2" style="border-bottom: 1px solid black;">
									<div class="col-sm-12 text-center">
										<span style="font-size: 42px;"><b>FINAL PAY</b></span>
									</div>
								</div>
								<div class="row mt-2" style="border-bottom: 1px solid black;">
									<div class="col-sm-12">
										<div class="row">
											<div class="payslip-field col-sm-2">
												<input type="text" value="PERIOD:">
											</div>
											<div class="payslip-text col-sm-10">
												<input style="font-weight: bold;" type="text" value="<?php echo date('Y-m-d'); ?>">
											</div>
										</div>
									</div>
									<div class="col-sm-12">
										<div class="row">
											<div class="payslip-field col-sm-2">
												<input type="text" value="NAME:">
											</div>
											<div class="payslip-field-value col-sm-10">
												<input style="font-weight: bold; font-size: 18px;" type="text" value="<?php echo $fullName ; ?>">
											</div>
										</div>
									</div>
									<div class="col-sm-12">
										<div class="row">
											<div class="payslip-field col-sm-2">
												<input type="text" value="RATE:">
											</div>
											<div class="payslip-field-value col-sm-10">
												<input style="font-weight: bold;" type="text" value="PHP <?php echo $SalaryExpected ; ?> (<?php echo $SalaryType; ?>)">
											</div>
										</div>
									</div>
									<div class="col-sm-12">
										<div class="row">
											<div class="payslip-field col-sm-2">
												<input type="text" value="CLIENT:">
											</div>
											<div class="payslip-field-value col-sm-10">
												<input style="font-weight: bold;" type="text" value="<?php echo $ClientName ; ?>">
											</div>
										</div>
									</div>
									<div class="col-sm-12">
										<div class="row">
											<div class="payslip-field col-sm-4">
												<input type="text" value="DATE OF SEPERATION:">
											</div>
											<div class="payslip-field-value col-sm-8">
												<input style="font-weight: bold;" type="text" value="<?php echo $dateOfSeperation ; ?>">
											</div>
										</div>
									</div>
								</div>
								<div class="row" style="border-bottom: 1px solid black;">
									<div class="col-sm-4" style="border-right: 1px solid black;">
										<div class="row">
											<div class="col-sm-12">
												<input style="font-weight: bold;" type="text" value="SIL">
											</div>
										</div>
										<div class="row">
											<div class="payslip-field col-sm-6">
												<input type="text" value="Remaining:">
											</div>
											<div class="col-sm-6 text-right">
												<input class="payslip-number" type="text" value="<?php echo $sickLeave; ?>">
											</div>
											<div class="payslip-field col-sm-6">
												<input type="text" value="Amount:">
											</div>
											<div class="col-sm-6 text-right">
												<input class="payslip-number" type="text" value="₱<?php echo $sickLeavePay; ?>">
											</div>
										</div>
									</div>
									<div class="col-sm-4" style="border-right: 1px solid black;">
										<div class="row">
											<div class="col-sm-12">
												<input style="font-weight: bold;" type="text" value="Seperation Pay">
											</div>
										</div>
										<div class="row">
											<div class="payslip-field col-sm-6">
												<input type="text" value="Years:">
											</div>
											<div class="col-sm-6 text-right">
												<input class="payslip-number" type="text" value="<?php echo $totalWorkYears; ?>">
											</div>
											<div class="payslip-field col-sm-6">
												<input type="text" value="Amount:">
											</div>
											<div class="col-sm-6 text-right">
												<input class="payslip-number" type="text" value="₱<?php echo $seperationPay; ?>">
											</div>
										</div>
									</div>
									<div class="col-sm-4" style="border-right: 1px solid black;">
										<div class="row">
											<div class="col-sm-12">
												<input style="font-weight: bold;" type="text" value="13th Month">
											</div>
										</div>
										<div class="row">
											<div class="payslip-field col-sm-6">
												<input type="text" value="Amount:">
											</div>
											<div class="col-sm-6 text-right">
												<input class="payslip-number" type="text" value="₱<?php echo $thirteen; ?>">
											</div>
										</div>
									</div>
								</div>
								<div class="row" style="margin-top: 2px;">
									<div class="col-sm-4">
										<div class="row">
											<div class="col-sm-6">
												<input type="text" value="TOTAL:">
											</div>
											<div class="col-sm-6 text-right">
												<input class="payslip-number" type="text" value="₱<?php echo $sickLeavePay; ?>">
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="row">
											<div class="col-sm-6">
												<input type="text" value="TOTAL:">
											</div>
											<div class="col-sm-6 text-right">
												<input class="payslip-number" type="text" value="₱<?php echo $seperationPay; ?>">
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="row">
											<div class="col-sm-6">
												<input type="text" value="TOTAL:">
											</div>
											<div class="col-sm-6 text-right">
												<input class="payslip-number" type="text" value="₱<?php echo $thirteen; ?>">
											</div>
										</div>
									</div>
								</div>
								<!-- <div class="row">
									<div class="col-sm-12">
										<div class="row">
											<div class="col-sm-6">
												<input type="text" value="ALLOWANCE:">
											</div>
											<div class="col-sm-6 text-right">
												<input class="payslip-number" type="text" value="<?php echo $EarningsTotal; ?>">
											</div>
										</div>
									</div>
								</div> -->
								<div class="row" style="border-top: 1px solid black; border-bottom: 1px solid black;">
									<div class="col-sm-12">
										<div class="row" style="font-size: 17px;">
											<div class="col-sm-6" style="margin-top: 1px; margin-bottom: 1px;">
												<input style="font-weight: bold;" type="text" value="TOTAL GROSS PAY:">
											</div>
											<div class="col-sm-6 text-right" style="margin-top: 1px; margin-bottom: 1px;">
												<input style="font-size: 17px; font-weight: bold;" class="payslip-number" type="text" value="₱<?php echo $grossPay; ?>">
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-12">
										<div class="row" style="margin-top: 2px;">
											<div class="col-sm-12">
												<input style="font-weight: bold;" type="text" value="Less">
											</div>
										</div>
										<div class="NewDeductionsContainer row">
											<div class="payslip-field col-sm-3 deductions-placeholder">
												<input type="text" value="--">
											</div>
											<div class="col-sm-3 text-right deductions-placeholder">
												<input class="payslip-number" type="text" value="--">
											</div>
											<div class="payslip-field col-sm-3 deductions-placeholder">
												<input type="text" value="--">
											</div>
											<div class="col-sm-3 text-right deductions-placeholder">
												<input class="payslip-number" type="text" value="--">
											</div>
										</div>
									</div>
								</div>
								<div class="row" style="border-top: 1px solid black; border-bottom: 1px solid black; margin-top: 2px;">
									<div class="col-sm-12">
										<div class="row" style="font-size: 17px;">
											<div class="col-sm-6" style="margin-top: 1px; margin-bottom: 1px;">
												<input style="font-weight: bold;" type="text" value="TOTAL DEDUCTIONS:">
											</div>
											<div class="col-sm-6 text-right" style="margin-top: 1px; margin-bottom: 1px;">
												<input style="font-size: 17px; font-weight: bold;" class="payslip-number deductions-total" type="text" data-total="0.00" value="₱0.00">
											</div>
										</div>
									</div>
								</div>
								<div class="row" style="border-bottom: 1px solid black;">
									<div class="col-sm-12">
										<div class="row" style="font-size: 19px;">
											<div class="col-sm-4" style="margin-top: 1px; margin-bottom: 1px;">
												<input style="font-weight: bold; font-size: 19px" type="text" value="NET PAY:">
											</div>
											<div class="col-sm-8 text-right" style="margin-top: 1px; margin-bottom: 1px;">
												<input style="font-family: Courier; font-size: 19px; font-weight: bold;" class="payslip-number net-pay" type="text" data-net="<?=$grossPay;?>" value="₱<?php echo $grossPay; ?>">
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-4" style="margin-top: 1px; margin-bottom: 1px;">
										<input type="text" value="Received by:">
									</div>
									<div class="col-sm-8" style="margin-bottom: 6px;">
										<div class="row w-75" style="margin-top: 50px;">
											<div class="col-sm-12" style="border-top: 1px solid black;">
												<input class="text-center" style="font-size: 10px; font-weight: bold;" type="text" value="Signature Over Printed Name">
											</div>
											<div class="col-sm-12" style="border-top: 1px solid black; margin-top: 20px;">
												<input class="text-center" style="font-size: 10px; font-weight: bold;" type="text" value="Date Received">
											</div>
										</div>
									</div>
								</div>
							</div>
						<?php endfor; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
<?php $this->load->view('_template/users/u_scripts');?>
<?php $this->load->view('_template/modals/m_finalpaydeductions');?>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.textfill.min.js"></script>
<script type="text/javascript">
	$(document).ready(function () {
		$(".nav-item a[href*='Payroll']").addClass("nactive");
		$('[data-toggle="tooltip"]').tooltip();
		$('.new-earnings-row-btn').on('click', function () {
			$('.NewEarningsContainer').append('<div class="col-sm-12"><div class="row"><div class="col-sm-6"><input type="text" value="#####:"></div><div class="col-sm-6 text-right"><input class="payslip-number" type="text" value="####"></div></div></div>');
		});
		$('.new-deductions-row-btn').on('click', function () {
			$('.NewDeductionsContainer').append('<div class="payslip-field col-sm-3"><input type="text" value="#####:"></div><div class="col-sm-3 text-right"><input class="payslip-number" type="text" value="####"></div>');
		});
		$('.new-provisions-row-btn').on('click', function () {
			$('.NewProvisionsContainer').append('<div class="payslip-field col-sm-3"><input type="text" value="#####:"></div><div class="col-sm-3 text-right"><input class="payslip-number" type="text" value="####"></div>');
		});
		let changePayroll = false;
		$('.payroll-changedates-btn').on('click', function() {
			if (!changePayroll) {
				changePayroll = true;
				$(this).html('<i class="fas fa-times"></i> Change Set');
				$('.payroll-changedates-group').show();
			} else {
				changePayroll = false;
				$(this).html('<i class="fas fa-edit"></i> Change Set');
				$('.payroll-changedates-group').hide();
			}
		});
		$('.deduction-add-btn').on('click', function() {
			$('#FinalPayDeductionsModal').modal('toggle');
			$('.deductions-placeholder').hide();
			
			let name = $('.deduction-name').val() ?? 'UNKNOWN';
			let amount = parseFloat($('.deduction-amount').val()) ?? 0;
			$('.deduction-name').val('');
			$('.deduction-amount').val('');

			let totalDeductions = parseFloat($('.deductions-total').data('total')) ?? 0;
			let netPay = parseFloat($('.net-pay').data('net')) ?? 0;
			totalDeductions += amount;
			netPay -= amount;
			$('.NewDeductionsContainer').append(`
				<div class="payslip-field col-sm-3">
					<input type="text" value="${name}">
				</div>
				<div class="col-sm-3 text-right">
					<input class="payslip-number" type="text" value="₱${amount}">
				</div>
			`);
			$('.deductions-total').data('total', totalDeductions);
			$('.net-pay').data('net', netPay);
			$('.deductions-total').val(`₱${totalDeductions}`);
			$('.net-pay').val(`₱${netPay}`);
		});
	});
</script>