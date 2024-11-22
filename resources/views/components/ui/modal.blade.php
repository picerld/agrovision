<div id="{{ $identify }}" class="hidden overlay modal overlay-open:opacity-100 modal-middle" role="dialog"
    tabindex="-1">
    <div class="modal-dialog overlay-open:opacity-100">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="px-4 pt-5 pb-4 bg-white sm:p-6 sm:pb-4">
                <div class="flex flex-col items-center">
                    @if ($icon)
                        <div class="flex items-center justify-center {{ $iconBg }} rounded-full size-12 shrink-0">
                            <svg class="{{ $iconClass }}" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" aria-hidden="true">
                                {!! $icon !!}
                            </svg>
                        </div>
                    @endif
                    <h3 class="mt-4 text-xl font-semibold text-gray-900" id="modal-title">
                        {{ $name }}
                    </h3>
                    <p class="mt-2 text-base text-gray-600">
                        {{ $description }}
                    </p>
                </div>
            </div>
            <!-- Modal Footer -->
            <div class="justify-center modal-footer">
                {{ $slot }}
            </div>
        </div>
    </div>
</div>
