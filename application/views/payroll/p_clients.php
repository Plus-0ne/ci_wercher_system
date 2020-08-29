<?php $T_Header;?>
<body>
	<div class="wrapper wercher-background-lowpoly">
		<?php $this->load->view('_template/users/u_sidebar'); ?>
		<div id="content" class="ncontent">
			<div class="container-fluid">
				<?php $this->load->view('_template/users/u_notifications'); //TODO: Limit the bell to HR access? ?>
				<div class="row wercher-tablelist-container">
					<?php echo $this->session->flashdata('prompts'); ?>
					<div class="col-sm-4 PrintPageName PrintOut">
						<h4 class="tabs-icon">
							<i class="fas fa-user-tag fa-fw"></i> Clients x <?php echo $ShowClients->num_rows() ?>
						</h4>
					</div>
					<div class="col-sm-8 text-right">
						<button type="button" class="ImportButton btn btn-success"><i class="fas fa-file-excel"></i> Import Excel</button>
						<a href="SSS_Table" class="btn btn-primary">
							<i class="fas fa-table"></i> SSS
						</a>
						<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ExportModal"><i class="fas fa-download"></i> Export</button>
					</div>
					<div class="col-sm-12">
						<div class="table-responsive pt-2 pl-2 pr-2">
							<table id="ListClients" class="table PrintOut" style="width: 100%;">
								<thead>
									<tr class="text-center align-middle">
										<th> Name </th>
										<th> Address </th>
										<th> Contact </th>
										<th> Employees </th>
										<th class="text-center PrintExclude" style="width: 5%;"> View Hours </th>
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
												<button id="<?php echo $row['ClientID']; ?>" type="button" class="btn btn-primary btn-sm w-100 mb-1 ViewClientIDButton"  data-toggle="modal" data-target="#ModalClientView"><i class="fas fa-calendar-alt"></i> Date Range</button>
												<!-- <a class="btn btn-success btn-sm w-100 mb-1" href="<?=base_url()?>ViewClient?id=<?php echo $row['ClientID']; ?>"><i class="fas fa-file-excel"></i> Excel</a> -->
												<button id="<?php echo $row['ClientID']; ?>" type="button" class="excel_formatbtn btn btn-success btn-sm w-100 mb-1 mt-1"  data-toggle="modal" data-target="#DateFroto_modal" value="<?php echo $row['Name']; ?>"><i class="fas fa-file-download"></i> Download Excel</button>
											</td>
										</tr>
									<?php endforeach ?>
								</tbody>
							</table>
						</div>
					</div>
					<hr>
					<div class="row pt-5 pl-5">
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
	</div>
	<!-- MODALS -->
	<?php $this->load->view('_template/modals/m_p_clientview'); ?>
	<!-- LOAD MODAL -->
	<div class="modal fade" id="LoadModal" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-body">
					<div class="form-row">
						<div class="text-center ml-auto mr-auto">
							<div class="spinner-border m-5" role="status"></div>
							<h4>Fetching the table, just for you...</h4>
							<!-- <p>Preparing the table...</p> -->
							<!-- <p class="load-hidden-1">This is taking longer than necessary...</p> -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
<!-- EXPORT MODAL -->
<?php $this->load->view('_template/modals/m_export'); ?>
<!-- EXPORT EXCEL MODAL -->
<?php $this->load->view('_template/modals/m_export_excel'); ?>

<?php $this->load->view('_template/users/u_scripts'); ?>
<!-- FORM -->
<form action="<?php echo base_url().'ImportExcel'; ?>" method="post" enctype="multipart/form-data">
	<input type="hidden" name="ExcelClientID">
	<input id="file" type="file" name="file" class="btn btn-success" style="display: none;" onchange="form.submit()">
</form>
<script type="text/javascript">
	$(document).ready(function () {
		$('#ExportFromDate, #ExportToDate').on('change', function() {
			console.log('123');
			$('#ExportFileName').val($('#DesignatedClientName').val() + ' (' + $('#ExportFromDate').val() + ' - ' + $('#ExportToDate').val() + ')' );
		});
		$('#FromDate').val(moment().subtract(6,'d').format('YYYY-MM-DD'));
		$('#ToDate').val(moment().format('YYYY-MM-DD'));
		$('.ImportButton').click(function(){ $('#file').trigger('click'); });
		function readURL(input) {
			if (input.files && input.files[0]) {
				var reader = new FileReader();
				reader.onload = function(e) {
					$('.ImportButton').attr('src', e.target.result);
				}
				reader.readAsDataURL(input.files[0]);
			}
		}
		$("#file").change(function() {
			$('#LoadModal').modal('show');
			readURL(this);
		});
		$('.load-div').hide();
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
		var table = $('#ListClients').DataTable( {
			"order": [[ 3, "desc" ]],
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
		$('.ViewClientIDButton').on('click', function () {
			$('#ViewClientID').val($(this).attr('id'));
			console.log($('#ViewClientID').val());
		});
		$('#LoadButton').on('click', function () {
			$('.load-container').children().hide();
			$('.load-div').show();
		});
		$('.excel_formatbtn').on('click', function () {
			$('#idforFormatex').val($(this).attr('id'));
			$('#DesignatedClientName').val($(this).attr('value'));
			// $('#ExportFileName').val('');
		});
	});
</script>
</html>