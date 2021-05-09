<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminLoginValidation;
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
    protected $redirectTo = 'admin/dashboard';


    public function showLoginForm()
    {
        return View('admin.auth.login');
    }

    public function login(AdminLoginValidation $request)
    {
        $validated = $request->validated();

        if ($this->attemptLogin($validated)) {
            return $this->sendLoginResponse($validated);
        }
        return $this->sendFailedLoginResponse();

    }


    private function attemptLogin($validated)
    {
        return $this->guard()->attempt($validated);
    }

    protected function sendLoginResponse($request)
    {
        session()->regenerate();
        return redirect( route('admin'));
    }

    protected function sendFailedLoginResponse(): void
    {
        throw ValidationException::withMessages([
            'email' => [trans('auth.failed')],
        ]);
    }

    protected function guard()
    {
        return Auth::guard('admin');
    }

}
