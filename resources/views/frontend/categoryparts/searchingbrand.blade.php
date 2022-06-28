<div class="form-group ml-auto mr-0 w-200px d-none d-xl-block">
    <label class="mb-0 opacity-50">{{ translate('Brands')}}</label>
    <select class="form-control form-control-sm aiz-selectpicker" data-live-search="true" name="brand" onchange="filter()">
        <option value="">{{ translate('Brands')}}</option>


        @foreach ($brands as $brand)
            <option value="{{ $brand->slug }}" @isset($brand_id) @if ($brand_id == $brand->id) selected @endif @endisset>{{ $brand->name}}</option>
        @endforeach
    </select>
</div>
<div class="form-group w-200px ml-0 ml-xl-3">
    <label class="mb-0 opacity-50">{{ translate('Sort by')}}</label>
    <select class="form-control form-control-sm aiz-selectpicker" name="sort_by" onchange="filter()">
        <option value="newest" @isset($sort_by) @if ($sort_by == 'newest') selected @endif @endisset>{{ translate('Newest')}}</option>
        <option value="oldest" @isset($sort_by) @if ($sort_by == 'oldest') selected @endif @endisset>{{ translate('Oldest')}}</option>
        <option value="price-asc" @isset($sort_by) @if ($sort_by == 'price-asc') selected @endif @endisset>{{ translate('Price low to high')}}</option>
        <option value="price-desc" @isset($sort_by) @if ($sort_by == 'price-desc') selected @endif @endisset>{{ translate('Price high to low')}}</option>
    </select>
</div>
<div class="d-xl-none ml-auto ml-xl-3 mr-0 form-group align-self-end">
    <button type="button" class="btn btn-icon p-0" data-toggle="class-toggle" data-target=".aiz-filter-sidebar">
        <i class="la la-filter la-2x"></i>
    </button>
</div>
