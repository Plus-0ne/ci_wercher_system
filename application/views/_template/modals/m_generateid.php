<div class="modal fade" id="GenerateIDModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<div class="col-sm-12 mr-auto ml-auto">
					<div id="WercherIDFront" class="w-100">
						<div class="text-center">
							<img src="<?php echo base_url(); ?>assets/img/wercher_id_front.png">
							<img class="wercher-idcard-photo" src="<?php echo $ApplicantImage; ?>" width="200" height="200">
						</div>
						<div class="wercher-idcard-fields">
							<div class="wercher-idcard-name">
								<div class="col-sm-12">
									<?php echo $LastName . ', ' . $FirstName . ' ' . $MiddleInitial . '.'; ?>
								</div>
							</div>
							<div class="row">
								<div class="wercher-idcard-designation">
									<div class="col-sm-12">
										<?php echo $PositionDesired; ?>
									</div>
								</div>
								<div class="wercher-idcard-dateissued">
									<div class="col-sm-12">
										<?php echo date("Y-m-d"); ?>
									</div>
								</div>
							</div>
							<div class="wercher-idcard-employeeid">
								<div class="col-sm-12">
									<?php echo $EmployeeID; ?>
								</div>
							</div>
						</div>
					</div>
					<button id="FrontSaveBtn" class="btn btn-primary" type="button">Save as PNG</button>
				</div>
			</div>
		</div>
	</div>
</div>