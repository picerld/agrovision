<div class="col-span-2">
    <div class="card w-full h-full bg-white">
        <div class="card-header">
            <h5 class="card-title">Tambah Pupuk</h5>
        </div>
        <div class="card-body items-center">

            <div class="grid grid-cols-3 gap-3">
                <div class="col-span-2">
                    <div class="relative w-full">
                        <select name="school_id"
                            data-select='{
                          "toggleTag": "<button type=\"button\" aria-expanded=\"false\"></button>",
                          "toggleClasses": "advance-select-toggle",
                          "hasSearch": true,
                          "dropdownClasses": "advance-select-menu max-h-52 pt-0 vertical-scrollbar rounded-scrollbar",
                          "optionClasses": "advance-select-option selected:active",
                          "optionTemplate": "<div class=\"flex justify-between items-center w-full\"><span data-title></span><span class=\"icon-[tabler--check] flex-shrink-0 size-4 text-primary hidden selected:block \"></span></div>",
                          "extraMarkup": "<span class=\"icon-[tabler--caret-up-down] flex-shrink-0 size-4 text-base-content/90 absolute top-1/2 end-3 -translate-y-1/2 \"></span>"
                          }'
                            class="hidden select-floating">
                            <option value="">Choose</option>
                            @foreach ($schools as $school)
                                <option value="{{ $school->id }}">{{ $school->name }}</option>
                            @endforeach>
                            <option value="pisces">Pisces</option>
                        </select>
                        <span class="select-floating-label">Sekolah</span>
                    </div>
                </div>

                <div>
                    <label class="input-group w-full">
                        {{-- <span class="input-group-text">$</span> --}}
                        <input name="fertilizer_qty" type="number" class="input grow" placeholder="00.00" />
                        <span class="input-group-text">KG</span>
                    </label>
                </div>

            </div>

            <div class="grid grid-cols-3 mt-3 gap-3">

                <div class="col-span-2">
                    <label class="input-group w-full">
                        <span class="input-group-text">
                            <span class="icon-[tabler--user] text-base-content/80 size-4"></span>
                        </span>
                        <div class="form-control grow">
                            <input name="pic" type="text" placeholder="John Doe"
                                class="input input-floating peer" />
                            <span class="input-floating-label">PIC</span>
                        </div>
                    </label>
                </div>

                <div>
                    <div class="form-control">
                        <input name="date" type="text" class="input max-w-sm"
                            placeholder="Month DD, YYYY" id="flatpickr-human-friendly" />
                    </div>

                    <script src="https://cdn.jsdelivr.net/npm/flatpickr@4.6.13/dist/flatpickr.min.js"></script>

                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            flatpickr('#flatpickr-human-friendly', {
                                altInput: true,
                                altFormat: 'F j, Y', // Display format (Month Day, Year)
                                dateFormat: 'Y-m-d' // Actual value format (Year-Month-Day)
                            });
                        });
                    </script>
                </div>

            </div>

        </div>
        <div class="flex justify-between card-footer text-start items-center">
            <p class="text-base-content/50">Klik untuk menambahkan.</p>
            <button type="submit" class="btn btn-primary">Tambah</button>
        </div>
    </div>
</div>
