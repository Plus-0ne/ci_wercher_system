<div class="modal fade" id="ModalSetWeek" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<?php echo form_open(base_url().'SetPrimaryWeek','method="POST"');?>
			<div class="load-container modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle"><i class="fas fa-cog"></i> Payroll Config</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="load-container modal-body">
				<input id="SetPrimaryClientID" name="PrimaryClientID" type="hidden">
				<!-- <div class="form-row mx-1">
					<div class="form-group col-sm-8 mt-2">
						<label><b>Client Starting Week</b></label>
						<input id="Week" class="form-control" type="date" name="Week">
					</div>
				</div> -->
				<div class="form-row mx-1">
					<div class="form-group col-sm-4">
						<label><b>HDMF Days</b></label>
						<input id="PayrollHDMFDayStart" class="form-control" type="number" name="PayrollHDMFDayStart">
					</div>
					<div class="form-group col-sm-2">
						<label>&nbsp;</label>
						<input class="form-control" type="text" value="to" readonly>
					</div>
					<div class="form-group col-sm-4">
						<label>&nbsp;</label>
						<input id="PayrollHDMFDayEnds" class="form-control" type="number" name="PayrollHDMFDayEnds">
					</div>
				</div>
				<div class="form-row mx-1 mt-2">
					<div class="form-group col-sm-4">
						<label><b>SSS Days</b></label>
						<input id="PayrollSSSDayStart" class="form-control" type="number" name="PayrollSSSDayStart">
					</div>
					<div class="form-group col-sm-2">
						<label>&nbsp;</label>
						<input class="form-control" type="text" value="to" readonly>
					</div>
					<div class="form-group col-sm-4">
						<label>&nbsp;</label>
						<input id="PayrollSSSDayEnds" class="form-control" type="number" name="PayrollSSSDayEnds">
					</div>
				</div>
			</div>
			<div class="load-container modal-footer">
				<button id="LoadButton" type="submit" class="btn btn-success"><i class="fas fa-check"></i> Save</button>
			</div>
			<?php echo form_close();?>
		</div>
	</div>
</div>