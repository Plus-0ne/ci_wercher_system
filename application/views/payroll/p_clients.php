<?php $T_Header;?>
<body>
	<div class="wrapper">
		<?php $this->load->view('_template/users/u_sidebar'); ?>
		<div id="content" class="ncontent">
			<div class="container-fluid">
				<?php $this->load->view('_template/users/u_notifications'); //TODO: Limit the bell to HR access? ?>
				<div class="row">
					<div class="col-sm-12 pt-3 pb-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb" style="background-color: transparent;">
								<li class="breadcrumb-item"><a href="">Home</a></li>
								<li class="breadcrumb-item active" aria-current="page">Payroll</li>
							</ol>
						</nav>
					</div>
				</div>
				<div class="row rcontent">
					<?php echo $this->session->flashdata('prompts'); ?>
					<div class="col-4 col-sm-4 col-md-4 PrintPageName PrintOut">
						<h4>
							<i class="fas fa-user-tag fa-fw"></i> Clients (<?php echo $ShowClients->num_rows() ?>)
						</h4>
					</div>
					<div class="col-8 col-sm-8 col-md-8 text-right PrintExclude">
						<div id="datatables-export"></div>
					</div>
					<div class="col-sm-12">
						<div class="table-responsive pt-5 pb-5 pl-2 pr-2">
							<table id="ListClients" class="table table-striped table-bordered PrintOut" style="width: 100%;">
								<thead>
									<tr class="text-center align-middle">
										<th> Name </th>
										<th> Address </th>
										<th> Contact </th>
										<th> Employees </th>
										<th class="text-center PrintExclude"> Action </th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($ShowClients->result_array() as $row): ?>
										<tr class="text-center align-middle">
											<td>
												<?php echo $row['Name']; ?>
											</td>
											<td>
												<?php echo $row['Address']; ?>
											</td>
											<td>
												<?php echo $row['ContactNumber']; ?>
											</td>
											<td>
												<?php echo $this->Model_Selects->GetWeeklyListEmployee($row['ClientID'])->num_rows(); ?>
											</td>
											<td class="text-center align-middle PrintExclude">
												<button id="<?php echo $row['ClientID']; ?>" type="button" class="btn btn-info btn-sm w-100 mb-1 ViewClientIDButton"  data-toggle="modal" data-target="#ModalClientView"><i class="far fa-eye"></i> View Hours</button>
												<!-- <a class="btn btn-primary btn-sm w-100 mb-1" href="<?=base_url()?>ViewClient?id=<?php echo $row['ClientID']; ?>"><i class="far fa-eye"></i> View Hours</a> -->
											</td>
										</tr>
									<?php endforeach ?>
								</tbody>
							</table>
						</div>
					</div> 
				</div>
				<div class="row">
					<div class="col-4 col-sm-4 col-md-4 PrintPageName PrintOut">
						<h5>
							<i class="fas fa-user-edit fa-fw"></i> Recent Hires
						</h5>
					</div>
					<div class="col-sm-12">
						<div class="table-responsive pb-5 pl-2 pr-2">
							<table id="ListLogbook" class="table table-condensed PrintOut" style="width: 100%;">
								<thead>
									<tr class="text-center align-middle">
										<th> Time </th>
										<th> Event </th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($GetLogbookLatestHires->result_array() as $row): ?>
										<tr>
											</td>
											<td class="text-center align-middle">
												<?php echo $row['Time']; ?>
											</td>
											<td class="text-center align-middle">
												<?php echo $row['Event']; ?>
											</td>
										</tr>
									<?php endforeach; ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- MODALS -->
	<div class="modal fade" id="addClients" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<?php echo form_open(base_url().'Add_newClient','method="post"');?>
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Add new Client</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-row">
						<div class="form-group col-sm-12">
							<label>Name</label>
							<input class="form-control" type="text" name="ClientName" autocomplete="off">
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-sm-12">
							<label>Address</label>
							<input class="form-control" type="text" name="ClientAddress" autocomplete="off">
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-sm-12">
							<label>Contact Number</label>
							<input class="form-control" type="text" name="ClientContact" autocomplete="off">
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary">Save changes</button>
				</div>
				<?php echo form_close();?>
			</div>
		</div>
	</div>
	<?php $this->load->view('_template/modals/m_p_clientview'); ?>
</body>
<?php $this->load->view('_template/users/u_scripts'); ?>
<script type="text/javascript">
	$(document).ready(function () {
		$('#sidebarCollapse').on('click', function () {
			$('#sidebar').toggleClass('active');
			$('.ncontent').toggleClass('shContent');
		});
		var table = $('#ListClients').DataTable( {
						"order": [[ 3, "desc" ]],
						"columnDefs": [
							{ 
								"width": "10%", "targets": 4
							}
						] });
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
		$('.ViewClientIDButton').on('click', function () {
			$('#ViewClientID').val($(this).attr('id'));
			console.log($('#ViewClientID').val());
		});
	});
</script>
</html>