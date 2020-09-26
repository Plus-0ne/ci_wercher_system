<style>
	html, body {
		background-color: #ebebeb;
	}
</style>
<?php $T_Header;?>
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
						<?php echo $this->session->flashdata('prompts'); ?>
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
										<th> Expired Since </th>
										<th class="PrintExclude"> Action </th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($get_ApplicantExpired->result_array() as $row): ?>
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
												<?php echo $row['NameExtension']; ?> <?php echo $row['LastName']; ?> , <?php echo $row['FirstName']; ?> <?php echo $row['MiddleInitial']; ?>.
												<br>
												<i style="color: gray;"><?php echo $row['PositionDesired']; ?></i>
											</td>
											<td class="text-center align-middle d-none">
												<?php echo $row['NameExtension']; ?> <?php echo $row['LastName']; ?> , <?php echo $row['FirstName']; ?> <?php echo $row['MiddleInitial']; ?>.
											</td>
											<td class="text-center align-middle d-none">
												<?php echo $row['PositionDesired']; ?>
											</td>
											<td class="text-center align-middle">
												<?php echo $row['Phone_No']; ?>
											</td>
											<td class="text-center align-middle">
												<?php echo $row['AppliedOn']; ?>
											</td>
											<td class="text-center align-middle">
												<?php echo $row['DateEnds']; ?>
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
        	"order": [[ 6, "desc" ]],
        	buttons: [
            {
	            extend: 'print',
	            exportOptions: {
	                columns: [ 2, 3, 4, 5, 6 ]
	            }
	        },
	        {
	            extend: 'copyHtml5',
	            exportOptions: {
	                columns: [ 2, 3, 4, 5, 6 ]
	            }
	        },
	        {
	            extend: 'excelHtml5',
	            exportOptions: {
	                columns: [ 2, 3, 4, 5, 6 ]
	            }
	        },
	        {
	            extend: 'csvHtml5',
	            exportOptions: {
	                columns: [ 2, 3, 4, 5, 6 ]
	            }
	        },
	        {
	            extend: 'pdfHtml5',
	            exportOptions: {
	                columns: [ 2, 3, 4, 5, 6 ]
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