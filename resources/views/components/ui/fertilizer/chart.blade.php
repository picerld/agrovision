<div class="card w-full bg-white">
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