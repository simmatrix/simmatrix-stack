<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Socialite;
use App\Models\Users;
use App\Models\OAuthProvider;

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
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     *  Redirect a user to the OAuth Provider
     *
     * @param  string $provider
     * @return Response
     */
    public function redirectToProvider( $provider_name )
    {
        return Socialite::driver( $provider_name ) -> redirect();
    }

    public function handleProviderCallback( $provider_name )
    {
        $user = Socialite::driver( $provider_name ) -> user();
        $provider = OAuthProvider::find( 'name', $provider_name ) -> first();

        $auth_user = $this -> findOrCreateUser( $user, $provider );
        Auth::login( $auth_user, TRUE );
        return redirect( $this -> redirectTo );
    }

    public function findOrCreateUser( $user, $provider )
    {
        $auth_user = User::where('oauth_provider_id', $provider -> getId())
                     -> where('id', $user -> getId()) -> first();
        if ( $auth_user ) return $auth_user;

        return User::create([
            'name' => $user -> name,
            'email' => $user -> email,
            'oauth_provider_id' => $provider -> getId(),
            'oauth_token' => $user -> token,
        ]);
    }
}
