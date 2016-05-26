<ul class="nav navbar-nav">
    <p class="navbar-text">Signed in as {{Auth::user()->name}}</p>
    <li>
        <a href="{{route('blogindex')}}">News</a>
    </li>
</ul>
<ul class="nav navbar-right">
    <li>
        <a href="{{action('Auth\AuthController@logout')}}"><i class="fa fa-sign-out"></i> Logout</a>
    </li>
</ul>