<?php

namespace FCLLA\Flare\Http\Controllers\Settings\Teams\Billing;

use FCLLA\Flare\Team;
use FCLLA\Flare\Flare;
use Illuminate\Http\Request;
use Illuminate\Support\HtmlString;
use Illuminate\Support\Facades\Cache;
use FCLLA\Flare\Http\Controllers\Controller;

class InvoiceController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Get all of the invoices for the given team.
     *
     * @param  Request  $request
     * @param  Team  $team
     * @return Response
     */
    public function all(Request $request, Team $team)
    {
        abort_unless($request->user()->ownsTeam($team), 403);

        if (! $team->hasBillingProvider()) {
            return [];
        }

        return $team->localInvoices;
    }

    /**
     * Download the invoice with the given ID.
     *
     * @param  Request  $request
     * @param  Team  $team
     * @param  string  $id
     * @return Response
     */
    public function download(Request $request, Team $team, $id)
    {
        abort_unless($request->user()->ownsTeam($team), 403);

        $invoice = $team->localInvoices()
                            ->where('id', $id)->firstOrFail();

        return $team->downloadInvoice(
            $invoice->provider_id, ['id' => $invoice->id] + Flare::invoiceDataFor($team)
        );
    }
}
