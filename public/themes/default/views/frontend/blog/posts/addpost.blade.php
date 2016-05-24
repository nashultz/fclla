@extends('layouts.frontendalt')

@section('page_title')
    Add Post &ndash; News
@endsection

@section('content')
<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

            <h1 class="page-header">
                Add Post - News &amp; Announcements
            </h1>
            {!!Form::open()!!}
            <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                {!!Form::label('title', 'Title', ['class'=>'col-md-4 control-label'])!!}

                <div class="col-md-6">
                    {!!Form::text('title',null,['class'=>'form-control'])!!}

                    @if ($errors->has('title'))
                        <span class="help-block">
                                    <strong>{{ $errors->first('title') }}</strong>
                                </span>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    {!!Form::submit('Submit',['class'=>'btn btn-primary)!!}
                </div>
            </div>
            {!!Form::close()!!}

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
            @include('partials.submembernav')

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