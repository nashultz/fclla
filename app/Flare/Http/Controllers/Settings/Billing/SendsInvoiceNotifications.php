<?php

namespace FCLLA\Flare\Http\Controllers\Settings\Billing;

use FCLLA\Flare\Flare;
use Illuminate\Support\Facades\Mail;

trait SendsInvoiceNotifications
{
    /**
     * The invoice notification e-mail view.
     *
     * @var string
     */
    protected $emailView = 'flare::settings.invoices.emails.invoice';

    /**
     * Send an invoice notification e-mail.
     *
     * @param  mixed  $billable
     * @param  \Laravel\Cashier\Invoice
     * @return void
     */
    protected function sendInvoiceNotification($billable, $invoice)
    {
        $invoiceData = Flare::invoiceDataFor($billable);

        $data = compact('billable', 'invoice', 'invoiceData');

        Mail::send($this->emailView, $data, function ($message) use ($billable, $invoice, $invoiceData) {
            $this->buildInvoiceMessage($message, $billable, $invoice, $invoiceData);
        });
    }

    /**
     * Build the invoice notification message.
     *
     * @param  \Illuminate\Mail\Message  $message
     * @param  mixed  $billable
     * @param  \Laravel\Cashier\Invoice
     * @param  array  $invoiceData
     * @return void
     */
    protected function buildInvoiceMessage($message, $billable, $invoice, array $invoiceData)
    {
        $message->to($billable->email, $billable->name)
                ->subject($invoiceData['product'].' Invoice')
                ->attachData($invoice->pdf($invoiceData), 'invoice.pdf');
    }
}
