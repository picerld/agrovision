<div class="w-full px-5">
    <div class="mt-8 overflow-x-auto">
        <table class="table">
            <!-- head -->
            <thead>
                <tr>
                    <th scope="school">Nama</th>
                    <th scope="quantity" class="text-center">Nomor Telepon</th>
                    <th scope="action" class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $user)
                    <tr>
                        <td>
                            <div class="flex items-center gap-3">
                                <div>
                                    <div class="text-sm opacity-50">{{ $user->name }}</div>
                                    <div class="font-medium">{{ $user->username }}</div>
                                </div>
                            </div>
                        </td>
                        <td class="text-center">{{ $user->phone_number }}</td>
                        <td class="text-center">
                            <div class="flex justify-center">
                                <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-circle btn-text btn-sm"
                                        aria-label="Action button"><span class="icon-[tabler--trash]"></span></button>
                                </form>
                                <button class="btn btn-circle btn-text btn-sm" aria-haspopup="dialog"
                                    aria-expanded="false" aria-controls="userDrawer"
                                    data-overlay="#userDrawer-{{ $user->id }}"><span
                                        class="icon-[tabler--dots-vertical]"></span></button>
                            </div>
                        </td>
                    </tr>

                @empty
                    <h1>Data Kosong</h1>
                @endforelse
            </tbody>
        </table>
    </div>

    {{ $users->links('components.utils.pagination') }}
</div>
