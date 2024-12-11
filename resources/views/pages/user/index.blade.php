<x-app-layout>
    <div class="mx-3 my-5">
        <div class="grid grid-cols-3 gap-4">
            <x-utils.information-card title="User's" subtitle="User Terdata" />
            <x-utils.stats title="User" model="User" icon="user-plus" color="primary" />
        </div>

        <div class="px-4 py-6 mt-4 bg-white shadow-sm rounded-xl">
            <x-ui.user.sub-header />

            <hr>
            <x-ui.user.table :users="$users" />
        </div>
    </div>

</x-app-layout>
