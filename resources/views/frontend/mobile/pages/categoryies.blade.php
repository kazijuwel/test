@extends('frontend.mobile.layout.app')
@section('content')

<main class="app-content" >

 
    <div class="padding-x padding-bottom" style="background-color: #FD6500">
       <h5 class="title-page text-white text-center">All Categories</h5>
   </div>
   <section class=" mt-2">
       
                   <ul class="row" style="background-color: #cacbce">
                  
                   @foreach (\App\Category::where('level', 0)->whereNotNull('priority')->orderBy('priority', 'asc')->get()
    as $key => $category)
                       <li class="col-3" >
                           <a onclick="this.style.opacity=0.3" href="{{ route('products.category', $category->slug) }}" class=" btn btn-card-icontop btn rounded-0" style=" height: 100px;
                            line-height: 1.1;
                            margin-bottom: 10px;
                            padding: 16px 7px;
                            padding-bottom: 10px;
                            background-color: #fff;
                            display: block;">
                               <span class="icon"> <img src="{{ uploaded_asset($category->icon) }}" alt="{{ $category->getTranslation('name') }}"> </span>
                               <small style="color:#FD6500;" class="text text-center"> {{ $category->getTranslation('name') }}</small>
                           </a>
                       </li>
                       
                    @endforeach

                   </ul>
               </section>
</main>

@endsection 


