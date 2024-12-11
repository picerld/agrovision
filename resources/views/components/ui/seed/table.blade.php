<div class="my-5 card">
    <div class="card-body">
        <div class="w-full">

            <x-ui.seed.header />

            <!-- ADD OVERFLOW-X-AUTO IF NEEDED -->
            <div class="mt-8">
                <table id="seeds-table" class="table w-full">
                    <thead>
                        <tr>
                            <th scope="col" class="px-4 py-2 text-left align-middle cursor-pointer">
                                <span>Sekolah</span>
                            </th>
                            <th scope="col" class="px-4 py-2 text-left align-middle cursor-pointer">
                                <span>Bibit</span>
                            </th>
                            <th scope="col" class="px-4 py-2 text-center align-middle cursor-pointer">
                                <span>Jumlah</span>
                            </th>
                            <th scope="col" class="px-4 py-2 text-center align-middle cursor-pointer">
                                <span>Tanggal</span>
                            </th>
                            <th scope="col" class="px-4 py-2 text-center align-middle cursor-pointer">
                                <span>Aksi</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        const table = $('#seeds-table').DataTable({
            ajax: {
                url: '{{ route('seed-distributions.index') }}',
            },
            processing: true,
            serverSide: true,
            responsive: true,
            lengthChange: false,
            columns: [{
                    data: 'school_name',
                    name: 'school_name',
                    render: function(data, type, row) {
                        return `
                        <div>
                            <div class="text-sm opacity-70">${data}</div>
                            <div class="font-medium">${row.pic}</div>
                        </div>
                    `;
                    },
                },
                {
                    data: 'name',
                    name: 'name',
                    render: function(data, type, row) {
                        return `
                        <div class="flex items-center">
                            <span class="p-1 rounded-full badge badge-success badge-soft me-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" class="shrink size-4"
                                    height="1em" viewBox="0 0 24 24">
                                    <g fill="none" stroke="currentColor" stroke-linecap="round"
                                    stroke-linejoin="round" stroke-width="2">
                                        <path
                                        d="M8 3h8a2 2 0 0 1 2 2v1.82a5 5 0 0 0 .528 2.236l.944 1.888A5 5 0 0 1 20 13.18V19a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2v-5.82a5 5 0 0 1 .528-2.236L6 8V5a2 2 0 0 1 2-2" />
                                        <path
                                        d="M12 15a2 2 0 1 0 4 0a2 2 0 1 0-4 0m-6 6a2 2 0 0 0 2-2v-5.82a5 5 0 0 0-.528-2.236L6 8m5-1h2" />
                                    </g>
                                </svg>
                            </span>
                            ${data}
                        </div>
                                    `;
                    }
                },
                {
                    data: 'seed_qty',
                    name: 'seed_qty',
                    render: function(data, type, row) {
                        return `
                        <div class="text-center">${data} ${row.unit}</div></div>
                    `;
                    }
                },
                {
                    data: 'date',
                    name: 'date',
                    className: 'text-center',
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
                    searchable: false
                }
            ],
            rowCallback: function(row, data) {
                $(row).find('.view-seed').on('click', function() {
                    let seedId = $(this).find('span').data('id');
                    let drawer = $('#seedDrawer-' + seedId);

                    drawer.removeClass('hidden');

                    setTimeout(function() {
                        drawer.css({
                            '--tw-translate-x': '0',
                            'opacity': '1'
                        });
                    }, 10);
                });

                $(row).find('.delete-seed').on('click', function() {
                    let seedId = $(this).data('id');
                    $('#deleteModal-' + seedId).removeClass('hidden');
                });
            },
            dom: 'lrtip',
            pageLength: 10,
            order: [
                [3, 'desc']
            ],
            language: {
                processing: `
                <div class="absolute top-0 left-0 z-10 flex items-center justify-center w-full h-full bg-base-100/50">
                    <span class="loading loading-spinner text-primary"></span>
                </div>`
            },
            drawCallback: function(settings) {
                $('.delete-seed').on('click', function() {
                    let seedId = $(this).data('id');
                    $('#deleteModal-' + seedId).removeClass('hidden');
                });
            },
            initComplete: function() {
                $('#search').on('keyup', function() {
                    table.search(this.value).draw();
                });

                $('#perPage').on('change', function() {
                    table.page.len($(this).val()).draw();
                });
            }
        });

        window.closeDrawer = function(seedId) {
            let drawer = $('#seedDrawer-' + seedId);

            drawer.css({
                '--tw-translate-x': '100%',
                'opacity': '0'
            });

            drawer.addClass('hidden');
        };

        window.addEventListener('click', function(event) {
            const modal = event.target.closest('.fixed');
            const modalContent = modal?.querySelector('.modal-content');
            if (modal && !modalContent.contains(event.target)) {
                modal.classList.add('hidden');
            }
        });
    });
</script>
