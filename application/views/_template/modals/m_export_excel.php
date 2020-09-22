<!-- Modal -->
<div class="modal fade" id="DateFroto_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <?php echo form_open(base_url().'PhpOffice_Controller/ExportFrom_To','method="post"');?>
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Select Dates:</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col">
            <input id="idforFormatex" type="text" class="form-control" name="id" readonly="" hidden="">
            <div class="form-row">
              <div class="form-group col-12">
                <label><b>Client</b></label>
                <input id="DesignatedClientName" type="text" class="form-control" readonly="">
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-12">
                <label><b>Mode</b></label>
                <select class="form-control" name="Mode">
                  <option value="0">
                    Weekly
                  </option>
                  <option value="1">
                    Semi-Monthly
                  </option>
                  <option value="2">
                    Monthly
                  </option>
                </select>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-6">
            <label><strong>From</strong></label>
            <input id="ExportFromDate" type="date" class="form-control" name="f_date">
          </div>
          <div class="col-sm-6">
            <label><strong>To</strong></label>
            <input id="ExportToDate" type="date" class="form-control" name="t_date">
          </div>
        </div>
        <div class="row pt-5">
          <div class="form-group col-sm-12 col-md-10">
            <label><b>File Name</b></label>
            <input id="ExportFileName" class="form-control" type="text" name="ExportFileName" value="">
          </div>
          <div class="form-group col-sm-12 col-md-2" style="margin-left: -33px; padding-right: 10px;">
            <label>&nbsp;</label>
            <input class="form-control" type="text" value=".xlsx" readonly>
          </div>
        </div>
        <div class="modal-footer">
          <div class="form-group col-sm-12 col-md-12">
            <button type="submit" class="btn btn-success w-100"><i class="fas fa-file-excel"></i> Download</button>
          </div>
        </div>
      </div>
      <?php echo form_close();?>
    </div>
  </div>
</div>