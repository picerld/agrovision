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
        $data['guard_name'] = $data['guard_name'] ?? 'web';
        $timestamps = now();
            'name' => $data['name'],
            'guard_name' => $data['guard_name'],
            'created_at' => $timestamps,
            'updated_at' => $timestamps,
        ]);

        $this->storePermissionsModel($role, $data);

        foreach ($data['permissions'] as $permission) {
            DB::table('role_has_permissions')->insert([
                'permission_id' => $permission,
                'role_id' => $role->id,
            ]);
        }

        return $role;
    }
}
