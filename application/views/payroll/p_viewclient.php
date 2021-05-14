<?php 

$T_Header;
require 'vendor/autoload.php';
use Carbon\Carbon;

?>
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
						<li class="payroll-tabs-active"><a href="<?php echo base_url() ?>ViewClient?id=<?php echo $ClientID; ?>&mode=<?php echo $Mode; ?>">Attendance</a></li>
						<li><a href="<?php echo base_url() ?>ViewPayroll?id=<?php echo $ClientID; ?>&mode=<?php echo $Mode; ?>">Payroll</a></li>
					</ul>
				</div>
				<div class="rcontent">
				<div class="row">
					<div class="col-8 mb-2">
						<div class="form-row">
							<form class="form-group mr-1" action="<?php echo base_url().'ImportExcel'; ?>" method="post" enctype="multipart/form-data">
								<input id="ExcelClientID" type="hidden" name="ExcelClientID" value="<?php echo $ClientID; ?>">
								<input id="file" type="file" name="file" class="btn btn-success" style="display: none;" onchange="form.submit()">
								<button id="ImportButton" type="button" class="btn btn-success btn-sm form-control"><i class="fas fa-file-excel"></i> Import</button>
							</form>
							<?php
								if ($GetClientID->num_rows() > 0) {
									foreach($GetClientID->result_array() as $row) {
										$ClientName = $row['Name'];
									}
								} else {
									$ClientName = 'No Client'; // default
									$this->session->set_flashdata('prompts','<div class="text-center" style="width: 100%;padding: 21px; color: #F52F2F;"><h5><i class="fas fa-times"></i> Error: No client with that name was found</h5></div>');
								}
								$FirstDate = $this->session->userdata('FirstDate');
								$LastDate = $this->session->userdata('LastDate');
							?>
							<form class="form-group mr-1" action="<?php echo base_url().'PhpOffice_Controller/ExportFrom_To'; ?>" method="post" enctype="multipart/form-data">
							    <input type="text" class="form-control" name="id" readonly hidden value="<?php if($_GET['id'] == 'excel') { echo $ClientID; } else { echo $_GET['id']; } ?>">
							    <input type="text" class="form-control" name="Mode" readonly hidden value="<?php echo $_GET['mode']; ?>">
							    <input type="text" class="form-control" name="f_date" readonly hidden value="<?php echo $FirstDate?>">
							    <input type="text" class="form-control" name="t_date" readonly hidden value="<?php echo $LastDate?>">
							    <input type="text" class="form-control" name="ExportFileName" readonly hidden value="<?php echo $ClientName . ' (' . $FirstDate . ' - ' . $LastDate . ')' ?>">
							    <button id="ImportButton" type="submit" class="btn btn-success btn-sm form-control"><i class="fas fa-file-download"></i> Download Excel</button>
						  	</form>
						  	<div class="form-group">
						  		<?php
						  		$GetCurrentPrimaryWeek = $this->Model_Selects->GetCurrentPrimaryWeek($row['ClientID']);
								if ($GetCurrentPrimaryWeek->num_rows() > 0) {
									foreach($GetCurrentPrimaryWeek->result_array() as $prow) {
										$PrimaryWeek = $prow['WeekStart'];
										$currentDate = new DateTime();
										$date = new DateTime($PrimaryWeek);
										$day = $date->format('Y-m-d');
										$day = DateTime::createFromFormat('Y-m-d', $day)->format('F d, Y');
										$elapsed = Carbon::parse($PrimaryWeek);

										$diff = $currentDate->diff($date)->format("%a");
										if ($diff <= 7) {
											$Week = '1st';
										} elseif ($diff <= 14 && $diff > 7) {
											$Week = '2nd';
										} elseif ($diff <= 21 && $diff > 14) {
											$Week = '3rd';
										} elseif ($diff <= 28 && $diff > 21) {
											$Week = '4th';
										} else {
											$Week = '1st'; // Default;
										}
									}
								} else {
									$PrimaryWeek = 'N/A';
								}
						  		?>
						  		<button id="<?php echo $ClientID; ?>" type="button" class="btn btn-primary btn-sm SetPrimaryClientIDButton" data-toggle="modal" data-target="#ModalSetWeek"><i class="fas fa-calendar"></i> Set Starting Week</button>
						  		<i class="fas fa-info-circle"></i> <i>The starting week for this client is <b><?php echo $day; ?></b>. It is currently the <b><?php echo $Week; ?></b> week.</i>
						  	</div>
						</div>
					</div>
					<div class="col-sm-12 col-mb-12">
						<div class="table-responsive w-100">
							<table id="WeeklyTable" class="table table-condensed" style="font-size: 14px;">
								<thead>
									<th style="min-width: 200px;">Name</th>
									<th style="min-width: 50px;">Salary (₱)</th>
									<?php foreach ($GetWeeklyDates->result_array() as $row): ?>
										<th><?php 

										$date = new DateTime($row['Time']);
										$day = $date->format('Y-m-d');
										$day = DateTime::createFromFormat('Y-m-d', $day)->format('M d, Y');
										echo $day; 

										?></th>
									<?php endforeach; ?>
									<th style="min-width: 50px;">Reg. Hrs</th>
									<th style="min-width: 50px;">OT Hrs</th>
								</thead>
								<tbody>
									<?php foreach ($GetWeeklyListEmployee->result_array() as $row):
										$TotalRegHours = 0;
										$TotalOTHours = 0;

										// Name Handler
										$fullName = '';
										$fullNameHover = '';
										if ($row['LastName']) {
											$fullName = $fullName . $row['LastName'] . ', ';
											$fullNameHover = $fullNameHover . $row['LastName'] . ', ';
										} else {
											$fullNameHover = $fullNameHover . '[<i>No Last Name</i>], ';
										}
										if ($row['FirstName']) {
											$fullName = $fullName . $row['FirstName'] . ' ';
											$fullNameHover = $fullNameHover . $row['FirstName'] . ' ';
										} else {
											$fullNameHover = $fullNameHover . '[<i>No First Name</i>] ';
										}
										if ($row['MiddleName']) {
											$fullName = $fullName . $row['MiddleName'][0] . '.';
											$fullNameHover = $fullNameHover . $row['MiddleName'][0] . '.';
										} else {
											$fullNameHover = $fullNameHover . '[<i>No MI</i>].';
										}
										if ($row['NameExtension']) {
											$fullName = $fullName . ', ' . $row['NameExtension'];
											$fullNameHover = $fullNameHover . ', ' . $row['NameExtension'];
										}
										if (strlen($fullName) > 30) {
											$fullName = substr($fullName, 0, 30);
											$fullName = $fullName . '...';
										}
										if ($row['Status'] == 'Employed') {
											$icon = '<i class="fas fa-square PrintExclude" style="color: #e83e8c;"></i> ';
											$employmentStatus = 'Contractual';
										} elseif ($row['Status'] == 'Employed (Permanent)') {
											$icon = '<i class="fas fa-square PrintExclude" style="color: #1BDB07;"></i> ';
											$employmentStatus = 'Regular';
										} elseif ($row['Status'] == 'Absorbed (Wercher)') {
											$icon = '<i class="fas fa-square PrintExclude" style="color: #1BDB07;"></i> ';
											$employmentStatus = 'Absorbed to Wercher Coop from another company';
										} elseif ($row['Status'] == 'Absorbed (Left)') {
											$icon = '<i class="fas fa-square PrintExclude" style="color: #000000;"></i> ';
											$employmentStatus = 'Absorbed from Wercher Coop to another company';
										} elseif ($row['Status'] == 'Applicant') {
											$icon = '<i class="fas fa-square PrintExclude" style="color: #DB3E07;"></i> ';
											$employmentStatus = 'Applicant';
										} elseif ($row['Status'] == 'Expired') {
											$icon = '<i class="fas fa-square PrintExclude" style="color: #0721DB;"></i> ';
											$employmentStatus = 'Expired';
										} elseif ($row['Status'] == 'Blacklisted') {
											$icon = '<i class="fas fa-square PrintExclude" style="color: #000000;"></i> ';
											$employmentStatus = 'Blacklisted';
										} elseif ($row['Status'] == 'Resigned') {
											$icon = '<i class="fas fa-square PrintExclude" style="color: #000000;"></i> ';
											$employmentStatus = 'Resigned';
										} elseif ($row['Status'] == 'Terminated') {
											$icon = '<i class="fas fa-square PrintExclude" style="color: #000000;"></i> ';
											$employmentStatus = 'Terminated';
										} else {
											$icon = '<i class="fas fa-square PrintExclude" style="color: #DB3E07;"></i> ';
											$employmentStatus = 'Unknown';
										}
										?>
										<tr id="<?php echo $row['SalaryExpected']; ?>" data-clientid="<?php echo $row['ClientEmployed']; ?>" data="<?php echo $row['ApplicantID']; ?>" class='clickable-row' data-toggle="modal" data-target="#HoursWeeklyModal_<?php echo $row['ApplicantID']; ?>">
											<td data-toggle="tooltip" data-placement="top" data-html="true" title="<b><?php echo $fullNameHover; ?></b><br><br><b>Status: </b><br><?php echo $employmentStatus; ?><br><br><b>Employee ID: </b><br><?php echo $row['EmployeeID']; ?><br><br><b>Applicant ID: </b><br><?php echo $row['ApplicantID']; ?>"><a href="ViewEmployee?id=<?php echo $row['ApplicantID']; ?>"><?php echo $icon . $fullName; ?></a></td>
											<td><?php echo $row['SalaryExpected'];?></td>
											<?php foreach ($GetWeeklyDates->result_array() as $brow):
												?> <td> <?php
												if($this->Model_Selects->GetMatchingDates($row['ApplicantID'], $brow['Time'], $_GET['mode'])->num_rows() > 0) {
													foreach ($this->Model_Selects->GetMatchingDates($row['ApplicantID'], $brow['Time'], $_GET['mode'])->result_array() as $nrow):
														$Hours = $nrow['Hours'];
														$OT = $nrow['Overtime'];
														$totalh =  $nrow['Hours'] + $nrow['Overtime'];
														echo '<div data-toggle="tooltip" data-placement="top" data-html="true" title="Regular Hours: '. $Hours . '<br>Overtime: ' . $nrow['Overtime'] . '">' . $totalh . '</div>';
														$TotalRegHours = $TotalRegHours + $Hours;
														$TotalOTHours = $TotalOTHours + $OT;
													endforeach;
												} else {
													echo '0';
												} ?> </td>
											<?php endforeach; ?>
											<td><?php echo $TotalRegHours; ?></td>
											<td><?php echo $TotalOTHours; ?></td>
										</tr>
									<?php endforeach; ?>
								</tbody>
							</table>
						</div>
					</div>
			</div>
		</div>
	</div>
	<?php $this->load->view('_template/modals/m_p_hoursweekly'); ?>
	<?php $this->load->view('_template/modals/m_p_setweek'); ?>
	<!-- LOAD MODAL -->
	<div class="modal fade" id="LoadModal" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-body">
					<div class="form-row">
						<div class="text-center ml-auto mr-auto">
							<div class="spinner-border m-5" role="status"></div>
							<h4>Please wait warmly</h4>
							<p>This will only take a little bit</p>
							<p class="load-hidden-1" style="display: none;">Almost there...</p>
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
		$('.SetPrimaryClientIDButton').on('click', function () {
			$('#SetPrimaryClientID').val($(this).attr('id'));
			console.log($('#SetPrimaryClientID').val());
		});
		$('.regular-btn').on('click', function () {
			$(this).toggleClass('btn-success btn-secondary');
			$(this).children('i').toggleClass('text-primary');
			if ($(this).closest('.regular-btn-group').find('input[type=checkbox]').is(':checked')) {
				$(this).closest('.regular-btn-group').find('input[type=checkbox]').attr('checked', false);
			} else {
				$(this).closest('.regular-btn-group').find('input[type=checkbox]').attr('checked', true);
			}
		});
		$('.rest-btn').on('click', function () {
			$(this).toggleClass('btn-info btn-secondary');
			$(this).children('i').toggleClass('text-primary');
			if ($(this).closest('.rest-btn-group').find('input[type=checkbox]').is(':checked')) {
				$(this).closest('.rest-btn-group').find('input[type=checkbox]').attr('checked', false);
			} else {
				$(this).closest('.rest-btn-group').find('input[type=checkbox]').attr('checked', true);
			}
		});
		$('.special-btn').on('click', function () {
			$(this).toggleClass('btn-danger btn-secondary');
			$(this).children('i').toggleClass('text-primary');
			if ($(this).closest('.special-btn-group').find('input[type=checkbox]').is(':checked')) {
				$(this).closest('.special-btn-group').find('input[type=checkbox]').attr('checked', false);
			} else {
				$(this).closest('.special-btn-group').find('input[type=checkbox]').attr('checked', true);
			}
		});
		$('.national-btn').on('click', function () {
			$(this).toggleClass('btn-flag-ph btn-secondary');
			$(this).children('i').toggleClass('text-primary');
			if ($(this).closest('.national-btn-group').find('input[type=checkbox]').is(':checked')) {
				$(this).closest('.national-btn-group').find('input[type=checkbox]').attr('checked', false);
			} else {
				$(this).closest('.national-btn-group').find('input[type=checkbox]').attr('checked', true);
			}
		});
		$('.night-btn').on('click', function () {
			$(this).toggleClass('btn-night btn-secondary night-btn-extend');
			$(this).children('i').toggleClass('text-primary');
			if ($(this).closest('.night-btn-group').find('input[type=checkbox]').is(':checked')) {
				$(this).closest('.night-btn-group').find('input[type=checkbox]').attr('checked', false);
			} else {
				$(this).closest('.night-btn-group').find('input[type=checkbox]').attr('checked', true);
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
		$('#TaxTable').hide();
				$('#MoreOptions').on('click', function () {
			$('#MoreOptions').hide();
			$('.modal-fade').fadeIn();
		});
		var table = $('#WeeklyTable').removeAttr('width').DataTable( {
        	"order": [[ 1, "asc" ]],
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
	 	<?php foreach ($GetWeeklyDates->result_array() as $row): ?>
	 		$('.SLCheck_<?php echo $row['Time']; ?>').on('change', function() {
	 			console.log('hello');
	 			$('.REGCheck_<?php echo $row['Time']; ?>').prop("checked", false);
	 		});
	 		$('.NCheck_<?php echo $row['Time']; ?>').on('click', function() {
	 			$(this).closest('.card').find('.night-premium-container').toggle();
	 			$(this).closest('.card').find('.NightPremium').toggle();
	 		});
		 	$(".Hours_<?php echo $row['Time']; ?>, .OTHours_<?php echo $row['Time']; ?>, .NightHours_<?php echo $row['Time']; ?>, .NightOTHours_<?php echo $row['Time']; ?>").bind("input", function () {
		 			// General
	                let PerHour = $(this).closest("#SalaryDays").find('.PerHour').val();
	                let PerDay = $(this).closest("#SalaryDays").find('.PerDay').val();
		 			// Hours
	                let Hours = $(this).closest("#SalaryDays").find('.Hours_<?php echo $row['Time']; ?>').val();
	                // OT
	                let OT = $(this).closest("#SalaryDays").find('.OTHours_<?php echo $row['Time']; ?>').val();
	                let NightHours = $(this).closest("#SalaryDays").find('.NightHours_<?php echo $row['Time']; ?>').val();
	                let NightOT = $(this).closest("#SalaryDays").find('.NightOTHours_<?php echo $row['Time']; ?>').val();

	                let TotalPerDay;
	                let NightTotalPerDay;
	                let Regular = PerHour * Hours;
	                let Overtime = (PerHour * OT) * 1.25;
	                let NightPremium = PerHour * NightHours;
	                let NightPremiumOvertime = (PerHour * NightOT) * 1.25;
	                let RegularPay;
	                let OvertimePay;
	                let NightPremiumPay;
	                let NightPremiumOvertimePay;
	                // Regular
	                if($(this).closest("#SalaryDays").find('.REGCheck_<?php echo $row['Time']; ?>').is(":checked")){
	                	RegularPay = Regular;
	                	OvertimePay = Overtime;
		                TotalPerDay = (Regular + Overtime);

		                NightPremiumPay = NightPremium;
		                NightPremiumOvertimePay = NightPremiumOvertime;
		                NightTotalPerDay = (NightPremium + NightPremiumOvertime);
		                NightTotalPerDay = NightTotalPerDay * 1.1;
	           		}
	           		// Rest Day
	           		if($(this).closest("#SalaryDays").find('.RESTCheck_<?php echo $row['Time']; ?>').is(":checked")){
	           			RegularPay = Regular * 1.3;
	           			OvertimePay = Overtime * 1.3;
		                TotalPerDay = (Regular + Overtime) * 1.3;

		                NightPremiumPay = NightPremium * 1.3;
		                NightPremiumOvertimePay = NightPremiumOvertime * 1.3;
		                NightTotalPerDay = (NightPremium + NightPremiumOvertime) * 1.3;
		                NightTotalPerDay = NightTotalPerDay * 1.1;
	           		}
	           		// Special
	           		if($(this).closest("#SalaryDays").find('.SPCheck_<?php echo $row['Time']; ?>').is(":checked")){
		                if($(this).closest("#SalaryDays").find('.REGCheck_<?php echo $row['Time']; ?>').is(":checked")){
		                	RegularPay = Regular * 1.3;
		                	OvertimePay = Overtime * 1.3;
		                	TotalPerDay = (Regular + Overtime) * 1.3;

		                	NightPremiumPay = NightPremium * 1.3;
		                	NightPremiumOvertimePay = NightPremiumOvertime * 1.3;
		                	NightTotalPerDay = (NightPremium + NightPremiumOvertime) * 1.3;
		                	NightTotalPerDay = NightTotalPerDay * 1.1;
		            	}
		                if($(this).closest("#SalaryDays").find('.RESTCheck_<?php echo $row['Time']; ?>').is(":checked")){
		                	RegularPay = Regular * 1.5;
		                	OvertimePay = Overtime * 1.5;
		                	TotalPerDay = (Regular + Overtime) * 1.5;

		                	NightPremiumPay = NightPremium * 1.5;
		                	NightPremiumOvertimePay = NightPremiumOvertime * 1.5;
		                	NightTotalPerDay = (NightPremium + NightPremiumOvertime) * 1.5;
		                	NightTotalPerDay = NightTotalPerDay * 1.1;
	           			}
	           		}
	           		// National
	           		if($(this).closest("#SalaryDays").find('.NHCheck_<?php echo $row['Time']; ?>').is(":checked")){
		                if($(this).closest("#SalaryDays").find('.REGCheck_<?php echo $row['Time']; ?>').is(":checked")){
		                	RegularPay = Regular * 2.0;
		                	OvertimePay = Overtime * 2.0;
		                	TotalPerDay = (Regular + Overtime) * 2.0;

		                	NightPremiumPay = NightPremium * 2.0;
		                	NightPremiumOvertimePay = NightPremiumOvertime * 2.0;
		                	NightTotalPerDay = (NightPremium + NightPremiumOvertime) * 2.0;
		                	NightTotalPerDay = NightTotalPerDay * 1.1;
		            	}
		                if($(this).closest("#SalaryDays").find('.RESTCheck_<?php echo $row['Time']; ?>').is(":checked")){
		                	RegularPay = Regular * 2.6;
		                	OvertimePay = Overtime * 2.6;
		                	TotalPerDay = (Regular + Overtime) * 2.6;

		                	NightPremiumPay = NightPremium * 2.6;
		                	NightPremiumOvertimePay = NightPremiumOvertime * 2.6;
		                	NightTotalPerDay = (NightPremium + NightPremiumOvertime) * 2.6;
		                	NightTotalPerDay = NightTotalPerDay * 1.1;
	           			}
	           		}
	           		let Result = TotalPerDay + NightTotalPerDay;
	           		NightPremiumPay = NightPremiumPay * 1.1;
	           		NightPremiumOvertimePay = NightPremiumOvertimePay * 1.1;

	           		$(this).closest("#SalaryDays").find('.t_pay_<?php echo $row['Time']; ?>').val(Result.toFixed(2));
	           		$(this).closest("#SalaryDays").find('.regular_pay_<?php echo $row['Time']; ?>').val(RegularPay.toFixed(2));
	           		$(this).closest("#SalaryDays").find('.overtime_pay_<?php echo $row['Time']; ?>').val(OvertimePay.toFixed(2));
	           		$(this).closest("#SalaryDays").find('.nightpremium_pay_<?php echo $row['Time']; ?>').val(NightPremiumPay.toFixed(2));
	           		$(this).closest("#SalaryDays").find('.nightpremiumovertime_pay_<?php echo $row['Time']; ?>').val(NightPremiumOvertimePay.toFixed(2));
	         });
		 	$(".SalaryButtons").on("click", function () {
		 			// General
	                var PerHour = $(this).closest("#SalaryDays").find('.PerHour').val();
	                var PerDay = $(this).closest("#SalaryDays").find('.PerDay').val();
		 			// Hours
	                var Hours = $(this).closest("#SalaryDays").find('.Hours_<?php echo $row['Time']; ?>').val();
	                // OT
	                var OT = $(this).closest("#SalaryDays").find('.OTHours_<?php echo $row['Time']; ?>').val();
	                var NightHours = $(this).closest("#SalaryDays").find('.NightHours_<?php echo $row['Time']; ?>').val();
	                var NightOT = $(this).closest("#SalaryDays").find('.NightOTHours_<?php echo $row['Time']; ?>').val();

	                let TotalPerDay;
	                let NightTotalPerDay;
	                let Regular = PerHour * Hours;
	                let Overtime = (PerHour * OT) * 1.25;
	                let NightPremium = PerHour * NightHours;
	                let NightPremiumOvertime = (PerHour * NightOT) * 1.25;
	                let RegularPay;
	                let OvertimePay;
	                let NightPremiumPay;
	                let NightPremiumOvertimePay;
	                // Regular
	                if($(this).closest("#SalaryDays").find('.REGCheck_<?php echo $row['Time']; ?>').is(":checked")){
	                	RegularPay = Regular;
	                	OvertimePay = Overtime;
		                TotalPerDay = (Regular + Overtime);

		                NightPremiumPay = NightPremium;
		                NightPremiumOvertimePay = NightPremiumOvertime;
		                NightTotalPerDay = (NightPremium + NightPremiumOvertime);
		                NightTotalPerDay = NightTotalPerDay * 1.1;
	           		}
	           		// Rest Day
	           		if($(this).closest("#SalaryDays").find('.RESTCheck_<?php echo $row['Time']; ?>').is(":checked")){
	           			RegularPay = Regular * 1.3;
	           			OvertimePay = Overtime * 1.3;
		                TotalPerDay = (Regular + Overtime) * 1.3;

		                NightPremiumPay = NightPremium * 1.3;
		                NightPremiumOvertimePay = NightPremiumOvertime * 1.3;
		                NightTotalPerDay = (NightPremium + NightPremiumOvertime) * 1.3;
		                NightTotalPerDay = NightTotalPerDay * 1.1;
	           		}
	           		// Special
	           		if($(this).closest("#SalaryDays").find('.SPCheck_<?php echo $row['Time']; ?>').is(":checked")){
		                if($(this).closest("#SalaryDays").find('.REGCheck_<?php echo $row['Time']; ?>').is(":checked")){
		                	RegularPay = Regular * 1.3;
		                	OvertimePay = Overtime * 1.3;
		                	TotalPerDay = (Regular + Overtime) * 1.3;

		                	NightPremiumPay = NightPremium * 1.3;
		                	NightPremiumOvertimePay = NightPremiumOvertime * 1.3;
		                	NightTotalPerDay = (NightPremium + NightPremiumOvertime) * 1.3;
		                	NightTotalPerDay = NightTotalPerDay * 1.1;
		            	}
		                if($(this).closest("#SalaryDays").find('.RESTCheck_<?php echo $row['Time']; ?>').is(":checked")){
		                	RegularPay = Regular * 1.5;
		                	OvertimePay = Overtime * 1.5;
		                	TotalPerDay = (Regular + Overtime) * 1.5;

		                	NightPremiumPay = NightPremium * 1.5;
		                	NightPremiumOvertimePay = NightPremiumOvertime * 1.5;
		                	NightTotalPerDay = (NightPremium + NightPremiumOvertime) * 1.5;
		                	NightTotalPerDay = NightTotalPerDay * 1.1;
	           			}
	           		}
	           		// National
	           		if($(this).closest("#SalaryDays").find('.NHCheck_<?php echo $row['Time']; ?>').is(":checked")){
		                if($(this).closest("#SalaryDays").find('.REGCheck_<?php echo $row['Time']; ?>').is(":checked")){
		                	RegularPay = Regular * 2.0;
		                	OvertimePay = Overtime * 2.0;
		                	TotalPerDay = (Regular + Overtime) * 2.0;

		                	NightPremiumPay = NightPremium * 2.0;
		                	NightPremiumOvertimePay = NightPremiumOvertime * 2.0;
		                	NightTotalPerDay = (NightPremium + NightPremiumOvertime) * 2.0;
		                	NightTotalPerDay = NightTotalPerDay * 1.1;
		            	}
		                if($(this).closest("#SalaryDays").find('.RESTCheck_<?php echo $row['Time']; ?>').is(":checked")){
		                	RegularPay = Regular * 2.6;
		                	OvertimePay = Overtime * 2.6;
		                	TotalPerDay = (Regular + Overtime) * 2.6;

		                	NightPremiumPay = NightPremium * 2.6;
		                	NightPremiumOvertimePay = NightPremiumOvertime * 2.6;
		                	NightTotalPerDay = (NightPremium + NightPremiumOvertime) * 2.6;
		                	NightTotalPerDay = NightTotalPerDay * 1.1;
	           			}
	           		}
	           		let Result = TotalPerDay + NightTotalPerDay;
	           		NightPremiumPay = NightPremiumPay * 1.1;
	           		NightPremiumOvertimePay = NightPremiumOvertimePay * 1.1;

	           		$(this).closest("#SalaryDays").find('.t_pay_<?php echo $row['Time']; ?>').val(Result.toFixed(2));
	           		$(this).closest("#SalaryDays").find('.regular_pay_<?php echo $row['Time']; ?>').val(RegularPay.toFixed(2));
	           		$(this).closest("#SalaryDays").find('.overtime_pay_<?php echo $row['Time']; ?>').val(OvertimePay.toFixed(2));
	           		$(this).closest("#SalaryDays").find('.nightpremium_pay_<?php echo $row['Time']; ?>').val(NightPremiumPay.toFixed(2));
	           		$(this).closest("#SalaryDays").find('.nightpremiumovertime_pay_<?php echo $row['Time']; ?>').val(NightPremiumOvertimePay.toFixed(2));
	         });
	 	<?php endforeach; ?>
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
		cursor: pointer;
	}
	.modal-open {
		overflow-y: auto !important;
		padding-right: 0 !important;
	}
	input[type=checkbox] {
		display:none;
	}
	.night-premium-container {
		border-radius: 6px;
		background-color: #003671;
		color: gold;
		margin-top: -25px;
		padding-top: 5px;
		padding-bottom: 5px;
	}
	.modal-body{
	    max-height: calc(100vh - 200px);
	    overflow-y: auto;
	}
</style>
</html>