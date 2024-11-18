<div>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
    <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>

    <button class="hidden" id="notyf-custom-trigger"></button>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const notyf = new Notyf({
                duration: 3000,
                position: {
                    x: 'right',
                    y: 'bottom'
                },
                types: [{
                    type: 'primary',
                    background: '#7367F0',
                    icon: {
                        className: 'icon-[tabler--circle-check] !text-white',
                        tagName: 'i'
                    }
                }]
            });

            @if (session('toast'))
                notyf.open({
                    type: '{{ session('toast.type') }}',
                    message: '{{ session('toast.message') }}',
                    duration: 3000,
                    ripple: true,
                    dismissible: true
                });
            @endif
        });
    </script>
</div>
