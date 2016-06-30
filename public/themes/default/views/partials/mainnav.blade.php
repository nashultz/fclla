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
        <a href="{{route('forum')}}" title="Forum">Forum</a>
    </li>
@endif