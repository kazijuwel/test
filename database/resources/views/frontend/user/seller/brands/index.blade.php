@extends('frontend.layouts.app')

@section('content')
	<section class="py-5">
		<div class="container">
			<div class="d-flex align-items-start">
@include('frontend.inc.user_side_nav')

<div class="aiz-user-panel">


<div class="row" style="margin-left: -3px;">
	<div class="col-md-12">
		<div class="card" style="margin-bottom:0px;">
			<div class="card-header row gutters-5">
		<div class="aiz-titlebar text-left mt-2 mb-3">
			<div class="align-items-center">
				<h1 class="h3">{{translate('All Brands')}}</h1>
			</div>
		</div>
		</div>
		</div>

	</div>
	<div class="col-md-7" style="padding-right: 2px;">
		<div class="card">
		    <div class="card-header row gutters-5">
				<div class="col text-center text-md-left">
					<h5 class="mb-md-0 h6">{{ translate('Brands') }}</h5>
				</div>
				
				<div class="col-md-4">
					<form class="" method="post" id="filter" action="{{route('seller_upload_brand')}}">
				@csrf
				<select class="form-control form-control-sm aiz-selectpicker mb-2 mb-md-0" id="" name="brand_type" 
				onchange="document.getElementById('filter').submit();">
							<option value="">Choose</option>

							<option value="all_brand">All Brands</option>
		            
		                    <option value="{{auth()->user()->id}}">My Brands</option>
		               
				</select>
				</form>
			</div>
			
				<div class="col-md-4">
					<form class="" id="sort_brands" action="" method="GET">
						<div class="input-group input-group-sm">
					  		<input type="text" class="form-control" id="search" name="search"@isset($sort_search) value="{{ $sort_search }}" @endisset placeholder="{{ translate('Type name & Enter') }}">
						</div>
					</form>
				</div>
		    </div>
		    <div class="card-body">
		        <table class="table aiz-table mb-0">
		            <thead>
		                <tr>
		                    <th>#</th>
		                    <th>{{translate('Name')}}</th>
		                    <th>{{translate('Logo')}}</th>
		                    <th class="text-right">{{translate('Options')}}</th>
		                </tr>
		            </thead>
		            <tbody>
		                @foreach($brands as $key => $brand)
		                    <tr>
		                        <td>{{ ($key+1) + ($brands->currentPage() - 1)*$brands->perPage() }}</td>
		                        <td>{{ $brand->getTranslation('name') }}</td>
														<td>
		                            <img src="{{ uploaded_asset($brand->logo) }}" alt="{{translate('Brand')}}" class="h-50px">
		                        </td>

		                        @if(auth()->user()->id == $brand->added_by)
		                        <td class="text-right">
		                            <a class="btn btn-soft-primary btn-icon btn-circle btn-sm" href="{{route('seller_edit_brand', ['id'=>$brand->id, 'lang'=>env('DEFAULT_LANGUAGE')] )}}" title="{{ translate('Edit') }}">
		                                <i class="las la-edit"></i>
		                            </a>
		                            <a href="#" class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete" data-href="{{route('brand_delete', $brand->id)}}" title="{{ translate('Delete') }}">
		                                <i class="las la-trash"></i>
		                            </a>
		                        </td>
		                        @endif
		                    </tr>
		                @endforeach
		            </tbody>
		        </table>
		        <div class="aiz-pagination">
                	{{ $brands->appends(request()->input())->links() }}
            	</div>
		    </div>
		</div>
	</div>
	<div class="col-md-5" style="padding-left: 2px;">
		<div class="card">
			<div class="card-header">
				<h5 class="mb-0 h6">{{ translate('Add New Brand') }}</h5>
			</div>
			<div class="card-body">
				<form action="{{ route('brand_store') }}" method="POST">
					@csrf
					<div class="form-group mb-3">
						<label for="name">{{translate('Name')}}</label>
						<input type="text" placeholder="{{translate('Name')}}" name="name" class="form-control" required>
						<input type="hidden" name="added_by" value="{{ auth()->user()->id }}" >
					</div>
					<div class="form-group mb-3">
						<label for="name">{{translate('Logo')}} <small>({{ translate('120x80') }})</small></label>
						<div class="input-group" data-toggle="aizuploader" data-type="image">
							<div class="input-group-prepend">
									<div class="input-group-text bg-soft-secondary font-weight-medium">{{ translate('Browse')}}</div>
							</div>
							<div class="form-control file-amount">{{ translate('Choose File') }}</div>
							<input type="hidden" name="logo" class="selected-files">
						</div>
						<div class="file-preview box sm">
						</div>
					</div>
					<div class="form-group mb-3">
						<label for="name">{{translate('Meta Title')}}</label>
						<input type="text" class="form-control" name="meta_title" placeholder="{{translate('Meta Title')}}">
					</div>
					<div class="form-group mb-3">
						<label for="name">{{translate('Meta Description')}}</label>
						<textarea name="meta_description" rows="5" class="form-control"></textarea>
					</div>
					<div class="form-group mb-3 text-right">
						<button type="submit" class="btn btn-primary">{{translate('Save')}}</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

			</div>
			</div>
		</section>

@endsection

@section('modal')
    @include('modals.delete_modal')
@endsection

@section('script')
<script type="text/javascript">
    function sort_brands(el){
        $('#sort_brands').submit();
    }
</script>
@endsection
