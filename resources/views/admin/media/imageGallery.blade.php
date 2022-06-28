@extends('admin.layouts.adminMaster')

@push('css')
@endpush

@section('content')
    @include('admin.media.parts.imageGallery')
@endsection

@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js" integrity="sha512-bZS47S7sPOxkjU/4Bt0zrhEtWx0y0CRkhEp8IckzK+ltifIIE9EMIMTuT/mEzoIMewUINruDBIR/jJnbguonqQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script>
          function toggleFeature(url) {
            axios.post(url).then(res =>{
              if (res.status == 200) {
                
              }
            })
          }
        </script>
    @endpush