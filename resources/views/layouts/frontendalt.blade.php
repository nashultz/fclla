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
            <a class="navbar-brand" href="index.html"><img src="themes/default/assets/img/logo.jpg" alt="Faulkner County Landlord Association"> Faulkner County<br>Landlord Association</a>
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


<div class="container">
    @yield('content')
</div>

<!-- Footer -->
<footer class="text-center">
    <div class="footer-above">
        <div class="container">
            <div class="row">
                <div class="footer-col col-md-4">
                    <h3>Location</h3>
                    <p>Faulkner County Library<br>1900 Tyler Street<br>Conway, AR  72034</p>
                </div>
                <div class="footer-col col-md-4">
                    <h3>Around the Web</h3>
                    <ul class="list-inline">
                        <li>
                            <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-facebook"></i></a>
                        </li>
                        <li>
                            <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-google-plus"></i></a>
                        </li>
                        <li>
                            <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-twitter"></i></a>
                        </li>
                        <li>
                            <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-linkedin"></i></a>
                        </li>
                        <li>
                            <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-dribbble"></i></a>
                        </li>
                    </ul>
                </div>
                <div class="footer-col col-md-4">
                    <h3>About FCLLA</h3>
                    <p>Faulkner County Landlord Association exists to provide our members with opportunities to become
                        more successful and profitable property managers by networking with other area landlords, offering
                        educational programs tailored to our individual businesses, and building a united voice to local
                        and state law makers.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-below">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    Copyright &copy; Faulkner County Landlord Association {{date('Y')}}. Site maintained by <a href="http://nathonshultz.com" target="_blank">Nathon Shultz</a>.
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
<div class="scroll-top page-scroll">
    <a class="btn btn-primary" href="#page-top">
        <i class="fa fa-chevron-up"></i>
    </a>
</div>

<script src="themes/default/assets/js/all.js"></script>
</body>
</html>
