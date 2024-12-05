<x-app-layout>
    <div class="mx-3 my-5">
        <div class="grid grid-cols-3 gap-4">
            <x-utils.information-card title="Komoditas" subtitle="Komoditas Terdata" />
            <x-utils.stats title="Komoditas" model="Commodity" icon="leaf" />
        </div>

        <div class="p-4 mt-6 bg-white card">
            <div class="flex flex-col gap-4 p-5 sm:flex-row sm:justify-between sm:items-center">
                <x-ui.commodity.header />

                <div class="flex gap-2">
                    <div class="flex gap-4 mb-4">
                        <input id="nameFilter" type="text" placeholder="Filter by Name" class="input input-md grow">
                        <select id="categoryFilter" class="select select-md">
                            <option value="">All Categories</option>
                            <option value="Fruits">Fruits</option>
                            <option value="Vegetables">Vegetables</option>
                            <option value="Grains">Grains</option>
                        </select>
                        <button id="applyFilters" class="btn btn-primary">Apply Filters</button>
                    </div>

                    <button class="px-4 py-2 transition rounded-md shadow-md btn btn-primary hover:bg-primary-dark"
                        type="button" data-overlay="#formCommodity" aria-haspopup="dialog" aria-expanded="false">
                        Tambah +
                    </button>

                    <div class="flex items-center gap-2">
                        <div class="w-full">
                            <select id="perPage"
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
                                <option value="5">Per page 5</option>
                                <option value="10" selected>Per page 10</option>
                                <option value="25">Per page 25</option>
                                <option value="50">Per page 50</option>
                                <option value="100">Per page 100</option>
                            </select>
                        </div>

                        <label class="items-center max-w-xs input-group">
                            <span class="input-group-text">
                                <span class="icon-[tabler--search] text-base-content/80 size-4"></span>
                            </span>

                            <input id="search" name="search" type="search" class="input input-md grow"
                                placeholder="Search" />
                        </label>

                        <x-ui.commodity.form-commodity />
                    </div>
                </div>
            </div>

            <div class="w-full px-5">
                <table id="commodities-table" class="table w-full">
                    <thead>
                        <tr class="text-sm font-medium text-gray-500">
                            <!-- Image Column -->
                            <th scope="col" class="px-4 py-2 text-left align-middle cursor-pointer">
                                <div class="flex items-center">
                                    <span>Image</span>
                                </div>
                            </th>

                            <!-- Komoditas Column -->
                            <th scope="col" class="px-4 py-2 text-left align-middle cursor-pointer">
                                <div class="flex items-center space-x-1">
                                    <span>Komoditas</span>
                                    <svg class="w-4 h-4 text-gray-500" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path d="m7 15 5 5 5-5"></path>
                                        <path d="m7 9 5-5 5 5"></path>
                                    </svg>
                                </div>
                            </th>

                            <!-- Masa Panen Column -->
                            <th scope="col" class="px-4 py-2 text-left align-middle cursor-pointer">
                                <div class="flex items-center space-x-1">
                                    <span>Masa Panen</span>
                                    <svg class="w-4 h-4 text-gray-500" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path d="m7 15 5 5 5-5"></path>
                                        <path d="m7 9 5-5 5 5"></path>
                                    </svg>
                                </div>
                            </th>

                            <th scope="col" class="px-4 py-2 text-left align-middle cursor-pointer">
                                <div class="flex items-center space-x-1">
                                    <span>Ditambahkan</span>
                                    <svg class="w-4 h-4 text-gray-500" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path d="m7 15 5 5 5-5"></path>
                                        <path d="m7 9 5-5 5 5"></path>
                                    </svg>
                                </div>
                            </th>

                            <!-- Actions Column -->
                            <th scope="col" class="px-4 py-2 text-left align-middle cursor-pointer">
                                <div class="flex items-center justify-between">
                                    <span>Aksi</span>
                                </div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- External Scripts -->
        <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
        <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/v/bs5/dt-1.13.8/datatables.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.3.7/js/dataTables.buttons.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.3.7/js/buttons.html5.min.js"></script>

        <script>
            $(document).ready(function() {
                const table = new DataTable('#commodities-table', {
                    ajax: {
                        url: '{{ route('commodities.index') }}',
                        data: function(d) {
                            // Append additional filter values to the request
                            d.name = $('#nameFilter').val();
                            d.category = $('#categoryFilter').val();
                        }
                    },
                    processing: true,
                    serverSide: true,
                    responsive: true,
                    lengthChange: false,
                    columns: [{
                            data: 'image',
                            name: 'image',
                            orderable: false,
                            searchable: false,
                            render: function(data, type, row) {
                                return `
                                    <div class="avatar">
                                        <div class="rounded-md size-16 bg-base-content/10">
                                            <img class="object-cover w-full h-56 transition-all duration-300 ease-in hover:scale-110 hover:bg-gray-50"
                                            src="storage/commodities/${data}" alt="${row.name}" />
                                        </div>
                                    </div>`;
                            }
                        },
                        {
                            data: 'name',
                            name: 'name'
                        },
                        {
                            data: 'harvest_date',
                            name: 'harvest_date'
                        },
                        {
                            data: 'created_at',
                            name: 'created_at',
                            render: function(data) {
                                const date = new Date(data);
                                const months = ["January", "February", "March", "April", "May", "June",
                                    "July", "August", "September", "October", "November", "December"
                                ];
                                return `${months[date.getMonth()]} ${date.getDate()}, ${date.getFullYear()}`;
                            }
                        },
                        {
                            data: 'action',
                            name: 'action',
                            orderable: false,
                            searchable: false,
                        },
                    ],
                    dom: 'lrtip',
                    pageLength: 10,
                    order: [
                        [3, 'desc']
                    ],
                    language: {
                        processing: `
                            <div class="absolute top-0 left-0 z-10 flex items-center justify-center w-full h-full bg-base-100/50">
                                <span class="loading loading-spinner text-primary"></span>
                            </div>
                        `,
                    },
                    buttons: [{
                            extend: 'excelHtml5',
                            title: 'Filtered Data Export',
                            exportOptions: {
                                columns: ':visible',
                                modifier: {
                                    search: 'applied',
                                    order: 'applied',
                                },
                            },
                        },
                        {
                            extend: 'pdfHtml5',
                            title: 'Filtered Data Export',
                            orientation: 'portrait',
                            pageSize: 'A4',
                            exportOptions: {
                                columns: ':visible',
                                modifier: {
                                    search: 'applied',
                                    order: 'applied',
                                },
                            },
                        },
                    ],
                    initComplete: function() {
                        // Custom search input filter
                        $('#search').on('keyup', function() {
                            table.search(this.value).draw();
                        });

                        // Custom length dropdown filter
                        $('#perPage').on('change', function() {
                            table.page.len($(this).val()).draw();
                        });

                        // Custom column filters
                        $('#nameFilter').on('keyup', function() {
                            table.column(1).search(this.value).draw();
                        });

                        $('#categoryFilter').on('change', function() {
                            table.column(2).search(this.value).draw();
                        });
                    },
                });

                $('#applyFilters').on('click', function() {
                    table.ajax.reload();
                });
            });
        </script>

    </div>
</x-app-layout>
