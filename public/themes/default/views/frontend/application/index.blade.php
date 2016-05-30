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
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                {!!Form::label('name', 'Name:', ['class'=>'col-md-4 control-label'])!!}

                <div class="col-md-6">
                    {!!Form::text('name',null,['class'=>'form-control'])!!}

                    @if ($errors->has('name'))
                        <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                    @endif
                </div>
            </div>
            <div class="form-group{{ $errors->has('address|city|state|zipcode') ? ' has-error' : '' }}">
                {!!Form::label('address', 'Address:', ['class'=>'col-md-12 control-label'])!!}

                <div class="col-md-5">
                    {!!Form::text('address',null,['class'=>'form-control'])!!}

                    @if ($errors->has('address'))
                        <span class="help-block">
                                <strong>{{ $errors->first('address') }}</strong>
                            </span>
                    @endif
                </div>
                <div class="col-md-3">
                    {!!Form::text('city',null,['class'=>'form-control'])!!}

                    @if ($errors->has('city'))
                        <span class="help-block">
                                <strong>{{ $errors->first('city') }}</strong>
                            </span>
                    @endif
                </div>
                <div class="col-md-2">
                    {!!Form::text('state',null,['class'=>'form-control'])!!}

                    @if ($errors->has('state'))
                        <span class="help-block">
                                <strong>{{ $errors->first('state') }}</strong>
                            </span>
                    @endif
                </div>
                <div class="col-md-2">
                    {!!Form::text('zipcode',null,['class'=>'form-control'])!!}

                    @if ($errors->has('zipcode'))
                        <span class="help-block">
                                <strong>{{ $errors->first('zipcode') }}</strong>
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