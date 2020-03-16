<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function getList(Request $request) {
        $data = User::query()
            ->leftJoin('role_user as ru', 'ru.user_id', '=', 'users.id')
            ->leftJoin('roles as r', 'r.id', '=', 'ru.role_id')
            ->orderBy('users.name', 'asc')
            ->select('users.*', 'r.display_name as role')
            ->get();

        return response()->json($data);
    }

    public function create(Request $request) {
        $email = $request->get('email');
        $name = $request->get('name');
        $password = $request->get('password');
        $role = $request->get('role');
        $count = User::where('email', $email)->count();

        if ($count != 0) {
            return response()->json(['error' => 'duplicated'])->setStatusCode(409);
        }

        $data = new User();
        $data->email = $email;
        $data->name = $name;
        $data->password = Hash::make($password);
        $data->save();

        if (!empty($role)) {
          Artisan::call('user:role', [
            'email' => $email,
            'role' => $role
          ]);
        }

        Artisan::call('user:mail', [
            'email' => $email,
            'password' => $password
        ]);

        return response()->json($data)->setStatusCode(201);
    }

    public function update(Request $request, $id) {
        $name = $request->get('name');
        $password = $request->get('password');
        $role = $request->get('role');
        $data = User::where('id', $id)->first();
        $data->name = $name;

        if (!empty($password))
            $data->password = Hash::make($password);

        $data->save();

        if (!empty($role)) {
          Artisan::call('user:role', [
            'email' => $data->email,
            'role' => $role
          ]);
        }

        return response()->json($data)->setStatusCode(201);
    }

    public function get(Request $request, $id) {
        $data = User::query()
          ->leftJoin('role_user as ru', 'ru.user_id', '=', 'users.id')
          ->leftJoin('roles as r', 'r.id', '=', 'ru.role_id')
          ->orderBy('users.name', 'asc')
          ->select('users.*', 'r.name as role')
          ->where('users.id', $id)
          ->first();

      return response()->json($data);
    }
}
