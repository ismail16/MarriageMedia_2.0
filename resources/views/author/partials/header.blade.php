<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta charset="utf-8">
    <link rel="shortcut icon" href="{{ asset('images/icon.png') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('frontend_assets/css/open-iconic-bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend_assets/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend_assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend_assets/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend_assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend_assets/css/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend_assets/css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend_assets/css/bootstrap-datepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend_assets/css/jquery.timepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend_assets/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend_assets/css/icomoon.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend_assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend_assets/css/sidebar_style.css') }}">
    <link href="{{ asset('frontend_assets/fontawesome/css/all.css') }}" rel="stylesheet">
    <!-- <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"> -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="{{ asset('frontend_assets/css/style.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <script src="{{ asset('backend_assets/plugins/sweetalert2/sweetalert2.all.js') }}"></script>
    <link href="{{ asset('backend_assets/plugins/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('backend_assets/timeline.css') }}" rel="stylesheet" type="text/css" >


    <style type="text/css">
        span {
            color: #040404;
        }
        .btn-xs{
            padding: 1px 5px;
            font-size: 12px;
            line-height: 1.5;
        }
       /* .session_contect{
            position: relative;
        }
        .session_message{
            position: absolute;
            z-index: 1;
            top: -38px;
        }*/
        .bg-light-green{
            background-color: #c2ff0729;
        }
        .bg-body-green{
                background-color: #edffb5;
        }
        .form-label{
            color: #cf51a4 !important;
        }
        .table.table-bordered.dataTable tbody td{
            background-color: #fff !important;
        }
        @media only screen and (max-width: 600px) {
          .ftco-navbar-light .navbar-nav>.nav-item>.nav-link{
                padding-top: 5px !important;
                padding-bottom: 5px !important;
          }
          .navbar-collapse{
            background-color: #c2e0a694 !important;
          }
          .ftco-navbar-light{
            padding: 5px 15px 0px 15px !important;
          }
        }
    </style>

    <link rel="stylesheet" href="{{ asset('backend_assets/slimselect.min.css') }}">

    <script type="text/javascript">
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 1500,
          timerProgressBar: true,
        })
    </script>


    @stack('css')
</head>
<body>