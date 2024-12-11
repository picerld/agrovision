<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index(Request $request)
    {
        $users = $this->userService->getAll();

        if ($request->ajax()) {
            return DataTables::of($users)
                ->addColumn('action', function ($user) {
                    return '
                    <div class="flex items-center justify-center gap-2">
                <button type="button" class="btn btn-circle btn-text btn-sm delete-user"
                        data-id="' . $user->id . '" aria-label="Delete User">
                    <span class="icon-[tabler--trash]"></span>
                </button>
                <button type="button" class="btn btn-circle btn-text btn-sm view-user" aria-label="View Detail">
                    <span class="icon-[tabler--dots-vertical]" data-id="' . $user->id . '"></span>
                </button>
            </div>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('pages.user.index', [
            'users' => $users,
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
                'name' => 'required|min:5|max:50',
                'username' => 'required|min:5|max:50',
                'password' => 'required|min:5|max:50',
                'phone_number' => 'required|min:11|max:13',
                'role_id' => 'required|exists:roles,id',
            ]);

            $this->userService->store($validated);

            session()->flash('toast', [
                'type' => 'primary',
                'message' => 'User created successfully'
            ]);

            return redirect()->route('users.index');
        } catch (\Throwable $th) {
            session()->flash('toast', [
                'type' => 'error',
                'message' => $th->getMessage()
            ]);

            return redirect()->back();
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
        try {
            $validated = $request->validate([
                'name' => 'required|min:5|max:50',
                'username' => 'required|min:5|max:50',
                'password' => 'nullable|confirmed',
                'phone_number' => 'required|min:11|max:13',
            ]);

            $user = $this->userService->getOne($id);

            $validated['password'] = Hash::make($validated['password'] ?? $user->password);

            $this->userService->update($id, $validated);

            session()->flash('toast', [
                'type' => 'primary',
                'message' => 'User updated successfully'
            ]);

            return redirect()->route('users.index');
        } catch (\Throwable $th) {
            session()->flash('toast', [
                'type' => 'error',
                'message' => $th->getMessage()
            ]);

            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->userService->delete($id);

        session()->flash('toast', [
            'type' => 'primary',
            'message' => 'User deleted successfully'
        ]);

        return redirect()->route('users.index');
    }
}
