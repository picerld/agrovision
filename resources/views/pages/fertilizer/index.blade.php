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

            <x-utils.stats title="Distribusi Pupuk" model="FertilizerDistribution" icon="plant" color="warning" />
        </div>


        <div class="grid grid-cols-3 gap-4 pt-4">
            <div class="col-span-2">
                <div class="w-full h-full bg-white card">
                    <div class="card-header">
                        <h5 class="card-title">Tambah Pupuk</h5>
                    </div>
                    <div class="items-center card-body">

                        <div class="grid grid-cols-3 gap-3">
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

                            <div>
                                <label class="w-full input-group">
                                    {{-- <span class="input-group-text">$</span> --}}
                                    <input type="number" class="input grow" placeholder="00.00" />
                                    <span class="input-group-text">KG</span>
                                  </label>
                            </div>

                        </div>

                        <div class="grid grid-cols-3 gap-3 mt-3">

                            <div class="col-span-2">
                                <label class="w-full input-group">
                                    <span class="input-group-text">
                                        <span class="icon-[tabler--user] text-base-content/80 size-4"></span>
                                    </span>
                                    <div class="form-control grow">
                                        <input name="pic" type="text" placeholder="John Doe"
                                            class="input input-floating peer" />
                                        <span class="input-floating-label">PIC</span>
                                    </div>
                                </label>
                            </div>

                            <div>
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

                        </div>

                    </div>
                    <div class="flex items-center justify-between card-footer text-start">
                        <p class="text-base-content/50">Klik untuk menambahkan.</p>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </div>
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

        <div class="px-4 py-6 mt-4 bg-white shadow-sm rounded-xl">
            <div class="flex justify-between pb-6">
                <div>
                    <h5 class="text-lg font-semibold text-primary">Bibit Terdistribusi</h5>
                    <p class="text-sm text-base-content/70">Terdapat <b>90</b> transaksi bibit</p>
                </div>
                <form action="{{ route('fertilizer-distributions.index') }}" method="GET">
                    <x-utils.search-input />
                </form>
            </div>
            <hr>
        </div>
    </div>
</x-app-layout>
