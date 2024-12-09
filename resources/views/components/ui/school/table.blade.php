<div class="mx-3 my-5 card">
    <div class="card-body">
        <div class="w-full">
            <x-ui.school.header />

            <div class="w-full p-5">
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

<!-- External Scripts -->
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/v/bs5/dt-1.13.8/datatables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>

<script>
    $(document).ready(function() {
        const table = $('#schools-table').DataTable({
            ajax: {
                url: '{{ route('schools.index') }}',
                data: function(d) {
                    d.category = $('#categoryFilter').val();
                }
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
                    data: 'pic',
                    name: 'pic'
                },
                {
                    data: 'address',
                    name: 'address',
                    render: function(data) {
                        const truncated = data.length > 25 ? `${data.substring(0, 25)}...` :
                            data;
                        return `
                            <div class="flex justify-center tooltip" data-tip="${data}">
                                <p class="text-sm text-center truncate">${truncated}</p>
                            </div>`;
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
                    name: 'created_at',
                }
            ],
            dom: 'lrtip',
            pageLength: 10,
            order: [
                [4, 'desc']
            ],
            language: {
                processing: `
                    <div class="absolute top-0 left-0 z-10 flex items-center justify-center w-full h-full bg-base-100/50">
                        <span class="loading loading-spinner text-primary"></span>
                    </div>`
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

        // Handle closing modal logic
        window.addEventListener('click', function(event) {
            const modal = event.target.closest('.fixed');
            const modalContent = modal?.querySelector('.modal-content');
            if (modal && !modalContent.contains(event.target)) {
                modal.classList.add('hidden');
            }
        });
    });
</script>
