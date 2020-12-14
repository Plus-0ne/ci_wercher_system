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
		403 - Forbidden | Wercher Solutions and Resources Workers Cooperative
	</title>
	<link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap.min.css">
	<link rel="icon" href="<?=base_url()?>/favicon.ico" type="image/gif">
</head>
<body>
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
				<div class="fourohfour-container col-sm-12 col-md-12 col-lg-12 m-auto">
					<div class="text-center">
						<div class="fourohfour-header col-sm-12">
							<img class="m-auto PrintOutModal PrintOutModalExpired PrintOutHistory" src="<?=base_url()?>assets/img/wercher_logo.png">
						</div>
					</div>
					<div class="fourohfour-text pl-4 pb-4 pr-4 text-center">
						<span>Error 403 -- Forbidden</span>
						<br>
						Access denied.
						<br>
						Unsufficient permission has been met.
						<!-- <a href="<?=base_url();?>">Go back.</a> -->
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="footer">

	</div>
</body>

<noscript>JavaScript disabled. Enable JavaScript</noscript>
<style type="text/css">
	a {
	color: rgba(155, 75, 25);
	}
	a:hover {
		color: rgba(205, 125, 75);
		text-decoration: underline;
	}
	.fourohfour-header img {
		margin-right: 25px;
	}
	.fourohfour-text span {
		font-family: courier;
		font-style: italic;
		font-size: 28px;
		color: white;
	}
	.fourohfour-text {
		color: white;
		font-size: 40px;
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