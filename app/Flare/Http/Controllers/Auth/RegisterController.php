<?php

namespace FCLLA\Flare\Http\Controllers\Auth;

use FCLLA\Flare\Flare;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use FCLLA\Flare\Events\Auth\UserRegistered;
use FCLLA\Flare\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RedirectsUsers;
use FCLLA\Flare\Contracts\Interactions\Auth\Register;
use FCLLA\Flare\Contracts\Http\Requests\Auth\RegisterRequest;

class RegisterController extends Controller
{
    use RedirectsUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Show the application registration form.
     *
     * @param  Request  $request
     * @return Response
     */
    public function showRegistrationForm(Request $request)
    {
        if (Flare::promotion() && ! $request->has('coupon')) {
            // If the application is running a site-wide promotion, we will redirect the user
            // to a register URL that contains the promotional coupon ID, which will force
            // all new registrations to use this coupon when creating the subscriptions.
            return redirect($request->fullUrlWithQuery([
                'coupon' => Flare::promotion()
            ]));
        }

        return view('flare::auth.register');
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  RegisterRequest  $request
     * @return Response
     */
    public function register(RegisterRequest $request)
    {
        Auth::login($user = Flare::interact(
            Register::class, [$request]
        ));

        event(new UserRegistered($user));

        return response()->json([
            'redirect' => $this->redirectPath()
        ]);
    }
}
