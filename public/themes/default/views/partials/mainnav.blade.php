<li>
    <a href="{{route('home')}}">Home</a>
</li>
<li>
    <a href="{{route('join')}}">Join</a>
</li>
<li>
    <a href="{{route('blogindex')}}">News</a>
</li>
<li>
    <a href="{{route('contact')}}">Contact</a>
</li>
@if(Auth::check())
    <li>
        <a href="#" title="Coming Soon!">Forum</a>
    </li>
@endif