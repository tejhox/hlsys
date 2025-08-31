<x-app-layout>
    <div x-data="{
        activeLine: null,
        activeGroup: null
    }" class="hidden lg:flex space-x-2">
        <!-- Ini Sidebar -->
        <div
            class="hidden lg:block w-1/5 min-h-screen bg-white shadow-[4px_0_6px_-1px_rgba(0,0,0,0.1)] shadow-slate-400">
            <div class="p-1">
                <div class="px-1 py-1.5 transition-colors">
                    <div class="px-2">
                        <div class="flex items-center space-x-2">
                            <div class="bg-blue-500 p-1.5 rounded-md">
                                <i data-lucide="activity" class="w-4 h-4 text-white"></i>
                            </div>
                            <span class="font-semibold text-slate-700">Line</span>
                            <i data-lucide="chevron-down" class="w-4 h-4 ms-6 text-blue-700"></i>
                        </div>
                        <hr class="my-1.5" />
                    </div>
                    <div class="ps-9 pe-2 space-y-2">
                        <div @click="activeLine = activeLine === 1 ? null : 1"
                            :class="activeLine === 1 ?
                                'py-2 ps-3 pe-2 bg-gradient-to-r from-slate-50 to-blue-100 shadow border rounded-lg cursor-pointer hover:from-slate-100 hover:to-blue-200' :
                                'py-2 ps-3 pe-2 bg-gradient-to-r border rounded-lg cursor-pointer hover:from-slate-50 hover:to-blue-100 shadow'">
                            <div class="flex items-center justify-between space-x-2 pe-1">
                                <div class="flex items-center">
                                    <div class="w-2 h-2 bg-blue-600 rounded-full"></div>
                                    <span class="font-semibold text-sm text-slate-700 ms-2">ER 01</span>
                                </div>
                                <i x-show="activeLine !== 1" data-lucide="chevron-right"
                                    class="w-4 h-4 ms-6 text-blue-700"></i>
                                <i x-show="activeLine === 1" data-lucide="chevron-down"
                                    class="w-4 h-4 ms-6 text-blue-700"></i>
                            </div>
                            <div x-show="activeLine === 1" x-cloak x-transition:enter="transition ease-out duration-300"
                                x-transition:enter-start="opacity-0 max-h-0"
                                x-transition:enter-end="opacity-100 max-h-40"
                                x-transition:leave="transition ease-in duration-200"
                                x-transition:leave-start="opacity-100 max-h-40"
                                x-transition:leave-end="opacity-0 max-h-0" class="w-full ps-4 pe-3 overflow-hidden">
                                <hr class="mt-1 mb-2 border-white" />
                                <div class="flex space-x-1">
                                    <button @click.stop class="btn btn-xs btn-info text-white w-1/2 filter-btn"
                                        data-line="1" data-group="1">GROUP
                                        1</button>
                                    <button @click.stop class="btn btn-xs btn-info text-white w-1/2 filter-btn"
                                        data-line="1" data-group="2">GROUP
                                        2</button>
                                </div>
                            </div>
                        </div>
                        <div @click="activeLine = activeLine === 2 ? null : 2"
                            :class="activeLine === 2 ?
                                'py-2 ps-3 pe-2 bg-gradient-to-r from-slate-50 to-blue-100 shadow border rounded-lg cursor-pointer hover:from-slate-100 hover:to-blue-200' :
                                'py-2 ps-3 pe-2 bg-gradient-to-r border rounded-lg cursor-pointer hover:from-slate-50 hover:to-blue-100 shadow'">
                            <div class="flex items-center justify-between space-x-2 pe-1">
                                <div class="flex items-center">
                                    <div class="w-2 h-2 bg-green-600 rounded-full"></div>
                                    <span class="font-semibold text-sm text-slate-700 ms-2">ER 02</span>
                                </div>
                                <i x-show="activeLine !== 2" data-lucide="chevron-right"
                                    class="w-4 h-4 ms-6 text-blue-700"></i>
                                <i x-show="activeLine === 2" data-lucide="chevron-down"
                                    class="w-4 h-4 ms-6 text-blue-700"></i>
                            </div>
                            <div x-show="activeLine === 2" x-cloak x-transition:enter="transition ease-out duration-300"
                                x-transition:enter-start="opacity-0 max-h-0"
                                x-transition:enter-end="opacity-100 max-h-40"
                                x-transition:leave="transition ease-in duration-200"
                                x-transition:leave-start="opacity-100 max-h-40"
                                x-transition:leave-end="opacity-0 max-h-0" class="w-full ps-4 pe-3 overflow-hidden">
                                <hr class="mt-1 mb-2 border-white" />
                                <div class="flex space-x-1">
                                    <button @click.stop class="btn btn-xs btn-info text-white w-1/2 filter-btn"
                                        data-line="2" data-group="1">GROUP
                                        1</button>
                                    <button @click.stop class="btn btn-xs btn-info text-white w-1/2 filter-btn"
                                        data-line="2" data-group="2">GROUP
                                        2</button>
                                </div>
                            </div>
                        </div>
                        <div @click="activeLine = activeLine === 3 ? null : 3"
                            :class="activeLine === 3 ?
                                'py-2 ps-3 pe-2 bg-gradient-to-r from-slate-50 to-blue-100 shadow border rounded-lg cursor-pointer hover:from-slate-100 hover:to-blue-200' :
                                'py-2 ps-3 pe-2 bg-gradient-to-r border rounded-lg cursor-pointer hover:from-slate-50 hover:to-blue-100 shadow'">
                            <div class="flex items-center justify-between space-x-2 pe-1">
                                <div class="flex items-center">
                                    <div class="w-2 h-2 bg-orange-600 rounded-full"></div>
                                    <span class="font-semibold text-sm text-slate-700 ms-2">ER 03</span>
                                </div>
                                <i x-show="activeLine !== 3" data-lucide="chevron-right"
                                    class="w-4 h-4 ms-6 text-blue-700"></i>
                                <i x-show="activeLine === 3" data-lucide="chevron-down"
                                    class="w-4 h-4 ms-6 text-blue-700"></i>
                            </div>
                            <div x-show="activeLine === 3" x-cloak x-transition:enter="transition ease-out duration-300"
                                x-transition:enter-start="opacity-0 max-h-0"
                                x-transition:enter-end="opacity-100 max-h-40"
                                x-transition:leave="transition ease-in duration-200"
                                x-transition:leave-start="opacity-100 max-h-40"
                                x-transition:leave-end="opacity-0 max-h-0" class="w-full ps-4 pe-3 overflow-hidden">
                                <hr class="mt-1 mb-2 border-white" />
                                <div class="flex space-x-1">
                                    <button @click.stop class="btn btn-xs btn-info text-white w-1/2 filter-btn"
                                        data-line="3" data-group="1">GROUP
                                        1</button>
                                    <button @click.stop class="btn btn-xs btn-info text-white w-1/2 filter-btn"
                                        data-line="3" data-group="2">GROUP
                                        2</button>
                                </div>
                            </div>
                        </div>
                        <div @click="activeLine = activeLine === 4 ? null : 4"
                            :class="activeLine === 4 ?
                                'py-2 ps-3 pe-2 bg-gradient-to-r from-slate-50 to-blue-100 shadow border rounded-lg cursor-pointer hover:from-slate-100 hover:to-blue-200' :
                                'py-2 ps-3 pe-2 bg-gradient-to-r border rounded-lg cursor-pointer hover:from-slate-50 hover:to-blue-100 shadow'">
                            <div class="flex items-center justify-between space-x-2 pe-1">
                                <div class="flex items-center">
                                    <div class="w-2 h-2 bg-violet-600 rounded-full"></div>
                                    <span class="font-semibold text-sm text-slate-700 ms-2">ER 150</span>
                                </div>
                                <i x-show="activeLine !== 4" data-lucide="chevron-right"
                                    class="w-4 h-4 ms-6 text-blue-700"></i>
                                <i x-show="activeLine === 4" data-lucide="chevron-down"
                                    class="w-4 h-4 ms-6 text-blue-700"></i>
                            </div>
                            <div x-show="activeLine === 4" x-cloak
                                x-transition:enter="transition ease-out duration-300"
                                x-transition:enter-start="opacity-0 max-h-0"
                                x-transition:enter-end="opacity-100 max-h-40"
                                x-transition:leave="transition ease-in duration-200"
                                x-transition:leave-start="opacity-100 max-h-40"
                                x-transition:leave-end="opacity-0 max-h-0" class="w-full ps-4 pe-3 overflow-hidden">
                                <hr class="mt-1 mb-2 border-white" />
                                <div class="flex space-x-1">
                                    <button @click.stop class="btn btn-xs btn-info text-white w-1/2 filter-btn"
                                        data-line="4" data-group="1">GROUP
                                        1</button>
                                    <button @click.stop class="btn btn-xs btn-info text-white w-1/2 filter-btn"
                                        data-line="4" data-group="2">GROUP
                                        2</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Ini Komponen Utama -->
        <div class="w-4/5 py-1">
            <div class="bg-slate-100 rounded-md">
                <div
                    class="flex justify-between bg-gradient-to-r from-blue-600 to-blue-800 py-3 ps-4 pe-6 rounded-t-lg shadow-lg">
                    <h1 class="font-bold text-xl text-white">KEY PERFORMANCE INDICATOR</h1>
                    <div>
                        <span class="font-bold text-xl text-white"
                            x-text="$store.kpi.activeLine === '1' ? 'ER 01' 
                            : $store.kpi.activeLine === '2' ? 'ER 02' 
                            : $store.kpi.activeLine === '3' ? 'ER 03' 
                            : $store.kpi.activeLine === '4' ? 'ER 150' 
                            : 'ER 01'">
                        </span>
                        <span class="mx-3 font-bold text-xl text-white"> - </span>
                        <span class="font-bold text-xl text-white"
                            x-text="$store.kpi.activeGroup ? 'GROUP ' + $store.kpi.activeGroup : 'GROUP 1'">
                        </span>
                    </div>
                </div>
                <div class="flex">
                    <div class="w-1/2 p-1">
                        <div class="bg-white py-2 rounded-md border">
                            <div id="efficiencyChart"></div>
                        </div>
                    </div>
                    <div class="w-1/2 p-1">
                        <div class="bg-white py-2 rounded-md border">
                            <div id="lossTimeChart"></div>
                        </div>
                    </div>
                </div>
                <div class="flex">
                    <div class="w-1/2 p-1">
                        <div class="bg-white py-2 rounded-md border">
                            <div id="pcsPerHourChart"></div>
                        </div>
                    </div>
                    <div class="w-1/2 p-1">
                        <div class="bg-white py-2 rounded-md border">
                            <div id="cycleTimeChart"></div>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                // Efficiency Chart
                let efficiencyChart;
                async function renderChartEfficiency(url, elementId, title, color) {
                    const response = await fetch(url);
                    const data = await response.json();

                    if (!efficiencyChart) {
                        const options = {
                            chart: {
                                type: 'line',
                                height: 300
                            },
                            series: [{
                                name: title,
                                data: data.values
                            }],
                            stroke: {
                                width: 2,
                                curve: 'straight'
                            },
                            markers: {
                                size: 4
                            },
                            xaxis: {
                                categories: data.labels,
                                labels: {
                                    style: {
                                        fontSize: '10px'
                                    }
                                }
                            },
                            yaxis: {
                                min: 0,
                                max: 100,
                                tickAmount: 10,
                                labels: {
                                    formatter: val => val + "%",
                                    style: {
                                        fontSize: '10px'
                                    }
                                }
                            },
                            colors: [color],
                            annotations: {
                                yaxis: [{
                                    y: 87,
                                    borderColor: '#FF0000',
                                    label: {
                                        borderColor: '#FF0000',
                                        style: {
                                            color: '#fff',
                                            background: '#FF0000'
                                        },
                                        text: 'Target 87%'
                                    }
                                }]
                            },
                            title: {
                                text: title,
                                align: 'left'
                            },
                            tooltip: {
                                y: {
                                    formatter: val => val + "%"
                                }
                            }
                        };
                        efficiencyChart = new ApexCharts(document.querySelector(elementId), options);
                        efficiencyChart.render();
                    } else {
                        // update series & categories agar transisi smooth
                        efficiencyChart.updateOptions({
                            xaxis: {
                                categories: data.labels
                            }
                        });
                        efficiencyChart.updateSeries([{
                            name: title,
                            data: data.values
                        }]);
                    }
                }

                // Loss Time Chart
                let lossTimeChart;
                async function renderChartLossTime(url, elementId, title, color) {
                    const response = await fetch(url);
                    const data = await response.json();

                    if (!lossTimeChart) {
                        const options = {
                            chart: {
                                type: 'line',
                                height: 300
                            },
                            series: [{
                                name: title,
                                data: data.values
                            }],
                            stroke: {
                                width: 2,
                                curve: 'straight'
                            },
                            markers: {
                                size: 4
                            },
                            xaxis: {
                                categories: data.labels,
                                labels: {
                                    style: {
                                        fontSize: '10px'
                                    }
                                }
                            },
                            yaxis: {
                                min: 0,
                                max: 100,
                                tickAmount: 10,
                                labels: {
                                    formatter: val => val + "%",
                                    style: {
                                        fontSize: '10px'
                                    }
                                }
                            },
                            colors: [color],
                            annotations: {
                                yaxis: [{
                                    y: 13,
                                    borderColor: '#FF0000',
                                    label: {
                                        borderColor: '#FF0000',
                                        style: {
                                            color: '#fff',
                                            background: '#FF0000'
                                        },
                                        text: 'Target 13%'
                                    }
                                }]
                            },
                            title: {
                                text: title,
                                align: 'left'
                            },
                            tooltip: {
                                y: {
                                    formatter: val => val + "%"
                                }
                            }
                        };
                        lossTimeChart = new ApexCharts(document.querySelector(elementId), options);
                        lossTimeChart.render();
                    } else {
                        lossTimeChart.updateOptions({
                            xaxis: {
                                categories: data.labels
                            }
                        });
                        lossTimeChart.updateSeries([{
                            name: title,
                            data: data.values
                        }]);
                    }
                }

                // Pcs/Hour Chart
                let pcsPerHourChart;
                async function renderChartPcsPerHour(url, elementId, title, color) {
                    const response = await fetch(url);
                    const data = await response.json();

                    if (!pcsPerHourChart) {
                        const options = {
                            chart: {
                                type: 'line',
                                height: 300
                            },
                            series: [{
                                name: title,
                                data: data.values
                            }],
                            stroke: {
                                width: 2,
                                curve: 'straight'
                            },
                            markers: {
                                size: 4
                            },
                            xaxis: {
                                categories: data.labels,
                                labels: {
                                    style: {
                                        fontSize: '10px'
                                    }
                                }
                            },
                            yaxis: {
                                min: 30,
                                max: 60,
                                tickAmount: 10,
                                labels: {
                                    style: {
                                        fontSize: '10px'
                                    },
                                    formatter: function(val) {
                                        return val.toFixed(0);
                                    },
                                }
                            },
                            colors: [color],
                            title: {
                                text: title,
                                align: 'left'
                            },
                        };
                        pcsPerHourChart = new ApexCharts(document.querySelector(elementId), options);
                        pcsPerHourChart.render();
                    } else {
                        pcsPerHourChart.updateOptions({
                            xaxis: {
                                categories: data.labels
                            }
                        });
                        pcsPerHourChart.updateSeries([{
                            name: title,
                            data: data.values
                        }]);
                    }
                }

                // Cycle Time Chart
                let cycleTimeChart;
                async function renderChartCycleTime(url, elementId, title, color) {
                    const response = await fetch(url);
                    const data = await response.json();

                    if (!cycleTimeChart) {
                        const options = {
                            chart: {
                                type: 'line',
                                height: 300
                            },
                            series: [{
                                name: title,
                                data: data.values
                            }],
                            stroke: {
                                width: 2,
                                curve: 'straight'
                            },
                            markers: {
                                size: 4
                            },
                            xaxis: {
                                categories: data.labels,
                                labels: {
                                    style: {
                                        fontSize: '10px'
                                    }
                                }
                            },
                            yaxis: {
                                min: 0.6,
                                max: 2,
                                tickAmount: 10,
                                labels: {
                                    style: {
                                        fontSize: '10px'
                                    }
                                }
                            },
                            colors: [color],
                            title: {
                                text: title,
                                align: 'left'
                            },
                        };
                        cycleTimeChart = new ApexCharts(document.querySelector(elementId), options);
                        cycleTimeChart.render();
                    } else {
                        cycleTimeChart.updateOptions({
                            xaxis: {
                                categories: data.labels
                            }
                        });
                        cycleTimeChart.updateSeries([{
                            name: title,
                            data: data.values
                        }]);
                    }
                }

                // Render default chart
                renderChartEfficiency(`/kpi/efficiencyChart?line=${1}&group=${1}`, "#efficiencyChart", "EFISIENSI", "#1E90FF");
                renderChartLossTime(`/kpi/lossTimeChart?line=${1}&group=${1}`, "#lossTimeChart", "LOSS TIME", "#1E90FF");
                renderChartPcsPerHour(`/kpi/pcsPerHourChart?line=${1}&group=${1}`, "#pcsPerHourChart", "PCS/HOUR", "#1E90FF");
                renderChartCycleTime(`/kpi/cycleTimeChart?line=${1}&group=${1}`, "#cycleTimeChart", "CYCLE TIME STD VS ACTUAL",
                    "#1E90FF");

                document.addEventListener('alpine:init', () => {
                    Alpine.store('kpi', {
                        activeLine: null,
                        activeGroup: null
                    })
                })

                document.querySelectorAll('.filter-btn').forEach(btn => {
                    btn.addEventListener('click', () => {
                        const line = btn.dataset.line;
                        const group = btn.dataset.group;

                        Alpine.store('kpi').activeLine = line;
                        Alpine.store('kpi').activeGroup = group;

                        renderChartEfficiency(`/kpi/efficiencyChart?line=${line}&group=${group}`,
                            "#efficiencyChart", "EFISIENSI", "#1E90FF");

                        renderChartLossTime(`/kpi/lossTimeChart?line=${line}&group=${group}`,
                            "#lossTimeChart", "LOSS TIME", "#1E90FF");

                        renderChartPcsPerHour(`/kpi/pcsPerHourChart?line=${line}&group=${group}`,
                            "#pcsPerHourChart", "PCS/HOUR", "#1E90FF");

                        renderChartCycleTime(`/kpi/cycleTimeChart?line=${line}&group=${group}`,
                            "#cycleTimeChart", "CYCLE TIME STD VS ACTUAL", "#1E90FF");
                    });
                });
            </script>

        </div>
    </div>
</x-app-layout>
