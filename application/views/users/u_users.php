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
	<?php $this->load->view('_template/modals/m_adddocuments'); ?>
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