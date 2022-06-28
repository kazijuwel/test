@extends('user.layouts.userMaster')

@push('css')
@endpush

@section('content')
<section class="content">
    <br>
    <div class="row">
        <div class="col-sm-12">
            @include('alerts.alerts')
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">
                        {{ Str::ucfirst($type) }} Contents
                    </h3>
                </div>
                <div class="card-body">
                    @if ($contents != null && $contents->count() > 0)
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
                                @php
                                    $i = (($contents->currentPage() - 1) * $contents->perPage()); 
                                @endphp
                                @foreach ($contents as $content)
                                <tr>
                                    <td>{{ $i+$loop->iteration }}</td>
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
                    @else
                        No content found. <br>
                        <b>If you did not subscribe any membership yet, <a class="w3-text-blue" href="{{ route('welcome.membershipPlans') }}">Take a membership</a></b>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endsection


@push('js')

@endpush
