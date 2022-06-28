@extends('theme.prt.layouts.prtMaster')

@section('title')
Course Varification | {{ env('APP_NAME') }}
@endsection
@section('meta')
@endsection

@push('css')
<style>
    .popup{
        position: fixed;
        right: 50%;
    }
</style>
@endpush

@section('contents')
@include('alerts.alerts')
<div class="row">
<div class="col-md-9">
    <div class="container text-dark">
        <div class="card my-5 mx-md-5" >
            <div class="h4 w3-blue card-header">
                Varification
            </div>
            <div class="card-body">
                <div class="h5 mb-2">Please input your registration number and press Submit</div>
                <form action="" method="get">
                    <div class="input-group">
                        <label for="reg">Registration Number:*</label>
                        <input class="form-control mx-2" type="text" name="reg" value="{{ $reg ?? old('reg') }}">
                        
                    </div>
                    <div class="input-group my-2 text-center">
                        @if (isset($reg) && !isset($membership))
                        <span class="alert alert-danger py-2 m-auto">This registration number is invalid.</span>
                        @endif  
                    </div>
                    <div class="text-right pt-5">
                        <button class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
        @isset($membership)
        <div class="">
            <div class="card" style="max-width: 500px;margin:auto">
                <div class="card-header w3-green h4">
                    Information of Course Completion
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item">
                            Registration Number:   {{ $membership->reg_no }}
                        </li>
                        <li class="list-group-item">
                            Registration Date:   {{ now()->parse($membership->created_at)->format('d-M-Y') }}
                        </li>
                        <li class="list-group-item">
                            Student Name:   {{ $membership->first_name }} {{ $membership->last_name }}
                        </li>
                        <li class="list-group-item">
                            Date of Birth:   {{ $membership->birthdate }}
                        </li>
                        <li class="list-group-item">
                            Membership:   {{ $membership->membership->title ?? '' }}
                        </li>
                        <li class="list-group-item">
                            Course:   {{ $membership->course->title ?? '' }}
                        </li>
                        <li class="list-group-item">
                            Address:   {{ $membership->address }}
                        </li>
                        <li class="list-group-item">
                            Country:   {{ $membership->country }}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        @endisset
    </div>
</div>
<div class="col-md-3 pr-5">
    @include('theme.prt.course.parts.pageSidebar')
</div>

</div>


@endsection

@push('js')
<script>
    $(document).ready(function(){
        $('#sloganModal').modal('show')
    })
</script>
@endpush
