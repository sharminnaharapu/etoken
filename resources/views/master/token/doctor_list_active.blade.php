@extends('master.layuot.mane')

@section('token')
    menu-item-open
@endsection
@section('doctor_current_token')
    menu-item-active
@endsection
@section('title')
    {{ __('lang.doctor_current_token') }}
@endsection
@section('toolbar-right')
    <span class="text-muted font-weight-bold mr-4">{{ __('lang.doctor_current_token') }}</span>
@endsection
@section('toolbar-laft')
    <a href="{{ url(url()->previous()) }}" class="btn btn-light-primary font-weight-bolder btn-sm">{{ __('lang.back') }}</a>
@endsection
@section('CSS')
    @vite('resources/js/app.js')
@endsection
@section('master-content')
    <div class="row">

        <div class=" col-lg-12">
            <div class="card card-custom gutter-b">
                <div class="card-header">
                    <h3 class="card-title">{{ __('lang.doctor_current_token') }}</h3>
                </div>
                <div class="card-body p-2">
                    <x-token.filter :url="'master.doctortoken.activefilter'"></x-token.filter>
                    <x-token.doctor-list-data :users="$users" :nexturl="'master.doctortoken.next'"></x-token.doctor-list-data>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        window.addEventListener('load', () => {
            window.Echo.channel('doctorTokenGenerate').listen('DoctorTokenGenerateEvent', ({token})=> {
                window.location.reload()
            })
        })
    </script>
@endsection
