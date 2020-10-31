<?php 
	$T_Header;

	require 'vendor/autoload.php';

	use Carbon\Carbon;

	// ~ logbook ~
	$loadMoreURL = '';
	if (!empty($_GET['admin'])) {
		$FilterAdmin = $_GET['admin'];
		$loadMoreURL = $loadMoreURL . '&admin=' . $FilterAdmin;
	} else {
		$FilterAdmin = NULL;
	}
	if (!empty($_GET['type'])) {
		$FilterType = $_GET['type'];
		$loadMoreURL = $loadMoreURL . '&type=' . $FilterType;
	} else {
		$FilterType = NULL;
	}
	if (!empty($_GET['event'])) {
		$FilterEvent = $_GET['event'];
		$loadMoreURL = $loadMoreURL . '&event=' . $FilterEvent;
	} else {
		$FilterEvent = NULL;
	}
	if (!empty($_GET['from'])) {
		$DateStarted = $_GET['from'];
		$loadMoreURL = $loadMoreURL . '&from=' . $DateStarted;
	} else {
		$DateStarted = NULL;
	}
	if (!empty($_GET['to'])) {
		$DateMax = $_GET['to'];
		$loadMoreURL = $loadMoreURL . '&to=' . $DateMax;
	} else {
		$DateMax = NULL;
	}

	if (!empty($_GET['p'])) {
		$LimitStart = $_GET['p'];
		if ($LimitStart < 0) {
			$LimitStart = 50;
		}
	} else {
		$LimitStart = 50;
	}
	$LimitEnd = $LimitStart + 50;
	$GetLogbook = $this->Model_Selects->GetLogbook($LimitEnd, $FilterAdmin, $FilterType, $FilterEvent, $DateStarted, $DateMax);
	$LogbookCount = $GetLogbook->num_rows();
	$LogbookCountNoLimit = $this->Model_Selects->GetLogbookNoLimit($FilterAdmin, $FilterType, $FilterEvent, $DateStarted, $DateMax)->num_rows();
	if ($LimitStart > $LogbookCount) {
		$LimitStart = $LogbookCount;
	}

	// ~ notes ~
	if (!empty($_GET['n'])) {
		$NotesLimitStart = $_GET['n'];
		if ($NotesLimitStart < 0) {
			$NotesLimitStart = 0;
		}
	} else {
		$NotesLimitStart = 0;
	}
	$NotesLimitEnd = $NotesLimitStart + 25;
	$GetLogbookNotes = $this->Model_Selects->GetLogbookNotes($NotesLimitStart, $NotesLimitEnd);
	$logbookIteration = 0;
?>
<body>
	<div class="wrapper wercher-background-lowpoly">
		<?php $this->load->view('_template/users/u_sidebar'); ?>
		<div id="content" class="ncontent">
			<div class="container-fluid">
				<?php $this->load->view('_template/users/u_notifications'); ?>
				<div class="row">
					<!-- <div class="col-12 col-sm-12 tabs">
						<ul>
							<li class="tabs-active"><a href="<?php echo base_url() ?>Clients">Clients</a></li>
							<li><a href="<?php echo base_url() ?>ClientsArchived">Archived</a></li>
						</ul>
					</div> -->
					<!-- Logbook -->
					<div class="col-md-7 wercher-tablelist-container">
						<div class="col-12 col-sm-12 col-md-12 PrintPageName PrintOut">
							<button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#LogbookFilter"><i class="fas fa-filter"></i> Filter</button>
							<!-- <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#ExportModal"><i class="fas fa-download"></i> Export</button> -->
							<span id="NotifContainer">
								<a href="Logbook" class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="top" data-html="true" title="Click to refresh" style="float: right;"><i class="fas fa-check"></i> Viewing latest entries</a>
							</span>
						</div>
						<hr>
						<div class="col-sm-12">
							<div class="pt-2 pb-5 pl-2 pr-2">
								<?php if ($GetLogbook->num_rows() > 0): ?>
									<?php foreach ($GetLogbook->result_array() as $row): 
											$logbookIteration++;
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
										<div id="navigateTo_<?=$logbookIteration;?>" class="row logbook-log-container logbook-log logbook-log-toggle <?php if ($GetLogbookLogExtended->num_rows() > 0): echo 'logbook-log-hover '; endif; echo $logbookTypeClass; ?>">
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
															<a href="?admin=' . $row['AdminID'] . '"><img src="' . $AdminImage . '" width="45px" height="45px" class="rounded-circle"></a>
														</div>
														';
													else:
														$AdminImage = base_url() . 'assets/img/wercher_logo.png';
														echo '
														<div class="logbook-admin-image text-center align-middle">
															<a href="?admin=' . $row['AdminID'] . '"><img src="' . $AdminImage . '" width="53px" height="46px" class="rounded-circle"></a>
														</div>
														';
													endif;

												?>
											</div>
											<div class="col-sm-10">
												<div class="row">
													<div class="col-sm-12">
														<?php echo '<a href="?admin=' . $row['AdminID'] . '" class="logbook-tooltip-highlight">' . $row['AdminID'] . '</a> ' . $row['Event']; ?>
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
																$hours = $date->format('h:i:s A');
																$elapsed = Carbon::parse($row['Time']);

																echo $elapsed->diffForHumans() . ' - ' . $day . ' at ' . $hours;
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
																<?php
																if($nrow['Type'] == 1):
																	$date = new DateTime($nrow['Time']);
																	$day = $date->format('Y-m-d');
																	$day = DateTime::createFromFormat('Y-m-d', $day)->format('F d, Y');
																	$hours = $date->format('h:i:s A');
																	echo '<div class="col-sm-12"><span class="logbook-tooltip-extended-note"><b>Note:</b></span> ' . $nrow['EventTooltip'] . '</div><div class="col-sm-12 logbook-tooltip-extended-note-admin">- ' . $nrow['AdminID'] . ' <span class="logbook-tooltip-extended-note-date">' . $day . ' at ' . $hours . '</span></div>';
																else:
																	echo $nrow['EventTooltip'];
																endif;
																?>
															</div>
														</div>
													</div>
												<?php endforeach;
											endif; ?>
										</div>
									<?php endforeach ?>
									<a href="<?=base_url()?>Logbook?p=<?php echo $LimitEnd; echo $loadMoreURL; ?>#navigateTo_<?=$logbookIteration;?>" class="btn btn-sm btn-primary" style="float: right;">Load more...<i class="fas fa-angle-down" style="margin-left: 5px;"></i></a>
									<?php if($LimitStart <= $LogbookCount): ?>
										<div class="logbook-log-pagecounter" style="float: right;"><?php echo $LimitStart; ?> / <?php echo $LogbookCountNoLimit; ?></div>
									<?php else: ?>
										<div class="logbook-log-pagecounter" style="float: right;"><?php echo $LogbookCount; ?> / <?php echo $LogbookCountNoLimit; ?></div>
									<?php endif;
								else: ?>
									<div class="logbook-log-nodata">
										We've come up empty! No data is available to show.
										<br>
										<i class="fas fa-bell-slash" style="margin-right: -1px;"></i>
									</div>
								<?php endif; ?>
							</div>
						</div>
					</div>
					<!-- Notes -->
					<div class="col-md-4 wercher-tablelist-container">
						<div class="col-12 col-sm-12 col-md-12 logbook-log-notes">
							<input id="HookNo" class="logbook-log-notes-button" type="number" name="HookNo">
							<button id="HookBtn" type="button" class="btn btn-sm btn-primary"><i class="fas fa-paperclip"></i> Hook</button>
							<span style="color: rgba(0, 0, 0, 0.55);" data-toggle="tooltip" data-placement="top" data-html="true" title="Hooking a note means it will be attached to the log entry instead of being broadcasted down below.<br><br>To find out what the Hook number is for a log entry, simply hover on the log entry and it will be shown on the right."><i>(?)</i></span>
							<button id="PublishNote" type="button" class="btn btn-success" style="float: right;"><i class="fas fa-bullhorn"></i> Publish</button>
						</div>
						<hr>
						<div class="col-sm-12 logbook-log-notes-input">
							<button id="UnhookBtn" type="button" class="btn btn-sm btn-primary"><i class="fas fa-paperclip"></i> Unhook</button>
							<label id="NotesText">Attach a note </label>
							<textarea id="NotesEvent" class="form-control" rows="12" placeholder="Write something here..."></textarea>
						</div>
						<hr>
						<div id="NotesArea" class="col-sm-12">
							<?php foreach ($GetLogbookNotes->result_array() as $row): 
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
											<?php echo '<a href="?user=' . $row['AdminID'] . '" class="logbook-tooltip-highlight">' . $row['AdminID'] . '</a>' . $row['Event']; ?>
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
													$hours = $date->format('h:i:s A');

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
													<?php
													if($nrow['Type'] == 1):
														echo '<span class="logbook-tooltip-extended-note">Note:</span> ' . $nrow['EventTooltip'];
													else:
														echo $nrow['EventTooltip'];
													endif;
													?>
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
	<!-- LOGBOOK FILTER MODAL -->
	<?php $this->load->view('_template/modals/m_logbookfilter'); ?>

	<!-- EXPORT MODAL -->
	<?php $this->load->view('_template/modals/m_export'); ?>
</body>
<?php $this->load->view('_template/users/u_scripts'); ?>
<script type="text/javascript">
	$(document).ready(function () {
		(function update() {
		    $.ajax({
		        type: "GET",
		        url: "<?php echo base_url() . 'AJAX_checkLogbookNotifCounter';?>",             
		        dataType: "html",           
		        success: function(response){                    
		        	$("#NotifContainer").html(response);
		        }
		    }).then(function() {
		       setTimeout(update, 10000); // 10 seconds default interval
		    });
		})();
		$('[data-toggle="tooltip"]').tooltip();
		// $("#FilterAdmin").on("change", function () {
		// 	FilterAdmin = $('#FilterAdmin').val();
		// 	$.ajax({
		// 		url : "<?php echo base_url() . 'AJAX_getLogbookFilterAdmin';?>",
		// 		method : "POST",
		// 		data : {FilterAdmin: FilterAdmin},
		// 		success: function(data){
		// 			$('#FilterAdminPosts').load("<?php echo base_url() . 'AJAX_showLogbookFilterAdmin';?>");
		// 		}

		// 	});
		// });
		$('#LogbookFilterForm').submit(function () {
	        var newurl = $(this).find(":input").filter(function () {
	            return $.trim(this.value).length > 0
	        }).serialize();
	        window.location($('#LogbookFilterForm').attr('action') + '?' + newurl );
	        return false;
	    });
		var AJAX_publishNote = false;
		var HookNo;
		$('#HookBtn').click(function(){
			if($('#HookNo').val() != '') {
				HookNo = $('#HookNo').val();
				$('#HookNo').val('');
				$('#NotesText').html('Hooked to <i class="fas fa-paperclip" style="font-size: 13px;"></i>' + HookNo);
				$('#UnhookBtn').show();
			}
		});
		$('#UnhookBtn').click(function(){
			HookNo = null;
			$('#NotesText').text('Attach a note');
			$('#UnhookBtn').hide();
		});
		$('#PublishNote').click(function(){

			if (AJAX_publishNote == false) {
				var LimitNotes = <?php echo $NotesLimitStart; ?>;
				var NotesEvent = $('#NotesEvent').val();
				AJAX_publishNote = true;

				$(this).closest('#PublishNote').find('i').removeClass('fas');
				$(this).closest('#PublishNote').find('i').removeClass('fa-bullhorn');
				$(this).closest('#PublishNote').find('i').addClass('spinner-border');
				$(this).closest('#PublishNote').find('i').addClass('spinner-border-sm');
				$('#NotesEvent').prop('readonly', true);

				$.ajax({
					url : "<?php echo base_url() . 'AJAX_addLogbookNotes';?>",
					method : "POST",
					data : {LimitNotes: LimitNotes,NotesEvent: NotesEvent,HookNo:HookNo},
					success: function(data){
						$('#NotesArea').load("<?php echo base_url() . 'AJAX_showLogbookNotes';?>");

						$('#PublishNote').closest('#PublishNote').find('i').addClass('fas');
						$('#PublishNote').closest('#PublishNote').find('i').addClass('fa-bullhorn');
						$('#PublishNote').closest('#PublishNote').find('i').removeClass('spinner-border');
						$('#PublishNote').closest('#PublishNote').find('i').removeClass('spinner-border-sm');
						$('.logbook-log-notes-fade').hide();
						$('.logbook-log-notes-fade').fadeIn('slow');
						$('#NotesEvent').val('');
						$('#NotesEvent').prop('readonly', false);
						AJAX_publishNote = false;
					}

				});
			}
		});
		$('.logbook-log').hover(
			function () {
				$(this).closest('.logbook-log-container').find('.logbook-log-number').show();
			}, 
			function () {
				$(this).closest('.logbook-log-container').find('.logbook-log-number').hide();
			}
		);
		$('.logbook-tooltip-extended-text').hover(
			function () {
				$(this).closest('.logbook-tooltip-extended-text').find('.logbook-tooltip-extended-note-date').show();
			}, 
			function () {
				$(this).closest('.logbook-tooltip-extended-text').find('.logbook-tooltip-extended-note-date').hide();
			}
		);
		$(document).on('click', '.logbook-log-hover', function () {
			$(this).closest('.logbook-log-container').find('.logbook-tooltip-extended').toggle('fast');
			$(this).closest('.logbook-log-container').find('.fas').toggleClass('fa-angle-right');
			$(this).closest('.logbook-log-container').find('.fas').toggleClass('fa-angle-down');
			$(this).toggleClass('logbook-log');
			$(this).toggleClass('logbook-log-active');
		});
		$('[data-toggle="tooltip"]').tooltip();
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