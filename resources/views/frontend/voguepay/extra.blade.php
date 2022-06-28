@extends('admin.layouts.adminMaster')
​
@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/themes/default/style.min.css" />
    <link rel="stylesheet" href="{{ asset('cp/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('cp/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    
    <style>
        li.select2-selection__choice {
            color: black !important;
            background: #cecece;
        }
​
        .select2-dropdown .select2-search__field:focus,
        .select2-search--inline .select2-search__field:focus {
            outline: none !important;
            border: none !important;
        }
​
        span.select2-selection__choice__remove {
            color: red !important;
        }
​
    </style>
    <link rel="stylesheet" href="{{ asset('lte/plugins/summernote/summernote-bs4.css') }}">
@endpush
​
@section('content')
    <br>
    @include('alerts.alerts')
    <section class="content">
        <div class="container">
            <div class="card">
                <div class="card-header with-border">
                    <h3 class="card-title">
                        New Post
                    </h3>
                </div>
                <form method="post" action="{{ route('admin.StoreBlog') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="type">Select Post Type</label>
                                <select name="type" id="type" class="form-control">
                                    <option value="">Select Type</option>
                                    <option value="blog">Blog</option>
                                    <option value="news">News</option>
                                    <option value="event">Event</option>
                                </select>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" name="title" class="form-control">
                                </div>
                                @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea name="description" class="form-control" rows="10" id="description"
                                        placeholder="Description">{!! old('description') !!}</textarea>
                                    @error('description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="excerpt">Excerpt</label>
                                    <textarea name="excerpt" class="form-control" rows="3" id="excerpt"
                                        placeholder="Excerpt of Post">{{ old('excerpt') }}</textarea>
                                    @error('excerpt')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="tag">Select Tags</label>
                                <select id="tags" name="tags[]"
                                    class="form-control select2-tags select2-container step2-select select2"
                                    data-placeholder="Select Tags From list or Add New"
                                    data-ajax-url="{{ route('admin.selectTagsOrAddNew') }}" data-ajax-cache="true"
                                    data-ajax-dataType="json" data-ajax-delay="200" multiple="multiple"
                                    style="width: 100%;">
                                    @if (old('tags'))
                                        @foreach (old('tags') as $tagg)
                                            <option selected="selected">{{ $tagg }}</option>
                                        @endforeach
                                    @endif
​
                                </select>
                            </div>
                            <div class="col-md-6 my-2">
                                <label for="categories">Categories</label>
                                <select id="categories" name="categories[]" multiple class="form-control select2Cats"
                                    id="categories">
                                    @foreach ($cats->chunk(2) as $cats2)
                                        @foreach ($cats2 as $cat)
                                            <option {{ $cat->hasPost($post) ? 'selected' : '' }}
                                                value="{{ $cat->id }}">
                                                {{ $cat->name }}</option>
​
                                        @endforeach
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="checkbox">
                                        <label><input type="checkbox" name="publish" checked>Publish Instantly</label>
                                    </div>
                                </div>
                            </div>
​
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="feature_image">Image</label>
                                    <input type="file" name="feature_image">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <input type="submit" class="btn btn-info" value="Submit">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
​
@endsection
​
​
@push('js')
​
    <script src="{{ asset('cp/plugins/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('cp/plugins/summernote/summernote-bs4.min.js') }}"></script>
​
​
    <script>
        $(document).ready(function() {
            $('#description').summernote({
                height: 400
            });
            $('.select2Cats').select2();
            $('.select2-tags').select2({
                minimumInputLength: 1,
                tags: true,
                tokenSeparators: [','],
                ajax: {
                    data: function(params) {
                        return {
                            q: params.term, // search term
                            page: params.page
                        };
                    },
                    processResults: function(data, params) {
                        params.page = params.page || 1;
                        // alert(data[0].s);
                        var data = $.map(data, function(obj) {
                            obj.id = obj.id || obj.name;
                            return obj;
                        });
                        var data = $.map(data, function(obj) {
                            obj.text = obj.text || obj.name;
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
​
            //////////////////
​
​
​
​
            $(document).on('click', '#btn-feature', function(e) {
                e.preventDefault();
                $('#my_feature_img').click();
            });
        });
    </script>
​
@endpush
Collapse

