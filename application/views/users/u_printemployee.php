<style>
	html,body
	{
		background-color: #FFFFFF;
	}
</style>
<body>
	<div class="wrapper">
		<?php $this->load->view('_template/users/u_sidebar'); ?>
		<div id="content" class="ncontent">
			<div class="container-fluid">
				<?php $this->load->view('_template/users/u_notifications'); ?>
				<div class="row m-5 p-2 eprint-commandcard">
					<div class="col-sm-12 eprint-commandcard-title">
						<i class="fas fa-cog"></i> <b>Command Card</b>
					</div>
					<?php echo $this->session->flashdata('prompts'); ?>
					<div class="col-sm-6 mt-4 eprint-commandcard-text">
						<b>GENERAL</b>
						<ul>
							<li>Academic History, Employment Records, and Machine Operated will be hidden on print if there is no data.</li>
							<li>You can modify the size of the Employee's photo by clicking the buttons on the right.</li>
							<li>Clicking Print will prompt the browser to prepare the page to be printed. It will not print until you confirm it through the prompt.</li>
						</ul>
						<div class="row">
							<div class="col-sm-12">
								<button type="button" class="btn btn-success w-100 eprint-print-btn" onClick="printContent('PrintOut')"><i class="fas fa-print"></i> Print</button>
							</div>
						</div>
					</div>
					<div class="col-sm-6 mt-4 eprint-commandcard-text">
						<b>EMPLOYEE'S PHOTO SIZE</b>
						<div class="row">
							<div class="col-sm-4">
								<div class="col-sm-12">
									<button id="ResizeHalfInch" type="button" class="btn btn-primary w-100">0.5 x 0.5 inches</button>
								</div>
								<div class="col-sm-12 mt-1">
									<button id="ResizeOneInch" type="button" class="btn btn-primary w-100">1 x 1 inch</button>
								</div>
								<div class="col-sm-12 mt-1">
									<button id="ResizeOneAndAHalfInch" type="button" class="btn btn-primary w-100">1.5 x 1.5 inches</button>
								</div>
								<div class="col-sm-12 mt-1">
									<button id="ResizeTwoInch" type="button" class="btn btn-primary w-100">2 x 2 inches</button>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="col-sm-12 mt-2">
									- 48 pixels
								</div>
								<div class="col-sm-12 mt-3">
									- 96 pixels
								</div>
								<div class="col-sm-12 mt-3">
									- 144 pixels
								</div>
								<div class="col-sm-12 mt-3">
									- 192 pixels
								</div>
							</div>
							<div class="col-sm-5">
								<label>Or custom value in pixels</label>
								<input id="ResizeCustom" class="form-control w-75" type="number" min="1" max="1920">
							</div>
						</div>
					</div>
				</div>
				<div class="row px-5 PrintOut">
					<div class="col-md-6">
						<img class="eprint-logo" src="<?=base_url()?>assets/img/wercher_logo.png">
						<div class="col-sm-12 eprint-logo-text">
							<b>WERCHER SOLUTIONS AND RESOURCES<br>LABOR SERVICE COOPERATIVE</b>
						</div>
						<div class="col-sm-12 eprint-logo-subtext">
							<i>Lower Maingate, Sitio Tagbac,<br>Brgy. San Jose, Antipolo City</i>
						</div>
						<div class="col-sm-12 eprint-logo-info">
							<b>Employee's Information</b>
						</div>
					</div>
					<div class="col-md-6 mb-5 eprint-photo">
						<img id="EPrintPhoto" src="<?php echo $ApplicantImage; ?>" width="192" height="192">
					</div>
					<div class="col-md-2 eprint-field-title">
						<h6>
							Position Desired
						</h6>
					</div>
					<div class="col-md-4 eprint-field-det">
						<p>
							<?php echo $PositionDesired; ?> <?php if($PositionGroup != NULL) { echo ' (' . $PositionGroup . ')'; } ?>
						</p>
					</div>
					<div class="col-md-2 eprint-field-title">
						<h6>
							Name
						</h6>
					</div>
					<div class="col-md-4 eprint-field-det">
						<p>
							<?php echo $LastName; ?> , <?php echo $FirstName; ?>  <?php echo $MiddleInitial; ?>.
						</p>
					</div>
					<div class="col-md-2 eprint-field-title">
						<h6>
							Salary Expected
						</h6>
					</div>
					<div class="col-md-4 eprint-field-det">
						<p>
							<?php echo $SalaryExpected; ?>
						</p>
					</div>
					<div class="col-md-2 eprint-field-title">
						<h6>
							<?php if($Status == 'Employed'): ?>
								Employee ID
							<?php else: ?>
								Applicant ID
							<?php endif; ?>
						</h6>
					</div>
					<div class="col-md-4 eprint-field-det">
						<p>
							<?php if($Status == 'Employed'): ?>
								<?php echo $EmployeeID; ?>
							<?php else: ?>
								<?php echo $ApplicantID; ?>
							<?php endif; ?>
						</p>
					</div>
					<div class="col-md-2 eprint-field-title">
						<h6>
							Status
						</h6>
					</div>
					<div class="col-md-4 eprint-field-det">
						<p>
							<?php echo $Status; ?>
						</p>
					</div>
					<div class="col-md-2 eprint-field-title">
						<h6>
							Gender
						</h6>
					</div>
					<div class="col-md-4 eprint-field-det">
						<p>
							<?php echo $Gender; ?>
						</p>
					</div>
					<div class="col-md-2 eprint-field-title">
						<h6>
							Age
						</h6>
					</div>
					<div class="col-md-4 eprint-field-det">
						<p>
							<?php echo $Age; ?>
						</p>
					</div>
					<div class="col-md-2 eprint-field-title">
						<h6>
							Height
						</h6>
					</div>
					<div class="col-md-4 eprint-field-det">
						<p>
							<?php echo $Height; ?>
						</p>
					</div>
					<div class="col-md-2 eprint-field-title">
						<h6>
							Weight
						</h6>
					</div>
					<div class="col-md-4 eprint-field-det">
						<p>
							<?php echo $Weight; ?>
						</p>
					</div>
					<div class="col-md-2 eprint-field-title">
						<h6>
							Religion
						</h6>
					</div>
					<div class="col-md-4 eprint-field-det">
						<p>
							<?php echo $Religion; ?>
						</p>
					</div>
					<div class="col-md-2 eprint-field-title">
						<h6>
							Birth Date
						</h6>
					</div>
					<div class="col-md-4 eprint-field-det">
						<p>
							<?php echo $BirthDate; ?>
						</p>
					</div>
					<div class="col-md-2 eprint-field-title">
						<h6>
							Birth Place
						</h6>
					</div>
					<div class="col-md-4 eprint-field-det">
						<p>
							<?php echo $BirthPlace; ?>
						</p>
					</div>
					<div class="col-md-2 eprint-field-title">
						<h6>
							Citizenship
						</h6>
					</div>
					<div class="col-md-4 eprint-field-det">
						<p>
							<?php echo $Citizenship; ?>
						</p>
					</div>
					<div class="col-md-2 eprint-field-title">
						<h6>
							Civil Status
						</h6>
					</div>
					<div class="col-md-4 eprint-field-det">
						<p>
							<?php echo $CivilStatus; ?>
						</p>
					</div>
					<div class="col-md-2 eprint-field-title">
						<h6>
							# of Children
						</h6>
					</div>
					<div class="col-md-4 eprint-field-det">
						<p>
							<?php echo $No_OfChildren; ?>
						</p>
					</div>
					<div class="col-md-2 eprint-field-title">
						<h6>
							Applied On
						</h6>
					</div>
					<div class="col-md-4 eprint-field-det">
						<p>
							<?php echo $AppliedOn; ?>
						</p>
					</div>
				</div>
				<div class="row px-5 pt-5 PrintOut">
					<div class="col-md-2 eprint-field-title">
						<h6>
							S.S.S. #
						</h6>
					</div>
					<div class="col-md-4 eprint-field-det">
						<p>
							<?php echo $SSS_No; ?>
						</p>
					</div>
					<div class="col-md-2 eprint-field-title">
						<h6>
							Effective Date of Coverage
						</h6>
					</div>
					<div class="col-md-4 eprint-field-det">
						<p>
							<?php echo $EffectiveDateCoverage; ?>
						</p>
					</div>
					<div class="col-md-2 eprint-field-title">
						<h6>
							Residence Certificate No.
						</h6>
					</div>
					<div class="col-md-4 eprint-field-det">
						<p>
							<?php echo $ResidenceCertificateNo; ?>
						</p>
					</div>
					<div class="col-md-2 eprint-field-title">
						<h6>
							Address Present
						</h6>
					</div>
					<div class="col-md-4 eprint-field-det">
						<p>
							<?php echo $Address_Present; ?>
						</p>
					</div>
					<div class="col-md-2 eprint-field-title">
						<h6>
							Tax Identification No.
						</h6>
					</div>
					<div class="col-md-4 eprint-field-det">
						<p>
							<?php echo $TIN; ?>
						</p>
					</div>
					<div class="col-md-2 eprint-field-title">
						<h6>
							Address Provincial
						</h6>
					</div>
					<div class="col-md-4 eprint-field-det">
						<p>
							<?php echo $Address_Provincial; ?>
						</p>
					</div>
					<div class="col-md-2 eprint-field-title">
						<h6>
							HDMF
						</h6>
					</div>
					<div class="col-md-4 eprint-field-det">
						<p>
							<?php echo $HDMF; ?>
						</p>
					</div>
					<div class="col-md-2 eprint-field-title">
						<h6>
							Address Manila
						</h6>
					</div>
					<div class="col-md-4 eprint-field-det">
						<p>
							<?php echo $Address_Manila; ?>
						</p>
					</div>
					<div class="col-md-2 eprint-field-title">
						<h6>
							PHILHEALTH
						</h6>
					</div>
					<div class="col-md-4 eprint-field-det">
						<p>
							<?php echo $PhilHealth; ?>
						</p>
					</div>
					<div class="col-md-2 eprint-field-title">
						<h6>
							ATM #
						</h6>
					</div>
					<div class="col-md-4 eprint-field-det">
						<p>
							<?php echo $ATM_No; ?>
						</p>
					</div>
				</div>
				<div class="row pl-5 pt-4 PrintOut">
					<div class="col-sm-12">
						<h5>
							<i class="fas fa-book"></i> Academic History
						</h5>
					</div>
					<div class="col-sm-12">
						<div class="table-responsive">
							<table class="table table-condensed">
								<thead>
									<th>Level</th>
									<th>School Name</th>
									<th>School Address</th>
									<th>From Year</th>
									<th>To Year</th>
									<th>Highest Degree / Certificate Attained</th>
								</thead>
								<tbody>
									<?php if ($GetAcadHistory->num_rows() > 0) { ?>
										<?php foreach ($GetAcadHistory->result_array() as $row): ?>
											<?php if ($ApplicantID == $row['ApplicantID']) { ?>
												<tr>
													<td><?php echo $row['Level'];?></td>
													<td><?php echo $row['SchoolName'];?></td>
													<td><?php echo $row['SchoolAddress'];?></td>
													<td><?php echo $row['DateStarted'];?></td>
													<td><?php echo $row['DateEnds'];?></td>
													<td><?php echo $row['HighDegree'];?></td>
												</tr>
											<?php } ?>
										<?php endforeach ?>
									<?php } else { ?>
										<tr class="w-100 text-center">
											<td colspan="6">
												<h5>
													No Data
												</h5>
											</td>
										</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<div class="row pt-2 pl-5 PrintOut">
					<div class="col-sm-12">
						<h5>
							<i class="fas fa-stream"></i> Employment Record
						</h5>
					</div>
					<div class="col-sm-12">
						<div class="table-responsive">
							<table class="table table-condensed">
								<thead>
									<th>Name</th>
									<th>Address</th>
									<th>Period Covered</th>
									<th>Position</th>
									<th>Salary</th>
									<th>Cause of Separation</th>
								</thead>
								<tbody>
									<?php if ($employment_record->num_rows() > 0) { ?>
										<?php foreach ($employment_record->result_array() as $row): ?>
											<?php if ($ApplicantID == $row['ApplicantID']) { ?>
												<tr>
													<td><?php echo $row['Name'];?></td>
													<td><?php echo $row['Address'];?></td>
													<td><?php echo $row['PeriodCovered'];?></td>
													<td><?php echo $row['Position'];?></td>
													<td><?php echo $row['Salary'];?></td>
													<td><?php echo $row['CauseOfSeparation'];?></td>
												</tr>
											<?php } ?>
										<?php endforeach ?>
									<?php } else { ?>
										<tr class="w-100 text-center">
											<td colspan="6">
												<h5>
													No Data
												</h5>
											</td>
										</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<div class="row pt-2 pl-5 PrintOut">
					<div class="col-sm-12">
						<h5>
							<i class="fas fa-cog"></i> Machine Operated
						</h5>
					</div>
					<div class="col-sm-12">
						<div class="table-responsive">
							<table class="table table-condensed">
								<thead>
									<th>Machine Name</th>
									
								</thead>
								<tbody>
									<?php if ($Machine_Operatessss->num_rows() > 0) { ?>
										<?php foreach ($Machine_Operatessss->result_array() as $row): ?>
											<?php if ($ApplicantID == $row['ApplicantID']) { ?>
												<tr>
													<td><?php echo $row['MachineName'];?></td>
												</tr>
											<?php } ?>
										<?php endforeach ?>
									<?php } else { ?>
										<tr class="w-100 text-center">
											<td>
												<h5>
													No Data
												</h5>
											</td>
										</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
<?php $this->load->view('_template/users/u_scripts');?>
<script type="text/javascript">
	$(document).ready(function () {
		$('#ResizeHalfInch').on('click', function () {
			$('#EPrintPhoto').attr('width', '48');
			$('#EPrintPhoto').attr('height', '48');
		});
		$('#ResizeOneInch').on('click', function () {
			$('#EPrintPhoto').attr('width', '96');
			$('#EPrintPhoto').attr('height', '96');
		});
		$('#ResizeOneAndAHalfInch').on('click', function () {
			$('#EPrintPhoto').attr('width', '144');
			$('#EPrintPhoto').attr('height', '144');
		});
		$('#ResizeTwoInch').on('click', function () {
			$('#EPrintPhoto').attr('width', '192');
			$('#EPrintPhoto').attr('height', '192');
		});
		$('#ResizeCustom').bind('input', function () {
			$('#EPrintPhoto').attr('width', $('#ResizeCustom').val());
			$('#EPrintPhoto').attr('height', $('#ResizeCustom').val());
		});
		$('#ClientSelect').on('change', function() {
			<?php foreach ($getClientOption->result_array() as $row): ?>
			<?php
			// Count how many employees are on the client
			$CountEmployees = $this->Model_Selects->GetClientsEmployed($row['ClientID'])->num_rows();
			$CountEmployees++;
			$CountEmployees = str_pad($CountEmployees,4,0,STR_PAD_LEFT);
			// Get the current year
			$Year = date('Y');
			$Year = substr($Year, 2);
			// Concatenate them all together
			$EmployeeID = 'WC' . $row['EmployeeIDSuffix'] . '-' . $CountEmployees . '-' . $Year;
			?>
			if ($(this).val() == '<?php echo $row['ClientID']; ?>') {
				$(this).closest('#ClientModal').find('#EmployeeID').val('<?php echo $EmployeeID; ?>');
			}
			<?php endforeach; ?>
		});
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
		$('.doc_btn').on('click', function () {
			$('#Pass_ID').val($(this).attr('id'));
		});
		$('.employee-tabs-select').removeClass('employee-tabs-active');
		$('.employee-tabs-group-content').hide();
		var hashValue = window.location.hash.substr(1);
		if (hashValue == 'Personal') {
			$('#TabPersonal').children('.employee-tabs-group-content').show();
			$('#TabPersonalBtn').addClass('employee-tabs-active');
		}
		else if (hashValue == 'Contract') {
			$('#TabContract').children('.employee-tabs-group-content').show();
			$('#TabContractBtn').addClass('employee-tabs-active');
		}
		else if (hashValue == 'Documents') {
			$('#TabDocuments').children('.employee-tabs-group-content').show();
			$('#TabDocumentsBtn').addClass('employee-tabs-active');
		}
		else if (hashValue == 'Academic') {
			$('#TabAcademic').children('.employee-tabs-group-content').show();
			$('#TabAcademicBtn').addClass('employee-tabs-active');
		}
		else if (hashValue == 'Employments') {
			$('#TabEmployments').children('.employee-tabs-group-content').show();
			$('#TabEmploymentsBtn').addClass('employee-tabs-active');
		}
		else if (hashValue == 'Machine') {
			$('#TabMachine').children('.employee-tabs-group-content').show();
			$('#TabMachineBtn').addClass('employee-tabs-active');
		} else {
			$('#TabPersonal').children('.employee-tabs-group-content').show();
			$('#TabPersonalBtn').addClass('employee-tabs-active');
		}
		$(window).on('hashchange',function(){ 
			$('.employee-tabs-select').removeClass('employee-tabs-active');
			$('.employee-tabs-group-content').hide();
			var hashValue = window.location.hash.substr(1);
			if (hashValue == 'Personal') {
				$('#TabPersonal').children('.employee-tabs-group-content').show();
				$('#TabPersonalBtn').addClass('employee-tabs-active');
			}
			else if (hashValue == 'Contract') {
				$('#TabContract').children('.employee-tabs-group-content').show();
				$('#TabContractBtn').addClass('employee-tabs-active');
			}
			else if (hashValue == 'Documents') {
				$('#TabDocuments').children('.employee-tabs-group-content').show();
				$('#TabDocumentsBtn').addClass('employee-tabs-active');
			}
			else if (hashValue == 'Academic') {
				$('#TabAcademic').children('.employee-tabs-group-content').show();
				$('#TabAcademicBtn').addClass('employee-tabs-active');
			}
			else if (hashValue == 'Employments') {
				$('#TabEmployments').children('.employee-tabs-group-content').show();
				$('#TabEmploymentsBtn').addClass('employee-tabs-active');
			}
			else if (hashValue == 'Machine') {
				$('#TabMachine').children('.employee-tabs-group-content').show();
				$('#TabMachineBtn').addClass('employee-tabs-active');
			} else {
				$('#TabPersonal').children('.employee-tabs-group-content').show();
				$('#TabPersonalBtn').addClass('employee-tabs-active');
			}
		});
		$('#AddNoteBtn').on('click', function () {
			$('#AddNote_ApplicantID').val($(this).attr('applicant-id'));
		});
		$('.folder-button').on('click', function () {
			$(this).children('i').toggleClass('fa-folder');
			$(this).children('i').toggleClass('fa-folder-open');
			$(this).closest('.row').find('.folder-documents').toggleClass('folder-active');
		});
		// $('.employee-tabs-select').on('click', function () {
		// 	$('.employee-tabs-select').removeClass('employee-tabs-active');
		// 	$(this).addClass('employee-tabs-active');
		// 	$('.employee-tabs-group-content').hide();
		// });
		$('#TabDocumentsBtnAlt').on('click', function () {
			$('.employee-tabs-select').removeClass('employee-tabs-active');
			$('#TabDocumentsBtn').addClass('employee-tabs-active');
			$('.employee-tabs-group-content').hide();
		});
		$('#TabPersonalBtn').on('click', function () {
			$('#TabPersonal').children('.employee-tabs-group-content').fadeIn(100);
		});
		$('#TabContractBtn').on('click', function () {
			$('#TabContract').children('.employee-tabs-group-content').fadeIn(100);
		});
		$('#TabDocumentsBtn, #TabDocumentsBtnAlt').on('click', function () {
			$('#TabDocuments').children('.employee-tabs-group-content').fadeIn(100);
		});
		$('#TabAcademicBtn').on('click', function () {
			$('#TabAcademic').children('.employee-tabs-group-content').fadeIn(100);
		});
		$('#TabEmploymentsBtn').on('click', function () {
			$('#TabEmployments').children('.employee-tabs-group-content').fadeIn(100);
		});
		$('#TabMachineBtn').on('click', function () {
			$('#TabMachine').children('.employee-tabs-group-content').fadeIn(100);
		});
		$('#TabNotesBtn').on('click', function () {
			$('#TabNotes').children('.employee-tabs-group-content').fadeIn(100);
		});
		if (localStorage.getItem('SidebarVisible') == 'true') {
			$('#sidebar').addClass('active');
			$('.ncontent').addClass('shContent');
		} else {
			$('#sidebar').css('transition', 'all 0.3s');
			$('#content').css('transition', 'all 0.3s');
		}
		$('#sidebarCollapse').on('click', function () {
			if (localStorage.getItem('SidebarVisible') == 'false') {
				$('#sidebar').addClass('active');
				$('.ncontent').addClass('shContent');
				$('#sidebar').css('transition', 'all 0.3s');
				$('#content').css('transition', 'all 0.3s');
		    	localStorage.setItem('SidebarVisible', 'true');
			} else {
				$('#sidebar').removeClass('active');
				$('.ncontent').removeClass('shContent');
				$('#sidebar').css('transition', 'all 0.3s');
				$('#content').css('transition', 'all 0.3s');
		    	localStorage.setItem('SidebarVisible', 'false');
			}
		});
		$('.ModalHire').on('click', function () {
			$('#idToHire').val($(this).attr('id'));
			console.log($('#idToHire').val());
		});
		$('.ExtendButton').on('click', function () {
			$('#ExtendID').val($(this).attr('id'));
			console.log($('#ExtendID').val());
			console.log($('#ExtendDate').val());
		});
		$('.ReminderButton').on('click', function () {
			$('#ReminderID').val($(this).attr('id'));
			console.log($('#ReminderID').val());
		});
		$('#ListContractHistory').DataTable();
		$('#ListViolations').DataTable();
		// Contract Bar
		var rPercentage = $("#TimeLeft").val();
		// if (rPercentage > 100) {
		// 	rPercentage = 100;
		// }
		$('.progressRemaining').animate({width:rPercentage + "%"},1500);
		$('.progress_value').text(rPercentage + "%");
		$('.a_eImage').on('click', function () {
			var src1 = $(this).attr('id');
			$("#enlargeImage_doc").attr("src", src1);
		});

	});
	function hideModal() {
		$("#EmpContractModal").modal('hide');
	}
</script>