<div class="flex flex-col flex-wrap gap-3 sm:flex-row sm:items-center sm:justify-between">
    <div class="relative inline-flex dropdown">
        <button id="dropdown-default" type="button" class="font-normal dropdown-toggle btn btn-outline btn-secondary"
            aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
            <span class="icon-[tabler--clock]"></span>
            Last 30 days
            <span class="icon-[tabler--chevron-down] dropdown-open:rotate-180 size-4"></span>
        </button>
        <ul class="hidden dropdown-menu dropdown-open:opacity-100 min-w-10" role="menu" aria-orientation="vertical"
            aria-labelledby="dropdown-default">
            <li><a class="dropdown-item" href="javascript:void(0)">Last 3 days</a></li>
            <li><a class="dropdown-item" href="javascript:void(0)">Last 7 days</a></li>
            <li><a class="dropdown-item" href="javascript:void(0)">Last 30 days</a></li>
            <li><a class="dropdown-item" href="javascript:void(0)">Last 3 months</a></li>
            <li><a class="dropdown-item" href="javascript:void(0)">Last year</a></li>
        </ul>
    </div>
    <div class="flex gap-3">
        <button class="btn btn-primary waves waves-light" type="button" aria-haspopup="dialog" aria-expanded="false"
            aria-controls="drawerSchool" data-overlay="#drawerSchool">Tambah
            +</button>

        <x-ui.school.drawer />

        <label class="max-w-xs input-group">
            <span class="input-group-text">
                <span class="icon-[tabler--search] size-6"></span>
            </span>
            <form action="{{ route('schools.index') }}" method="GET">
                <input type="search" value="{{ request('search') }}" class="input grow" name="search"
                    placeholder="Search" onkeyup="this.form.submit()" />
            </form>
        </label>
    </div>
</div>
