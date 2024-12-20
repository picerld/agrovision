<div class="py-2 bg-white accordion-item" id="delivery-arrow-right">
    <button class="inline-flex items-center justify-between accordion-toggle text-start"
        aria-controls="delivery-arrow-right-collapse" aria-expanded="false">
        <div class="flex gap-4">
            <span
                class="icon-[tabler--chevron-right] accordion-item-active:rotate-90 size-5 shrink-0 transition-transform duration-300 rtl:rotate-180"></span>
            <p class="mb-0.5 font-bold accordion-item-active:text-primary">{{ $seed->school_name }}</p>
        </div>
        <div class="flex flex-col items-end">
            <p class="text-sm font-normal text-base-content/50">
                {{ \Carbon\Carbon::parse($seed->date)->format('F, d Y') }}
            </p>
            <p class="text-sm font-normal text-base-content/50">
                @php
                    $time = \Carbon\Carbon::parse($seed->created_at)->format('d-m-Y H:i:s');
                @endphp

                {{ \Carbon\Carbon::parse($time)->locale('id')->diffForHumans() }}
            </p>
        </div>
    </button>
    <div id="delivery-arrow-right-collapse"
        class="accordion-content hidden w-full overflow-hidden transition-[height] duration-300"
        aria-labelledby="delivery-arrow-right" role="region">
        <div class="px-5 pb-4">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-4">
                    <div class="avatar">
                        <div class="rounded-md size-20">
                            <img src="{{ asset('storage/commodities/' . $seed->image) }}" alt="{{ $seed->name }}" />
                        </div>
                    </div>
                    <div>
                        <p class="font-semibold text-base-content/90 ">
                            {{ $seed->name }}
                        </p>
                        <p class="flex gap-2 text-sm text-base-content/50">
                            <svg class="shrink size-4" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                viewBox="0 0 16 16">
                                <path fill="currentColor"
                                    d="m15.81 10l-2.5-5H14a.5.5 0 0 0 0-1h-.79a6.04 6.04 0 0 0-4.198-1.95L9 2a1 1 0 0 0-2 0v.05a6.17 6.17 0 0 0-4.247 1.947L2 4a.5.5 0 0 0 0 1h.69l-2.5 5H0c0 1.1 1.34 2 3 2s3-.9 3-2h-.19L3.26 4.91a.5.5 0 0 0 .159-.148A4.84 4.84 0 0 1 6.994 3.06L7 14H6v1H4v1h8v-1h-2v-1H9V3.06a4.7 4.7 0 0 1 3.524 1.693a.5.5 0 0 0 .193.186L10.19 10H10c0 1.1 1.34 2 3 2s3-.9 3-2zM5 10H1l2-3.94zm6 0l2-3.94L15 10z" />
                            </svg>
                            {{ $seed->seed_qty }} {{ $seed->unit }}.
                        </p>

                    </div>
                </div>

                <div class="flex items-center gap-2">
                    <span class="badge badge-soft badge-primary">{{ $seed->pic }}</span>

                    <div class="flex">
                        <button class="btn btn-circle btn-text btn-sm" aria-label="Action button" aria-haspopup="dialog"
                            aria-expanded="false" aria-controls="seedDrawer"
                            data-overlay="#seedDrawer-{{ $seed->seed_id }}"><span
                                class="icon-[tabler--pencil]"></span></button>
                        <form action="{{ route('seed-distributions.destroy', $seed->seed_id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-circle btn-text btn-sm"
                                aria-label="Action button"><span class="icon-[tabler--trash]"></span></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
