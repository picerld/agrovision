<div class="w-full p-5">

    <x-ui.fertilizer.sub-header />

    <div class="mt-8">
        <table id="fertilizers-table" class="table w-full">
            <thead>
                <tr>
                    <th scope="col" class="px-4 py-2 text-left align-middle cursor-pointer">
                        <span>Sekolah</span>
                    </th>
                    <th scope="col" class="px-4 py-2 text-left align-middle cursor-pointer">
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
            <tbody>
            </tbody>
        </table>
    </div>
</div>

<script>
    $(document).ready(function() {
        const table = $('#fertilizers-table').DataTable({
            ajax: {
                url: '{{ route('fertilizer-distributions.index') }}',
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
                                <div class="text-sm opacity-70">${data}</div>  <!-- School Name -->
                                <div class="font-medium">${row.pic}</div>  <!-- PIC Name (Assuming it's available in row.pic) -->
                            </div>
                        `;
                    }
                },
                {
                    data: 'fertilizer_qty',
                    name: 'fertilizer_qty',
                    render: function(data) {
                        return data + ' kg';
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
                },
            ],
            rowCallback: function(row, data) {
                $(row).find('.view-fertilizer').on('click', function() {
                    let fertilizerId = $(this).find('span').data('id');
                    let drawer = $('#fertilizerDrawer-' + fertilizerId);

                    drawer.removeClass('hidden');

                    setTimeout(function() {
                        drawer.css({
                            '--tw-translate-x': '0',
                            'opacity': '1'
                        });
                    }, 10);
                });

                $(row).find('.delete-fertilizer').on('click', function() {
                    let fertilizerId = $(this).data('id');
                    $('#deleteModal-' + fertilizerId).removeClass('hidden');
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
                </div>`,
            },
            responsive: {
                details: {
                    renderer: function(api, rowIdx, columns) {
                        return columns.map(col => col.hidden ?
                            `<div>${col.title}: ${col.data}</div>` : '').join('');
                    }
                }
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

        window.closeDrawer = function(schoolId) {
            let drawer = $('#fertilizerDrawer-' + fertilizerId);

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
