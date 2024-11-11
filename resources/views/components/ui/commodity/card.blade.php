<div class="grid grid-cols-1 gap-6 pb-6 mx-4 sm:grid-cols-2 lg:grid-cols-3">
    @forelse ($commodities as $commodity)
        <div class="card sm:max-w-sm">
            <figure class="w-full overflow-hidden rounded h-42">
                <img class="object-cover w-full transition-all duration-300 ease-in hover:scale-110 hover:bg-gray-50"
                    src="{{ asset('storage/commodities/' . $commodity->image) }}" alt="{{ $commodity->name }}" />
            </figure>

            <div class="card-body">
                <p class="h-8 mb-1 text-xl font-bold text-gray-700">{{ Str::limit($commodity->name, 20) }}</p>
                <p class="flex items-center gap-1 mb-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="shrink-0 size-4">
                        <path d="M8 2v4" />
                        <path d="M16 2v4" />
                        <path d="M21 17V6a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h11Z" />
                        <path d="M3 10h18" />
                        <path d="M15 22v-4a2 2 0 0 1 2-2h4" />
                    </svg>
                    {{ $commodity->harvest_date }}
                </p>
                <button type="button" class="btn btn-primary" aria-haspopup="dialog" aria-expanded="false"
                    aria-controls="commodityDetailModal-{{ $commodity->id }}" data-overlay="#commodityDetailModal-{{ $commodity->id }}">Detail</button>
            </div>
        </div>

        <x-ui.commodity.detail :commodities="$commodities" />
    @empty
        <x-utils.empty-card />
    @endforelse
</div>

<div class="flex mx-5 mt-4">
    {{ $commodities->links('components.utils.pagination') }}
</div>
