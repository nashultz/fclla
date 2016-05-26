<ul class="nav navbar-nav">
    <p class="navbar-text">Signed in as {{Auth::user()->name}}</p>
    <li>
        <a href="news">News</a>
    </li>
</ul>
<ul class="nav navbar-right">
    <li>
        <a href="{{route('logout')}}"><i class="fa fa-sign-out"></i> Logout</a>
    </li>
</ul>