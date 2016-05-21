@extends('layouts.frontendalt')

@section('page_title')
    Member Login
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
            <h2>Login</h2>
        </div><div class="clearfix"></div>
    </div>
    <div class="row">
        <div class="col-lg-6 col-lg-offset-3">
            <p>
                <form action="{{route('member.postlogin')}}" method="post" class="form-horizontal">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="email" class="col-sm-2 control-label">Email:</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" name="email">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password" class="col-sm-2 control-label">Password:</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" name="password">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="passsword_confirmation" class="col-sm-2 control-label">Password Confirmation:</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" name="password_confirmation">
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Login">
                    </div>
                </form>
            </p>
        </div><div class="clearfix"></div>
    </div>
</div><div class="clearfix"></div>
@endsection