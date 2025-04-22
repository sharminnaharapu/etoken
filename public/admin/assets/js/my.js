// csrf token
"use strict";
$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});

$(function () {
    // mane lofo
    var manelogoPreview = function (input, placeToInsertImagePreview) {
        if (input.files) {
            var filesAmount = input.files.length;
            for (i = 0; i < filesAmount; i++) {
                var reader = new FileReader();
                reader.onload = function (event) {
                    $(
                        $.parseHTML(
                            '<img class="img-fluid manelogo" style="height: 50px; width: 95%;">'
                        )
                    )
                        .attr("src", event.target.result)
                        .appendTo(placeToInsertImagePreview);
                };
                reader.readAsDataURL(input.files[i]);
            }
        }
    };

    var fablogoPreview = function (input, placeToInsertImagePreview) {
        if (input.files) {
            var filesAmount = input.files.length;
            for (i = 0; i < filesAmount; i++) {
                var reader = new FileReader();
                reader.onload = function (event) {
                    $(
                        $.parseHTML(
                            '<img class="img-fluid text-center fablogo" style="height: 50px; width: 50px;">'
                        )
                    )
                        .attr("src", event.target.result)
                        .appendTo(placeToInsertImagePreview);
                };
                reader.readAsDataURL(input.files[i]);
            }
        }
    };

    var photosPreview = function (input, placeToInsertImagePreview) {
        if (input.files) {
            var filesAmount = input.files.length;
            for (i = 0; i < filesAmount; i++) {
                var reader = new FileReader();
                reader.onload = function (event) {
                    $(
                        $.parseHTML(
                            '<img class="img-fluid text-center photo" style="height: 90%; width: 100px;">'
                        )
                    )
                        .attr("src", event.target.result)
                        .appendTo(placeToInsertImagePreview);
                };
                reader.readAsDataURL(input.files[i]);
            }
        }
    };
    $("body").on("change", "#photo", function () {
        fablogoPreview(this, "div.gallery");
    });
    $("body").on("change", "#fablogo", function () {
        fablogoPreview(this, "div.fablogo");
    });
    $("body").on("change", "#manelogo", function () {
        manelogoPreview(this, "div.manelogo");
    });
    $("body").on("change", "#printlogo", function () {
        manelogoPreview(this, "div.printlogo");
    });
    $("body").on("change", "#photo", function () {
        photosPreview(this, "div.photo");
    });

    $("body").on("change", "#photos", function () {
        photosPreview(this, "div.photos");
    });
});
// All Select peer js
var KTSelect2 = (function () {
    // Private functions
    var demos = function () {

        // basic
        $(".currency").select2({
            placeholder: "Select One",
        });
    };
    var demos3 = function () {
        // multi select
        $(".multipleOption").select2({
            placeholder: "Select Multiple Data",
        });
    };
    var selectpcar2 = function () {
        // multi select limit
        $(".selectpcar2").select2({
            placeholder: "Select Multiple Data",
            maximumSelectionLength: 4,
        });
        // date picker
        $(".datepicker").datepicker({
            // rtl: KTUtil.isRTL(),
            todayHighlight: true,
            orientation: "bottom left",
            templates: arrows,
            autoclose: true,
            format: "yyyy-mm-dd",
        });
        $("#datetimepicker").datetimepicker({
            locale: "de",
            format: "YYYY-MM-DD H:mm",
            autoclose: true,
        });
        $(".datetimepicker").datetimepicker({
            locale: "de",
            format: "YYYY-MM-DD H:mm",
            autoclose: true,
        });

        $(".timepicker").timepicker({
            minuteStep: 1,
            showSeconds: true,
            showMeridian: false,
            snapToStep: true,
            format: "HH:mm s",
            // defaultTime: null,
        });
    };

    var textedtor = function () {
        tinymce.init({
            selector: ".textedtor",
            toolbar:
                "undo redo cut copy paste pastetext alignleft aligncenter alignright alignjustify bullist numlist outdent indent bold italic underline strikethrough formats removeformat fontselect fontsizeselect forecolor backcolor link hr ",
            plugins: [
                "autoresize advlist autolink lists link image charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars code fullscreen",
                "insertdatetime media nonbreaking save table contextmenu directionality",
                "emoticons template paste textcolor colorpicker textpattern imagetools codesample",
            ],
        });
    };


    var custom_texteditor = function () {
        tinymce.init({
            selector: ".custom_textedtor",
            toolbar:
                "undo redo alignleft aligncenter alignright alignjustify bullist numlist bold italic strikethrough formats removeformat fontsizeselect forecolor backcolor",
        });
    };
    var arrows;
    if (KTUtil.isRTL()) {
        arrows = {
            leftArrow: '<i class="la la-angle-right"></i>',
            rightArrow: '<i class="la la-angle-left"></i>',
        };
    } else {
        arrows = {
            leftArrow: '<i class="la la-angle-left"></i>',
            rightArrow: '<i class="la la-angle-right"></i>',
        };
    }

    // Public functions
    return {
        init: function () {
            demos();
            demos3();
            selectpcar2();
            textedtor();
            custom_texteditor();
        },
    };
})();
// Initialization
jQuery(document).ready(function () {
    KTSelect2.init();
});

// Request Send for checkbox
$("body").on("change", ".checkboxsend", function () {
    let checkboxsend = $(this).val();
    let url = $(this).data("url");
    $.ajax({
        url: url,
        method: "post",
        data: {},
        success: function (result) {
            if (result.error) {
                toastr.error(result.error);
            } else {
                toastr.success(result.success);
            }
        },
    });
});
// Edit Modal shoe
function editAjaxmodalShow(url) {
    // console.log(url);
    // var url = $(this).data("url");
    $.ajax({
        url: url,
        dataType: "JSON",
        data: {},
        type: "POST",
        success: function (data) {
            $("#modal-content").append(data.html);
        },
    });
}

// add Modal shoe
function addAjaxmodalShow(url) {
    // console.log(url);
    // var url = $(this).data("url");
    $.ajax({
        url: url,
        dataType: "JSON",
        data: {},
        type: "POST",
        success: function (data) {
            $("#modal-content-add").append(data.html);
        },
    });
}

function viewModalShow(url) {
    // console.log(url);
    // var url = $(this).data("url");
    $.ajax({
        url: url,
        data: {},
        type: "POST",
        success: function (data) {
            $("#viewModalContent").append(data.html);
        },
    });
}
// Doctor Charge
$("body").on("change", "#charge_category", function () {
    // $('#standard_charge').reset();
    let charge_category = $(this).val();
    let url = $(this).data("url");
    $.ajax({
        url: url,
        method: "post",
        data: {
            charge_category: charge_category,
        },
        success: function (result) {
            // $('.charge_category_charge_name').show();
            $("#charge_category_charge_name").html(result);
        },
    });
});
$("body").on("change", "#charge_category_charge_name", function () {
    let charge_id = $(this).val();
    let url = $(this).data("url");
    $.ajax({
        url: url,
        method: "post",
        data: {
            charge_id: charge_id,
        },
        success: function (result) {
            $("#standard_charge").html(result);
        },
    });
});

$(document).on("change", ".cashAmount", function (e) {
    e.preventDefault();
    let url = $(this).data("url");
    let data = $(this).val();
    $.ajax({
        url: url,
        type: "POST",
        data: {
            data: data,
        },
        success: function (data) {
            $("#doctorChargeApply").html(data);
        },
    });
});

$(document).on('click', "#prescription", function (e) {
    e.preventDefault();
    let url = $(this).data('url');
    $.ajax({
        url,
        method: "POST",
        data: {},
        success: function (result) {
            let printWindow = window.open('', '', 'width=1000,height=900')
            printWindow.document.open()
            printWindow.document.write(result.data)
            printWindow.document.close()
            printWindow.focus()
            printWindow.print()
            // printWindow.close()
        }
    })
});

$(document).on('click', ".invoicePrint", function (e) {
    e.preventDefault();
    let url = $(this).data('url');
    $.ajax({
        url,
        method: "get",
        data: {},
        success: function (result) {
            let printWindow = window.open('', '', 'width=1000,height=900')
            printWindow.document.open()
            printWindow.document.write(result.data)
            printWindow.document.close()
            printWindow.focus()
            printWindow.print()
            // printWindow.close()
        }
    })
});

$(document).on('click', ".allFormPrirt", function (e) {
    e.preventDefault();
    let url = $(this).data('url');
    $.ajax({
        url,
        method: "POST",
        data: {},
        success: function (result) {
            let printWindow = window.open('', '', 'width=1000,height=900')

            printWindow.document.open()
            printWindow.document.write(result.data)
            printWindow.document.close()
            printWindow.focus()
            printWindow.print()
            // printWindow.close()

        }
    })
});

// function allergyshow(warrantyhidden) {
//     var warrantyshow = document.getElementsByClassName("allergyshow");
//     warrantyshow.style.display = warrantyhidden.checked ? "" : "none";
// }
// function allergyhidd(warrantyhidden) {
//     var warrantyshow = document.getElementsByClassName("allergyshow");
//     warrantyshow.style.display = warrantyhidden.checked ? "none" : "";
// }
function allergyshow(warrantyhidden) {
    var warrantyshowList = document.getElementsByClassName("allergyshow");
    for (var i = 0; i < warrantyshowList.length; i++) {
        warrantyshowList[i].style.display = warrantyhidden.checked ? "" : "none";
    }
}
function allergyhidd(warrantyhidden) {
    var warrantyshowList = document.getElementsByClassName("allergyshow");
    for (var i = 0; i < warrantyshowList.length; i++) {
        warrantyshowList[i].style.display = warrantyhidden.checked ? "none" : "";
    }
}

$(document).ready(function () {
    var animationPaused = false;
    $('.news-container').hover(
        function () {
            if (!animationPaused) {
                $(this).find('ul').css('animation-play-state', 'paused');
                animationPaused = true;
            }
        },
        function () {
            if (animationPaused) {
                $(this).find('ul').css('animation-play-state', 'running');
                animationPaused = false;
            }
        }
    );
});


function patientBedSearch(change_value_id, url){
    $(document).on('change', change_value_id, function(e) {
        e.preventDefault();
        let ip_room = $('#ip_room').val();
        let ip_ward = $('#ip_ward').val();
        let ip_floor = $('#ip_floor').val();
        $.ajax({
            url,
            method: 'post',
            data: {
                ip_room: ip_room,
                ip_ward: ip_ward,
                ip_floor: ip_floor
            },
            success: function(res) {
                $('#ip_bed_details').html(res.data);
                $(res.set_value).html(res.html);
            }
        })
    });
};

$(document).on('click', ".barcodeGenerate", function(e) {
    e.preventDefault();
    let url = $(this).data('url');
    $.ajax({
        url,
        method: "POST",
        data: {},
        success: function(result) {
            let printWindow = window.open('', '', 'width=1000,height=900')
            printWindow.document.open()
            printWindow.document.write(result.data)
            printWindow.document.close()
            printWindow.focus()
            printWindow.print()
            // printWindow.close()
        }
    })
});

