<section class="mb-4 bg-white">
    <div class="container">
        {{-- <div class="col-md-12">
            <h2 class="h5 fw-700 mb-3">
                Our Brand
            </h2>
        </div> --}}
        <center>
            <div class="d-flex align-items-baseline">
                <h5>
                    <b> {{ translate('Our Brands') }}</b>
                </h5>
                {{-- <h6 class="py-10px"><span class="border-primary border-width-2 pb-0 d-inline-block">Everything We Expect to See in 2021</span></h6> --}}
            </div>
        </center>

        {{-- For hr tag --}}
        <div class="" style="background-color: #FD6500; padding: 1px;">
        </div>

        <div class="m-4">
            <div class="col-md-12">
                <section class="customer-logos slider">
                    @foreach ($top10_brands as $key => $value)
                        @php $brand = \App\Brand::find($value); @endphp
                        @if ($brand != null)
                            <div class="slide"><img src="{{ static_asset('assets/img/placeholder.jpg') }}"
                                    data-src="{{ uploaded_asset($brand->logo) }}"
                                    alt="{{ $brand->getTranslation('name') }}"
                                    class="img-fluid img lazyload h-60px"
                                    onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder-rect.jpg') }}';">
                            </div>
                        @endif
                    @endforeach
                </section>
            </div>
        </div>
    </div>
</section>