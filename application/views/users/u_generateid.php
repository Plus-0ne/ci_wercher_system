<?php
$T_Header;

$employeeArray = [];
if ($this->session->userdata('IDCardGroup') != NULL) {
	$employeeArray = $this->session->userdata('IDCardGroup');
}
$id = $this->input->get('id'); // to be added
if ($id != NULL && !in_array($id, $employeeArray)) {
	array_push($employeeArray, $id);
}
$this->session->set_userdata('IDCardGroup', $employeeArray);

$maxSize = count($employeeArray);
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
						<div class="col-sm-12 mt-2">
							<button type="button" class="btn btn-success glow-gold" onClick="printContent('PrintOut')" style="width: 400px;"><i class="fas fa-print"></i> Print</button>
							<button type="button" class="new-earnings-row-btn btn btn-secondary"><i class="fas fa-lock"></i> Add Employee (Work in Progress)</button>
							<span style="color: #fff;">Scale: <input class="idcard-scale" type="number" step="0.01" min="1" max="100" value="100"> %</span>
						</div>
					</div>
					<div class="row wercher-idcard-group PrintOut ml-2">
						<?php for($i = 0; $i < $maxSize; $i++):
							$getEmployeeDetails = $this->Model_Selects->GetEmployeeDetails($employeeArray[$i]);
							if ($getEmployeeDetails->num_rows() > 0):
								foreach($getEmployeeDetails->result_array() as $erow): ?>
								<div class="wercher-idcard-holder" style="user-select: none;">
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
						<?php endfor;?>
					</div>
				</div>
					<!-- <div class="col-sm-6">
						<div class="WercherIDBack" style="width: 345px; height: 501px; user-select: none;">
							<div class="mx-auto d-block">
								<img class="wercher-idcard-container" src="<?php echo base_url(); ?>assets/img/wercher_id_back.png">
							</div>
							<div class="wercher-idcard-address">
								<span><?php echo $Address_Present; ?></span>
							</div>
							<div class="wercher-idcard-emergency">
								<span><?php echo $EmergencyPerson; ?></span>
							</div>
							<div class="wercher-idcard-telno">
								<span><?php echo $Phone_No; ?></span>
							</div>
							<div class="wercher-idcard-sssno">
								<span><?php echo $SSS_No; ?></span>
							</div>
							<div class="wercher-idcard-tin">
								<span><?php echo $TIN; ?></span>
							</div>
							<div class="wercher-idcard-pagibig">
								<span><?php echo $HDMF; ?></span>
							</div>
							<div class="wercher-idcard-philhealth">
								<span><?php echo $PhilHealth; ?></span>
							</div>
							<div class="wercher-idcard-hmo">
								<span><?php echo $HMO; ?></span>
							</div>
						</div>
						<button id="BackSaveBtn" type="button" class="btn btn-primary wercher-idcard-backbtn"><i class="fas fa-download"></i> Save Back to Computer</button>
					</div> -->
	</div>
</body>
<?php $this->load->view('_template/users/u_scripts'); ?>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/html2canvas.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/canvas2image.js"></script>
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
		function saveAs(uri, filename) {
			var link = document.createElement('a');
			if (typeof link.download === 'string') {
				link.href = uri;
				link.download = filename;

				//Firefox requires the link to be in the body
				document.body.appendChild(link);

				//simulate click
				link.click();

				//remove the link when done
				document.body.removeChild(link);
			} else {
				window.open(uri);
			}
		}
		$("#FrontSaveBtn").on('click', function () {
			html2canvas($("#WercherIDFront"), {
				dpi:300,
                scale:0.5,
				onrendered: function(canvas) {
					saveAs(canvas.toDataURL(), 'WercherIDCardFront_<?php echo $LastName . $FirstName . $MiddleName; ?>.png');
				}
			});
		});

		$("#BackSaveBtn").click(function() {
			html2canvas($("#WercherIDBack"), {
				onrendered: function(canvas) {
					saveAs(canvas.toDataURL(), 'WercherIDCardBack_<?php echo $LastName . $FirstName . $MiddleName; ?>.png');
				}
			});
		});
	});
</script>
</html>