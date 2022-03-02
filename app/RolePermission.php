<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RolePermission extends Model
{
    public $incrementing = false;

    public $timestamps = false;

    protected $table = 'permission_role';
}
