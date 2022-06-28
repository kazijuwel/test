@extends('backend.layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('store_update') }}" method="Post">
                            @csrf
                            <input type="hidden" name="storeId" value="{{ $bStore->id }}">
                            <div class="form-group">
                                <label for="Storename">Store Name</label>
                                <input type="text" name="store_name" class="form-control" value="{{ $bStore->store_name }}"  required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Address</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                                    name="address"> {{ $bStore->address }} </textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect2">Status</label>
                                <select class="form-control" id="exampleFormControlSelect2" name="active">

                                    <option value="1" {{($bStore->active == 1)? "selected":" "}}>Active</option>

                                    <option value="0" {{($bStore->active == 0)? "selected":" " }}>Deactive</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection
    @section('script')

    @endsection
