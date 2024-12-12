<form action="{{ route('seed-distributions.update', $seed->seed_id) }}" method="POST">
    @csrf
    @method('PUT')
    <div id="seedDrawer-{{ $seed->id }}" class="hidden overlay overlay-open:translate-x-0 drawer drawer-start"
        role="dialog" tabindex="-1">
        <div class="drawer-header">
            <h3 class="font-semibold drawer-title">Edit Distribusi Bibit</h3>
            <button type="button" class="absolute btn btn-text btn-circle btn-sm end-3 top-3"
                onclick="closeDrawer('{{ $seed->id }}')">
                <span class="icon-[tabler--x] size-5"></span>
            </button>
        </div>
        <div class="drawer-body">
            <label class="mb-4 form-control">
                <div class="label">
                    <span class="label-text">Sekolah</span>
                </div>
                <div class="grid grid-cols-3 gap-2">
                    <div class="col-span-2">
                        <div class="max-w-sm">
                            <!-- FIX THIS SELECT -->

                            {{-- <select
                                data-select='{
                              "placeholder": "Nama Sekolah",
                              "toggleTag": "<button type=\"button\" aria-expanded=\"false\"></button>",
                              "toggleClasses": "advance-select-toggle",
                              "hasSearch": true,
                              "dropdownClasses": "advance-select-menu max-h-52 pt-0 vertical-scrollbar rounded-scrollbar",
                              "optionClasses": "advance-select-option selected:active",
                              "optionTemplate": "<div class=\"flex justify-between items-center w-full\"><span data-title></span><span class=\"icon-[tabler--check] flex-shrink-0 size-4 text-primary hidden selected:block \"></span></div>",
                              "extraMarkup": "<span class=\"icon-[tabler--caret-up-down] flex-shrink-0 size-4 text-base-content/90 absolute top-1/2 end-3 -translate-y-1/2 \"></span>"
                              }'
                                class="" name="school_id">
                                <option value="{{ $seed->school_id }}" hidden>{{ $seed->school_name }}</option>
                                @foreach ($schools as $school)
                                    <option value="{{ $school->id }}">{{ $school->name }}</option>
                                @endforeach

                                <input type="hidden" name="school_id" id="fallback-school_id"
                                    value="{{ $seed->school_id }}">

                            </select> --}}
                            {{-- <script>
                                document.querySelectorAll('select[data-select]').forEach(select => {
                                    select.addEventListener('change', function() {
                                        document.getElementById('fallback-school_id').value = this.value;
                                    });
                                });
                            </script> --}}

                            <!-- FIX THIS SELECT -->

                            <select class="max-w-sm appearance-none select" aria-label="Select floating label"
                                name="school_id">
                                <option value="{{ $seed->school_id }}" hidden selected>{{ $seed->school_name }}</option>
                                @foreach ($schools as $school)
                                    <option value="{{ $school->id }}">{{ $school->name }}</option>
                                @endforeach
                            </select>

                        </div>
                    </div>
                    <div class="form-control">
                        <input name="date" type="text" class="max-w-sm input" value="{{ $seed->date }}"
                            placeholder="Month DD, YYYY" id="flatpickr-human-friendly" />
                    </div>
                </div>
            </label>

            <label class="mb-4 form-control">
                <div class="label">
                    <span class="label-text">PIC</span>
                </div>
                <label class="max-w-sm input-group">
                    <span class="input-group-text">
                        <span class="icon-[tabler--user] text-base-content/80 size-4"></span>
                    </span>
                    <div class="form-control grow">
                        <input name="pic" type="text" placeholder="John Doe" class="input"
                            value="{{ $seed->pic }}" />
                    </div>
                </label>
            </label>

            <label class="mb-4 form-control">
                <div class="label">
                    <span class="label-text">Jenis Bibit</span>
                </div>
                <div class="w-full">
                    <!-- FIX THIS SELECT -->

                    {{-- <select name="type_of_seed"
                        data-select='{
                      "placeholder": "<span class=\"inline-flex items-center\"><span class=\"icon-[tabler--paper-bag] flex-shrink-0 size-4 me-2\"></span> Bibit </span>",
                      "toggleTag": "<button type=\"button\" aria-expanded=\"false\"></button>",
                      "toggleClasses": "advance-select-toggle",
                      "hasSearch": true,
                      "dropdownClasses": "advance-select-menu max-h-52 pt-0 vertical-scrollbar rounded-scrollbar",
                      "optionClasses": "advance-select-option selected:active",
                      "optionTemplate": "<div class=\"flex justify-between items-center w-full\"><span data-title></span><span class=\"icon-[tabler--check] flex-shrink-0 size-4 text-primary hidden selected:block \"></span></div>",
                      "extraMarkup": "<span class=\"icon-[tabler--caret-up-down] flex-shrink-0 size-4 text-base-content/90 absolute top-1/2 end-3 -translate-y-1/2 \"></span>"
                      }'
                        class="hidden" name="type_of_seed">
                        <option value="{{ $seed->commodity_id }}" hidden>{{ $seed->name }}</option>
                        @foreach ($commodities as $commodity)
                            <option value="{{ $commodity->id }}">{{ $commodity->name }}</option>
                        @endforeach
                    </select> --}}

                    <!-- FIX THIS SELECT -->

                    <select class="max-w-sm appearance-none select" aria-label="Select floating label"
                        name="type_of_seed">
                        <option value="{{ $seed->commodity_id }}" hidden selected>{{ $seed->name }}</option>
                        @foreach ($commodities as $commodities)
                            <option value="{{ $commodities->id }}">{{ $commodities->name }}</option>
                        @endforeach
                    </select>
                </div>
            </label>


            <label class="mb-4 form-control">
                <div class="label">
                    <span class="label-text">Jumlah Bibit</span>
                </div>
                <div class="w-full join">
                    <input value="{{ $seed->seed_qty }}" name="seed_qty" class="w-full input join-item shrink"
                        type="number" placeholder="00.00" />
                    <select name="unit" class="select join-item" aria-label="select">
                        <option value="{{ $seed->unit }}" selected hidden>{{ $seed->unit }}</option>
                        <option value="Gram">Gram</option>
                        <option value="Mililiter">Mililiter</option>
                        <option value="Tray">Tray</option>
                        <option value="Polybag">Polybag</option>
                        <option value="PCS">Pcs</option>
                        <option value="Plastik">Plastik</option>
                    </select>
                </div>
            </label>
        </div>
        <div class="drawer-footer">
            <button type="button"
                class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-100 rounded-md hover:bg-gray-200"
                onclick="closeDrawer('{{ $seed->id }}')">
                Close
            </button>
            <button type="submit" class="btn btn-primary">Perbarui</button>
        </div>
    </div>
</form>

<script>
    $(document).ready(function() {
        $(document).on('click', '.view-seed', function() {
            let seedId = $(this).find('span').data('id');
            let drawer = $('#seedDrawer-' + seedId);

            drawer.removeClass('translate-x-full hidden');

            setTimeout(function() {
                drawer.addClass('overlay-open');
            }, 10);
        });

        window.closeDrawer = function(seedId) {
            let drawer = $('#seedDrawer-' + seedId);

            drawer.removeClass('overlay-open');
            setTimeout(function() {
                drawer.addClass('translate-x-full hidden');
            }, 500);
        };

        // Close the Drawer when clicking outside of it
        window.addEventListener('click', function(event) {
            const drawer = event.target.closest('.fixed');
            const drawerContent = drawer?.querySelector('.drawer-content');

            if (drawer && !drawerContent.contains(event.target)) {
                const seedId = drawer.id.replace('seedDrawer-', '');
                closeDrawer(seedId);
            }
        });
    });
</script>
