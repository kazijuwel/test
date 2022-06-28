@extends('theme.prt.layouts.prtMaster')

@section('title')
{{ env('APP_NAME_BIG') }}
@endsection
@section('meta')
@endsection

@push('css')

@endpush

@section('contents')
    <div class="container mt-4">
        <h3 class="w3-text-teal w3-center" style="font-family: ui-serif; letter-spacing: 2px;font-size:27px;"><b>Notice Board</b></h3>
        <div class="table-responsive">
            <table class="table table-lg table-striped table-border border-white">
                @foreach ($notices as $item)
                    
                <tr style="max-width: 300px; background-color:#f04d23;border: 2px solid #fff;">
                    <td class="w3-text-white" style="border: 2px solid #fff;
                    padding: 25px;">{{ $loop->iteration }}</td>
                    <td class="w3-text-white" style="border: 2px solid #fff; white-space: nowrap;padding-top:25px;">
                        {{ $item->created_at->toDateString() }}
                    </td>
                    <td class="w3-text-white" style="width: 100%; border: 2px solid #fff; white-space: nowrap; padding-top:25px;">
                        {{ ucfirst($item->title) }}
                    </td>
                    
                    <td style="width: 100%">
                        <div class="w3-display-container" >
                            <a target="_blank" href="{{asset('storage/media/image/'. $item->feature_img_name)}}" class="btn btn-primary btn-sm">
                                <i class="fa fa-download"></i> Download 
                            </a>
                        </div>
                    </td>
                </tr>
                @endforeach
                
            </table>
        </div>
    </div>
@endsection