<div id="deleteModal-{{ $school->id }}"
    class="fixed inset-0 z-50 flex items-center justify-center hidden p-6 bg-black/50">
    <div class="w-full max-w-lg overflow-hidden bg-white rounded-lg shadow-xl">
        <div class="modal-content">
            <div class="px-4 pt-5 pb-4 bg-white sm:p-6 sm:pb-4">
                <div class="flex flex-col items-center">
                    <div class="flex items-center justify-center rounded-full bg-error size-12 shrink-0">
                        <svg class="text-white size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />
                        </svg>
                    </div>
                    <h3 class="mt-4 text-xl font-semibold text-gray-900" id="modal-title">
                        {{ $school->name }}</h3>
                    <p class="mt-2 text-base text-gray-600">Ingin menghapus data sekolah
                        <strong>{{ $school->name }}</strong>?
                    </p>
                </div>
            </div>
            <div class="justify-center modal-footer">
                <button type="button" class="btn btn-soft btn-secondary"
                    onclick="closeModal('deleteModal-{{ $school->id }}')">Close</button>
                <form action="{{ route('schools.destroy', $school->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-error btn-soft">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function closeModal(modalId) {
        document.getElementById(modalId)?.classList?.add('hidden');
    }

    document.addEventListener('click', function(event) {
        if (event.target.closest('.delete-commodity')) {
            const modalId = event.target.closest('.delete-commodity').dataset.modal;
            document.getElementById(modalId)?.classList?.remove('hidden');
        }
    });
</script>
