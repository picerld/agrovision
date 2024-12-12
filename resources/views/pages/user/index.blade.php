<x-app-layout>
    <div class="mx-3 my-5">
        <div class="grid grid-cols-3 gap-4">
            <x-utils.information-card title="Pengguna" subtitle="User Terdata" />
            <x-utils.stats title="Pengguna" model="User" icon="user" color="secondary" />
        </div>

        <div class="px-4 py-6 mt-4 bg-white shadow-sm rounded-xl">
            <x-ui.user.table :users="$users" />
        </div>

        @foreach ($users as $user)
            <x-ui.user.detail :user="$user" />
            <x-ui.user.delete-modal :user="$user" />
        @endforeach
    </div>
</x-app-layout>
