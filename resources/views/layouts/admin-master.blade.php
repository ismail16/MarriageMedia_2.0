<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="Today's Look Australia - Admin Dashboard">
    <title>Admin Dashboard | Today's Look Australia</title>

    <!-- GOOGLE FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;500;600;700;800&family=Poppins:wght@300;400;500;600;700;800;900&family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">
    <link href="https://cdn.materialdesignicons.com/4.4.95/css/materialdesignicons.min.css" rel="stylesheet" />
    <!-- site Favicon -->
    {{-- <link rel="icon" href="{{ asset('frontend/images/favicon/favicon.png') }}" sizes="32x32" />
    <link rel="apple-touch-icon" href="{{ asset('frontend/images/favicon/favicon.png') }}" /> --}}
    <link rel="stylesheet" href="{{asset('backend/css/style.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <meta name="msapplication-TileImage" content="{{ asset('frontend/images/favicon/favicon.png') }}" />

    <link rel="stylesheet" href="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.css') }}" />
    <script src="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.js') }}"></script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA-dn6RTAOcZcdg_UzstO_m3bo-ef6TXWE&libraries=places"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="header-fixed sidebar-fixed sidebar-light header-light" id="body">

    <div id="app">
        <router-view></router-view>
    </div>
</body>

</html>