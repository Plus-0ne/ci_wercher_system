<?php 

$T_Header;
require 'vendor/autoload.php';
use Carbon\Carbon;

$now = new DateTime();
$toDate = $now->format('Y-m-d');
$fromDate = $now;
$fromDate = $fromDate->modify('-1 month');
$fromDate = $fromDate->format('Y-m-d');

$GetPayrollProvisions = $this->Model_Selects->GetAllPayrollProvisions();


?>
<body>
	<div class="wrapper wercher-background-lowpoly">
		<?php $this->load->view('_template/users/u_sidebar'); ?>
		<div id="content" class="ncontent">
			<div class="container-fluid">
				<?php $this->load->view('_template/users/u_notifications'); //TODO: Limit the bell to HR access? ?>
				<div class="col-12 col-sm-12 tabs">
					<ul>
						<li><a href="<?php echo base_url() ?>Payroll">Salary</a></li>
						<li><a href="<?php echo base_url() ?>Receivables">Receivables</a></li>
						<li><a href="<?php echo base_url() ?>Loans">Loans</a></li>
						<li class="tabs-active"><a href="<?php echo base_url() ?>Provisions">Provisions</a></li>
						<li><a href="<?php echo base_url() ?>PayrollAttendance">Attendance</a></li>
						<li><a href="<?php echo base_url() ?>PayrollGrossPay">Gross Pay</a></li>
						<li><a href="<?php echo base_url() ?>PayrollMandatoryDed">Mandatory Ded.</a></li>
						<li><a href="<?php echo base_url() ?>PayrollNetPay">Net Pay</a></li>
						<li><a href="<?php echo base_url() ?>PayrollSummary">Summary</a></li>
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
										<th>Provision</th>
										<th>For</th>
										<th>Amount</th>
										<th>Mode</th>
										<th>Year</th>
										<th>Month</th>
										<th>Week</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($GetPayrollProvisions->result_array() as $row): 
										$name = $row['ProvisionName'] ?? 'N/A';
										$applicantID = $row['ApplicantID'] ?? 'N/A';
										$checkApplicant = $this->Model_Selects->CheckApplicant($applicantID);
										if ($checkApplicant->num_rows() > 0) {
											foreach ($checkApplicant->result_array() as $arow) {
												// Name Handler
												$fullName = '';
												$fullNameHover = '';
												$isFullNameHoverable = false;
												if ($arow['LastName']) {
													$fullName = $fullName . $arow['LastName'] . ', ';
													$fullNameHover = $fullNameHover . $arow['LastName'] . ', ';
												} else {
													$fullNameHover = $fullNameHover . '[<i>No Last Name</i>], ';
													$isFullNameHoverable = true;
												}
												if ($arow['FirstName']) {
													$fullName = $fullName . $arow['FirstName'] . ' ';
													$fullNameHover = $fullNameHover . $arow['FirstName'] . ' ';
												} else {
													$fullNameHover = $fullNameHover . '[<i>No First Name</i>] ';
													$isFullNameHoverable = true;
												}
												if ($arow['MiddleName']) {
													$fullName = $fullName . $arow['MiddleName'][0] . '.';
													$fullNameHover = $fullNameHover . $arow['MiddleName'][0] . '.';
												} else {
													$fullNameHover = $fullNameHover . '[<i>No MI</i>].';
													$isFullNameHoverable = true;
												}
												if ($arow['NameExtension']) {
													$fullName = $fullName . ', ' . $arow['NameExtension'];
													$fullNameHover = $fullNameHover . ', ' . $arow['NameExtension'];
												}
												if (strlen($fullName) > 45) {
													$fullName = substr($fullName, 0, 45);
													$fullName = $fullName . '...';
													$isFullNameHoverable = true;
												}
											}
										}
										$amount = $row['Amount'] ?? 0; 
										$mode = $row['Type'] ?? 0;
										$modeText = '';
										switch ($mode) {
											case '0':
												$modeText = 'Weekly';
												break;
											case '1':
												$modeText = 'Semi-Monthly';
												break;
											case '2':
												$modeText = 'Monthly';
												break;
										}
										$year = $row['Year'] ?? 0; 
										$month = $row['Month'] ?? 0; 
										$week = $row['week'] ?? 0; ?>
										<tr class="table-row-hover">
											<td class="text-center align-middle">
												<?=$name;?>
											</td>
											<td class="text-center align-middle">
												<?=$fullName;?>
											</td>
											<td class="text-center align-middle">
												₱<?=$amount;?>
											</td>
											<td class="text-center align-middle">
												<?=$modeText;?>
											</td>
											<td class="text-center align-middle">
												<?=$year;?>
											</td>
											<td class="text-center align-middle">
												<?=$month;?>
											</td>
											<td class="text-center align-middle">
												<?=$week;?>
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
	                columns: [ 0, 1, 2, 3, 4, 5, 6 ]
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
	                columns: [ 0, 1, 2, 3, 4, 5, 6 ]
	            }
	        },
	        {
	            extend: 'excelHtml5',
	            exportOptions: {
	                columns: [ 0, 1, 2, 3, 4, 5, 6 ]
	            }
	        },
	        {
	            extend: 'csvHtml5',
	            exportOptions: {
	                columns: [ 0, 1, 2, 3, 4, 5, 6 ]
	            }
	        },
	        {
	            extend: 'pdfHtml5',
	            exportOptions: {
	                columns: [ 0, 1, 2, 3, 4, 5, 6 ]
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