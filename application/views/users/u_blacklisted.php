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
				<div class="col-sm-12 tabs">
					<ul>
						<li><a href="<?php echo base_url() ?>Applicants">Applicants (<?php echo $get_employee->num_rows()?>)</a></li>
						<li><a href="<?php echo base_url() ?>ApplicantsExpired">Expired (<?php echo $get_ApplicantExpired->num_rows()?>)</a></li>
						<li class="tabs-active"><a href="<?php echo base_url() ?>Blacklisted">Blacklisted</a></li>
						<li><a href="<?php echo base_url() ?>Archived">Archived</a></li>
					</ul>
				</div>
				<div class="row rcontent">
					<div class="col-5 PrintPageName PrintOut">
						<i class="fas fa-info-circle"></i>
						<i>Found <?php echo $GetBlacklisted->num_rows(); ?> blacklisted applicant<?php if($GetBlacklisted->num_rows() != 1): echo 's'; endif;?> currently in the database.
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
						<div class="table-responsive pt-2 pb-5">
							<table id="emp" class="table PrintOut" style="width: 100%;">
								<thead>
									<tr class="text-center">
										<th> Applicant ID </th>
										<th> Full Name / Position </th>
										<th class="d-none"> Full Name </th>
										<th class="d-none"> Position Desired </th>
										<th> Contact Number </th>
										<th> Applied On </th>
										<th class="d-none"> Applied On </th>
										<th class="PrintExclude" style="min-width: 100px;"> Action </th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($GetBlacklisted->result_array() as $row): 
										// Applied On
										$date = new DateTime($row['AppliedOn']);
										$day = $date->format('Y-m-d');
										$day = DateTime::createFromFormat('Y-m-d', $day)->format('F d, Y');
										$hours = $date->format('h:i:s A');
										$elapsed = Carbon::parse($row['AppliedOn']);

										$thumbnail = $row['ApplicantImage'];
										$thumbnail = substr($thumbnail, 0, -4);
										$thumbnail = $thumbnail . '_thumb.jpg';

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
												<a href="ViewEmployee?id=<?php echo $row['ApplicantID']; ?>"><?php echo $row['LastName']; ?> , <?php echo $row['FirstName']; ?> <?php echo $row['MiddleName']; ?>.<?php if ($row['NameExtension'] != NULL): echo ', ' . $row['NameExtension']; endif; ?></a>
												<br>
												<i style="color: gray;"><?php echo $row['PositionDesired']; ?></i>
											</td>
											<td class="text-center align-middle d-none">
												<?php echo $row['LastName']; ?> , <?php echo $row['FirstName']; ?> <?php echo $row['MiddleName']; ?>.<?php if ($row['NameExtension'] != NULL): echo ', ' . $row['NameExtension']; endif; ?>
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
													<?php echo $row['AppliedOn']; ?>
												</div>
												<?php
													echo $day . '<br>' . $hours;
												?>
											</td>
											<td class="text-center align-middle d-none">
												<?php echo $day . ' at ' . $hours; ?>
											</td>
											<td class="text-center align-middle PrintExclude" width="100">
												<a class="btn btn-primary btn-sm w-100 mb-1" href="<?=base_url()?>ViewEmployee?id=<?php echo $row['ApplicantID']; ?>"><i class="far fa-eye"></i> View</a>
												<a class="btn btn-danger btn-sm w-100 mb-1" href="<?=base_url()?>ViewEmployee?id=<?php echo $row['ApplicantID']; ?>#Violations"><i class="fas fa-book"></i> Violations</a>
												<!-- <a href="<?=base_url()?>RestoreEmployee?id=<?php echo $row['ApplicantID']; ?>" class="btn btn-success btn-sm w-100 mb-1"><i class="fas fa-redo"></i> Restore</a> -->

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
		$(".nav-item a[href*='Applicants']").addClass("nactive");
		var table = $('#emp').DataTable( {
			sDom: 'lrtip',
			"bLengthChange": false,
        	"order": [[ 1, "asc" ]],
    		buttons: [
            {
	            extend: 'print',
	            exportOptions: {
	                columns: [ 2, 3, 4, 6 ]
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
	                columns: [ 2, 3, 4, 6 ]
	            }
	        },
	        {
	            extend: 'excelHtml5',
	            exportOptions: {
	                columns: [ 2, 3, 4, 6 ]
	            }
	        },
	        {
	            extend: 'csvHtml5',
	            exportOptions: {
	                columns: [ 2, 3, 4, 6 ]
	            }
	        },
	        {
	            extend: 'pdfHtml5',
	            exportOptions: {
	                columns: [ 2, 3, 4, 6 ]
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
		})
		$('[data-toggle="expired_tooltip"]').tooltip();   
		
	});
</script>
</html>