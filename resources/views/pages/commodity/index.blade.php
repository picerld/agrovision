<x-app-layout>
    <div class="p-2 space-y-4 sm:p-2 sm:space-y-6">
        {{-- Header --}}
        <div class="flex items-center justify-between">
            <div>
                <h5 class="card-title mb-1.5 text-bold">Komoditas</h5>
                <p class="mb-4">Terdapat <b>109</b> komoditas terdaftar.</p>
            </div>
            <div class="flex gap-2">
                <div>
                    <button class="btn btn-primary waves waves-light" type="button" aria-haspopup="dialog"
                        aria-expanded="false" aria-controls="slide-up-animated-modal"
                        data-overlay="#slide-up-animated-modal">Tambah +</button>
                </div>

                <div id="slide-up-animated-modal" class="overlay modal overlay-open:opacity-100 hidden" role="dialog"
                    tabindex="-1">
                    <div
                        class="overlay-animation-target modal-md modal-dialog overlay-open:mt-4 overlay-open:opacity-100 overlay-open:duration-500 mt-12 transition-all ease-out modal-dialog-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="modal-title">Tambah Komoditas</h3>
                                <button type="button" class="btn btn-text btn-circle btn-sm absolute end-3 top-3"
                                    aria-label="Close" data-overlay="#slide-up-animated-modal">
                                    <span class="icon-[tabler--x] size-4"></span>
                                </button>
                            </div>
                            <!-- File Upload -->
                            <div class="p-4 overflow-y-auto">
                                <div class="px-2">
                                    <div
                                        class="flex justify-center p-6 bg-white border border-gray-300 border-dashed cursor-pointer rounded-xl">
                                        <div class="text-center">
                                            <input type="file" name="image" id="image" accept="image/*"
                                                class="hidden" />
                                            <label for="image" class="cursor-pointer">
                                                <span
                                                    class="inline-flex items-center justify-center text-gray-800 bg-gray-100 rounded-full size-16">
                                                    <svg class="shrink-0 size-6" xmlns="http://www.w3.org/2000/svg"
                                                        width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round">
                                                        <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4">
                                                        </path>
                                                        <polyline points="17 8 12 3 7 8"></polyline>
                                                        <line x1="12" x2="12" y1="3"
                                                            y2="15">
                                                        </line>
                                                    </svg>
                                                </span>
                                                <div
                                                    class="flex flex-wrap justify-center mt-4  leading-6 text-gray-600">
                                                    <span class="font-medium text-gray-800 pe-1">Pilih file
                                                        atau</span>
                                                    <span
                                                        class="font-semibold text-primary bg-white rounded-lg hover:text-primary decoration-2 hover:underline focus-within:outline-none focus-within:ring-2 focus-within:ring-primary focus-within:ring-offset-2">browse</span>
                                                </div>
                                                <p class="mt-1 text-xs text-gray-400">Pilih file hingga 2MB</p>
                                            </label>
                                            <p id="selected-file" class="mt-2  text-gray-600"></p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="px-6 pb-4">
                                <div
                                    class="p-3 mx-auto bg-white rounded-lg border border-dashed border-gray-300 sm:flex sm:space-x-3 shadow-gray-100 ">
                                    <div class="w-full pb-2 sm:pb-0">
                                        <label for="name" class="block  font-medium ">
                                            <span class="sr-only">Nama Komoditas</span>
                                        </label>
                                        <input type="text" id="name" name="name" required
                                            class="block w-full px-4 py-3  border-gray-300 rounded-lg focus:border-blue-500 focus:ring-blue-500 "
                                            placeholder="Nama Komoditas">
                                        {{-- <x-input-error :messages="$errors->get('name')" class="mt-2" /> --}}
                                    </div>
                                    <div class="w-full pt-2 sm:pt-0 sm:ps-3 sm:border-t-0 sm:border-s border-gray-300">
                                        <label for="harvest_date" class="block  font-medium ">
                                            <span class="sr-only">Masa Panen</span>
                                        </label>
                                        <input type="text" id="harvest_date" name="harvest_date" required
                                            class="block w-full px-4 py-3  border-gray-300 rounded-lg focus:border-blue-500 focus:ring-blue-500 "
                                            placeholder="Masa Panen">
                                        {{-- <x-input-error :messages="$errors->get('harvest_date')" class="mt-2" /> --}}
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-soft btn-secondary"
                                    data-overlay="#slide-up-animated-modal">
                                    Close
                                </button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <label class="input-group max-w-sm">
                        <span class="input-group-text">
                            <span class="icon-[tabler--search] text-base-content/80 size-4"></span>
                        </span>
                        <input type="search" class="input grow" placeholder="Search" name="search" />
                        <span class="input-group-text gap-2">
                            <kbd class="kbd kbd-sm">⌘</kbd>
                            <kbd class="kbd kbd-sm">K</kbd>
                        </span>
                    </label>
                </div>
            </div>
        </div>
        {{-- End Header --}}

        {{-- Cards --}}
        <div class="grid grid-cols-1 gap-6 mt-6 sm:grid-cols-2 lg:grid-cols-3" aria-haspopup="dialog"
            aria-expanded="false" aria-controls="middle-center-modal" data-overlay="#middle-center-modal">
            <div class="card sm:max-w-sm ">
                <figure><img class="hover:scale-105 transition-all duration-300 ease-in hover:bg-gray-50    "
                        src="https://cdn.flyonui.com/fy-assets/components/card/image-9.png" alt="Watch" />
                </figure>
                <div class="card-body">
                    <p class="text-xl font-bold text-gray-700 mb-1">Beras Padi</p>
                    <p class="  flex gap-1 items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="shrink-0 size-4">
                            <path d="M8 2v4" />
                            <path d="M16 2v4" />
                            <path d="M21 17V6a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h11Z" />
                            <path d="M3 10h18" />
                            <path d="M15 22v-4a2 2 0 0 1 2-2h4" />
                        </svg>
                        90 Hari
                    </p>
                </div>
            </div>
        </div>
        {{-- End Cards --}}

        {{-- Modal --}}
        <div id="middle-center-modal" class="overlay modal overlay-open:opacity-100 modal-middle hidden"
            role="dialog" tabindex="-1">
            <div class="modal-dialog overlay-open:opacity-100">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="grid grid-cols-2">
                            <div class="items-center">
                                <div class="avatar">
                                    <div class="size-52 rounded-md">
                                        <img src="https://cdn.flyonui.com/fy-assets/avatar/avatar-1.png"
                                            alt="avatar" />
                                    </div>
                                </div>
                                <div class="flex flex-wrap items-center gap-3 mt-1 sm:gap-5">
                                    <div class="grow">
                                        <div class="flex items-center gap-x-2">
                                            <button type="button" class="btn btn-primary btn-sm w-52"
                                                data-file-upload-trigger="">
                                                <span class="icon-[tabler--upload] size-3 shrink-0"></span>
                                                Unggah Gambar
                                            </button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div>
                                <div>
                                    <div class="mb-4">
                                        <h3 id="modal-title-1" class="text-xl font-semibold text-gray-800">
                                            Detail Komoditas
                                        </h3>
                                        <p class=" text-gray-500">
                                            Edit dan hapus data komoditas
                                        </p>
                                    </div>
                                </div>

                                <div class="space-y-4">
                                    {{-- Name Input --}}
                                    <div class="form-control max-w-sm">
                                        <input type="text" placeholder="John Doe"
                                            class="input input-filled peer  bg-white" />
                                        <label class="input-filled-label">Nama Komoditas</label>
                                        <span class="input-filled-focused"></span>
                                    </div>

                                    {{-- Harvest Date Input --}}
                                    <div class="form-control max-w-sm">
                                        <input type="text" placeholder="John Doe"
                                            class="input input-filled peer  bg-white" />
                                        <label class="input-filled-label">Masa Panen</label>
                                        <span class="input-filled-focused"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-soft btn-secondary" data-overlay="#basic-modal">Hapus</button>
                        <button type="button" class="btn btn-primary">Perbarui</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- End Modal -->

    </div>
</x-app-layout>
