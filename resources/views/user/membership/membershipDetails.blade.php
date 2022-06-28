@extends('user.layouts.userMaster')

@push('css')
@endpush
@section('content')
<section class="content">
    <br>
    <div class="row">
        <div class="col-sm-12">
            @include('alerts.alerts')
            <div class="card- card-primary">
                <div class="card-header">
                    <h3 class="card-title">
                        My Membership Details
                    </h3>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            @if ($membership != null)
                        <div class="col-md-3">
                            <img style="max-width: 100%; max-height: 300px;" src="{{ asset($membership->image()) }}" alt="">
                        </div>
                        <div class="col-md-9">
                            <div class="">
                                <b>Title:</b> {{ $membership->title }}
                            </div>
                            <div>
                                <b>Expire Date:</b>  {{ now()->parse($membershipStudent->expire_date)->format('d-M-Y') }}
                            </div>
                            <div>
                                <b>Description:</b> 
                                <div style="white-space: pre-line;  line-height: 1;  margin-left: 45px; color: #010101;   text-align: justify;">
                                    {!! $membership->description !!}
                                </div>
                            </div>
                        </div>
                        @else
                        <b>You did not subscribe any membership yet, <a class="w3-text-blue" href="{{ route('welcome.membershipPlans') }}">Take a membership</a></b>
                        @endif
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        @if ( !empty($contents) && $contents->count() > 0)
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Title</th>
                                            <th>Short Description</th>
                                            <th>options</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($contents as $content)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $content->title }}</td>
                                            <td>{!! $content->excerpt !!}</td>
                                            <td>
                                                <a href="{{ route('user.contentDetails', $content) }}">deltails</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="text-center">
                                {{ $contents->links() }}
                            </div>
                        </div>
                      @else
                      <p>No content found.</p>
                      @endif
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
