<div class="w-full bg-white card">
    <div class="card-body">
        <div id="school-distribution-chart"></div>

        <!-- Include ApexCharts -->
        <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const chartData = @json($chartData);

                const options = {
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
                                        fontSize: "1rem"
                                    },
                                    value: {
                                        fontSize: "1.2rem",
                                        color: "#333",
                                        formatter: function(val) {
                                            return val + "%"
                                        }
                                    },
                                    total: {
                                        show: false
                                    }
                                }
                            }
                        }
                    },
                    series: chartData.series,
                    labels: chartData.labels,
                    legend: {
                        show: true,
                        position: "bottom",
                        markers: {
                            offsetX: -3
                        },
                        labels: {
                            useSeriesColors: true
                        },
                        formatter: function(seriesName, opts) {
                            return seriesName + " - " + chartData.series[opts.seriesIndex] + "%";
                        }
                    },
                    dataLabels: {
                        enabled: false
                    },
                    stroke: {
                        show: false,
                        curve: "straight"
                    },
                    colors: ["#6366F1", "#A855F7", "#EC4899"],
                    states: {
                        hover: {
                            filter: {
                                type: "none"
                            }
                        }
                    },
                    tooltip: {
                        enabled: true,
                        y: {
                            formatter: function(value) {
                                return value + "%";
                            }
                        }
                    }
                };

                const chart = new ApexCharts(document.querySelector("#school-distribution-chart"), options);
                chart.render();
            });
        </script>
    </div>
</div>
