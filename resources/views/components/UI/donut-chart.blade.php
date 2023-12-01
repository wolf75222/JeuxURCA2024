{{-- resources/views/components/UI/donut-chart.blade.php --}}

@props(['chartId', 'title', 'series', 'labels', 'colors'])

<div
    class="bg-white dark:bg-gray-800 rounded-lg shadow border border-gray-200 dark:border-gray-700 h-48 md:h-72 w-full">
    <div class="flex flex-col h-full p-6">
        <div class="flex-1">
            
            <h5 class="text-xl md:text-2xl lg:text-3xl font-bold leading-none text-gray-900 dark:text-white mb-2">
                {{ $title }} 
            </h5>
            <div class="h-20 " id="{{ $chartId }}"></div>
        </div>
    </div>

    <script>
        // ApexCharts options and config
        document.addEventListener("DOMContentLoaded", function () {
            const options = {
                series: @json($series),
                colors: @json($colors),
                chart: {
                    type: "donut",
                    height: '100%',
                    width: '100%',
                },
                labels: @json($labels),
                dataLabels: {
                    enabled: false,
                },
                legend: {
                    position: "bottom",
                    fontFamily: "Inter, sans-serif",
                    offsetY: 30,
                },
                plotOptions: {
                    pie: {
                        donut: {
                            labels: {
                                show: true,
                                /* total: {
                                    showAlways: true,
                                    show: true,
                                    label: "Total",
                                    fontFamily: "Inter, sans-serif",
                                    formatter: function (w) {
                                        return w.globals.seriesTotals.reduce((a, b) => a + b, 0);
                                    }
                                } */
                            }
                        }
                    }
                },
                responsive: [{
                    breakpoint: 700,
                    options: {
                        chart: {
                            width: '100%'
                        },
                        legend: {
                            show: false
                        },
                        plotOptions: {
                            pie: {
                                donut: {
                                    labels: {
                                        total: {
                                            show: false
                                        }
                                    }
                                }
                            }
                        }
                    }
                }]
            };

            const chart = new ApexCharts(document.querySelector("#{{ $chartId }}"), options);
            chart.render();
        });
    </script>
</div>