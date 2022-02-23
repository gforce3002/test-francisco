<?php

use App\Permission;
use App\Role;
use App\RolePermission;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UsersPermissions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $role = Role::query()->where('name', 'admin')->first();

        $permission = new Permission();
        $permission->name = 'user-index';
        $permission->display_name = 'Ver usuarios';
        $permission->save();

        $attach = new RolePermission();
        $attach->role_id = $role->id;
        $attach->permission_id = $permission->id;
        $attach->save();

        $permission = new Permission();
        $permission->name = 'user-edit';
        $permission->display_name = 'Crear/Editar usuarios';
        $permission->save();

        $attach = new RolePermission();
        $attach->role_id = $role->id;
        $attach->permission_id = $permission->id;
        $attach->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
