<?php

$GetAdmin = $this->Model_Selects->GetAdmin();
?>
<div class="modal fade" id="LogbookFilter" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<?php echo form_open(base_url().'Logbook','method="GET" name="LogbookFilterForm"');?>
			<div class="modal-header">
				<h5 class="modal-title">Filter by...</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div id="ClientModal" class="modal-body">
				<div class="form-row">
					<div class="form-group col-9">
						<label>Admin</label>
						<select id="FilterAdmin" class="form-control" name="admin">
							<option selected="" value="">
								No filter (all admin)
							</option>
							<?php foreach ($GetAdmin->result_array() as $row): ?>
								<option value="<?=$row['AdminID'];?>">
									<?=$row['AdminID'];?>
								</option>
							<?php endforeach ?>
						</select>
					</div>
					<div id="FilterAdminPosts" class="form-group col-3">
						<label>No. of Posts</label>
						<input class="form-control" type="text" readonly>
					</div>
					<div class="form-group col-9">
						<label>Type</label>
						<select id="FilterType" class="form-control" name="type">
							<option selected="" value="">
								No filter (all type)
							</option>
							<option value="Applicant">
								Applicant
							</option>
							<option value="Employee">
								Employee
							</option>
							<option value="Admin">
								Admin
							</option>
							<option value="Client">
								Client
							</option>
							<option value="Salary">
								Salary
							</option>
							<option value="Note">
								Note
							</option>
							<option value="Unknown">
								Unknown
							</option>
						</select>
					</div>
					<div id="FilterTypePosts" class="form-group col-3">
						<label>&nbsp;</label>
						<input class="form-control" type="text" readonly>
					</div>
					<div class="form-group col-9">
						<label>Event</label>
						<input class="form-control" type="text" name="event">
					</div>
					<div id="FilterEventPosts" class="form-group col-3">
						<label>&nbsp;</label>
						<input class="form-control" type="text" readonly>
					</div>
					<div class="form-row col-9">
						<div class="form-group col-sm-12 col-md-6">
							<label>Date Range</label>
							<input id="FromDate" class="form-control" type="date" name="from">
						</div>
						<div class="form-group col-sm-12 col-md-6">
							<label>To</label>
							<input id="ToDate" class="form-control" type="date" name="to">
						</div>
					</div>
					<div id="TotalFilterPosts" style="margin-left: 10px;" class="form-group col-3">
						<label>&nbsp;</label>
						<input class="form-control" type="text" readonly>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<span style="margin-right: 4px;">Total Posts:</span> <input class="form-control w-25" type="text" id="FilterTypePosts" readonly>
				<button type="submit" class="btn btn-success"><i class="fas fa-filter"></i> Filter</button>
			</div>
			<?php echo form_close();?>
		</div>
	</div>
</div>