<form action="{{ route($url) }}" method="post">
    @csrf
    @php
        $name = $_GET['name'] ?? '';
        $status = $_GET['status'] ?? '';
    @endphp
    <div class="form-group row mt-0">
        <div class="col-lg-4">
            <label>{{ __('lang.token_no') }}</label>
            <input class="form-control " name="name" type="text" value="{{ $name }}"
                placeholder="{{ __('lang.token_no') }}" />
        </div>
        {{-- <div class="col-lg-2">
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
        </div> --}}
        <div class="col-lg-1 mt-7">
            <button type="submit" class="btn btn-primary">{{ __('lang.search') }}</button>
        </div>
        <div class="col-lg-1 mt-7">
            <a onclick='window.location.replace("{{ route(Route::currentRouteName()) }}")'
                class="btn btn-light-primary font-weight-bolder mb-0 card-title">{{ __('lang.refresh') }}</a>
        </div>
    </div>
</form>
