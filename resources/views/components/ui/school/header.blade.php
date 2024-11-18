<div class="flex flex-col flex-wrap justify-between gap-3 sm:flex-row sm:items-center">
    <div>
        <h5 class="text-lg font-semibold text-primary">Sekolah Terdata</h5>
        <p class="text-sm text-base-content/70">Terdapat <b>{{ \App\Models\School::count() }}</b> sekolah</p>
    </div>
    <div class="flex gap-2">
        <button class="btn btn-primary waves waves-light" type="button" aria-haspopup="dialog" aria-expanded="false"
            aria-controls="drawerSchool" data-overlay="#drawerSchool">Tambah
            +</button>

        <form action="{{ route('schools.index') }}" method="GET">
            <x-utils.search-input />
        </form>
    </div>

    <x-ui.school.drawer />
</div>
