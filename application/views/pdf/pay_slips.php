<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>
		Pay Slip
	</title>
	<link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/bootstrap.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="text-center mt-5">
					<label><?php print $nGetClientDet['Name']; ?></label>
					<br>
					<label><?php print $ngetPayslip['ApplicantID']; ?></label>
				</div>
			</div>
		</div>
	</div>
</body>
<script src="<?=base_url()?>assets/js/jquery-3.4.1.min.js"></script>
<script src="<?=base_url()?>assets/js/1.14.7_popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="<?=base_url()?>assets/js/4.3.1_bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</html>