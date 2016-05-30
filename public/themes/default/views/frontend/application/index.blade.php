@extends('layouts.frontendalt')

@section('page_title')
    Contact
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
            <h2 class="text-center">Membership Application<br><small>{{ $appdate }}</small></h2>
        </div><div class="clearfix"></div>
    </div>
    <div class="row">
        <div class="col-lg-6 col-lg-offset-3">
            {!!Form::open([route('saveapp')])!!}
            <div class="form-group{{ $errors->has('bname') ? ' has-error' : '' }}">
                {!!Form::label('bname', 'Business Name:', ['class'=>'col-md-4 control-label'])!!}

                <div class="col-md-6">
                    {!!Form::text('bname',null,['class'=>'form-control'])!!}

                    @if ($errors->has('bname'))
                        <span class="help-block">
                                    <strong>{{ $errors->first('bname') }}</strong>
                                </span>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    {!!Form::submit('Apply',['class'=>'btn btn-warning'])!!}
                </div>
            </div>
            {!!Form::close()!!}
        </div><div class="clearfix"></div>
    </div>
</div><div class="clearfix"></div>
@endsection