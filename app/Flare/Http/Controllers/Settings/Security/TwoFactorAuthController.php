<?php

namespace FCLLA\Flare\Http\Controllers\Settings\Security;

use Exception;
use FCLLA\Flare\Flare;
use Illuminate\Http\Request;
use FCLLA\Flare\Http\Controllers\Controller;
use Illuminate\Contracts\Debug\ExceptionHandler;
use FCLLA\Flare\Http\Requests\Settings\Security\EnableTwoFactorAuthRequest;
use FCLLA\Flare\Contracts\Interactions\Settings\Security\EnableTwoFactorAuth;
use FCLLA\Flare\Contracts\Interactions\Settings\Security\DisableTwoFactorAuth;

class TwoFactorAuthController extends Controller
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
     * Enable two-factor authentication for the user.
     *
     * @param  EnableTwoFactorAuthRequest  $request
     * @return Response
     */
    public function enable(EnableTwoFactorAuthRequest $request)
    {
        try {
            Flare::interact(EnableTwoFactorAuth::class, [
                $request->user(), $request->country_code, $request->phone
            ]);

            return $this->storeTwoFactorInformation($request);
        } catch (Exception $e) {
            app(ExceptionHandler::class)->report($e);

            return response()->json(['phone' => [
                'We were not able to enable two-factor authentication for this phone number.'
            ]], 422);
        }
    }

    /**
     * Store the two-factor authentication information on the user instance.
     *
     * @param  EnableTwoFactorAuthRequest  $request
     * @return string
     */
    protected function storeTwoFactorInformation($request)
    {
        $request->user()->forceFill([
            'uses_two_factor_auth' => true,
            'country_code' => $request->country_code,
            'phone' => $request->phone,
            'two_factor_reset_code' => bcrypt($code = str_random(40)),
        ])->save();

        return $code;
    }

    /**
     * Disable two-factor authentication for the user.
     *
     * @param  Request  $request
     * @return Response
     */
    public function disable(Request $request)
    {
        Flare::interact(DisableTwoFactorAuth::class, [$request->user()]);

        $request->user()->forceFill([
            'uses_two_factor_auth' => false,
        ])->save();
    }
}
