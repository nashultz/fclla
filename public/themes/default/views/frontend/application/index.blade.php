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
                </div><div class="clearfix"></div>
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
                </div><div class="clearfix"></div>
            </div>
            <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                {!!Form::label('address', 'Address:', ['class'=>'col-md-4 control-label'])!!}

                <div class="col-md-5">
                    {!!Form::text('address',null,['class'=>'form-control'])!!}

                    @if ($errors->has('address'))
                        <span class="help-block">
                                <strong>{{ $errors->first('address') }}</strong>
                            </span>
                    @endif
                </div><div class="clearfix"></div>
            </div>
            <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                {!!Form::label('city', 'City:', ['class'=>'col-md-4 control-label'])!!}

                <div class="col-md-6">
                    {!!Form::text('city',null,['class'=>'form-control'])!!}

                    @if ($errors->has('city'))
                        <span class="help-block">
                                <strong>{{ $errors->first('city') }}</strong>
                            </span>
                    @endif
                </div><div class="clearfix"></div>
            </div>
            <div class="form-group{{ $errors->has('state') ? ' has-error' : '' }}">
                {!!Form::label('state', 'State:', ['class'=>'col-md-4 control-label'])!!}

                <div class="col-md-6">
                    {!!Form::text('state',null,['class'=>'form-control'])!!}

                    @if ($errors->has('state'))
                        <span class="help-block">
                                <strong>{{ $errors->first('state') }}</strong>
                            </span>
                    @endif
                </div><div class="clearfix"></div>
            </div>
            <div class="form-group{{ $errors->has('zipcode') ? ' has-error' : '' }}">
                {!!Form::label('zipcode', 'Zipcode:', ['class'=>'col-md-4 control-label'])!!}

                <div class="col-md-6">
                    {!!Form::text('zipcode',null,['class'=>'form-control'])!!}

                    @if ($errors->has('zipcode'))
                        <span class="help-block">
                                <strong>{{ $errors->first('zipcode') }}</strong>
                            </span>
                    @endif
                </div><div class="clearfix"></div>
            </div>
            <div class="form-group{{ $errors->has('bphone') ? ' has-error' : '' }}">
                {!!Form::label('bphone', 'Business Phone:', ['class'=>'col-md-4 control-label'])!!}

                <div class="col-md-6">
                    {!!Form::text('bphone',null,['class'=>'form-control'])!!}

                    @if ($errors->has('bphone'))
                        <span class="help-block">
                                <strong>{{ $errors->first('bphone') }}</strong>
                            </span>
                    @endif
                </div><div class="clearfix"></div>
            </div>
            <div class="form-group{{ $errors->has('hphone') ? ' has-error' : '' }}">
                {!!Form::label('hphone', 'Home Phone:', ['class'=>'col-md-4 control-label'])!!}

                <div class="col-md-6">
                    {!!Form::text('hphone',null,['class'=>'form-control'])!!}

                    @if ($errors->has('hphone'))
                        <span class="help-block">
                                <strong>{{ $errors->first('hphone') }}</strong>
                            </span>
                    @endif
                </div><div class="clearfix"></div>
            </div>
            <div class="form-group{{ $errors->has('cphone') ? ' has-error' : '' }}">
                {!!Form::label('cphone', 'Cell Phone:', ['class'=>'col-md-4 control-label'])!!}

                <div class="col-md-6">
                    {!!Form::text('cphone',null,['class'=>'form-control'])!!}

                    @if ($errors->has('cphone'))
                        <span class="help-block">
                                <strong>{{ $errors->first('cphone') }}</strong>
                            </span>
                    @endif
                </div><div class="clearfix"></div>
            </div>
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                {!!Form::label('email', 'Email:', ['class'=>'col-md-4 control-label'])!!}

                <div class="col-md-6">
                    {!!Form::email('email',null,['class'=>'form-control'])!!}

                    @if ($errors->has('email'))
                        <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                    @endif
                </div><div class="clearfix"></div>
            </div>
            <div class="form-group{{ $errors->has('units') ? ' has-error' : '' }}">
                {!!Form::label('units', 'How many properties (units) you currently own?', ['class'=>'col-md-4 control-label'])!!}

                <div class="col-md-6">
                    {!!Form::text('units',null,['class'=>'form-control'])!!}

                    @if ($errors->has('units'))
                        <span class="help-block">
                                <strong>{{ $errors->first('units') }}</strong>
                            </span>
                    @endif
                </div><div class="clearfix"></div>
            </div>
            <div class="form-group {{$errors->has('membership') ? ' has-error' : ''}}">
                {!! Form::label('membership', 'Is this membership a renewal?', ['class'=>'col-md-4 control-label']) !!}

                <div class="col-md-6">
                    {!! Form::select('membership', array('0' => 'No', '1' => 'Yes'), '0') !!}

                    @if ($errors->has('membership'))
                        <span class="help-block">
                            <strong>{{ $errors->first('membership') }}</strong>
                        </span>
                    @endif
                </div><div class="clearfix"></div>
            </div>
            <div class="form-group{{ $errors->has('roster') ? ' has-error' : '' }}">
                {!!Form::label('roster', 'Would you like to be included on a Membership Roster with your contact information that would be available to other members?', ['class'=>'col-md-4 control-label'])!!}

                <div class="col-md-6">
                    {!! Form::select('roster', array('0' => 'No', '1' => 'Yes'), '0') !!}

                    @if ($errors->has('roster'))
                        <span class="help-block">
                                <strong>{{ $errors->first('roster') }}</strong>
                            </span>
                    @endif
                </div><div class="clearfix"></div>
            </div>
            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    {!!Form::submit('Submit Application',['class'=>'btn btn-warning'])!!}
                </div>
            </div>
            <div class="col-md-6">
                <span class="help-block">All fields required.</span>
            </div><div class="clearfix"></div>
            {!!Form::close()!!}
        </div><div class="clearfix"></div>
        <div class="col-lg-6 col-lg-offset-3">
            <p class="text-center">
                <h4>Disclaimers</h4>
                <p><small>The Faulkner County Landlord Association ("FCLLA") is a non-profit organization and does not give legal,
                        tax, economic or investment advice. FCLLA does not endorse any person, product, literature, organization,
                        company or advertiser. The information and material received at the meetings or on our website are for
                        educational, motivational and enjoyable purposes.</small></p>
                <p><small>FCLLA disclaims all liability for any action or inaction taken or not taken as a result of its communications
                        from or to the guest speakers, members, officers or directors.</small></p>
            </p>
        </div>
    </div>
</div><div class="clearfix"></div>
@endsection