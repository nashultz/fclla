@extends('layouts.frontendalt')

@section('page_title')
    Join
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
            <h2>Join the Faulkner County Landlord Association</h2>
            <p>Help enhance the professionalism and importance of landlords in OUR COMMUNITY.</p>

            <p>Please consider joining your local chapter.</p>

            <p>Monthly Meetings:
                <ul>
                    <li>Networking with fellow landlords members.</li>
                    <li>Guest speakers educate members on current issues and problems.</li>
                    <li>Learn about discounts at participating local businesses.</li>
                    <li>Monthly door prizes.</li>
                </ul>
            </p>
            <p>Give landlords a united voice on state and local issues.
                <ul>
                    <li>Your membership dues help us have our voices heard by our lawmakers.</li>
                    <li>This past year much has been accomplished for landlord rights, but work still needs to be done.</li>
                    <li>Some of the laws, especially the eviction laws changed on August 1, 2007.</li>
                    <li>These changes are beneficial to the landlords. Do you know what they are?</li>
                </ul>
            </p>
            <p>You can join anytime.</p>
        </div><div class="clearfix"></div>
    </div>
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
            <h2>Membership Application</h2>
            <p><a href="{{route('downloadapp')}}" title="Print Application">Print Application</a> &mdash; Mail Applications to:
                <ul>
                    <li>2125 Harkrider Suite 16, Conway AR 72032</li>
                </ul>
            </p>
            <p>Launch Online Application - Coming Soon!</p>
            <p>Pay Membership Dues Online - Coming Soon!</p>
        </div>
    </div>
</div><div class="clearfix"></div>
@endsection