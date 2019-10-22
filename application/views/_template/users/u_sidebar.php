<nav id="sidebar" style="position: fixed;">
	<div class="sidebar-header text-center">
		<div class="" style="width: 100px;">
			<h1>
				SAMPLE TEXT
			</h1>
		</div>
	</div>
	<ul class="list-unstyled components">
		<div class="text-center pt-4 pb-3">
			<h6>
				<!-- BLANK SPACE -->
			</h6>
		</div>
		<li class="nav-item">
			<a class="link-s" href="<?=base_url()?>Dashboard"><i class="fas fa-tachometer-alt"></i> Dashboard </a>
		</li>
		<li class="nav-item">
			<a class="link-s" href="<?=base_url()?>Applicants"><i class="fas fa-user-tie"></i> Applicants </a>
		</li>
		<li class="nav-item">
			<a class="link-s" href="<?=base_url()?>Employee"><i class="fas fa-users"></i> Employees </a>
		</li>
		<li>
			<a class="link-s" href="#pageSettings" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-cog"></i> Settings </a>
			<ul class="collapse list-unstyled collapseSettings animated fadeIn" id="pageSettings">
				<li>
					<a class="link-s" class="sublink" href="#"><i class="fas fa-sign-out-alt"></i> Logout </a>
				</li>
			</ul>
		</li>
	</ul>
</nav>