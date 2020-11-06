<?php

?>
<style>
	html,body
	{
		background-color: #FFFFFF;
	}
</style>
<body>
	<div class="wrapper">
		<?php $this->load->view('_template/users/u_sidebar'); ?>
		<div id="content" class="ncontent">
			<div class="container-fluid">
				<?php $this->load->view('_template/users/u_notifications'); ?>
					<div class="row m-5 p-2">
						<div class="col-sm-6 mt-4 eprint-commandcard-text">
							<div class="row mt-2">
								<div class="col-sm-12">
									<button type="button" class="btn btn-success eprint-print-btn eprint-print-btn-glow" onClick="printContent('PrintOut')" style="width: 400px;"><i class="fas fa-print"></i> Print</button>
								</div>
							</div>
						</div>
					</div>
					<div class="row PrintOut">
						<?php for ($i = 0; $i < 4; $i++): ?>
							<div class="payslip-container col-sm-12">
								<div class="row mt-2" style="border-bottom: 1px solid black;">
									<div class="col-sm-1">
										<img src="<?=base_url()?>assets/img/wercher_logo.png" width="104" height="92" style="filter: grayscale(100%);">
									</div>
									<div class="col-sm-11 text-center">
										<span style="font-size: 24px;"><b>WERCHER COOP</b></span>
										<p>Wercher Solutions and Resources Labor Service Cooperative</p>
										<p>Payslip for DATE</p>
									</div>
								</div>
								<div class="row mt-2" style="border-bottom: 1px solid black;">
									<div class="col-sm-4">
										Employee ID:
									</div>
									<div class="col-sm-2">
										####
									</div>
									<div class="col-sm-4">
										Name:
									</div>
									<div class="col-sm-2">
										####
									</div>
									<div class="col-sm-4">
										Designation:
									</div>
									<div class="col-sm-2">
										####
									</div>
									<div class="col-sm-4">
										######:
									</div>
									<div class="col-sm-2">
										####
									</div>
									<div class="col-sm-4">
										######:
									</div>
									<div class="col-sm-2">
										####
									</div>
									<div class="col-sm-4">
										######:
									</div>
									<div class="col-sm-2">
										####
									</div>
									<div class="col-sm-4">
										######:
									</div>
									<div class="col-sm-2">
										####
									</div>
									<div class="col-sm-4">
										######:
									</div>
									<div class="col-sm-2">
										####
									</div>
								</div>
								<div class="row" style="border-bottom: 1px solid black;">
									<div class="col-sm-6" style="border-right: 1px solid black;">
										<b>Earnings</b>
										<div class="row">
											<div class="col-sm-6">
												######
											</div>
											<div class="col-sm-6 text-right">
												####
											</div>
											<div class="col-sm-6">
												######
											</div>
											<div class="col-sm-6 text-right">
												####
											</div>
											<div class="col-sm-6">
												######
											</div>
											<div class="col-sm-6 text-right">
												####
											</div>
											<div class="col-sm-6">
												######
											</div>
											<div class="col-sm-6 text-right">
												####
											</div>
										</div>
									</div>
									<div class="col-sm-6">
										<b>Deductions</b>
										<div class="row">
											<div class="col-sm-6">
												######
											</div>
											<div class="col-sm-6 text-right">
												####
											</div>
											<div class="col-sm-6">
												######
											</div>
											<div class="col-sm-6 text-right">
												####
											</div>
											<div class="col-sm-6">
												######
											</div>
											<div class="col-sm-6 text-right">
												####
											</div>
											<div class="col-sm-6">
												######
											</div>
											<div class="col-sm-6 text-right">
												####
											</div>
										</div>
									</div>
								</div>
							</div>
						<?php endfor; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
<?php $this->load->view('_template/users/u_scripts');?>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.textfill.min.js"></script>
<script type="text/javascript">
	$(document).ready(function () {
		

	});
</script>