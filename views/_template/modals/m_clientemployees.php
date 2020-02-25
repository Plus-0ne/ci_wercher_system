<div class="modal fade" id="ClientsEmployedModal">
			<div class="modal-dialog modal-xl">
				<div class="modal-content">

				<!-- Modal Header -->
				<div class="modal-header">
					<h4 class="modal-title">Employees of <?=$_GET['id']?></h4>
					<div class="text-right">
						<button onClick="printContent('PrintOutHistory')" type="button" class="btn btn-primary mr-auto"><i class="fas fa-print"></i> Print</button>
						<button type="button" class="close d-none d-sm-block" data-dismiss="modal">&times;</button>
					</div>
				</div>

				<!-- Modal body -->
				<div class="modal-body">
					<div class="row rcontent">
						<div class="col-sm-12">
							<div class="table-responsive pt-5 pb-5 pl-2 pr-2">
								<?php if (isset($_GET['id'])): ?>
									<div class="row">
										<div id="ByClient" class="col-sm-12 text-center">
											<h4 class="line-through-text">
												<span>
												<i class="fas fa-users"></i>
												</span>
											</h4>
										</div>
										<div class="col-12 text-right">
											<button id="MG_ExportPrint" type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Print"><i class="fas fa-print" style="margin-right: -1px;"></i></button>
											<button id="MG_ExportCopy" type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Copy to Clipboard"><i class="fas fa-clipboard-list" style="margin-right: -1px;"></i></button>
											<button id="MG_ExportExcel" type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Export as an Excel file (.xlsx)"><i class="fas fa-file-excel" style="margin-right: -1px;"></i></button>
											<button id="MG_ExportCSV" type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Export as a CSV file (.csv)"><i class="fas fa-file-csv" style="margin-right: -1px;"></i></button>
											<button id="MG_ExportPDF" type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Export as a PDF file (.pdf)"><i class="fas fa-file-pdf" style="margin-right: -1px;"></i></button>
										</div>
										<div class="table-responsive pt-5 pb-5 pl-2 pr-2">
											<table id="MonthlyTable" class="table table-striped table-bordered PrintOut" style="width: 100%;">
												<thead>
													<tr class="text-center">
														<th> Employee </th>
														<th> Full Name </th>
														<th> Position </th>
														<th> Salary </th>
														<th> Contract Lifespan </th>
														<th> Action </th>
													</tr>
												</thead>
												<tbody>
													<?php 
													$GetClientsEmployed = $this->Model_Selects->GetClientsEmployed($_GET['id']);
													foreach ($GetClientsEmployed->result_array() as $row): ?>
														<tr>
															<td class="text-center">
																<div class="col-sm-12">
																	<img src="<?php echo $row['ApplicantImage']; ?>" width="70" height="70">
																</div>
																<div class="col-sm-12 align-middle">
																	<?php echo $row['EmployeeID']; ?>
																</div>
															</td>
															<td class="text-center align-middle">
																<?php echo $row['LastName']; ?> , <?php echo $row['FirstName']; ?> <?php echo $row['MiddleInitial']; ?>.
															</td>
															<td class="text-center align-middle">
																<?php echo $row['PositionDesired']; ?>
															</td>
															<td class="text-center align-middle">
																<?php echo $row['SalaryExpected']; ?>
															</td>
															<td class="text-center align-middle">
																<?php if ($row['Status'] == 'Employed') { ?>
																	<i class="fas fa-square PrintExclude" style="color: #1BDB07;"></i> Employed
																<?php } elseif ($row['Status'] == 'Applicant') { ?>
																	<i class="fas fa-square PrintExclude" style="color: #DB3E07;"></i> Applicant
																<?php } elseif ($row['Status'] == 'Expired') { ?>
																	<i class="fas fa-square PrintExclude" style="color: #0721DB;"></i> Expired
																<?php } elseif ($row['Status'] == 'Blacklisted') { ?>
																	<i class="fas fa-square PrintExclude" style="color: #000000;"></i> Blacklisted
																<?php } else { ?>
																	<i class="fas fa-square PrintExclude" style="color: #DB3E07;"></i> Unknown
																<?php } ?>
															</td>
															<td class="text-center align-middle PrintExclude" width="100">
																<a class="btn btn-primary btn-sm w-100 mb-1" href="<?=base_url()?>ViewEmployee?id=<?php echo $row['ApplicantID']; ?>" target="_blank"><i class="fas fa-external-link-alt"></i> View</a>
															</td>
														</tr>
													<?php endforeach ?>
												</tbody>
											</table>
										</div>
									</div>
									<?php endif; ?>
							</div>
						</div>
					</div>
				</div>

				<!-- Modal footer -->
				<div class="modal-footer">
					<button type="button" class="btn btn-danger ml-auto" data-dismiss="modal">Close</button>
				</div>

				</div>
			</div>
		</div>