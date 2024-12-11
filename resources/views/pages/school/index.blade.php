<x-app-layout>
    <div class="mx-3 my-5">
        <div class="grid grid-cols-3 gap-4">
            <x-utils.information-card title="Sekolah" subtitle="Sekolah Terdata" />
            <x-utils.stats title="Sekolah" model="School" icon="school" color="error" />
        </div>
    </div>

    <x-ui.school.table :schools="$schools" />

    @foreach ($schools as $school)
        <x-ui.school.detail :school="$school" />
        <x-ui.school.delete-modal :school="$school" />
    @endforeach
</x-app-layout>
