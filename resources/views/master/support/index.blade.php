@extends('master.layuot.mane')
@section('systemsetting-class')
    menu-item-open
@endsection
@section('support-class')
    menu-item-active
@endsection
@section('title')
    {{ __('lang.support') }}
@endsection
@section('toolbar-right')
    <span class="text-muted font-weight-bold mr-4">{{ __('lang.support') }}</span>
@endsection
@section('toolbar-laft')
    <a href="{{ url(url()->previous()) }}" class="btn btn-light-primary font-weight-bolder btn-sm"> {{ __('lang.back') }} </a>
@endsection

@section('master-content')
    <div class="row">
        <div class="col-lg-4">
            <div class="card card-custom gutter-b">
                <div class="card-header px-2">
                    <h3 class="card-title">{{ __('lang.add_support') }}</h3>
                </div>
                <form class="form" action="{{ route('master.support.store') }}" method="POST">
                    @csrf
                    <div class="card-body py-2 px-3">
                        <div class="form-group row mb-0">
                            <div class="col-lg-12">
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
                            <div class="col-lg-12 mt-3">
                                <label>{{ __('lang.contact') }}<span class="text-danger">*</span></label>
                                <input type="text" name="contact"
                                    class="form-control @error('contact') is-invalid @enderror"
                                    placeholder="{{ __('lang.contact') }}" value="{{ old('contact') }}" required />
                                @error('contact')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-lg-12 mt-3">
                                <label>{{ __('lang.extension_number') }}<span class="text-danger">*</span></label>
                                <input type="text" name="extension"
                                    class="form-control @error('extension') is-invalid @enderror"
                                    placeholder="{{ __('lang.extension_number') }}" value="{{ old('extension') }}"
                                    required />
                                @error('extension')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-lg-12 mt-3">
                                <label>{{ __('lang.landline_number') }}<span class="text-danger">*</span></label>
                                <input type="text" name="landline"
                                    class="form-control @error('landline') is-invalid @enderror"
                                    placeholder="{{ __('lang.landline_number') }}" value="{{ old('landline') }}"
                                    required />
                                @error('landline')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-lg-12 mt-3">
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
                    <h3 class="card-title">{{ __('lang.support_list') }}</h3>
                </div>
                <div class="card-body p-2">

                    <form action="{{ route('master.support.filter') }}" method="post">
                        @csrf
                        @php
                            if (!empty($_GET['name'])) {
                                $name = $_GET['name'];
                            } else {
                                $name = '';
                            }
                            if (!empty($_GET['status'])) {
                                $status = $_GET['status'];
                            } else {
                                $status = '';
                            }
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
                            <div class="col-lg-1 px-0 mt-7">
                                <div class="dropdown dropdown-inline">
                                    <button type="button" class="btn btn-light-primary font-weight-bolder dropdown-toggle"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        {{ __('lang.export') }}
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                        @php
                                            $route = Route::currentRouteName();
                                            $url = request()->fullUrl();
                                            $queryString = parse_url($url, PHP_URL_QUERY);
                                            parse_str($queryString, $queryParameters);
                                        @endphp
                                        <ul class="navi flex-column navi-hover py-2">
                                            <li class="navi-item">
                                                <a href="{{ route('master.support.excel', $queryString) }}"
                                                    class="navi-link">
                                                    <span class="navi-icon">
                                                        <i class="la la-file-excel-o"></i>
                                                    </span>
                                                    <span class="navi-text">{{ __('lang.excel') }}</span>
                                                </a>
                                            </li>
                                            <li class="navi-item">
                                                <a href="{{ route('master.support.pdf', $queryString) }}"
                                                    class="navi-link">
                                                    <span class="navi-icon">
                                                        <i class="la la-file-pdf-o"></i>
                                                    </span>
                                                    <span class="navi-text">{{ __('lang.pdf') }}</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!--begin: Datatable-->
                    <div class="table-scroll">
                        <table class="table">
                            <thead class="bg-primary-o-50">
                                <tr>
                                    <th class=" p-1 text-center border border-primary">{{ __('lang.no') }}</th>
                                    <th class=" p-1 text-center border border-primary">{{ __('lang.name') }}</th>
                                    <th class=" p-1 text-center border border-primary">{{ __('lang.contact') }}</th>
                                    <th class=" p-1 text-center border border-primary">{{ __('lang.extension_number') }}
                                    </th>
                                    <th class=" p-1 text-center border border-primary">{{ __('lang.landline_number') }}
                                    </th>
                                    <th class=" p-1 text-center border border-primary">{{ __('lang.status') }}</th>
                                    <th class=" p-1 text-center border border-primary">{{ __('lang.action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($supports as $key => $data)
                                    <tr>
                                        <td class="text-center p-0 px-1 border border-primary">
                                            {{ $key + $supports->firstItem() }}</td>
                                        <td class="text-center p-0 px-1 border border-primary"
                                            title="{{ __('lang.name') }}">{{ $data->name }}</td>
                                        <td class="text-center p-0 px-1 border border-primary"
                                            title="{{ __('lang.contact') }}">{{ $data->contact }}</td>
                                        <td class="text-center p-0 px-1 border border-primary"
                                            title="{{ __('lang.extension_number') }}">{{ $data->extension }}</td>
                                        <td class="text-center p-0 px-1 border border-primary"
                                            title="{{ __('lang.landline_number') }}">{{ $data->landline }}</td>
                                        <td class="text-center p-0 px-1 border border-primary"
                                            title="{{ __('lang.status') }}">
                                            <span
                                                class="label label-lg label-light-{{ badgeStatus($data->status) }} label-inline text-capitalize">{{ $data->status }}</span>
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
                                                                <a href="{{ route('master.support.status', $data->id) }}"
                                                                    title="{{ __('lang.status_inactive') }}"
                                                                    class="navi-link ">
                                                                    <span class="navi-icon">
                                                                        <i class=" fa fa-arrow-down"></i>
                                                                    </span>
                                                                    <span class="navi-text">
                                                                        {{ __('lang.inactive') }}</span>
                                                                </a>
                                                            @elseif ($data->status == 'inactive')
                                                                <a href="{{ route('master.support.status', $data->id) }}"
                                                                    title="{{ __('lang.status_active') }}"
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
                                                            <button type="button"
                                                                data-url="{{ route('master.support.edit', $data->id) }}"
                                                                title="{{ __('lang.edit') }}"
                                                                class="navi-link btn edit_unittype w-100"
                                                                data-toggle="modal" data-target="#edit_unittype">
                                                                <span class="navi-icon">
                                                                    <i class=" fa fa-edit"></i> {{ __('lang.edit') }}
                                                                </span>
                                                            </button>
                                                        </li>

                                                        {{-- <li class="navi-item">
                                                            <a href="{{ route('master.unittype.delete', $unittype->id) }}"
                                                                title="{{ __('lang.delete') }}" class="navi-link"
                                                                id="delete">
                                                                <span class="navi-icon">
                                                                    <i class=" fa fa-trash"></i>
                                                                </span>
                                                                <span class="navi-text">{{ __('lang.delete') }}</span>
                                                            </a>
                                                        </li> --}}
                                                    </ul>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $supports->withQueryString()->links('pagination.pagination', ['paginator' => $supports]) }}
                </div>
            </div>
        </div>
    </div>

    <!-- ================ Modal========================================= -->

    <!-- Modal -->
    <div class="modal fade" id="edit_unittype" data-backdrop="static" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" id="modal-content">

            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(document).on('click', '.edit_unittype', function() {
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
