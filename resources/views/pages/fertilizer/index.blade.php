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

            <x-utils.stats title="Distribusi Pupuk" model="FertilizerDistribution" icon="plant" color="warning" />
        </div>


        <div class="grid grid-cols-3 pt-4 gap-4">
            <x-ui.fertilizer.form :schools="$schools"/>

            <x-ui.fertilizer.chart />
        </div>

        <div class="py-6 px-4 bg-white rounded-xl shadow-sm mt-4">
            <x-ui.fertilizer.sub-header />

            <hr>
            <x-ui.fertilizer.table :fertilizers="$fertilizers" :schools="$schools" />
        </div>
    </div>
</x-app-layout>
