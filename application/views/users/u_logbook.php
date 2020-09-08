<?php 
	$T_Header;
	if (!empty($_GET['page'])) {
		$LimitStart = $_GET['page'];
		if ($LimitStart < 0) {
			$LimitStart = 0;
		}
	} else {
		$LimitStart = 0;
	}
	$LimitPrevious = $LimitStart - 50;
	if ($LimitPrevious < 0) {
		$LimitPrevious = 0;
	}
	$LimitEnd = $LimitStart + 50;
	$GetLogbook = $this->Model_Selects->GetLogbook($LimitStart, $LimitEnd);
?>
<body>
	<div class="wrapper wercher-background-lowpoly">
		<?php $this->load->view('_template/users/u_sidebar'); ?>
		<div id="content" class="ncontent">
			<div class="container-fluid">
				<?php $this->load->view('_template/users/u_notifications'); ?>
				<div class="row">
					<?php echo $this->session->flashdata('prompts'); ?>
					<!-- Logbook -->
					<div class="col-md-7 wercher-tablelist-container">
						<div class="col-12 col-sm-12 col-md-12 PrintPageName PrintOut">
							<button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#ExportModal"><i class="fas fa-filter"></i> Filter by User</button>
							<button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#ExportModal"><i class="fas fa-filter"></i> Filter by Type</button>
							<button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#ExportModal"><i class="fas fa-download"></i> Export</button>
							<a href="<?=base_url()?>Logbook?page=<?=$LimitEnd?>" class="btn btn-sm btn-primary" style="float: right; margin-left: 5px;">Next<i class="fas fa-angle-right" style="margin-left: 5px;"></i></a>
							<?php if($LimitStart > 0): ?>
								<a href="<?=base_url()?>Logbook?page=<?=$LimitPrevious?>" class="btn btn-sm btn-primary" style="float: right;"><i class="fas fa-angle-left"></i> Back</a>
							<?php endif; ?>
						</div>
						<hr>
						<div class="col-sm-12">
							<div class="pt-2 pb-5 pl-2 pr-2">
								<?php if ($GetLogbook->num_rows() > 0): ?>
									<?php foreach ($GetLogbook->result_array() as $row): 
											$GetLogbookLogExtended = $this->Model_Selects->GetLogbookLogExtended($row['No']);
											$logbookType = $row['Type'];
											switch($logbookType) {
												case 'Blue':
													$logbookTypeClass = 'logbook-log-type-blue';
													break;
												case 'Red':
													$logbookTypeClass = 'logbook-log-type-red';
													break;
												case 'Green':
													$logbookTypeClass = 'logbook-log-type-green';
													break;
												case 'Yellow':
													$logbookTypeClass = 'logbook-log-type-yellow';
													break;
												default:
													$logbookTypeClass = 'logbook-log-type-unknown';
													break;
											}
										?>
										<div class="row logbook-log-container logbook-log logbook-log-toggle <?php if ($GetLogbookLogExtended->num_rows() > 0): echo 'logbook-log-hover '; endif; echo $logbookTypeClass; ?>">
											<div class="col-sm-1">
												<div class="text-center align-middle logbook-tooltip-icon">
													<?php
														$icon = $row['Icon'];
														if ($icon == 'Applicant'):
													?>
														<i class="fas fa-user-tie" style="margin-right: -1px;"></i>
													<?php elseif ($icon == 'Employee'): ?>
														<i class="fas fa-users" style="margin-right: -1px;"></i>
													<?php elseif ($icon == 'Admin'): ?>
														<i class="fas fa-user-secret" style="margin-right: -1px;"></i>
													<?php elseif ($icon == 'Client'): ?>
														<i class="fas fa-user-tag" style="margin-right: -1px;"></i>
													<?php elseif ($icon == 'Note'): ?>
														<i class="fas fa-sticky-note" style="margin-right: -1px;"></i>
													<?php elseif ($icon == 'Salary'): ?>
														<i class="fas fa-dollar-sign" style="margin-right: -1px;"></i>
													<?php else: ?>
														<i class="fas fa-cog" style="margin-right: -1px;"></i>
													<?php endif; ?>
												</div>
											</div>
											<div class="col-sm-1">
												<?php
													$GetLogbookAdminImage = $this->Model_Selects->GetLogbookAdminImage($row['AdminID']);
													if ($GetLogbookAdminImage->num_rows() > 0 || !empty($row['Image'])): 
														foreach ($GetLogbookAdminImage->result_array() as $nrow):
															$AdminImage = $nrow['Image'];
														endforeach;
														echo '
														<div class="logbook-admin-image text-center align-middle">
															<a href="?user=' . $row['AdminID'] . '"><img src="' . $AdminImage . '" width="45px" height="45px" class="rounded-circle"></a>
														</div>
														';
													else:
														$AdminImage = base_url() . 'assets/img/wercher_logo.png';
														echo '
														<div class="logbook-admin-image text-center align-middle">
															<a href="?user=' . $row['AdminID'] . '"><img src="' . $AdminImage . '" width="53px" height="46px" class="rounded-circle"></a>
														</div>
														';
													endif;

												?>
											</div>
											<div class="col-sm-10">
												<div class="row">
													<div class="col-sm-12">
														<?php echo '<a href="?user=' . $row['AdminID'] . '" class="logbook-tooltip-highlight">' . $row['AdminID'] . '</a> ' . $row['Event']; ?>
														<span class="logbook-log-number" style="float: right; display: none;" value="<?php echo $row['No']; ?>">
															<i class="fas fa-paperclip" style="font-size: 13px;"></i><?php echo $row['No']; ?>
														</span>
													</div>
													<div class="col-sm-12">
														<div class="logbook-tooltip-date">
															<?php 
																$date = new DateTime($row['Time']);
																$day = $date->format('Y-m-d');
																$day = DateTime::createFromFormat('Y-m-d', $day)->format('F d, Y');
																$hours = $date->format('h:m:s A');

																echo $day . ' at ' . $hours;
															?>
															<?php if ($GetLogbookLogExtended->num_rows() > 0): ?>
																<span class="logbook-log-toggle" style="float: right;">
																	<i class="fas fa-angle-right" style="margin-right: -1px;"></i>
																</span>
															<?php endif; ?>
														</div>
													</div>
												</div>
											</div>
											<?php if ($GetLogbookLogExtended->num_rows() > 0):
												$iteration = 0;
												foreach ($GetLogbookLogExtended->result_array() as $nrow):
													$iteration++; ?>
													<div class="col-sm-12">
														<div class="logbook-tooltip-extended" style="display: none;">
															<?php if ($iteration == $GetLogbookLogExtended->num_rows()): ?>
																<img class="logbook-tooltip-extended-tree" src="assets/img/documents-folder-tree.png">
															<?php else: ?>
																<img class="logbook-tooltip-extended-tree" src="assets/img/documents-folder-tree-continuous.png">
															<?php endif; ?>
															<div class="logbook-tooltip-extended-text">
																<?php echo $nrow['EventTooltip']; ?>
															</div>
														</div>
													</div>
												<?php endforeach;
											endif; ?>
										</div>
									<?php endforeach ?>
									<a href="<?=base_url()?>Logbook?page=<?=$LimitEnd?>" class="btn btn-sm btn-primary" style="float: right; margin-left: 5px;">Next<i class="fas fa-angle-right" style="margin-left: 5px;"></i></a>
									<?php if($LimitStart > 0): ?>
										<a href="<?=base_url()?>Logbook?page=<?=$LimitPrevious?>" class="btn btn-sm btn-primary" style="float: left;"><i class="fas fa-angle-left"></i> Back</a>
									<?php endif;
								else: ?>
									<div class="logbook-log-nodata">
										No data available to show. <?php if ($LimitStart != 0) { echo 'Click <a href="' . base_url() . 'Logbook">here</a> to go back to the first page.'; } ?>
									</div>
								<?php endif; ?>
							</div>
						</div>
					</div>
					<!-- Notes -->
					<div class="col-md-4 wercher-tablelist-container">
						<div class="col-12 col-sm-12 col-md-12 logbook-log-notes">
							<input class="logbook-log-notes-button" type="number" name="HookNo">
							<button type="button" class="btn btn-sm btn-primary"><i class="fas fa-paperclip"></i> Hook</button>
							<button type="submit" class="btn btn-success" style="float: right;"><i class="fas fa-bullhorn"></i> Publish</button>
						</div>
						<hr>
						<div class="col-sm-12">
							<label>Attach Note</label>
							<textarea class="form-control" rows="12"></textarea>
						</div>
						<hr>
						<div class="col-sm-12">
							<?php foreach ($GetLogbook->result_array() as $row): 
								$GetLogbookLogExtended = $this->Model_Selects->GetLogbookLogExtended($row['No']);
							?>
							<div class="row logbook-log-container logbook-log logbook-log-toggle <?php if ($GetLogbookLogExtended->num_rows() > 0): echo 'logbook-log-hover '; endif; ?>">
								<div class="col-sm-1">
									<?php
										$GetLogbookAdminImage = $this->Model_Selects->GetLogbookAdminImage($row['AdminID']);
										if ($GetLogbookAdminImage->num_rows() > 0 || !empty($row['Image'])): 
											foreach ($GetLogbookAdminImage->result_array() as $nrow):
												$AdminImage = $nrow['Image'];
											endforeach;
											echo '
											<div class="logbook-notes-admin-image text-center align-middle">
												<a href="?user=' . $row['AdminID'] . '"><img src="' . $AdminImage . '" width="45px" height="45px" class="rounded-circle"></a>
											</div>
											';
										else:
											$AdminImage = base_url() . 'assets/img/wercher_logo.png';
											echo '
											<div class="logbook-notes-admin-image text-center align-middle">
												<a href="?user=' . $row['AdminID'] . '"><img src="' . $AdminImage . '" width="53px" height="46px" class="rounded-circle"></a>
											</div>
											';
										endif;

									?>
								</div>
								<div class="col-sm-11">
									<div class="row">
										<div class="col-sm-12">
											<?php echo '<a href="?user=' . $row['AdminID'] . '" class="logbook-tooltip-highlight">' . $row['AdminID'] . '</a> ' . $row['Event']; ?>
											<span class="logbook-log-number" style="float: right; display: none;" value="<?php echo $row['No']; ?>">
												<i class="fas fa-paperclip" style="font-size: 13px;"></i><?php echo $row['No']; ?>
											</span>
										</div>
										<div class="col-sm-12">
											<div class="logbook-tooltip-date">
												<?php 
													$date = new DateTime($row['Time']);
													$day = $date->format('Y-m-d');
													$day = DateTime::createFromFormat('Y-m-d', $day)->format('F d, Y');
													$hours = $date->format('h:m:s A');

													echo $day . ' at ' . $hours;
												?>
												<?php if ($GetLogbookLogExtended->num_rows() > 0): ?>
													<span class="logbook-log-toggle" style="float: right;">
														<i class="fas fa-angle-right" style="margin-right: -1px;"></i>
													</span>
												<?php endif; ?>
											</div>
										</div>
									</div>
								</div>
								<?php if ($GetLogbookLogExtended->num_rows() > 0):
									$iteration = 0;
									foreach ($GetLogbookLogExtended->result_array() as $nrow):
										$iteration++; ?>
										<div class="col-sm-12">
											<div class="logbook-tooltip-extended" style="display: none;">
												<?php if ($iteration == $GetLogbookLogExtended->num_rows()): ?>
													<img class="logbook-tooltip-extended-tree" src="assets/img/documents-folder-tree.png">
												<?php else: ?>
													<img class="logbook-tooltip-extended-tree" src="assets/img/documents-folder-tree-continuous.png">
												<?php endif; ?>
												<div class="logbook-tooltip-extended-text">
													<?php echo $nrow['EventTooltip']; ?>
												</div>
											</div>
										</div>
									<?php endforeach;
								endif; ?>
							</div>
						<?php endforeach ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- MODALS -->
	<div class="modal fade" id="add_UserAdmin" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<?php echo form_open(base_url().'Add_NewAdmin','method="post"');?>
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle">Add Admin</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body p-5">
					<div class="form-row">
						<div class="form-group m-1 col">
							<label>Admin Level</label>
							<select class="form-control" name="AdminLevel">
								<option value="Level_1">Level 1 President / Developer</option>
								<option value="Level_2">Level 2 Human Resource</option>
								<option value="Level_3">Level 3 Accounting</option>
							</select>
						</div>
						<div class="form-group m-1 col">
							<label>Position</label>
							<select class="form-control" name="Position">
								<option value="Developer">Developer</option>
								<option value="President">President</option>
								<option value="HR_Manager">HR Manager</option>
								<option value="HR_Assistant">HR Assistant</option>
								<option value="Accounting_Manager">Accounting Manager</option>
								<option value="Accounting_Assistant">Accounting Assistant</option>
							</select>
						</div>
					</div>
					<div class="form-row">
						<div class="form-group m-1 col">
							<label>Admin ID</label>
							<input class="form-control" type="text" name="AdminID">
						</div>
						<div class="form-group m-1 col">
							<label>Password</label>
							<input class="form-control" type="password" name="Password">
						</div>
					</div>
					<div class="form-row">
						<div class="form-group m-1 col">
							<label>First Name</label>
							<input class="form-control" type="text" name="FirstName">
						</div>
						<div class="form-group m-1 col">
							<label>Middle Name</label>
							<input class="form-control" type="text" name="MiddleIN">
						</div>
						<div class="form-group m-1 col">
							<label>Last Name</label>
							<input class="form-control" type="text" name="LastName">
						</div>
					</div>
					<div class="form-row">
						<div class="form-group m-1">
							<label>Sex</label>
							<select class="form-control" name="Gender">
								<option>Male</option>
								<option>Female</option>
							</select>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary">Save</button>
				</div>
			</div>
			<?php echo form_close();?>
		</div>
	</div>
	<!-- EXPORT MODAL -->
	<?php $this->load->view('_template/modals/m_export'); ?>
</body>
<?php $this->load->view('_template/users/u_scripts'); ?>
<script type="text/javascript">
	$(document).ready(function () {
		$('.logbook-log').hover(
			function () {
				$(this).closest('.logbook-log-container').find('.logbook-log-number').show();
			}, 
			function () {
				$(this).closest('.logbook-log-container').find('.logbook-log-number').hide();
			}
		);
		$('.logbook-log-hover').on('click', function () {
			$(this).closest('.logbook-log-container').find('.logbook-tooltip-extended').toggle('fast');
			$(this).closest('.logbook-log-container').find('.fas').toggleClass('fa-angle-right');
			$(this).closest('.logbook-log-container').find('.fas').toggleClass('fa-angle-down');
			$(this).toggleClass('logbook-log');
			$(this).toggleClass('logbook-log-active');
		});
		$('[data-toggle="tooltip"]').tooltip();
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
		var table = $('#ListAdmins').DataTable( {
        buttons: [
            {
	            extend: 'print',
	            exportOptions: {
	                columns: [ 1, 2, 3, 4, 5 ]
	            }
	        },
	        {
	            extend: 'copyHtml5',
	            exportOptions: {
	                columns: [ 1, 2, 3, 4, 5 ]
	            }
	        },
	        {
	            extend: 'excelHtml5',
	            exportOptions: {
	                columns: [ 1, 2, 3, 4, 5 ]
	            }
	        },
	        {
	            extend: 'csvHtml5',
	            exportOptions: {
	                columns: [ 1, 2, 3, 4, 5 ]
	            }
	        },
	        {
	            extend: 'pdfHtml5',
	            exportOptions: {
	                columns: [ 1, 2, 3, 4, 5 ]
	            }
	        }
        ]
    } );
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
	});
</script>
</html>