<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">{{ __('lang.counter_view') }}</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="window.location.reload()">
        <i aria-hidden="true" class="ki ki-close"></i>
    </button>
</div>
<div class="modal-body pt-2">
    <div class="col-md-12 mb-3">
        <div class="row mg-b-25">

            <div class="col-md-6 d-flex">
                <h6 class="tx-black">{{ __('lang.name') }}: </h6> <span> &nbsp; {{ $counter->name }}</span>
            </div>
            <div class="col-md-6 d-flex">
                <h6 class="tx-black">{{ __('lang.deacription') }}: </h6> <span> &nbsp; {{ $counter->deacription }}</span>
            </div>
            <div class="col-md-6 d-flex">
                <h6 class="tx-black">{{ __('lang.status') }}: </h6> <span> &nbsp; {{ $counter->status }}</span>
            </div>
            <div class="col-md-6 d-flex">
                <h6 class="tx-black">{{ __('lang.create_by') }}: </h6> <span> &nbsp; {{  $counter->createby->name??'' }} </span>
            </div>
            <div class="col-md-6 d-flex">
                <h6 class="tx-black">{{ __('lang.update_by') }}: </h6> <span> &nbsp; {{  $counter->updateby->name??'' }} </span>
            </div>
            <div class="col-md-6 d-flex">
                <h6 class="tx-black">{{ __('lang.created_at') }}: </h6> <span> &nbsp; {{  dateformet($counter->created_at??'') }} </span>
            </div>
            <div class="col-md-6 d-flex">
                <h6 class="tx-black">{{ __('lang.updated_at') }}: </h6> <span> &nbsp; {{  dateformet($counter->updated_at) }} </span>
            </div>
        </div>
    </div>
</div>
