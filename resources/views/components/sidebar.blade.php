<aside id="sidebar" x-data="{ open: false }"
    :class="{ 'translate-x-0': open, '-translate-x-full lg:translate-x-0': !open }"
    class="fixed lg:sticky lg:top-16 flex flex-col bg-white border-r h-[calc(100vh-4rem)] w-64 lg:w-auto">
    <div class="flex flex-col flex-1 overflow-y-auto">
        <nav class="flex-1 px-2 py-4 space-y-2">
            <a href="#" class="flex items-center px-4 py-2 text-gray-700 rounded-lg hover:bg-gray-100">
                <span class="icon-[tabler--home] mr-3"></span>
                Dashboard
            </a>
            <a href="#" class="flex items-center px-4 py-2 text-gray-700 rounded-lg hover:bg-gray-100">
                <span class="icon-[tabler--leaf] mr-3"></span>
                Komoditas
            </a>
            <a href="#" class="flex items-center px-4 py-2 text-gray-700 rounded-lg hover:bg-gray-100">
                <span class="icon-[tabler--sun] mr-3"></span>
                Distribusi Bibit
            </a>
            <a href="#" class="flex items-center px-4 py-2 text-gray-700 rounded-lg hover:bg-gray-100">
                <span class="icon-[tabler--droplet] mr-3"></span>
                Distribusi Pupuk
            </a>
        </nav>
    </div>
</aside>
