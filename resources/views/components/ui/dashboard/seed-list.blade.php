<div class="card">
    <div class="card-body">
        <h5 class="card-title mb-2.5">Distribusi Bibit</h5>
        <div class="w-full">
            <div class="mt-8 overflow-x-auto">
                <table class="table">
                    <!-- head -->
                    <thead>
                        <tr>
                            <th scope="komoditas">Komoditas</th>
                            <th scope="kuantiti">Kuantiti</th>
                            <th scope="sekolah">Sekolah</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($seeds as $seed)
                            <tr class="cursor-pointer hover">
                                <td>
                                    <div class="flex items-center gap-3">
                                        <div class="avatar">
                                            <div class="w-10 h-10 rounded-md bg-base-content/10">
                                                <img src="{{ asset('storage/commodities/' . $seed->image) }}"
                                                    alt="{{ $seed->name }}" />
                                            </div>
                                        </div>
                                        <div>
                                            <div class="font-medium">{{ $seed->name }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ $seed->seed_qty }} {{ $seed->unit }}</td>
                                <td>
                                    <div class="flex items-center">
                                        <span class="p-1 rounded-full badge badge-primary badge-soft me-2">
                                            <span class="icon-[tabler--school]"></span>
                                        </span>
                                        {{ $seed->school_name }}
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <x-utils.empty-card />
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{ $seeds->links('components.utils.pagination') }}
        </div>
    </div>
</div>
