<x-app-layout>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

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
