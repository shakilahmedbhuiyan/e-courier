<?php

namespace App\Http\Controllers\Manager\Auth;


use App\Http\Controllers\Controller;
use App\Http\Requests\ManagerLogin;
use App\Manager;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = 'manager/dashboard';


    public function showLoginForm()
    {
        return View('manager.auth.login');
    }

    public function login(ManagerLogin $request)
    {

        if ((new Manager)->findManagerByEmail($request->email)) {
            $validated = $request->only('email', 'password');

            if ($this->attemptLogin($validated)) {

                return $this->sendLoginResponse($validated);
            }
            return $this->sendFailedLoginResponse();
        }
        return back()->with(session()->flash('error', 'No Manager Found!'));


    }




    private function attemptLogin($request)
    {

        return $this->guard()->attempt($request);
    }

    protected function sendLoginResponse($request)
    {
        session()->regenerate();
        return redirect(route('manager'));
    }

    protected function sendFailedLoginResponse(): void
    {
        throw ValidationException::withMessages([
            'email' => [trans('auth.failed')],
        ]);
    }

    protected function guard()
    {
        return Auth::guard('manager');
    }
}
