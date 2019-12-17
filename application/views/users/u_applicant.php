<?php $T_Header;?>
<body>
	<div class="wrapper">
		<?php $this->load->view('_template/users/u_sidebar'); ?>
		<div id="content" class="ncontent">
			<div class="container-fluid">
				<?php $this->load->view('_template/users/u_notifications'); ?>
				<div class="row">
					<div class="col-sm-12 pt-3 pb-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb" style="background-color: transparent;">
								<li class="breadcrumb-item"><a href="">Home</a></li>
								<li class="breadcrumb-item active" aria-current="page">Applicants</li>
							</ol>
						</nav>
					</div>
				</div>
				<div class="col-12 col-sm-12 tabs">
					<ul>
						<li class="tabs-active"><a href="<?php echo base_url() ?>Applicants">Applicants (<?php echo $get_employee->num_rows()?>)</a></li>
						<li><a href="<?php echo base_url() ?>ApplicantsExpired">Expired (<?php echo $get_ApplicantExpired->num_rows()?>)</a></li>
						<li><a href="<?php echo base_url() ?>Blacklisted">Blacklisted</a></li>
					</ul>
				</div>
				<div class="row rcontent">
					<div class="col-4 col-sm-4 col-md-4 PrintPageName PrintOut">
						<h4>
							<i class="fas fa-user-friends fa-fw"></i> Applicants (<?php echo $get_employee->num_rows() ?>)
						</h4> 
					</div>
					<div class="col-8 col-sm-8 col-md-8 text-right PrintExclude">
						<div id="datatables-export"></div>
					</div>
					<div class="col-sm-12">
						<?php echo $this->session->flashdata('prompts'); ?>
						<div class="table-responsive pt-5 pb-5 pl-2 pr-2">
							<table id="emp" class="table table-striped table-bordered PrintOut" style="width: 100%;">
								<thead>
									<tr>
										<th> Applicant </th>
										<th> Applicant ID </th>
										<th> Position Desired </th>
										<th> Full Name </th>
										<th> Gender </th>
										<th> Applied On </th>
										<th class="PrintExclude"> Action </th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($get_employee->result_array() as $row): ?>
										<tr>
											<td class="text-center">
												<img src="<?php echo $row['ApplicantImage']; ?>" width="70" height="70">
											</td>
											<td class="text-center align-middle">
												<?php echo $row['ApplicantID']; ?>
											</td>
											<td class="text-center align-middle">
												<?php echo $row['PositionDesired']; ?>
											</td>
											<td class="text-center align-middle">
												<?php echo $row['LastName']; ?> , <?php echo $row['FirstName']; ?> <?php echo $row['MiddleInitial']; ?>.
											</td>
											<td class="text-center align-middle">
												<?php echo $row['Gender']; ?>
											</td>
											<td class="text-center align-middle">
												<?php echo $row['AppliedOn']; ?>
											</td>
											<td class="text-center align-middle PrintExclude" width="100">
												<a class="btn btn-primary btn-sm w-100 mb-1" href="<?=base_url()?>ViewEmployee?id=<?php echo $row['ApplicantID']; ?>"><i class="far fa-eye"></i> View</a>
												<button id="<?php echo $row['ApplicantID']; ?>" type="button" class="btn btn-info btn-sm w-100 mb-1 ModalHire"  data-toggle="modal" data-target="#hirthis"><i class="fas fa-user-edit"></i> Hire</button>

												<a href="<?=base_url()?>RemoveEmployee?id=<?php echo $row['ApplicantID']; ?>" class="btn btn-danger btn-sm w-100 mb-1" onclick="return confirm('Remove Applicant?')"><i class="fas fa-trash"></i> Delete</a>
											</td>
										</tr>
									<?php endforeach ?>
								</tbody>
							</table>
						</div>
						<div class="p-2">
							<a href="<?=base_url()?>NewEmployee" class="btn btn-primary" onclick="// return confirm('Add Employee?')">
								<i class="fas fa-user-plus"></i> New
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- CLIENT HIRE MODAL -->
	<?php $this->load->view('_template/modals/m_clienthire'); ?>
</body>
<?php $this->load->view('_template/users/u_scripts'); ?>
<script type="text/javascript">
	$(document).ready(function () {
		$('#sidebarCollapse').on('click', function () {
			$('#sidebar').toggleClass('active');
			$('.ncontent').toggleClass('shContent');
		});
		var table = $('#emp').DataTable( {
        	"order": [[ 5, "desc" ]]
    	});
		var dd_buttons = new $.fn.dataTable.Buttons(table, {
	        buttons: [
	            {
	                extend: 'collection',
	                text: '<i class="fas fa-download"></i> Export',
	                className: 'btn btn-primary',

	                buttons: [
			            {
			                extend: 'copy',
			                text: '<div class="btn btn-sm btn-info w-100">Copy</div>',
			                className: 'dropdown-item w-25 ml-auto',
			                exportOptions: {
			                    columns: [ 1, 2, 3, 4, 5 ]
			                }
			            },
			            {
			                extend: 'csv',
			                text: '<div class="btn btn-sm btn-info w-100">CSV</div>',
			                className: 'dropdown-item w-25 ml-auto',
			                exportOptions: {
			                    columns: [ 1, 2, 3, 4, 5 ]
			                }
			            },
			            {
			                extend: 'excel',
			                text: '<div class="btn btn-sm btn-info w-100">Excel</div>',
			                className: 'dropdown-item w-25 ml-auto',
			                exportOptions: {
			                    columns: [ 1, 2, 3, 4, 5 ]
			                }
			            },
			            {
			                extend: 'pdf',
			                text: '<div class="btn btn-sm btn-info w-100">PDF</div>',
			                className: 'dropdown-item w-25 ml-auto',
			                exportOptions: {
			                    columns: [ 1, 2, 3, 4, 5 ]
			                }
			            },
			            {
			                extend: 'print',
			                text: '<div class="btn btn-sm btn-info w-100">Print</div>',
			                className: 'dropdown-item w-25 ml-auto',
			                exportOptions: {
			                    columns: [ 1, 2, 3, 4, 5 ]
			                }
			            },
			        ]
	            }
	        ]
		}).container().appendTo($('#datatables-export'));

		$('.ModalHire').on('click', function () {
			$('#idToHire').val($(this).attr('id'));
			console.log($('#idToHire').val());
		});
		
	});
	$('#Tabs').tabs();
</script>
</html>