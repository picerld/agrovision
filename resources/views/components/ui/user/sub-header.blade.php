<div class="flex justify-between px-5 pb-6">
    <div>
        <h5 class="text-lg font-semibold text-primary">User Terdata</h5>
        <p class="text-sm text-base-content/70">Terdapat <b>{{ \App\Models\User::count() }}</b> User</p>
    </div>
    <form action="{{ route('users.index') }}" method="GET">
        <x-utils.search-input />
    </form>
</div>
