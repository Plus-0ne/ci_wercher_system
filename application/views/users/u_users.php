<?php
$T_Header;

// Latest hiree
$GetLatestEmployees = $this->Model_Selects->GetLatestEmployees(3);
$LatestHireesText = '';
$LatestHireesCount = $GetLatestEmployees->num_rows();
$LatestHireesIteration = 0;
if ($LatestHireesCount > 0):
	foreach ($GetLatestEmployees->result_array() as $erow) {
		$thumbnail = $erow['ApplicantImage'];
		$thumbnail = substr($thumbnail, 0, -4);
		$thumbnail = $thumbnail . '_thumb.jpg';
		$LatestHireesIteration++;
		$LatestHireesText = $LatestHireesText . '<a href="ViewEmployee?id=' . $erow['ApplicantID'] . '">' . '<img src="' . $thumbnail .'" height="18px; width: 18px;" class="rounded-circle"> ' . $erow['LastName'] . ', ' . $erow['FirstName'] . ' ' . $erow['MiddleInitial']  .'.';
		if ($erow['NameExtension'] != NULL) {
			$LatestHireesText = $LatestHireesText . ', ' . $erow['NameExtension'];
		}
		if ($LatestHireesIteration == $LatestHireesCount) {
			$LatestHireesText = $LatestHireesText . '</a>';
		} elseif ($LatestHireesIteration == ($LatestHireesCount - 1)) {
			$LatestHireesText = $LatestHireesText . '</a>, and ';
		} elseif ($LatestHireesIteration < $LatestHireesCount) {
			$LatestHireesText = $LatestHireesText . '</a>, ';
		}
	}
endif;
?>
<body>
	<div class="wrapper wercher-background-lowpoly">
		<?php $this->load->view('_template/users/u_sidebar'); ?>
		<div id="content" class="ncontent">
			<div class="container-fluid">
				<?php $this->load->view('_template/users/u_notifications'); ?>
				<div class="col-12 col-sm-12 tabs">
					<ul>
						<li class="tabs-active"><a href="<?php echo base_url() ?>Employee">Employees (<?php echo $get_employee->num_rows()?>)</a></li>
						<li><a href="<?php echo base_url() ?>Employee/Regular">Regular (<?php echo $GetPermanentEmployees->num_rows()?>)</a></li>
					</ul>
				</div>
				<div class="row rcontent">
					<div class="col-sm-12 col-md-9 PrintPageName PrintOut">
						<i class="fas fa-info-circle"></i>
						<i>Found <?php echo $GetTotalEmployees->num_rows(); ?> employee<?php if($GetTotalEmployees->num_rows() != 1): echo 's'; endif;?> currently in the database, <?php echo $get_employee->num_rows(); ?> of which have contract and <?php echo $GetPermanentEmployees->num_rows(); ?> permanent.
						<?php if($LatestHireesCount > 0):
							echo '<br>Latest ';
							if ($LatestHireesCount == 1):
								echo 'hiree is ';
							else:
								echo 'hirees are ';
							endif;
							echo $LatestHireesText;
						endif; ?>.
						</i>
					</div>
					<div class="col-sm-12 col-md-3 text-right">
						<span class="input-bootstrap">
							<i class="sorting-table-icon spinner-border spinner-border-sm mr-2"></i>
							<input id="DTSearch" type="search" class="input-bootstrap" placeholder="Sorting table..." readonly>
						</span>
						<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ExportModal"><i class="fas fa-download"></i> Export</button>
					</div>
					<div class="col-sm-12">
						<div class="table-responsive pt-2 pb-5 pl-2 pr-2">
							<table id="emp" class="table PrintOut" style="width: 100%;">
								<thead>
									<tr class="text-center">
										<th> Employee ID </th>
										<th> Full Name / Position </th>
										<th class="d-none"> Full Name </th>
										<th class="d-none"> Position </th>
										<th> Contact Number </th>
										<th> Client </th>
										<th> Hired On </th>
										<th class="d-none"> Contract Started </th>
										<th class="d-none"> Contract Ends </th>
										<th> Contract Lifespan </th>
										<th class="PrintExclude"> Action </th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($get_employee->result_array() as $row): ?>
										<tr class="table-row-hover">
											<td class="text-center">
												<div class="col-sm-12">
													<?php
													// Thumbnail
													$thumbnail = $row['ApplicantImage'];
													$thumbnail = substr($thumbnail, 0, -4);
													$thumbnail = $thumbnail . '_thumb.jpg';
													// TODO: getimagesize() severely lags the server on large amount of fetches.
													// if(!getimagesize($thumbnail)) {
													// 	$thumbnail = $row['ApplicantImage'];
													// }
													?>
													<img src="<?php echo $thumbnail; ?>" width="70" height="70" class="rounded-circle">
												</div>
												<div class="col-sm-12 align-middle">
													<?php if($row['EmployeeID'] != NULL): ?>
														<?php echo $row['EmployeeID']; ?>
													<?php else: ?>
														<?php echo 'No Employee ID'; ?>
													<?php endif; ?>
												</div>
											</td>
											<td class="text-center align-middle">
												<?php echo $row['LastName']; ?>, <?php echo $row['FirstName']; ?> <?php echo $row['MiddleInitial']; ?>.<?php if ($row['NameExtension'] != NULL): echo ', ' . $row['NameExtension']; endif; ?>
												<br>
												<i style="color: gray;"><?php echo $row['PositionDesired']; ?></i>
											</td>
											<td class="text-center align-middle d-none">
												<?php echo $row['LastName']; ?>, <?php echo $row['FirstName']; ?> <?php echo $row['MiddleInitial']; ?>.<?php if ($row['NameExtension'] != NULL): echo ', ' . $row['NameExtension']; endif; ?>
											</td>
											<td class="text-center align-middle d-none">
												<?php echo $row['PositionDesired']; ?>
											</td>
											<td class="text-center align-middle">
												<?php echo $row['Phone_No']; ?>
											</td>
											<?php foreach ($getClientOption->result_array() as $nrow): ?>
												<?php if ($row['ClientEmployed'] == $nrow['ClientID']) {
													echo '<td class="text-center align-middle"><a href="Employee?client_id=' . $nrow['ClientID'] . '">
													'.$nrow['Name'].'</a>
													</td>';
												} ?>
											<?php endforeach ?>
											<td class="text-center align-middle">
												<div class="d-none"> 
													<?php echo $row['DateStarted']; // For sorting ?>
												</div>
												<?php
													$dateStarts = new DateTime($row['DateStarted']);
													$dayStarts = $dateStarts->format('Y-m-d');
													$dayStarts = DateTime::createFromFormat('Y-m-d', $dayStarts)->format('F d, Y');

													echo $dayStarts;
												?>
											</td>
											<?php
												$currTime = time();
												$strDateEnds = strtotime($row['DateEnds']);
												$strDateStarted = strtotime($row['DateStarted']);
												// PERCENTAGE
												$rPercentage = (($strDateEnds - $currTime) * 100) / ($strDateEnds - $strDateStarted);
												$rPercentage = round($rPercentage);
												// DAYS REMAINING
												$dateTimeZone = new DateTimeZone("Asia/Manila");
												$datetime1 = new DateTime('@' . $currTime, $dateTimeZone);
												$datetime2 = new DateTime('@' . $strDateEnds, $dateTimeZone);
												$interval = $datetime1->diff($datetime2);
												$TimeString = "";
												if($interval->format('%y years, %m months, %d days') == '0 years, 0 months, 0 days') {
													if($interval->format('%H') == '1') {
														$TimeString = $interval->format('%H hour');
														if($interval->format('%I') != NULL || $interval->format('%S') != NULL) {
															$TimeString = $TimeString . ', ';
														}
													} else {
														$TimeString = $interval->format('%H hours');
														if($interval->format('%I') != NULL || $interval->format('%S') != NULL) {
															$TimeString = $TimeString . ', ';
														}
													}
													if($interval->format('%I') == '1') {
														$TimeString = $TimeString . $interval->format('%I minute');
														if($interval->format('%S') != NULL) {
															$TimeString = $TimeString . ', ';
														}
													} else {
														$TimeString = $TimeString . $interval->format('%I minutes');
														if($interval->format('%S') != NULL) {
															$TimeString = $TimeString . ', ';
														}
													}
													if($interval->format('%S') == '1') {
														$TimeString = $TimeString . $interval->format('%S second');
													} else {
														$TimeString = $TimeString . $interval->format('%S seconds');
													}
												} else {
													if($interval->format('%y') == '1') {
														$TimeString = $interval->format('%y year');
														if($interval->format('%m') != NULL || $interval->format('%d') != NULL) {
															$TimeString = $TimeString . ', ';
														}
													} else {
														$TimeString = $interval->format('%y years');
														if($interval->format('%m') != NULL || $interval->format('%d') != NULL) {
															$TimeString = $TimeString . ', ';
														}
													}
													if($interval->format('%m') == '1') {
														$TimeString = $TimeString . $interval->format('%m month');
														if($interval->format('%d') != NULL) {
															$TimeString = $TimeString . ', ';
														}
													} else {
														$TimeString = $TimeString . $interval->format('%m months');
														if($interval->format('%d') != NULL) {
															$TimeString = $TimeString . ', ';
														}
													}
													if($interval->format('%d') == '1') {
														$TimeString = $TimeString . $interval->format('%d day');
													} else {
														$TimeString = $TimeString . $interval->format('%d days');
													}
												}
											?>
											<td class="text-center align-middle d-none">
												<?php
													$dateStarts = new DateTime($row['DateStarted']);
													$dayStarts = $dateStarts->format('Y-m-d');
													$dayStarts = DateTime::createFromFormat('Y-m-d', $dayStarts)->format('F d, Y');
													$hoursStarts = $dateStarts->format('h:i:s A');

													$dateEnds = new DateTime($row['DateEnds']);
													$dayEnds = $dateEnds->format('Y-m-d');
													$dayEnds = DateTime::createFromFormat('Y-m-d', $dayEnds)->format('F d, Y');
													$hoursEnds = $dateEnds->format('h:i:s A');

													echo $dayStarts . ' at ' . $hoursStarts;
												?>
											</td>
											<td class="text-center align-middle d-none">
												<?php
													$dateStarts = new DateTime($row['DateStarted']);
													$dayStarts = $dateStarts->format('Y-m-d');
													$dayStarts = DateTime::createFromFormat('Y-m-d', $dayStarts)->format('F d, Y');
													$hoursStarts = $dateStarts->format('h:i:s A');

													$dateEnds = new DateTime($row['DateEnds']);
													$dayEnds = $dateEnds->format('Y-m-d');
													$dayEnds = DateTime::createFromFormat('Y-m-d', $dayEnds)->format('F d, Y');
													$hoursEnds = $dateEnds->format('h:i:s A');

													echo $dayEnds . ' at ' . $hoursEnds;
												?>
											</td>
											<td class="text-center align-middle" data-toggle="tooltip" data-placement="top" data-html="true" title="<b>Contract Started</b><br><?php echo $dayStarts . '<br>' . $hoursStarts; ?><br><br><b>Contract Ends</b><br><?php echo $dayEnds . '<br>' . $hoursEnds; ?><br><br><b>Salary</b><br>₱<?php echo $row['SalaryExpected']; ?><br><br><i>Click the bar to open the Contract tab</i>">
												<div class="d-none"> 
													<?php echo $row['DateEnds']; // For sorting ?>
												</div>
												<div class="wercher-progress-daysremaining"><?php
												if ($TimeString != NULL) {
													echo $TimeString;
												} else {
													echo 'Less than 1 day';
												} ?>
											 	</div>
												<a href="<?=base_url()?>ViewEmployee?id=<?php echo $row['ApplicantID']; ?>#Contract" class="employee-table-progress-bar" style="position: relative; box-shadow: none; background-color: rgba(0, 0, 0, 0.11);">
													<div class="progress-bar wercher-progress-bar" role="progressbar" style="width: <?php echo $rPercentage; ?>%;" aria-valuenow="<?php echo $rPercentage; ?>" aria-valuemin="0" aria-valuemax="100"><?php echo $rPercentage; ?>%</div>
												</a>
											</td>
											<td class="text-center align-middle PrintExclude" width="110">
												<a class="btn btn-primary btn-sm w-100 mb-1" href="<?=base_url()?>ViewEmployee?id=<?php echo $row['ApplicantID']; ?>"><i class="far fa-eye"></i> View</a>
												<button id="<?php echo $row['ApplicantID']; ?>" type="button" class="btn btn-info btn-sm w-100 mb-1 doc_btn" data-toggle="modal" data-target="#AddSuppDoc"><i class="fas fa-file-upload"></i> Documents</button>
												<!-- <button type="button" class="btn btn-info btn-sm w-100 mb-1" data-toggle="modal" data-target="#HoursWeeklyModal"><i  class="fas fa-clock"></i> Work</button> -->
												<!-- <a class="btn btn-secondary btn-sm w-100 mb-1" href="#"onclick=" return confirm('Update Employee?')"><i class="fas fa-user-edit"></i> Update</a> -->
												<!-- <a href="<?=base_url()?>RemoveEmployee?id=<?php echo $row['ApplicantID']; ?>" class="btn btn-danger btn-sm w-100 mb-1" href="#" onclick="return confirm('Remove Employee?')"><i class="fas fa-lock"></i> Archive</a> -->
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
<!-- ADD DOCUMENTS MODAL -->
<?php $this->load->view('_template/modals/m_adddocuments'); ?>
<!-- EXPORT MODAL -->
<?php $this->load->view('_template/modals/m_export'); ?>
</body>
<?php $this->load->view('_template/users/u_scripts'); ?>
<script type="text/javascript">
	$(document).ready(function () {
		$('.sorting-table-icon').hide();
		$('#DTSearch').attr('placeholder', 'Search table');
		$('#DTSearch').attr('readonly', false);
		$('.showhide').click(function(){
		    $('.link').toggle();

		    var isVisible = $('.link').is(":visible"); 
		    localStorage.setItem('visible', isVisible);
		});
		$('[data-toggle="tooltip"]').tooltip();
		$("#Type").change(function(){
			$('#ViolationNotice').hide();
			$('#BlacklistNotice').hide();
			if ( $(this).val() == "Violation" ) { 
				$("#ViolationNotice").fadeIn();
		    }
		    if ( $(this).val() == "Blacklist" ) { 
				$("#BlacklistNotice").fadeIn();
		    }
		});
		var table = $('#emp').DataTable( {
			sDom: 'lrtip',
			"bLengthChange": false,
			"order": [[ 9, "asc" ]],
			buttons: [
            {
	            extend: 'print',
	            exportOptions: {
	                columns: [ 0, 2, 3, 4, 5, 7, 8 ]
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
	                columns: [ 0, 2, 3, 4, 5, 7, 8 ]
	            }
	        },
	        {
	            extend: 'excelHtml5',
	            exportOptions: {
	                columns: [ 0, 2, 3, 4, 5, 7, 8 ]
	            }
	        },
	        {
	            extend: 'csvHtml5',
	            exportOptions: {
	                columns: [ 0, 2, 3, 4, 5, 7, 8 ]
	            }
	        },
	        {
	            extend: 'pdfHtml5',
	            exportOptions: {
	                columns: [ 0, 2, 3, 4, 5, 7, 8 ]
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
		$('#MoreOptions').on('click', function () {
			$('#MoreOptions').hide();
			$('.modal-fade').fadeIn();
		});
		$('#DTSearch').on('keyup change', function(){
			table.search($(this).val()).draw();
		})
		$('.doc_btn').on('click', function () {
			$('#Pass_ID').val($(this).attr('id'));
		});
		$('#blah').click(function(){ $('#imgInp').trigger('click'); });
		function readURL(input) {
			if (input.files && input.files[0]) {
				var reader = new FileReader();
				reader.onload = function(e) {
					$('#blah').attr('src', e.target.result);
				}
				reader.readAsDataURL(input.files[0]);
			}
		}
		$("#imgInp").change(function() {
			readURL(this);
			$('#pImageChecker').val('123');
		});
		$("#fileselect").change(function() {
			$('wercher-drop-area-file').hide();
		});
	});
</script>
</html>