<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class RoleService
{
    protected $permissionService;

    public function __construct(PermissionService $permissionService)
    {
        $this->permissionService = $permissionService;
    }
    public function getAll()
    {
        return DB::table('roles')->get();
    }

    public function getWithPermissions()
    {
        return Role::with('permissions')->orderBy('name', 'ASC')->get();
    }

    public function getOne($id)
    {
        return DB::table('roles')->where('id', $id)->first();
    }

    public function store($data)
    {
        $data['guard_name'] = 'web';
        $data['created_at'] = now();
        $data['updated_at'] = now();

        $role = DB::table('roles')->insertGetId([
            'name' => $data['name'],
            'guard_name' => $data['guard_name'],
            'created_at' => $data['created_at'],
            'updated_at' => $data['updated_at'],
        ]);

        $this->storePermissionsModel($role, $data);

        return $role;
    }

    public function storePermissionsModel($id, $data)
    {
        foreach ($data['permissions'] as $permission) {
            DB::table('role_has_permissions')->insert([
                'role_id' => $id,
                'permission_id' => $permission,
            ]);
        }
    }
}
