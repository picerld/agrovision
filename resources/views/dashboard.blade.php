<x-app-layout>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
    <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>

    <div class="flex py-5">
        <div class="flex mx-auto gap-11">
            <div class="stats max-sm:w-full">
                <div class="stat">
                    <div class="avatar placeholder">
                        <div class="rounded-full bg-success/20 text-success size-10">
                            <span class="icon-[tabler--package] size-6"></span>
                        </div>
                    </div>
                    <div class="mb-1 stat-value">Order</div>
                    <div class="stat-title">7,500 of 10,000 orders</div>
                    <div class="h-2 progress bg-success/10" role="progressbar" aria-label="Order Progressbar"
                        aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                        <div class="w-3/4 progress-bar progress-success"></div>
                    </div>
                </div>
            </div>

            <div class="stats max-sm:w-full">
                <div class="stat">
                    <div class="avatar placeholder">
                        <div class="rounded-full bg-warning/20 text-warning size-10">
                            <span class="icon-[tabler--cash] size-6"></span>
                        </div>
                    </div>
                    <div class="mb-1 stat-value">Revenue</div>
                    <div class="stat-title">$45,000 of $100,000</div>
                    <div class="h-2 progress bg-warning/10" role="progressbar" aria-label="Revenue Progressbar"
                        aria-valuenow="45" aria-valuemin="0" aria-valuemax="100">
                        <div class="w-2/5 progress-bar progress-warning"></div>
                    </div>
                </div>
            </div>

            <div class="stats max-sm:w-full">
                <div class="stat">
                    <div class="avatar placeholder">
                        <div class="rounded-full bg-error/20 text-error size-10">
                            <span class="icon-[tabler--credit-card] size-6"></span>
                        </div>
                    </div>
                    <div class="mb-1 stat-value">Invoice</div>
                    <div class="stat-title">$18,200 of $25,000</div>
                    <div class="h-2 progress bg-error/10" role="progressbar" aria-label="Invoice Progressbar"
                        aria-valuenow="73" aria-valuemin="0" aria-valuemax="100">
                        <div class="progress-bar progress-error w-[73%]"></div>
                    </div>
                </div>
            </div>

            <div class="stats max-sm:w-full">
                <div class="stat">
                    <div class="avatar placeholder">
                        <div class="rounded-full bg-success/20 text-success size-10">
                            <span class="icon-[tabler--package] size-6"></span>
                        </div>
                    </div>
                    <div class="mb-1 stat-value">Order</div>
                    <div class="stat-title">7,500 of 10,000 orders</div>
                    <div class="h-2 progress bg-success/10" role="progressbar" aria-label="Order Progressbar"
                        aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                        <div class="w-3/4 progress-bar progress-success"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="pb-5 mx-3">
        <div class="w-full card">
            <div class="card-body">
                <h5 class="card-title mb-2.5">Welcome to Our Service</h5>
                <div id="apex-multiple-area-charts-compare"></div>
            </div>
        </div>
    </div>

    <div class="mx-3">
        <div class="w-full card">
            <div class="card-body">
                <h5 class="card-title mb-2.5">Commodity Table</h5>
                <div class="w-full">
                    <div class="flex flex-col flex-wrap gap-3 sm:flex-row sm:items-center sm:justify-between">
                        <div class="relative inline-flex dropdown">
                            <button id="dropdown-default" type="button"
                                class="font-normal dropdown-toggle btn btn-outline btn-secondary" aria-haspopup="menu"
                                aria-expanded="false" aria-label="Dropdown">
                                <span class="icon-[tabler--clock]"></span>
                                Last 30 days
                                <span class="icon-[tabler--chevron-down] dropdown-open:rotate-180 size-4"></span>
                            </button>
                            <ul class="hidden dropdown-menu dropdown-open:opacity-100 min-w-10" role="menu"
                                aria-orientation="vertical" aria-labelledby="dropdown-default">
                                <li><a class="dropdown-item" href="javascript:void(0)">Last 3 days</a></li>
                                <li><a class="dropdown-item" href="javascript:void(0)">Last 7 days</a></li>
                                <li><a class="dropdown-item" href="javascript:void(0)">Last 30 days</a></li>
                                <li><a class="dropdown-item" href="javascript:void(0)">Last 3 months</a></li>
                                <li><a class="dropdown-item" href="javascript:void(0)">Last year</a></li>
                            </ul>
                        </div>
                        <label class="max-w-xs input-group">
                            <span class="input-group-text">
                                <span class="icon-[tabler--search] size-6"></span>
                            </span>
                            <input type="search" class="input grow" placeholder="Search" />
                        </label>
                    </div>

                    <div class="mt-8 overflow-x-auto">
                        <table class="table">
                            <!-- head -->
                            <thead>
                                <tr>
                                    <th>
                                        <input type="checkbox" class="checkbox checkbox-primary checkbox-sm"
                                            aria-label="product" />
                                    </th>
                                    <th>Product</th>
                                    <th>Color</th>
                                    <th>Category</th>
                                    <th>Price</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- row 1 -->
                                <tr>
                                    <th>
                                        <label>
                                            <input type="checkbox" class="checkbox checkbox-primary checkbox-sm"
                                                aria-label="product" />
                                        </label>
                                    </th>
                                    <td>
                                        <div class="flex items-center gap-3">
                                            <div class="avatar">
                                                <div class="w-10 h-10 rounded-md bg-base-content/10">
                                                    <img src="https://cdn.flyonui.com/fy-assets/components/table/product-2.png"
                                                        alt="product image" />
                                                </div>
                                            </div>
                                            <div>
                                                <div class="text-sm opacity-50">Apple</div>
                                                <div class="font-medium">iPhone 14 Pro</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>Stealth black</td>
                                    <td>
                                        <div class="flex items-center">
                                            <span class="p-1 rounded-full badge badge-primary badge-soft me-2">
                                                <span class="icon-[tabler--device-mobile]"></span>
                                            </span>
                                            Phone
                                        </div>
                                    </td>
                                    <td>$599</td>
                                    <td>
                                        <button class="btn btn-circle btn-text btn-sm"
                                            aria-label="Action button"><span
                                                class="icon-[tabler--pencil]"></span></button>
                                        <button class="btn btn-circle btn-text btn-sm"
                                            aria-label="Action button"><span
                                                class="icon-[tabler--trash]"></span></button>
                                        <button class="btn btn-circle btn-text btn-sm"
                                            aria-label="Action button"><span
                                                class="icon-[tabler--dots-vertical]"></span></button>
                                    </td>
                                </tr>
                                <!-- row 2 -->
                                <tr>
                                    <th>
                                        <label>
                                            <input type="checkbox" class="checkbox checkbox-primary checkbox-sm"
                                                aria-label="product" />
                                        </label>
                                    </th>
                                    <td>
                                        <div class="flex items-center gap-3">
                                            <div class="avatar">
                                                <div class="w-10 h-10 rounded-md bg-base-content/10">
                                                    <img src="https://cdn.flyonui.com/fy-assets/components/table/product-1.png"
                                                        alt="product image" />
                                                </div>
                                            </div>
                                            <div>
                                                <div class="text-sm opacity-50">Apple</div>
                                                <div class="font-medium">Watch series 7</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>Peach</td>
                                    <td>
                                        <div class="flex items-center">
                                            <span class="p-1 rounded-full badge badge-info badge-soft me-2">
                                                <span class="icon-[tabler--device-watch]"></span>
                                            </span>
                                            Watch
                                        </div>
                                    </td>
                                    <td>$999</td>
                                    <td>
                                        <button class="btn btn-circle btn-text btn-sm"
                                            aria-label="Action button"><span
                                                class="icon-[tabler--pencil]"></span></button>
                                        <button class="btn btn-circle btn-text btn-sm"
                                            aria-label="Action button"><span
                                                class="icon-[tabler--trash]"></span></button>
                                        <button class="btn btn-circle btn-text btn-sm"
                                            aria-label="Action button"><span
                                                class="icon-[tabler--dots-vertical]"></span></button>
                                    </td>
                                </tr>
                                <!-- row 3 -->
                                <tr>
                                    <th>
                                        <label>
                                            <input type="checkbox" class="checkbox checkbox-primary checkbox-sm"
                                                aria-label="product" />
                                        </label>
                                    </th>
                                    <td>
                                        <div class="flex items-center gap-3">
                                            <div class="avatar">
                                                <div class="w-10 h-10 rounded-md bg-base-content/15">
                                                    <img src="https://cdn.flyonui.com/fy-assets/components/table/product-19.png"
                                                        alt="product image" />
                                                </div>
                                            </div>
                                            <div>
                                                <div class="text-sm opacity-50">Meta</div>
                                                <div class="font-medium">Quest</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>Elegant white</td>
                                    <td>
                                        <div class="flex items-center">
                                            <span class="p-1 rounded-full badge badge-success badge-soft me-2">
                                                <span class="icon-[tabler--device-vision-pro]"></span>
                                            </span>
                                            VR headset
                                        </div>
                                    </td>
                                    <td>$499</td>
                                    <td>
                                        <button class="btn btn-circle btn-text btn-sm"
                                            aria-label="Action button"><span
                                                class="icon-[tabler--pencil]"></span></button>
                                        <button class="btn btn-circle btn-text btn-sm"
                                            aria-label="Action button"><span
                                                class="icon-[tabler--trash]"></span></button>
                                        <button class="btn btn-circle btn-text btn-sm"
                                            aria-label="Action button"><span
                                                class="icon-[tabler--dots-vertical]"></span></button>
                                    </td>
                                </tr>
                                <!-- row 4 -->
                                <tr>
                                    <th>
                                        <label>
                                            <input type="checkbox" class="checkbox checkbox-primary checkbox-sm"
                                                aria-label="product" />
                                        </label>
                                    </th>
                                    <td>
                                        <div class="flex items-center gap-3">
                                            <div class="avatar">
                                                <div class="w-10 h-10 rounded-md bg-base-content/15">
                                                    <img src="https://cdn.flyonui.com/fy-assets/components/table/product-5.png"
                                                        alt="product image" />
                                                </div>
                                            </div>
                                            <div>
                                                <div class="text-sm opacity-50">Apple</div>
                                                <div class="font-medium">Macbook Pro 16</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>Space gray</td>
                                    <td>
                                        <div class="flex items-center">
                                            <span class="p-1 rounded-full badge badge-warning badge-soft me-2">
                                                <span class="icon-[tabler--device-laptop]"></span>
                                            </span>
                                            Laptop
                                        </div>
                                    </td>
                                    <td>$1999</td>
                                    <td>
                                        <button class="btn btn-circle btn-text btn-sm"
                                            aria-label="Action button"><span
                                                class="icon-[tabler--pencil]"></span></button>
                                        <button class="btn btn-circle btn-text btn-sm"
                                            aria-label="Action button"><span
                                                class="icon-[tabler--trash]"></span></button>
                                        <button class="btn btn-circle btn-text btn-sm"
                                            aria-label="Action button"><span
                                                class="icon-[tabler--dots-vertical]"></span></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="flex flex-wrap items-center justify-between gap-2 py-4 pt-6">
                        <div class="block max-w-sm text-sm font-normal text-gray-500 me-2 sm:mb-0">
                            Showing
                            <span class="font-semibold text-gray-900">1-4</span>
                            of
                            <span class="font-semibold">20</span>
                            products
                        </div>
                        <nav class="join">
                            <button type="button" class="btn btn-soft btn-square join-item"
                                aria-label="previous button">
                                <span class="icon-[tabler--chevron-left] size-5 rtl:rotate-180"></span>
                            </button>
                            <button type="button"
                                class="btn btn-soft join-item btn-square aria-[current='page']:text-bg-primary">1</button>
                            <button type="button"
                                class="btn btn-soft join-item btn-square aria-[current='page']:text-bg-primary"
                                aria-current="page">
                                2
                            </button>
                            <button type="button"
                                class="btn btn-soft join-item btn-square aria-[current='page']:text-bg-primary">3</button>
                            <button type="button" class="btn btn-soft btn-square join-item"
                                aria-label="next button">
                                <span class="icon-[tabler--chevron-right] size-5 rtl:rotate-180"></span>
                            </button>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <button class="btn btn-primary" id="notyf-custom-example">Custom notyf</button>



    <script>
        window.addEventListener('load', function() {
            const notyfCustom = new Notyf({
                duration: 3000,
                position: {
                    x: 'right',
                    y: 'bottom'
                },
                types: [{
                    type: 'primary',
                    background: '#7367F0',
                    icon: {
                        className: 'icon-[tabler--circle-check] !text-primary',
                        tagName: 'i'
                    },
                    text: '',
                    color: 'white'
                }]
            })

            document.getElementById('notyf-custom-example').addEventListener('click', function() {
                notyfCustom.open({
                    type: 'primary',
                    message: 'This is primary notification!',
                    duration: 3000,
                    ripple: true,
                    dismissible: true
                })
            })
        })
    </script>


    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const initRevenueChart = () => {
                const chart = new ApexCharts(document.querySelector("#apex-multiple-area-charts-compare"), {
                    chart: {
                        height: 400,
                        type: "area",
                        toolbar: {
                            show: false
                        },
                        zoom: {
                            enabled: false
                        }
                    },
                    series: [{
                            name: "2024",
                            data: [20000, 40000, 60000, 30000, 40000, 100000, 70000, 90000, 70000,
                                65000, 90000, 100000
                            ]
                        },
                        {
                            name: "2023",
                            data: [7000, 18000, 20000, 40000, 27000, 50000, 19000, 99000, 32000,
                                70000, 42000, 50000
                            ]
                        }
                    ],
                    legend: {
                        show: true,
                        position: "top",
                        horizontalAlign: "right",
                        labels: {
                            useSeriesColors: true
                        },
                        markers: {
                            offsetY: 2
                        }
                    },
                    dataLabels: {
                        enabled: false
                    },
                    stroke: {
                        curve: "straight",
                        width: 2
                    },
                    grid: {
                        strokeDashArray: 2,
                        borderColor: 'var(--border-color)'
                    },
                    // Changed base colors to blue and purple
                    colors: ["#4338ca", "#7c3aed"],
                    fill: {
                        type: "gradient",
                        gradient: {
                            shadeIntensity: 1,
                            opacityFrom: 0.7,
                            // Changed gradient colors to matching blue and purple tones
                            gradientToColors: ["#1e40af", "#5b21b6"],
                            opacityTo: 0.3,
                            stops: [0, 90, 100]
                        }
                    },
                    xaxis: {
                        type: "category",
                        tickPlacement: "on",
                        categories: [
                            "1 January",
                            "1 February",
                            "1 March",
                            "1 April",
                            "1 May",
                            "1 June",
                            "1 July",
                            "1 August",
                            "1 September",
                            "1 October",
                            "1 November",
                            "1 December"
                        ],
                        axisBorder: {
                            show: false
                        },
                        axisTicks: {
                            show: false
                        },
                        tooltip: {
                            enabled: false
                        },
                        labels: {
                            style: {
                                fontSize: "12px",
                                colors: "var(--text-color)",
                                fontWeight: 400
                            },
                            formatter: function(title) {
                                if (title) {
                                    const newT = title.split(" ");
                                    return newT[1].slice(0, 3);
                                }
                                return title;
                            }
                        }
                    },
                    yaxis: {
                        labels: {
                            align: "left",
                            minWidth: 0,
                            maxWidth: 140,
                            style: {
                                fontSize: "12px",
                                colors: "var(--text-color)",
                                fontWeight: 400
                            },
                            formatter: function(value) {
                                return value >= 1000 ? `${value / 1000}k` : value;
                            }
                        }
                    },
                    tooltip: {
                        x: {
                            format: "MMMM yyyy"
                        },
                        y: {
                            formatter: function(value) {
                                return `$${value >= 1000 ? `${value / 1000}k` : value}`;
                            }
                        },
                        custom: function({
                            series,
                            seriesIndex,
                            dataPointIndex,
                            w
                        }) {
                            const data = series[seriesIndex][dataPointIndex];
                            const year = w.globals.seriesNames[seriesIndex];
                            const month = w.globals.categoryLabels[dataPointIndex];

                            return `<div class="apexcharts-tooltip-box">
                        <div class="apexcharts-tooltip-title">${month}</div>
                        <div class="apexcharts-tooltip-series-group">
                            <span class="apexcharts-tooltip-marker" style="background-color: ${w.globals.colors[seriesIndex]}"></span>
                            <div class="apexcharts-tooltip-text">
                                <div class="apexcharts-tooltip-y-group">
                                    <span class="apexcharts-tooltip-text-y-label">${year}: </span>
                                    <span class="apexcharts-tooltip-text-y-value">$${data >= 1000 ? `${(data/1000).toFixed(1)}k` : data}</span>
                                </div>
                            </div>
                        </div>
                    </div>`;
                        }
                    },
                    responsive: [{
                        breakpoint: 568,
                        options: {
                            chart: {
                                height: 300
                            },
                            labels: {
                                style: {
                                    colors: 'var(--text-color)',
                                    fontSize: "10px"
                                },
                                offsetX: -2,
                                formatter: function(title) {
                                    return title.slice(0, 3);
                                }
                            },
                            yaxis: {
                                labels: {
                                    align: "left",
                                    minWidth: 0,
                                    maxWidth: 140,
                                    style: {
                                        colors: 'var(--text-color)',
                                        fontSize: "10px"
                                    },
                                    formatter: function(value) {
                                        return value >= 1000 ? `${value / 1000}k` : value;
                                    }
                                }
                            }
                        }
                    }]
                });

                chart.render();
            };

            if (document.querySelector("#apex-multiple-area-charts-compare")) {
                initRevenueChart();
            }
        });
    </script>



</x-app-layout>
