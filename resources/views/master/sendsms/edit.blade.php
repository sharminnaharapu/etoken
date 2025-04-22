<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">{{ __('lang.mobile_numbers') }}</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <i aria-hidden="true" class="ki ki-close"></i>
    </button>
</div>
    <div class="modal-body">
        <div class="form-group row mb-0">
            <div class="col-lg-12 ">
                <div class="card card-custom gutter-b">
                    <div class="card-body p-0">
                        <div class="row from-group main">
                            <div class="col-12 mb-3">
                                <label class="checkbox justify-content-center">
                                    <input type="checkbox" name="all" class="select_all"
                                        value=""><span></span>{{ __('lang.all') }}
                                </label>
                            </div>
                            @foreach ($numbers as $data)
                                <div class="col-md-3 border border-primary px-0 text-center">
                                    <label class="checkbox">
                                        <input type="checkbox" name="selected_mobile_numbers[]"
                                            value="{{ $data->id }}" data-text="{{ $data->mobile_number }}"><span></span>
                                            {{ $data->mobile_number }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer text-right">
        <button type="submit" class="btn btn-primary mr-2" id="mobile_numbers_form">{{ __('lang.submit') }}</button>
    </div>


    {{-- <script>
        $(document).ready(function() {
            // When "Select All" checkbox changes
            $('#select-all').change(function() {
                $('input[name="selected_mobile_numbers[]"]').prop('checked', $(this).prop('checked'));
            });

            // When any individual checkbox changes
            $('input[name="selected_mobile_numbers[]"]').change(function() {
                if (!$(this).prop('checked')) {
                    $('#select-all').prop('checked', false); // Uncheck "Select All" if any individual checkbox is unchecked
                }
            });

            // $('#mobile_numbers_form').submit(function() {
            //     console.log('submit');
            //     var selectedNumbers = [];
            //     $('input[name="selected_mobile_numbers[]"]:checked').each(function() {
            //         selectedNumbers.push($(this).val());
            //     });
            //     $('#mobile_numbers').val(selectedNumbers);
            // });
        });

        $(document).on('click', '#mobile_numbers_form', function() {
            // console.log('submit');
            var selectedNumbers = [];
                $('input[name="selected_mobile_numbers[]"]:checked').each(function() {
                    selectedNumbers.push($(this).val());
                });
                // console.log(selectedNumbers);
                var html = ""
                $('#mobile_numbers').val(selectedNumbers);
        });
    </script> --}}
