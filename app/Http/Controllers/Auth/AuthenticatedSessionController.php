<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\FrontController;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    private $front_controller;
    public function __construct(FrontController $front_controller)
    {
        $this->front_controller = $front_controller;
    }

    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login', [
            'recaptcha_success' => true,
        ]);
    }

    /**
     * Handle an incoming authentication request.
     */
    // public function store(LoginRequest $request): RedirectResponse
    public function store(LoginRequest $request)
    {
        $inputs = $request->all();

        $recaptcha_secret = "6LdADAspAAAAABB7EQr8Py1uMW2hwo2iE91bF1Cd";

        $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$recaptcha_secret."&response=".$inputs['g-recaptcha-response']);

        if($response){
            $response = json_decode($response, true);
            if($response['success']){
                $request->authenticate();

                $request->session()->regenerate();

                // Retrieve cart from cookie
                $cart = Cookie::get('cart');
                if($cart){
                    return $this->front_controller->studentAddToCartFromCookie();
                }
                return redirect()->intended(RouteServiceProvider::HOME);
            }else{
                return view('auth.login', [
                    'recaptcha_success' => false,
                ]);
            }
        }



    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
