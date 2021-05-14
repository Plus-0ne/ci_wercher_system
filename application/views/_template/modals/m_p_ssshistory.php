<div class="modal fade" id="SSSBatchesHistory" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Select a previous batch to view</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="row">
				<?php
					$GetSSSBatches = $this->Model_Selects->GetSSSBatches();
					if ($GetSSSBatches->num_rows() > 0):
						$firstBatchRow = false;
						foreach($GetSSSBatches->result_array() as $row):
							$batchDate = new DateTime($row['DateAdded']);
							$batchDay = $batchDate->format('Y-m-d');
							$batchDay = DateTime::createFromFormat('Y-m-d', $batchDay)->format('F d, Y');
							if (!$firstBatchRow):
								$firstBatchRow = true; ?>
								<div class="col-sm-12" style="margin-top: 5px;">
									<a href="<?php echo base_url() ?>SSS_Table?batch=<?php echo $row['Batch']; ?>" class="btn btn-success w-100">Batch #<?php echo $row['Batch']; ?> - <?php echo $batchDay; ?> (Latest)</a>
								</div>
							<?php else: ?>
								<div class="col-sm-12" style="margin-top: 5px;">
									<a href="<?php echo base_url() ?>SSS_Table?batch=<?php echo $row['Batch']; ?>" class="btn btn-info w-100">Batch #<?php echo $row['Batch']; ?> - <?php echo $batchDay; ?></a>
								</div>
							<?php endif;
						endforeach; 
					endif;
				?>
				</div>
			</div>
			<div class="modal-footer ajax-load-container" style="display: none;">
				<span class="mr-auto" style="font-size: 14px;">TOTAL: <b id="LoanTotal"></b></span>
				<button id="SaveLoans" type="button" class="save-loan-btn btn btn-success"><i class="fas fa-check"></i> Save</button>
			</div>
		</div>
	</div>
</div>