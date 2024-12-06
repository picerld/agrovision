<div id="commodityDetailModal-{{ $commodity->id }}"
    class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 p-4 {{ $errors->any() ? 'block' : 'hidden' }}">
    <div class="w-full max-w-lg overflow-hidden bg-white rounded-lg shadow-xl">
        <form id="commodity-update-form" action="{{ route('commodities.update', $commodity->id) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="modal-content">
                <div class="p-6 space-y-6">
                    <div class="grid grid-cols-2 gap-6 mx-5">
                        <div class="flex flex-col items-center">
                            <div class="mb-4 avatar">
                                <div class="rounded-md size-52" id="image-preview-{{ $commodity->id }}">
                                    @if ($commodity->image)
                                        <img src="{{ asset('storage/commodities/' . $commodity->image) }}"
                                            alt="{{ $commodity->name }}" />
                                    @else
                                        <img src="{{ asset('storage/placeholder.jpg') }}" alt="Placeholder" />
                                    @endif
                                </div>
                            </div>
                            <div class="flex flex-wrap items-center gap-3 mt-1 sm:gap-5">
                                <div class="grow">
                                    <div class="flex items-center">
                                        <input type="file" id="image-upload-{{ $commodity->id }}" name="image"
                                            class="hidden" accept="image/*"
                                            onchange="previewImage('{{ $commodity->id }}')">

                                        <label for="image-upload-{{ $commodity->id }}" type="button"
                                            id="image-upload-trigger-{{ $commodity->id }}"
                                            class="btn btn-primary btn-sm w-52">
                                            <span class="icon-[tabler--upload] size-3 shrink-0"></span>
                                            Unggah Gambar
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="mb-4">
                                <h3 id="modal-title-1" class="text-xl font-semibold text-gray-800">
                                    {{ $commodity->name }}
                                </h3>
                                <p class="text-gray-500">
                                    Edit dan hapus data komoditas
                                </p>
                            </div>

                            <div class="space-y-4">
                                {{-- Name Input --}}
                                <div class="max-w-sm form-control">
                                    <input type="text" name="name" value="{{ $commodity->name }}"
                                        class="bg-white input input-filled peer" />
                                    <label class="input-filled-label">Nama Komoditas</label>
                                    <span class="input-filled-focused"></span>
                                </div>

                                {{-- Harvest Date Input --}}
                                <div class="max-w-sm form-control">
                                    <input type="text" name="harvest_date" value="{{ $commodity->harvest_date }}"
                                        class="bg-white input input-filled peer" />
                                    <label class="input-filled-label">Masa Panen</label>
                                    <span class="input-filled-focused"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </form>
        <div class="p-4 modal-footer">
            <div class="tooltip [--trigger:click]">
                <div class="tooltip-toggle">
                    <button class="btn btn-error btn-soft" aria-label="Popover Button">Hapus</button>
                    <div class="tooltip-content tooltip-shown:opacity-100 tooltip-shown:visible" role="popover">
                        <div class="max-w-xs p-4 rounded-lg shadow tooltip-body bg-base-100 text-start">
                            <span class="text-lg font-semibold text-base-content/90">Konfirmasi
                                {{ $commodity->name }}</span>
                            <p class="py-4 text-base text-base-content/80">
                                Apakah anda yakin ingin menghapus komoditas {{ $commodity->name }}?
                            </p>
                            <form id="delete-form" action="{{ route('commodities.destroy', $commodity->id) }}"
                                method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" form="delete-form" class="text-white btn btn-primary">Ya</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" form="commodity-update-form" class="btn btn-primary">Perbarui</button>
        </div>
    </div>
</div>
</div>


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
