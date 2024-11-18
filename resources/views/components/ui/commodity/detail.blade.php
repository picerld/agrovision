@foreach ($commodities as $commodity)
    <div id="commodityDetailModal-{{ $commodity->id }}" class="hidden overlay modal overlay-open:opacity-100 modal-middle"
        role="dialog" tabindex="-1">
        <div class="modal-dialog overlay-open:opacity-100">
            <form id="commodity-update-form" action="{{ route('commodities.update', $commodity->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="grid grid-cols-2">
                            <div class="items-center">
                                <div class="relative">

                                </div>

                                <div class="avatar">
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
                                        <div class="flex items-center gap-x-2">
                                            <input type="file" id="image-upload-{{ $commodity->id }}" name="image"
                                                class="hidden" accept="image/*"
                                                onchange="previewImage('{{ $commodity->id }}')">

                                            <label for="image-upload-{{ $commodity->id }}" type="button"
                                                id="image-upload-trigger-{{ $commodity->id }}"
                                                class="btn btn-primary btn-sm w-52" data-file-upload-trigger="">
                                                <span class="icon-[tabler--upload] size-3 shrink-0"></span>
                                                Unggah Gambar
                                            </label>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div>
                                <div>
                                    <div class="mb-4">
                                        <h3 id="modal-title-1" class="text-xl font-semibold text-gray-800">
                                            Detail {{ $commodity->name }}
                                        </h3>
                                        <p class="text-gray-500 ">
                                            Edit dan hapus data komoditas
                                        </p>
                                    </div>
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
                                        <input type="string" name="harvest_date"
                                            value="{{ $commodity->harvest_date }}"
                                            class="bg-white input input-filled peer" />
                                        <label class="input-filled-label">Masa Panen</label>
                                        <span class="input-filled-focused"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </form>
            <div class="modal-footer">
                <form id="delete-form" action="{{ route('commodities.destroy', $commodity->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" form="delete-form" class="btn btn-error btn-soft">Hapus</button>
                </form>
                <button type="submit" form="commodity-update-form" class="btn btn-primary">Perbarui</button>
            </div>
        </div>
    </div>
    </div>
@endforeach

<script>
    document.getElementById('image-upload-trigger-{{ $commodity->id }}')
        .addEventListener('click', () => {
            document.getElementById('image-upload-{{ $commodity->id }}').click();
        });

    function previewImage(commodityId) {
        const fileInput = document.getElementById(`image-upload-${commodityId}`);
        const previewContainer = document.getElementById(`image-preview-${commodityId}`);

        if (fileInput.files && fileInput.files[0]) {
            const reader = new FileReader();

            reader.onload = function(e) {
                const previewImage = document.createElement('img');
                previewImage.src = e.target.result;
                previewImage.alt = 'Preview';
                previewImage.classList.add('object-contain', 'w-48', 'h-48', 'rounded-xl');

                previewContainer.innerHTML = '';
                previewContainer.appendChild(previewImage);
            };

            reader.readAsDataURL(fileInput.files[0]);
        } else {
            previewContainer.innerHTML = '';
        }
    }
</script>
