@extends('backend.layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-12">
                <div class="card">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Code</th>

                        <th scope="col">Date</th>
                        <th scope="col">Option</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($Vouchers as $v)
                        <tr>
                            <th scope="row">{{ $loop->index+1 }}</th>
                            <td>{{ $v->name }}</td>
                            <td>{{  $v->created_at }}</td>

                            <td>
                                <a href="{{ route('inventory_view',$v->order_id) }}" class="btn btn-primary"><i class="las la-eye"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
@section('script')

@endsection
