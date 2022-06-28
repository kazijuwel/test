<div class="bg-white shadow-sm rounded mb-3">
    <div class="fs-15 fw-600 p-3 border-bottom">
        {{ translate('Price range')}}
    </div>
    <div class="p-3">
        <div class="aiz-range-slider">
            <div
                id="input-slider-range"
                data-range-value-min="@if(count(\App\Product::query()->get()) < 1) 0 @else {{ filter_products(\App\Product::query())->get()->min('unit_price') }} @endif"
                data-range-value-max="@if(count(\App\Product::query()->get()) < 1) 0 @else {{ filter_products(\App\Product::query())->get()->max('unit_price') }} @endif"
            ></div>

            <div class="row mt-2">
                <div class="col-6">
                    <span class="range-slider-value value-low fs-14 fw-600 opacity-70"
                        @if (isset($min_price))
                            data-range-value-low="{{ $min_price }}"
                        @elseif($products->min('unit_price') > 0)
                            data-range-value-low="{{ $products->min('unit_price') }}"
                        @else
                            data-range-value-low="0"
                        @endif
                        id="input-slider-range-value-low"
                    ></span>
                </div>
                <div class="col-6 text-right">
                    <span class="range-slider-value value-high fs-14 fw-600 opacity-70"
                        @if (isset($max_price))
                            data-range-value-high="{{ $max_price }}"
                        @elseif($products->max('unit_price') > 0)
                            data-range-value-high="{{ $products->max('unit_price') }}"
                        @else
                            data-range-value-high="0"
                        @endif
                        id="input-slider-range-value-high"
                    ></span>
                </div>
            </div>
        </div>
    </div>
</div>
