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
					<?php foreach ($this->Model_Selects->GetLogbookWithLimit(5)->result_array() as $row): ?>
						<li class="notif-li 
									<?php 
										if ($row['Type'] == 'New' || $row['Type'] == 'Employment') 
										{ 
											echo 'logbook-success-lite'; 
										}
										elseif ($row['Type'] == 'Deletion') 
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
									elseif ($row['Type'] == 'Deletion') 
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
		</nav>
	</div>
</div>