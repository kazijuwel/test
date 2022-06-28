<style>
body {
    background: #BA68C8
}

.form-control:focus {
    box-shadow: none;
    border-color: #BA68C8
}

.profile-button {
    background: #BA68C8;
    box-shadow: none;
    border: none
}

.profile-button:hover {
    background: #682773
}

.profile-button:focus {
    background: #682773;
    box-shadow: none
}

.profile-button:active {
    background: #682773;
    box-shadow: none
}

.back:hover {
    color: #682773;
    cursor: pointer
}

.labels {
    font-size: 11px
}

.add-experience:hover {
    background: #BA68C8;
    color: #fff;
    cursor: pointer;
    border: solid 1px #BA68C8
}


</style>

@extends('backend.layouts.app')
@section('content')
<div class="container rounded bg-white mt-5 mb-5">
  <div class="row">
      <div class="col-md-3 border-right">
          <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" src="https://i.imgur.com/O1RmJXT.jpg" width="90"><span class="font-weight-bold">{{ $user->name }}</span><span class="text-black-50">{{ $user->email }}</span><span>{{ $user->country }}</span></div>
      </div>
      <div class="col-md-5 border-right">
          <div class="p-3 py-5">
              <div class="d-flex justify-content-between align-items-center mb-3">
                  <h6 class="text-right">View profile</h6>
              </div>
              <div class="row mt-2">
                  <div class="col-md-12"><label class="labels">Name</label><input type="text" class="form-control" value="{{ $user->name }}" placeholder=""></div>
              </div>
              <div class="row mt-3">
                  <div class="col-md-12"><label class="labels">Email</label><input type="text" class="form-control" value="{{ $user->email }}"></div>

                  <div class="col-md-12"><label class="labels">Phone</label><input type="text" class="form-control"  value="{{ $user->phone }}"></div>
              </div>
              <div class="row mt-3">
                  <div class="col-md-6"><label class="labels">City</label><input type="text" class="form-control" value="{{$user->city }}"></div>

                  <div class="col-md-6"><label class="labels">Postal Code</label><input type="text" class="form-control" value="{{ $user->city }}"></div>
              </div>
          </div>
      </div>
      <div class="col-md-4">
          <div class="p-3 py-5">
              
                <p>{{ $user->address }}</p>
          </div>
      </div>
  </div>
</div>
@endsection
