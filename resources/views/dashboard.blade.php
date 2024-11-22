<x-app-layout>
    <div class="flex py-5">
        <div class="grid lg:grid-cols-4 md:grid-cols-2 grid-cols-1 gap-4.5 w-full mx-3">
            <x-utils.stats title="Komoditas" model="Commodity" icon="leaf" color="primary" />
            <x-utils.stats title="Distribusi Pupuk" model="FertilizerDistribution" icon="plant" color="warning" />
            <x-utils.stats title="Distribusi Bibit" model="SeedDistribution" icon="paper-bag" color="primary" />
            <x-utils.stats title="Sekolah" model="School" icon="school" color="error" />
        </div>
    </div>
    
    <x-utils.distribution-chart />

    <div class="mx-3">
        <div class="grid grid-cols-2 gap-4">
            <x-ui.dashboard.fertilizer-list />
            
            <x-ui.dashboard.seed-list />
        </div>
    </div>

    <div class="mx-3 my-5 card">
        <div class="card-body">
            <h5 class="mb-5 card-title">Table Komoditas</h5>
            <x-ui.commodity.table :commodities="$commodities" />
        </div>
    </div>

</x-app-layout>
