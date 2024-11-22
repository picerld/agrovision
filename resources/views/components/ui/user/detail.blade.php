<div id="userDrawer-{{ $user->id }}"
    class="justify-start hidden overlay overlay-open:translate-x-0 drawer drawer-start" role="dialog" tabindex="-1">
    <div class="drawer-header">
        <h3 class="font-semibold drawer-title">Update Data Sekolah</h3>
        <button type="button" class="absolute btn btn-text btn-circle btn-sm end-3 top-3" aria-label="Close"
            data-overlay="#userDrawer-{{ $user->id }}">
            <span class="icon-[tabler--x] size-5"></span>
        </button>
    </div>
    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="justify-start drawer-body">
            <label class="mb-4 form-control">
                <div class="label">
                    <span class="label-text">Nama</span>
                </div>
                <input name="name" value="{{ $user->name }}" type="text" placeholder="Silfi Nuraini"
                    class="input" />
            </label>
            <label class="mb-4 form-control">
                <div class="label">
                    <span class="label-text">Nomor Telepon</span>
                </div>
                <input name="phone_number" value="{{ $user->phone_number }}" type="text" placeholder="08#########"
                    class="input" />
            </label>
            <label class="mb-4 form-control">
                <div class="label">
                    <span class="label-text">Username</span>
                </div>
                <input name="username" value="{{ $user->username }}" type="text" placeholder="silfi@agrovision"
                    class="input" />
            </label>
            <label class="mb-4 form-control">
                <div class="label">
                    <span class="label-text">New Password</span>
                </div>
                <input name="password" type="password" placeholder="********"
                    class="input" />
            </label>
            <label class="mb-4 form-control">
                <div class="label">
                    <span class="label-text">Confirm Password</span>
                </div>
                <input name="password_confirmation" type="password" placeholder="********"
                    class="input" />
            </label>
        </div>
        <div class="drawer-footer">
            <button type="button" class="btn btn-soft btn-secondary" data-overlay="#drawerUser">Close</button>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>
