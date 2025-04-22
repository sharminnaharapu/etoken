@extends('master.layuot.mane')

@section('systemsetting')
    menu-item-open
@endsection
@section('service')
    menu-item-active
@endsection
@section('title')
    {{ __('lang.service') }}
@endsection
@section('toolbar-right')
    <span class="text-muted font-weight-bold mr-4">{{ __('lang.service') }}</span>
@endsection
@section('toolbar-laft')
    <a href="{{ url(url()->previous()) }}" class="btn btn-light-primary font-weight-bolder btn-sm">{{ __('lang.back') }}</a>
@endsection

@section('master-content')
    <div class="row">
        <div class="col-lg-4">
            <div class="card card-custom gutter-b">
                <div class="card-header px-2">
                    <h3 class="card-title">{{ __('lang.add_service') }}</h3>
                </div>
                <form class="form" action="{{ route('master.service.store') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="card-body py-2 px-3">
                        <div class="form-group row mb-0">
                            <div class="col-lg-12 mt-3 ">
                                <label>{{ __('lang.department') }}<span class="text-danger">*</span></label>
                                <select class="form-control text-capitalize currency" name="department" required>
                                    <option value="">{{ __('lang.department') }}</option>
                                    @foreach ($departments as $data)
                                        <option value="{{ $data->id }}">{{ $data->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-12 mt-3 ">
                                <label>{{ __('lang.counter') }}<span class="text-danger">*</span></label>
                                <select class="form-control text-capitalize multipleOption" name="counter[]" multiple
                                    required>
                                    @foreach ($counters as $data)
                                        <option value="{{ $data->id }}">{{ $data->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-12 ">
                                <label>{{ __('lang.name') }}<span class="text-danger">*</span></label>
                                <input type="text" name="name"
                                    class="form-control @error('name') is-invalid @enderror"
                                    placeholder="{{ __('lang.name') }}" value="{{ old('name') }}" required />
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-lg-12 ">
                                <label>{{ __('lang.image') }}<span class="text-danger">*</span></label>
                                <input type="file" name="image"
                                    class="form-control @error('image') is-invalid @enderror"
                                    placeholder="{{ __('lang.image') }}" value="{{ old('image') }}" required />
                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-lg-12 ">
                                <label>{{ __('lang.deacription') }}</label>
                                <input type="text" name="deacription"
                                    class="form-control @error('deacription') is-invalid @enderror"
                                    placeholder="{{ __('lang.deacription') }}" value="{{ old('deacription') }}" />
                                @error('deacription')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-lg-12 mt-3 ">
                                <label>{{ __('lang.status') }}<span class="text-danger">*</span></label>
                                <div class="radio-inline">
                                    <label class="radio ">
                                        <input type="radio" checked="checked" name="status" value="active" />
                                        <span></span>
                                        {{ __('lang.active') }}
                                    </label>
                                    <label class="radio">
                                        <input type="radio" name="status" value="inactive" />
                                        <span></span>
                                        {{ __('lang.inactive') }}
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ">
                        <div class="row justify-content-center col-12">
                            <div class="col-6">
                                <button type="submit" class="btn btn-primary btn-block ">{{ __('lang.save') }}</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class=" col-lg-8">
            <div class="card card-custom gutter-b">
                <div class="card-header">
                    <h3 class="card-title">{{ __('lang.service_list') }}</h3>
                </div>
                <div class="card-body p-2">

                    <form action="{{ route('master.service.filter') }}" method="post">
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
                                    <th class=" p-1 text-center border border-primary">{{ __('lang.department') }}</th>
                                    <th class=" p-1 text-center border border-primary">{{ __('lang.counter') }}</th>
                                    <th class=" p-1 text-center border border-primary">{{ __('lang.deacription') }}</th>
                                    <th class=" p-1 text-center border border-primary">{{ __('lang.status') }}</th>
                                    <th class=" p-1 text-center border border-primary">{{ __('lang.action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($services as $key => $data)
                                    <tr>
                                        <td class="text-center p-0 px-1 border border-primary">
                                            {{ $key + $services->firstItem() }}</td>
                                        <td class="text-center p-0 px-1 border border-primary">
                                            <div class="symbol symbol-35">
                                                <div class="symbol-label">
                                                    <img alt="Pic" style="border-radius: 5px" class="w-35px"
                                                        src="{{ asset('image/service/' . $data->image) }}" />
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center p-0 px-1 border border-primary">{{ $data->name }}</td>
                                        <td class="text-center p-0 px-1 border border-primary">{{ $data->department->name }}</td>
                                        <td class="text-center p-0 px-1 border border-primary">
                                            @foreach ($data->counter as $data2)
                                            <span class="badge badge-pill badge-primary text-capitalize mt-1">
                                                {{ $data2->counter->name }}
                                            </span>
                                            @endforeach
                                        </td>
                                        <td class="text-center p-0 px-1 border border-primary">{{ $data->deacription }}</td>

                                        <td class="text-center p-0 px-1 border border-primary">
                                            <span
                                                class="label label-lg label-light-{{ badgeStatus($data->status) }} label-inline text-capitalize">{{ $data->status }}
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
                                                            @if ($data->status == 'active')
                                                                <a href="{{ route('master.service.status', $data->id) }}"
                                                                    class="navi-link ">
                                                                    <span class="navi-icon">
                                                                        <i class=" fa fa-arrow-down"></i>
                                                                    </span>
                                                                    <span
                                                                        class="navi-text">{{ __('lang.inactive') }}</span>
                                                                </a>
                                                            @elseif ($data->status == 'inactive')
                                                                <a href="{{ route('master.service.status', $data->id) }}"
                                                                    class="navi-link">
                                                                    <span class="navi-icon">
                                                                        <i class=" fa fa-arrow-up"></i>
                                                                    </span>
                                                                    <span class="navi-text">
                                                                        {{ __('lang.active') }}</span>
                                                                </a>
                                                            @endif
                                                        </li>
                                                        <li class="navi-item">
                                                            <button type="button" title="{{ __('lang.view') }}"
                                                                class="navi-link btn w-100" data-toggle="modal"
                                                                data-target="#viewModal"
                                                                onclick="viewModalShow(`{{ route('master.service.show', $data->id) }}`)">
                                                                <span class="navi-icon">
                                                                    <i class=" fa fa-eye"></i> {{ __('lang.view') }}
                                                                </span>
                                                            </button>
                                                        </li>
                                                        <li class="navi-item">
                                                            <a href="{{ route('master.service.edit', $data->id) }}"title="{{ __('lang.edit') }}"
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
                    {{ $services->withQueryString()->links('pagination.pagination', ['paginator' => $services]) }}
                </div>
            </div>
        </div>
    </div>

   
@endsection

@section('js')
    <script>
        $(document).on('click', '.edit_btn', function() {
            var url = $(this).data("url");
            $.ajax({
                url: url,
                dataType: 'JSON',
                data: {},
                type: "POST",
                success: function(data) {
                    $("#modal-content").append(data.html);
                }
            });
        });
    </script>
@endsection
