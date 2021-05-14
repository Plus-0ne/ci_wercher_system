<?php

$T_Header;
require 'vendor/autoload.php';
use Carbon\Carbon;

$date = new DateTime($createdDate);
$day = $date->format('Y-m-d');
$day = DateTime::createFromFormat('Y-m-d', $day)->format('F d, Y');
$hours = $date->format('h:i:s A');
$elapsed = Carbon::parse($createdDate);

$fromGet = false;
$getBatch = $this->input->get('batch');
if ($getBatch && $latestBatch != $getBatch) {
	$latestBatch = $getBatch;
	$fromGet = true;
	$GetSSSBatchRows = $this->Model_Selects->GetSSSBatchRows($latestBatch, 'sss_table_history', 0);
} else {
	$GetSSSBatchRows = $this->Model_Selects->GetSSSBatchRows($latestBatch);
}
$count = 0;

?>
<body>
	<div class="wrapper wercher-background-lowpoly">
		<?php $this->load->view('_template/users/u_sidebar'); ?>
		<div id="content" class="ncontent">
			<div class="container-fluid">
				<?php $this->load->view('_template/users/u_notifications'); ?>
				<div class="row wercher-tablelist-container rcontent PrintOutTable">
					<div class="col-sm-4 col-md-4 mb-2">
						<h4>
							<i class="fas fa-table"></i> SSS Table
						</h4>
					</div>
					<div class="col-8 col-sm-8 col-md-8 text-right">
						<button href="#" class="btn btn-success" data-toggle="modal" data-target="#AddSSSdata">
							<i class="fas fa-plus"></i> New Line
						</button>
						<a href="<?php echo base_url() ?>SSSNewBatch" class="btn btn-info">
							<i class="fas fa-redo"></i> New Batch
						</a>
						<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#SSSBatchesHistory"><i class="fas fa-book"></i> History</button>
						<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ExportModal"><i class="fas fa-download"></i> Export</button>
					</div>
					<div class="col-4 col-sm-4 col-md-4 PrintPageName PrintOut">
						<h4 class="sss-datecreated">
							<a href="#" data-toggle="modal" data-target="#SSSBatchesHistory">Batch #<?php echo $latestBatch; ?></a><?php if ($fromGet) { echo ' <a href="' . base_url() . 'SSS_Table" class="btn btn-info wercher-btn-sm"><i class="fas fa-redo"></i> Go to Latest</a>'; } else { echo ' (Latest)'; } ?> | Created on <span data-toggle="tooltip" data-placement="top" data-html="true" title="<?php echo $elapsed->diffForHumans(); ?>"><?php echo $day . ' at ' . $hours; ?></span>
						</h4>
					</div>
					<div class="col-sm-12 col-mb-12 mt-2">
						<div class="table-responsive">
							<table id="SSSTable" class="table table-condensed">
								<thead>
									<th>#</th>
									<th>Range</th>
									<th>&nbsp;</th>
									<th>&nbsp;</th>
									<th>Contribution ER</th>
									<th>Contribution EE</th>
									<th>Contribution EC</th>
									<th>Total</th>
									<th>Total with EC</th>
									<?php if (!$fromGet): ?>
									<th style="width: 75px;">Action</th>
									<?php endif; ?>
								</thead>
								<tbody>
									<form method="POST" action="UpdateSSSField">
									<?php foreach ($GetSSSBatchRows->result_array() as $row) { 
										$count++; ?>
										<?php if(isset($_GET['row']) && ($_GET['row'] == $row['id'])): ?>
											<input type="hidden" name="id" value="<?php echo $row['id']; ?>">
										<?php endif; ?>
										<tr id="<?php echo $row['id']; ?>"<?php if (!$fromGet): ?> class="sss-row"<?php else: ?> class="sss-inactive-row"<?php endif; ?>>
											<td style="color: rgba(0, 0, 0, 0.45); font-style: italic; font-size: 12px;">
												#<?php echo $count; ?>
											</td>
											<td>
												<?php if(isset($_GET['row']) && ($_GET['row'] == $row['id'])): ?>
													<input class="form-control w-75" type="number" name="f_range" step=".01" value="<?php echo $row['f_range']; ?>">
												<?php else: ?>
													<?php print $row['f_range']; ?>
												<?php endif; ?>
											</td>
											<td>
												-
											</td>
											<td>
												<?php if(isset($_GET['row']) && ($_GET['row'] == $row['id'])): ?>
													<input class="form-control w-75" type="number" name="t_range" step=".01" value="<?php echo $row['t_range']; ?>">
												<?php else: ?>
													<?php print $row['t_range']; ?>
												<?php endif; ?>
											</td>
											<td>
												<?php if(isset($_GET['row']) && ($_GET['row'] == $row['id'])): ?>
													<input class="form-control w-75" type="number" name="contribution_er" step=".01" value="<?php echo $row['contribution_er']; ?>">
												<?php else: ?>
													<?php print $row['contribution_er']; ?>
												<?php endif; ?>
											</td>
											<td>
												<?php if(isset($_GET['row']) && ($_GET['row'] == $row['id'])): ?>
													<input class="form-control w-75" type="number" name="contribution_ee" step=".01" value="<?php echo $row['contribution_ee']; ?>">
												<?php else: ?>
													<?php print $row['contribution_ee']; ?>
												<?php endif; ?>
											</td>
											<td>
												<?php if(isset($_GET['row']) && ($_GET['row'] == $row['id'])): ?>
													<input class="form-control w-75" type="number" name="contribution_ec" step=".01" value="<?php echo $row['contribution_ec']; ?>">
												<?php else: ?>
													<?php print $row['contribution_ec']; ?>
												<?php endif; ?>
											</td>
											<td>
												<?php echo $row['total']; ?>
											</td>
											<td>
												<?php echo $row['total_with_ec']; ?>
											</td>
											<?php if (!$fromGet): ?>
											<td width="140">
												<?php
													$idHash = $row['id'] - 2;
												?>
												<?php if(isset($_GET['row']) && ($_GET['row'] == $row['id'])): ?>
													<button class="btn btn-success btn-sm w-100 mb-1" type="submit"><i class="fas fa-check fa-fw"></i> Update</button>
													<a class="btn btn-secondary btn-sm w-100 mb-1" href="<?php echo base_url() ?>SSS_Table"><i class="fas fa-times fa-fw"></i> Cancel</a>
												<?php elseif(isset($_GET['delete']) && ($_GET['delete'] == $row['id'])): ?>
													<a class="btn btn-danger btn-sm w-100 mb-1" href="<?php echo base_url() ?>DeleteSSSTableRow?row=<?php echo $row['id']; ?>"><i class="fas fa-trash-alt fa-fw"></i> Confirm</button>
													<a class="btn btn-secondary btn-sm w-100 mb-1" href="<?php echo base_url() ?>SSS_Table"><i class="fas fa-times fa-fw"></i> Cancel</a>
												<?php else: ?>
													<a class="btn btn-info btn-sm w-100 mb-1" href="<?php echo base_url() ?>SSS_Table?row=<?php echo $row['id'] . '#' . $idHash; ?>"><i class="fas fa-edit fa-fw"></i> Update</a>
													<a class="btn btn-danger btn-sm w-100 mb-1" href="<?php echo base_url() ?>SSS_Table?delete=<?php echo $row['id']; ?>"><i class="fas fa-trash-alt fa-fw"></i> Delete</a>
												<?php endif; ?>
											</td>
											<?php endif; ?>
										</tr>
									<?php } ?>
									</form>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Modal -->
	<div class="modal fade" id="AddSSSdata" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<?php echo form_open(base_url().'AddthisSss','method="post"'); ?>
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Add to SSS table</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="text-center">
						<h5>
							Range of Compensations
						</h5>
					</div>
					<div class="form-row text-center">
						<div class="form-group m-auto col-sm-6 col-md-6">
							<label>From</label>
							<input class="form-control text-center" type="number" step=".01" name="f_range">
						</div>
						<div class="form-group m-auto col-sm-6 col-md-6">
							<label>To</label>
							<input class="form-control text-center" type="number" step=".01" name="t_range">
						</div>
					</div>
					<div class="text-center mt-4">
						<h5> 
							Contributions
						</h5>
					</div>
					<div class="form-row text-center">
						<div class="form-group m-auto col-sm-4 col-md-4">
							<label>ER</label>
							<input class="form-control text-center" type="number" step=".01" name="contribution_er">
						</div>
						<div class="form-group m-auto col-sm-4 col-md-4">
							<label>EE</label>
							<input class="form-control text-center" type="number" step=".01" name="contribution_ee">
						</div>
						<div class="form-group m-auto col-sm-4 col-md-4">
							<label>EC</label>
							<input class="form-control text-center" type="number" step=".01" name="contribution_ec">
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary"><i class="fas fa-plus"></i> Add</button>
				</div>
			</div>
			<?php echo form_close(); ?>
		</div>
	</div>
	<?php $this->load->view('_template/modals/m_p_ssshistory'); ?>
	<!-- EXPORT MODAL -->
	<?php $this->load->view('_template/modals/m_export'); ?>
</body>
<?php $this->load->view('_template/users/u_scripts'); ?>
<script type="text/javascript">
	$(document).ready(function () {
		$(".nav-item a[href*='Payroll']").addClass("nactive");
		$('#TaxTable').hide();
		$('.sss-row').on('click', function() {
			let id = $(this).attr('id');
			let idHash = parseInt(id) - 2;
			window.location.replace('<?php echo base_url(); ?>SSS_Table?row=' + id + '#' + idHash);
		});
		var table = $('#SSSTable').DataTable( {
			sDom: '',
			"bLengthChange": false,
	        buttons: [
	            {
		            extend: 'print',
		            exportOptions: {
		                columns: [ 1, 2, 3, 4, 5, 6, 7, 8 ]
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
		                columns: [ 1, 2, 3, 4, 5, 6, 7, 8 ]
		            }
		        },
		        {
		            extend: 'excelHtml5',
		            exportOptions: {
		                columns: [ 1, 2, 3, 4, 5, 6, 7, 8 ]
		            }
		        },
		        {
		            extend: 'csvHtml5',
		            exportOptions: {
		                columns: [ 1, 2, 3, 4, 5, 6, 7, 8 ]
		            }
		        },
		        {
		            extend: 'pdfHtml5',
		            exportOptions: {
		                columns: [ 1, 2, 3, 4, 5, 6, 7, 8 ]
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