<nav id="sidebar" style="position: fixed;">
	<div class="sidebar-banner text-center">
		<?php if($this->session->userdata('is_logged_in') == 'Active'): ?>
		<img class="PrintOutModal PrintOutModalExpired PrintOutHistory" height="26" with="22" style="margin-top: -5px; margin-left: -5px;" src="<?=base_url()?>assets/img/wercher_logo.png">
		<?php endif; ?>
		<b>
			<span style="color: gold;">W</span>ercher <span style="color: gold;">C</span>oop
		</b>
	</div>
	<div class="sidebar-header text-center">
		<div class="text-center <?php if($this->session->userdata('is_logged_in') == 'Active') { echo 'mt-4'; } ?>" style="width: 100%;">
			<?php if($this->session->userdata('is_logged_in') == 'Active'): ?>
			<a href="Logbook?admin=<?php echo $this->session->userdata('AdminID'); ?>">
				<img class="m-auto PrintOutModal PrintOutModalExpired PrintOutHistory rounded-circle" height="112" width="112" src="<?php echo $this->session->userdata('AdminImage') ?>">
			</a>
			<?php else: ?>
			<a href="Dashboard">
				<img class="m-auto PrintOutModal PrintOutModalExpired PrintOutHistory" src="<?=base_url()?>assets/img/wercher_logo.png">
			</a>
			<?php endif; ?>
		</div>
	</div>
	<ul class="list-unstyled components">
		<div class="text-center pt-2 pb-3">
				<?php
				if ($this->session->userdata('is_logged_in') == 'Active') {
					echo '<small><a style="color: gold;" href="Logbook?admin=' . $this->session->userdata('AdminID') . '">' . $this->session->userdata('AdminID') . '</a></small>';
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
		<!-- TODO: -->
		<li class="nav-item mb-4">
			<a class="link-s" href="<?=base_url()?>Logbook"><span class="fas fa-book fa-fw"></span> Logbook </a>
		</li>
		<!-- <li class="nav-item mb-4">
			<a class="link-s" href="<?=base_url()?>Security"><span class="fas fa-lock fa-fw"></span> Security Audit </a>
		</li> -->
		<!-- <li class="nav-item mb-4">
			<a class="link-s" href="<?=base_url()?>Calendar"><span class="fas fa-calendar fa-fw"></span> Calendar </a>
		</li> -->
		<li class="nav-item">
			<a class="link-s" href="<?=base_url()?>Applicants"><span class="fas fa-user-tie fa-fw"></span> Applicants </a>
		</li>
		<li class="nav-item">
			<a class="link-s" href="<?=base_url()?>Employee"><span class="fas fa-users fa-fw"></span> Employees </a>
		</li>
		<!-- FOR LEVEL 1 USER -->
		<li class="nav-item">
			<a class="link-s" href="<?=base_url()?>Admins"><span class="fas fa-user-secret fa-fw"></span> Admins </a>
		</li>
		<!-- END COMMENT -->
		<li class="nav-item">
			<a class="link-s" href="<?=base_url()?>Clients"><span class="fas fa-user-tag fa-fw"></span> Clients </a>
		</li>
		<li class="nav-item mb-4">
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
			<a class="link-s" href="#pageSettings" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-bolt fa-fw"></i> Quick Links <i class="fas fa-caret-down fa-fw" style="float: right; margin-top: 4px;"></i> </a>
			<ul class="collapse list-unstyled collapseSettings animated fadeIn" id="pageSettings">
				<li>
					<a class="link-s" class="sublink" href="<?=base_url()?>SSS_Table"><i class="fas fa-table fa-fw"></i> SSS Table </a>
				</li>
			</ul>
		</li>
		<li>
			<a class="link-s" href="#siteInfo" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-info fa-fw"></i> Site Info <i class="fas fa-caret-down fa-fw" style="float: right; margin-top: 4px;"></i> </a>
			<ul class="collapse list-unstyled collapseSettings animated fadeIn" id="siteInfo">
				<li>
					<a class="link-s" class="sublink" href="#"><span style="color: gold;"><i class="fas fa-info-circle"></i> Build: November 22, 2020</span></a>
				</li>
			</ul>
		</li>
		<li class="nav-item mb-4">
			<a class="link-s" class="sublink" href="<?=base_url()?>"><span class="fas fa-sign-out-alt fa-fw"></span> Logout </a>
		</li>
	</ul>
</nav>