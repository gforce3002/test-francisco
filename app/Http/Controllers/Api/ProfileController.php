<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class ProfileController extends Controller
{
    public function get(Request $request) {
        $user = $request->user();
        $role = DB::table('role_user')
            ->join('roles', 'roles.id', '=', 'role_user.role_id')
            ->where('role_user.user_id', $user->id)
            ->select('roles.*')
            ->first();

        if (empty($role)) {
            $role = new Role();
            $role->name = 'user';
            $role->display_name = 'Usuario';
        }

        $user->role = $role;

        return $user;
    }

    public function update(Request $request) {
        $user = $request->user();

        $name = $request->get('name', $user->name);
        $user->name = $name;

        $user->save();

        return $user;
    }

    public function updatePassword(Request $request) {
        $actual = $request->get('actual');
        $newPassword = $request->get('newPassword');
        $confirmPassword = $request->get('confirmPassword');
        $user = $request->user();

        if (!Hash::check($actual, $user->password)) {
            return response()->json(['error' => 'notAuthorized'])->setStatusCode(401);
        }

        $user->password = Hash::make($newPassword);
        $user->save();

        return response()->json([])->setStatusCode(204);
    }
}