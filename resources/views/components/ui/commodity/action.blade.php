<div>
    <button class="btn btn-circle btn-text btn-lg" aria-label="Action button" aria-haspopup="dialog" aria-expanded="false"
        aria-controls="commodityDetailModal-{{ $commodity->id }}"
        data-overlay="#commodityDetailModal-{{ $commodity->id }}" data-commodity-id="{{ $commodity->id }}">
        <span class="icon-[tabler--eye]"></span>
    </button>
</div>

<x-ui.commodity.detail :commodity="$commodity" />

<script>
    document.querySelectorAll('[data-overlay]').forEach(button => {
        button.addEventListener('click', function() {
            const modalId = button.getAttribute('data-overlay');
            const modal = document.querySelector(modalId);
            if (modal) {
                modal.classList.remove('hidden');
            }
        });
    });

    window.addEventListener('click', function(event) {
        const modal = event.target.closest('.fixed');
        const modalContent = modal?.querySelector('.modal-content');
        if (modal && !modalContent.contains(event.target)) {
            modal.classList.add('hidden');
        }
    });

    document.querySelectorAll('.modal-content').forEach(content => {
        content.addEventListener('click', function(event) {
            event.stopPropagation(); // Prevents the modal from closing
        });
    });

    document.querySelectorAll('[data-dismiss="modal"]').forEach(button => {
        button.addEventListener('click', function() {
            const modal = button.closest('.fixed');
            if (modal) {
                modal.classList.add('hidden');
            }
        });
    });
</script>
