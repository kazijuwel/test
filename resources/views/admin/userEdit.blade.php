@extends('admin.layouts.adminMaster')

@push('css')

@endpush

@section('content')
    <section class="content">

        <br>

        <div class="row">

            <div class="col-sm-12">


                @include('alerts.alerts')


                <div class="card card-widget">
                    <div class="card-header">
                        <h3 class="card-title"><i class="fa fa-briefcase text-primary"></i> <span
                                class="badge badge-light">

              User Information Update

                </span>
                        </h3>
                    </div>
                    <div class="card-body" style="min-height: 200px;">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-md-12">
                                   <div class="row">
                                       <div class="col-12 col-md-6">
                                           <div class="card">
                                               <div class="card-header">{{ __('Balance Update User') }} ({{ $user->email }})</div>

                                               <div class="card-body">
                                                   <form method="post" enctype="multipart/form-data"
                                                         action="{{ route('admin.customerBalanceUpdate', ['customer'=>$user->id]) }}">
                                                       @csrf

                                                       <div class="form-group">
                                                           <label for="balance">Update Balance ({{$user->credit}})</label>
                                                           <input type="number" name="balance" class="form-control"
                                                                  placeholder="Enter balance"  id="balance">
                                                       </div>
                                                       <button type="submit" class="btn btn-primary">Update Balance</button>
                                                   </form>
                                               </div>
                                           </div>
                                       </div>
                                       <div class="col-12 col-md-6">
                                           <div class="card">
                                               <div class="card-header">{{ __('Update User') }} ({{ $user->email }})</div>

                                               <div class="card-body">
                                                   <form method="POST" action="{{ route('admin.userUpdate', $user) }}">
                                                       @csrf

                                                       <div class="form-group row">
                                                           <label for="name"
                                                                  class="col-md-4 col-form-label text-md-right">{{ __('Full Name') }}</label>

                                                           <div class="col-md-6">
                                                               <input id="name" type="text"
                                                                      class="form-control @error('name') is-invalid @enderror"
                                                                      name="name" value="{{ old('name') ?: $user->name }}"
                                                                      required autocomplete="name" autofocus>

                                                               @error('name')
                                                               <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                               @enderror
                                                           </div>
                                                       </div>

                                                       <div class="form-group row">
                                                           <label for="email"
                                                                  class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                                           <div class="col-md-6">
                                                               <input id="email" type="email"
                                                                      class="form-control @error('email') is-invalid @enderror"
                                                                      name="email" value="{{ old('email') ?: $user->email }}"
                                                                      required autocomplete="email">

                                                               @error('email')
                                                               <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                               @enderror
                                                           </div>
                                                       </div>


                                                       <div class="form-group row">
                                                           <label for="mobile"
                                                                  class="col-md-4 col-form-label text-md-right">{{ __('Mobile') }}</label>

                                                           <div class="col-md-6">
                                                               <input id="mobile" type="text"
                                                                      class="form-control @error('mobile') is-invalid @enderror"
                                                                      name="mobile"
                                                                      value="{{ old('mobile') ?: $user->mobile }}" required
                                                                      autocomplete="mobile">

                                                               @error('mobile')
                                                               <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                               @enderror
                                                           </div>
                                                       </div>

                                                       <div class="form-group row">
                                                           <label for="password"
                                                                  class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                                           <div class="col-md-6">
                                                               <input id="password" type="password"
                                                                      class="form-control @error('password') is-invalid @enderror"
                                                                      name="password" autocomplete="new-password">

                                                               @error('password')
                                                               <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                               @enderror
                                                           </div>
                                                       </div>

                                                       <div class="form-group row">
                                                           <label for="password-confirm"
                                                                  class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                                           <div class="col-md-6">
                                                               <input id="password-confirm" type="password"
                                                                      class="form-control" name="password_confirmation"
                                                                      autocomplete="new-password">
                                                           </div>
                                                       </div>


                                                       <div class="form-group row">
                                                           <div class="col-md-6 offset-md-4">
                                                               <div class="form-check">
                                                                   <input class="form-check-input" type="checkbox"
                                                                          name="active" id="active" checked>

                                                                   <label class="form-check-label" for="active">
                                                                       {{ __('Active') }}
                                                                   </label>
                                                               </div>
                                                           </div>
                                                       </div>


                                                       <div class="form-group row mb-0">
                                                           <div class="col-md-6 offset-md-4">
                                                               <button type="submit" class="btn btn-primary">
                                                                   {{ __('Update') }}
                                                               </button>
                                                           </div>
                                                       </div>
                                                   </form>
                                               </div>
                                           </div>
                                       </div>
                                   </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>


        </div>
        </div>
        </div>
        </div>


    </section>
@endsection


@push('js')

@endpush

