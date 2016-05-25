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
                </div><div class="clearfix"></div>
            </div>

            <div class="form-group{{ $errors->has('excerpt') ? ' has-error' : '' }}">
                {!!Form::label('excerpt', 'Excerpt', ['class'=>'col-md-4 control-label'])!!}

                <div class="col-md-6">
                    {!!Form::textarea('excerpt',null,['class'=>'form-control'])!!}
                    <span class="help-block">Short summary of contents of post.</span>
                    @if ($errors->has('excerpt'))
                        <span class="help-block">
                                <strong>{{ $errors->first('excerpt') }}</strong>
                            </span>
                    @endif
                </div><div class="clearfix"></div>
            </div>

            <div class="form-group{{ $errors->has('body') ? ' has-error' : '' }}">
                {!!Form::label('body', 'Body', ['class'=>'col-md-4 control-label'])!!}

                <div class="col-md-6">
                    {!!Form::textarea('body',null,['class'=>'form-control'])!!}

                    @if ($errors->has('body'))
                        <span class="help-block">
                                <strong>{{ $errors->first('body') }}</strong>
                            </span>
                    @endif
                </div><div class="clearfix"></div>
            </div>

            <div class="form-group{{ $errors->has('members_only') ? ' has-error' : '' }}">
                {!!Form::label('members_only', 'Members Only?', ['class'=>'col-md-4 control-label'])!!}

                <div class="col-md-6">
                    {!!Form::checkbox('members_only','1')!!}

                    @if ($errors->has('members_only'))
                        <span class="help-block">
                                <strong>{{ $errors->first('members_only') }}</strong>
                            </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('published_at') ? ' has-error' : '' }}">
                {!!Form::label('published_at', 'Publish On', ['class'=>'col-md-4 control-label'])!!}

                <div class="col-md-6">
                    {!!Form::date('published_at',null,['class'=>'form-control'])!!}

                    @if ($errors->has('published_at'))
                        <span class="help-block">
                                <strong>{{ $errors->first('published_at') }}</strong>
                            </span>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    {!!Form::submit('Submit',['class'=>'btn btn-primary'])!!}
                </div><div class="clearfix"></div>
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