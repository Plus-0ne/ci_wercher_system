<?php $T_Header;?>
<?php
	// $IsFromExcel = False;
?>
<body>
	<div class="wrapper">
		<?php $this->load->view('_template/users/u_sidebar'); ?>
		<div id="content" class="ncontent">
			<div class="container-fluid">
				<?php $this->load->view('_template/users/u_notifications'); ?>
				<div class="row">
					<div class="col-sm-12 pt-3 pb-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb" style="background-color: transparent;">
								<li class="breadcrumb-item"><a href="<?=base_url()?>Dashboard">Home</a></li>
								<li class="breadcrumb-item"><a href="<?=base_url()?>Payroll">Payroll</a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Details</li>
							</ol>
						</nav>
					</div>
				</div>
				<?php echo $this->session->flashdata('prompts'); ?>
				<hr>
				<div class="row">
					<div class="col-8 mb-2">
						<form action="<?php echo base_url().'ImportExcel'; ?>" method="post" enctype="multipart/form-data">
							<input id="ExcelClientID" type="hidden" name="ExcelClientID" value="<?php echo $ClientID; ?>">
							<input id="file" type="file" name="file" class="btn btn-success" style="display: none;" onchange="form.submit()">
							<button id="ImportButton" type="button" class="btn btn-success"><i class="fas fa-file-excel"></i> Import</button>
							<button id="ImportButton" type="button" class="btn btn-success"><i class="fas fa-file-excel"></i> Export</button>
						</form>
						<!-- <div id="datatables-export"></div> -->
					</div>
					<div class="col-4 mb-2 text-right">
						<button id="ImportButton" type="button" class="btn btn-primary"><i class="fas fa-file-word"></i> Generate Payslip</button>
					</div>
					<div class="col-sm-12 col-mb-12">
						<table id="WeeklyTable" class="table table-condensed">
							<thead>
								<th style="min-width: 100px;">Applicant ID</th>
								<th style="min-width: 300px;">Name</th>
								<th style="min-width: 75px;">Salary (₱)</th>
								<?php foreach ($GetWeeklyDates->result_array() as $row): ?>
									<th><?php echo $row['Time']; ?></th>
								<?php endforeach; ?>
								<th>Total Hours</th>
							</thead>
							<tbody>
								<?php foreach ($GetWeeklyListEmployee->result_array() as $row):
									$TotalHours = 0;?>
									<tr id="<?php echo $row['SalaryExpected']; ?>" data-clientid="<?php echo $row['ClientEmployed']; ?>" data="<?php echo $row['ApplicantID']; ?>" class='clickable-row' data-toggle="modal" data-target="#HoursWeeklyModal_<?php echo $row['ApplicantID']; ?>">
										<td><?php echo $row['ApplicantID'];?></td>
										<td><?php echo $row['LastName'] . ', ' . $row['FirstName'] . ' ' . $row['MiddleInitial'];?></td>
										<td><?php echo $row['SalaryExpected'];?></td>
										<?php foreach ($GetWeeklyDates->result_array() as $brow):
											?> <td> <?php
											if($this->Model_Selects->GetMatchingDates($row['ApplicantID'], $brow['Time'])->num_rows() > 0) {
												foreach ($this->Model_Selects->GetMatchingDates($row['ApplicantID'], $brow['Time'])->result_array() as $nrow):
													$Hours = $nrow['Hours'];
													$totalh =  $nrow['Hours'] + $nrow['Overtime'];
													echo '<div data-toggle="tooltip" data-placement="top" data-html="true" title="Regular Hours: '. $Hours . '<br>Overtime: ' . $nrow['Overtime'] . '">' . $totalh . '</div>';
													$TotalHours = $TotalHours + $Hours;
												endforeach;
											} else {
												echo '0';
											} ?> </td>
										<?php endforeach; ?>
										<td><?php echo $TotalHours; ?></td>
<!-- 										<td class="text-center">
											<button id="<?php echo $row['Salary']; ?>" data="<?php echo $row['ApplicantID']; ?>" type="button" class="btn btn-primary btn-sm HoursButton" data-toggle="modal" data-target="#HoursWeeklyModal"><i  class="fas fa-clock"></i> Set</button>
											<button type="button" class="btn btn-primary btn-sm w-100 mb-1" data-toggle="modal" data-target="#HoursWeeklyModal"><i  class="fas fa-list"></i> Contract</button>
											<button type="button" class="btn btn-primary btn-sm w-100 mb-1" data-toggle="modal" data-target="#HoursWeeklyModal"><i  class="fas fa-book"></i> History</button>
										</td> -->
										</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
					</div>
					<!-- <div class="col-sm-8 col-md-8 ml-auto text-right PrintExclude">
						<button id="ShowDemo" type="button" class="btn btn-primary mr-auto"><i class="fas fa-flask"></i> Demo</button>
						<button type="button" class="btn btn-primary mr-auto"><i class="fas fa-import-file"></i> Import Excel File</button>
						<button onClick="printContent('PrintOutTable')" type="button" class="btn btn-primary mr-auto"><i class="fas fa-print"></i> Print</button>
					</div>
					<div id="TaxTable" class="col-sm-12"> -->

						<?php

						// if ( $xlsx = SimpleXLSX::parse(base_url() . 'assets/excel/Tax Calc.xlsx')) {

						// 	echo '<table border="1" cellpadding="3" style="border-collapse: collapse">';

						// 	$dim = $xlsx->dimension();
						// 	$cols = $dim[0];

						// 	foreach ( $xlsx->rows() as $k => $r ) {
						// 		//		if ($k == 0) continue; // skip first row
						// 		echo '<tr>';
						// 		for ( $i = 0; $i < $cols; $i ++ ) {
						// 			echo '<td class="test">' . ( isset( $r[ $i ] ) ? $r[ $i ] : '&nbsp;' ) . '</td>';
						// 		}
						// 		echo '</tr>';
						// 	}
						// 	echo '</table>';
						// } else {
						// 	echo SimpleXLSX::parseError();
						// }
						?>

						<!-- <table class="table table-hover">
							<th>Compensation Range</th>
							<th>Withholding Tax</th>
							<tr>
								<td>0</td>
								<td>0 (0%)</td>
							</tr>
							<tr>
								<td>10,416 to 16,666</td>
								<td>0 (20%)</td>
							</tr>
							<tr>
								<td>16,667 to 33,333</td>
								<td>1250 (25%)</td>
							</tr>
							<tr>
								<td>33,334 to 83,333</td>
								<td>5416.67 (30%)</td>
							</tr>
							<tr>
								<td>83,334 to 333,333</td>
								<td>20416.67 (32%)</td>
							</tr>
							<tr>
								<td>333,334 to 500,000</td>
								<td>100,416.67 (35%)</td>
							</tr>
						</table>


					</div>

				</div>
				<div class="row rcontent PrintOut">
					<div class="col-sm-12 col-md-4 mb-5">
						<h4>
							<i class="fas fa-vial"></i> Tax Input for ...
						</h4>
					</div>
					<div class="col-sm-8 col-md-8 ml-auto text-right PrintExclude">
						<button onClick="printContent('PrintOut')" type="button" class="btn btn-primary mr-auto"><i class="fas fa-print"></i> Print</button>
					</div>
					<div class="col-sm-12 form-group">
						<label>Gross Income (Monthly)</label>
						<input type="text" class="form-control" name="Gross" id="Gross" value="20000">
					</div>
					<div class="col-sm-12 col-md-4 form-group">
						<label>SSS</label>
						<input type="text" class="form-control" name="SSS" id="SSS" value="500">
					</div>
					<div class="col-sm-12 col-md-4 form-group">
						<label>PhilHealth</label>
						<input type="text" class="form-control" name="PhilHealth" id="PhilHealth" value="750">
					</div>
					<div class="col-sm-12 col-md-4 form-group">
						<label>HDMF</label>
						<input type="text" class="form-control" class="form-control" name="Gross" id="Gross" value="10%" readonly>
					</div>
					<div class="col-sm-12 form-group text-center PrintExclude">
						<button class="btn btn-primary w-50" onclick="Compute()">Calculate</button>
					</div>
					<div class="col-sm-12 col-md-6 form-group">
						<label>Taxable Income</label>
						<input type="text" class="form-control" name="TaxableIncome" id="TaxableIncome" readonly>
					</div>
					<div class="col-sm-12 col-md-6 form-group">
						<label>Total Tax</label>
						<input type="text" class="form-control" name="TotalTax" id="TotalTax" readonly>
					</div>
					<div class="col-sm-12 col-md-6 form-group">
						<label>Range</label>
						<input type="text" class="form-control" name="CompRange" id="CompRange" readonly>
					</div>
					<div class="col-sm-12 col-md-6 form-group">
						<label>Formula</label>
						<input type="text" class="form-control" name="Formula" id="Formula" readonly>
					</div>
					<div class="col-sm-12 form-group">
						<label>Take Home Pay</label>
						<input type="text" class="form-control" name="TakeHomePay" id="TakeHomePay" readonly>
					</div>
				</div> -->
			</div>
		</div>
	</div>
	<?php $this->load->view('_template/modals/m_p_hoursweekly'); ?>
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
							<p class="load-hidden-1" style="display: none;">This is taking longer than necessary...</p>
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
		// $('input[type=checkbox]').bootstrapToggle()
		// var prevVal;
		// $(".day-indicator").on("change",function(){
		// 	var val = $(this).find('option:selected').val();
		// 	$(".day-container").removeClass(`day-indicator-${prevVal}`).addClass(`day-indicator-${val}`);
		// 	prevVal = val;
		// });
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
		$('#sidebar').toggleClass('active');
		$('.ncontent').toggleClass('shContent');
		$('.clickable-row').on('click', function () {
			$('#Salary').val($(this).attr('id'));
			$('#ApplicantID').val($(this).attr('data'));
			$('#ClientID').val($(this).attr('data-clientid'));
			console.log($('#Salary').val());
			console.log($('#ApplicantID').val());
			console.log($('#ClientID').val());
			HourOne = $("#HoursDayOne").val();
		    HourTwo = $("#HoursDayTwo").val();
		    HourThree = $("#HoursDayThree").val();
		    HourFour = $("#HoursDayFour").val();
		    HourFive = $("#HoursDayFive").val();
		    HourSix = $("#HoursDaySix").val();
		    TotalHoursInAWeek = parseFloat(HourOne) + parseFloat(HourTwo) + parseFloat(HourThree) + parseFloat(HourFour) + parseFloat(HourFive) + parseFloat(HourSix);
		    if (TotalHoursInAWeek < 0 || isNaN(TotalHoursInAWeek)) {
		    	TotalHoursInAWeek = 0;
		    }
		    $('.TotalHoursInAWeek').text(TotalHoursInAWeek);
	
		    var SalaryWeekly = $('#Salary').val();
		    var TotalHoursInAWeek = parseFloat(HourOne) + parseFloat(HourTwo) + parseFloat(HourThree) + parseFloat(HourFour) + parseFloat(HourFive) + parseFloat(HourSix);
		    var SalaryPerHour = SalaryWeekly / TotalHoursInAWeek;
		    $('#AveragePerHour').val(SalaryPerHour.toFixed(2));

		    var SalaryPerDay = SalaryPerHour * parseFloat(HourOne);
		    $('#SalaryDayOne').val(SalaryPerDay.toFixed(2));
		    SalaryPerDay = SalaryPerHour * parseFloat(HourTwo);
		    $('#SalaryDayTwo').val(SalaryPerDay.toFixed(2));
		    SalaryPerDay = SalaryPerHour * parseFloat(HourThree);
		    $('#SalaryDayThree').val(SalaryPerDay.toFixed(2));
		    SalaryPerDay = SalaryPerHour * parseFloat(HourFour);
		    $('#SalaryDayFour').val(SalaryPerDay.toFixed(2));
		    SalaryPerDay = SalaryPerHour * parseFloat(HourFive);
		    $('#SalaryDayFive').val(SalaryPerDay.toFixed(2));
		    SalaryPerDay = SalaryPerHour * parseFloat(HourSix);
		    $('#SalaryDaySix').val(SalaryPerDay.toFixed(2));
		});
		$('#sidebarCollapse').on('click', function () {
			$('#sidebar').toggleClass('active');
			$('.ncontent').toggleClass('shContent');
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

		$('#HoursDayOne,#HoursDayTwo,#HoursDayThree,#HoursDayFour,#HoursDayFive,#HoursDaySix').on('input', function() {

			HourOne = $("#HoursDayOne").val();
		    HourTwo = $("#HoursDayTwo").val();
		    HourThree = $("#HoursDayThree").val();
		    HourFour = $("#HoursDayFour").val();
		    HourFive = $("#HoursDayFive").val();
		    HourSix = $("#HoursDaySix").val();
		    TotalHoursInAWeek = parseFloat(HourOne) + parseFloat(HourTwo) + parseFloat(HourThree) + parseFloat(HourFour) + parseFloat(HourFive) + parseFloat(HourSix);
		    if (TotalHoursInAWeek < 0 || isNaN(TotalHoursInAWeek)) {
		    	TotalHoursInAWeek = 0;
		    }
		    $('.TotalHoursInAWeek').text(TotalHoursInAWeek);
	
		    SalaryWeekly = $('#Salary').val();
		    TotalHoursInAWeek = parseFloat(HourOne) + parseFloat(HourTwo) + parseFloat(HourThree) + parseFloat(HourFour) + parseFloat(HourFive) + parseFloat(HourSix);
		    SalaryPerHour = SalaryWeekly / TotalHoursInAWeek;
		    $('#AveragePerHour').val(SalaryPerHour.toFixed(2));

		    SalaryPerDay = SalaryPerHour * parseFloat(HourOne);
		    $('#SalaryDayOne').val(SalaryPerDay.toFixed(2));
		    SalaryPerDay = SalaryPerHour * parseFloat(HourTwo);
		    $('#SalaryDayTwo').val(SalaryPerDay.toFixed(2));
		    SalaryPerDay = SalaryPerHour * parseFloat(HourThree);
		    $('#SalaryDayThree').val(SalaryPerDay.toFixed(2));
		    SalaryPerDay = SalaryPerHour * parseFloat(HourFour);
		    $('#SalaryDayFour').val(SalaryPerDay.toFixed(2));
		    SalaryPerDay = SalaryPerHour * parseFloat(HourFive);
		    $('#SalaryDayFive').val(SalaryPerDay.toFixed(2));
		    SalaryPerDay = SalaryPerHour * parseFloat(HourSix);
		    $('#SalaryDaySix').val(SalaryPerDay.toFixed(2));
	 	});
	});
</script>
<style>
	#WeeklyTable th {
		font-size: 14px;
	}
	#WeeklyTable td {

	}
	#WeeklyTable tbody tr:hover {
		background-color: rgba(125, 125, 255, 0.25);
		cursor: pointer;
	}
	.modal-open {
		overflow-y: auto !important;
		padding-right: 0 !important;
	}
</style>
</html>