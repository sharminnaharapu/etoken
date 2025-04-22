@extends('master.layuot.mane')

@section('display')
    menu-item-open
@endsection
@section('counter_display')
    menu-item-active
@endsection
@section('title')
    {{ __('lang.counter_display') }}
@endsection
@section('toolbar-right')
    <span class="text-muted font-weight-bold mr-4">{{ __('lang.counter_display') }}</span>
@endsection
@section('toolbar-laft')
    <a href="{{ url(url()->previous()) }}" class="btn btn-light-primary font-weight-bolder btn-sm">{{ __('lang.back') }}</a>
@endsection

@section('master-content')
    <div class="row">

        <div class=" col-lg-12">
            <div class="card card-custom gutter-b">
                <div class="card-header">
                    <h3 class="card-title">{{ __('lang.counter_display') }}</h3>
                </div>
                <div class="card-body p-2">

                    <form action="{{ route('master.displayshow.counterfilter') }}" method="post">
                        @csrf
                        @php
                            $name = $_GET['name'] ?? '';
                            $status = $_GET['status'] ?? '';

                        @endphp
                        <div class="form-group row mt-0">
                            <div class="col-lg-4">
                                <label>{{ __('lang.name') }}</label>
                                <input class="form-control " name="name" type="text" value="{{ $name }}"
                                    placeholder="{{ __('lang.name') }}" />
                            </div>

                            <div class="col-lg-2">
                                <label>{{ __('lang.status') }}</label>
                                <select class="form-control text-capitalize " name="status" id="status">
                                    <option value="all" {{ $status == 'all' ? 'selected' : '' }}>
                                        {{ __('lang.all') }}
                                    </option>
                                    <option value="active" {{ $status == 'active' ? 'selected' : '' }}>
                                        {{ __('lang.active') }}
                                    </option>
                                    <option value="inactive" {{ $status == 'inactive' ? 'selected' : '' }}>
                                        {{ __('lang.inactive') }}
                                    </option>
                                </select>
                            </div>
                            <div class="col-lg-2 mt-7">
                                <button type="submit" class="btn btn-primary">{{ __('lang.search') }}</button>
                            </div>
                            <div class="col-lg-2 mt-7">
                                <a onclick='window.location.replace("{{ route(Route::currentRouteName()) }}")'
                                    class="btn btn-light-primary font-weight-bolder mb-0 card-title">{{ __('lang.refresh') }}</a>
                            </div>
                        </div>
                    </form>
                    <div class="table-scroll">
                        <table class="table">
                            <thead class="bg-primary-o-50">
                                <tr>
                                    <th class=" p-1 text-center border border-primary">{{ __('lang.no') }}</th>
                                    <th class=" p-1 text-center border border-primary">{{ __('lang.name') }}</th>
                                    <th class=" p-1 text-center border border-primary">{{ __('lang.deacription') }}</th>
                                    <th class=" p-1 text-center border border-primary">{{ __('lang.status') }}</th>
                                    <th class=" p-1 text-center border border-primary">{{ __('lang.action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($counters as $key => $data)
                                    <tr>
                                        <td class="text-center p-0 px-1 border border-primary">
                                            {{ $key + $counters->firstItem() }}</td>
                                            <td class="text-center p-0 px-1 border border-primary">{{ $data->name }}</td>
                                            <td class="text-center p-0 px-1 border border-primary">{{ $data->deacription }}</td>
                                        <td class="text-center p-0 px-1 border border-primary">
                                            <span class="label label-lg label-light-{{ badgeStatus($data->status) }} label-inline text-capitalize">{{ $data->status }}</span>
                                        </td>
                                        <td class="text-center p-0 px-1 border border-primary">
                                            <a href="" class="btn btn-success btn-sm">
                                                <i class="fas fa-tv"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $counters->withQueryString()->links('pagination.pagination', ['paginator' => $counters]) }}
                </div>
            </div>
        </div>
    </div>


@endsection
