<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Role;

class RoleController extends Controller
{
    public function getList() {
        $data = Role::query()->orderBy('display_name', 'asc')->get();
        return response()->json($data);
    }
}