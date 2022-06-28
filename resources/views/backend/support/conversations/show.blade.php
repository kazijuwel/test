@extends('backend.layouts.app')

@section('content')

<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">#{{ $conversation->title }} (Between @if($conversation->sender != null) {{ $conversation->sender->name }} @endif and @if($conversation->receiver != null) {{ $conversation->receiver->name }} @endif)
            </h5>
        </div>

        <div class="card-body">
            <ul class="list-group list-group-flush">
                @foreach($conversation->messages as $message)
                    <li class="list-group-item">
                        <div class="media mb-2">

                            <img class="avatar avatar-xs mr-3" @if($message->user != null) src="{{ uploaded_asset($message->user->avatar_original) }}" @endif onerror="this.onerror=null;this.src='{{ static_asset('assets/img/avatar-place.png') }}';">

                          <div class="media-body">
                            <h6 class="mt-0">
                                @if ($message->user != null)
                                    {{ $message->user->name }}
                                @endif
                            </h6>
                            <p class="text-muted">{{$message->created_at}}</p>
                            @if($conversation->receiver_type != 'admin')
                            <div class="text-right">
                            <div class="dropdown-file" >
                            <a class="dropdown-link" data-toggle="dropdown">
                                <i style="font-size:34px; height:40px; width:20px" class="la la-ellipsis-v"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">


                            <a class="dropdown-item confirm-alert" onclick="show_edit_area('{{ $message->id }}');">

                                    <i class="las la-clipboard mr-2"></i>
                                    <span>{{ translate('Edit') }}</span>
                                </a>
                            </div>
                        </div>
                        </div>
                        @endif
                            <div class="div_hidden{{ $message->id }}">
                                <p>
                                     {{ $message->message }}
                                </p>
                            </div>

                            <form action="{{ route('message_update', $message->id) }}" method="POST">
                                <div style="display: none;" id="div_show{{ $message->id }}">
                                @csrf
                                <input type="hidden" name="conversation_id" value="{{ $conversation->id }}">
                                <input type="hidden" name="id" value="{{ $message->id }}">
                                <div class="row">
                                    <div class="col-md-12">
                                        <textarea class="form-control" rows="4" name="message" placeholder="{{ translate('Type your reply') }}" required> {{ $message->message }}</textarea>
                                    </div>
                                </div>
                                <br>
                                @if ($message->user != null)
                                @if ($message->user->user_type == 'seller')
                               
                                <div class="text-right">
                                    <button type="submit" name="button" value="forward_customer" class="btn btn-info">{{translate('Forward to Customer')}}</button>
                                </div>
                                @elseif ($message->user->user_type == 'customer')
                                <div class="text-right">
                                    <button type="submit" name="button" value="forward_seller" class="btn btn-info">{{translate('Forward to Seller')}}</button>
                                </div>
                                @else
                                <div class="text-right">
                                    <button type="submit" class="btn btn-info">{{translate('Send')}}</button>
                                </div>
                                @endif
                                @endif
                            </form>
                            </div>
                          </div>                                             
                    </li>
                @endforeach
            </ul>
            @if($conversation->receiver_type == 'admin')
                <form action="{{ route('messages.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="conversation_id" value="{{ $conversation->id }}">
                    <div class="row">
                        <div class="col-md-12">
                            <textarea class="form-control" rows="4" name="message" placeholder="{{ translate('Type your reply') }}" required></textarea>
                        </div>
                    </div>
                    <br>
                    <div class="text-right">
                        <button type="submit" class="btn btn-info">{{translate('Send')}}</button>
                    </div>
                </form>
            @endif
            <!-- 
                user to user only conversation er jnno

                @if (Auth::user()->id == $conversation->receiver_id)
                @endif 
            -->
           
        </div>
    </div>
</div>

@endsection

@section('script')
<script>

    function show_edit_area(id){

           var test = id;

            $("div.div_hidden" + test).hide();
            $("#div_show" + test).show();

        }

</script>
@endsection