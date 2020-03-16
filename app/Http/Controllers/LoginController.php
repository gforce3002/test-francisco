<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    public function index(Request $request) {
        return view('login');
    }

    public function action(Request $request) {
        $email = $request->get('email');
        $password = Crypt::encrypt($request->get('password'));

        try {
            Auth::validate(['email' => $email, 'password' => $password]);
            return response()->redirectToIntended('/');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->redirectToRoute('login')->with('error', 'El nombre de usuario o contraseña es incorrecto.');
        }
    }
}
