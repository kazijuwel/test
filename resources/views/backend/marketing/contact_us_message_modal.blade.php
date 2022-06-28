<div class="modal-header">
  <h5 class="modal-title h6">{{translate('Comments')}}</h5>
  <button type="button" class="close" data-dismiss="modal">
  </button>
</div>
<div class="modal-body">
    <div class="from-group row">
        <div class="col-lg-1">
           <!--  <label>{{translate('Comments')}}</label> -->
        </div>
        <div class="col-lg-10" style="display: flex; justify-content: center;">
           {{ $contact_us_applications->comments }}
        </div>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-light" data-dismiss="modal">{{translate('Cancel')}}</button>
</div>
