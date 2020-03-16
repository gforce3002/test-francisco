<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        if ($request->user()->hasRole('admin')) {
            return view('profile.index_user');
        } else {
            return view('profile.index_user');
        }
    }

    public function password(Request $request) {
        if ($request->user()->hasRole('admin')) {
            return view('profile.password');
        } else {
            return view('profile.password');
        }
    }


    public function update(Request $request) {
        $name = $request->input('name');
        $phone = $request->input('celular');
        $password = $request->input('password', null);
        $new_password = $request->input('new_password', null);
        $confirm_password = $request->input('confirm_password', null);

        $user = Auth::user();
        $user->name = $name;
        $user->phone = $phone;

        if (!empty($password)) {
            if (Hash::check($password, $user->getAuthPassword())) {

                if (empty($new_password)) {
                    return response()->redirectTo('/profile')->with('error', trans('app.empty_new_password'));
                }

                if (empty($confirm_password)) {
                    return response()->redirectTo('/profile')->with('error', trans('app.empty_confirm_password'));
                }

                if ($new_password !== $confirm_password) {
                    return response()->redirectTo('/profile')->with('error', trans('app.different_passwords'));
                }

                $user->password = Hash::make($new_password);
            } else {
                return response()->redirectTo('/profile')->with('error', trans('auth.failed'));
            }
        }

        $user->save();

        return response()->redirectTo('/profile')->with('success', trans('app.profile_updated'));

    }
}