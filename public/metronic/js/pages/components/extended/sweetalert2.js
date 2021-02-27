"use strict";

// Class definition
var KTSweetAlert2Demo = function () {

    // Demos
    var initDemos = function () {
        // Sweetalert Demo 1
        $('#kt_sweetalert_demo_1').click(function (e) {
            swal.fire('Good job!');
        });

        // Sweetalert Demo 2
        $('#kt_sweetalert_demo_2').click(function (e) {
            swal.fire("Here's the title!", "...and here's the text!");
        });

        // Sweetalert Demo 3
        $('#kt_sweetalert_demo_3_1').click(function (e) {
            swal.fire("Good job!", "You clicked the button!", "warning");
        });

        $('#kt_sweetalert_demo_3_2').click(function (e) {
            swal.fire("Good job!", "You clicked the button!", "error");
        });

        $('#kt_sweetalert_demo_3_3').click(function (e) {
            swal.fire("Good job!", "You clicked the button!", "success");
        });

        $('#kt_sweetalert_demo_3_4').click(function (e) {
            swal.fire("Good job!", "You clicked the button!", "info");
        });

        $('#kt_sweetalert_demo_3_5').click(function (e) {
            swal.fire("Good job!", "You clicked the button!", "question");
        });

        // Sweetalert Demo 4
        $('#kt_sweetalert_demo_4').click(function (e) {
            swal.fire({
                title: "Good job!",
                text: "You clicked the button!",
                type: "success",
                buttonsStyling: false,
                confirmButtonText: "Confirm me!",
                confirmButtonClass: "btn btn-brand"
            });
        });

        // Sweetalert Demo 5
        $('#kt_sweetalert_demo_5').click(function (e) {
            swal.fire({
                title: "Good job!",
                text: "You clicked the button!",
                type: "success",

                buttonsStyling: false,

                confirmButtonText: "<i class='la la-headphones'></i> I am game!",
                confirmButtonClass: "btn btn-danger",

                showCancelButton: true,
                cancelButtonText: "<i class='la la-thumbs-down'></i> No, thanks",
                cancelButtonClass: "btn btn-default"
            });
        });

        $('#kt_sweetalert_demo_6').click(function (e) {
            swal.fire({
                position: 'top-right',
                type: 'success',
                title: 'Your work has been saved',
                showConfirmButton: false,
                timer: 1500
            });
        });

        $('#kt_sweetalert_demo_7').click(function (e) {
            swal.fire({
                title: 'jQuery HTML example',
                html: $('<div>')
                    .addClass('some-class')
                    .text('jQuery is everywhere.'),
                animation: false,
                customClass: 'animated tada'
            })
        });
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            }
        });
        $('#kt_sweetalert_demo_8').click(function (e) {
            swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!'
            }).then(function (result) {
                if (result.value) {
                    swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    )
                }
            });
        });



        $('.kt_sweetalert_demo_9').click(function (e) {
            var id = $(this).attr('id');
            swal.fire({
                title: 'Refund Order',
                text: "Are you sure you want to cancel order?",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes',
                cancelButtonText: 'Cancel'
            }).then(function (result) {
                Swal.fire({
                    title: 'Reason for Refund',
                    html:
                        '<textarea id="remarks" class="swal2-textarea"></textarea>' +
                        '<h2 class="swal2-title" id="swal2-title" style="display: flex;">Refund amount:</h2>' +
                        '<input id="refund_amount" class="swal2-input" placeholder="Leave blank if you want to refund full amount">',
                    preConfirm: () => ({
                        remarks : $('#remarks').val(),
                        refund_amount : $('#refund_amount').val()
                    }),
                    showCancelButton: true,
                    confirmButtonText: 'Confirm',
                    allowOutsideClick: () => !Swal.isLoading()
                }).then((result) => {
                    $.ajax({
                        type: "POST",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: crmRoot + "/orders/refund/" + id,
                        dataType: 'json',
                        contentType: 'application/json; charset=utf-8',
                        data: result.value,
                        success: function (data) {
                            console.log(data);
                            $(".btn-refund").hide();
                            swal.fire(
                                'Refunded!',
                                'Your order has been refunded',
                                'success'
                            )                          
                        }
                    })
                        .done(function () {
                            console.log("success");
                        })
                        .fail(function () {
                            console.log("error");
                            swal.fire(
                                'Failed!',
                                'Your order refund has failed',
                                'error'
                            )
                        })
                        .always(function () {
                            console.log("complete");
                        });

                });
            });
        });


        $('#kt_sweetalert_demo_09').click(function (e) {
            swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true
            }).then(function (result) {
                if (result.value) {
                    swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    )
                    // result.dismiss can be 'cancel', 'overlay',
                    // 'close', and 'timer'
                } else if (result.dismiss === 'cancel') {
                    swal.fire(
                        'Cancelled',
                        'Your imaginary file is safe :)',
                        'error'
                    )
                }
            });
        });

        $('#kt_sweetalert_demo_10').click(function (e) {
            swal.fire({
                title: 'Sweet!',
                text: 'Modal with a custom image.',
                imageUrl: 'https://unsplash.it/400/200',
                imageWidth: 400,
                imageHeight: 200,
                imageAlt: 'Custom image',
                animation: false
            });
        });

        $('#kt_sweetalert_demo_11').click(function (e) {
            swal.fire({
                title: 'Auto close alert!',
                text: 'I will close in 5 seconds.',
                timer: 5000,
                onOpen: function () {
                    swal.showLoading()
                }
            }).then(function (result) {
                if (result.dismiss === 'timer') {
                    console.log('I was closed by the timer')
                }
            })
        });
    };

    return {
        // Init
        init: function () {
            initDemos();
        },
    };
}();

// Class Initialization
jQuery(document).ready(function () {
    KTSweetAlert2Demo.init();
});