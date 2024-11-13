<div class="stats max-sm:w-full">
    <div class="w-56 stat">
        <div class="avatar placeholder">
            <div class="rounded-full bg-{{ $color }}/20 text-{{ $color }} size-10">
                <span class="icon-[tabler--{{ $icon }}] size-6"></span>
            </div>
        </div>
        <div class="mb-1 text-2xl stat-value">{{ $title }}</div>
        <div class="stat-title">{{ $value }} {{ $value < 300 ? 'terdata' : 'terdistribusi' }}</div>
        <div class="h-2 progress bg-{{ $color }}/10" role="progressbar" aria-label="Order Progressbar"
            aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
            <div class="w-3/4 progress-bar progress-{{ $color }}"></div>
        </div>
    </div>
</div>
