<div class="w-full">
    <div class="mt-8 overflow-x-auto">
        <table class="table">
            <!-- head -->
            <thead>
                <tr>
                    <th>
                        <input type="checkbox" class="checkbox checkbox-primary checkbox-sm"
                            aria-label="product" />
                    </th>
                    <th>Sekolah</th>
                    <th class="text-center">Jumlah</th>
                    <th class="text-center">Tanggal</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($fertilizers as $fertilizer)
                    <tr>
                        <th>
                            <label>
                                <input type="checkbox" class="checkbox checkbox-primary checkbox-sm"
                                    aria-label="product" />
                            </label>
                        </th>
                        <td>
                            <div class="flex items-center gap-3">
                                <div>
                                    <div class="text-sm opacity-50">{{ $fertilizer->pic }}</div>
                                    <div class="font-medium">{{ $fertilizer->school_name }}</div>
                                </div>
                            </div>
                        </td>
                        <td class="text-center">{{ $fertilizer->fertilizer_qty }} KG</td>
                        <td class="text-center">{{ $fertilizer->date }}</td>
                        <td class="text-center">
                            <button class="btn btn-circle btn-text btn-sm" aria-haspopup="dialog"
                                aria-expanded="false" aria-controls="overlay-example"
                                data-overlay="#fertilizerDrawer-{{ $fertilizer->id }}"><span
                                    class="icon-[tabler--pencil]"></span></button>
                            <button class="btn btn-circle btn-text btn-sm"
                                aria-label="Action button"><span
                                    class="icon-[tabler--trash]"></span></button>
                            <button class="btn btn-circle btn-text btn-sm"
                                aria-label="Action button"><span
                                    class="icon-[tabler--dots-vertical]"></span></button>
                        </td>
                    </tr>

                   <x-ui.fertilizer.drawer :fertilizer="$fertilizer" :schools="$schools" />
                @endforeach
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