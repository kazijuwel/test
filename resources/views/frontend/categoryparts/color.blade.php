
                                <div class="bg-white shadow-sm rounded mb-3">
                                    <div class="fs-15 fw-600 p-3 border-bottom">
                                        {{ translate('Filter by color')}}
                                    </div>
                                    <div class="p-3">
                                        <div class="aiz-radio-inline">
                                            @foreach ($all_colors as $key => $color)
                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="{{ \App\Color::where('code', $color)->first()->name }}">
                                                <input
                                                    type="radio"
                                                    name="color"
                                                    value="{{ $color }}"
                                                    onchange="filter()"
                                                    @if(isset($selected_color) && $selected_color == $color) checked @endif
                                                >
                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                    <span class="size-30px d-inline-block rounded" style="background: {{ $color }};"></span>
                                                </span>
                                            </label>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
