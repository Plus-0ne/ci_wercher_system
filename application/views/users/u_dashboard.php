<?php $T_Header;?>
<body>
	<div class="wrapper">
		<?php $this->load->view('_template/users/u_sidebar'); ?>
		<div id="content" class="ncontent">
			<div class="container-fluid">
				<div class="row">
					<div class="col-sm-12">
						<style type="text/css">
							.notif-link { text-decoration: none; width: 100%; color: #2262A9; }
							.notif-link:hover { text-decoration: none; }
							.dropdown-menu { width: 300px; }
							.notif-li { padding-left: 21px; padding-right: 21px ; padding-top: 11px ;padding-bottom: 11px ; font-size: 12px;}
						</style>
						<nav class="navbar navbar-expand-lg">
							<button type="button" id="sidebarCollapse" class="btn btn-primary"><i class="fas fa-bars"></i></button>
							<div class="dropdown ml-auto">
								<a class="btn btn-light ddToggle" data-toggle="dropdown"><i class="fas fa-bell"></i></a>
								<ul class="dropdown-menu dropdown-menu-right">
									<li class="notif-li">
										<a class="notif-link" href="#">
											<i class="fas fa-edit"></i> 00001-A has been updated 1 min ago
										</a>
									</li>
									<li class="notif-li">
										<a class="notif-link" href="#">
											<i class="fas fa-edit"></i> 00002-A has been updated 1 min ago
										</a>
									</li>
									<li class="notif-li text-center">
										<a class="notif-link" href="#">
											<i class="fas fa-list"></i> View All
										</a>
									</li>
								</ul>
							</div>
						</nav>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12 pt-3 pb-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb" style="background-color: transparent;">
								<li class="breadcrumb-item"><a href="">Home</a></li>
								<li class="breadcrumb-item active" aria-current="page">Dashboard</li>
							</ol>
						</nav>
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
	});
</script>
</html>