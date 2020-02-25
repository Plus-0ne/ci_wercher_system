<div class="row wercher-navbar sticky-top">
	<div class="col-sm-12">
		<style type="text/css">
			.notif-link { text-decoration: none; width: 100%; color: #2262A9; }
			.notif-link:hover { text-decoration: none; }
			.dropdown-menu { width: 300px; }
			.notif-li { padding-left: 21px; padding-right: 21px ; padding-top: 11px ;padding-bottom: 11px ; font-size: 12px;}
		</style>
		<nav class="navbar navbar-expand-lg">
			<button type="button" id="sidebarCollapse" class="btn text-light"><i class="fas fa-bars" style="margin-right: -1px;"></i></button>
			<div class="wercher-breadcrumb text-light ml-3">
				<!-- BREADCRUMB -->
				<?php if (!isset($Breadcrumb) || $Breadcrumb == NULL): ?>
					<?php echo 'Breadcrumb goes here'; ?>
				<?php else: ?>
					<?php echo $Breadcrumb; ?>
				<?php endif ?>
			</div>
			<div class="dropdown ml-auto">
				<div class="row">
					<?php echo form_open_multipart(base_url().'Search','method="get"'); ?>
					<input class="wercher-search" type="text" name="query" placeholder="Search All">
					<button type="submit" class="btn text-light mr-5"><i class="fas fa-search" style="margin-right: -1px;"></i> </button>
					<?php echo form_close(); ?>
					<a class="btn text-light ddToggle" data-toggle="dropdown"><i class="fas fa-bell" style="margin-right: -1px;"></i></a>
					<ul class="dropdown-menu dropdown-menu-right">
						<?php foreach ($this->Model_Selects->GetLogbookWithLimit(5)->result_array() as $row): ?>
							<li class="notif-li 
										<?php 
											if ($row['Type'] == 'New' || $row['Type'] == 'Employment') 
											{ 
												echo 'logbook-success-lite'; 
											}
											elseif ($row['Type'] == 'Archival') 
											{
												echo 'logbook-danger-lite';
											} 
											elseif ($row['Type'] == 'Update')
											{
												echo 'logbook-info-lite';
											}
											elseif ($row['Type'] == 'Reminder' || $row['Type'] == 'Note') 
											{
												echo 'logbook-warning-lite';
											}
										?>">
								<a class="notif-link" href="<?php echo base_url() . 'Dashboard#Logbook' ?>">
									<i class="
									<?php 
										if ($row['Type'] == 'New' || $row['Type'] == 'Employment') 
										{ 
											echo 'fas fa-check-square'; 
										}
										elseif ($row['Type'] == 'Archival') 
										{
											echo 'fas fa-calendar-times';
										} 
										elseif ($row['Type'] == 'Update')
										{
											echo 'fas fa-user-edit';
										}
										elseif ($row['Type'] == 'Reminder' || $row['Type'] == 'Note') 
										{
											echo 'fas fa-exclamation-triangle';
										}
									?>"></i> <?php echo $row['Event']; ?>
								</a>
							</li>
						<?php endforeach ?>
						<li class="notif-li text-center">
							<a class="notif-link" href="<?php echo base_url() . 'Dashboard#Logbook' ?>">
								<i class="fas fa-list"></i> View All
							</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>
	</div>
</div>