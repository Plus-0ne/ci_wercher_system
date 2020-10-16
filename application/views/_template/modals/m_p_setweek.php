<div class="modal fade" id="ModalSetWeek" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<?php echo form_open(base_url().'SetPrimaryWeek','method="POST"');?>
			<div class="load-container modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">Set Week</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="load-container modal-body">
				<div class="form-row mx-1">
					<div class="form-group col-sm-8 ml-auto mr-auto mt-2">
						<input id="SetPrimaryClientID" name="PrimaryClientID" type="hidden">
						<input id="Week" class="form-control" type="date" name="Week">
					</div>
				</div>
			</div>
			<div class="load-container modal-footer">
				<button id="LoadButton" type="submit" class="btn btn-success"><i class="fas fa-check"></i> Set</button>
			</div>
			<?php echo form_close();?>
		</div>
	</div>
</div>