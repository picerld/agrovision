{{-- DataTables CSS --}}
<link href="https://cdn.datatables.net/2.0.1/css/dataTables.tailwindcss.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/buttons/3.0.0/css/buttons.tailwindcss.min.css" rel="stylesheet">

<div class="container px-4 py-6 mx-auto">
    <div class="overflow-hidden bg-white rounded-lg shadow-md">
        <div class="p-4">
            <h1 class="mb-4 text-2xl font-bold">Commodities</h1>

            <table id="commoditiesTable" class="w-full display">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Komoditas</th>
                        <th>Gambar</th>
                        <th>Masa Panen</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($commodities as $commodity)
                        <tr data-commodity-id="{{ $commodity->id }}">
                            <td>{{ $commodity->id }}</td>
                            <td>{{ $commodity->name }}</td>
                            <td>{{ $commodity->harvest_date }}</td>
                            <td>
                                <button class="btn btn-info view-details" data-id="{{ $commodity->id }}">View
                                    Details</button>
                            </td>
                        </tr>
                        <x-ui.commodity.detail :commodities="$commodities" />
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

{{-- jQuery --}}
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

{{-- DataTables JS --}}
<script src="https://cdn.datatables.net/2.0.1/js/dataTables.min.js"></script>
<script src="https://cdn.datatables.net/2.0.1/js/dataTables.tailwindcss.min.js"></script>

{{-- DataTables Buttons --}}
<script src="https://cdn.datatables.net/buttons/3.0.0/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/3.0.0/js/buttons.tailwindcss.min.js"></script>

@push('scripts')
    <script>
        $(document).ready(function() {
            // Initialize DataTable
            const table = $('#commoditiesTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ url()->current() }}',
                columns: [{
                        data: 'id',
                        visible: false
                    },
                    {
                        data: 'name',
                        render: function(data, type, row) {
                            return `<div class="flex items-center">
                            <div class="text-sm font-medium text-gray-900">${data}</div>
                        </div>`;
                        }
                    },
                    {
                        data: 'image',
                        render: function(data, type, row) {
                            return `<img src="/storage/commodities/${data}"
                            alt="${row.name}"
                            class="object-cover w-16 h-16 rounded-md">`;
                        }
                    },
                    {
                        data: 'harvest_date'
                    },
                    {
                        data: null,
                        render: function(data, type, row) {
                            return `<button class="btn btn-circle btn-text btn-lg" aria-label="Action button" aria-haspopup="dialog" aria-expanded="false"
                        aria-controls="commodityDetailModal-{{ $commodity->id }}"
                        data-overlay="#commodityDetailModal-{{ $commodity->id }}"><span
                                class="icon-[tabler--eye]" ></span></button>`;
                        }
                    }
                ],
                language: {
                    processing: `
                    <div class="flex items-center justify-center">
                        <div class="w-8 h-8 border-b-2 border-gray-900 rounded-full animate-spin"></div>
                    </div>
                `,
                }
            });
        });
    </script>
@endpush
