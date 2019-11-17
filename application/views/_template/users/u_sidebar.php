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
			<a class="link-s" href="<?=base_url()?>Dashboard"><span class="fas fa-tachometer-alt fa-fw"></span> Dashboard </a>
		</li>
		<li class="nav-item">
			<a class="link-s" href="<?=base_url()?>Applicants"><span class="fas fa-user-tie fa-fw"></span> Applicants </a>
		</li>
		<li class="nav-item">
			<a class="link-s" href="<?=base_url()?>Employee"><span class="fas fa-users fa-fw"></span> Employees </a>
		</li>
		<!-- FOR LEVEL 1 USER -->
		<li class="nav-item">
			<a class="link-s" href="<?=base_url()?>Admin_List"><span class="fas fa-user-secret fa-fw"></span> Admins </a>
		</li>
		<!-- END COMMENT -->
		<!-- <li>
			<a class="link-s" href="#siteSettings" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-cogs fa-fw"></i> Preferences </a>
			<ul class="collapse list-unstyled collapseSettings animated fadeIn" id="siteSettings">
				<li>
					<a class="link-s" class="sublink" href="#"><i class="fas fa-dot-circle fa-fw"></i> Sample Text </a>
				</li>
				<li>
					<a class="link-s" class="sublink" href="#"><i class="fas fa-dot-circle fa-fw"></i> Sample Text </a>
				</li>
				<li>
					<a class="link-s" class="sublink" href="#"><i class="fas fa-dot-circle fa-fw"></i> Sample Text </a>
				</li>
			</ul>
		</li> -->
		<li>
			<a class="link-s" href="#pageSettings" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-cog fa-fw"></i> User Settings </a>
			<ul class="collapse list-unstyled collapseSettings animated fadeIn" id="pageSettings">
				<!-- <li>
					<a class="link-s" class="sublink" href="#"><span class="fas fa-sign-out-alt fa-fw"></span> Profile </a>
				</li> -->
				<li>
					<a class="link-s" class="sublink" href="<?=base_url()?>"><span class="fas fa-sign-out-alt fa-fw"></span> Logout </a>
				</li>
			</ul>
		</li>
	</ul>
</nav>