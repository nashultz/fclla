@extends('layouts.frontendalt')

@section('page_title')
    News
@endsection

@section('content')
<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

            <h1 class="page-header">
                News &amp; Announcements
            </h1>
            @foreach($posts as $post)
            <!-- Blog Post -->
            <h2>
                <a href="{{route('blogpost',$post->slug)}}">{{$post->title}}</a>
            </h2>
            <p class="lead">
                by FCLLA President<!--{$post->author}-->
            </p>
            <p><span class="fa fa-clock-o"></span> Posted on {{$post->published}}</p>
            <hr>
            <img class="img-responsive" src="https://placehold.it/900x300" alt="">
            <hr>
            <p>{{$post->excerpt}}</p>
            <a class="btn btn-primary" href="#">Read More <span class="fa fa-chevron-right"></span></a>

            <hr>
            @endforeach

            <!-- Pager
            <ul class="pager">
                <li class="previous">
                    <a href="#">&larr; Older</a>
                </li>
                <li class="next">
                    <a href="#">Newer &rarr;</a>
                </li>
            </ul>
            -->

        </div>

        <!-- Blog Sidebar Widgets Column -->
        <div class="col-md-4">

            <!-- Blog Search Well
            <div class="well">
                <h4>Blog Search</h4>
                <div class="input-group">
                    <input type="text" class="form-control">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button">
                            <span class="glyphicon glyphicon-search"></span>
                        </button>
                    </span>
                </div>
            </div>-->

            <!-- Blog Categories Well -->
            <!--<div class="well">
                <h4>Blog Categories</h4>
                <div class="row">
                    <div class="col-lg-6">
                        <ul class="list-unstyled">
                            <li><a href="#">Category Name</a>
                            </li>
                            <li><a href="#">Category Name</a>
                            </li>
                            <li><a href="#">Category Name</a>
                            </li>
                            <li><a href="#">Category Name</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-6">
                        <ul class="list-unstyled">
                            <li><a href="#">Category Name</a>
                            </li>
                            <li><a href="#">Category Name</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>-->

            <!-- Side Widget Well
            <div class="well">
                <h4>Side Widget Well</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
            </div> -->

        </div>

    </div>
    <!-- /.row -->

    <hr>
</div><div class="clearfix"></div>
@endsection