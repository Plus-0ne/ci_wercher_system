<?php $T_Header;?>
<body>
	<div class="wrapper wercher-background-lowpoly">
		<?php $this->load->view('_template/users/u_sidebar'); ?>
		<div id="content" class="ncontent">
			<div class="container-fluid">
				<?php $this->load->view('_template/users/u_notifications'); ?>
				<div class="col-12 col-sm-12 tabs">
					<ul>
						<li class="tabs-active"><a href="<?php echo base_url() ?>Employees">Employees (<?php echo $get_employee->num_rows()?>)</a></li>
					</ul>
				</div>
				<div class="row rcontent">
					<?php echo $this->session->flashdata('prompts'); ?>
					<div class="col-5 PrintPageName PrintOut">
						<i class="fas fa-info-circle"></i>
						<i>Found <?php echo $get_employee->num_rows(); ?> employee<?php if($get_employee->num_rows() != 1): echo 's'; endif;?> currently in the database.
						</i>
					</div>
					<div class="col-7 text-right">
						<span class="input-bootstrap">
							<i class="sorting-table-icon spinner-border spinner-border-sm mr-2"></i>
							<input id="DTSearch" type="search" class="input-bootstrap" placeholder="Sorting table..." readonly>
						</span>
						<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ExportModal"><i class="fas fa-download"></i> Export</button>
					</div>
					<div class="col-sm-12">
						<div class="table-responsive pt-2 pb-5 pl-2 pr-2">
							<table id="emp" class="table table-bordered PrintOut" style="width: 100%;">
								<thead>
									<tr class="text-center">
										<th> Applicant </th>
										<th> Full Name </th>
										<th> Position </th>
										<th> Client </th>
										<th> Contract Lifespan </th>
										<th class="PrintExclude"> Action </th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($get_employee->result_array() as $row): ?>
										<tr>
											<td class="text-center">
												<div class="col-sm-12">
													<img src="<?php echo $row['ApplicantImage']; ?>" width="70" height="70" class="rounded-circle">
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
												<?php echo $row['LastName']; ?>, <?php echo $row['FirstName']; ?> <?php if($row['MiddleInitial'] != ''): echo $row['MiddleInitial'] . '.'; endif; ?>
											</td>
											<td class="text-center align-middle">
												<?php echo $row['PositionDesired']; ?>
											</td>
											<?php foreach ($getClientOption->result_array() as $nrow): ?>
												<?php if ($row['ClientEmployed'] == $nrow['ClientID']) {
													echo '<td class="text-center align-middle">
													'.$nrow['Name'].'
													</td>';
												} ?>
											<?php endforeach ?>
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
											<td class="text-center align-middle">
												<div class="wercher-progress-daysremaining"><?php
												if ($TimeString != NULL) {
													echo $TimeString;
												} else {
													echo 'Less than 1 day';
												} ?>
											 	</div>
												<a href="<?=base_url()?>ViewEmployee?id=<?php echo $row['ApplicantID']; ?>#Contract" class="progress" style="position: relative; box-shadow: none; background-color: rgba(0, 0, 0, 0.11);" data-toggle="tooltip" data-placement="top" data-html="true" title="Contract Started<br><?php echo $row['DateStarted']; ?><br><br>Contract Ends<br><?php echo $row['DateEnds']; ?><br><br>Salary Expected<br>₱<?php echo $row['SalaryExpected']; ?><br><br><i>Click to open the Contract tab</i>">
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
				"order": [[ 5, "desc" ]],
				buttons: [
	            {
		            extend: 'print',
		            exportOptions: {
		                columns: [ 1, 2, 3, 4, 5, 6 ]
		            }
		        },
		        {
		            extend: 'copyHtml5',
		            exportOptions: {
		                columns: [ 1, 2, 3, 4, 5, 6 ]
		            }
		        },
		        {
		            extend: 'excelHtml5',
		            exportOptions: {
		                columns: [ 1, 2, 3, 4, 5, 6 ]
		            }
		        },
		        {
		            extend: 'csvHtml5',
		            exportOptions: {
		                columns: [ 1, 2, 3, 4, 5, 6 ]
		            }
		        },
		        {
		            extend: 'pdfHtml5',
		            exportOptions: {
		                columns: [ 1, 2, 3, 4, 5, 6 ]
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