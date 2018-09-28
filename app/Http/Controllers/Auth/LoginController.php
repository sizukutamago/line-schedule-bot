<?php

namespace App\Http\Controllers\Auth;

use App\Eloquents\User;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Laravel\Socialite\Facades\Socialite;

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
    protected $redirectTo = '/home';

    /**
     * @var User
     */
    private $userEloquent;

    /**
     * LoginController constructor.
     * @param User $userEloquent
     */
    public function __construct(User $userEloquent)
    {
        $this->middleware('guest')->except('logout');
        $this->userEloquent = $userEloquent;
    }

    public function socialLogin(string $social)
    {
        return Socialite::driver($social)->redirect();
    }

    public function socialCallback(string $social)
    {
        $userSocial = Socialite::driver($social)->user();

        $email = $userSocial->getEmail();
        $user = $this->getUserByEmail($email);

        if (!$user) {
            $user = $this->createUser([
                'name' => $userSocial->getName(),
                'email' => $email,
                'google_token' => $userSocial->token,
                'google_refresh_token' => $userSocial->refreshToken,
            ]);
        }
        \Auth::login($user);
        return redirect()->to($this->redirectTo);
    }

    /**
     * @param string $email
     * @return User|null
     */
    private function getUserByEmail(string $email): ?User
    {
        return $this->userEloquent->where(['email' => $email])->first();
    }

    private function createUser(array $userInfo): User
    {
        return $this->userEloquent->create($userInfo);
    }
}
