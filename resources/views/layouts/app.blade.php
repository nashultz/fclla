<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta Information -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'Flare')</title>

    <!-- Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,600' rel='stylesheet' type='text/css'>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css' rel='stylesheet' type='text/css'>

    <!-- CSS -->
    <link href="{{asset('assets/css/sweetalert.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/app.css')}}" rel="stylesheet">

    <!-- Scripts -->
    @yield('scripts', '')

    <!-- Global Flare Object -->
    <script>
        window.Flare = <?php echo json_encode(array_merge(
            Flare::scriptVariables(), []
        )); ?>
    </script>
</head>
<body class="with-navbar" v-cloak>
    <div id="flare-app">
        <!-- Navigation -->
        @if (Auth::check())
            @include('flare::nav.user')
        @else
            @include('flare::nav.guest')
        @endif

        <!-- Main Content -->
        @yield('content')

        <!-- Application Level Modals -->
        @if (Auth::check())
            @include('flare::modals.notifications')
            @include('flare::modals.support')
            @include('flare::modals.session-expired')
        @endif

        <!-- JavaScript -->
        <script src="{{asset('assets/js/main.js')}}"></script>
        <script src="{{asset('assets/js/app.js')}}"></script>
        <script src="{{asset('assets/js/sweetalert.min.js')}}"></script>
    </div>
</body>
</html>
