<div class="card">
    <div class="card-body">
        <h5 class="card-title mb-2.5">Distribusi Pupuk</h5>
        <div class="w-full">
            <div class="mt-8 overflow-x-auto">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="school" class="font-semibold">Sekolah</th>
                            <th scope="kuantiti" class="font-semibold">Kuantiti</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($fertilizers as $fertilizer)
                            <tr class="hover">
                                <td>
                                    <div class="flex items-center">
                                        <span class="p-1 rounded-full badge badge-primary badge-soft me-2">
                                            <span class="icon-[tabler--school]"></span>
                                        </span>
                                        {{ $fertilizer->school_name }}
                                    </div>
                                </td>
                                <td>{{ $fertilizer->fertilizer_qty }} KG</td>
                            </tr>
                        @empty
                            <x-utils.empty-card />
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{ $fertilizers->links('components.utils.pagination') }}
        </div>
    </div>
</div>
