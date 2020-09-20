<div class="modal fade" id="EmpContractHistory">
			<div class="modal-dialog modal-xl">
				<div class="modal-content">

				<!-- Modal Header -->
				<div class="modal-header">
					<h4 class="modal-title PrintOutHistory">Contract History for <?=$LastName?>, <?=$FirstName?> <?=$MiddleInitial?>.</h4>
					<div class="text-right">
						<button onClick="printContent('PrintOutHistory')" type="button" class="btn btn-primary mr-auto"><i class="fas fa-print"></i> Print</button>
						<button type="button" class="close d-none d-sm-block" data-dismiss="modal">&times;</button>
					</div>
				</div>

				<!-- Modal body -->
				<div class="modal-body">
					<div class="row">
						<div class="col-sm-12">
							<div class="table-responsive pt-5 pb-5 pl-2 pr-2">
								<table id="ListContractHistory" class="table PrintOutHistory" style="width: 100%;">
									<thead>
										<tr class="text-center align-middle">
											<th> Client </th>
											<th> Contract Started </th>
											<th> Contract Ended </th>
											<th> Position </th>
											<th class="PrintExclude"> Violations </th>
										</tr>
									</thead>
									<tbody>
										<?php 

										foreach ($GetContractHistory->result_array() as $row): ?>
											<tr>
												<td class="text-center align-middle">
													<?php echo $row['Client'] ; ?>
												</td>
												<td class="text-center align-middle">
													<?php echo $row['PreviousDateStarted'] ; ?>
												</td>
												<td class="text-center align-middle">
													<?php echo $row['PreviousDateEnds'] ; ?>
												</td>
												<td class="text-center align-middle">
													<?php echo $row['PreviousPosition'] ; ?>
												</td>
												<td class="text-center align-middle PrintExclude">
													<?php
														$HistoryFrom = $row['PreviousDateStarted'];
														$HistoryFrom = new DateTime($HistoryFrom);
														$HistoryTo = $row['PreviousDateEnds'];
														$HistoryTo = new DateTime($HistoryTo);
														$GetClientIDFromName = $this->Model_Selects->GetClientIDFromName($row['Client']);
														if ($GetClientIDFromName->num_rows() > 0):
															foreach($GetClientIDFromName->result_array() as $nrow):
																$ClientID = $nrow['ClientID'];
															endforeach;
														else:
															$ClientID = '0'; // default
														endif;
														$GetDocumentsViolationsFromClient = $this->Model_Selects->GetDocumentsViolationsFromClient($ApplicantID, $ClientID, $HistoryFrom->format('Y-m-d'), $HistoryTo->format('Y-m-d'));
													?>
													<?php if($GetDocumentsViolationsFromClient->num_rows() > 0): ?>
													<a href="<?=base_url();?>ViewEmployee?id=<?=$row['ApplicantID'];?>&v_client=<?=$ClientID?>&from=<?=$HistoryFrom->format('Y-m-d');?>&to=<?=$HistoryTo->format('Y-m-d');?>#Contract" class="btn btn-sm btn-danger PrintExclude"><i class="far fa-eye"></i> View (<?=$GetDocumentsViolationsFromClient->num_rows();?>)</a>
													<?php else: ?>
													<a href="<?=base_url();?>ViewEmployee?id=<?=$row['ApplicantID'];?>&v_client=<?=$ClientID?>&from=<?=$HistoryFrom->format('Y-m-d');?>&to=<?=$HistoryTo->format('Y-m-d');?>#Contract" class="PrintExclude" style="color: green;"><i class="fas fa-check"></i> None</a>
													<?php endif; ?>
												</td>
											</tr>
										<?php endforeach ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<?php if(!empty($_GET['v_client']) && !empty($_GET['from']) && !empty($_GET['to'])): ?>
					<?php
						$ClientLookup = $_GET['v_client'];
						$HistoryFrom = $_GET['from'];
						$HistoryTo = $_GET['to'];
						$GetDocumentsViolationsFromClient = $this->Model_Selects->GetDocumentsViolationsFromClient($ApplicantID, $ClientLookup, $HistoryFrom, $HistoryTo);
						$GetClientID = $this->Model_Selects->GetClientID($ClientLookup);
						$HistoryFrom = new DateTime($HistoryFrom);
						$HistoryFrom = $HistoryFrom->format('F d, Y');
						$HistoryTo = new DateTime($HistoryTo);
						$HistoryTo = $HistoryTo->format('F d, Y');
						if ($GetClientID->num_rows() > 0):
							foreach($GetClientID->result_array() as $row):
								$ClientName = $row['Name'];
							endforeach;
						else:
							$ClientName = $ClientLookup;
						endif;
					?>
					<hr>
					<div class="row ml-2">
						<div class="col-sm-12">
							<i class="fas fa-folder-open"></i> <?php echo $ClientName; ?>'s Violations (<?php echo $GetDocumentsViolationsFromClient->num_rows(); ?>) between <?php echo $HistoryFrom; ?> and <?php echo $HistoryTo; ?>
						</div>
						<div class="col-sm-12 mt-4 ml-5">
						<?php if ($GetDocumentsViolationsFromClient->num_rows() > 0) { ?>
							<?php
								$len = $GetDocumentsViolationsFromClient->num_rows();
								$iteration = 0;
							 ?>
							<?php foreach ($GetDocumentsViolationsFromClient->result_array() as $row): ?>
								<?php $iteration++; ?>
									<div class="mb-3">
										<?php if ($iteration == $len): ?>
											<img class="folder-documents-tree" src="assets/img/documents-folder-tree.png">
										<?php else: ?>
											<img class="folder-documents-tree" src="assets/img/documents-folder-tree-continuous.png">
										<?php endif; ?>
										<div class="folder-documents-icon"><i class="fas fa-file-pdf"></i></div>
										<div class="col-sm-12 ml-3">
											<a class="ml-2" href="<?php echo $row['Doc_File'];?>" target="_blank">
											<b>													<?php
													if ($row['Type'] == 'Blacklist') {
														echo '[BLACKLIST] - ' . $row['Doc_FileName'];
													} else {
														echo $row['Doc_FileName'];
													}
												?>		
											</b></a>
										</div>
										<div class="folder-documents-info col-sm-12 ml-4">
											<?php echo $row['Subject']; ?> | Created by <?php echo $row['DateAdded']; ?> (0MB)
										</div>
									</div>
							<?php endforeach ?>
						<?php } else { ?>
							No documents available.
						<?php } ?>
						</div>
					</div>
					<?php endif; ?>
				</div>

				<!-- Modal footer -->
				<div class="modal-footer">
					<button type="button" class="btn btn-danger ml-auto" data-dismiss="modal">Close</button>
				</div>

				</div>
			</div>
		</div>