<div id="formCommodity" class="hidden overlay modal overlay-open:opacity-100" role="dialog" tabindex="-1">
    <form action="{{ route('commodities.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div
            class="mt-12 transition-all ease-out overlay-animation-target modal-md modal-dialog overlay-open:mt-4 overlay-open:opacity-100 overlay-open:duration-500 modal-dialog-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Tambah Komoditas</h3>
                    <button type="button" class="absolute btn btn-text btn-circle btn-sm end-3 top-3"
                        aria-label="Close" data-overlay="#formCommodity">
                        <span class="icon-[tabler--x] size-4"></span>
                    </button>
                </div>
                <!-- File Upload -->
                <div class="p-4 overflow-y-auto">
                    <div class="px-2">
                        <div
                            class="flex justify-center p-6 bg-white border border-gray-300 border-dashed cursor-pointer rounded-xl">
                            <div class="text-center">
                                <input type="file" name="image" id="image" accept="image/*" class="hidden" />
                                <label for="image" class="cursor-pointer">
                                    <span
                                        class="inline-flex items-center justify-center text-gray-800 bg-gray-100 rounded-full size-16">
                                        <svg class="shrink-0 size-6" xmlns="http://www.w3.org/2000/svg" width="24"
                                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4">
                                            </path>
                                            <polyline points="17 8 12 3 7 8"></polyline>
                                            <line x1="12" x2="12" y1="3" y2="15">
                                            </line>
                                        </svg>
                                    </span>
                                    <div class="flex flex-wrap justify-center mt-4 leading-6 text-gray-600">
                                        <span class="font-medium text-gray-800 pe-1">Pilih file
                                            atau</span>
                                        <span
                                            class="font-semibold bg-white rounded-lg text-primary hover:text-primary decoration-2 hover:underline focus-within:outline-none focus-within:ring-2 focus-within:ring-primary focus-within:ring-offset-2">browse</span>
                                    </div>
                                    <p class="mt-1 text-xs text-gray-400">Pilih file hingga 2MB</p>
                                </label>
                                <p id="selected-file" class="mt-2 text-sm text-gray-600"></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="px-6 pb-4">
                    <div
                        class="p-3 mx-auto bg-white border border-gray-300 border-dashed rounded-lg sm:flex sm:space-x-3 shadow-gray-100 ">
                        <div class="w-full pb-2 sm:pb-0">
                            <label for="name" class="block font-medium ">
                                <span class="sr-only">Nama Komoditas</span>
                            </label>
                            <input type="text" id="name" name="name" required
                                class="block w-full px-4 py-3 border-gray-300 rounded-lg focus:border-blue-500 focus:ring-blue-500 "
                                placeholder="Nama Komoditas">
                        </div>
                        <div class="w-full pt-2 border-gray-300 sm:pt-0 sm:ps-3 sm:border-t-0 sm:border-s">
                            <label for="harvest_date" class="block font-medium ">
                                <span class="sr-only">Masa Panen</span>
                            </label>
                            <input type="text" id="harvest_date" name="harvest_date" required
                                class="block w-full px-4 py-3 border-gray-300 rounded-lg focus:border-blue-500 focus:ring-blue-500 "
                                placeholder="Masa Panen">
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-soft btn-secondary" data-overlay="#formCommodity">
                        Close
                    </button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
    document.getElementById('image').addEventListener('change', function(e) {
        const fileName = e.target.files[0]?.name;

        document.getElementById('selected-file').textContent = fileName || '';
    });
</script>
