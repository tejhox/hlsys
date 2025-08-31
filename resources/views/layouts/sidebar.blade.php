    @if (request()->routeIs('dashboard.index'))
        <div class="bg-white p-3">
            <a href="{{ route('production.index') }}" class="block">
                <div>
                    @include('components.sidebar-menu-btn', [
                        'bgColor' => 'bg-gradient-to-r from-white to-emerald-200',
                        'iconColor' => 'bg-blue-500',
                        'icon' => '<i data-lucide="file-plus-2" class="w-5 h-5 text-white"></i>',
                        'btnText' => '<div class="flex w-full">Buat Laporan <span class="ms-24"><i class="fa-solid fa-plus"></i></span></div>',
                    ])
                </div>
            </a>

            <div class="px-1 mt-10">
                <h1 class="text-sm font-extrabold text-slate-500">QUICK ACTIONS</h1>
            </div>
            <div class="mt-2 space-y-2">
                <a href="{{ route('kpi-chart') }}" class="block">
                    <div>
                        @include('components.sidebar-menu-btn', [
                            'bgColor' => 'bg-gradient-to-r from-white to-slate-50',
                            'iconColor' => 'bg-emerald-500',
                            'icon' => '<i data-lucide="chart-area" class="w-5 h-5 text-white"></i>',
                            'btnText' => 'Key Performance Indicator',
                        ])
                    </div>
                </a>
                <div>
                    @include('components.sidebar-menu-btn', [
                        'bgColor' => 'bg-gradient-to-r from-white to-slate-50',
                        'iconColor' => 'bg-violet-500',
                        'icon' => '<i data-lucide="book-copy" class="w-5 h-5 text-white"></i>',
                        'btnText' => 'Rekap Hasil Produksi',
                    ])
                </div>
                <div>
                    @include('components.sidebar-menu-btn', [
                        'bgColor' => 'bg-gradient-to-r from-white to-slate-50',
                        'iconColor' => 'bg-red-400',
                        'icon' => '<i data-lucide="clipboard-list" class="w-5 h-5 text-white"></i>',
                        'btnText' => 'Rangkuman KPI',
                    ])
                </div>
                <div>
                    @include('components.sidebar-menu-btn', [
                        'bgColor' => 'bg-gradient-to-r from-white to-slate-50',
                        'iconColor' => 'bg-orange-500',
                        'icon' => '<i data-lucide="file-chart-column" class="w-5 h-5 text-white"></i>',
                        'btnText' => 'Data Performance Line',
                    ])
                </div>
            </div>
        </div>
    @endif
