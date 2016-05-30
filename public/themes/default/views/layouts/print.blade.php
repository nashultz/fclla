<!DOCTYPE html>
<html>
<head>
    <title>@yield('page_title') &mdash; Faulkner County Landlords Association</title>

    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

    <link href="{{theme('css/app2.css')}}" rel="stylesheet" type="text/css">
</head>
<body id="page-top">

<div class="navbar-brand pull-left"><img src="{{theme('img/logo.jpg')}}" alt="Faulkner County Landlord Association"></div>
<div class="pull-right">Faulkner County Landlord Association</div>

<div class="container">
    @yield('content')
</div>

<div>&nbsp;</div><div class="clearfix"></div>

@include('partials.footer')

<!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
<div class="scroll-top page-scroll">
    <a class="btn btn-primary" href="#page-top">
        <i class="fa fa-chevron-up"></i>
    </a>
</div>

<script src="{{theme('js/all.js')}}"></script>
</body>
</html>
