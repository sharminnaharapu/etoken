@extends('master.layuot.mane')
@section('marketcomponent-class')
    menu-item-open
@endsection
@section('sendsms-class')
    menu-item-active
@endsection
@section('title')
    {{ __('lang.send_sms_list') }}
@endsection
@section('toolbar-right')
    <span class="text-muted font-weight-bold mr-4">{{ __('lang.send_sms_list') }}</span>
@endsection
@section('toolbar-laft')
    <a href="{{ url(url()->previous()) }}" class="btn btn-light-primary font-weight-bolder btn-sm">{{ __('lang.back') }}</a>
@endsection

@section('master-content')
    <div class="row">
        <div class="col-lg-4">
            <div class="card card-custom gutter-b">
                <div class="card-header px-2">
                    <h3 class="card-title">{{ __('lang.send_sms') }}</h3>
                </div>
                <form class="form" action="{{ route('master.sendsms.store') }}" method="POST">
                    @csrf
                    <div class="card-body py-2 px-3">
                        <div class="form-group row mb-0">
                            <div class="row justify-content-center col-12">
                                <div class="col-6">
                                    <button type="button" data-url="{{ route('master.sendsms.mobilenumber') }}" class="btn btn-primary btn-block edit_medicine_dose" data-toggle="modal"
                                    data-target="#edit_medicine_dose">{{ __('lang.mobile_numbers') }}</button>
                                </div>
                            </div>
                            <div class="col-lg-12 mt-3">
                                <label>{{ __('lang.mobile_numbers') }}<span class="text-danger">*</span></label>
                                {{-- <div id="mobile_numbers"> --}}
                                    <select name="mobile_number_id[]" class="form-control currency mobile_numbers" id="mobile_numbers" multiple>
                                        <option value="" disabled>{{ __('lang.select_mobile_number') }}</option>
                                    </select>
                                {{-- </div> --}}


                            </div>
                            <div class="col-lg-12 mt-3">
                                <label>{{ __('lang.message') }}</label>
                                <textarea name="message" class=" form-control @error('message') is-invalid @enderror" cols="30" rows="3" required
                                    placeholder="{{ __('lang.message') }}"></textarea>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                                @enderror
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
                    <h3 class="card-title">{{ __('lang.send_sms_list') }}</h3>
                </div>
                <div class="card-body p-2">

                    <form action="{{ route('master.sendsms.filter') }}" method="post">
                        @csrf
                        @php
                            if (!empty($_GET['mobile_number'])) {
                                $mobile_number = $_GET['mobile_number'];
                            } else {
                                $mobile_number = '';
                            }
                        @endphp
                        <div class="form-group row mt-0">
                            <div class="col-lg-4">
                                <label>{{ __('lang.mobile_number') }}</label>
                                <input class="form-control " name="mobile_number" type="text"
                                    value="{{ $mobile_number }}" placeholder="{{ __('lang.mobile_number') }}" />
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
                    <!--begin: Datatable-->
                    <div class="table-scroll">
                        <table class="table min-h-50px">
                            <thead class=" bg-primary-o-50">
                                <tr>
                                    <th class="p-1 text-center border border-primary">{{ __('lang.no') }}</th>
                                    <th class="p-1 text-center border border-primary">{{ __('lang.number') }}</th>
                                    <th class="p-1 text-center border border-primary">{{ __('lang.message') }}</th>
                                    <th class="p-1 text-center border border-primary">{{ __('lang.action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($send_sms as $data)
                                    <tr>
                                        <td class="p-0 px-1 text-center border border-primary">{{ $loop->index + 1 }}</td>
                                        <td class="p-0 px-1 text-center border border-primary">
                                            {{ $data->mobileNumber->mobile_number }}</td>
                                        <td class="p-0 px-1 text-center border border-primary">
                                            {{ $data->message }}
                                        </td>
                                        <td class="p-0 px-1 text-center border border-primary">
                                            <div class="dropdown dropdown-inline">
                                                <span
                                                    class="btn btn-light-primary btn-sm font-weight-bolder dropdown-toggle"
                                                    data-toggle="dropdown" title="Print" aria-haspopup="true"
                                                    aria-expanded="false">{{ __('lang.action') }}</span>
                                                <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                                    <ul class="navi navi-hover">
                                                        <li class="navi-item">
                                                            <button type="button"
                                                                data-url="{{ route('master.sendsms.edit', $data->id) }}"
                                                                title="{{ __('lang.edit') }}"
                                                                class="navi-link btn edit_medicine_dose" data-toggle="modal"
                                                                data-target="#edit_medicine_dose">
                                                                <span class="navi-icon">
                                                                    <i class=" fa fa-edit"></i>
                                                                </span>
                                                                <span class="navi-text">{{ __('lang.edit') }}</span>
                                                            </button>
                                                        </li>
                                                        <li class="navi-item">
                                                            <a href="{{ route('master.sendsms.delete', $data->id) }}"
                                                                title="{{ __('lang.delete') }}" class="navi-link"
                                                                id="delete">
                                                                <span class="navi-icon">
                                                                    <i class=" fa fa-trash"></i>
                                                                </span>
                                                                <span class="navi-text">{{ __('lang.delete') }}</span>
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
                </div>
            </div>
        </div>
        {{-- @endisset --}}
    </div>




    <!-- ================ Modal========================================= -->



    <!-- Modal -->
    <div class="modal fade" id="edit_medicine_dose" data-backdrop="static" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content" id="modal-content">

            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(document).on('click', '.edit_medicine_dose', function() {
            var url = $(this).data("url");
            $.ajax({
                url: url,
                dataType: 'JSON',
                data: {},
                type: "get",
                success: function(data) {
                    $("#modal-content").html(data.html);
                }
            });
        });
    </script>


<script>
        // $(document).ready(function() {
            // When "Select All" checkbox changes
            // $('.select_all').change(function() {
            $(document).on('change', '.select_all', function() {
                $('input[name="selected_mobile_numbers[]"]').prop('checked', $(this).prop('checked'));
            });

            // When any individual checkbox changes
            // $('input[name="selected_mobile_numbers[]"]').change(function() {
            $(document).on('change', 'input[name="selected_mobile_numbers[]"]', function() {
                if (!$(this).prop('checked')) {
                    $('.select_all').prop('checked', false);
                }
            });
        // });

        $(document).on('click', '#mobile_numbers_form', function() {
            var selectedNumbers = [];
            var html = '';

                $('input[name="selected_mobile_numbers[]"]:checked').each(function() {
                    var text = $(this).data('text');
                    var value = $(this).val();
                    console.log(value);
                    html += '<option value="'+ value +'" selected> '+ text +' </option>';
                });

                $('#mobile_numbers').html(html);
                $('#edit_medicine_dose').modal('hide');
        });
    </script>


@endsection
