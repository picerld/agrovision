<x-app-layout>
    <div class="mx-3 my-5">
        <div class="grid grid-cols-3 gap-4">
            <x-utils.information-card title="Bibit" subtitle="Distribusi Bibit" />
            <x-utils.stats title="Distribusi Bibit" model="SeedDistribution" icon="paper-bag" color="primary" />
        </div>
        <div class="grid grid-cols-3 gap-4 pt-4">
            <x-ui.seed.form :schools="$schools" :commodities="$commodities" />

            <x-ui.seed.chart />
        </div>

        <x-ui.seed.table :seeds="$seeds" :schools="$schools" :commodities="$commodities"/>

    </div>
</x-app-layout>
