@extends('backend.layouts.app')

@section('content')

    <div class="aiz-titlebar text-left mt-2 mb-3">
        <div class="row align-items-center">
            <div class="col-md-12 bg-secondary">
                <h1 class="h3 p-2">{{translate('Seller products')}}</h1>
            </div>
        </div>
    </div>
    <br>
    <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table aiz-table mb-0">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th width="20%">{{translate('Name')}}</th>
                            <th>{{translate('Sells Amount')}}</th>
                            <th>{{translate('Quantity')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                           
                        @foreach($saleproduct as $key => $product)
                            <tr>
                           <td>{{ $loop->index+1 }}</td>
                           <td><a href="#">{{ $product->product->name }}</a></td>
                           <td>{{ $product->price }}</td>
                           <td>{{ $product->quantity }}</td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
               </div>
                <div class="aiz-pagination">
                    {{ $saleproduct->appends(request()->input())->links() }}
                </div>
            </div>
    </div>


@endsection

@section('modal')
    @include('modals.delete_modal')

    <div class="modal fade" id="profile_modal">
        <div class="modal-dialog">
            <div class="modal-content" id="profile-modal-content">

            </div>
        </div>
    </div>

@endsection


@section('script')
    <script type="text/javascript">

        function show_seller_profile(id, user_type) {
            if (user_type == 'admin') {
                alert('you are already in Admin Panel');
            }
            $.post('{{ route('sellers.profile_modal_v2') }}', {_token: '{{ @csrf_token() }}', id: id}, function (data) {
                console.log(data);
                $('#profile_modal #profile-modal-content').html(data);
                $('#profile_modal').modal('show', {backdrop: 'static'});
            });
        }

        $(document).ready(function () {
            //$('#container').removeClass('mainnav-lg').addClass('mainnav-sm');
        });

        function update_todays_deal(el) {
            if (el.checked) {
                var status = 1;
            }
            else {
                var status = 0;
            }
            $.post('{{ route('products.todays_deal') }}', {
                _token: '{{ csrf_token() }}',
                id: el.value,
                status: status
            }, function (data) {
                if (data == 1) {
                    AIZ.plugins.notify('success', '{{ translate('Todays Deal updated successfully') }}');
                }
                else {
                    AIZ.plugins.notify('danger', '{{ translate('Something went wrong') }}');
                }
            });
        }

        function update_published(el) {
            if (el.checked) {
                var status = 1;
            }
            else {
                var status = 0;
            }
            $.post('{{ route('products.published') }}', {
                _token: '{{ csrf_token() }}',
                id: el.value,
                status: status
            }, function (data) {
                if (data == 1) {
                    AIZ.plugins.notify('success', '{{ translate('Published products updated successfully') }}');
                }
                else {
                    AIZ.plugins.notify('danger', '{{ translate('Something went wrong') }}');
                }
            });
        }

        function update_approval(el) {
            if (el.checked) {
                var status = 1;
            }
            else {
                var status = 0;
            }
            $.post('{{ route('products.approved') }}', {
                _token: '{{ csrf_token() }}',
                id: el.value,
                status: status
            }, function (data) {
                if (data == 1) {
                    AIZ.plugins.notify('success', '{{ translate('Published products updated successfully') }}');
                }
                else {
                    AIZ.plugins.notify('danger', '{{ translate('Something went wrong') }}');
                }
            });
        }

        function update_featured(el, featured_status) {
            if (el.checked) {
                var status = featured_status;
            }
            else {
                var status = 0;
            }
            $.post('{{ route('products.featured') }}', {
                _token: '{{ csrf_token() }}',
                id: el.value,
                status: status
            }, function (data) {
                if (data == 1) {
                    AIZ.plugins.notify('success', '{{ translate('Featured products updated successfully') }}');
                }
                else {
                    AIZ.plugins.notify('danger', '{{ translate('Something went wrong') }}');
                }
            });
        }

        function sort_products(el) {
            $('#sort_products').submit();
        }

    </script>
@endsection