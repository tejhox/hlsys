<x-app-layout>
    <div class="p-1 mt-1 sm:hidden">
        @include('production.partials.header')
        <div class="mt-1">
            @include('production.partials.accumulation', ['title' => 'Akumulasi'])
        </div>
        <x-modals.confirm-delete-modal />
    </div>

    <div class="lg:flex lg:w-6/6 lg:space-x-1 lg:px-1 lg:mt-1">
        <div class="bg-none lg:h-screen sm:px-2 sm:py-2 lg:w-2/6 lg:bg-white lg:rounded-lg lg:border">
            <div class="hidden sm:flex sm:flex-col">
                <p class="text-sm text-slate-700 font-semibold text-center">PRODUCTION CONTROL BOARD</p>
                <hr class="border-slate-400 mt-1 mb-1.5" />
                @include('production.partials.header')
                <x-modals.confirm-delete-modal />
            </div>

            <div x-data="{ viewMode: null }" class="px-1 sm:pb-2">
                <div class="bg-white shadow rounded-lg border p-2 lg:p-0 lg:mt-2 lg:rounded-none lg:border-0">
                    <table class="table table-xs">
                        <thead>
                            <tr class="text-xs text-center text-slate-200 bg-blue-600">
                                <th class="border border-slate-400">Jam</th>
                                <th class="border border-slate-400">Plan</th>
                                <th class="border border-slate-400">Aktual</th>
                                <th class="border border-slate-400">Deviasi</th>
                                <th class="border border-slate-400">Loss Time</th>
                                <th class="hidden lg:table-cell border border-slate-400">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($header)
                                @forelse ($header->dekidakaMains as $main)
                                    <!-- Mobile View -->

                                    <tr @click="viewMode = viewMode === {{ $main->id }} ? null : {{ $main->id }}"
                                        class="lg:hidden text-xs text-center text-slate-800 cursor-pointer hover:bg-slate-100"
                                        :class="viewMode === {{ $main->id }} ? 'bg-slate-100' : ''">
                                        <td
                                            class="border border-b-slate-400 font-bold whitespace-nowrap 
                                                {{ $loop->index > 3 ? 'bg-slate-200' : 'bg-gray-100' }}">
                                            {{ $main->hour }}</td>
                                        <td class="border border-b-slate-400 font-semibold text-blue-600">
                                            {{ $main->plan }}</td>
                                        <td class="border border-b-slate-400 font-semibold text-emerald-600">
                                            {{ $main->actual }}
                                        </td>
                                        <td class="border border-b-slate-400 font-semibold text-orange-600">
                                            {{ $main->deviation }}
                                        </td>
                                        <td class="border border-b-slate-400 font-semibold text-red-600">
                                            {{ $main->loss_time }}'
                                        </td>
                                    </tr>
                                    <tr x-show="viewMode === {{ $main->id }}" x-cloak
                                        x-transition:enter="transition ease-out duration-200 transform"
                                        x-transition:enter-start="-translate-y-4 opacity-0"
                                        x-transition:enter-end="translate-y-0 opacity-200"
                                        x-transition:leave="transition ease-in duration-200 transform"
                                        x-transition:leave-start="translate-y-0 opacity-200"
                                        x-transition:leave-end="-translate-y-4 opacity-0" style="overflow: auto;">
                                        <td colspan="4" class="border bg-slate-50">
                                            <div class="w-full flex text-slate-800">
                                                <div class="w-5/6 border-r border-slate-400 font-semibold">
                                                    Keterangan Loss Time :
                                                </div>
                                                <div class="w-1/6 text-center">
                                                    <i class="fa-solid fa-clock"></i>
                                                </div>
                                            </div>
                                            <hr class="border-slate-400 mb-1" />
                                            @forelse ($main->lossTimeDetails as $detail)
                                                <div class="flex w-full">
                                                    <div class="w-5/6 flex border-r border-slate-400 pe-1.5">
                                                        <p class="text-slate-800 me-1">{{ $loop->iteration }}.</p>
                                                        <p class="text-slate-800 text-wrap">{{ $detail->note }}</p>
                                                    </div>
                                                    <div class="w-1/6 flex items-center justify-center">
                                                        <p class="text-red-600">{{ $detail->loss_time_detail }}'
                                                        </p>
                                                    </div>
                                                </div>
                                                <hr class="border-slate-300 mt-.5" />
                                            @empty
                                                <div class="w-full">
                                                    <span class="text-slate-800 italic text-center">-
                                                    </span>
                                                </div>
                                            @endforelse
                                        </td>
                                        <td class="border text-center bg-gray-100">
                                            <div
                                                class="{{ $main->lossTimeDetails->isEmpty() ? 'flex justify-center' : 'flex flex-col' }} px-2">
                                                <button type="button"
                                                    @click="window.dispatchEvent(new CustomEvent('open-dekidaka-edit-modal', { 
                                                        detail: { 
                                                            id: {{ $main->id }},
                                                            product: '{{ $header->product->name }}',
                                                            hour: '{{ $main->hour }}',
                                                            plan: {{ $main->plan }},
                                                            actual: {{ $main->actual }},
                                                            deviation: {{ $main->deviation }},
                                                            loss_time: {{ $main->loss_time }},
                                                            cycle_time: '{{ $header->product->cycle_time }}',
                                                            shift: '{{ $header->shift->shift }}'
                                                        } 
                                                    }))"
                                                    class="btn btn-xs btn-primary">
                                                    <i class="fa-solid fa-pencil"></i>
                                                </button>
                                                <button type="button"
                                                    @click="window.dispatchEvent(new CustomEvent('open-delete-modal', { 
                                                            detail: { 
                                                                deleteUrl: '/dekidaka-main/{{ $main->id }}',
                                                                product: '{{ $header->product->name }}',
                                                            } 
                                                        }))"
                                                    class="btn btn-xs btn-error {{ $main->lossTimeDetails->isEmpty() ? 'ms-1' : 'mt-1' }}">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>

                                    <!-- Desktop View -->
                                    <tr class="hidden lg:table-row text-xs text-center text-slate-800">
                                        <td
                                            class="border border-b-slate-400 font-bold whitespace-nowrap 
                                                {{ $loop->index > 3 ? 'bg-slate-200' : 'bg-gray-100' }}">
                                            {{ $main->hour }}</td>
                                        <td class="border border-b-slate-400 font-semibold text-blue-600">
                                            {{ $main->plan }}</td>
                                        <td class="border border-b-slate-400 font-semibold text-emerald-600">
                                            {{ $main->actual }}
                                        </td>
                                        <td class="border border-b-slate-400 font-semibold text-orange-600">
                                            {{ $main->deviation }}
                                        </td>
                                        <td class="border border-b-slate-400 font-semibold text-red-600">
                                            {{ $main->loss_time }}'
                                        </td>
                                        <td class="hidden lg:table-cell border border-b-slate-400 space-x-1">
                                            <button type="button"
                                                @click="window.dispatchEvent(new CustomEvent('open-dekidaka-edit-modal', { 
                                                        detail: { 
                                                            id: {{ $main->id }},
                                                            product: '{{ $header->product->name }}',
                                                            hour: '{{ $main->hour }}',
                                                            plan: {{ $main->plan }},
                                                            actual: {{ $main->actual }},
                                                            deviation: {{ $main->deviation }},
                                                            loss_time: {{ $main->loss_time }},
                                                            cycle_time: '{{ $header->product->cycle_time }}',
                                                            shift: '{{ $header->shift->shift }}'
                                                        } 
                                                    }))"
                                                class="btn btn-xs btn-primary">
                                                <i class="fa-solid fa-pencil"></i>
                                            </button>
                                            <button type="button"
                                                @click="window.dispatchEvent(new CustomEvent('open-delete-modal', { 
                                                            detail: { 
                                                                deleteUrl: '/dekidaka-main/{{ $main->id }}',
                                                                product: '{{ $header->product->name }}',
                                                            } 
                                                        }))"
                                                class="btn btn-xs btn-error">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center text-slate-500 py-4 italic">-----
                                            Belum Ada Data -----
                                        </td>
                                    </tr>
                                @endforelse
                            @elseif (!$header)
                                <tr>
                                    <td colspan="6" class="text-center font-semibold text-slate-500 py-4 italic">-----
                                        Belum Ada Data -----
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                    @if ($header)
                        <button type="button"
                            @click="window.dispatchEvent(new CustomEvent('open-dekidaka-input-modal', { 
                                detail: { 
                                    id: {{ $header->id }}, 
                                    date: '{{ $header->date }}',
                                    shift: '{{ $header->shift->shift }}',
                                    product: '{{ $header->product->name }}',
                                    cycle_time: {{ $header->product->cycle_time }}
                                }
                            }))"
                            class="btn btn-sm lg:btn-md btn-block bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white rounded-md shadow-lg mt-2.5">
                            Tambah Data <i class="fa-solid fa-plus"></i>
                        </button>
                    @endif
                </div>
                <x-modals.dekidaka-input-modal />
                <x-modals.confirm-delete-modal />
            </div>
        </div>
    </div>

    <div class="hidden lg:block lg:w-4/6">
        <div class="flex space-x-2 rounded-lg">
            <div class="w-3/5 space-y-1.5">
                @include('production.partials.accumulation', ['title' => 'AKUMULASI'])
                @include('production.partials.loss-time-detail', ['title' => 'LOSS TIME MONITORING'])
            </div>

            <div class="w-2/5 max-h-full overflow-auto bg-white py-1 px-2 rounded-lg border">
                <h1 class="font-extrabold text-center text-slate-700">KEY PERFORMANCE INDICATOR</h1>
                <hr class="border-slate-400 mb-2 mt-1" />
                <div class="space-y-2">
                    @include('kpi.partials.kpi-data')
                </div>
            </div>
        </div>
    </div>


    <x-modals.dekidaka-edit-modal />
</x-app-layout>
