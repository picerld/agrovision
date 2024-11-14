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
        <div class="grid grid-cols-3 gap-4 pt-4">
            <x-ui.seed.form :schools="$schools" :commodities="$commodities" />

            <x-ui.seed.chart />
        </div>

        <div class="px-4 py-6 mt-4 bg-white shadow-sm rounded-xl">
            <div class="flex justify-between pb-6">
                <div>
                    <h5 class="text-lg font-semibold text-primary">Bibit Terdistribusi</h5>
                    <p class="text-sm text-base-content/70">Terdapat <b>90</b> transaksi bibit</p>
                </div>
                <form action="{{ route('seed-distributions.index') }}" method="GET">
                    <x-utils.search-input />
                </form>
            </div>
            <hr>
            <div class="w-full pt-4 accordion accordion-shadow">
                @forelse ($seeds as $seed)
                    <x-ui.seed.card-list :seed="$seed" />

                    <x-ui.seed.drawer :commodities="$commodities" :schools="$schools" :seed="$seed" />
                @empty
                    <x-utils.empty-card />
                @endforelse
            </div>

            <div class="mx-2">
                {{ $seeds->links('components.utils.pagination') }}
            </div>
        </div>
    </div>
</x-app-layout>
