
<div id="fertilizerDrawer-{{ $fertilizer->id }}"
    class="hidden overlay overlay-open:translate-x-0 drawer drawer-start"
    role="dialog" tabindex="-1">
    <div class="drawer-header">
        <h3 class="font-semibold drawer-title">Edit Distribusi Pupuk</h3>
        <button type="button"
            class="absolute btn btn-text btn-circle btn-sm end-3 top-3"
            aria-label="Close" data-overlay="#seedDrawer">
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
                            class="hidden" name="school_id">
                            
                            <option value="{{ $fertilizer->school_id }}" selected hidden>{{ $fertilizer->school_name }}</option>
                            @foreach ($schools as $school)
                                <option value="{{ $school->id }}">{{ $school->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-control">
                    <input name="date" type="text" class="max-w-sm input"
                        value="{{ $fertilizer->date }}" placeholder="Month DD, YYYY"
                        id="flatpickr-human-friendly" />
                </div>
            </div>
        </label>

        <label class="mb-4 form-control">
            <div class="label">
                <span class="label-text">PIC</span>
            </div>
            <label class="max-w-sm input-group">
                <span class="input-group-text">
                    <span
                        class="icon-[tabler--user] text-base-content/80 size-4"></span>
                </span>
                <div class="form-control grow">
                    <input name="pic" type="text" placeholder="John Doe"
                        class="input" value="{{ $fertilizer->pic }}" />
                </div>
            </label>
        </label>

        <label class="mb-4 form-control">
            <div class="label">
                <span class="label-text">Jumlah Bibit</span>
            </div>
            <label class="input-group max-w-sm">
                <input name="fertilizer_qty" type="number" class="input grow" placeholder="00.00" value="{{ $fertilizer->fertilizer_qty }}" />
                <span class="input-group-text">KG</span>
            </label>
        </label>
    </div>
    <div class="drawer-footer">
        <button type="submit" class="btn btn-soft btn-error"
            data-overlay="#seedDrawer">Hapus</button>
        <button type="submit" class="btn btn-primary">Perbarui</button>
    </div>
</div>