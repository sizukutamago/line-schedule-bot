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

    public function googleLogin()
    {
        if (!session('lineId')) {
            return redirect()->route('login.social.line');
        }
        return Socialite::driver('google')->redirect();
    }

    public function lineLogin()
    {
        return Socialite::driver('line')->redirect();
    }

    public function lineCallback()
    {
        $userSocial = Socialite::driver('line')->user();
        session()->put(['lineId' => $userSocial->id]);
        return redirect()->route('login.social.google');
    }

    public function googleCallback()
    {
        $userSocial = Socialite::driver('google')->user();

        $email = $userSocial->getEmail();
        $user = $this->getUser(['email' => $email]);

        if (!$user) {
            $user = $this->createUser([
                'name' => $userSocial->getName(),
                'email' => $email,
                'google_token' => $userSocial->token,
                'google_refresh_token' => $userSocial->refreshToken,
                'line_id' => session('lineId'),
            ]);
        }
        \Auth::login($user);
        return redirect()->to($this->redirectTo);
    }

    /**
     * @param array $where
     * @return User|null
     */
    private function getUser(array $where): ?User
    {
        return $this->userEloquent->where($where)->first();
    }

    private function createUser(array $userInfo): User
    {
        return $this->userEloquent->create($userInfo);
    }
}
