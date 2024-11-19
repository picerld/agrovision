<x-app-layout>
    <div class="mx-3 my-5">
        <div class="grid grid-cols-3 gap-4">
            <x-utils.information-card title="Komoditas" subtitle="Komoditas Terdata" />
            <x-utils.stats title="Komoditas" model="Commodity" icon="leaf" />
        </div>

        <div class="p-2 mt-6 space-y-4 sm:p-2 sm:space-y-6 card">
            {{-- Header --}}
            <div class="items-center ">

                <div class="flex justify-between p-5">
                    <div>
                        <h5 class="text-lg font-semibold text-primary">Komoditas</h5>
                        <p class="text-sm text-base-content/70">Terdapat <b>90</b> komoditas terdaftar</p>
                    </div>
                    <div class="flex gap-2">
                        <div>
                            <button class="btn btn-primary waves waves-light" type="button" aria-haspopup="dialog"
                                aria-expanded="false" aria-controls="formCommodity" data-overlay="#formCommodity">Tambah
                                +</button>
                        </div>

                        <x-ui.commodity.form-commodity />

                        <form action="{{ route('commodities.index') }}" method="GET">
                            <x-utils.search-input />
                        </form>
                    </div>
                </div>

            </div>
            <x-ui.commodity.table :commodities="$commodities" />
        </div>
    </div>
</x-app-layout>
