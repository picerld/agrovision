<div class="col-span-2 stats max-md:stats-vertical">
    <div class="stat">
        <div class="stat-title">{{ $subtitle }}</div>
        <div class="stat-value">{{ $title }}</div>
        <div class="stat-actions">
            <button class="btn btn-sm btn-primary">{{ $title }}</button>
        </div>
    </div>

    <div class="stat">
        <div class="stat-title">Terdata</div>
        <div class="stat-value">{{ Carbon\Carbon::now()->format('F, Y') }}</div>
        <div class="flex flex-wrap gap-2 stat-actions">
            <button class="btn btn-sm btn-soft">{{ Carbon\Carbon::now()->format('F') }}</button>
            <button class="btn btn-sm btn-warning btn-soft">{{ Carbon\Carbon::now()->format('Y') }}</button>
        </div>
    </div>
</div>
