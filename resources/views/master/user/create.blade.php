@extends('master.layuot.mane')

@section('systemsetting')
    menu-item-open
@endsection
@section('user')
    menu-item-active
@endsection
@section('title')
    {{ __('lang.add_user') }}
@endsection
@section('toolbar-right')
    <span class="text-muted font-weight-bold mr-4">{{ __('lang.add_user') }}</span>
@endsection
@section('toolbar-laft')
    <a href="{{ url(url()->previous()) }}" class="btn btn-light-primary font-weight-bolder btn-sm">{{ __('lang.back') }}</a>
@endsection

@section('master-content')
    <div class="row">

        <div class=" col-lg-12">
            <div class="card card-custom gutter-b">
                <div class="card-header">
                    <h3 class="card-title">{{ __('lang.add_user') }}</h3>
                    <a href="{{ route('master.user.index') }}"
                        class=" btn btn-outline-primary btn-sm card-title">{{ __('lang.user_list') }}</a>
                </div>
                <div class="card-body p-2">

                    <form id="userstore" action="{{ route('master.user.store') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row mt-0">
                            <div class="col-lg-4">
                                <label>{{ __('lang.name') }}<span class="text-danger">*</span></label>
                                <input class="form-control " required name="name" type="text"
                                    value="{{ old('name') }}" placeholder="{{ __('lang.name') }}" />
                            </div>
                            <div class="col-lg-4">
                                <label>{{ __('lang.id_card_number') }}<span class="text-danger">*</span></label>
                                <input class="form-control " required name="id_card_number" type="text"
                                    value="{{ old('id_card_number') }}" placeholder="{{ __('lang.id_card_number') }}" />
                            </div>
                            <div class="col-lg-4">
                                <label>{{ __('lang.username') }}<span class="text-danger">*</span></label>
                                <input class="form-control " required name="username" type="text"
                                    value="{{ old('username') }}" placeholder="{{ __('lang.username') }}" />
                            </div>
                            <div class="col-lg-4">
                                <label>{{ __('lang.doctor') }} <span class="text-danger">*</span></label>
                                <select class="form-control text-capitalize" required name="doctor" id="doctor">
                                    <option value="no">{{ __('lang.no') }}</option>
                                    <option value="yes"> {{ __('lang.yes') }}</option>
                                </select>
                            </div>
                            <div class="col-lg-4">
                                <label>{{ __('lang.email') }}<span class="text-danger">*</span></label>
                                <input class="form-control " required name="email" type="text"
                                    value="{{ old('email') }}" placeholder="{{ __('lang.email') }}" />
                            </div>
                            <div class="col-lg-4">
                                <label>{{ __('lang.phone') }}<span class="text-danger">*</span></label>
                                <input class="form-control " required name="phone" type="text"
                                    value="{{ old('phone') }}" placeholder="{{ __('lang.phone') }}" />
                            </div>
                            <div class="col-lg-4">
                                <label>{{ __('lang.department') }}<span class="text-danger">*</span></label>
                                <select class="form-control text-capitalize currency" required name="department"
                                    id="department">
                                    <option value="">{{ __('lang.department') }}</option>
                                    @foreach ($departments as $data)
                                        <option value="{{ $data->id }}">{{ $data->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-4">
                                <label>{{ __('lang.service') }}<span class="text-danger">*</span></label>
                                <select class="form-control text-capitalize currency" required name="service"
                                    id="service">
                                    <option value="">{{ __('lang.service') }}</option>
                                </select>
                            </div>
                            <div class="col-lg-4" id="counterData">
                                <label>{{ __('lang.counter') }}<span class="text-danger">*</span></label>
                                <select class="form-control text-capitalize currency" name="counter" id="counter">
                                    <option value="">{{ __('lang.counter') }}</option>
                                </select>
                            </div>
                            <div class="col-lg-4 d-none" id="roomData">
                                <label>{{ __('lang.room') }}<span class="text-danger">*</span></label>
                                <select class="form-control text-capitalize currency" name="room" id="room">
                                    <option value="">{{ __('lang.room') }}</option>
                                    @foreach ($rooms as $data)
                                        <option value="{{ $data->id }}">{{ $data->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-4">
                                <label>{{ __('lang.gender') }}</label>
                                <select class="form-control text-capitalize " name="gender" id="gender">
                                    <option value="no">{{ __('lang.no') }}</option>
                                    @foreach (gender() as $k => $data)
                                        <option value="{{ $k }}">{{ $data }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-4">
                                <label>{{ __('lang.date_of_birth') }}</label>
                                <input class="form-control datepicker" name="date_of_birth" type="date"
                                    value="{{ old('date_of_birth') }}" placeholder="{{ __('lang.date_of_birth') }}" />
                            </div>
                            <div class="col-lg-4">
                                <label>{{ __('lang.image') }}<span class="text-danger">*</span></label>
                                <input class="form-control " required name="image" type="file"
                                    value="{{ old('image') }}" placeholder="{{ __('lang.image') }}" />
                            </div>
                            <div class="col-lg-4">
                                <label>{{ __('lang.note') }}</label>
                                <input class="form-control " name="note" type="text" value="{{ old('note') }}"
                                    placeholder="{{ __('lang.note') }}" />
                            </div>
                        </div>
                        <div class="card-footer ">
                            <div class="row justify-content-center col-12">
                                <div class="col-6">
                                    <button type="submit" class="btn btn-primary btn-block"
                                        id="save_data_btn">{{ __('lang.save') }}</button>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $(document).on('click', '#save_data_btn', function(e) {
            e.preventDefault();
            var form = $(this).closest('form');
            Swal.fire({
                title: "Are you sure?",
                text: "You want to save this file!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes, Save it!",
                cancelButtonText: "No, Cancel!",
                reverseButtons: true
            }).then(function(result) {
                if (result.value) {

                    var formData = new FormData(form[0]);
                    var url = form.attr('action');
                    $.ajax({
                        url: url,
                        type: 'POST',
                        data: formData,
                        dataType: 'json',
                        processData: false,
                        contentType: false,
                        success: function(response) {
                            if ($.isEmptyObject(response.error)) {
                                if (response.alert == 'error') {
                                    toastr.error(response.message);
                                } else {
                                    toastr.success(response.message);
                                    window.location.href = response.url;
                                }
                            } else {
                                $.each(response.error, function(key, value) {
                                    toastr.error(value);
                                });
                            }
                        },

                    });


                } else if (result.dismiss === "cancel") {
                    Swal.fire(
                        "Cancelled",
                        "Your imaginary file is safe :)",
                        "error"
                    )
                }
            });
        });
    </script>
    <script>
        $(document).on("change", "#doctor", function(e) {
            e.preventDefault();
            let doctordata = $(this).val();
            if (doctordata == 'yes') {
                $('#counterData').addClass('d-none');
                $('#roomData').removeClass('d-none');
            } else {
                $('#roomData').addClass('d-none');
                $('#counterData').removeClass('d-none');
            }
        });

        $("body").on("change", "#department", function() {
            let id = $(this).val();
            $.ajax({
                url: '{{ route('master.user.serviceget') }}',
                method: "POST",
                data: {
                    id: id
                },
                success: function(response) {
                    if ($.isEmptyObject(response.error)) {
                        if (response.alert == 'error') {
                            toastr.error(response.message);
                        } else {
                            $('#service').html(response)
                        }
                    } else {
                        $.each(response.error, function(key, value) {
                            toastr.error(value);
                        });
                    }
                },
            });
        });

        $("body").on("change", "#service", function() {
            let id = $(this).val();
            $.ajax({
                url: '{{ route('master.user.counterget') }}',
                method: "POST",
                data: {
                    id: id
                },
                success: function(response) {
                    if ($.isEmptyObject(response.error)) {
                        if (response.alert == 'error') {
                            toastr.error(response.message);
                        } else {
                            $('#counter').html(response)
                        }
                    } else {
                        $.each(response.error, function(key, value) {
                            toastr.error(value);
                        });
                    }
                },
            });
        });
    </script>
@endsection
