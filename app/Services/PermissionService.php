<?php

namespace App\Services;

use App\Helpers\ImageHelper;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;

class PermissionService
{
    public function getAll()
    {
        return Permission::all()->groupBy('group');
    }

    public function getOne($id)
    {
        return DB::table('permissions')->where('id', $id)->first();
    }
}
