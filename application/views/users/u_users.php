<?php $T_Header;?>
<body>
	<div class="wrapper">
		<?php $this->load->view('_template/users/u_sidebar'); ?>
		<div id="content" class="ncontent">
			<div class="container-fluid">
				<?php $this->load->view('_template/users/u_notifications'); ?>
				<div class="row p-5">
					<?php echo $this->session->flashdata('prompts'); ?>
					<div class="col-4 col-sm-4 col-md-4 PrintPageName PrintOut">
						<h4 class="tabs-icon">
							<i class="fas fa-user-tie fa-fw"></i> Employees x <?php echo $get_employee->num_rows() ?>
						</h4>
					</div>
					<div class="col-8 col-sm-8 col-md-8 text-right">
						<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ExportModal"><i class="fas fa-download"></i> Export</button>
					</div>
					<div class="col-sm-12">
						<div class="table-responsive pt-5 pb-5 pl-2 pr-2">
							<table id="emp" class="table table-bordered PrintOut" style="width: 100%;">
								<thead>
									<tr class="text-center">
										<th> Applicant </th>
										<th> Full Name </th>
										<th> Position </th>
										<th> Client </th>
										<th> Date Hired </th>
										<th> End of Contract </th>
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
													<?php echo $row['ApplicantID']; ?>
												</div>
											</td>
											<td class="text-center align-middle">
												<?php echo $row['LastName']; ?>, <?php echo $row['FirstName']; ?> <?php echo $row['MiddleInitial']; ?>.
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
											<td class="text-center align-middle">
												<?php echo $row['DateStarted']; ?>
											</td>
											<td class="text-center align-middle">
												<?php echo $row['DateEnds']; ?>
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
	<!-- Modal -->
	<div class="modal fade" id="AddSuppDoc" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			
			<div class="modal-content">
				<?php echo form_open_multipart(base_url().'AddSupDoc','method="post"'); ?>
					<input id="pImageChecker" type="hidden" name="pImageChecker">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Add Documents</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<input id="Pass_ID" type="hidden" name="ApplicantID">
						<div class="form-row" style="margin-left: 15px; margin-right: 15px;">
							<?php if($this->agent->is_mobile()): ?>
							<div class="form-group col-sm-12 mt-5">
								<div class="input-icon-sm">
									<input id="pFile" type="file" name="pFile" placeholder="Choose PDF file to upload" style="padding-left: 45px;" value="">
									<i class="fas fa-file-pdf" style="width: 45px;"></i>
								</div>
							</div>
							<?php else: ?>
							<input type="hidden" id="MAX_FILE_SIZE" name="MAX_FILE_SIZE" value="300000" />

							<div class="wercher-drop-area form-group col-sm-12 text-center">
								<div id="output">
									<div class="wercher-drop-area-file">
										<p>
											<i class="fas fa-download"></i>
										</p>
										<label for="fileselect">Choose a PDF file</label>
										<input type="file" id="fileselect" name="pFile" />
										or drop it here
										<div id="output-output">
										</div>
									</div>
								</div>
							</div>
							<?php endif; ?>
						</div>
						<hr>
						<div id="ViolationNotice" class="row ml-auto mr-auto pb-1 w-100" style="display: none;">
							<div class="col-sm-12 col-mb-12 w-100 text-center document-notice-violation py-2">
								<div class="col-sm-12 pb-2">
									<i class="fas fa-exclamation-triangle" style="font-size: 24px;"></i>
								</div>
								<div class="col-sm-12">
									You are marking this document as a violation.
								</div>
							</div>
						</div>
						<div id="BlacklistNotice" class="row ml-auto mr-auto pb-1 w-100" style="display: none;">
							<div class="col-sm-12 col-mb-12 w-100 text-center document-notice-blacklist py-2">
								<div class="col-sm-12 pb-2">
									<i class="fas fa-exclamation-triangle" style="font-size: 24px;"></i>
								</div>
								<div class="col-sm-12">
									You are blacklisting this individual.
								</div>
							</div>
						</div>
						<div class="form-row" style="margin-left: 10px; margin-right: 10px;">
							<div class="form-group col-sm-4 text-center">
								<label>Type</label>
								<select id="Type" class="form-control" name="Type">
									<option value="Document">Document</option>
									<option value="Violation">Violation</option>
									<option value="Blacklist">Blacklist</option>
								</select>
							</div>
							<div class="form-group col-sm-8 text-center">
								<label>Subject</label>
								<input class="form-control" type="text" name="Subject">
							</div>
						</div>
						<div class="form-group col-sm-12 text-center">
							<label>Description</label>
							<textarea class="form-control" name="Description" rows="6"></textarea>
						</div>
						<div class="form-group col-sm-12 text-center">
							<label>Remarks</label>
							<textarea class="form-control" name="Remarks" rows="6"></textarea>
						</div>
						</div>
						<div class="modal-footer">
							<button type="submit" class="btn btn-primary"><i class="fas fa-plus"></i> Add</button>
						</div>
					<?php echo form_close(); ?>
				</div>
				
			</div>
		</div>
		<!-- EXPORT MODAL -->
	<?php $this->load->view('_template/modals/m_export'); ?>
	</body>
	<?php $this->load->view('_template/users/u_scripts'); ?>
	<script type="text/javascript">
		$(document).ready(function () {
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
			$('#sidebarCollapse').on('click', function () {
				$('#sidebar').toggleClass('active');
				$('.ncontent').toggleClass('shContent');
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

			$('#SalaryRaw,#HoursDayOne,#HoursDayTwo,#HoursDayThree,#HoursDayFour,#HoursDayFive,#HoursDaySix').on('input', function() {
			// TODO: Clean & optimize this.
			$('#SalaryOvertimeFade').fadeIn();
			$('#SalaryDays').fadeIn();

			var HourOne = $("#HoursDayOne").val();
			var HourTwo = $("#HoursDayTwo").val();
			var HourThree = $("#HoursDayThree").val();
			var HourFour = $("#HoursDayFour").val();
			var HourFive = $("#HoursDayFive").val();
			var HourSix = $("#HoursDaySix").val();

			var SalaryWeekly = $('#SalaryRaw').val();
			var TotalHoursInAWeek = parseFloat(HourOne) + parseFloat(HourTwo) + parseFloat(HourThree) + parseFloat(HourFour) + parseFloat(HourFive) + parseFloat(HourSix);
			var SalaryPerHour = SalaryWeekly / TotalHoursInAWeek;
			$('#SalaryPerHour').val(SalaryPerHour.toFixed(2));

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