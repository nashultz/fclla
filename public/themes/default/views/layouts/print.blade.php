<!DOCTYPE html>
<html>
<head>
    <title>@yield('page_title') - Faulkner County Landlords Association</title>

    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

    <link href="{{theme('css/app2.css')}}" rel="stylesheet" type="text/css">
</head>
<body id="page-top">

<div class="container">
    <div class="col-lg-12">
        <span class="logo">
            <img src="{{theme('img/logo.jpg')}}" alt="Faulkner County Landlord Association">
        </span>
        <span class="brand">
            <h2>Faulkner County Landlord Association</h2>
            2125 Harkrider Suite 16<br>Conway, Arkansas 72032<br><br>www.FCLLA.org
        </span>
    </div>
</div>

<div class="container">
    @yield('content')
</div>
</body>
</html>
