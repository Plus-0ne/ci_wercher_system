<div class="modal <?php if (!isset($_GET['Year'])) {echo 'fade';} ?>" id="GraphChartModal">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">

		<!-- Modal Header -->
		<div class="modal-header">
			<form method="GET">
				<h4 class="modal-title"><i class="fas fa-calendar-week fa-fw"></i> Year <input type="number" id="GraphYear" name="Year" class="form-group px-2" value="<?php if (isset($_GET['Year'])) { echo $SelectedYear; } else { echo $CurrentYear; } ?>" style="border-radius: 6px; width: 100px;"></h4>
			</form>
			<div class="text-right">
				<button type="button" class="close d-none d-sm-block" data-dismiss="modal">&times;</button>
			</div>
		</div>

		<!-- Modal body -->
		<div class="modal-body">
			<div class="row rcontent w-85 ml-auto mr-auto mt-2">
				<canvas id="GraphChartModal_Chart" class="w-100" width="800" height="250"></canvas>
			</div>
		</div>

		<!-- Modal footer -->
		<div class="modal-footer">
			<button type="button" class="btn btn-danger ml-auto" data-dismiss="modal">Close</button>
		</div>

		</div>
	</div>
</div>