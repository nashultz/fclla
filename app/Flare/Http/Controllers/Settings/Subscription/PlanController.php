<?php

namespace FCLLA\Flare\Http\Controllers\Settings\Subscription;

use FCLLA\Flare\Flare;
use Illuminate\Http\Request;
use FCLLA\Flare\Http\Controllers\Controller;
use FCLLA\Flare\Contracts\Interactions\Subscribe;
use FCLLA\Flare\Events\Subscription\SubscriptionUpdated;
use FCLLA\Flare\Events\Subscription\SubscriptionCancelled;
use FCLLA\Flare\Http\Requests\Settings\Subscription\UpdateSubscriptionRequest;
use FCLLA\Flare\Contracts\Http\Requests\Settings\Subscription\CreateSubscriptionRequest;

class PlanController extends Controller
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
     * Create the subscription for the user.
     *
     * @param  CreateSubscriptionRequest  $request
     * @return Response
     */
    public function store(CreateSubscriptionRequest $request)
    {
        $plan = Flare::plans()->where('id', $request->plan)->first();

        Flare::interact(Subscribe::class, [
            $request->user(), $plan, false, $request->all()
        ]);
    }

    /**
     * Update the subscription for the user.
     *
     * @param  \FCLLA\Flare\Http\Requests\UpdateSubscriptionRequest  $request
     * @return Response
     */
    public function update(UpdateSubscriptionRequest $request)
    {
        $plan = Flare::plans()->where('id', $request->plan)->first();

        // This method is used both for updating subscriptions and for resuming cancelled
        // subscriptions that are still within their grace periods as this swap method
        // will be used for either of these situations without causing any problems.
        if ($plan->price === 0) {
            return $this->destroy($request);
        } else {
            $request->user()
                    ->subscription()
                    ->swap($request->plan);
        }

        event(new SubscriptionUpdated(
            $request->user()->fresh()
        ));
    }

    /**
     * Cancel the user's subscription.
     *
     * @param  Request  $request
     * @return Response
     */
    public function destroy(Request $request)
    {
        $request->user()->subscription()->cancel();

        event(new SubscriptionCancelled($request->user()->fresh()));
    }
}
