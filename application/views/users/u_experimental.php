<?php $T_Header;?>
<body>
	<div class="wrapper">
		<?php $this->load->view('_template/users/u_sidebar'); ?>
		<div id="content" class="ncontent">
			<div class="container-fluid">
				<?php $this->load->view('_template/users/u_notifications'); ?>
				<div class="row">
					<div class="col-sm-12 pt-3 pb-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb" style="background-color: transparent;">
								<li class="breadcrumb-item"><a href="">Home</a></li>
								<li class="breadcrumb-item active" aria-current="page">Experimental</li>
							</ol>
						</nav>
					</div>
				</div>
				<div class="row rcontent PrintOutTable">
					<?php echo $this->session->flashdata('prompts'); ?>
					<div class="col-sm-4 col-md-4 mb-5">
						<h4>
							<i class="fas fa-vial"></i> Tax Table
						</h4>
					</div>
					<div class="col-sm-8 col-md-8 ml-auto text-right PrintExclude">
						<button id="ShowDemo" type="button" class="btn btn-primary mr-auto"><i class="fas fa-flask"></i> Demo</button>
						<button type="button" class="btn btn-primary mr-auto"><i class="fas fa-import-file"></i> Import Excel File</button>
						<button onClick="printContent('PrintOutTable')" type="button" class="btn btn-primary mr-auto"><i class="fas fa-print"></i> Print</button>
					</div>
					<div id="TaxTable" class="col-sm-12">

						<?php

						// if ( $xlsx = SimpleXLSX::parse(base_url() . 'assets/excel/Tax Calc.xlsx')) {

						// 	echo '<table border="1" cellpadding="3" style="border-collapse: collapse">';

						// 	$dim = $xlsx->dimension();
						// 	$cols = $dim[0];

						// 	foreach ( $xlsx->rows() as $k => $r ) {
						// 		//		if ($k == 0) continue; // skip first row
						// 		echo '<tr>';
						// 		for ( $i = 0; $i < $cols; $i ++ ) {
						// 			echo '<td class="test">' . ( isset( $r[ $i ] ) ? $r[ $i ] : '&nbsp;' ) . '</td>';
						// 		}
						// 		echo '</tr>';
						// 	}
						// 	echo '</table>';
						// } else {
						// 	echo SimpleXLSX::parseError();
						// }
						?>

						<table class="table table-hover">
							<th>Compensation Range</th>
							<th>Withholding Tax</th>
							<tr>
								<td>0</td>
								<td>0 (0%)</td>
							</tr>
							<tr>
								<td>10,416 to 16,666</td>
								<td>0 (20%)</td>
							</tr>
							<tr>
								<td>16,667 to 33,333</td>
								<td>1250 (25%)</td>
							</tr>
							<tr>
								<td>33,334 to 83,333</td>
								<td>5416.67 (30%)</td>
							</tr>
							<tr>
								<td>83,334 to 333,333</td>
								<td>20416.67 (32%)</td>
							</tr>
							<tr>
								<td>333,334 to 500,000</td>
								<td>100,416.67 (35%)</td>
							</tr>
						</table>


					</div>

				</div>
				<div class="row rcontent PrintOut">
					<div class="col-sm-12 col-md-4 mb-5">
						<h4>
							<i class="fas fa-vial"></i> Tax Input for ...
						</h4>
					</div>
					<div class="col-sm-8 col-md-8 ml-auto text-right PrintExclude">
						<button onClick="printContent('PrintOut')" type="button" class="btn btn-primary mr-auto"><i class="fas fa-print"></i> Print</button>
					</div>
					<div class="col-sm-12 form-group">
						<label>Gross Income (Monthly)</label>
						<input type="text" class="form-control" name="Gross" id="Gross" value="20000">
					</div>
					<div class="col-sm-12 col-md-4 form-group">
						<label>SSS</label>
						<input type="text" class="form-control" name="SSS" id="SSS" value="500">
					</div>
					<div class="col-sm-12 col-md-4 form-group">
						<label>PhilHealth</label>
						<input type="text" class="form-control" name="PhilHealth" id="PhilHealth" value="750">
					</div>
					<div class="col-sm-12 col-md-4 form-group">
						<label>HDMF</label>
						<input type="text" class="form-control" class="form-control" name="Gross" id="Gross" value="10%" readonly>
					</div>
					<div class="col-sm-12 form-group text-center PrintExclude">
						<button class="btn btn-primary w-50" onclick="Compute()">Calculate</button>
					</div>
					<div class="col-sm-12 col-md-6 form-group">
						<label>Taxable Income</label>
						<input type="text" class="form-control" name="TaxableIncome" id="TaxableIncome" readonly>
					</div>
					<div class="col-sm-12 col-md-6 form-group">
						<label>Total Tax</label>
						<input type="text" class="form-control" name="TotalTax" id="TotalTax" readonly>
					</div>
					<div class="col-sm-12 col-md-6 form-group">
						<label>Range</label>
						<input type="text" class="form-control" name="CompRange" id="CompRange" readonly>
					</div>
					<div class="col-sm-12 col-md-6 form-group">
						<label>Formula</label>
						<input type="text" class="form-control" name="Formula" id="Formula" readonly>
					</div>
					<div class="col-sm-12 form-group">
						<label>Take Home Pay</label>
						<input type="text" class="form-control" name="TakeHomePay" id="TakeHomePay" readonly>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
<?php $this->load->view('_template/users/u_scripts'); ?>
<script type="text/javascript">
	$(document).ready(function () {
		$('#sidebarCollapse').on('click', function () {
			$('#sidebar').toggleClass('active');
			$('.ncontent').toggleClass('shContent');
		});
		$('#TaxTable').hide();
	});

	$('#ShowDemo').click(function() {
		$('#TaxTable').show();
	});

	function Compute() {
		var grossIncome = $('#Gross').val();
		var SSSDeduction = $('#SSS').val();
		var PHDeduction = $('#PhilHealth').val();

		taxableIncome = grossIncome - SSSDeduction;
		taxableIncome = taxableIncome - PHDeduction;
		if (taxableIncome < 10417) {
			wTaxFixed = 0;
			wTaxPercent = 0;
			compensationRange = "Below 10,417";
			wTax = 0;
		};
		if (taxableIncome >= 10417 && taxableIncome < 16667 ) {
			wTaxFixed = 0;
			wTaxPercent = 0.2;
			compensationRange = "10,417 to 16,667";
			wTax = (taxableIncome - 10417)*wTaxPercent;
		};
		if (taxableIncome >= 16667 && taxableIncome < 33333 ) {
			wTaxFixed = 1250;
			wTaxPercent = 0.25;
			compensationRange = "16,667 to 33,333";
			wTax = wTaxFixed + ((taxableIncome - 16667)*wTaxPercent);
		};
		if (taxableIncome >= 33333 && taxableIncome < 83333 ) {
			wTaxFixed = 5416.67;
			wTaxPercent = 0.3;
			compensationRange = "33,334 to 83,333";
			wTax = wTaxFixed + ((taxableIncome - 33333)*wTaxPercent);
		};
		if (taxableIncome >= 83333 && taxableIncome < 333333 ) {
			wTaxFixed = 20416.67;
			wTaxPercent = 0.32;
			compensationRange = "83,334 to 333,333";
			wTax = wTaxFixed + ((taxableIncome - 83333)*wTaxPercent);
		};
		if (taxableIncome >= 333333 && taxableIncome <= 500000 ) {
			wTaxFixed = 100416.67;
			wTaxPercent = 0.35;
			compensationRange = "333,334 to 500,000";
			wTax = wTaxFixed + ((taxableIncome - 333333)*wTaxPercent);
		};
		takeHomePay = taxableIncome - wTax;
		totalTax = Math.abs(takeHomePay - grossIncome);
		text = '(' + grossIncome + ' - (' + SSSDeduction + ' + ' + PHDeduction + ')) - ' + '(' + wTaxFixed + ' - (Excess * ' + wTaxPercent + '))';  
		$('#TaxableIncome').val(taxableIncome);
		$('#TotalTax').val(totalTax);
		$('#Formula').val(text);
		$('#CompRange').val(compensationRange);
		$('#TakeHomePay').val(takeHomePay);
	}
</script>
</html>