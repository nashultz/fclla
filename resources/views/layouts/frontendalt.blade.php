<!DOCTYPE html>
<html>
<head>
    <title>@yield('page_title') &mdash; Faulkner County Landlords Association</title>

    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

    <link href="themes/default/assets/css/app2.css" rel="stylesheet" type="text/css">
</head>
<body id="page-top">

<!-- Navigation -->
<nav class="navbar navbar-default" role="navigation">
    <div class="container"><div class="row">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <!-- navbar-brand is hidden on larger screens, but visible when the menu is collapsed -->
            <a class="navbar-brand" href="index.html"><img class="pull-left" src="themes/default/assets/img/logo.jpg" alt="Faulkner County Landlord Association"> Faulkner County<br>Landlord Association</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                @include('partials.mainnav')
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div></div>
    <!-- /.container -->
</nav>

@include('flash::message')

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

<script src="themes/default/assets/js/all.js"></script>
</body>
</html>
