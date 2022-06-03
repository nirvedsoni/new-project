<!--
=========================================================
 Paper Dashboard - v2.0.0
=========================================================

 Product Page: https://www.creative-tim.com/product/paper-dashboard
 Copyright 2019 Creative Tim (https://www.creative-tim.com)
 UPDIVISION (https://updivision.com)
 Licensed under MIT (https://github.com/creativetimofficial/paper-dashboard/blob/master/LICENSE)

 Coded by Creative Tim

=========================================================

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. -->



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <!-- <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('paper') }}/img/apple-icon.png">
    <link rel="icon" type="image/png" href="{{ asset('paper') }}/img/favicon.png"> -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
   <title>
        {{ __('Petrol Pump') }}
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
        name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <!-- CSS Files -->
    <link href="{{ asset('paper') }}/css/bootstrap.min.css" rel="stylesheet" />
    <link href="{{ asset('paper') }}/css/paper-dashboard.css?v=2.0.0" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="{{ asset('paper') }}/demo/demo.css" rel="stylesheet" />
    <script src="{{ asset('paper') }}/js/core/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">

    <!-- Google Tag Manager -->
    <!-- <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-NKDMSK6');</script> -->
    <!-- End Google Tag Manager -->
    <style type="text/css">
        /*Hidden class for adding and removing*/
        .lds-dual-ring.hidden {
            display: none;
        }

        /*Add an overlay to the entire page blocking any further presses to buttons or other elements.*/
        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100vh;
            background: rgba(0,0,0,.8);
            z-index: 999999;
            opacity: 1;
            transition: all 0.5s;
        }
         
        /*Spinner Styles*/
        .lds-dual-ring {
            display: inline-block;
            width: 100%;
            height: 100%;
        }
        .lds-dual-ring:after {
            content: " ";
            display: block;
            width: 64px;
            height: 64px;
            margin: 19% auto;
            border-radius: 50%;
            border: 6px solid #fff;
            border-color: #fff transparent #fff transparent;
            animation: lds-dual-ring 1.2s linear infinite;
        }
        @keyframes lds-dual-ring {
            0% {
                transform: rotate(0deg);
            }
            100% {
                transform: rotate(360deg);
            }
        }

        .switch {
          position: relative;
          display: inline-block;
          width: 60px;
          height: 34px;
        }

        .switch input { 
          opacity: 0;
          width: 0;
          height: 0;
        }

        .slider {
          position: absolute;
          cursor: pointer;
          top: 0;
          left: 0;
          right: 0;
          bottom: 0;
          background-color: #ccc;
          -webkit-transition: .4s;
          transition: .4s;
        }

        .slider:before {
          position: absolute;
          content: "";
          height: 26px;
          width: 26px;
          left: 4px;
          bottom: 4px;
          background-color: white;
          -webkit-transition: .4s;
          transition: .4s;
        }

        input:checked + .slider {
          background-color: #2196F3;
        }

        input:focus + .slider {
          box-shadow: 0 0 1px #2196F3;
        }

        input:checked + .slider:before {
          -webkit-transform: translateX(26px);
          -ms-transform: translateX(26px);
          transform: translateX(26px);
        }

        /* Rounded sliders */
        .slider.round {
          border-radius: 34px;
        }

        .slider.round:before {
          border-radius: 50%;
        }
    </style>
</head>

<body class="{{ $class }}">
    <div id="loader" class="lds-dual-ring overlay"></div>
    @auth()
        @include('layouts.page_templates.auth')
    @endauth
    
    @guest
        @include('layouts.page_templates.guest')
    @endguest
    <!-- Modal -->
    <div class="modal fade" id="pinVerificationModel" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">PIN VERIFICATION</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row form-group">
                        <div class="col-md-12 mb-2">
                            <input type="hidden" name="page" id="page">
                            <input type="text" class="form-control numberprevent" placeholder="PIN" name="pin" id="pin" maxlength="4" required autofocus>
                            <span class="invalid-feedback" role="alert" id="pinError" style="display:none;">
                                <strong>{{ __('Pin is required') }}</strong>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="verify_pin();">Verify</button>
                </div>
            </div>
        </div>
    </div>
    <!--   Core JS Files   -->
    
    <script src="{{ asset('paper') }}/js/core/popper.min.js"></script>
    <script src="{{ asset('paper') }}/js/core/bootstrap.min.js"></script>
    <script src="{{ asset('paper') }}/js/plugins/perfect-scrollbar.jquery.min.js"></script>
    <!--  Google Maps Plugin    -->
    <!-- <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script> -->
    <!-- Chart JS -->
    <script src="{{ asset('paper') }}/js/plugins/chartjs.min.js"></script>
    <!--  Notifications Plugin    -->
    <script src="{{ asset('paper') }}/js/plugins/bootstrap-notify.js"></script>
    <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{ asset('paper') }}/js/paper-dashboard.min.js?v=2.0.0" type="text/javascript"></script>
    <!-- Paper Dashboard DEMO methods, don't include it in your project! -->
    <script src="{{ asset('paper') }}/demo/demo.js"></script>
    <script src="{{ asset('paper') }}/js/jQuery.print.js" type="text/javascript"></script>
    <!-- Sharrre libray -->
    <!-- <script src="../assets/demo/jquery.sharrre.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.js"></script>
    <script type="text/javascript">
        $(".decimalnumberprevent").on("keypress", function (evt) {
            if (evt.which != 8 && evt.which != 0 && evt.which != 46 && evt.which < 48 || evt.which > 57)
            {
                evt.preventDefault();
            }
        });
        $(".numberprevent").on("keypress", function (evt) {
            if (evt.which != 8 && evt.which != 0 && evt.which < 48 || evt.which > 57)
            {
                evt.preventDefault();
            }
        });

        $(".validatedecimalinput").on("blur", function (evt) {
            var value = $(this).val();
            $(this).val(parseFloat(value).toFixed(2));
        });
        $(".validatedecimalthreepointinput").on("blur", function (evt) {
            var value = $(this).val();
            $(this).val(parseFloat(value).toFixed(3));
        });

        $("#loader").css("display","block");
        $(document).ready(function() {
            $("#loader").css("display","none");
        });

        function open_verify_pin_modal(page){
            $("#pin").val('');
            $("#page").val(page);

            $("#pinVerificationModel").modal("show");
        }

        function verify_pin(){
            var page = $("#page").val();
            var pin = $("#pin").val();

            if(!pin){
                $("#pinError").show();
                return false;
            }
            else{
                $("#pinError").hide();
            }

            $.ajax({
                url: "{{route('user.pin.verify')}}",
                type: 'get',
                data: { 'pin':pin},
                beforeSend: function() {
                    
                },
                success: function(response) {
                    if (response == true) {
                        $("#pinVerificationModel").modal("hide");
                        
                        if(page == 'delete_entry'){
                            delete_entry();
                        }
                        if(page == 'product_page'){
                            window.location.href = "{{route('product.list')}}";
                        }
                        if(page == 'nozle_page'){
                            window.location.href = "{{route('nozle.list')}}";
                        }

                        var page_arr = page.split("__");
                        if(page_arr[0] == 'delete_product'){
                            deleteProduct(page_arr[1]);
                        }
                        if(page_arr[0] == 'delete_nozle'){
                            deleteNozle(page_arr[1]);
                        }
                    } else {
                        swal({
                            title: "Alert!", 
                            text: "Wrong pin!", 
                            type: "error"
                        }).then(function(){ 
                                
                            }
                        );
                    }
                },
                error: function(xhr) {
                    
                }
            });
        }
    </script>
    @stack('scripts')

    @include('layouts.navbars.fixed-plugin-js')
</body>

</html>
