<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use Laravel\Socialite\Facades\Socialite;

class SocialAuthController extends Controller
{
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback(Request $request, $provider)
    {
        try {
            $state = $request->get('state');
            $request->session()->put('state', $state);
            // Obtenemos los datos del usuario
            $social_user = Socialite::driver($provider)->user();

            // Comprobamos si el usuario ya existe
            if ($user = User::where('email', $social_user->email)->first()) {
                if (!empty($social_user->getAvatar())) {
                    $user->avatar = $social_user->getAvatar();
                    $user->save();
                }
                return $this->authAndRedirect($user); // Login y redirección
            } else {
                return response()->redirectTo('/login')->with('error', 'El usuario no se encuentra registrado');
            }
        } catch (ClientException $exception) {
            return response()->redirectTo('/login')->with('error', 'El usuario no se encuentra registrado');
        }

    }

    // Login y redirección
    public function authAndRedirect($user)
    {
        Auth::login($user);
        return response()->redirectToIntended('/');
    }
}
