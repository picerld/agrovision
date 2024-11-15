<div class="w-full">
    <div class="mt-8 overflow-x-auto">
        <table class="table">
            <!-- head -->
            <thead>
                <tr>
                    <th scope="button">
                        <input type="checkbox" class="checkbox checkbox-primary checkbox-sm" aria-label="product" />
                    </th>
                    <th scope="school">Sekolah</th>
                    <th scope="quantity" class="text-center">Jumlah</th>
                    <th scope="date" class="text-center">Tanggal</th>
                    <th scope="action" class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($fertilizers as $fertilizer)
                    <tr>
                        <th scope="button">
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
                            <div class="flex justify-center">
                                <button class="btn btn-circle btn-text btn-sm" aria-haspopup="dialog"
                                    aria-expanded="false" aria-controls="overlay-example"
                                    data-overlay="#fertilizerDrawer-{{ $fertilizer->id }}"><span
                                        class="icon-[tabler--pencil]"></span></button>
                                <form action="{{ route('fertilizer-distributions.destroy', $fertilizer->id) }}"
                                    method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-circle btn-text btn-sm"
                                        aria-label="Action button"><span class="icon-[tabler--trash]"></span></button>
                                </form>
                            </div>
                        </td>
                    </tr>

                    <x-ui.fertilizer.drawer :fertilizer="$fertilizer" :schools="$schools" />

                @empty
                    <h1>Data Kosong</h1>
                @endforelse
            </tbody>
        </table>
    </div>

    {{ $fertilizers->links('components.utils.pagination') }}
</div>
