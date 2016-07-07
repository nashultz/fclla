<ul class="nav navbar-nav">
    <p class="navbar-text">Signed in as {{Auth::user()->name}}</p>
    <li>
        <a href="{{route('blogindex')}}">News</a>
    </li>
    @if(Auth::user()->admin == 1)
        <li>
            <a href="{{route('admin::viewallapps')}}">Applications</a>
        </li>
    @endif
</ul>
<ul class="nav navbar-nav navbar-right">
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-cog fa-fw"></i> <span class="caret"></span></a>
        <ul class="dropdown-menu">
            <li><a href="https://fclla.org/password/reset">Reset Password</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="/logout"><i class="fa fa-sign-out"></i> Logout</a></li>
        </ul>
    </li>
</ul>