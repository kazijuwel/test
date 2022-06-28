@extends('backend.layouts.app')

@section('content')
<div class="aiz-titlebar text-left">
	<div class="row align-items-center">
		<div class="col-md-12 bg-grad-2 p-2 text-center text-white">
			<h1 class="h3">{{translate('Income Statement')}}</h1>
		</div>
	</div>
</div>
<div class="row align-items-center">
	<div class="col-sm-12 col-md-4">
		<div class="card mt-2 bg-grad-2 text-white ">
			<div class="card-body">
				<div class="card-text text-center p-3 mt-3">
					<h3 >Total Income </h3>
				@php
				$disount=$grandAmount->sum('unit_price') -          $grandAmount->sum('price');
				@endphp
					<h3 class="p-2">{{ $grandAmount->sum('price')+$grandAmount->sum('commision')+$grandAmount->sum('delivry_methods_charge')+ $grandAmount->sum('tax')}}
					</h3>
					
				</div>
				
			</div>
			<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
				<path fill="rgba(255,255,255,0.3)" fill-opacity="1" d="M0,128L34.3,112C68.6,96,137,64,206,96C274.3,128,343,224,411,250.7C480,277,549,235,617,213.3C685.7,192,754,192,823,181.3C891.4,171,960,149,1029,117.3C1097.1,85,1166,43,1234,58.7C1302.9,75,1371,149,1406,186.7L1440,224L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z"></path>
			</svg>
		  </div>
	 </div>

	<div class="col-sm-12 col-md-8">
		<div class="card mt-2 bg-grad-3 text-white">
			<div class="card-body">
				<div class="card-text text-center p-4">
					
					<div class="table-responsive">	
					<table class="table table-bordered text-white">
						<thead>
						  <tr>
							<th scope="col">Total Order Amount</th>
							<th scope="col">Purchase Price</th>
							<th scope="col">Discount</th>
							<th scope="col">Coupon</th>
							<th scope="col">Tax</th>
							<th scope="col">Delivery Cost</th>
							<th scope="col">Balance Amount</th>
							
						  </tr>
						</thead>
						<tbody>
							@php
							
						// 	$coupon =0;

						// //   foreach ($grandAmount as $amount) {
						// // 	$coupon = $amount->order->id;
						// //       }
						// 	  dd("$coupon")
							@endphp
							{{-- @foreach ($grandAmount as $item) --}}
								{{-- {{ $grandAmount->order }} --}}
							{{-- @endforeach --}}
							
						  <tr>
							<td>Tk: {{ $grandAmount->sum('commision')}} </td>
							<td>Tk: {{ $grandAmount->sum('purchase_price')}}</td>
							<td>Tk: {{$grandAmount->sum('unit_price') -          $grandAmount->sum('price') }}</td>
							<td>Tk: {{$grandAmount->sum('coupon_amount')}}</td>
							<td>Tk: {{ $grandAmount->sum('tax')}}</td>
							<td>Tk: {{ $grandAmount->sum('shipping_cost')}}</td>
							<td>Tk: {{ $grandAmount->sum('price')- $grandAmount->sum('purchase_price')}}</td>
							
						  </tr>
						</tbody>
					  </table>


				</div>
				
			</div>
			</div>
		  </div>
	</div>

</div>
<div class="aiz-titlebar text-left">
	<div class="row align-items-center">
		<div class="col-md-12 bg-grad-4 p-2 text-center text-white">
			<h1 class="h3">{{translate('Today Income Statement')}}</h1>
		</div>
	</div>
</div>
<div class="row align-items-center">
	<div class="col-sm-12 col-md-4">
		<div class="card mt-2 bg-grad-4 text-white ">
			<div class="card-body">
				<div class="card-text text-center p-3 mt-3">
					<h3 >Total Income </h3>
				@php
				$disount=$todayAmount->sum('unit_price') -          $todayAmount->sum('price');
				@endphp
					<h3 class="p-2">{{ $todayAmount->sum('price')+$todayAmount->sum('commision')+$todayAmount->sum('delivry_methods_charge')+ $todayAmount->sum('tax')}}
					</h3>
					
				</div>
				
			</div>
			<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
				<path fill="rgba(255,255,255,0.3)" fill-opacity="1" d="M0,128L34.3,112C68.6,96,137,64,206,96C274.3,128,343,224,411,250.7C480,277,549,235,617,213.3C685.7,192,754,192,823,181.3C891.4,171,960,149,1029,117.3C1097.1,85,1166,43,1234,58.7C1302.9,75,1371,149,1406,186.7L1440,224L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z"></path>
			</svg>
		  </div>
	 </div>

	<div class="col-sm-12 col-md-8">
		<div class="card mt-2 bg-grad-4 text-white">
			<div class="card-body">
				<div class="card-text text-center p-4">
					
					<div class="table-responsive">	
					<table class="table table-bordered text-white">
						<thead>
						  <tr>
							<th scope="col">Total Order Amount</th>
							<th scope="col">Purchase Price</th>
							<th scope="col">Discount</th>
							<th scope="col">Coupon</th>
							<th scope="col">Tax</th>
							<th scope="col">Delivery Cost</th>
							<th scope="col">Balance Amount</th>
							
						  </tr>
						</thead>
						<tbody>
							@php
							
						// 	$coupon =0;

						// //   foreach ($grandAmount as $amount) {
						// // 	$coupon = $amount->order->id;
						// //       }
						// 	  dd("$coupon")
							@endphp
							{{-- @foreach ($grandAmount as $item) --}}
								{{-- {{ $grandAmount->order }} --}}
							{{-- @endforeach --}}
							
						  <tr>
							<td>Tk: {{ $todayAmount->sum('commision')}} </td>
							<td>Tk: {{ $todayAmount->sum('purchase_price')}}</td>
							<td>Tk: {{$todayAmount->sum('unit_price') -          $todayAmount->sum('price') }}</td>
							<td>Tk: {{$todayAmount->sum('coupon_amount')}}</td>
							<td>Tk: {{ $todayAmount->sum('tax')}}</td>
							<td>Tk: {{ $todayAmount->sum('shipping_cost')}}</td>
							<td>Tk: {{ $todayAmount->sum('price')- $todayAmount->sum('purchase_price')}}</td>
							
						  </tr>
						</tbody>
					  </table>


				</div>
				
			</div>
			</div>
		  </div>
	</div>

</div>
<!----Expense-->
<div class="aiz-titlebar text-left">
	<div class="row align-items-center">
		<div class="col-md-12 bg-grad-3 p-2 text-center text-white">
			<h1 class="h3">{{translate('Today Expense')}}</h1>
		</div>
	</div>
</div>
<div class="row align-items-center">
	<div class="col-sm-12 col-md-4">
		<div class="card mt-2 bg-grad-3 text-white ">
			<div class="card-body">
				<div class="card-text text-center  mt-3">
					<h3 >Total Expense </h3>
			
					<h3 class="p-2">{{ $expenses->sum('amount')}}
					</h3>
					
				</div>
				
			</div>
			<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
				<path fill="rgba(255,255,255,0.3)" fill-opacity="1" d="M0,128L34.3,112C68.6,96,137,64,206,96C274.3,128,343,224,411,250.7C480,277,549,235,617,213.3C685.7,192,754,192,823,181.3C891.4,171,960,149,1029,117.3C1097.1,85,1166,43,1234,58.7C1302.9,75,1371,149,1406,186.7L1440,224L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z"></path>
			</svg>
		  </div>
	 </div>

	<div class="col-sm-12 col-md-4">
		<div class="card mt-2 bg-grad-3 text-white">
			<div class="card-body">
				<div class="card-text text-center  mt-3">
					<h3 >Today Expense </h3>
			
					<h3 class="p-2">{{ $todayExpense->sum('amount')}}
					</h3>
					
				</div>
				
			</div>
			<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
				<path fill="rgba(255,255,255,0.3)" fill-opacity="1" d="M0,128L34.3,112C68.6,96,137,64,206,96C274.3,128,343,224,411,250.7C480,277,549,235,617,213.3C685.7,192,754,192,823,181.3C891.4,171,960,149,1029,117.3C1097.1,85,1166,43,1234,58.7C1302.9,75,1371,149,1406,186.7L1440,224L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z"></path>
			</svg>
			</div>
	</div>
	<div class="col-sm-12 col-md-4">
		<div class="card mt-2 bg-grad-3 text-white">
			<div class="card-body">
				<div class="card-text text-center  mt-3">
					<h3 >Today Income </h3>
			
					<h3 class="p-2">
						@php
							$Hellohhi=$todayAmount->sum('price')+$todayAmount->sum('commision')+$todayAmount->sum('delivry_methods_charge')+ $todayAmount->sum('tax')-$expenses->sum('amount');
						@endphp
						
						@if($Hellohhi > 0)
						Income:{{ $Hellohhi }}
						@else
						Loss:{{  abs($Hellohhi)}}
						@endif
						
					</h3>
					
				</div>
				
			</div>
			<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
				<path fill="rgba(255,255,255,0.3)" fill-opacity="1" d="M0,128L34.3,112C68.6,96,137,64,206,96C274.3,128,343,224,411,250.7C480,277,549,235,617,213.3C685.7,192,754,192,823,181.3C891.4,171,960,149,1029,117.3C1097.1,85,1166,43,1234,58.7C1302.9,75,1371,149,1406,186.7L1440,224L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z"></path>
			</svg>
			</div>
	</div>
	
	
		</div>
	</div>


</div>
{{-- <div class="row">
	<div class="col-sm-12 col-md-12">
		<div class="bg-success p-2 text-center">
			<h5>Seller Wise Amount</h5>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-sm-12 col-md-12">
		<div class="card">
			<form class="" action="" method="GET">
			  <div class="card-header row gutters-5">
				<div class="col text-center text-md-left">
				  <h5 class="mb-md-0 h6">{{ translate('All Orders') }}</h5>
				</div>
				<div class="col-lg-2">
				  <div class="form-group mb-0">
					<select class="form-control" name="seller_id">
						<option value=" ">All Seller</option>
						@foreach($sellerSelects as $key => $seller)
						<option value="{{$seller->id}}">{{ $seller->user->name }}</option>
						@endforeach
					  </select>
				  </div>
				</div>
				<div class="col-auto">
				  <div class="form-group mb-0">
					<button type="submit" class="btn btn-primary">{{ translate('Filter') }}</button>
				  </div>
				</div>
			  </div>
		  </form>
		  <div class="card-body">
			  <div class="table-responsive">
			  <table class="table aiz-table mb-0">
				  <thead>
					  <tr>
						  <th>#</th>
						  <th>{{ translate('Saller Name') }}</th>
						  <th>{{ translate('Email') }}</th>
						  <th data-breakpoints="md">{{ translate('Phone') }}</th>
						  <th data-breakpoints="md">{{ translate('No of product Delivery') }}</th>
						  <th data-breakpoints="md">{{ translate('Total Amount') }}</th>
						  <th data-breakpoints="md">{{ translate('Paid Amount') }}</th>
						  <th data-breakpoints="md">{{ translate('Panding Amount') }}</th>
						  <th data-breakpoints="md">{{ translate('Action') }}</th>
					  </tr>
				  </thead>
				  <tbody>
					  @foreach ($sellers as $key => $seller)
						  <tr>
							  <td>
								{{-- {{ ($key+1) + ($sellers->currentPage() - 1)*$sellers->perPage() }} --}}
							  {{-- </td>
							  <td>{{ $seller->user->name }}</td>
							  <td>{{ $seller->user->email }}</td>
							  <td>{{ $seller->user->phone }}</td>
							  <td class="text-center">
								  @php 
								$sellerproduct=\App\Models\OrderDetail::where('seller_id', $seller->id)->where('delivery_status','delivered')->get();
								$quantity=0;
								$price=0;
								foreach ($sellerproduct as $key => $sd) {
									$quantity=$quantity+$sd->quantity;
									$price=$price+$sd->price;
								}
								@endphp
								{{ $quantity }}
							  </td>
							  <td>
								{{ $price }}
							  </td>
							  <td>{{ $seller->admin_to_pay }}</td>
							  <td>{{  $price - $seller->admin_to_pay }}</td>
								
								<td>
									<a class="btn btn-soft-primary btn-icon btn-circle btn-sm" href="{{ route('sellerProductView',$seller->id) }}" title="{{ translate('View') }}">
										<i class="las la-eye"></i>
									</a>
								</td>
							  
						  </tr>
					  @endforeach
				  </tbody>
			  </table>
			</div>
			  {{-- <div class="aiz-pagination">
				  {{ $sellers->appends(request()->input())->links() }}
			  </div> --}}
		  </div>
	  </div> 
	</div>
{{-- </div> --}}

@endsection

@section('script')
{{-- <script>
$('.step2-select').select2({
	theme: 'bootstrap4',
	// minimumInputLength: 1,
	ajax: {
		data: function(params) {
			return {
				q: params.term, // search term
				page: params.page
			};
		},
		processResults: function(data, params) {
			params.page = params.page || 1;
			// alert(data[0].s);
			var data = $.map(data, function(obj) {
				obj.id = obj.id || obj.id;
				return obj;
			});
			var data = $.map(data, function(obj) {
				obj.text = obj.name;
				return obj;
			});
			return {
				results: data,
				pagination: {
					more: (params.page * 30) < data.total_count
				}
			};
		}
	},
});
</script> --}}
<script>
var $disabledResults = $(".js-example-disabled-results");
$disabledResults.select2();
</script>
@endsection
