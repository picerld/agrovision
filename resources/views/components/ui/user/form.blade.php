<form action="{{ route('users.store') }}" method="POST">
    @csrf
    <div class="justify-start drawer-body">
        <label class="mb-4 form-control">
            <div class="label">
                <span class="label-text">Nama</span>
            </div>
            <input name="name" type="text" placeholder="Silfi Nuraini" class="input" />
        </label>
        <label class="mb-4 form-control">
            <div class="label">
                <span class="label-text">Nomor Telepon</span>
            </div>
            <input name="phone_number" type="text" placeholder="08#########" class="input" />
        </label>
        <label class="mb-4 form-control">
            <div class="label">
                <span class="label-text">Username</span>
            </div>
            <input name="username" type="text" placeholder="silfi@agrovision" class="input" />
        </label>
        <label class="mb-4 form-control">
            <div class="label">
                <span class="label-text">Password</span>
            </div>
            <input name="password" type="password" placeholder="********" class="input" />
        </label>
        <label class="mb-4 form-control">
            <div class="label">
                <span class="label-text">Role</span>
            </div>
            <select class="max-w-sm appearance-none select" aria-label="Select floating label" name="role_id">
                @foreach ($roles as $role)
                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                @endforeach
            </select>
        </label>
    </div>
    <div class="drawer-footer">
        <button type="button" class="btn btn-soft btn-secondary" data-overlay="#drawerUser">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>
