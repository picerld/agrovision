<div class="flex justify-between px-5 pb-6">
    <div>
        <h5 class="text-lg font-semibold text-primary">User Terdata</h5>
        <p class="text-sm text-base-content/70">Terdapat <b>{{ \App\Models\User::count() }}</b> User</p>
    </div>
    <div class="flex gap-2">
        <button class="btn btn-primary waves waves-light" type="button" aria-haspopup="dialog" aria-expanded="false"
            aria-controls="drawerUser" data-overlay="#drawerUser">Tambah
            +</button>

        <form action="{{ route('users.index') }}" method="GET">
            <x-utils.search-input />
        </form>

        <x-ui.user.drawer />
    </div>
</div>
