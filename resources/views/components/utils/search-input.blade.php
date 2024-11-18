<div class="flex items-center gap-2">
    <div class="w-full">
        <select name="perPage" onchange="this.form.submit()"
            data-select='{
      "placeholder": "Select option...",
      "toggleTag": "<button type=\"button\" aria-expanded=\"false\"></button>",
      "toggleClasses": "advance-select-toggle",
      "dropdownClasses": "advance-select-menu",
      "optionClasses": "advance-select-option selected:active",
      "optionTemplate": "<div class=\"flex justify-between items-center w-full\"><span data-title></span><span class=\"icon-[tabler--check] flex-shrink-0 size-4 text-primary hidden selected:block \"></span></div>",
      "extraMarkup": "<span class=\"icon-[tabler--caret-up-down] flex-shrink-0 size-4 text-base-content/90 absolute top-1/2 end-3 -translate-y-1/2 \"></span>"
      }'
            class="hidden">
            <option value="6" {{ request('perPage') == 6 ? 'selected' : '' }}>Per page 6
            </option>
            <option value="9" {{ request('perPage') == 9 ? 'selected' : '' }}>Per page 9
            </option>
            <option value="12" {{ request('perPage') == 12 ? 'selected' : '' }}>Per page 12
            </option>
        </select>
    </div>

    <label class="items-center max-w-xs input-group ">
        <span class="input-group-text">
            <span class="icon-[tabler--search] text-base-content/80 size-4"></span>
        </span>

        <input name="search" type="search" class="input input-md grow" placeholder="Search"
            onkeyup="this.form.submit()" value="{{ request('search') }}" />

        <span class="gap-2 input-group-text">
            <kbd class="kbd kbd-sm">⌘</kbd>
            <kbd class="kbd kbd-sm">K</kbd>
        </span>
    </label>
</div>
