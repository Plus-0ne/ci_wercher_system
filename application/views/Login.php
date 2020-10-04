<?php 
	date_default_timezone_set('Asia/Manila');
	$date = new DateTime(date('Y-m-d'));
	$day = $date->format('Y-m-d');
	$day = DateTime::createFromFormat('Y-m-d', $day)->format('F d, Y');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="robots" content="noindex" /> <!-- No search engine queries. Private website. -->
	<title>
		Login | Wercher Solutions and Resources Workers Cooperative
	</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="icon" href="<?=base_url()?>/favicon.ico" type="image/gif">
</head>
<body onload="digi()">
	<div class="header">

	</div>
	<ul class="background">
	   <li></li>
	   <li></li>
	   <li></li>
	   <li></li>
	   <li></li>
	   <li></li>
	   <li></li>
	   <li></li>
	   <li></li>
	   <li></li>
	   <li></li>
	   <li></li>
	   <li></li>
	   <li></li>
	   <li></li>
	   <li></li>
	   <li></li>
	   <li></li>
	   <li></li>
	   <li></li>
	</ul>
	<div class="content">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-md-5 col-lg-4 m-auto">
					<div class="text-center">
						<div style="margin-bottom: -50px;">
							<img class="m-auto PrintOutModal PrintOutModalExpired PrintOutHistory" src="<?=base_url()?>assets/img/wercher_logo.png">
						</div>
					</div>
					<div class="login-container pl-4 pb-4 pr-4" style="padding-top: 50px;">
						<?php echo form_open(base_url().'LoginValidation','method="post"'); ?>
						<!-- <div class="text-center mb-3">
							<img src="https://scontent.fmnl9-1.fna.fbcdn.net/v/t1.0-9/13240629_242086709504627_6587238279405995147_n.jpg?_nc_cat=111&_nc_eui2=AeFIkegEnuFMZPmHGeqO-6uIG-rM1RZ5XD-LNf9UTUgJmn0v1GaIwczrIaQhaOx612Te_DTWS27mrMXaP9PA5cLpK8kq-b9p50v730jmKNf0AqIIRSow2qCKyf0fw6FzNHY&_nc_oc=AQkTOQ3cESjy4W8r09IC7PA9h5THnvCINqcdQc5TM6tFP_vT2ZcGHt00ZXrKc8umZbs&_nc_ht=scontent.fmnl9-1.fna&oh=2d4b6f1485ef1087abad0bdee3661e2d&oe=5E22AE3E" alt="LOGO" width="100">
						</div> -->
						<div class="form-row">
							<div class="form-group w-100 text-center">
								<label>Admin ID</label>
								<input class="form-control text-center" type="text" name="UserName">
							</div>
						</div>
						<div class="form-row">
							<div class="form-group w-100 text-center">
								<label>Password</label>
								<input class="form-control text-center" type="password" name="Password">
							</div>
						</div>
						<div class="form-row">
							<div class="form-group w-100">
								<!-- <button type="submit" class="btn btn-primary w-100"> Sign-in </button> -->
								<button type="submit" class="btn btn-primary w-100"> Log In </button>
							</div>
							<!-- <div class="form-group w-100">
								<button class="btn btn-secondary w-100"> Sign-up </button>
							</div> -->
						</div>
						<!-- <div class="form-row">
							<div class="form-group w-100 text-center">
								<a class="btn btn-link" href="#">Forgot password?</a>
							</div>
						</div> -->
						<?php echo form_close(); ?>
					</div>
				</div>
				<div class="col-sm-12 col-md-5">
					<div class="login-time-container">
						<div id="logInTime" class="col-sm-12 login-time">
							00:00:00 AM
						</div>
						<!-- <div id="logInTimeDate" class="col-sm-12 login-time-date">
							Loading date...
						</div> -->
						<div class="login-description">
							<b class="login-description-header">Wercher Coop</b>
							<br>
							Wercher Solutions and Resources Labor Service Cooperative
							<br>
							Formerly Wercher Solutions and Resources Workers Cooperative
							<br>
							<br>
							#82 Circumferencial Road, Brgy. San Jose
							<br>
							Antipolo City, Rizal, 1870
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="footer">

	</div>
</body>
<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<noscript>JavaScript disabled. Enable JavaScript</noscript>
<script>
	function digi() {
	var date = new Date(),
	  hour = date.getHours(),
	  minute = checkTime(date.getMinutes()),
	  ss = checkTime(date.getSeconds());

	  // document.getElementById("logInTimeDate").innerHTML = <?php echo $day; ?>;

	function checkTime(i) {
	if( i < 10 ) {
	  i = "0" + i;
	}
	return i;
	}

	if ( hour > 12 ) {
	hour = hour - 12;
		if ( hour == 12 ) {
			hour = checkTime(hour);
			document.getElementById("logInTime").innerHTML = hour+":"+minute+":"+ss+" AM";
		}
		else {
			hour = checkTime(hour);
			document.getElementById("logInTime").innerHTML = hour+":"+minute+":"+ss+" PM";
		}
	}
	else {
		document.getElementById("logInTime").innerHTML = hour+":"+minute+":"+ss+" AM";;
	}
		var time = setTimeout(digi,1000);
	}

setInterval(time, 1000);
</script>
<style type="text/css">
	.login-description-header {
		text-shadow:
		    -2px -2px 0 #000,
		     0   -2px 0 #000,
		     2px -2px 0 #000,
		     2px  0   0 #000,
		     2px  2px 0 #000,
		     0    2px 0 #000,
		    -2px  2px 0 #000,
		    -2px  0   0 #000;
	}
	.login-time .login-time-date {
		font-size: 25px;
		margin-top: -20px;
	}
	.btn-primary {
		background-color: #c5ad00;
		border-color: #c5ad00;
	}

	.btn-info {
		background-color: #966800;
		border-color: #966800;
	}

	.page-item.active .page-link {
		background-color: #c5ad00;
		border-color: #c5ad00;
	}

	.page-link {
		color: #000000;
	}

	.page-link:hover {
		color: #c5ad00;
	}

	.btn-primary:hover, .btn-primary:focus, .btn-primary:active, .btn-primary:active:focus, .btn-primary .active, .open>.dropdown-toggle.btn-primary {
	    background-color: #756700 !important;
	    border-color: #756700 !important;
	    outline: gold !important;
	    box-shadow: 0 0 0 0.2rem gold !important;
	}

	.btn-info:hover, .btn-info:focus, .btn-info:active, .btn-info:active:focus, .btn-info .active, .open>.dropdown-toggle.btn-info {
	    background-color: #694900 !important;
	    border-color: #694900 !important;
	    outline: gold !important;
	    box-shadow: 0 0 0 0.2rem gold !important;
	}

	input[type]:focus {
		border-color: gold !important;
		box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset, 0 0 8px gold !important;
		outline: 0 none !important;
	}
	html , body
	{
		height: 100%;
		padding: 0px;
		margin: 0px;
		background-color: #2A2A2A;
	}
	.header
	{
		height: 20%;
	}
	.login-container
	{
		background-color: #FFFEFE;
		border-radius: 6px;
		-webkit-box-shadow: 0px 0px 57px -9px rgba(0,0,0,0.34);
		-moz-box-shadow: 0px 0px 57px -9px rgba(0,0,0,0.34);
		box-shadow: 0px 0px 57px -9px rgba(0,0,0,0.34);
	}
	@keyframes animate {
	    0%{
	        transform: translateY(0) rotate(0deg);
	        opacity: 1;
	        border-radius: 0;
	    }
	    100%{
	        transform: translateY(-1000px) rotate(720deg);
	        opacity: 0;
	        border-radius: 50%;
	    }
	}

	.background {
	    position: fixed;
	    width: 100vw;
	    height: 100vh;
	    top: 0;
	    left: 0;
	    margin: 0;
	    padding: 0;
	    background: #cca326;
	    overflow: hidden;
	}
	.background li {
	    position: absolute;
	    display: block;
	    list-style: none;
	    width: 20px;
	    height: 20px;
	    background: rgba(255, 255, 255, 0.2);
	    animation: animate 36s linear infinite;
	}
	.background li:nth-child(0) {
	    left: 64%;
	    width: 150px;
	    height: 150px;
	    bottom: -150px;
	    animation-delay: 1s;
	}
	.background li:nth-child(1) {
	    left: 67%;
	    width: 110px;
	    height: 110px;
	    bottom: -110px;
	    animation-delay: 4s;
	}
	.background li:nth-child(2) {
	    left: 21%;
	    width: 151px;
	    height: 151px;
	    bottom: -151px;
	    animation-delay: 5s;
	}
	.background li:nth-child(3) {
	    left: 18%;
	    width: 121px;
	    height: 121px;
	    bottom: -121px;
	    animation-delay: 12s;
	}
	.background li:nth-child(4) {
	    left: 86%;
	    width: 122px;
	    height: 122px;
	    bottom: -122px;
	    animation-delay: 3s;
	}
	.background li:nth-child(5) {
	    left: 61%;
	    width: 140px;
	    height: 140px;
	    bottom: -140px;
	    animation-delay: 16s;
	}
	.background li:nth-child(6) {
	    left: 84%;
	    width: 121px;
	    height: 121px;
	    bottom: -121px;
	    animation-delay: 2s;
	}
	.background li:nth-child(7) {
	    left: 32%;
	    width: 140px;
	    height: 140px;
	    bottom: -140px;
	    animation-delay: 32s;
	}
	.background li:nth-child(8) {
	    left: 54%;
	    width: 115px;
	    height: 115px;
	    bottom: -115px;
	    animation-delay: 10s;
	}
	.background li:nth-child(9) {
	    left: 19%;
	    width: 120px;
	    height: 120px;
	    bottom: -120px;
	    animation-delay: 45s;
	}
	.background li:nth-child(10) {
	    left: 60%;
	    width: 106px;
	    height: 106px;
	    bottom: -106px;
	    animation-delay: 17s;
	}
	.background li:nth-child(11) {
	    left: 56%;
	    width: 100px;
	    height: 100px;
	    bottom: -100px;
	    animation-delay: 53s;
	}
	.background li:nth-child(12) {
	    left: 73%;
	    width: 103px;
	    height: 103px;
	    bottom: -103px;
	    animation-delay: 24s;
	}
	.background li:nth-child(13) {
	    left: 72%;
	    width: 105px;
	    height: 105px;
	    bottom: -105px;
	    animation-delay: 48s;
	}
	.background li:nth-child(14) {
	    left: 62%;
	    width: 100px;
	    height: 100px;
	    bottom: -100px;
	    animation-delay: 37s;
	}
	.background li:nth-child(15) {
	    left: 69%;
	    width: 107px;
	    height: 107px;
	    bottom: -107px;
	    animation-delay: 13s;
	}
	.background li:nth-child(16) {
	    left: 7%;
	    width: 140px;
	    height: 140px;
	    bottom: -140px;
	    animation-delay: 11s;
	}
	.background li:nth-child(17) {
	    left: 15%;
	    width: 141px;
	    height: 141px;
	    bottom: -141px;
	    animation-delay: 41s;
	}
	.background li:nth-child(18) {
	    left: 25%;
	    width: 115px;
	    height: 115px;
	    bottom: -115px;
	    animation-delay: 27s;
	}
	.background li:nth-child(19) {
	    left: 89%;
	    width: 143px;
	    height: 143px;
	    bottom: -143px;
	    animation-delay: 35s;
	}
	.login-time-container {
		border-left: 2px solid white;
		height: 400px;
		margin-left: -80px;
		margin-bottom: -40px;
		color: white;
	}
	.login-time {
		font-family: courier;
		font-size: 65px;
		margin-bottom: 35px;
		margin-left: 25px;
		text-align: center;
		background-color: rgba(0, 0, 0, 0.22);
	}
	.login-description {
		margin-top: -10px;
		font-size: 15px;
		padding-left: 35px;
	}
	.login-description b {
		font-family: courier;
		font-size: 55px;
		text-align: center;
		color: gold;
	}
</style>
</html>