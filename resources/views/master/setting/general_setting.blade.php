@extends('master.layuot.mane')
@section('systemsetting')
    menu-item-open
@endsection
@section('generalsetting-class')
    menu-item-active
@endsection
@section('title')
    {{ __('lang.general_setting') }}
@endsection
@section('toolbar-right')
    <span class="text-muted font-weight-bold mr-4"> {{ __('lang.general_setting') }} </span>
@endsection
@section('toolbar-laft')
    <a href="{{ url(url()->previous()) }}" class="btn btn-light-primary font-weight-bolder btn-sm">Back</a>
@endsection

@section('master-content')
    {{-- @isset(auth()->user()->role->permission['permission']['generalsetting']['list']) --}}
        <div class="d-flex flex-row ">
            <!--begin::Aside-->
            <div class="flex-column offcanvas-mobile w-175px w-xl-200px" id="kt_profile_aside">
                <div class="card card-custom gutter-b overflow-hidden p-2">
                    <div class="card-body p-0">
                        <form action="{{ route('master.setting.mainLogoUpdate') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <label>{{ __('lang.main_logo') }}<small>{{ __('lang.250x50') }}</small>:</label><br>
                            <input id="manelogo" class="@error('manelogo') is-invalid @enderror" type="file"
                                name="manelogo">
                            @error('manelogo')
                                <span class="invalid-feedback" role="alert">
                                    <strong class="text-danger">{{ $message }}</strong>
                                </span>
                            @enderror
                            <div class="manelogo ml-2 mt-2"></div>
                            {{-- @isset(auth()->user()->role->permission['permission']['generalsetting']['edit']) --}}
                                <button type="submit"
                                    class="btn my-3 btn-primary btn-sm btn-block font-weight-bolder mr-2 px-5">{{ __('lang.update_main_logo') }}</button>
                            {{-- @endisset --}}
                        </form>
                        <div class="row justify-content-center m-2">
                            <h5 class="mb-2">{{ __('lang.old_main_logo') }}</h5>
                            <img width="90%" src="{{ asset('image/logo/' . $generalSetting->mane_logo) }}" />
                        </div>
                    </div>
                </div>
                <div class="card card-custom gutter-b overflow-hidden p-2">
                    <div class="card-body p-0">
                        <form action="{{ route('master.setting.fabLogoUpdate') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <label>{{ __('lang.small_logo') }}<small>{{ __('lang.50x50') }}</small>:</label><br>
                            <input id="fablogo" class="@error('fablogo') is-invalid @enderror" type="file" name="fablogo">
                            @error('fablogo')
                                <span class="invalid-feedback" role="alert">
                                    <strong class="text-danger">{{ $message }}</strong>
                                </span>
                            @enderror
                            <div class="fablogo ml-2 mt-2"></div>
                            {{-- @isset(auth()->user()->role->permission['permission']['generalsetting']['edit']) --}}
                                <button type="submit"
                                    class="btn my-3 btn-primary btn-sm btn-block font-weight-bolder mr-2 px-5">{{ __('lang.update_small_logo') }}</button>
                            {{-- @endisset --}}
                        </form>
                        <div class="row justify-content-center m-2">
                            <h5 class="mb-2">{{ __('lang.old_small_logo') }}</h5>
                            <img width="50%" height="50px" src="{{ asset('image/logo/' . $generalSetting->fab_logo) }}" />
                        </div>
                    </div>
                </div>
                <div class="card card-custom gutter-b overflow-hidden p-2">
                    <div class="card-body p-0">
                        <form action="{{ route('master.setting.printLogoUpdate') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <label>{{ __('lang.print_logo') }}<small>{{ __('lang.250x50') }}</small>:</label><br>
                            <input id="printlogo" class="@error('printlogo') is-invalid @enderror" type="file"
                                name="printlogo">
                            @error('printlogo')
                                <span class="invalid-feedback" role="alert">
                                    <strong class="text-danger">{{ $message }}</strong>
                                </span>
                            @enderror
                            <div class="printlogo ml-2 mt-2"></div>
                            {{-- @isset(auth()->user()->role->permission['permission']['generalsetting']['edit']) --}}
                                <button type="submit"
                                    class="btn my-3 btn-primary btn-sm btn-block font-weight-bolder mr-2 px-5">{{ __('lang.update_print_logo') }}</button>
                            {{-- @endisset --}}
                        </form>
                        <div class="row justify-content-center m-2">
                            <h5 class="mb-2">{{ __('lang.old_print_logo') }}</h5>
                            <img width="90%" src="{{ asset('image/logo/' . $generalSetting->print_logo) }}" />
                        </div>
                    </div>
                </div>
                <div class="card card-custom gutter-b overflow-hidden p-2">
                    <div class="card-body p-0">
                        <form action="{{ route('master.setting.stampUpdate') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <label>{{ __('lang.stamp') }}<small>{{ __('lang.250x50') }}</small>:</label><br>
                            <input type="file" id="stampupload" name="stamp" placeholder="{{ __('lang.stamp') }}">
                            @error('stamp')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                            <div class="stampupload ml-2 mt-2"></div>
                            {{-- @isset(auth()->user()->role->permission['permission']['generalsetting']['edit']) --}}
                                <button type="submit"
                                    class="btn my-3 btn-primary btn-sm btn-block font-weight-bolder mr-2 px-5">{{ __('lang.update_stamp') }}</button>
                            {{-- @endisset --}}
                        </form>
                        <div class="row justify-content-center m-2">
                            <h5 class="mb-2">{{ __('lang.old_stamp') }}</h5>
                            <img width="90%" src="{{ asset('image/stamp/' . $generalSetting->stamp) }}" />
                        </div>
                    </div>
                </div>
            </div>
            <!--end::Aside-->
            <!--begin::Layout-->
            <div class="flex-row-fluid ml-lg-8">
                <!--begin::Card-->
                <div class="card card-custom card-stretch gutter-b">
                    <div class="card-header">
                        <h4 class=" card-title">{{ __('lang.general_setting') }}</h4>
                    </div>
                    <form class="form" action="{{ route('master.setting.update') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="card-body py-1 px-2">
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label>{{ __('lang.site_name') }}<span class="text-danger">*</span></label>
                                    <input type="text" name="name"
                                        class="form-control @error('name') is-invalid @enderror"
                                        value="{{ $generalSetting->name }}" placeholder="Enter Site name" />
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong class="text-danger">{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-lg-6">
                                    <label>{{ __('lang.email') }} <span class="text-danger">*</span></label>
                                    <input type="email" name="email"
                                        class="form-control @error('email') is-invalid @enderror"
                                        value="{{ $generalSetting->email }}" placeholder="Enter Your Email" />
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong class="text-danger">{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label> {{ __('lang.address') }} <span class="text-danger">*</span></label>
                                    <input type="text" name="address"
                                        class="form-control @error('address') is-invalid @enderror"
                                        value="{{ $generalSetting->address }}" placeholder="Enter Your Address" />
                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong class="text-danger">{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-lg-6">
                                    <label>{{ __('lang.title') }} <span class="text-danger">*</span></label>
                                    <input type="text" name="title"
                                        class="form-control @error('title') is-invalid @enderror"
                                        value="{{ $generalSetting->title }}" placeholder="Enter Your Title" />
                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong class="text-danger">{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label>{{ __('lang.phone_number') }}<span class="text-danger">*</span> </label>
                                    <input type="text" name="phone"
                                        class="form-control @error('phone') is-invalid @enderror"
                                        value="{{ $generalSetting->phone }}" placeholder="Enter Your Phone number" />
                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong class="text-danger">{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-lg-6">
                                    <label>{{ __('lang.country') }} <span class="text-danger">*</span></label>
                                    <select class="form-control select2 currency @error('country') is-invalid @enderror"
                                        name="country">
                                        <option label="Select Currency">{{ __('lang.select_one') }}</option>
                                        @foreach (country() as $key => $country)
                                            <option value="{{ $country }}"
                                                {{ $country == $generalSetting->country ? 'selected' : '' }}>
                                                {{ $country }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('country')
                                        <span class="invalid-feedback" role="alert">
                                            <strong class="text-danger">{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                            </div>
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label>{{ __('lang.currency') }} <span class="text-danger">*</span> </label>
                                    <select class="form-control select2 currency @error('currency') is-invalid @enderror"
                                        id="currency" name="currency">
                                        <option label="Select Currency">{{ __('lang.select_one') }}</option>
                                        @foreach (currency() as $key => $currency)
                                            <option value="{{ $key }}"
                                                {{ $key == $generalSetting->currency ? 'selected' : '' }}>
                                                {{ $key }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('currency')
                                        <span class="invalid-feedback" role="alert">
                                            <strong class="text-danger">{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-lg-6">
                                    <label>{{ __('lang.currency_symbol') }} <span class="text-danger">*</span></label>
                                    <input type="text" name="currency_symbol"
                                        class="form-control @error('currency_symbol') is-invalid @enderror"
                                        value="{{ $generalSetting->currency_symbol }}"
                                        placeholder="Enter Shop Currency Symbol" />
                                    @error('currency_symbol')
                                        <span class="invalid-feedback" role="alert">
                                            <strong class="text-danger">{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label>{{ __('lang.youtube') }} <small>{{ __('lang.only_username') }}</small></label>
                                    <input type="text" name="youtube" value="{{ $generalSetting->youtube }}"
                                        class="form-control" placeholder="https://www.youtube.com/username">
                                </div>
                                <div class="col-lg-6">
                                    <label>{{ __('lang.twitter') }} <small> {{ __('lang.only_username') }}</small></label>
                                    <input type="text" name="twitter" value="{{ $generalSetting->twitter }}"
                                        class="form-control" placeholder="https://twitter.com/username">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label>{{ __('lang.linked_in') }} <small> {{ __('lang.only_username') }}</small></label>
                                    <input type="text" name="linkedin" value="{{ $generalSetting->linked_in }}"
                                        class="form-control" placeholder="https://www.linkedin.com/username">
                                </div>
                                <div class="col-lg-6">
                                    <label>{{ __('lang.facebook') }} <small> {{ __('lang.only_username') }}</small></label>
                                    <input type="text" name="facebook" value="{{ $generalSetting->facebook }}"
                                        class="form-control" placeholder="https://www.facebook.com/username">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label>{{ __('lang.instagram') }} <small> {{ __('lang.only_username') }}</small></label>
                                    <input type="text" name="instagram" value="{{ $generalSetting->instagram }}"
                                        class="form-control" placeholder="https://www.instagram.com/username">
                                </div>
                                <div class="col-lg-6">
                                    <label> {{ __('lang.pinterest') }} <small> {{ __('lang.only_username') }}</small> </label>
                                    <input type="text" name="pinterest" value="{{ $generalSetting->pinterest }}"
                                        class="form-control" placeholder="https://www.pinterest.com/username">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label>{{ __('lang.vk') }} <small> {{ __('lang.only_username') }}</small></label>
                                    <input type="text" name="vk" value="{{ $generalSetting->vk }}"
                                        class="form-control" placeholder="https://www.vk.com/username">
                                </div>
                                <div class="col-lg-6">
                                    <label>{{ __('lang.snapchat') }} <small> {{ __('lang.only_username') }}</small></label>
                                    <input type="text" name="snapchat" value="{{ $generalSetting->snapchat }}"
                                        class="form-control" placeholder="https://www.snapchat.com/username">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label>{{ __('lang.web_site') }}</label>
                                    <input type="text" name="website" value="{{ $generalSetting->website }}"
                                        class="form-control" placeholder="https://website.com">
                                </div>
                            </div>
                        </div>
                        {{-- @isset(auth()->user()->role->permission['permission']['generalsetting']['edit']) --}}
                            <div class="card-footer text-right">
                                <button type="submit" class="btn btn-primary mr-2">Update</button>
                            </div>
                        {{-- @endisset --}}
                    </form>
                </div>
                <!--end::Card-->
            </div>
            <!--end::Layout-->
        </div>
    {{-- @endisset --}}
@endsection
