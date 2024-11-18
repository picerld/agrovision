<div id="drawerSchool" class="justify-start hidden overlay overlay-open:translate-x-0 drawer drawer-start" role="dialog"
    tabindex="-1">
    <div class="drawer-header">
        <h3 class="font-semibold drawer-title">Tambah Data Sekolah</h3>
        <button type="button" class="absolute btn btn-text btn-circle btn-sm end-3 top-3" aria-label="Close"
            data-overlay="#drawerSchool">
            <span class="icon-[tabler--x] size-5"></span>
        </button>
    </div>
    <form action="{{ route('schools.store') }}" method="POST">
        @csrf
        <div class="justify-start drawer-body">
            <label class="mb-4 form-control">
                <div class="label">
                    <span class="label-text">Nama Sekolah</span>
                </div>
                <input name="name" type="text" placeholder="SMKN 11 Bandung" class="input" />
            </label>
            <label class="mb-4 form-control sm:w-96">
                <div class="label">
                    <span class="label-text">Alamat</span>
                </div>
                <textarea name="address" class="textarea w-80" placeholder="Jalan Raya Bandung"></textarea>
            </label>
            <label class="mb-4 form-control">
                <div class="label">
                    <span class="label-text">PIC</span>
                </div>
                <input name="pic" type="text" placeholder="Silfi Nuraini" class="input" />
            </label>
            <label class="mb-4 form-control">
                <div class="label">
                    <span class="label-text">Nomor Telepon</span>
                </div>
                <input name="phone_number" type="text" placeholder="08#########" class="input" />
            </label>
        </div>
        <div class="drawer-footer">
            <button type="button" class="btn btn-soft btn-secondary" data-overlay="#drawerSchool">Close</button>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>
