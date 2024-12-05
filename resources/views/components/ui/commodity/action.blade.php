<div>
    <button class="btn btn-circle btn-text btn-lg" aria-label="Action button" aria-haspopup="dialog" aria-expanded="false"
        aria-controls="commodityDetailModal-{{ $commodity->id }}"
        data-overlay="#commodityDetailModal-{{ $commodity->id }}">
        <span class="icon-[tabler--eye]"></span>
    </button>

    <x-ui.commodity.detail :commodity="$commodity" />
</div>
