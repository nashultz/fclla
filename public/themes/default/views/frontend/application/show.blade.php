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
            <thead></thead>
            <tbody>
                <tr>
                    <td>
                        <strong>Business Name</strong>
                    </td>
                    <td>
                        {{$app->bname}}
                    </td>
                </tr>
                <tr>
                    <td>
                        <strong>Name</strong>
                    </td>
                    <td>
                        {{$app->name}}
                    </td>
                </tr>
                <tr>
                    <td>
                        <strong>Address</strong>
                    </td>
                    <td>
                        {{$app->address}}, {{$app->city}}, {{$app->state}}  {{$app->zipcode}}
                    </td>
                </tr>
                <tr>
                    <td>
                        <strong>Business Phone</strong>
                    </td>
                    <td>
                        {{$app->bphone or 'N/A'}}
                    </td>
                </tr>
                <tr>
                    <td>
                        <strong>Home Phone</strong>
                    </td>
                    <td>
                        {{$app->hphone or 'N/A'}}
                    </td>
                </tr>
                <tr>
                    <td>
                        <strong>Cell Phone</strong>
                    </td>
                    <td>
                        {{$app->cphone or 'N/A'}}
                    </td>
                </tr>
                <tr>
                    <td>
                        <strong>Email</strong>
                    </td>
                    <td>
                        {{$app->email}}
                    </td>
                </tr>
                <tr>
                    <td>
                        <strong>Number of Units</strong>
                    </td>
                    <td>
                        {{$app->units}}
                    </td>
                </tr>
                <tr>
                    <td>
                        <strong>Membership Renewal</strong>
                    </td>
                    <td>
                        {{$app->is_renewal}}
                    </td>
                </tr>
                <tr>
                    <td>
                        <strong>Add to Roster</strong>
                    </td>
                    <td>
                        {{$app->on_roster}}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection