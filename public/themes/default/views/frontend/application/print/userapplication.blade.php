@extends('layouts.print')

@section('page_title')
    Application
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
            <h2 class="text-center">Membership Application</h2>
        </div><div class="clearfix"></div>
    </div>
    <div class="row">
        <div class="col-lg-6 col-lg-offset-3">
            <p>Business Name: {{$user->bname}}</p>
            <p>Your Name\s: {{$user->name}}</p>
            <p>Mailing Address: {{$user->address}}, {{$user->city}}, {{$user->state}}  {{$user->zipcode}}</p>
            <div class="col-lg-4">
                <p>Business Phone: {{$user->bphone or 'N/A'}}</p>
            </div>
            <div class="col-lg-4">
                <p>Home: {{$user->hphone or 'N/A'}}</p>
            </div>
            <div class="col-lg-4">
                <p>Cell: {{$user->cphone or 'N/A'}}</p>
            </div><div class="clearfix"></div>
            <p>Email Address: {{$user->email}}</p>
            <br>
            <p>How many properties (units) you currently own: {{$user->units}}</p>
            <p>Is this membership a renewal: {{$user->membership}}</p>
            <p>Would you like to be included on a Membership Roster with your contact information that would be available to other members? {{$user->roster}}</p>

            <p>Please return the completed membership application and payment to: <strong>Faulkner County Landlord Association</strong>, 2125 Harkrider Ste. 16, Conway, Arkansas 72032, or bring it to the next meeting. Dues are $50.00 a year, renewed annually during October, or pro-rated.</p>
            <p>Feel free to use the space below (or on the back of this page) to list any suggestions, meeting topics, concerns or ideas you wish to share with the board.</p>
            <p>Thank you,</p>
            <p>Mark Burrier<br>FCLLA President</p>
            <p class="text-center">
                <h2>Disclaimers</h2>
                <p><small>The Faulkner County Landlord Association ("FCLLA") is a non-profit organization and does not give legal,
                    tax, economic or investment advice. FCLLA does not endorse any person, product, literature, organization,
                    company or advertiser. The information and material received at the meetings or on our website are for
                    educational, motivational and enjoyable purposes.</small></p>
                <p><small>FCLLA disclaims all liability for any action or inaction taken or not taken as a result of its communications
                    from or to the guest speakers, members, officers or directors.</small></p>
            </p>
        </div><div class="clearfix"></div>
    </div>
</div><div class="clearfix"></div>
@endsection