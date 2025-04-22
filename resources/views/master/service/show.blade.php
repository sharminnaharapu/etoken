<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">{{ __('lang.service_view') }}</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="window.location.reload()">
        <i aria-hidden="true" class="ki ki-close"></i>
    </button>
</div>
<div class="modal-body pt-2">
    <div class="col-md-12 mb-3">
        <div class="row mg-b-25">
            <div class="col-md-6 d-flex">{{ __('lang.image') }}:
                <div class="symbol symbol-35">
                    <div class="symbol-label">
                        <img alt="Pic" style="border-radius: 5px" class="w-35px"
                            src="{{ asset('image/service/' . $service->image) }}" />
                    </div>
                </div>
            </div>
            <div class="col-md-6 d-flex">
                <h6 class="tx-black">{{ __('lang.name') }}: </h6> <span> &nbsp; {{ $service->name }}</span>
            </div>
            <div class="col-md-6 d-flex">
                <h6 class="tx-black">{{ __('lang.department') }}: </h6> <span> &nbsp;
                    {{ $service->department->name }}</span>
            </div>

            <div class="col-md-6 d-flex">{{ __('lang.counter') }}:
                @foreach ($service->counter as $data2)
                    <span class="badge badge-pill badge-primary text-capitalize m-1">
                        {{ $data2->counter->name }}
                    </span>
                @endforeach
            </div>
            <div class="col-md-6 d-flex">
                <h6 class="tx-black">{{ __('lang.deacription') }}: </h6> <span> &nbsp;
                    {{ $service->deacription }}</span>
            </div>
            <div class="col-md-6 d-flex">
                <h6 class="tx-black">{{ __('lang.status') }}: </h6> <span> &nbsp; {{ $service->status }}</span>
            </div>
            <div class="col-md-6 d-flex">
                <h6 class="tx-black">{{ __('lang.create_by') }}: </h6> <span> &nbsp;
                    {{ $service->createby->name ?? '' }} </span>
            </div>
            <div class="col-md-6 d-flex">
                <h6 class="tx-black">{{ __('lang.update_by') }}: </h6> <span> &nbsp;
                    {{ $service->updateby->name ?? '' }} </span>
            </div>
            <div class="col-md-6 d-flex">
                <h6 class="tx-black">{{ __('lang.created_at') }}: </h6> <span> &nbsp;
                    {{ dateformet($service->created_at ?? '') }} </span>
            </div>
            <div class="col-md-6 d-flex">
                <h6 class="tx-black">{{ __('lang.updated_at') }}: </h6> <span> &nbsp;
                    {{ dateformet($service->updated_at) }} </span>
            </div>
        </div>
    </div>
</div>
