<div class="mx-3 my-5 card">
    <div class="card-body">
        <div class="w-full">

            <x-ui.school.header />

            <div class="mt-8 overflow-x-auto">
                @if ($schools->isEmpty())
                    <div class="py-8 text-center">
                        <p class="text-gray-500">
                            @if (request('search'))
                                No results found for "{{ request('search') }}"
                            @else
                                No schools available
                            @endif
                        </p>
                    </div>
                @else
                    <table class="table">
                        <!-- head -->
                        <thead>
                            <tr>
                                <th scope="button">
                                    <input type="checkbox" class="checkbox checkbox-primary checkbox-sm"
                                        aria-label="product" />
                                </th>
                                <th scope="name">Nama</th>
                                <th scope="pic">PIC</th>
                                {{-- <th scope="phone_number">Telepon</th> --}}
                                <th scope="address">Alamat</th>
                                <th scope="action">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($schools as $school)
                                <tr>
                                    <th scope="button">
                                        <label>
                                            <input type="checkbox" class="checkbox checkbox-primary checkbox-sm"
                                                aria-label="product" />
                                        </label>
                                    </th>
                                    <td>
                                        <div class="flex items-center gap-3">
                                            <div>
                                                <div class="font-medium">{{ $school->name }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ $school->pic }}</td>
                                    {{-- <td>
                                        <div class="flex items-center">
                                            <span class="p-1 rounded-full badge badge-primary badge-soft me-2">
                                                <span class="icon-[tabler--device-mobile]"></span>
                                            </span>
                                            {{ $school->phone_number }}
                                        </div>
                                    </td> --}}
                                    <td>{{ Str::limit($school->address, 23) }}</td>
                                    <td class="flex">
                                        <form action="{{ route('schools.destroy', $school->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-circle btn-text btn-sm"
                                                aria-label="Action delete"><span
                                                    class="icon-[tabler--trash]"></span></button>
                                        </form>
                                        <button class="btn btn-circle btn-text btn-sm" aria-label="Action detail"><span
                                                class="icon-[tabler--dots-vertical]" aria-haspopup="dialog"
                                                aria-expanded="false" aria-controls="detailDrawer-{{ $school->id }}"
                                                data-overlay="#detailDrawer-{{ $school->id }}"></span></button>
                                                
                                        <x-ui.school.detail :school="$school" />
                                    </td>
                                </tr>
                            @empty
                                <h3>No School</h3>
                            @endforelse
                        </tbody>
                    </table>
                @endif
            </div>

            {{ $schools->links('components.utils.pagination') }}
        </div>
    </div>
</div>
