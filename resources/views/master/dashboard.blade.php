@extends('master.layuot.mane')
@section('dashbord-class')
    menu-item-active
@endsection
@section('title')
    Dashbord
@endsection
@section('toolbar-right')
    <span class="text-muted font-weight-bold mr-4">Master</span>
@endsection

@section('toolbar-laft')

    <a href="{{ route('master.dashboard.index') }}" class="btn btn-sm btn-light font-weight-bold mr-2"
        id="kt_dashboard_daterangepicker" data-toggle="tooltip" title="Select dashboard daterange" data-placement="left">
        <span class="text-muted font-size-base font-weight-bold mr-2" id="kt_dashboard_daterangepicker_title">Today</span>
        <span class="text-primary font-size-base font-weight-bolder" id="">{{ date('F j') }}</span>
    </a>
    <!--end::Daterange-->
@endsection

@section('master-content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card card-custom">
                {{-- <x-support :supports="$supports"> </x-support> --}}
                {{-- <div class="card-body p-2"
                    style="background-image:url({{ asset('image/modulebanner/' . $modulebanner->master) }});background-size: 100% 100%; background-repeat: no-repeat;">
                    <div class="col-lg-12 col-md-12 p-0 d-flex h-500px">
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
@endsection
@section('footer')
    <x-footer />
@endsection
