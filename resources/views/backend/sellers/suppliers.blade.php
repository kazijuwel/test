@extends('backend.layouts.app')

@section('content')

<div class="aiz-titlebar text-left mt-2 mb-3">
	<div class="row align-items-center">
		<div class="col-md-6">
			<h1 class="h3">{{translate('All Suppliers')}}</h1>
		</div>
		<div class="col-md-6 text-md-right">
			<a href="{{ route('supplier.create') }}" class="btn btn-circle btn-info">
				<span>{{translate('Add New Supplier')}}</span>
			</a>
		</div>
	</div>
</div>

<div class="card">

    <div class="card-body">
      <div class="table-responsive">
        <table class="table aiz-table mb-0">
          <thead>
          <tr>
              <th>#</th>
              <th width="10%">{{translate('Options')}}</th>
              <th>{{translate('Supplier Name')}}</th>
              <th>{{translate('Supplier Phone')}}</th>
              <th>{{translate('Supplier Address')}}</th>
              <th>{{translate('Due')}}</th>

          </tr>
          </thead>
          <tbody>
          @foreach($suppliers as $key => $supplier)
          <tr>
            <td>{{ ($key+1) + ($suppliers->currentPage() - 1)*$suppliers->perPage() }}</td>
            <td>
              <div class="aiz-topbar-item ml-2">
                  <div class="align-items-stretch d-flex dropdown">
                      <a class="dropdown-toggle no-arrow text-dark" data-toggle="dropdown" href="javascript:void(0);" role="button" aria-haspopup="false" aria-expanded="false">
                          <span class="d-flex align-items-center">
                              <span>
                                <button type="button" class="btn btn-xs btn-dark">{{translate('Actions')}}</button>
                              </span>
                          </span>
                      </a>
                      <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated dropdown-menu-xs">
                          {{-- <a href="{{ route('supplierPayment',$supplier) }}"  class="dropdown-item">
                              {{translate('Supplier Payments')}}
                            </a> --}}

                          {{-- <a href="#" onclick="show_seller_payment_modal('{{$supplier->id}}');" class="dropdown-item">
                            {{translate('Go to Payment')}}
                          </a>
                          <a href="{{route('sellers.payment_history', encrypt($supplier->id))}}" class="dropdown-item">
                            {{translate('Payment History')}}
                          </a> --}}
                          <a href="{{ route('supplierProductStock',$supplier) }}"  class="dropdown-item">
                            {{translate('Supplier Product Stock')}}
                          </a>
                          <a href="{{route('supplier.supplierPayment', $supplier->id)}}" class="dropdown-item">
                            {{translate('Supplier Payments')}}
                          </a>
                          <a href="{{route('supplier.supplierInvoice', $supplier)}}" class="dropdown-item">
                            {{translate('Purchase Invoice')}}
                          </a>
                          <a href="{{route('supplier.edit', encrypt($supplier->id))}}" class="dropdown-item">
                            {{translate('Edit')}}
                          </a>
                          <a href="{{route('supplier.destroy', encrypt($supplier->id))}}" class="dropdown-item">
                            {{translate('Delete')}}
                          </a>

                          {{-- <a href="#" class="dropdown-item confirm-delete" data-href="{{route('sellers.destroy', $supplier->id)}}" class="">
                            {{translate('Delete')}}
                          </a> --}}
                      </div>
                  </div>
              </div>
            </td>
            <td>{{$supplier->name}}</td>
            <td>{{$supplier->mobile}}</td>

            <td>{{$supplier->address}}</td>
            <td>{{$supplier->due()}}</td>


        </tr>
          @endforeach
          </tbody>
      </table>
      </div>

        <div class="aiz-pagination">
          {{ $suppliers->links() }}
        </div>
    </div>
</div>

@endsection

@section('modal')
	<!-- Delete Modal -->
	@include('modals.delete_modal')

	<!-- Seller Profile Modal -->
	<div class="modal fade" id="profile_modal">
		<div class="modal-dialog">
			<div class="modal-content" id="profile-modal-content">

			</div>
		</div>
	</div>

	<!-- Seller Payment Modal -->
	<div class="modal fade" id="payment_modal">
	    <div class="modal-dialog">
	        <div class="modal-content" id="payment-modal-content">

	        </div>
	    </div>
	</div>

	<!-- Ban Seller Modal -->
	<div class="modal fade" id="confirm-ban">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title h6">{{translate('Confirmation')}}</h5>
					<button type="button" class="close" data-dismiss="modal">
					</button>
				</div>
				<div class="modal-body">
						<p>{{translate('Do you really want to ban this seller?')}}</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-light" data-dismiss="modal">{{translate('Cancel')}}</button>
					<a class="btn btn-primary" id="confirmation">{{translate('Proceed!')}}</a>
				</div>
			</div>
		</div>
	</div>

	<!-- Unban Seller Modal -->
	<div class="modal fade" id="confirm-unban">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title h6">{{translate('Confirmation')}}</h5>
						<button type="button" class="close" data-dismiss="modal">
						</button>
					</div>
					<div class="modal-body">
							<p>{{translate('Do you really want to ban this seller?')}}</p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-light" data-dismiss="modal">{{translate('Cancel')}}</button>
						<a class="btn btn-primary" id="confirmationunban">{{translate('Proceed!')}}</a>
					</div>
				</div>
			</div>
		</div>
@endsection

@section('script')
    <script type="text/javascript">
        function show_seller_payment_modal(id){
            $.post('{{ route('sellers.payment_modal') }}',{_token:'{{ @csrf_token() }}', id:id}, function(data){
                $('#payment_modal #payment-modal-content').html(data);
                $('#payment_modal').modal('show', {backdrop: 'static'});
                $('.demo-select2-placeholder').select2();
            });
        }

        function show_seller_profile(id){
            $.post('{{ route('sellers.profile_modal') }}',{_token:'{{ @csrf_token() }}', id:id}, function(data){
                $('#profile_modal #profile-modal-content').html(data);
                $('#profile_modal').modal('show', {backdrop: 'static'});
            });
        }

        function update_approved(el){
            if(el.checked){
                var status = 1;
            }
            else{
                var status = 0;
            }
            $.post('{{ route('sellers.approved') }}', {_token:'{{ csrf_token() }}', id:el.value, status:status}, function(data){
                if(data == 1){
                    AIZ.plugins.notify('success', '{{ translate('Approved sellers updated successfully') }}');
                }
                else{
                    AIZ.plugins.notify('danger', '{{ translate('Something went wrong') }}');
                }
            });
        }

        function sort_sellers(el){
            $('#sort_sellers').submit();
        }

        function confirm_ban(url)
        {
            $('#confirm-ban').modal('show', {backdrop: 'static'});
            document.getElementById('confirmation').setAttribute('href' , url);
        }

        function confirm_unban(url)
        {
            $('#confirm-unban').modal('show', {backdrop: 'static'});
            document.getElementById('confirmationunban').setAttribute('href' , url);
        }

    </script>
@endsection
