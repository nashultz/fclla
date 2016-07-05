<?php

namespace FCLLA\Flare\Http\Controllers\Settings\Billing;

use FCLLA\Flare\Flare;
use Illuminate\Http\Response;
use Laravel\Cashier\Http\Controllers\WebhookController;
use FCLLA\Flare\Events\Subscription\SubscriptionCancelled;
use FCLLA\Flare\Contracts\Repositories\LocalInvoiceRepository;
use FCLLA\Flare\Events\Teams\Subscription\SubscriptionCancelled as TeamSubscriptionCancelled;

class StripeWebhookController extends WebhookController
{
    use SendsInvoiceNotifications;

    /**
     * Handle a successful invoice payment from a Stripe subscription.
     *
     * By default, this e-mails a copy of the invoice to the customer.
     *
     * @param  array  $payload
     * @return Response
     */
    protected function handleInvoicePaymentSucceeded(array $payload)
    {
        $user = $this->getUserByStripeId(
            $payload['data']['object']['customer']
        );

        if (is_null($user)) {
            return $this->teamInvoicePaymentSucceeded($payload);
        }

        $invoice = $user->findInvoice($payload['data']['object']['id']);

        app(LocalInvoiceRepository::class)->createForUser($user, $invoice);

        $this->sendInvoiceNotification(
            $user, $invoice
        );
    }

    /**
     * Handle a successful invoice payment from a Stripe subscription.
     *
     * @param  array  $payload
     * @return Response
     */
    protected function teamInvoicePaymentSucceeded(array $payload)
    {
        $team = Flare::team()->where(
            'stripe_id', $payload['data']['object']['customer']
        )->first();

        if (is_null($team)) {
            return;
        }

        $invoice = $team->findInvoice($payload['data']['object']['id']);

        app(LocalInvoiceRepository::class)->createForTeam($team, $invoice);

        $this->sendInvoiceNotification(
            $team, $invoice
        );
    }

    /**
     * Handle a cancelled customer from a Stripe subscription.
     *
     * @param  array  $payload
     * @return Response
     */
    protected function handleCustomerSubscriptionDeleted(array $payload)
    {
        parent::handleCustomerSubscriptionDeleted($payload);

        $user = $this->getUserByStripeId($payload['data']['object']['customer']);

        if (! $user) {
            return $this->teamSubscriptionDeleted($payload);
        }

        event(new SubscriptionCancelled(
            $this->getUserByStripeId($payload['data']['object']['customer']))
        );

        return new Response('Webhook Handled', 200);
    }

    /**
     * Handle a cancelled customer from a Stripe subscription.
     *
     * @param  array  $payload
     * @return Response
     */
    protected function teamSubscriptionDeleted(array $payload)
    {
        $team = Flare::team()->where(
            'stripe_id', $payload['data']['object']['customer']
        )->first();

        if ($team) {
            $team->subscriptions->filter(function ($subscription) use ($payload) {
                return $subscription->stripe_id === $payload['data']['object']['id'];
            })->each(function ($subscription) {
                $subscription->markAsCancelled();
            });
        }

        event(new TeamSubscriptionCancelled($team));

        return new Response('Webhook Handled', 200);
    }
}
