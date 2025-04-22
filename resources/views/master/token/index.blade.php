@extends('master.layuot.mane')

@section('token')
    menu-item-open
@endsection
@section('tokenindex')
    menu-item-active
@endsection
@section('title')
    {{ __('lang.token') }}
@endsection
@section('toolbar-right')
    <span class="text-muted font-weight-bold mr-4">{{ __('lang.token') }}</span>
@endsection
@section('toolbar-laft')
    <a href="{{ url(url()->previous()) }}" class="btn btn-light-primary font-weight-bolder btn-sm">{{ __('lang.back') }}</a>
@endsection

@section('master-content')
    <div class="row">
        <div class=" col-md-12">


            <div id="departmentData">
                <x-token.department :departments="$departments"></x-token.department>
            </div>
        </div>
        <div class=" col-md-12">

            <div id="serviceData">

            </div>
        </div>


    </div>
@endsection

@section('js')
    <script>
        function serviceDataGet(url) {
            $.ajax({
                url: url,
                data: {},
                type: "POST",
                success: function(data) {
                    $("#departmentData").html('');
                    $("#serviceData").append(data.html);

                },
            });
        }
        function tokengeneral(url) {
            $.ajax({
                url: url,
                data: {},
                type: "POST",
                success: function(data) {
                    $("#departmentData").append(data.html);
                    $("#serviceData").html('');
                    toastr.success(data.message);
                },
            });
        }
    </script>
@endsection
