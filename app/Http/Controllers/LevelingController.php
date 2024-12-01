<?php

namespace App\Http\Controllers;

use App\Services\PermissionService;
use App\Services\RoleService;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class LevelingController extends Controller
{
    protected $roleService;
    protected $permissionService;

    public function __construct(RoleService $roleService, PermissionService $permissionService)
    {
        $this->roleService = $roleService;
        $this->permissionService = $permissionService;
    }

    public function index()
    {
        $permissions = $this->permissionService->getAll();
        $roles = $this->roleService->getWithPermissions();

        return view('pages.leveling.index', [
            'permissions' => $permissions,
            'roles' => $roles
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:50',
                'permissions' => 'required|array|min:1',
                'permissions.*' => 'required|exists:permissions,id',
            ]);

            $this->roleService->store($validated);

            session()->flash('toast', [
                'type' => 'primary',
                'message' => 'Role created successfully'
            ]);

            return redirect()->route('levelings.index');
        } catch (\Throwable $th) {
            session()->flash('toast', [
                'type' => 'error',
                'message' => $th->getMessage()
            ]);

            return redirect()->route('levelings.index');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
