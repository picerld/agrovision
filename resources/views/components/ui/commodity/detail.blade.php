<div id="commodityDetailModal-{{ $commodity->id }}"
    class="fixed inset-0 z-50 flex items-center justify-center hidden p-6 bg-black/50">
    <div class="w-full max-w-lg overflow-hidden bg-white rounded-lg shadow-xl">
        <form id="commodity-update-form-{{ $commodity->id }}" action="{{ route('commodities.update', $commodity->id) }}"
            method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="modal-content">
                <div class="p-6 space-y-6">
                    <div class="grid grid-cols-2 gap-6 mx-4">
                        <div class="flex flex-col items-center">
                            <div class="mb-4 avatar">
                                <div class="rounded-md size-52" id="image-preview-{{ $commodity->id }}">
                                    <img src="{{ asset('storage/commodities/' . $commodity->image ?? 'placeholder.jpg') }}"
                                        alt="{{ $commodity->name }}" />
                                </div>
                            </div>
                            <div class="flex flex-wrap items-center gap-3 mt-1 sm:gap-5">
                                <label for="image-upload-{{ $commodity->id }}" type="button"
                                    class="btn btn-primary btn-sm w-52">
                                    <span class="icon-[tabler--upload] size-3 shrink-0"></span> Unggah Gambar
                                </label>
                                <input type="file" id="image-upload-{{ $commodity->id }}" name="image"
                                    class="hidden" accept="image/*" onchange="previewImage('{{ $commodity->id }}')">
                            </div>
                        </div>
                        <div class="space-y-4">
                            <h3 class="text-xl font-semibold text-gray-800">{{ $commodity->name }}</h3>
                            <p class="text-gray-500">Update data komoditas</p>

                            <div class="max-w-sm input-group">
                                <span class="input-group-text">
                                    <span class="icon-[tabler--plant] text-base-content/80 size-5"></span>
                                </span>
                                <div class="relative grow">
                                    <input type="text" placeholder="Kentang" class="input input-floating peer"
                                        id="name" name="name" value="{{ $commodity->name }}" />
                                    <label class="input-floating-label" for="name">Komoditas</label>
                                </div>
                            </div>
                            
                            <div class="max-w-sm input-group">
                                <span class="input-group-text">
                                    <span class="icon-[tabler--calendar] text-base-content/80 size-5"></span>
                                </span>
                                <div class="relative grow">
                                    <input type="text" placeholder="40 hari" class="input input-floating peer"
                                        id="harvest_date" name="harvest_date" value="{{ $commodity->harvest_date }}" />
                                    <label class="input-floating-label" for="harvest_date">Masa Panen</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" form="commodity-update-form-{{ $commodity->id }}"
                        class="btn btn-primary">Perbarui</button>
                </div>
            </div>
        </form>
    </div>
</div>
