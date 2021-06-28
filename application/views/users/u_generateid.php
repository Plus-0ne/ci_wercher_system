<?php
$T_Header;

$employeeArray = [];
if ($this->session->userdata('IDCardGroup') != NULL) {
	$employeeArray = $this->session->userdata('IDCardGroup');
}
$removeID = $this->input->get('remove');
if ($removeID) {
	$key = array_search($removeID, $employeeArray);
	if ($key !== false) {
		unset($employeeArray[$key]);
	}
}
$employeeArray = array_values($employeeArray);
$id = $this->input->get('id'); // to be added
if ($id != NULL && !in_array($id, $employeeArray)) {
	array_push($employeeArray, $id);
}

$employeeArrayRowOne = [];
$employeeArrayRowTwo = [];
$employeeArrayRowThree = [];

$maxSize = 9;
$holderSize = 3;


$employeeArraySize = count($employeeArray);
for ($i = 0; $i < $employeeArraySize; $i++) {
	if ($i <= 2) {
		array_push($employeeArrayRowOne, $employeeArray[$i]);
	} elseif ($i > 2 && $i <= 5) {
		array_push($employeeArrayRowTwo, $employeeArray[$i]);
	} elseif ($i > 5 && $i <= 8) {
		array_push($employeeArrayRowThree, $employeeArray[$i]);
	}
}
// First Row
$employeeArrayRowOneSize = count($employeeArrayRowOne);
$paddingRowOne = $holderSize - $employeeArrayRowOneSize;
$employeeArrayRowOne = array_reverse($employeeArrayRowOne);
// Second Row
$employeeArrayRowTwoSize = count($employeeArrayRowTwo);
$paddingRowTwo = $holderSize - $employeeArrayRowTwoSize;
$employeeArrayRowTwo = array_reverse($employeeArrayRowTwo);
// Third Row
$employeeArrayRowThreeSize = count($employeeArrayRowThree);
$paddingRowThree = $holderSize - $employeeArrayRowThreeSize;
$employeeArrayRowThree = array_reverse($employeeArrayRowThree);
// var_dump($employeeArrayRowOne);
// echo '<br>';
// echo $paddingRowOne;
// echo '<br><br>';
// var_dump($employeeArrayRowTwo);
// echo '<br>';
// echo $paddingRowTwo;
// echo '<br><br>';
// var_dump($employeeArrayRowThree);
// echo '<br>';
// echo $paddingRowThree;
$holderDirection = $this->input->get('mode');

$this->session->set_userdata('IDCardGroup', $employeeArray);

if ($employeeArraySize <= 3) {
	$holderSize = 3;
} elseif ($employeeArraySize > 3 && $employeeArraySize <= 6) {
	$holderSize = 6;
}
$padding = $holderSize - $employeeArraySize;

$date = new DateTime();
$day = $date->format('Y-m-d');
$day = DateTime::createFromFormat('Y-m-d', $day)->format('F d, Y');?>
<body>
	<div class="wrapper">
		<?php $this->load->view('_template/users/u_sidebar'); ?>
		<div id="content" class="ncontent wercher-background-lowpoly">
			<div class="container-fluid">
				<?php $this->load->view('_template/users/u_notifications'); ?>
					<div class="row">
						<div class="col-sm-12 mt-2 mb-5">
							<button type="button" class="btn btn-success glow-gold" onClick="printContent('PrintOut')" style="width: 400px;"><i class="fas fa-print"></i> Print</button>
							<button type="button" class="flip-btn btn btn-primary" style="width: 150px;"><i class="fas fa-redo"></i> Show Back</button>
							<button type="button" class="new-earnings-row-btn btn btn-secondary"><i class="fas fa-lock"></i> Add Employee (Work in Progress)</button>
							<span style="color: #fff;">Scale: <input class="idcard-scale" type="number" step="0.01" min="1" max="100" value="100"> %</span>
						</div>
					</div>
					<!-- Front -->
					<div class="row wercher-idcard-front wercher-idcard-group PrintOut ml-2">
						<!-- Main -->
						<?php for($i = 0; $i < $maxSize; $i++):
							if ($i < $employeeArraySize):
								$getEmployeeDetails = $this->Model_Selects->GetEmployeeDetails($employeeArray[$i]);
								if ($getEmployeeDetails->num_rows() > 0):
									foreach($getEmployeeDetails->result_array() as $erow): ?>
									<div class="wercher-idcard-holder" style="user-select: none;" data-id="<?php echo $erow['ApplicantID']; ?>">
										<div class="WercherIDFront" style="transform-origin: right top;">
											<div class="wercher-idcard-container mx-auto d-block">
												<img src="<?php echo base_url(); ?>assets/img/wercher_id_front.png">
											</div>
											<img class="wercher-idcard-photo" src="<?php echo $erow['ApplicantImage']; ?>" width="125" height="125">
											<div class="wercher-idcard-name">
												<span><b><?php echo $erow['LastName'] . ', ' . $erow['FirstName'] . ' ' . $erow['MiddleName'][0] . '.'; if ($erow['NameExtension'] != NULL): echo ', ' . $erow['NameExtension']; endif; ?></b></span>
											</div>
											<div class="wercher-idcard-designation">
												<span><?php echo $erow['PositionDesired']; ?></span>
											</div>
											<div class="wercher-idcard-dateissued">
												<span><?php echo $day; ?></span>
											</div>
											<div class="wercher-idcard-employeeid">
												<span>
													<?php if($erow['Status'] == 'Employed' || $erow['Status'] == 'Employed (Permanent)' || $erow['Status'] == 'Absorbed (Wercher)'): ?>
														<?php echo $erow['EmployeeID']; ?>
													<?php else: ?>
														<?php echo 'NO EMPLOYEE ID ASSIGNED'; ?>
													<?php endif; ?>
												</span>
											</div>
										</div>
									</div>
									<?php endforeach;?>
								<?php endif; ?>
							<?php endif; ?>
						<?php endfor;?>
						<!-- Post Padding -->
						<?php for($i = 0; $i < $padding; $i++): ?>
							<div class="wercher-idcard-holder" style="user-select: none;">
								
							</div>
						<?php endfor; ?>
					</div>
					<?php $employeeArray = array_reverse($employeeArray); ?>
					<!-- Back -->
					<div class="row wercher-idcard-back wercher-idcard-group PrintOut ml-2" style="display: none;">
						<!-- First Row -->
						<!-- ~ pre padding -->
						<?php for($i = 0; $i < $paddingRowOne; $i++): ?>
							<div class="wercher-idcard-holder" style="user-select: none;">

							</div>
						<?php endfor; ?>
						<!-- ~ main -->
						<?php for($i = 0; $i < $employeeArrayRowOneSize; $i++):
							$getEmployeeDetails = $this->Model_Selects->GetEmployeeDetails($employeeArrayRowOne[$i]);
							if ($getEmployeeDetails->num_rows() > 0):
								foreach($getEmployeeDetails->result_array() as $erow): ?>
								<div class="wercher-idcard-holder" style="user-select: none;" data-id="<?php echo $erow['ApplicantID']; ?>">
									<div class="WercherIDFront" style="transform-origin: right top;">
										<div class="wercher-idcard-container mx-auto d-block">
											<img src="<?php echo base_url(); ?>assets/img/wercher_id_back.png">
										</div>
										<div class="wercher-idcard-address">
											<span><?php echo $erow['Address_Present']; ?></span>
										</div>
										<div class="wercher-idcard-emergency">
											<span><?php echo $erow['EmergencyPerson']; ?></span>
										</div>
										<div class="wercher-idcard-telno">
											<span><?php echo $erow['Phone_No']; ?></span>
										</div>
										<div class="wercher-idcard-sssno">
											<span><?php echo $erow['SSS_No']; ?></span>
										</div>
										<div class="wercher-idcard-tin">
											<span><?php echo $erow['TIN']; ?></span>
										</div>
										<div class="wercher-idcard-pagibig">
											<span><?php echo $erow['HDMF']; ?></span>
										</div>
										<div class="wercher-idcard-philhealth">
											<span><?php echo $erow['PhilHealth']; ?></span>
										</div>
										<div class="wercher-idcard-hmo">
											<span><?php echo $erow['HMO']; ?></span>
										</div>
									</div>
								</div>
								<?php endforeach;?>
							<?php endif; ?>
						<?php endfor;?>
						<!-- Second Row -->
						<!-- ~ pre padding -->
						<?php for($i = 0; $i < $paddingRowTwo; $i++): ?>
							<div class="wercher-idcard-holder" style="user-select: none;">

							</div>
						<?php endfor; ?>
						<!-- ~ main -->
						<?php for($i = 0; $i < $employeeArrayRowTwoSize; $i++):
							$getEmployeeDetails = $this->Model_Selects->GetEmployeeDetails($employeeArrayRowTwo[$i]);
							if ($getEmployeeDetails->num_rows() > 0):
								foreach($getEmployeeDetails->result_array() as $erow): ?>
								<div class="wercher-idcard-holder" style="user-select: none;">
									<div class="WercherIDFront" style="transform-origin: right top;">
										<div class="wercher-idcard-container mx-auto d-block">
											<img src="<?php echo base_url(); ?>assets/img/wercher_id_back.png">
										</div>
										<div class="wercher-idcard-address">
											<span><?php echo $erow['Address_Present']; ?></span>
										</div>
										<div class="wercher-idcard-emergency">
											<span><?php echo $erow['EmergencyPerson']; ?></span>
										</div>
										<div class="wercher-idcard-telno">
											<span><?php echo $erow['Phone_No']; ?></span>
										</div>
										<div class="wercher-idcard-sssno">
											<span><?php echo $erow['SSS_No']; ?></span>
										</div>
										<div class="wercher-idcard-tin">
											<span><?php echo $erow['TIN']; ?></span>
										</div>
										<div class="wercher-idcard-pagibig">
											<span><?php echo $erow['HDMF']; ?></span>
										</div>
										<div class="wercher-idcard-philhealth">
											<span><?php echo $erow['PhilHealth']; ?></span>
										</div>
										<div class="wercher-idcard-hmo">
											<span><?php echo $erow['HMO']; ?></span>
										</div>
									</div>
								</div>
								<?php endforeach;?>
							<?php endif; ?>
						<?php endfor;?>
						<!-- Third Row -->
						<!-- ~ pre padding -->
						<?php for($i = 0; $i < $paddingRowThree; $i++): ?>
							<div class="wercher-idcard-holder" style="user-select: none;">

							</div>
						<?php endfor; ?>
						<!-- ~ main -->
						<?php for($i = 0; $i < $employeeArrayRowThreeSize; $i++):
							$getEmployeeDetails = $this->Model_Selects->GetEmployeeDetails($employeeArrayRowThree[$i]);
							if ($getEmployeeDetails->num_rows() > 0):
								foreach($getEmployeeDetails->result_array() as $erow): ?>
								<div class="wercher-idcard-holder" style="user-select: none;">
									<div class="WercherIDFront" style="transform-origin: right top;">
										<div class="wercher-idcard-container mx-auto d-block">
											<img src="<?php echo base_url(); ?>assets/img/wercher_id_back.png">
										</div>
										<div class="wercher-idcard-address">
											<span><?php echo $erow['Address_Present']; ?></span>
										</div>
										<div class="wercher-idcard-emergency">
											<span><?php echo $erow['EmergencyPerson']; ?></span>
										</div>
										<div class="wercher-idcard-telno">
											<span><?php echo $erow['Phone_No']; ?></span>
										</div>
										<div class="wercher-idcard-sssno">
											<span><?php echo $erow['SSS_No']; ?></span>
										</div>
										<div class="wercher-idcard-tin">
											<span><?php echo $erow['TIN']; ?></span>
										</div>
										<div class="wercher-idcard-pagibig">
											<span><?php echo $erow['HDMF']; ?></span>
										</div>
										<div class="wercher-idcard-philhealth">
											<span><?php echo $erow['PhilHealth']; ?></span>
										</div>
										<div class="wercher-idcard-hmo">
											<span><?php echo $erow['HMO']; ?></span>
										</div>
									</div>
								</div>
								<?php endforeach;?>
							<?php endif; ?>
						<?php endfor;?>
					</div>
				</div>
				</div>
					<!-- <div class="col-sm-6">
						<div class="WercherIDBack" style="width: 345px; height: 501px; user-select: none;">
							<div class="mx-auto d-block">
								<img class="wercher-idcard-container" src="<?php echo base_url(); ?>assets/img/wercher_id_back.png">
							</div>
							
						</div>
						<button id="BackSaveBtn" type="button" class="btn btn-primary wercher-idcard-backbtn"><i class="fas fa-download"></i> Save Back to Computer</button>
					</div> -->
	</div>
</body>
<?php $this->load->view('_template/users/u_scripts'); ?>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.textfill.min.js"></script>
<script type="text/javascript">
	$(document).ready(function () {
		$('.idcard-scale').bind('input', function() {
			let scale = $(this).val() / 100;
			$('.WercherIDFront').css({transform: 'scale(' + scale + ')'});
			$('.WercherIDFront').parent('.wercher-idcard-holder').css({width: (345 * scale) + "px",
	      height: (501 * scale) + "px"});
		});
		$('.wercher-idcard-container').attr('draggable', false);
		$('.wercher-idcard-photo').attr('draggable', false);
		$('#WercherIDFront').on('contextmenu', 'img', function(e){ 
			return false;
		});
		$('#WercherIDBack').on('contextmenu', 'img', function(e){ 
			return false;
		});
		$('.wercher-idcard-name').textfill({
			debug: true,
			minFontPixels: 10,
			maxFontPixels: 12,
		});
		$('.wercher-idcard-designation').textfill({
			debug: true,
			minFontPixels: 10,
			maxFontPixels: 15,
		});
		$('.wercher-idcard-dateissused').textfill({
			debug: true,
			minFontPixels: 10,
			maxFontPixels: 15,
		});
		$('.wercher-idcard-employeeid').textfill({
			debug: true,
			minFontPixels: 10,
			maxFontPixels: 15,
		});
		$('.wercher-idcard-address, .wercher-idcard-emergency').textfill({
			debug: true,
			minFontPixels: 10,
			maxFontPixels: 15,
		});
		$('.wercher-idcard-telno, .wercher-idcard-sssno, .wercher-idcard-tin, .wercher-idcard-pagibig, .wercher-idcard-philhealth, .wercher-idcard-hmo').textfill({
			debug: true,
			minFontPixels: 10,
			maxFontPixels: 15,
		});
		$('[data-toggle="tooltip"]').tooltip();
		let flip = false;
		$('.flip-btn').on('click', function() {
			if (!flip) {
				flip = true;
				$('.flip-btn').html('<i class="fa fa-redo"></i> Show Front');
				$('.wercher-idcard-back').show();
				$('.wercher-idcard-front').hide();
			} else {
				flip = false;
				$('.flip-btn').html('<i class="fa fa-redo"></i> Show Back');
				$('.wercher-idcard-back').hide();
				$('.wercher-idcard-front').show();
			}
		});
		$('.wercher-idcard-holder').on('click', function() {
			let id = $(this).data('id');
			if (id) {
				window.location = '<?=base_url()?>GenerateIDCard?remove=' + id;
			}
		});
	});
</script>
</html>