<nav id="sidebar" style="position: fixed;">
	<div class="sidebar-banner text-center">
		<b>
			<span style="color: gold;">W</span>ercher <span style="color: gold;">C</span>oop
		</b>
	</div>
	<div class="sidebar-header text-center">
		<div class="text-center" style="width: 100%;">
			<img class="m-auto PrintOutModal PrintOutModalExpired PrintOutHistory" src="<?=base_url()?>assets/img/wercher_logo.png">
		</div>
	</div>
	<ul class="list-unstyled components">
		<div class="text-center pt-2 pb-3">
				<?php
				if (isset($_SESSION['is_logged_in'])) {
					echo '<small>'.strtoupper($_SESSION['FirstName']).' '.strtoupper($_SESSION['MiddleInitial']).' '.strtoupper($_SESSION['LastName']).'</small>';
					echo '<h6>'.strtoupper($_SESSION['Position']).'</h6>';
				}
				else
				{
					echo "GUEST";
				}
				?>
			
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
		<li class="nav-item">
			<a class="link-s" href="<?=base_url()?>Clients"><span class="fas fa-user-tag fa-fw"></span> Clients </a>
		</li>
		<li class="nav-item">
			<a class="link-s" href="<?=base_url()?>Payroll"><span class="fas fa-dollar-sign fa-fw"></span> Salary </a>
		</li>
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
			<a class="link-s" href="#pageSettings" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-cog fa-fw"></i> User Settings <i class="fas fa-caret-down fa-fw" style="margin-left: 65px;"></i> </a>
			<ul class="collapse list-unstyled collapseSettings animated fadeIn" id="pageSettings">
				<li>
					<a class="link-s" class="sublink" href="<?=base_url()?>Experimental"><span class="fas fa-flask"></span> Experimental <span style="color: rgba(255, 50, 50, 1.0);">(Dev Area)</span></a>
				</li>
				<li>
					<a class="link-s" class="sublink" href="<?=base_url()?>SSS_Table"><i class="fas fa-table fa-fw"></i> SSS Table </a>
				</li>
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