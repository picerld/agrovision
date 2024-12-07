<x-app-layout>
    <div class="mx-3 my-5">
        <div class="grid grid-cols-3 gap-4">
            <x-utils.information-card title="Komoditas" subtitle="Komoditas Terdata" />
            <x-utils.stats title="Komoditas" model="Commodity" icon="leaf" />
        </div>

        <div class="p-4 mt-6 bg-white card">
            <div class="flex flex-col gap-4 p-5 sm:flex-row sm:justify-between sm:items-center">
                <x-ui.commodity.header />

                <div class="flex gap-2">
                    <div class="flex gap-4">
                        <select id="categoryFilter" class="select select-md">
                            <option value="">All Categories</option>
                            <option value="Fruits">Fruits</option>
                            <option value="Vegetables">Vegetables</option>
                            <option value="Grains">Grains</option>
                        </select>
                    </div>

                    <button class="px-4 py-2 transition rounded-md shadow-md btn btn-primary hover:bg-primary-dark"
                        type="button" data-overlay="#formCommodity" aria-haspopup="dialog" aria-expanded="false">
                        Tambah +
                    </button>

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

                        <x-ui.commodity.form-commodity />
                    </div>
                </div>
            </div>

            <x-ui.commodity.table />
            
            @foreach ($commodities as $commodity)
                <x-ui.commodity.detail :commodity="$commodity" />
            @endforeach
        </div>
    </div>
</x-app-layout>
