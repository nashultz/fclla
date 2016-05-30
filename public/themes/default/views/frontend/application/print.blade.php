@extends('layouts.print')

@section('page_title')
    Contact
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
            <h2>Contact the Faulkner County Landlord Association</h2>
            <p>We hope that you will find the information throughout this website helpful and informative.</p>

            <p>If we can be of further assistance to you please contact the FCLLA President via the form below:</p>
        </div><div class="clearfix"></div>
    </div>
    <div class="row">
        <div class="col-lg-6 col-lg-offset-3">
            <p>
                <form action="#" method="post" class="form-horizontal">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Name*:</label>
                        <div class="col-sm-10">
                            <hr>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="member" class="col-sm-2 control-label">Membership*:</label>
                        <div class="col-sm-10">
                            <hr>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-sm-2 control-label">Email*:</label>
                        <div class="col-sm-10">
                            <hr>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="issuetype" class="col-sm-2 control-label">Issue Type*:</label>
                        <div class="col-sm-10">
                            <hr>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="messagebody" class="col-sm-2 control-label">Message*:</label>
                        <div class="col-sm-10">
                            <hr><br><hr><br><hr><br><hr><br><hr><br><hr><br><hr><br>
                        </div>
                    </div>
                    <div class="help-block">* denotes required fields.</div>
                </form>
            </p>
        </div><div class="clearfix"></div>
    </div>
</div><div class="clearfix"></div>
@endsection