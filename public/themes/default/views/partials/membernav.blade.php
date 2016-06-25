<ul class="nav navbar-nav">
    <p class="navbar-text">Signed in as {{Auth::user()->name}}</p>
    <li>
        <a href="{{route('blogindex')}}">News</a>
    </li>
    @if(Auth::user()->admin == 1)
        <li>
            <a href="{{route('admin::applications')}}">Applications</a>
        </li>
    @endif
</ul>
<ul class="nav navbar-nav navbar-right">
    <li>
        <a href="{{action('Auth\AuthController@logout')}}"><i class="fa fa-sign-out"></i> Logout</a>
    </li>
</ul>