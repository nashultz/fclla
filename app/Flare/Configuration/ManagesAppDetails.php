<?php

namespace FCLLA\Flare\Configuration;

use Illuminate\Support\HtmlString;

trait ManagesAppDetails
{
    /**
     * The application details
     * @var array
     */
    public static $details = [];

    /**
     * Application developers
     * @var array
     */
    public static $developers = [];

    /**
     * Application information
     * @param array $details
     * @return void
     */
    public static function details(array $details)
    {
        static::$details = $details;
    }

    /**
     * Get the product name from the application information
     * @return string
     */
    public static function product()
    {
        return static::$details['product'];
    }

    /**
     * Get the invoice meta information
     * @return array
     */
    public static function generateInvoicesWith()
    {
        return array_merge([
            'vendor' => '',
            'product' => '',
            'street' => '',
            'location' => '',
            'phone' => '',
        ], static::$details);
    }

    /**
     * Get the invoice data payload for the given billable entity.
     * @param $billable
     * @return array
     */
    public static function invoiceDataFor($billable)
    {
        return array_merge([
            'vendor' => 'Vendor',
            'product' => 'Product',
            'vat' => new HtmlString(nl2br(e($billable->extra_billing_information))),
        ], static::generateInvoicesWith());
    }

    /**
     * Determine if the given email address belongs to a developer.
     * @param string $email
     * @return bool
     */
    public static function developer($email)
    {
        if(in_array($email, static::$developers)) {
            return true;
        }

        foreach(static::$developers as $developer) {
            if(str_is($developer, $email)) {
                return true;
            }
        }

        return false;
    }

    /**
     * Set the email addresses that are registered to developers
     * @param array $developers
     * @return void
     */
    public static function developers(array $developers)
    {
        static::$developers = $developers;
    }
}