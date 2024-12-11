<form action="{{ route('users.update', $user->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div id="userDrawer-{{ $user->id }}" class="hidden overlay overlay-open:translate-x-0 drawer drawer-start"
        role="dialog" tabindex="-1">
        <div class="drawer-header">
            <h3 class="font-semibold drawer-title">Update Data User</h3>
            <button type="button" class="absolute btn btn-text btn-circle btn-sm end-3 top-3" aria-label="Close"
                onclick="closeDrawer('{{ $user->id }}')">
                <span class="icon-[tabler--x] size-5"></span>
            </button>
        </div>
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
                <input name="password" type="password" placeholder="********" class="input" />
            </label>
            <label class="mb-4 form-control">
                <div class="label">
                    <span class="label-text">Confirm Password</span>
                </div>
                <input name="password_confirmation" type="password" placeholder="********" class="input" />
            </label>
        </div>
        <div class="drawer-footer">
            <button type="button" class="btn btn-soft btn-secondary"
                onclick="closeDrawer('{{ $user->id }}')">Close</button>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
</form>
</div>

<script>
    $(document).ready(function() {
        $(document).on('click', '.view-user', function() {
            let userId = $(this).find('span').data('id');
            let drawer = $('#userDrawer-' + userId);

            drawer.removeClass('translate-x-full hidden');

            setTimeout(function() {
                drawer.addClass('overlay-open');
            }, 10);
        });

        window.closeDrawer = function(userId) {
            let drawer = $('#userDrawer-' + userId);

            drawer.removeClass('overlay-open');
            setTimeout(function() {
                drawer.addClass('translate-x-full hidden');
            }, 500);
        };

        window.addEventListener('click', function(event) {
            const drawer = event.target.closest('.fixed');
            const drawerContent = drawer?.querySelector('.drawer-content');

            if (drawer && !drawerContent.contains(event.target)) {
                const userId = drawer.id.replace('userDrawer-', '');
                closeDrawer(userId);
            }
        });
    });
</script>
