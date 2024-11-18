<div class="w-full px-5">
    <table class="table">
        <!-- head -->
        <thead>
            <tr>
                <th>Nama</th>
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
                                <div class="w-10 h-10 rounded-md bg-base-content/10">
                                    <img class="object-cover w-full h-48 transition-all duration-300 ease-in hover:scale-110 hover:bg-gray-50"
                                    src="{{ asset('storage/commodities/' . $commodity->image) }}" alt="{{ $commodity->name }}" />
                                </div>
                            </div>
                            <div>
                                <div class="font-medium text-lg">{{ $commodity->name }}</div>
                            </div>
                        </div>
                    </td>
                    <td>{{ $commodity->harvest_date }}</td>
                    
                    <td>
                        <button class="btn btn-circle btn-text btn-sm" aria-label="Action button" aria-haspopup="dialog" aria-expanded="false"
                        aria-controls="commodityDetailModal-{{ $commodity->id }}"
                        data-overlay="#commodityDetailModal-{{ $commodity->id }}"><span
                                class="icon-[tabler--dots-vertical]" ></span></button>
                    </td>
                </tr>

                <x-ui.commodity.detail :commodities="$commodities"/>
            @endforeach
        </tbody>
    </table>

    {{ $commodities->links('components.utils.pagination') }}
</div>