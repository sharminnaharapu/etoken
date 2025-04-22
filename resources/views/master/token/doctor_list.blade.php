@extends('master.layuot.mane')

@section('token')
    menu-item-open
@endsection
@section('doctor_list')
    menu-item-active
@endsection
@section('title')
    {{ __('lang.doctor_list') }}
@endsection
@section('toolbar-right')
    <span class="text-muted font-weight-bold mr-4">{{ __('lang.doctor_list') }}</span>
@endsection
@section('toolbar-laft')
    <a href="{{ url(url()->previous()) }}" class="btn btn-light-primary font-weight-bolder btn-sm">{{ __('lang.back') }}</a>
@endsection

@section('master-content')
    <div class="row">

        <div class=" col-lg-12">
            <div class="card card-custom gutter-b">
                <div class="card-header">
                    <h3 class="card-title">{{ __('lang.doctor_list') }}</h3>
                </div>
                <div class="card-body p-2">
                    <x-token.filter :url="'master.doctortoken.filter'"></x-token.filter>
                    <x-token.doctor-list-data :users="$users" :nexturl="'master.doctortoken.next'"></x-token.doctor-list-data>



                </div>
            </div>
        </div>
    </div>


@endsection

