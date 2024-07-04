<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\FrontController;
use App\Models\Instructor;
use App\Models\Student;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Spatie\Permission\Models\Role;

class RegisteredUserController extends Controller
{

    private $front_controller;
    public function __construct(FrontController $front_controller)
    {
        $this->front_controller = $front_controller;
    }

    /**
     * Display the registration view.
     */
    public function create(?string $role = 'Student'): View
    {
        return view('auth.register', ['role' => $role, 'recaptcha_success' => true,]);
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    // public function store(Request $request): RedirectResponse
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $inputs = $request->all();

        $recaptcha_secret = "6LdADAspAAAAABB7EQr8Py1uMW2hwo2iE91bF1Cd";

        $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=" . $recaptcha_secret . "&response=" . $inputs['g-recaptcha-response']);

        if ($response) {
            $response = json_decode($response, true);
            if ($response['success']) {
                $user = User::create([
                    'name' => $request->first_name . ' ' . $request->last_name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                ]);

                $role_type = $request->role;

                $role = Role::where('name', $role_type)->first();

                $user->assignRole([$role->id]);

                if ($role_type == 'Student') {
                    Student::create([
                        'user_id' => $user->id,
                        'first_name' => $request->first_name,
                        'last_name' => $request->last_name,
                    ]);
                }

                if ($role_type == 'Instructor') {
                    Instructor::create([
                        'user_id' => $user->id,
                        'first_name' => $request->first_name,
                        'last_name' => $request->last_name,
                    ]);
                }

                try {
                    event(new Registered($user));
                } catch (\Throwable $th) {
                    return redirect(RouteServiceProvider::HOME)->with('error', 'An error occur while registering. Please login for further information!');
                }

                Auth::login($user);

                // Retrieve cart from cookie
                $cart = Cookie::get('cart');
                if($cart){
                    return $this->front_controller->studentAddToCartFromCookie();
                }
                return redirect(RouteServiceProvider::HOME);
            } else {
                return view('auth.register', [
                    'role' => $request->role,
                    'recaptcha_success' => false,
                ]);
            }
        }

    }
}
