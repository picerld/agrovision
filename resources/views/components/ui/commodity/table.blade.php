<div class="w-full px-5">
    <table id="commodities-table" class="table w-full">
        <thead>
            <tr class="text-sm font-medium text-gray-500">
                <th scope="col" class="px-4 py-2 text-left align-middle cursor-pointer">
                    <span>Image</span>
                </th>
                <th scope="col" class="px-4 py-2 text-left align-middle cursor-pointer">
                    <span>Komoditas</span>
                </th>
                <th scope="col" class="px-4 py-2 text-left align-middle cursor-pointer">
                    <span>Masa Panen</span>
                </th>
                <th scope="col" class="px-4 py-2 text-left align-middle cursor-pointer">
                    <span>Ditambahkan</span>
                </th>
                <th scope="col" class="px-4 py-2 text-left text-center align-middle cursor-pointer">
                    <span>Aksi</span>
                </th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>

<script>
    $(document).ready(function() {
        const table = $('#commodities-table').DataTable({
            ajax: {
                url: '{{ route('commodities.index') }}',
                data: function(d) {
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
                    searchable: false
                },
            ],
            rowCallback: function(row, data) {
                $(row).find('.view-details').on('click', function() {
                    var commodityId = $(this).data('id');
                    $('#commodityDetailModal-' + commodityId).removeClass(
                        'hidden');
                });
                $(row).find('.delete-commodity').on('click', function() {
                    var commodityId = $(this).data('id');
                    $('#deleteModal-' + commodityId).removeClass('hidden');
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
            initComplete: function() {
                $('#search').on('keyup', function() {
                    table.search(this.value).draw();
                });

                $('#perPage').on('change', function() {
                    table.page.len($(this).val()).draw();
                });

                $('#nameFilter').on('keyup', function() {
                    table.column(1).search(this.value).draw();
                });

                $('#categoryFilter').on('change', function() {
                    table.column(2).search(this.value).draw();
                });
            },
        });
    });
    
    window.addEventListener('click', function(event) {
        const modal = event.target.closest('.fixed');
        const modalContent = modal?.querySelector('.modal-content');
        if (modal && !modalContent.contains(event.target)) {
            modal.classList.add('hidden');
        }
    });
</script>
