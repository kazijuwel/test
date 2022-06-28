<a id="compare" href="{{ route('compare') }}" class="d-flex align-items-center text-reset">
    <i class="la la-refresh la-cx"></i>

        @if(Session::has('compare'))
            <span class="badge badge-primary badge-inline badge-pill">{{ count(Session::get('compare'))}}</span>
        @else
            <span class="badge badge-primary badge-inline badge-pill" style="position: relative; top: -5px;right: 5px;">0</span>
        @endif
        <span class="nav-box-text">{{translate('Compare')}}</span>

</a>
