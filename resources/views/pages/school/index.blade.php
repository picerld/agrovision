<x-app-layout>
    <div class="mx-3 my-5">
        <div class="grid grid-cols-3 gap-4">
            <x-utils.information-card title="Sekolah" subtitle="Sekolah Terdata" />
            <x-utils.stats title="Sekolah" model="School" icon="school" color="error" />
        </div>
    </div>

    <x-ui.school.table :schools="$schools" />
</x-app-layout>
