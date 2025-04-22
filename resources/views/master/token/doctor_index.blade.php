@extends('master.layuot.mane')

@section('token')
    menu-item-open
@endsection
@section('doctor_token')
    menu-item-active
@endsection
@section('title')
    {{ __('lang.doctor_token') }}
@endsection
@section('toolbar-right')
    <span class="text-muted font-weight-bold mr-4">{{ __('lang.doctor_token') }}</span>
@endsection
@section('toolbar-laft')
    <a href="{{ url(url()->previous()) }}" class="btn btn-light-primary font-weight-bolder btn-sm">{{ __('lang.back') }}</a>
@endsection

@section('master-content')
    <div class="row">
        <div class=" col-md-12">
            <div id="doctorData">
                <x-token.doctor-index :doctor="$doctor"></x-token.doctor-index>
            </div>
        </div>



    </div>
@endsection
@section('js')
    <script>

        function tokengeneral(url) {
            $.ajax({
                url: url,
                data: {},
                type: "POST",
                success: function(data) {
                    $("#doctorData").html('');
                    $("#doctorData").append(data.html);
                },
            });
        }
    </script>
@endsection
