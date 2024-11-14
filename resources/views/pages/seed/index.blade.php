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

            <x-utils.stats title="Distribusi Bibit" model="SeedDistribution" icon="paper-bag" color="primary" />
        </div>
        <div class="grid grid-cols-3 pt-4 gap-4">
            <x-ui.seed.form :schools="$schools" :commodities="$commodities" />

            <x-ui.seed.chart />
        </div>

        <div class="py-6 px-4 bg-white rounded-xl shadow-sm mt-4">
            <div class="flex justify-between pb-6">
                <div>
                    <h5 class="text-lg font-semibold text-primary">Bibit Terdistribusi</h5>
                    <p class="text-sm text-base-content/70">Terdapat <b>90</b> transaksi bibit</p>
                </div>
                <label class="input-group items-center max-w-xs ">
                    <span class="input-group-text">
                        <span class="icon-[tabler--search] text-base-content/80 size-4"></span>
                    </span>
                    <input name="search" type="search" class="input input-md grow" placeholder="Search" />
                    <span class="input-group-text gap-2">
                        <kbd class="kbd kbd-sm">⌘</kbd>
                        <kbd class="kbd kbd-sm">K</kbd>
                    </span>
                </label>
            </div>
            <hr>
            <div class="accordion accordion-shadow w-full pt-4    ">
                {{-- Accordion Loop --}}
                @foreach ($seeds as $seed)
                    <x-ui.seed.card-list :seed="$seed"/>

                    <x-ui.seed.drawer :commodities="$commodities" :schools="$schools" :seed="$seed"/>
                @endforeach
                {{-- End Accordion Loop --}}
            </div>
        </div>
    </div>
</x-app-layout>
