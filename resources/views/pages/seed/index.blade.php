<x-app-layout>
    <div class="mx-3 my-5">
        <div class="grid grid-cols-3 gap-4">
            <div class="col-span-2 stats max-md:stats-vertical">
                <div class="stat">
                    <div class="stat-title">Subscription Plan</div>
                    <div class="stat-value">Premium</div>
                    <div class="stat-actions">
                        <button class="btn btn-sm btn-primary">Upgrade Plan</button>
                    </div>
                </div>

                <div class="stat">
                    <div class="stat-title">Next Billing Date</div>
                    <div class="stat-value">Oct 15, 2024</div>
                    <div class="flex flex-wrap gap-2 stat-actions">
                        <button class="btn btn-sm btn-soft">View Details</button>
                        <button class="btn btn-sm btn-warning btn-soft">Change Payment Method</button>
                    </div>
                </div>
            </div>

            <x-utils.stats title="Distribusi Bibit" model="SeedDistribution" icon="paper-bag" color="primary" />
        </div>

        <div class="grid grid-cols-3 gap-4 pt-4">

            <div class="col-span-2">
                <form action="{{ route('seed-distributions.store') }}" method="POST">
                    @csrf
                    <div class="w-full h-full bg-white card">
                        <div class="card-header">
                            <h5 class="card-title">Tambah Pupuk</h5>
                        </div>
                        <div class="items-center card-body">

                            <div class="grid grid-cols-4 gap-3">
                                <div class="col-span-2">
                                    <div class="relative w-full">
                                        <select name="school_id"
                                            data-select='{
                                          "toggleTag": "<button type=\"button\" aria-expanded=\"false\"></button>",
                                          "toggleClasses": "advance-select-toggle",
                                          "hasSearch": true,
                                          "dropdownClasses": "advance-select-menu max-h-52 pt-0 vertical-scrollbar rounded-scrollbar",
                                          "optionClasses": "advance-select-option selected:active",
                                          "optionTemplate": "<div class=\"flex justify-between items-center w-full\"><span data-title></span><span class=\"icon-[tabler--check] flex-shrink-0 size-4 text-primary hidden selected:block \"></span></div>",
                                          "extraMarkup": "<span class=\"icon-[tabler--caret-up-down] flex-shrink-0 size-4 text-base-content/90 absolute top-1/2 end-3 -translate-y-1/2 \"></span>"
                                          }'
                                            class="hidden select-floating">
                                            <option value="">Choose</option>
                                            @foreach ($schools as $school)
                                                <option value="{{ $school->id }}">{{ $school->name }}</option>
                                            @endforeach>
                                            <option value="pisces">Pisces</option>
                                        </select>
                                        <span class="select-floating-label">Sekolah</span>
                                    </div>
                                </div>

                                <label class="max-w-sm input-group">
                                    <span class="input-group-text">
                                        <span class="icon-[tabler--user] text-base-content/80 size-4"></span>
                                    </span>
                                    <div class="form-control grow">
                                        <input name="pic" type="text" placeholder="John Doe"
                                            class="input input-floating peer" />
                                        <span class="input-floating-label">PIC</span>
                                    </div>
                                </label>
                                <div class="form-control">
                                    <input name="date" type="text" class="max-w-sm input"
                                        placeholder="Month DD, YYYY" id="flatpickr-human-friendly" />
                                </div>

                                <script src="https://cdn.jsdelivr.net/npm/flatpickr@4.6.13/dist/flatpickr.min.js"></script>

                                <script>
                                    document.addEventListener('DOMContentLoaded', function() {
                                        flatpickr('#flatpickr-human-friendly', {
                                            altInput: true,
                                            altFormat: 'F j, Y', // Display format (Month Day, Year)
                                            dateFormat: 'Y-m-d' // Actual value format (Year-Month-Day)
                                        });
                                    });
                                </script>
                            </div>

                            <div class="grid grid-cols-3 gap-3 mt-3">
                                <div class="col-span-2">
                                    <div class="w-full">
                                        <select name="type_of_seed"
                                            data-select='{
                                          "placeholder": "<span class=\"inline-flex items-center\"><span class=\"icon-[tabler--paper-bag] flex-shrink-0 size-4 me-2\"></span> Bibit </span>",
                                          "toggleTag": "<button type=\"button\" aria-expanded=\"false\"></button>",
                                          "toggleClasses": "advance-select-toggle",
                                          "hasSearch": true,
                                          "dropdownClasses": "advance-select-menu max-h-52 pt-0 vertical-scrollbar rounded-scrollbar",
                                          "optionClasses": "advance-select-option selected:active",
                                          "optionTemplate": "<div class=\"flex justify-between items-center w-full\"><span data-title></span><span class=\"icon-[tabler--check] flex-shrink-0 size-4 text-primary hidden selected:block \"></span></div>",
                                          "extraMarkup": "<span class=\"icon-[tabler--caret-up-down] flex-shrink-0 size-4 text-base-content/90 absolute top-1/2 end-3 -translate-y-1/2 \"></span>"
                                          }'
                                            class="hidden">
                                            <option value="">Choose</option>
                                            @foreach ($commodities as $commodity)
                                                <option value="{{ $commodity->id }}">{{ $commodity->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div>
                                    <div class="join">
                                        <input name="seed_qty" class="w-full input join-item shrink" type="number"
                                            placeholder="00.00" />
                                        <select name="unit" class="select join-item" aria-label="select">
                                            <option value="Gram">Gram</option>
                                            <option value="Mililiter">Mililiter</option>
                                            <option value="Tray">Tray</option>
                                            <option value="Polybag">Polybag</option>
                                            <option value="Pcs">Pcs</option>
                                            <option value="Plastik">Plastik</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="flex items-center justify-between card-footer text-start">
                            <p class="text-base-content/50">Klik untuk menambahkan.</p>
                            <button type="submit" class="btn btn-primary">Tambah</button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="w-full bg-white card">
                <div class="card-body">
                    <div id="apex-doughnut-chart"></div>

                    <!-- Include ApexCharts -->
                    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

                    <script>
                        document.addEventListener("DOMContentLoaded", function() {
                            buildChart("#apex-doughnut-chart", function(mode) {
                                return {
                                    chart: {
                                        height: 220,
                                        type: "donut"
                                    },
                                    plotOptions: {
                                        pie: {
                                            donut: {
                                                size: "70%",
                                                labels: {
                                                    show: true,
                                                    name: {
                                                        fontSize: "2rem"
                                                    },
                                                    value: {
                                                        fontSize: "1.5rem",
                                                        color: "#333",
                                                        formatter: function(val) {
                                                            return parseInt(val, 10) + "%"
                                                        }
                                                    },
                                                    total: {
                                                        show: true,
                                                        fontSize: "1rem",
                                                        formatter: function(w) {
                                                            return "42%"
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    },
                                    series: [42, 7, 25, 25],
                                    labels: ["Operational", "Networking", "Hiring", "R&D"],
                                    legend: {
                                        show: true,
                                        position: "bottom",
                                        markers: {
                                            offsetX: -3
                                        },
                                        labels: {
                                            useSeriesColors: true
                                        }
                                    },
                                    dataLabels: {
                                        enabled: false
                                    },
                                    stroke: {
                                        show: false,
                                        curve: "straight"
                                    },
                                    // Updated to new color scheme
                                    colors: ["#6366F1", "#A855F7", "#EC4899", "#14B8A6"],
                                    states: {
                                        hover: {
                                            filter: {
                                                type: "none"
                                            }
                                        }
                                    },
                                    tooltip: {
                                        enabled: true
                                    }
                                };
                            });

                            function buildChart(selector, optionsFn) {
                                const chart = new ApexCharts(document.querySelector(selector), optionsFn());
                                chart.render();
                            }
                        });
                    </script>


                </div>
            </div>
        </div>

        <div class="w-full pt-2 accordion accordion-shadow">
            {{-- Accordion Loop --}}
            @foreach ($seeds as $seed)
                <div class="py-2 bg-white accordion-item" id="delivery-arrow-right">
                    <button class="inline-flex items-center justify-between accordion-toggle text-start"
                        aria-controls="delivery-arrow-right-collapse" aria-expanded="false">
                        <div class="flex gap-4">
                            <span
                                class="icon-[tabler--chevron-right] accordion-item-active:rotate-90 size-5 shrink-0 transition-transform duration-300 rtl:rotate-180"></span>
                            <p class="mb-0.5 font-bold accordion-item-active:text-primary">{{ $seed->school_name }}</p>
                        </div>
                        <div class="flex flex-col items-end">
                            <p class="text-sm font-normal text-base-content/50">
                                {{ \Carbon\Carbon::parse($seed->date)->format('F, d Y') }}
                            </p>
                            <p class="text-sm font-normal text-base-content/50">
                                @php
                                    $time = \Carbon\Carbon::parse($seed->created_at)->format('d-m-Y H:i:s');
                                @endphp
                                
                                {{ \Carbon\Carbon::parse($time)->locale('id')->diffForHumans() }}
                            </p>
                        </div>
                    </button>
                    <div id="delivery-arrow-right-collapse"
                        class="accordion-content hidden w-full overflow-hidden transition-[height] duration-300"
                        aria-labelledby="delivery-arrow-right" role="region">
                        <div class="px-5 pb-4">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-4">
                                    <div class="avatar">
                                        <div class="rounded-md size-20">
                                            <img src="{{ asset('storage/commodities/' . $seed->image) }}"
                                                alt="{{ $seed->name }}" />
                                        </div>
                                    </div>
                                    <div>
                                        <p class="font-semibold text-base-content/90 ">
                                            {{ $seed->name }}
                                        </p>
                                        <p class="flex gap-2 text-sm text-base-content/50">
                                            <svg class="shrink size-4" xmlns="http://www.w3.org/2000/svg"
                                                width="1em" height="1em" viewBox="0 0 16 16">
                                                <path fill="currentColor"
                                                    d="m15.81 10l-2.5-5H14a.5.5 0 0 0 0-1h-.79a6.04 6.04 0 0 0-4.198-1.95L9 2a1 1 0 0 0-2 0v.05a6.17 6.17 0 0 0-4.247 1.947L2 4a.5.5 0 0 0 0 1h.69l-2.5 5H0c0 1.1 1.34 2 3 2s3-.9 3-2h-.19L3.26 4.91a.5.5 0 0 0 .159-.148A4.84 4.84 0 0 1 6.994 3.06L7 14H6v1H4v1h8v-1h-2v-1H9V3.06a4.7 4.7 0 0 1 3.524 1.693a.5.5 0 0 0 .193.186L10.19 10H10c0 1.1 1.34 2 3 2s3-.9 3-2zM5 10H1l2-3.94zm6 0l2-3.94L15 10z" />
                                            </svg>
                                            {{ $seed->seed_qty }} {{ $seed->unit }}.
                                        </p>

                                    </div>
                                </div>

                                <div class="flex items-center gap-2">
                                    <span class="badge badge-soft badge-primary">{{ $seed->pic }}</span>

                                    <div>
                                        <button class="btn btn-circle btn-text btn-sm"
                                            aria-label="Action button"><span
                                                class="icon-[tabler--pencil]"></span></button>
                                        <button class="btn btn-circle btn-text btn-sm"
                                            aria-label="Action button"><span
                                                class="icon-[tabler--trash]"></span></button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            {{-- End Accordion Loop --}}
        </div>
    </div>
</x-app-layout>
