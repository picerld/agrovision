<div class="w-full px-5">
    <table class="table">
        <!-- head -->
        <thead>
            <tr>
                <th>Komoditas</th>
                <th>Masa Panen</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($commodities as $commodity)
                <tr>
                    <td>
                        <div class="flex items-center gap-3">
                            <div class="avatar">
                                <div class="rounded-md size-16 bg-base-content/10">
                                    <img class="object-cover w-full h-56 transition-all duration-300 ease-in hover:scale-110 hover:bg-gray-50"
                                    src="{{ asset('storage/commodities/' . $commodity->image) }}" alt="{{ $commodity->name }}" />
                                </div>
                            </div>
                            <div>
                                <div class="text-lg font-medium">{{ $commodity->name }}</div>
                            </div>
                        </div>
                    </td>
                    <td>{{ $commodity->harvest_date }}</td>
                    
                    <td>
                        <button class="btn btn-circle btn-text btn-lg" aria-label="Action button" aria-haspopup="dialog" aria-expanded="false"
                        aria-controls="commodityDetailModal-{{ $commodity->id }}"
                        data-overlay="#commodityDetailModal-{{ $commodity->id }}"><span
                                class="icon-[tabler--eye]" ></span></button>
                    </td>
                </tr>

                <x-ui.commodity.detail :commodities="$commodities"/>
            @endforeach
        </tbody>
    </table>

    {{ $commodities->links('components.utils.pagination') }}
</div>
