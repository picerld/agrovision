<x-app-layout>
    <div class="mx-3 my-5">
        <div class="grid grid-cols-3 gap-4">
            <div class="col-span-2 stats max-md:stats-vertical">
                <div class="stat">
                    <div class="stat-title">Subscription Plan</div>
                    <div class="stat-value">Premium</div>
                    <div class="stat-actions">
                        <button class="btn btn-sm btn-primary">Upgrade Plan</button>
                    </div>
                </div>

                <div class="stat">
                    <div class="stat-title">Next Billing Date</div>
                    <div class="stat-value">Oct 15, 2024</div>
                    <div class="flex flex-wrap gap-2 stat-actions">
                        <button class="btn btn-sm btn-soft">View Details</button>
                        <button class="btn btn-sm btn-warning btn-soft">Change Payment Method</button>
                    </div>
                </div>
            </div>

            <x-utils.stats title="Komoditas" model="Commodity" icon="leaf" />
        </div>

        <div class="p-2 mt-6 space-y-4 sm:p-2 sm:space-y-6 card">
            {{-- Header --}}
            <div class="flex items-center justify-between p-5">
                <x-ui.commodity.header />
                
                <div class="flex gap-2">
                    <div>
                        <button class="btn btn-primary waves waves-light" type="button" aria-haspopup="dialog"
                            aria-expanded="false" aria-controls="formCommodity"
                            data-overlay="#formCommodity">Tambah +</button>
                    </div>

                    <x-ui.commodity.form-commodity />
                    
                    <div>
                        <label class="max-w-sm input-group">
                            <span class="input-group-text">
                                <span class="icon-[tabler--search] text-base-content/80 size-4"></span>
                            </span>
                            <form id="searchForm" action="{{ route('commodities.index') }}" method="GET">
                                <input type="search" class="input grow" placeholder="Search" name="search"
                                    value="{{ request('search') }}" onkeyup="this.form.submit()" />
                            </form>
                            <span class="gap-2 input-group-text">
                                <kbd class="kbd kbd-sm">⌘</kbd>
                                <kbd class="kbd kbd-sm">K</kbd>
                            </span>
                        </label>

                    </div>
                </div>
            </div>

            @if ($commodities->isEmpty())
                <div class="py-8 text-center">
                    <p class="text-gray-500">
                        @if (request('search'))
                            No results found for "{{ request('search') }}"
                        @else
                            No commodities available
                        @endif
                    </p>
                </div>
            @else
                <x-ui.commodity.card :commodities="$commodities" />
            @endif
        </div>
    </div>
</x-app-layout>
