<aside id="sidebar"
    class="fixed lg:sticky lg:top-16 flex flex-col bg-white border-r h-[calc(100vh-4rem)] w-64 lg:w-auto overlay sm:shadow-none overlay-open:translate-x-0 drawer drawer-start hidden max-w-64 sm:absolute sm:z-0 sm:flex sm:translate-x-0"
    role="dialog" tabindex="-1">
    <div class="flex flex-col flex-1 overflow-y-auto">
        <nav class="flex-1 px-2 py-4 space-y-2">
            <!-- Dashboard -->
            <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                <span class="icon-[tabler--home] mr-3"></span>
                Dashboard
            </x-nav-link>

            <!-- Komoditas -->
            @can('view commodity')
                <x-nav-link :href="route('commodities.index')" :active="request()->routeIs('commodities.index')">
                    <span class="icon-[tabler--leaf] mr-3"></span>
                    Komoditas
                </x-nav-link>
            @endcan
            @can('view school')
                <x-nav-link :href="route('schools.index')" :active="request()->routeIs('schools.index')">
                    <span class="icon-[tabler--school] mr-3"></span>
                    Sekolah
                </x-nav-link>
            @endcan

            @can('view fertilizer')
                <x-nav-link :href="route('fertilizer-distributions.index')" :active="request()->routeIs('fertilizer-distributions.index')">
                    <span class="icon-[tabler--plant] mr-3"></span>
                    Distribusi Pupuk
                </x-nav-link>
            @endcan

            @can('view seed')
                <x-nav-link :href="route('seed-distributions.index')" :active="request()->routeIs('seed-distributions.index')">
                    <span class="icon-[tabler--paper-bag] mr-3"></span>
                    Distribusi Bibit
                </x-nav-link>
            @endcan

            @can('view user')
                <x-nav-link :href="route('users.index')" :active="request()->routeIs('users.index')">
                    <span class="icon-[tabler--user] mr-3"></span>
                    User
                </x-nav-link>
            @endcan

            @can('view leveling')
                <x-nav-link :href="route('levelings.index')" :active="request()->routeIs('levelings.index')">
                    <span class="icon-[tabler--key] mr-3"></span>
                    Leveling
                </x-nav-link>
            @endcan
        </nav>
    </div>
</aside>
