<style>
	html, body {
		background-color: #ebebeb;
	}
</style>
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
				<?php $this->load->view('_template/users/u_notifications'); ?>
				<div class="col-12 col-sm-12 tabs">
					<ul>
						<li><a href="<?php echo base_url() ?>Applicants">Applicants (<?php echo $get_employee->num_rows()?>)</a></li>
						<li class="tabs-active"><a href="<?php echo base_url() ?>ApplicantsExpired">Expired (<?php echo $get_ApplicantExpired->num_rows()?>)</a></li>
						<li><a href="<?php echo base_url() ?>Blacklisted">Blacklisted</a></li>
						<li><a href="<?php echo base_url() ?>Archived">Archived</a></li>
					</ul>
				</div>
				<div class="row rcontent">
					<div class="col-5 PrintPageName PrintOut">
						<i class="fas fa-info-circle"></i>
						<i>Found <?php echo $get_ApplicantExpired->num_rows(); ?> expiree<?php if($get_ApplicantExpired->num_rows() != 1): echo 's'; endif;?> currently in the database.
						</i>
					</div>
					<div class="col-7 text-right">
						<span class="input-bootstrap">
							<i class="sorting-table-icon spinner-border spinner-border-sm mr-2"></i>
							<input id="DTSearch" type="search" class="input-bootstrap" placeholder="Sorting table..." readonly>
						</span>
						<a href="<?=base_url()?>NewEmployee" class="btn btn-success">
							<i class="fas fa-user-plus"></i> New
						</a>
						<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ExportModal"><i class="fas fa-download"></i> Export</button>
					</div>
					<div class="col-sm-12">
						<hr>
						<div class="table-responsive pt-2 pb-5">
							<table id="emp" class="table PrintOut" style="width: 100%;">
								<thead>
									<tr class="text-center">
										<th> Applicant ID </th>
										<th> Full Name / Previous Position </th>
										<th class="d-none"> Full Name </th>
										<th class="d-none"> Position Desired </th>
										<th> Contact Number </th>
										<th> Applied On </th>
										<th class="d-none"> Applied On </th>
										<th> Expired Since </th>
										<th class="d-none"> Expired Since </th>
										<th class="PrintExclude"> Action </th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($get_ApplicantExpired->result_array() as $row): 
										// Applied On
										$date = new DateTime($row['AppliedOn']);
										$day = $date->format('Y-m-d');
										$day = DateTime::createFromFormat('Y-m-d', $day)->format('F d, Y');
										$hours = $date->format('h:i:s A');
										$elapsed = Carbon::parse($row['AppliedOn']);
										$sortAppliedOn = strtotime($row['AppliedOn']);
										// Expired Since
										if ($row['DateEnds'] != NULL) {
											$edate = new DateTime($row['DateEnds']);
											$eday = $edate->format('Y-m-d');
											$eday = DateTime::createFromFormat('Y-m-d', $eday)->format('F d, Y');
											$ehours = $edate->format('h:i:s A');
											$eelapsed = Carbon::parse($row['DateEnds']);
										}

										$thumbnail = $row['ApplicantImage'];
										$thumbnail = substr($thumbnail, 0, -4);
										$thumbnail = $thumbnail . '_thumb.jpg';

										// Name Handler
										$fullName = '';
										$fullNameHover = '';
										$isFullNameHoverable = false;
										if ($row['LastName']) {
											$fullName = $fullName . $row['LastName'] . ', ';
											$fullNameHover = $fullNameHover . $row['LastName'] . ', ';
										} else {
											$fullNameHover = $fullNameHover . '[<i>No Last Name</i>], ';
											$isFullNameHoverable = true;
										}
										if ($row['FirstName']) {
											$fullName = $fullName . $row['FirstName'] . ' ';
											$fullNameHover = $fullNameHover . $row['FirstName'] . ' ';
										} else {
											$fullNameHover = $fullNameHover . '[<i>No First Name</i>] ';
											$isFullNameHoverable = true;
										}
										if ($row['MiddleName']) {
											$fullName = $fullName . $row['MiddleName'][0] . '.';
											$fullNameHover = $fullNameHover . $row['MiddleName'][0] . '.';
										} else {
											$fullNameHover = $fullNameHover . '[<i>No MI</i>].';
											$isFullNameHoverable = true;
										}
										if ($row['NameExtension']) {
											$fullName = $fullName . ', ' . $row['NameExtension'];
											$fullNameHover = $fullNameHover . ', ' . $row['NameExtension'];
										}
										if (strlen($fullName) > 45) {
											$fullName = substr($fullName, 0, 45);
											$fullName = $fullName . '...';
											$isFullNameHoverable = true;
										}
										?>
										<tr class="table-row-hover">
											<td class="text-center">
												<div class="col-sm-12">
													<a href="ViewEmployee?id=<?php echo $row['ApplicantID']; ?>"><img src="<?php echo $thumbnail; ?>" width="70" height="70" class="rounded-circle"></a>
												</div>
												<div class="col-sm-12 align-middle">
													<a href="ViewEmployee?id=<?php echo $row['ApplicantID']; ?>"><?php echo $row['ApplicantID']; ?></a>
												</div>
											</td>
											<td class="text-center align-middle">
												<a href="ViewEmployee?id=<?php echo $row['ApplicantID']; ?>"<?php if($isFullNameHoverable): ?> data-toggle="tooltip" data-placement="top" data-html="true" title="<?php echo $fullNameHover; ?>"<?php endif; ?>><?php echo $fullName; ?></a>
												<br>
												<i style="color: gray;"><?php echo $row['PositionDesired']; ?></i>
											</td>
											<td class="text-center align-middle d-none">
												<?php echo $fullName; ?>
											</td>
											<td class="text-center align-middle d-none">
												<?php echo $row['PositionDesired']; ?>
											</td>
											<td class="text-center align-middle">
												<?php 
													if ($row['Phone_No']) {
														echo $row['Phone_No'];
													} else {
														echo '<i style="color: gray;">No record.</i>';
													}
												?>
											</td>
											<td class="text-center align-middle" data-toggle="tooltip" data-placement="top" data-html="true" title="<?php echo $elapsed->diffForHumans(); ?>">
												<div class="d-none">
													<?php echo $sortAppliedOn; ?>
												</div>
												<?php
													echo $day . '<br>' . $hours;
												?>
											</td>
											<td class="text-center align-middle d-none">
												<?php echo $day . ' at ' . $hours; ?>
											</td>
											<td class="text-center align-middle" data-toggle="tooltip" data-placement="top" data-html="true" title="<?php if($row['DateEnds'] != NULL) { echo $eelapsed->diffForHumans(); } ?>">
												<div class="d-none">
													<?php if($row['DateEnds'] != NULL) { echo $row['DateEnds']; } ?>
												</div>
												<?php
													if($row['DateEnds'] != NULL) { echo $eday . '<br>' . $ehours; }
												?>
											</td>
											<td class="text-center align-middle d-none">
												<?php if($row['DateEnds'] != NULL) { echo $eday . ' at ' . $ehours; } ?>
											</td>
											<td class="text-center align-middle PrintExclude" width="100">
												<a class="btn btn-primary btn-sm w-100 mb-1" href="<?=base_url()?>ViewEmployee?id=<?php echo $row['ApplicantID']; ?>"><i class="far fa-eye"></i> View</a>
												<button id="<?php echo $row['ApplicantID']; ?>" type="button" class="btn btn-info btn-sm w-100 mb-1 ModalHire"  data-toggle="modal" data-target="#hirthis"><i class="fas fa-user-edit"></i> Hire</button>

												<!-- <a href="<?=base_url()?>RemoveEmployee?id=<?php echo $row['ApplicantID']; ?>" class="btn btn-danger btn-sm w-100 mb-1" onclick="return confirm('Remove Applicant?')"><i class="fas fa-lock"></i> Archive</a> -->
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
	<!-- CLIENT HIRE MODAL -->
	<?php $this->load->view('_template/modals/m_clienthire'); ?>
	<!-- EXPORT MODAL -->
	<?php $this->load->view('_template/modals/m_export'); ?>
</body>
<?php $this->load->view('_template/users/u_scripts'); ?>
<script type="text/javascript">
	$(document).ready(function () {
		$('[data-toggle="tooltip"]').tooltip();
		$('.sorting-table-icon').hide();
		$('#DTSearch').attr('placeholder', 'Search table');
		$('#DTSearch').attr('readonly', false);
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
		$(".nav-item a[href*='Applicants']").addClass("nactive");
		var table = $('#emp').DataTable( {
			sDom: 'lrtip',
			"bLengthChange": false,
        	"order": [[ 7, "desc" ]],
        	buttons: [
            {
	            extend: 'print',
	            exportOptions: {
	                columns: [ 2, 3, 4, 6, 8 ]
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
	                columns: [ 2, 3, 4, 6, 8 ]
	            }
	        },
	        {
	            extend: 'excelHtml5',
	            exportOptions: {
	                columns: [ 2, 3, 4, 6, 8 ]
	            }
	        },
	        {
	            extend: 'csvHtml5',
	            exportOptions: {
	                columns: [ 2, 3, 4, 6, 8 ]
	            }
	        },
	        {
	            extend: 'pdfHtml5',
	            exportOptions: {
	                columns: [ 2, 3, 4, 6, 8 ]
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

		$('.ModalHire').on('click', function () {
			$('#idToHire').val($(this).attr('id'));
		});
		$('#DTSearch').on('keyup change', function(){
			table.search($(this).val()).draw();
		})
		$('[data-toggle="expired_tooltip"]').tooltip();   
		
	});
</script>
</html>