@extends('theme.prt.layouts.prtMaster')

@section('title')
 Subscription Rate | {{ env('APP_NAME') }}
@endsection
@section('meta')
@endsection

@push('css')
<style>
    .popup{
        position: fixed;
        right: 50%;
    }
</style>
@endpush

@section('contents')
@include('alerts.alerts')
<div class="row">
    <div class="col-md-9 py-2 pl-5">
        <div class="container pl-5">
            <div class="h1 py-2" style="color: #003">
                Subscription Rates
            </div>
            <div>
                To make the most of the wide range of professional and practical benefits membership brings it is essential that you keep your subscription up to date. <br>
                <b>Discounted rates</b> are available for those working less than full time, on parental leave, retired, or in other special circumstances.
            </div>
            <div class="py-3">
                <div class="h2 w3-text-indigo">
                    Fellows
                </div>
                <div>
                    <table class="table-hover text-4 w-100">
                        <tr>
                            <th class="px-3" width="75%">Scotland</th>
                            <th width="25%">£408</th>
                        </tr>
                        <tr>
                            <th class="px-3" width="75%">UK and Ireland</th>
                            <th width="25%">£408</th>
                        </tr>
                        <tr>
                            <th class="px-3" width="75%">Rest of the World</th>
                            <th width="25%">£184</th>
                        </tr>
                        <tr>
                            <th class="px-3" width="75%">Retired</th>
                            <th width="25%">£62</th>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="py-3">
                <div class="h2 w3-text-indigo">
                    Members
                </div>
                <div>
                    <table class="table-hover text-4 w-100">
                        <tr>
                            <th class="px-3" width="75%">Scotland</th>
                            <th width="25%">£163</th>
                        </tr>
                        <tr>
                            <th class="px-3" width="75%">UK and Ireland</th>
                            <th width="25%">£163</th>
                        </tr>
                        <tr>
                            <th class="px-3" width="75%">Rest of the World</th>
                            <th width="25%">£113</th>
                        </tr>
                        <tr>
                            <th class="px-3" width="75%">Low Middle Income economies</th>
                            <th width="25%">£90</th>
                        </tr>
                        <tr>
                            <th class="px-3" width="75%">Retired</th>
                            <th width="25%">£30</th>
                        </tr>
                        <tr>
                            <th class="px-3" width="75%">MRCP/MRCS Year 3</th>
                            <th width="25%">£123</th>
                        </tr>
                        <tr>
                            <th class="px-3" width="75%">MRCP/MRCS Year 2</th>
                            <th width="25%">£103</th>
                        </tr>
                        <tr>
                            <th class="px-3" width="75%">MRCP/MRCS Year 1</th>
                            <th width="25%">£83</th>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="py-3">
                <div class="h2 w3-text-indigo">
                    Associates
                </div>
                <div>
                    <table class="table-hover text-4 w-100">
                        <tr>
                            <th class="px-3" width="75%">Scotland</th>
                            <th width="25%">£133</th>
                        </tr>
                        <tr>
                            <th class="px-3" width="75%">UK and Ireland</th>
                            <th width="25%">£133</th>
                        </tr>
                        <tr>
                            <th class="px-3" width="75%">Rest of the World</th>
                            <th width="25%">£77</th>
                        </tr>
                        <tr>
                            <th class="px-3" width="75%">Low Middle Income economies</th>
                            <th width="25%">£75</th>
                        </tr>
                        <tr>
                            <th class="px-3" width="75%">Retired</th>
                            <th width="25%">£20</th>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="py-3">
                <div class="h2 w3-text-indigo">
                    Affiliates
                </div>
                <div>
                    <table class="table-hover text-4 w-100">
                        <tr>
                            <th class="px-3" width="75%">Scotland</th>
                            <th width="25%">£30</th>
                        </tr>
                        <tr>
                            <th class="px-3" width="75%">UK and Ireland</th>
                            <th width="25%">£30</th>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 pr-5">
        @include('theme.prt.course.parts.pageSidebar')
    </div>
</div>

  
@endsection

@push('js')
<script>
    $(document).ready(function(){
        $('#sloganModal').modal('show')
    })
</script>
@endpush