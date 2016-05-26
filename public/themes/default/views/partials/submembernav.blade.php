<div class="well">
    <h4>Blog Options</h4>
    <div class="row">
        <div class="col-lg-6">
            <ul class="list-unstyled">
                @if(Auth::user()->is_admin)
                    <li>
                        <a href="{{route('member::newpost')}}">New Post</a>
                    </li>
                @endif
            </ul>
        </div>
        <!--
        <div class="col-lg-6">
            <ul class="list-unstyled">
                <li><a href="#">Category Name</a>
                </li>
                <li><a href="#">Category Name</a>
                </li>
            </ul>
        </div>-->
    </div>
</div>