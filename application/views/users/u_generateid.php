<?php $T_Header;?>
<body>
	<div class="wrapper wercher-background-lowpoly">
		<div id="content">
			<div class="container-fluid">
				<div class="row">
					<div class="col-4 col-sm-4 col-md-4 PrintPageName PrintOut">
					</div>
					<div class="col-8 col-sm-8 col-md-8 text-right">
					</div>
					<div class="col-sm-6">
						<div id="WercherIDFront" style="width: 530px; height: 770px; user-select: none;">
							<img class="wercher-idcard-container" src="<?php echo base_url(); ?>assets/img/wercher_id_front.png">
							<img class="wercher-idcard-photo" src="<?php echo $ApplicantImage; ?>" width="200" height="200">
							<div class="wercher-idcard-name">
								<span><b><?php echo $LastName . ', ' . $FirstName . ' ' . $MiddleName[0] . '.'; if ($NameExtension != NULL): echo ', ' . $NameExtension; endif; ?></b></span>
							</div>
							<div class="wercher-idcard-designation">
								<span><?php echo $PositionDesired; ?></span>
							</div>
							<div class="wercher-idcard-dateissued">
								<span><?php echo date("Y-m-d"); ?></span>
							</div>
							<div class="wercher-idcard-employeeid">
								<span>
									<?php if($Status == 'Employed'): ?>
										<?php echo $EmployeeID; ?>
									<?php else: ?>
										<?php echo 'NO EMPLOYEE ID ASSIGNED'; ?>
									<?php endif; ?>
								</span>
							</div>
						</div>
						<button id="FrontSaveBtn" type="button" class="btn btn-primary wercher-idcard-frontbtn"><i class="fas fa-download"></i> Save Front to Computer</button>
					</div>
					<div class="col-sm-6">
						<div id="WercherIDBack" style="width: 530px; height: 770px; user-select: none;">
							<img class="wercher-idcard-container" src="<?php echo base_url(); ?>assets/img/wercher_id_back.png">
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
						</div>
						<button id="BackSaveBtn" type="button" class="btn btn-primary wercher-idcard-backbtn"><i class="fas fa-download"></i> Save Back to Computer</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
<?php $this->load->view('_template/users/u_scripts'); ?>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/html2canvas.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/canvas2image.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.textfill.min.js"></script>
<script type="text/javascript">
	$(document).ready(function () {
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
			minFontPixels: 8,
			maxFontPixels: 40,
		});
		$('.wercher-idcard-designation').textfill({
			debug: true,
			minFontPixels: 8,
			maxFontPixels: 22,
		});
		$('.wercher-idcard-dateissused').textfill({
			debug: true,
			minFontPixels: 8,
			maxFontPixels: 22,
		});
		$('.wercher-idcard-employeeid').textfill({
			debug: true,
			minFontPixels: 8,
			maxFontPixels: 18,
		});
		$('.wercher-idcard-address, .wercher-idcard-emergency').textfill({
			debug: true,
			minFontPixels: 9,
			maxFontPixels: 22,
		});
		$('.wercher-idcard-telno, .wercher-idcard-sssno, .wercher-idcard-tin, .wercher-idcard-pagibig, .wercher-idcard-philhealth').textfill({
			debug: true,
			minFontPixels: 8,
			maxFontPixels: 22,
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