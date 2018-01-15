<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

use App\Repositories\UserRepository;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    protected $user_repo;

    public function __construct(UserRepository $user_repository)
    {
        $this->user_repo = $user_repository;
    }

    public function loginPage()
    {
        return view('auth.login');
    }

    /**
     * Redirect the user to the Google authentication page.
     *
     * @return Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from Google.
     *
     * @return Response
     */
    public function handleProviderCallback()
    {
        $user = Socialite::driver('google')->stateless()->user();

        if (Arr::get($user->user, 'domain') != 'sabanciuniv.edu') {
            return redirect('/login')->withErrors('Invalid email domain. Only @sabanciuniv.edu users can login this system.');
        }

        $my_user = $this->user_repo->where('email', $user->email)->first();

        if (is_null($my_user)) {
            $my_user = $this->user_repo->create([
                'given_name' => $user->user['name']['givenName'],
                'family_name' => $user->user['name']['familyName'],
                'email' => $user->email,
                'google_token' => $user->token,
                'avatar_url' => $user->avatar_original,
            ]);
        }

        Auth::login($my_user);

        return redirect('/home');
    }

    public function logout()
    {
        Auth::logout();

        return redirect('home');
    }
}