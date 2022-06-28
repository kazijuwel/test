@extends('backend.layouts.app')

@section('content')
<div class="aiz-titlebar text-left mt-2 mb-3" style="text-align: center !important;">
    <h5 class="mb-0 h6">{{translate('Add New Pop-Up')}}</h5>
</div>
<div class="col-md-10 mx-auto">
	<form class="form form-horizontal mar-top" action="{{route('popup.store')}}" method="POST" enctype="multipart/form-data" id="choice_form">
		@csrf
		<input type="hidden" name="added_by" value="admin">

		<div class="card">
			<div class="card-header">
				<h5 class="mb-0 h6">{{translate('PopUp Type')}}</h5>
			</div>
			<div class="card-body" style="">
				<div class="form-group row">
					
					<div class="col-md-12">
						<input type="radio" id="advertise" name="popup_type" value="1" checked>
						<label for="age1">Advertise</label><br>
						<input type="radio" id="query" name="popup_type" value="2">
						<label for="age2">Query</label><br>
					</div>
				</div>
			</div>
		</div>
		<div class="card">
			<div class="card-header">
				<h5 class="mb-0 h6">{{translate('Description of the PopUp')}}</h5>
			</div>
			<div class="card-body">
				<div class="form-group row">
					
					<div class="col-md-12">
						<textarea class="form-control"  rows="8" name="description" required></textarea>
					</div>
				</div>
			</div>
			<div class="card-body" style="padding: 0px 25px !important;">
				<div class="form-group row">
					<label class="col-md-3 col-from-label" style="padding-top:10px;">{{translate('Showing Time After (Second)')}}</label>
					<div class="col-md-8">
					<input type="text" class="form-control" name="showing_time" placeholder="{{ translate('write down the second as number (ex. 1)') }}" required>
					</div>
				</div>
			</div>
		</div>

		<div class="card">
			<div class="card-header">
				<h5 class="mb-0 h6">{{translate('Image Upload')}}</h5>
			</div>
			<div class="card-body" >
				<div class="form-group row">
					<label class="col-md-3 col-form-label" >{{translate('Pop-Up Image')}}</label>
					<div class="col-md-8">
						<div class="input-group"  >
							<input type="file" name="image" class="form-control" required>
						</div>

					</div>
				</div>
			</div>
		</div>
		<div class="card">
			<div class="card-header">
				<h5 class="mb-0 h6">{{translate('LINK Provide')}}</h5>
			</div>
			<div class="card-body">
				<div class="form-group row">
					<label class="col-md-3 col-from-label">{{translate('POP UP LINK')}}</label>
					<div class="col-md-8">
						<input type="text" class="form-control" name="link" placeholder="{{ translate('Pop-Up Link') }}">
                        <small class="text-muted">{{translate("Use proper link without extra parameter. Don't use short share link/embeded iframe code.")}}</small>
					</div>
				</div>
			</div>
		</div>

		<div class="mb-3 text-right">
			<button type="submit" name="button" class="btn btn-primary">{{ translate('SAVE POP-UP') }}</button>
		</div>
	</form>
</div>



@endsection

@section('script')



@endsection
