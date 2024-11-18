<div class="mx-3 my-5 card">
    <div class="card-body">
        <div class="w-full">
            <div class="flex justify-between pb-6">
                <div>
                    <h5 class="text-lg font-semibold text-primary">Bibit Terdistribusi</h5>
                    <p class="text-sm text-base-content/70">Terdapat <b>90</b> transaksi bibit</p>
                </div>
                <form action="{{ route('seed-distributions.index') }}" method="GET">
                    <x-utils.search-input />
                </form>
            </div>
            

            <div class="mt-8 overflow-x-auto">
                <table class="table">
                    <!-- head -->
                    <thead>
                        <tr>
                            <th>Sekolah</th>
                            <th>Bibit</th>
                            <th>Jumlah</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($seeds as $seed)
                            <tr>
                                <td>
                                    <div class="flex items-center gap-3">
                                        <div class="avatar">
                                            <div class="w-10 h-10 rounded-md bg-base-content/10">
                                                <img src="{{ asset('storage/commodities/' . $seed->image) }}"
                                                    alt="{{ $seed->name }}" />
                                            </div>
                                        </div>
                                        <div>
                                            <div class="text-sm opacity-70">{{ $seed->pic }}</div>
                                            <div class="font-medium">{{ $seed->school_name }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="flex items-center">
                                        <span class="p-1 rounded-full badge badge-success badge-soft me-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="1em"
                                                class="shrink size-4" height="1em" viewBox="0 0 24 24">
                                                <g fill="none" stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2">
                                                    <path
                                                        d="M8 3h8a2 2 0 0 1 2 2v1.82a5 5 0 0 0 .528 2.236l.944 1.888A5 5 0 0 1 20 13.18V19a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2v-5.82a5 5 0 0 1 .528-2.236L6 8V5a2 2 0 0 1 2-2" />
                                                    <path
                                                        d="M12 15a2 2 0 1 0 4 0a2 2 0 1 0-4 0m-6 6a2 2 0 0 0 2-2v-5.82a5 5 0 0 0-.528-2.236L6 8m5-1h2" />
                                                </g>
                                            </svg>
                                        </span>
                                        {{ $seed->name }}
                                    </div>
                                </td>
                                <td>{{ $seed->seed_qty }} {{ $seed->unit }}</td>
                                <td>{{ $seed->date }}</td>
                                <td>
                                    <div class="flex">
                                        <button class="btn btn-circle btn-text btn-sm"
                                            aria-label="Action button" aria-haspopup="dialog"
                                            aria-expanded="false" aria-controls="seedDrawer"
                                            data-overlay="#seedDrawer-{{ $seed->seed_id }}"><span
                                                class="icon-[tabler--pencil]"></span></button>
                                        <form action="{{ route('seed-distributions.destroy', $seed->seed_id) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-circle btn-text btn-sm"
                                                aria-label="Action button"><span
                                                    class="icon-[tabler--trash]"></span></button>
                                        </form>
                                    </div>
                                </td>

                                <x-ui.seed.drawer :seed="$seed" :schools="$schools" :commodities="$commodities" />
                            </tr>
                        @empty
                            <p>Tidak ada data.</p>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="flex flex-wrap items-center justify-between gap-2 py-4 pt-6">
                <div class="block max-w-sm text-sm font-normal text-gray-500 me-2 sm:mb-0">
                    Showing
                    <span class="font-semibold text-gray-900">1-4</span>
                    of
                    <span class="font-semibold">20</span>
                    products
                </div>
                <nav class="flex items-center gap-x-1">
                    <button type="button" class="btn btn-sm btn-outline">Previous</button>
                    <div class="flex items-center gap-x-1">
                        <button type="button"
                            class="btn btn-sm btn-outline btn-square aria-[current='page']:text-border-primary aria-[current='page']:bg-primary/10">1</button>
                        <button type="button"
                            class="btn btn-sm btn-outline btn-square aria-[current='page']:text-border-primary aria-[current='page']:bg-primary/10"
                            aria-current="page">2</button>
                        <button type="button"
                            class="btn btn-sm btn-outline btn-square aria-[current='page']:text-border-primary aria-[current='page']:bg-primary/10">3</button>
                    </div>
                    <button type="button" class="btn btn-sm btn-outline">Next</button>
                </nav>
            </div>
        </div>
    </div>
</div>