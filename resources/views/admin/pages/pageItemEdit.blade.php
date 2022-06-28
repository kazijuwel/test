@extends('admin.layouts.adminMaster')

@push('css')

      <!-- Select2 -->
{{--   <link rel="stylesheet" href="{{asset('assets/select2/dist/css/select2.min.css')}}"> --}}
      {{-- <style type="text/css">
    .select2-dropdown .select2-search__field:focus, .select2-search--inline .select2-search__field:focus {
        outline: none !important;
        border: none !important;
      }
  </style> --}}


  <!-- include codemirror (codemirror.css, codemirror.js, xml.js, formatting.js) -->
<link rel="stylesheet" type="text/css" href="{{ asset('//cdnjs.cloudflare.com/ajax/libs/codemirror/3.20.0/codemirror.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('//cdnjs.cloudflare.com/ajax/libs/codemirror/3.20.0/theme/monokai.css') }}">



  {{-- <link href="{{ asset('assets/sn/dist/summernote.css') }}" rel="stylesheet"> --}}


  <!-- without bs -->
  {{-- <link href="{{ asset('https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css') }}" rel="stylesheet"> --}}

  <link href="{{ asset('https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css') }}" rel="stylesheet">



  <style>
    .note-group-select-from-files {
      display: none;
    }
  </style>
  {{-- <link href="{{ asset('http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.css') }}" rel="stylesheet"> --}}
@endpush

@section('content')
  @include('admin.pages.parts.pageItemEdit')
@endsection



@push('js')

<script src="{{ asset('cp/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>



<script type="text/javascript" src="{{asset('//cdnjs.cloudflare.com/ajax/libs/codemirror/3.20.0/codemirror.js')}}"></script>
<script type="text/javascript" src="{{asset('//cdnjs.cloudflare.com/ajax/libs/codemirror/3.20.0/mode/xml/xml.js')}}"></script>
<script type="text/javascript" src="{{asset('//cdnjs.cloudflare.com/ajax/libs/codemirror/2.36.0/formatting.js')}}"></script>

{{-- <script src="{{ asset('assets/sn/dist/summernote.js') }}"></script> --}}
{{-- <script src="{{ asset('http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.js') }}"></script> --}}
{{-- <script src="{{asset('cp/plugins/ckeditor/ckeditor.js')}}"></script> --}}

<!-- Select2 -->
{{-- <script src="{{asset('assets/select2/dist/js/select2.full.min.js')}}"></script> --}}

{{-- without bs --}}
{{-- <script src="{{ asset('https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js') }}"></script> --}}

<script src="{{ asset('https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js') }}"></script>
<script>

  $(document).ready(function() {
    $('.details-input').summernote({
      placeholder: 'Write description of the post here...',
      minHeight: 160,
      codemirror: { // codemirror options
        theme: 'monokai',
        lineNumbers: true,
        lineWrapping: true,
      }
    });
  });

  // $(function () {
  //   // Replace the <textarea id="editor1"> with a CKEditor
  //   // instance, using default configuration.
  //   CKEDITOR.replace('description');
  // });

    $(document).ready(function () {
  $('.select2-tags').select2({
    minimumInputLength: 0,
    tags:true,
    tokenSeparators: [','],
    ajax: {
      data: function (params) {
        return {
          q: params.term, // search term
          page: params.page
        };
      },
      processResults: function (data, params) {
        params.page = params.page || 1;
        // alert(data[0].s);
        var data = $.map(data, function (obj) {
          obj.id = obj.id || obj.title;
          return obj;
        });
        var data = $.map(data, function (obj) {
          obj.text = obj.text || obj.title;
          return obj;
        });
        return {
          results: data,
          pagination: {
            more: (params.page * 30) < data.total_count
          }
        };
      }
    },
  });   
});
</script>



<script>
  $(function(){
          $('.slim-media').slimScroll({
              height: '500px'
          });

 
        });
</script>


<script>
  
  $(function(){

$(document).on('click', '.copyboard', function(e) {
  e.preventDefault();


  $(".copyboard").text('Copy to Clipboard');

  $(this).text('Coppied!');
  var copyText = $(this).attr('data-text');

  var textarea = document.createElement("textarea");
  textarea.textContent = copyText;
  textarea.style.position = "fixed"; // Prevent scrolling to bottom of page in MS Edge.
  document.body.appendChild(textarea);
  textarea.select();
  document.execCommand("copy"); 

  document.body.removeChild(textarea);
});

  });
</script>

@endpush


