<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index(Request $request)
    {
        $search = $request->input('search');
        $perPage = $request->input('perPage', 6);

        $users = $search ? $this->userService->search($search) : $this->userService->getAll($perPage);

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
                'username' => 'required|min:5|max:50|email',
                'password' => 'required|min:5|max:50',
                'phone_number' => 'required|min:11|max:13',
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
                'username' => 'required|min:5|max:50|email',
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
