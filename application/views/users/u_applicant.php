<style>
	html, body {
		background-color: #ebebeb;
		/*background:
		linear-gradient(135deg, #708090 21px, #b1bfce 22px, #b1bfce 24px, transparent 24px, transparent 67px, #b1bfce 67px, #b1bfce 69px, transparent 69px),
  linear-gradient(225deg, #708090 21px, #b1bfce 22px, #b1bfce  24px, transparent 24px, transparent 67px, #b1bfce 67px, #b1bfce 69px, transparent 69px)0 64px;*/
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
						<li class="tabs-active"><a href="<?php echo base_url() ?>Applicants">Applicants (<?php echo $get_employee->num_rows()?>)</a></li>
						<li><a href="<?php echo base_url() ?>ApplicantsExpired">Expired (<?php echo $get_ApplicantExpired->num_rows()?>)</a></li>
						<li><a href="<?php echo base_url() ?>Blacklisted">Blacklisted</a></li>
						<li><a href="<?php echo base_url() ?>Archived">Archived</a></li>
					</ul>
				</div>
				<div class="row rcontent">
					<div class="col-5 PrintPageName PrintOut">
						<i class="fas fa-info-circle"></i>
						<i>Found <?php echo $get_employee->num_rows(); ?> applicant<?php if($get_employee->num_rows() != 1): echo 's'; endif;?><?php echo ', ' . $WeeklyApplicants . ' of which are new this week'; ?>.<br>A total of <?php echo $GetAllApplicants ?> applicants and employees is stored in the database.
						</i>
					</div>
					<div class="col-7 text-right">
						<span class="input-bootstrap">
							<i class="sorting-table-icon spinner-border spinner-border-sm mr-2"></i>
							<input id="DTSearch" type="search" class="input-bootstrap" placeholder="Sorting table..." readonly>
						</span>
						<?php if($this->Model_Security->CheckPermissions('ApplicantsEditing')): ?>
						<a href="<?=base_url()?>NewEmployee" class="btn btn-success standard-btn-loading-animation">
							<i class="fas fa-user-plus"></i> New
						</a>
						<?php endif; ?>
						<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ExportModal"><i class="fas fa-download"></i> Export</button>
					</div>
					<div class="col-sm-12">
						<hr>
						<!-- <div id="LoadContainer" class="text-center ml-auto mr-auto" style="height: 800px;">
							<div class="spinner-border m-4" role="status"></div>
							<h4>Sorting table...</h4>
						</div> -->
						<div id="TableContainer" class="table-responsive pb-5">
							<table id="emp" class="table PrintOut" style="width: 100%;">
								<thead>
									<tr class="text-center">
										<th> Applicant ID </th>
										<th> Full Name </th>
										<th class="d-none"> Full Name </th>
										<th class="d-none"> Position Desired </th>
										<th> Contact Number </th>
										<!-- <th> Sex </th> -->
										<th> Applied On </th>
										<th class="d-none"> Applied On </th>
										<th class="PrintExclude"> Action </th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($get_employee->result_array() as $row): 
										$date = new DateTime($row['AppliedOn']);
										$day = $date->format('Y-m-d');
										$day = DateTime::createFromFormat('Y-m-d', $day)->format('F d, Y');
										$hours = $date->format('h:i:s A');
										$elapsed = Carbon::parse($row['AppliedOn']);
										$sortAppliedOn = strtotime($row['AppliedOn']);

										$thumbnail = $row['ApplicantImage'];
										$thumbnailType = substr($thumbnail, -4);
										$thumbnail = substr($thumbnail, 0, -4);
										$thumbnail = $thumbnail . '_thumb' . $thumbnailType;
										// TODO: getimagesize() severely lags the server on large amount of fetches.
										// if(!getimagesize($thumbnail)) {
										// 	$thumbnail = $row['ApplicantImage'];
										// }

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
													<a href="ViewEmployee?id=<?php echo $row['ApplicantID']; ?>"><img src="<?php echo $thumbnail; ?>" width="70" height="70" class="rounded-circle" loading="lazy"></a>
												</div>
												<div class="col-sm-12 align-middle">
													<a href="ViewEmployee?id=<?php echo $row['ApplicantID']; ?>"><?php echo $row['ApplicantID']; ?></a>
												</div>
											</td>
											<td class="text-center align-middle">
												<a href="ViewEmployee?id=<?php echo $row['ApplicantID']; ?>"<?php if($isFullNameHoverable): ?> data-toggle="tooltip" data-placement="top" data-html="true" title="<?php echo $fullNameHover; ?>"<?php endif; ?>><?php echo $fullName; ?></a>
												<br>
												<i style="color: gray;"><?php echo $row['PositionDesired']; ?></i>
												<br>
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
											<!-- <td class="text-center align-middle d-sm-none d-md-block">
												<?php echo $row['Gender']; ?>
											</td> -->
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
											<td class="text-center align-middle PrintExclude" width="100">
												<a class="btn btn-primary btn-sm standard-btn-loading-animation w-100 mb-1" href="<?=base_url()?>ViewEmployee?id=<?php echo $row['ApplicantID']; ?>"><i class="far fa-eye"></i> View</a>
												<?php if($this->Model_Security->CheckPermissions('EmployeesHiring')): ?>
												<button id="<?php echo $row['ApplicantID']; ?>" type="button" class="btn btn-info btn-sm w-100 mb-1 ModalHire"  data-toggle="modal" data-target="#hirthis"><i class="fas fa-user-edit"></i> Hire</button>
												<?php endif; ?>

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
		<?php if(!empty($this->session->flashdata('isApplicantAdded'))): ?>
			let inputCart = JSON.parse(localStorage.getItem('inputCart'));
			if (inputCart) {
				let inputCartLength = inputCart.items.length;
				for(let i = 0; i < inputCartLength; i++) {
					localStorage.removeItem(inputCart.items[i]);
				}
			}
		<?php endif; ?>
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
		let absorbedClicked = false;
		let isRegular = false;
		let isTotal = false;
		$('#EmploymentType').on('change', function() {
			employmentType = $(this).val();
			if (employmentType == 'Contractual') {
				isRegular = false;
				$('.contractual-group').show();
				$('.absorbed-group').hide();
				$('.previous-group').hide();
				$('.salarytotal-group').hide();
			} else if (employmentType == 'Regular') {
				isRegular = true;
				$('.contractual-group').hide();
				$('.absorbed-group').show();
				if (absorbedClicked) {
					$('.previous-group').show();
				}
				if (isTotal) {
					$('.salarytotal-group').show();
				}
			}
		});
		$('.absorbed-btn').on('click', function () {
			if (!absorbedClicked) {
				absorbedClicked = true;
				$(this).addClass('btn-success');
				$(this).children('i').addClass('wercher-visible');
				$('.previous-group').fadeIn('fast');
				$('#EmploymentStatus').val('Absorbed (Wercher)');
			} else {
				absorbedClicked = false;
				$(this).removeClass('btn-success');
				$(this).children('i').removeClass('wercher-visible');
				$('.previous-group').fadeOut('fast');
				$('#EmploymentStatus').val('');
			}
		});
		$('#SalaryType').on('change', function() {
			salaryType = $(this).val();
			if (salaryType == 'Total') {
				isTotal = true;
				if(isRegular) {
					$('.salarytotal-group').show();
				} else {
					$('.salarytotal-group').hide();
				}
			} else {
				isTotal = false;
				$('.salarytotal-group').hide();
			}
		});
		var table = $('#emp').DataTable( {
			sDom: 'lrtip',
			"bLengthChange": false,
        	"order": [[ 5, "desc" ]],
        	buttons: [
            {
	            extend: 'print',
	            exportOptions: {
	                columns: [ 1, 3, 4, 6 ]
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
	                columns: [ 1, 3, 4, 6 ]
	            }
	        },
	        {
	            extend: 'excelHtml5',
	            exportOptions: {
	                columns: [ 1, 3, 4, 6 ]
	            }
	        },
	        {
	            extend: 'csvHtml5',
	            exportOptions: {
	                columns: [ 1, 3, 4, 6 ]
	            }
	        },
	        {
	            extend: 'pdfHtml5',
	            exportOptions: {
	                columns: [ 1, 3, 4, 6 ]
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

		$('.ModalHire').on('click', function () {
			$('#idToHire').val($(this).attr('id'));
			console.log($('#idToHire').val());
		});
		$('#DTSearch').on('keyup change', function(){
			table.search($(this).val()).draw();
		})
		$('#Tabs').tabs();
	});
</script>
</html>