<div id="overlay-example-{{ $seed->id }}" class="overlay overlay-open:translate-x-0 drawer drawer-start hidden"
    role="dialog" tabindex="-1">
    <div class="drawer-header">
        <h3 class="drawer-title font-semibold">Edit Distribusi Bibit</h3>
        <button type="button" class="btn btn-text btn-circle btn-sm absolute end-3 top-3"
            aria-label="Close" data-overlay="#overlay-example">
            <span class="icon-[tabler--x] size-5"></span>
        </button>
    </div>
    <div class="drawer-body">
        <label class="form-control mb-4">
            <div class="label">
                <span class="label-text">Sekolah</span>
            </div>
            <div class="grid grid-cols-3 gap-2">
                <div class="col-span-2">
                    <div class="max-w-sm">
                        <select
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
                            class="hidden">
                            <option value="">Choose</option>
                            @foreach ($schools as $school)
                            <option value="{{ $school->id }}">{{ $school->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-control">
                    <input name="date" type="text" class="input max-w-sm" value="{{ $seed->date }}"
                        placeholder="Month DD, YYYY" id="flatpickr-human-friendly" />
                </div>
            </div>
        </label>

        <label class="form-control mb-4">
            <div class="label">
                <span class="label-text">PIC</span>
            </div>
            <label class="input-group max-w-sm">
                <span class="input-group-text">
                    <span class="icon-[tabler--user] text-base-content/80 size-4"></span>
                </span>
                <div class="form-control grow">
                    <input name="pic" type="text" placeholder="John Doe" class="input" value="{{ $seed->pic }}"/>
                </div>
            </label>
        </label>

        <label class="form-control mb-4">
            <div class="label">
                <span class="label-text">Jenis Bibit</span>
            </div>
            <div class="w-full">
                <select name="type_of_seed"
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
                    class="hidden">
                    <option value="">Choose</option>
                    @foreach ($commodities as $commodity)
                        <option value="{{ $commodity->id }}">{{ $commodity->name }}</option>
                    @endforeach
                </select>
            </div>
        </label>


        <label class="form-control mb-4">
            <div class="label">
                <span class="label-text">Jumlah Bibit</span>
            </div>
            <div class="join w-full">
                <input value="{{ $seed->seed_qty }}" name="seed_qty" class="input join-item shrink w-full" type="number"
                    placeholder="00.00" />
                <select name="unit" class="select join-item w-full" aria-label="select">
                    <option>Gram</option>
                    <option>Mililiter</option>
                    <option>Tray</option>
                    <option>Polybag</option>
                    <option>Pcs</option>
                    <option>Plastik</option>
                </select>
            </div>
        </label>
    </div>
    <div class="drawer-footer">
        <button type="submit" class="btn btn-soft btn-error"
            data-overlay="#overlay-example">Hapus</button>
        <button type="submit" class="btn btn-primary">Perbarui</button>
    </div>
</div>