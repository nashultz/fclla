<li>
    <a href="/">Home</a>
</li>
<li>
    <a href="join">Join</a>
</li>
<li>
    <a href="news">News</a>
</li>
<li>
    <a href="contact">Contact</a>
</li>
@if(Auth::check())
    <li>
        <a href="#">Forum</a>
    </li>
@endif