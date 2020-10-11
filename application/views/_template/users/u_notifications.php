<div class="row wercher-navbar sticky-top">
	<div class="col-sm-12">
		<style type="text/css">
			.notif-link { text-decoration: none; width: 100%; }
			.notif-link:hover { text-decoration: none; }
			.dropdown-menu { width: 300px; }
			.notif-li { padding-left: 21px; padding-right: 21px ; padding-top: 11px ;padding-bottom: 11px ; font-size: 12px;}
		</style>
		<nav class="navbar navbar-expand-lg">
			<button type="button" id="sidebarCollapse" class="btn text-light notif-button"><i class="fas fa-bars" style="margin-right: -1px;"></i></button>
			<div class="d-none d-sm-block wercher-breadcrumb text-light ml-3">
				<!-- BREADCRUMB -->
				<?php if (!isset($Breadcrumb) || $Breadcrumb == NULL): ?>
					<?php echo 'Breadcrumb goes here'; ?>
				<?php else: ?>
					<?php echo $Breadcrumb; ?>
				<?php endif ?>
			</div>
			<?php if(!empty($this->session->flashdata('prompts')) && !empty($this->session->flashdata('prompts-color')) && !empty($this->session->flashdata('prompts-icon'))): ?>
			<div class="prompts-tray ml-auto mr-auto p-3 <?=$this->session->flashdata('prompts-color');?>">
				<span class="prompts-tray-message ml-2">
					<?php if ($this->session->flashdata('prompts-icon') != 'none'): ?><i class="<?=$this->session->flashdata('prompts-icon');?>"></i><?php endif; ?> <b><?php echo $this->session->flashdata('prompts'); ?></b>
				</span>
			</div>
			<?php endif; ?>
			<div class="dropdown ml-auto">
				<div class="row">
					<?php echo form_open_multipart(base_url().'Search','method="get"'); ?>
					<input class="wercher-search" type="text" name="query" placeholder="Search All" <?php if(isset($_GET['query'])) { echo 'value=' . $_GET['query']; } ?>>
					<button type="submit" class="btn text-light mr-5 notif-button"><i class="fas fa-search" style="margin-right: -1px;"></i> </button>
					<?php echo form_close(); ?>
					<a id="Bell" class="btn text-light ddToggle notif-button" data-toggle="dropdown"><i class="fas fa-bell" style="margin-right: -1px;"></i> <span id="BellNotifCounter"></span> </a>
					<ul class="dropdown-menu dropdown-menu-right">
						<?php foreach ($this->Model_Selects->GetLogbookWithLimit(5)->result_array() as $row): ?>
							<li class="notif-li">
								<div class="row">
									<div class="col-sm-1">
										<?php
											$icon = $row['Icon'];
											if ($icon == 'Applicant'):
										?>
											<i class="fas fa-user-tie" style="margin-right: -1px;"></i>
										<?php elseif ($icon == 'Employee'): ?>
											<i class="fas fa-users" style="margin-right: -1px;"></i>
										<?php elseif ($icon == 'Admin'): ?>
											<i class="fas fa-user-secret" style="margin-right: -1px;"></i>
										<?php elseif ($icon == 'Client'): ?>
											<i class="fas fa-user-tag" style="margin-right: -1px;"></i>
										<?php elseif ($icon == 'Note'): ?>
											<i class="fas fa-sticky-note" style="margin-right: -1px;"></i>
										<?php elseif ($icon == 'Salary'): ?>
											<i class="fas fa-dollar-sign" style="margin-right: -1px;"></i>
										<?php else: ?>
											<i class="fas fa-cog" style="margin-right: -1px;"></i>
										<?php endif; ?>
									</div>
									<div class="col-sm-10">
										<div class="row">
											<div class="col-sm-12">
												<?php echo '<a href="?admin=' . $row['AdminID'] . '" class="logbook-tooltip-highlight">' . $row['AdminID'] . '</a> ' . $row['Event']; ?>
											</div>
											<div class="col-sm-12">
												<i style="color: gray;">
													<?php 
														$date = new DateTime($row['Time']);
														$day = $date->format('Y-m-d');
														$day = DateTime::createFromFormat('Y-m-d', $day)->format('F d, Y');
														$hours = $date->format('h:i:s A');

														echo $day . ' at ' . $hours;
													?>
												</i>
											</div>
										</div>
									</div>
								</div>
							</li>
						<?php endforeach ?>
						<li class="notif-li text-center">
							<a class="notif-link" href="<?php echo base_url() . 'Logbook' ?>">
								<i class="fas fa-list"></i> View All
							</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>
	</div>
</div>