<div class="flex justify-between pb-6">
    <div>
        <h5 class="text-lg font-semibold text-primary">Pupuk Terdistribusi</h5>
        <p class="text-sm text-base-content/70">Terdapat <b>90 KG</b> pupuk didistribusikan.</p>
    </div>
    <form action="{{ route('fertilizer-distributions.index') }}" method="GET">
        <x-utils.search-input />
    </form>
</div>
