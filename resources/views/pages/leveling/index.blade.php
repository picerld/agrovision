<x-app-layout>
    <div class="container min-h-[90vh] px-3 py-5 mx-auto space-y-8">
        <!-- Add Role Form -->
        <form action="{{ route('levelings.store') }}" method="POST" class="p-6 card card-bordered">
            @csrf
            <div class="w-full mb-4 form-control">
                <label for="roleName" class="label">
                    <span class="text-[1.2rem] font-semibold label-text">Nama Role</span>
                </label>
                <input type="text" name="name" id="roleName" class="w-full input input-primary"
                    placeholder="Admin, User, etc.." required />
            </div>

            <div class="w-full mb-4 form-control">
                <h4 class="my-4 font-semibold text-[1.2rem] label-text">Permissions</h4>
                @foreach ($permissions as $group => $groupedPermissions)
                    <div class="mb-4">
                        <h4 class="mb-2 text-lg font-normal">{{ $group }}</h4>
                        <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3">
                            @foreach ($groupedPermissions as $permission)
                                <label class="flex gap-2 form-control">
                                    <input type="checkbox" name="permissions[]" value="{{ $permission->id }}"
                                        class="checkbox checkbox-primary" checked />
                                    <span class="flex-col items-start pt-0 -mt-1 cursor-pointer label">
                                        <span class="text-base label-text">{{ $permission->name }}</span>
                                        <span class="label-text-alt">Notify me when this action happens.</span>
                                    </span>
                                </label>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>

            <button type="submit" class="w-full text-white btn btn-primary">
                Add Role & Permissions
            </button>
        </form>

        <div class="p-6 shadow-md card card-bordered">
            <h3 class="mb-4 text-2xl font-semibold text-gray-600">Role Tersedia</h3>
            <div class="overflow-x-auto">
                <table class="table w-full table-zebra">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Permissions</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $role)
                            <tr>
                                <td class="font-medium">{{ $role->name }}</td>
                                <td>
                                    <form action="{{ route('levelings.update', $role->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        @foreach ($permissions as $group => $groupedPermissions)
                                            <div class="mb-4">
                                                <h4 class="mb-2 text-lg font-semibold">{{ $group }}</h4>
                                                <div class="grid grid-cols-1 gap-2 md:grid-cols-2 lg:grid-cols-3">
                                                    @foreach ($groupedPermissions as $permission)
                                                        <label class="flex items-center gap-2 cursor-pointer">
                                                            <input type="checkbox" name="permissions[]"
                                                                value="{{ $permission->id }}"
                                                                class="checkbox checkbox-primary"
                                                                {{ $role->permissions->contains($permission->id) ? 'checked' : '' }} />
                                                            <span class="text-sm">{{ $permission->name }}</span>
                                                        </label>
                                                    @endforeach
                                                </div>
                                            </div>
                                        @endforeach
                                        <button type="submit"
                                            class="mt-4 btn btn-sm btn-primary btn-soft">Update</button>
                                    </form>
                                </td>
                                <td>
                                    <form action="{{ route('levelings.destroy', $role->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-error btn-soft">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
