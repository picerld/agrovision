<div class="pb-5 mx-3">
    <div class="w-full card">
        <div class="card-body">
            <h5 class="card-title mb-2.5">Distribution Chart</h5>
            <div id="distributionChart"></div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const initDistributionChart = () => {
            const months = @json($months);
            const seedData = @json($seedData);
            const fertilizerData = @json($fertilizerData);
            const totalDistribution = @json($totalDistribution);

            const chart = new ApexCharts(document.querySelector("#distributionChart"), {
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
                        name: "Seed Distribution",
                        data: seedData
                    },
                    {
                        name: "Fertilizer Distribution",
                        data: fertilizerData
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
                colors: ["#4338ca", "#7c3aed"],
                fill: {
                    type: "gradient",
                    gradient: {
                        shadeIntensity: 1,
                        opacityFrom: 0.7,
                        gradientToColors: ["#1e40af", "#5b21b6"],
                        opacityTo: 0.3,
                        stops: [0, 90, 100]
                    }
                },
                xaxis: {
                    type: "category",
                    tickPlacement: "on",
                    categories: months,
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
                            return value >= 1000 ? `${(value / 1000).toFixed(1)}k` : value;
                        }
                    }
                },
                tooltip: {
                    enabled: true,
                    shared: true,
                    intersect: false,
                    followCursor: true,
                    custom: function({
                        series,
                        seriesIndex,
                        dataPointIndex,
                        w
                    }) {
                        const seedValue = series[0][dataPointIndex];
                        const fertilizerValue = series[1][dataPointIndex];
                        const month = w.globals.categoryLabels[dataPointIndex];
                        const totalMonthly = seedValue + fertilizerValue;
                        const percentageOfTotal = ((totalMonthly / totalDistribution) * 100)
                            .toFixed(1);

                        return `
                    <div class="apexcharts-tooltip-box" style="padding: 8px; background: rgba(255, 255, 255, 0.96); box-shadow: 0 2px 6px rgba(0,0,0,0.1); border-radius: 4px;">
                        <div style="font-weight: bold; margin-bottom: 5px; color: #333;">
                            ${month}
                        </div>
                        <div style="margin: 5px 0;">
                            <div style="display: flex; justify-content: space-between; margin: 3px 0;">
                                <span style="color: ${w.globals.colors[0]}">● Seed:</span>
                                <span style="font-weight: 500;">${seedValue.toLocaleString()} units</span>
                            </div>
                            <div style="display: flex; justify-content: space-between; margin: 3px 0;">
                                <span style="color: ${w.globals.colors[1]}">● Fertilizer:</span>
                                <span style="font-weight: 500;">${fertilizerValue.toLocaleString()} units</span>
                            </div>
                        </div>
                        <div style="border-top: 1px solid #eee; margin-top: 5px; padding-top: 5px;">
                            <div style="display: flex; justify-content: space-between; font-weight: bold;">
                                <span>Monthly Total:</span>
                                <span>${totalMonthly.toLocaleString()} units</span>
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
                            offsetX: -2
                        },
                        yaxis: {
                            labels: {
                                align: "left",
                                minWidth: 0,
                                maxWidth: 140,
                                style: {
                                    colors: 'var(--text-color)',
                                    fontSize: "10px"
                                }
                            }
                        }
                    }
                }]
            });

            chart.render();
        };

        if (document.querySelector("#distributionChart")) {
            initDistributionChart();
        }
    });
</script>
