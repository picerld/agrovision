<div class="w-full">

    <x-ui.user.sub-header />

    <div class="px-5 mt-8">
        <table id="users-table" class="table w-full">
            <thead>
                <tr>
                    <th scope="col" class="px-4 py-2 text-left align-middle cursor-pointer">
                        <span>Nama</span>
                    </th>
                    <th scope="col" class="px-4 py-2 text-left align-middle cursor-pointer">
                        <span>Username</span>
                    </th>
                    <th scope="col" class="px-4 py-2 text-center align-middle cursor-pointer">
                        <span>Nomor Telepon</span>
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

<script>
    $(document).ready(function() {
        const table = $('#users-table').DataTable({
            ajax: {
                url: '{{ route('users.index') }}'
            },
            processing: true,
            serverSide: true,
            responsive: true,
            lengthChange: false,
            columns: [{
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'username',
                    data: 'username',
                },
                {
                    data: 'phone_number',
                    name: 'phone_number',
                    className: 'text-center',
                    render: function(data) {
                        return `
                        <div class="flex items-center">
                            <span class="p-1 rounded-full badge badge-primary badge-soft me-2">
                                <span class="icon-[tabler--device-mobile]"></span>
                            </span>
                            ${data}
                        </div>
                        `
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
                $(row).find('.view-user').on('click', function() {
                    let userId = $(this).find('span').data('id');
                    let drawer = $('#userDrawer-' + userId);

                    drawer.removeClass('hidden');

                    setTimeout(function() {
                        drawer.css({
                            '--tw-translate-x': '0',
                            'opacity': '1'
                        });
                    }, 10);
                });

                $(row).find('.delete-user').on('click', function() {
                    let userId = $(this).data('id');
                    $('#deleteModal-' + userId).removeClass('hidden');
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
                $('.delete-user').on('click', function() {
                    let userId = $(this).data('id');
                    $('#deleteModal-' + userId).removeClass('hidden');
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

        window.closeDrawer = function(userId) {
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
