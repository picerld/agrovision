<div class="mx-3 my-5 card">
    <div class="card-body">
        <div class="w-full">
            <x-ui.school.header />

            <div class="w-full mt-8">
                <table id="schools-table" class="table w-full">
                    <thead>
                        <tr>
                            <th scope="col" class="px-4 py-2 text-left align-middle cursor-pointer">
                                <span>Nama</span>
                            </th>
                            <th scope="col" class="px-4 py-2 text-left align-middle cursor-pointer">
                                <span>PIC</span>
                            </th>
                            <th scope="col" class="px-4 py-2 text-center align-middle cursor-pointer">
                                <span>Alamat</span>
                            </th>
                            <th scope="col" class="px-4 py-2 text-center align-middle cursor-pointer">
                                <span>Aksi</span>
                            </th>
                            <th scope="col" class="px-4 py-2 text-center align-middle cursor-pointer">
                                <span>Terdata</span>
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
        const table = $('#schools-table').DataTable({
            ajax: {
                url: '{{ route('schools.index') }}',
            },
            processing: true,
            serverSide: true,
            responsive: true,
            lengthChange: false,
            columns: [{
                    data: 'name',
                    name: 'name',
                    render: function(data, type, row) {
                        return `
                        <div class="flex items-center">
                            <span class="p-1 rounded-full badge badge-primary badge-soft me-2">
                                <span class="icon-[tabler--school]"></span>
                            </span>
                            <div>
                                <div class="font-medium">${data}</div>
                            </div>
                        </div>
                    `;
                    },
                },
                {
                    data: 'pic',
                    name: 'pic'
                },
                {
                    data: 'address',
                    name: 'address',
                    render: function(data) {
                        const truncated = data.length > 25 ? data.substring(0, 25) + '...' :
                            data;
                        return `
                            <div class="flex justify-center tooltip" data-tip="${data}">
                                <p class="text-sm text-center truncate">${truncated}</p>
                            </div>
                        `;
                    }
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'created_at',
                    name: 'created_at'
                }
            ],
            rowCallback: function(row, data) {
                $(row).find('.view-school').on('click', function() {
                    let schoolId = $(this).find('span').data('id');
                    let drawer = $('#detailDrawer-' + schoolId);

                    drawer.removeClass('hidden');

                    setTimeout(function() {
                        drawer.css({
                            '--tw-translate-x': '0',
                            'opacity': '1'
                        });
                    }, 10);
                });

                $(row).find('.delete-school').on('click', function() {
                    let schoolId = $(this).data('id');
                    console.log('Deleting school:', schoolId);
                    $('#deleteModal-' + schoolId).removeClass('hidden');
                });
            },
            dom: 'lrtip',
            pageLength: 10,
            order: [
                [4, 'desc']
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
            let drawer = $('#detailDrawer-' + schoolId);

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
