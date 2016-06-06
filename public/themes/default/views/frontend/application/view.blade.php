@extends('layouts.frontendalt')

@section('page_title')
    Membership Applications
@endsection

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
        <div class="pull-left btn-table-align">
            Applications
        </div>

        <div class="clearfix"></div>
    </div>

    <div class="panel-body">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <td>
                        ID
                    </td>
                    <td>
                        Name
                    </td>
                    <td>
                        Email
                    </td>
                    <td>
                        Units
                    </td>
                    <td>
                        View
                    </td>
                    <td>
                        Accept/Deny
                    </td>
                </tr>
            </thead>
            <tbody>
                @foreach($apps as $app)
                <tr>
                    <td>
                        {{$app->id}}
                    </td>
                    <td>
                        {{$app->name}}
                    </td>
                    <td>
                        {{$app->email}}
                    </td>
                    <td>
                        {{$app->units}}
                    </td>
                    <td>
                        <a href="#" class="btn btn-block btn-primary"><i class="fa fa-search"></i></a>
                    </td>
                    <td>
                        <a href="#" class="btn btn-block btn-success"><i class="fa fa-check fa-fw"></i> Accept</a>
                        <a href="#" class="btn btn-block btn-danger"><i class="fa fa-close fa-fw"></i> Deny</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection