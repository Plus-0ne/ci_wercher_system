<?php 

$T_Header;
require 'vendor/autoload.php';
use Carbon\Carbon;

?>
<body>
	<div class="wrapper wercher-background-lowpoly">
		<?php $this->load->view('_template/users/u_sidebar'); ?>
		<div id="content" class="ncontent">
			<div class="container-fluid">
				<?php $this->load->view('_template/users/u_notifications'); //TODO: Limit the bell to HR access? ?>
				<div class="col-12 col-sm-12 tabs">
					<ul>
						<li class="tabs-active"><a href="<?php echo base_url() ?>Salary">Salary (<?php echo $ShowClients->num_rows()?>)</a></li>
						<li><a href="<?php echo base_url() ?>Receivables">Receivables</a></li>
						<li><a href="<?php echo base_url() ?>Loans">Loans</a></li>
						<li><a href="<?php echo base_url() ?>Provisions">Provisions</a></li>
						<li><a href="<?php echo base_url() ?>PayrollAttendance">Attendance</a></li>
						<li><a href="<?php echo base_url() ?>PayrollGrossPay">Gross Pay</a></li>
						<li><a href="<?php echo base_url() ?>PayrollMandatoryDed">Mandatory Ded.</a></li>
						<li><a href="<?php echo base_url() ?>PayrollNetPay">Net Pay</a></li>
						<li><a href="<?php echo base_url() ?>PayrollSummary">Summary</a></li>
					</ul>
				</div>
				<div class="row rcontent">
					<div class="col-5 PrintPageName PrintOut">
						<i class="fas fa-info-circle"></i>
						<i>Found <?php echo $ShowClients->num_rows(); ?> client<?php if($ShowClients->num_rows() != 1): echo 's'; endif;?> currently stored in the database.
						</i>
					</div>
					<div class="col-7 text-right">
						<span class="input-bootstrap">
							<i class="sorting-table-icon spinner-border spinner-border-sm mr-2"></i>
							<input id="DTSearch" type="search" class="input-bootstrap" placeholder="Sorting table..." readonly>
						</span>
						<button type="button" class="ImportButton btn btn-success"><i class="fas fa-file-excel"></i> Import Excel</button>
						<a href="SSS_Table" class="btn btn-primary">
							<i class="fas fa-table"></i> SSS
						</a>
						<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ExportModal"><i class="fas fa-download"></i> Export</button>
					</div>
					<div class="col-sm-12">
						<div class="table-responsive pt-2 pl-2 pr-2">
							<table id="ListClients" class="table PrintOut" style="width: 100%;">
								<thead>
									<tr class="text-center align-middle">
										<th> Client </th>
										<th> Address </th>
										<th> Contact </th>
										<th style="width: 25px;"> Employees </th>
										<!-- <th>Starting Week</th>
										<th style="width: 25px;">Current Week</th> -->
										<th class="text-center PrintExclude" style="width: 125px;"> Payroll </th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($ShowClients->result_array() as $row): ?>
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
														$Week = 1;
													} elseif ($diff <= 14 && $diff > 7) {
														$Week = 2;
													} elseif ($diff <= 21 && $diff > 14) {
														$Week = 3;
													} elseif ($diff <= 28 && $diff > 21) {
														$Week = 4;
													} else {
														$Week = 1; // Default;
													}

													$sssFrom = $prow['SSSDayFrom'];
													$sssTo = $prow['SSSDayTo'];
													$hdmfFrom = $prow['HDMFDayFrom'];
													$hdmfTo = $prow['HDMFDayTo'];
												}
											} else {
												$PrimaryWeek = 'N/A';
												$sssFrom = 'N/A';
												$sssTo = 'N/A';
												$hdmfFrom = 'N/A';
												$hdmfTo = 'N/A';
											}

											$clientName = $row['Name'];
											$isClientNameHoverable = false;
											if (strlen($clientName) > 25) {
												$clientName = substr($clientName, 0, 25);
												$clientName = $clientName . '...';
												$isClientNameHoverable = true;
											}
											$clientNameHover = $row['Name'];
											$clientAddress = $row['Address'];
											$clientContact = $row['ContactNumber'];
										?>
										<tr class="text-center">
											<td<?php if ($isClientNameHoverable): ?> data-toggle="tooltip" data-placement="top" data-html="true" title="<?php echo $clientNameHover; ?>"<?php endif; ?>>
												<?php echo $clientName; ?>
											</td>
											<td>
												<?php echo $clientAddress; ?>
											</td>
											<td>
												<?php 
													if ($clientContact) {
														echo $clientContact;
													} else {
														echo '<i style="color: gray;">No record.</i>';
													}
												?>
											</td>
											<td>
												<?php echo $this->Model_Selects->GetWeeklyListEmployee($row['ClientID'])->num_rows(); ?>
											</td>
											<!-- <td <?php if(!empty($elapsed)): ?> data-toggle="tooltip" data-placement="top" data-html="true" title="<?php echo $elapsed->diffForHumans(); ?>"<?php endif; ?>>
												<?php echo $day; ?>
											</td>
											<td>
												<?php echo $Week; ?>
											</td> -->
											<td class="text-center PrintExclude">
												<button id="<?php echo $row['ClientID']; ?>" type="button" class="btn btn-info glow-gold btn-sm w-100 mb-1 ViewClientIDButton"  data-toggle="modal" data-target="#ModalClientView"><i class="fas fa-calendar-alt"></i> Attendance</button>
												<button id="<?php echo $row['ClientID']; ?>" type="button" class="payrollconfig-btn btn btn-info btn-sm w-100 mb-1 SetPrimaryClientIDButton" data-toggle="modal" data-target="#ModalSetWeek" data-startingweek="<?php echo $PrimaryWeek ?>" data-sssfrom="<?php echo $sssFrom; ?>" data-sssto="<?php echo $sssTo; ?>" data-hdmffrom="<?php echo $hdmfFrom; ?>" data-hdmfto="<?php echo $hdmfTo; ?>"><i class="fas fa-cog"></i> Payroll Config</button>
												<button id="<?php echo $row['ClientID']; ?>" type="button" class="excel_formatbtn btn btn-success btn-sm w-100 mb-1"  data-toggle="modal" data-target="#DateFroto_modal" value="<?php echo $row['Name']; ?>"><i class="fas fa-file-download"></i> Download Excel</button>
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
			"order": [[ 3, "desc" ]],
			buttons: [
            {
	            extend: 'print',
	            exportOptions: {
	                columns: [ 0, 1, 2, 3 ]
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
	                columns: [ 0, 1, 2, 3 ]
	            }
	        },
	        {
	            extend: 'excelHtml5',
	            exportOptions: {
	                columns: [ 0, 1, 2, 3 ]
	            }
	        },
	        {
	            extend: 'csvHtml5',
	            exportOptions: {
	                columns: [ 0, 1, 2, 3 ]
	            }
	        },
	        {
	            extend: 'pdfHtml5',
	            exportOptions: {
	                columns: [ 0, 1, 2, 3 ]
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