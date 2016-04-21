<!DOCTYPE html>
<html>
<head>
    <title>@yield('page_title') &mdash; Faulkner County Landlords Association</title>

    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

    <link href="themes/default/assets/css/app.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="brand"><!--<img src="#" alt="Faulkner County Landlord Association">--> Faulkner County Landlord Association</div>

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
            <a class="navbar-brand" href="index.html">Business Casual</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li>
                    <a href="index.html">Home</a>
                </li>
                <li>
                    <a href="about.html">About</a>
                </li>
                <li>
                    <a href="blog.html">Blog</a>
                </li>
                <li>
                    <a href="contact.html">Contact</a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div></div>
    <!-- /.container -->
</nav>


<div class="container">
    @yield('content')
</div>
</body>
</html>
