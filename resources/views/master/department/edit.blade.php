<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">{{ __('lang.edit_department') }}</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="window.location.reload()">
        <i aria-hidden="true" class="ki ki-close"></i>
    </button>
</div>
<form class="form" action="{{ route('master.department.update',$department->id) }}" method="POST">
    @csrf
    <div class="modal-body">
        <div class="form-group row mb-0">
            <div class="col-lg-12 ">
                <label>{{ __('lang.name') }}<span class="text-danger">*</span></label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                    placeholder="{{ __('lang.name') }}" value="{{ $department->name }}" required />
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong class="text-danger">{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-lg-12 ">
                <label>{{ __('lang.deacription') }}</label>
                <input type="text" name="deacription"
                    class="form-control @error('deacription') is-invalid @enderror"
                    placeholder="{{ __('lang.deacription') }}" value="{{ $department->deacription }}"  />
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
                        <input type="radio" {{ $department->status == 'active' ? 'checked' : '' }} name="status" value="active" />
                        <span></span>
                        {{ __('lang.active') }}
                    </label>
                    <label class="radio">
                        <input type="radio" name="status" {{ $department->status == 'inactive' ? 'checked' : '' }} value="inactive" />
                        <span></span>
                        {{ __('lang.inactive') }}
                    </label>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <div class="row justify-content-center col-12">
            <div class="col-6">
                <button type="submit" class="btn btn-primary btn-block ">{{ __('lang.update') }}</button>
            </div>
        </div>
    </div>
</form>
