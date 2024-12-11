<x-app-layout>
    <div class="mx-3 my-5">
        <div class="grid grid-cols-3 gap-4">
            <x-utils.information-card title="Pupuk" subtitle="Distribusi Pupuk" />

            <x-utils.stats title="Distribusi Pupuk" model="FertilizerDistribution" icon="plant" color="warning" />
        </div>

        <div class="grid grid-cols-3 gap-4 pt-4">
            <x-ui.fertilizer.form :schools="$schools" />

            <x-ui.fertilizer.chart />
        </div>

        <div class="px-4 py-6 mt-4 bg-white shadow-sm rounded-xl">
            <x-ui.fertilizer.table :fertilizers="$fertilizers" :schools="$schools" />
        </div>

        @foreach ($fertilizers as $fertilizer)
            <x-ui.fertilizer.delete-modal :fertilizer="$fertilizer" />
            <x-ui.fertilizer.drawer :fertilizer="$fertilizer" :schools="$schools" />
        @endforeach
    </div>
</x-app-layout>
