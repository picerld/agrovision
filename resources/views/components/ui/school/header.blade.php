<div class="flex flex-col flex-wrap justify-between gap-3 mx-4 sm:flex-row sm:items-center">
    <div>
        <h5 class="text-lg font-semibold text-primary">Sekolah Terdata</h5>
        <p class="text-sm text-base-content/70">Terdapat <b>{{ $registeredSchools }}</b> sekolah terdaftar</p>
    </div>
    <div class="flex gap-2">
        <button class="btn btn-primary waves waves-light" type="button" aria-haspopup="dialog" aria-expanded="false"
            aria-controls="drawerSchool" data-overlay="#drawerSchool">Tambah
            +</button>

            <div class="flex items-center gap-2">
                <div class="w-full">
                    <select id="perPage"
                        data-select='{
                          "placeholder": "Select option...",
                          "toggleTag": "<button type=\"button\" aria-expanded=\"false\"></button>",
                          "toggleClasses": "advance-select-toggle",
                          "dropdownClasses": "advance-select-menu",
                          "optionClasses": "advance-select-option selected:active",
                          "optionTemplate": "<div class=\"flex justify-between items-center w-full\"><span data-title></span><span class=\"icon-[tabler--check] flex-shrink-0 size-4 text-primary hidden selected:block \"></span></div>",
                          "extraMarkup": "<span class=\"icon-[tabler--caret-up-down] flex-shrink-0 size-4 text-base-content/90 absolute top-1/2 end-3 -translate-y-1/2 \"></span>"
                          }'
                        class="hidden">
                        <option value="5">Per page 5</option>
                        <option value="10" selected>Per page 10</option>
                        <option value="25">Per page 25</option>
                        <option value="50">Per page 50</option>
                        <option value="100">Per page 100</option>
                    </select>
                </div>

                <label class="items-center max-w-xs input-group">
                    <span class="input-group-text">
                        <span class="icon-[tabler--search] text-base-content/80 size-4"></span>
                    </span>

                    <input id="search" name="search" type="search" class="input input-md grow"
                        placeholder="Search" />
                </label>

            </div>
    </div>

    <x-ui.school.drawer />
</div>
