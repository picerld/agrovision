<div id="detailDrawer-{{ $school->id }}"
    class="justify-start hidden overlay overlay-open:translate-x-0 drawer drawer-start" role="dialog" tabindex="-1">
    <div class="drawer-header">
        <h3 class="font-semibold drawer-title">Update Data Sekolah</h3>
        <button type="button" class="absolute btn btn-text btn-circle btn-sm end-3 top-3" aria-label="Close"
            onclick="closeDrawer('{{ $school->id }}')">
            <span class="icon-[tabler--x] size-5"></span>
        </button>
    </div>
    <form action="{{ route('schools.update', $school->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="justify-start drawer-body">
            <label class="mb-4 form-control">
                <div class="label">
                    <span class="label-text">Nama Sekolah</span>
                </div>
                <input name="name" value="{{ $school->name }}" type="text" class="input" />
            </label>
            <label class="mb-4 form-control">
                <div class="label">
                    <span class="label-text">Alamat</span>
                </div>
                <textarea name="address" class="textarea ">{{ $school->address }}</textarea>
            </label>
            <label class="mb-4 form-control">
                <div class="label">
                    <span class="label-text">PIC</span>
                </div>
                <input name="pic" value="{{ $school->pic }}" type="text" class="input" />
            </label>
            <label class="mb-4 form-control">
                <div class="label">
                    <span class="label-text">Nomor Telepon</span>
                </div>
                <input name="phone_number" value="{{ $school->phone_number }}" type="text" class="input" />
            </label>
        </div>
        <div class="drawer-footer">
            <button type="button"
                class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-100 rounded-md hover:bg-gray-200"
                onclick="closeDrawer('{{ $school->id }}')">
                Close
            </button>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>

<script>
    $(document).ready(function() {
        $(document).on('click', '.view-school', function() {
            var schoolId = $(this).find('span').data('id');
            var drawer = $('#detailDrawer-' + schoolId);

            drawer.removeClass('translate-x-full hidden');

            setTimeout(function() {
                drawer.addClass('overlay-open');
            }, 10);
        });

        window.closeDrawer = function(schoolId) {
            var drawer = $('#detailDrawer-' + schoolId);

            drawer.removeClass('overlay-open');
            setTimeout(function() {
                drawer.addClass('translate-x-full hidden');
            }, 500);
        };

        // Close the Drawer when clicking outside of it
        window.addEventListener('click', function(event) {
            const drawer = event.target.closest('.fixed');
            const drawerContent = drawer?.querySelector('.drawer-content');

            if (drawer && !drawerContent.contains(event.target)) {
                const schoolId = drawer.id.replace('detailDrawer-', '');
                closeDrawer(schoolId);
            }
        });
    });
</script>
