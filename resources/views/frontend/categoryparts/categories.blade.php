<div class="bg-white shadow-sm rounded mb-3">
    <div class="fs-15 fw-600 p-3 border-bottom">
        {{ translate('Categories')}}
    </div>
    <div class="p-3">
        <ul class="list-unstyled">
            @if (!isset($category_id))
                @foreach (\App\Category::where('level', 0)->get() as $category)

                    <li class="mb-2 ">
                        <a class="text-reset fs-14" href="{{ route('products.category', $category->slug) }}" >{{ $category->getTranslation('name') }}</a>
                    </li>
                @endforeach
            @else

                <li class="mb-2 ">
                    <a class="text-reset fs-14 fw-600" href="{{ route('search') }}">
                        <i class="las la-angle-left"></i>
                        {{ translate('All Categories')}}
                    </a>
                </li>
                @if (\App\Category::find($category_id)->parent_id != 0)

                    <li class=" pl-2 mb-2 ">
                        <a class="text-reset fs-14 fw-600" href="{{ route('products.category', \App\Category::find(\App\Category::find($category_id)->parent_id)->slug) }}">
                            <i class="las la-angle-left"></i>
                            {{ \App\Category::find(\App\Category::find($category_id)->parent_id)->getTranslation('name') }}
                        </a>
                    </li>
                @endif
                <li class=" pl-4 mb-2">
                    <a class="text-reset fs-14 fw-600" href="{{ route('products.category', \App\Category::find($category_id)->slug) }}">
                        <i class="las la-angle-left"></i>
                        {{ \App\Category::find($category_id)->getTranslation('name') }}
                    </a>
                </li>
                @foreach (\App\Utility\CategoryUtility::get_immediate_children_ids($category_id) as $key => $id)

                    <li class=" pl-2 ml-4 mb-2">
                        <a class="text-reset fs-14 categories" href="{{ route('products.category', \App\Category::find($id)->slug) }}" data-slug="{{ $id}}">{{ \App\Category::find($id)->getTranslation('name') }}</a>
                    </li>
                @endforeach
            @endif
        </ul>
    </div>
</div>

