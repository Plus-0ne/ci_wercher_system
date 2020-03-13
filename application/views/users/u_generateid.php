<?php $T_Header;?>
<body style="background-color: rgba(55, 55, 55, 1.0)">
	<div class="container-fluid">
		<div class="row">
			<?php echo $this->session->flashdata('prompts'); ?>
			<div class="col-4 col-sm-4 col-md-4 PrintPageName PrintOut">
			</div>
			<div class="col-8 col-sm-8 col-md-8 text-right">
			</div>
			<div class="col-sm-6">
				<div id="WercherIDFront">
					<img src="<?php echo base_url(); ?>assets/img/wercher_id_front.png">
					<img class="wercher-idcard-photo" src="<?php echo $ApplicantImage; ?>" width="200" height="200">
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
								<?php if($Status == 'Employed'): ?>
									<?php echo $EmployeeID; ?>
								<?php else: ?>
									<?php echo 'NO EMPLOYEE ID ASSIGNED'; ?>
								<?php endif; ?>
							</div>
						</div>
					</div>
				</div>
				<button id="FrontSaveBtn" type="button" class="btn btn-primary wercher-idcard-frontbtn"><i class="fas fa-download"></i> Save Front to Computer</button>
			</div>
			<div class="col-sm-6">
				<div id="WercherIDBack" class="w-100">
					<img src="<?php echo base_url(); ?>assets/img/wercher_id_back.png">
					<div class="wercher-idcard-address">
						<div class="col-sm-12">
							<?php echo $Address_Present; ?>
						</div>
					</div>
					<div class="wercher-idcard-telno">
						<div class="col-sm-12">
							<?php echo $Phone_No; ?>
						</div>
					</div>
					<div class="wercher-idcard-numberfields">
						<div class="col-sm-12">
							<?php echo $SSS_No; ?>
						</div>
					</div>
					<div class="wercher-idcard-numberfields">
						<div class="col-sm-12">
							<?php echo $TIN; ?>
						</div>
					</div>
					<div class="wercher-idcard-numberfields">
						<div class="col-sm-12">
							<?php echo $SSS_No; ?>
						</div>
					</div>
					<div class="wercher-idcard-numberfields">
						<div class="col-sm-12">
							<?php echo $PhilHealth; ?>
						</div>
					</div>
				</div>
				<button id="BackSaveBtn" type="button" class="btn btn-primary wercher-idcard-backbtn"><i class="fas fa-download"></i> Save Back to Computer</button>
			</div>
		</div>
	</div>
</body>
<?php $this->load->view('_template/users/u_scripts'); ?>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/html2canvas.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/canvas2image.js"></script>
<script type="text/javascript">
	$(document).ready(function () {
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
				onrendered: function(canvas) {
					saveAs(canvas.toDataURL(), 'WercherIDCardFront_<?php echo $LastName . $FirstName . $MiddleInitial; ?>.png');
				}
			});
		});

		$("#BackSaveBtn").click(function() {
			html2canvas($("#WercherIDBack"), {
				onrendered: function(canvas) {
					saveAs(canvas.toDataURL(), 'WercherIDCardBack_<?php echo $LastName . $FirstName . $MiddleInitial; ?>.png');
				}
			});
		});
	});
</script>
</html>