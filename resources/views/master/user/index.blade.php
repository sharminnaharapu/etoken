@extends('master.layuot.mane')

@section('systemsetting')
    menu-item-open
@endsection
@section('user')
    menu-item-active
@endsection
@section('title')
    {{ __('lang.user') }}
@endsection
@section('toolbar-right')
    <span class="text-muted font-weight-bold mr-4">{{ __('lang.user') }}</span>
@endsection
@section('toolbar-laft')
    <a href="{{ url(url()->previous()) }}" class="btn btn-light-primary font-weight-bolder btn-sm">{{ __('lang.back') }}</a>
@endsection

@section('master-content')
    <div class="row">

        <div class=" col-lg-12">
            <div class="card card-custom gutter-b">
                <div class="card-header">
                    <h3 class="card-title">{{ __('lang.user_list') }}</h3>
                    <a href="{{ route('master.user.create') }}" class=" btn btn-outline-primary btn-sm card-title">{{ __('lang.add_user') }}</a>
                </div>
                <div class="card-body p-2">

                    <form action="{{ route('master.user.filter') }}" method="post">
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
                                    <th class=" p-1 text-center border border-primary">{{ __('lang.image') }}</th>
                                    <th class=" p-1 text-center border border-primary">{{ __('lang.name') }}</th>
                                    <th class=" p-1 text-center border border-primary">{{ __('lang.id_card_number') }}</th>
                                    <th class=" p-1 text-center border border-primary">{{ __('lang.employee_id') }}</th>
                                    <th class=" p-1 text-center border border-primary">{{ __('lang.username') }}</th>
                                    <th class=" p-1 text-center border border-primary">{{ __('lang.doctor') }}</th>
                                    <th class=" p-1 text-center border border-primary">{{ __('lang.email') }}</th>
                                    <th class=" p-1 text-center border border-primary">{{ __('lang.phone') }}</th>
                                    <th class=" p-1 text-center border border-primary">{{ __('lang.department') }}</th>
                                    <th class=" p-1 text-center border border-primary">{{ __('lang.service') }}</th>
                                    <th class=" p-1 text-center border border-primary">{{ __('lang.counter') }}</th>
                                    <th class=" p-1 text-center border border-primary">{{ __('lang.room') }}</th>
                                    <th class=" p-1 text-center border border-primary">{{ __('lang.note') }}</th>
                                    <th class=" p-1 text-center border border-primary">{{ __('lang.status') }}</th>
                                    <th class=" p-1 text-center border border-primary">{{ __('lang.action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $key => $data)
                                    <tr>
                                        <td class="text-center p-0 px-1 border border-primary">{{ $key + $users->firstItem() }}</td>
                                        <td class="text-center p-0 px-1 border border-primary">
                                            <div class="symbol symbol-35">
                                                <div class="symbol-label">
                                                    <img alt="Pic" style="border-radius: 5px" class="w-35px"
                                                        src="{{ asset('image/profile/' . $data->image) }}" />
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center p-0 px-1 border border-primary">{{ $data->name }}</td>
                                        <td class="text-center p-0 px-1 border border-primary">{{ $data->id_card_number }}</td>
                                        <td class="text-center p-0 px-1 border border-primary">{{ $data->employee_id }}</td>
                                        <td class="text-center p-0 px-1 border border-primary">{{ $data->username }}</td>
                                        <td class="text-center p-0 px-1 border border-primary">{{ $data->doctor }}</td>
                                        <td class="text-center p-0 px-1 border border-primary">{{ $data->email }}</td>
                                        <td class="text-center p-0 px-1 border border-primary">{{ $data->phone }}</td>
                                        <td class="text-center p-0 px-1 border border-primary">{{ $data->department->name??'' }}</td>
                                        <td class="text-center p-0 px-1 border border-primary">{{ $data->service->name??'' }}</td>
                                        <td class="text-center p-0 px-1 border border-primary">{{ $data->counter->name??'' }}</td>
                                        <td class="text-center p-0 px-1 border border-primary">{{ $data->room->name??'' }}</td>
                                        <td class="text-center p-0 px-1 border border-primary">{{ $data->note }}</td>

                                        <td class="text-center p-0 px-1 border border-primary">
                                            <span
                                                class="label label-lg label-light-{{ badgeStatus($data->isban) }} label-inline text-capitalize">{{ $data->isban }}
                                                </span0>
                                        </td>
                                        <td class="text-center p-0 px-1 border border-primary">
                                            <div class="dropdown dropdown-inline">
                                                <span
                                                    class="btn btn-light-primary btn-sm font-weight-bolder dropdown-toggle"
                                                    data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">{{ __('lang.action') }}</span>
                                                <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                                    <ul class="navi navi-hover">
                                                        <li class="navi-item">
                                                            @if ($data->isban == 'active')
                                                                <a href="{{ route('master.user.status', $data->id) }}"
                                                                    class="navi-link ">
                                                                    <span class="navi-icon">
                                                                        <i class=" fa fa-arrow-down"></i>
                                                                    </span>
                                                                    <span
                                                                        class="navi-text">{{ __('lang.inactive') }}</span>
                                                                </a>
                                                            @elseif ($data->isban == 'inactive')
                                                                <a href="{{ route('master.user.status', $data->id) }}"
                                                                    class="navi-link">
                                                                    <span class="navi-icon">
                                                                        <i class=" fa fa-arrow-up"></i>
                                                                    </span>
                                                                    <span class="navi-text">
                                                                        {{ __('lang.active') }}</span>
                                                                </a>
                                                            @endif
                                                        </li>
                                                        {{-- <li class="navi-item">
                                                            <button type="button" title="{{ __('lang.view') }}"
                                                                class="navi-link btn w-100" data-toggle="modal"
                                                                data-target="#viewModal"
                                                                onclick="viewModalShow(`{{ route('master.service.show', $data->id) }}`)">
                                                                <span class="navi-icon">
                                                                    <i class=" fa fa-eye"></i> {{ __('lang.view') }}
                                                                </span>
                                                            </button>
                                                        </li> --}}
                                                        <li class="navi-item">
                                                            <a href="{{ route('master.user.edit', $data->id) }}"title="{{ __('lang.edit') }}"
                                                                class="navi-link btn w-100">
                                                                <span class="navi-icon">
                                                                    <i class=" fa fa-edit"></i> {{ __('lang.edit') }}
                                                                </span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $users->withQueryString()->links('pagination.pagination', ['paginator' => $users]) }}
                </div>
            </div>
        </div>
    </div>


@endsection


