<div class=" bg-secondary  col-md-12">
    <div class="row d-flex py-4">
        <div class="col-md-4">
            <h6 class="tx-black">{{ __('lang.patient_name') }}: <span
                    class="badge badge-pill badge-info">{{ $ReVisits->patient->FullName }}</span>
            </h6>
        </div>
        <div class="col-md-4">
            <h6 class="tx-black">
                {{ __('lang.hospital_id') }}:{{ $ReVisits->patient->hospital_id }}
            </h6>
        </div>
        <div class="col-md-4">
            <h6 class="tx-black">
                {{ __('lang.re_visit_id') }}:{{ $ReVisits->p_re_visite_id }}
            </h6>
        </div>
        <div class="col-md-4">
            <h6 class="tx-black">
                {{ __('lang.date_of_birth') }}:{{ $ReVisits->patient->date_of_birth }}
            </h6>
        </div>
        <div class="col-md-4">
            <h6 class="tx-black">{{ __('lang.gender') }}:{{ $ReVisits->patient->gender }}
            </h6>
        </div>
        <div class="col-md-4">
            <h6 class="tx-black">
                {{ __('lang.nationality') }}:{{ $ReVisits->patient->nationality }}
            </h6>
        </div>
        <div class="col-md-4">
            <h6 class="tx-black ">{{ __('lang.doctor_name') }}: <span
                    class="badge badge-pill badge-primary">{{ $ReVisits->staff->name }}</span>
            </h6>
        </div>
        <div class="col-md-4">
            <h6 class="tx-black">
                {{ __('lang.patient_type') }}:{{ $ReVisits->patient_type }}
            </h6>
        </div>
        <div class="col-md-4">
            <h6 class="tx-black">
                {{ __('lang.appointment_date') }}:
                {{ date('j F Y, g:i a', strtotime($ReVisits->visit_date)) }}
            </h6>
        </div>
        <div class="col-md-4">
            <h6 class="tx-black">{{ __('lang.note') }}:{{ $ReVisits->note }}
            </h6>
        </div>
        <div class="col-md-4">
            <h6 class="tx-black">
                {{ __('lang.patient') }}:{{ $ReVisits->patient_payment_type }}
            </h6>
        </div>
        <div class="col-md-4">
            <h6 class="tx-black">
                {{ __('lang.balance_amount') }}: <span class=" bg-primary">{{ $ReVisits->patient->advance_amount }}</span>
            </h6>
        </div>
        @if ($ReVisits->patient_payment_type == 'insurance')
            <div class="col-md-4">
                <h6 class="tx-black">
                    {{ __('lang.provider_name') }}:{{ $ReVisits->patientinsurance->provider->provider_name }}
                </h6>
            </div>
            <div class="col-md-4">
                <h6 class="tx-black">
                    {{ __('lang.company_name') }}:{{ $ReVisits->patientinsurance->company->company_name }}
                </h6>
            </div>
            <div class="col-md-4">
                <h6 class="tx-black">
                    {{ __('lang.card_holder') }}:{{ $ReVisits->patientinsurance->cardholder->name }}
                </h6>
            </div>
            <div class="col-md-4">
                <h6 class="tx-black">
                    {{ __('lang.company_name') }}:{{ $ReVisits->patientinsurance->cardtype->name }}
                </h6>
            </div>
            <div class="col-md-4">
                <h6 class="tx-black">
                    {{ __('lang.claim_number') }}: {{ $ReVisits->claim_number }}
                </h6>
            </div>
        @endif
    </div>
</div>
