<div x-data="{
    viewMode: null
}" class="sm:min-h-[393px] bg-white shadow rounded-lg p-2 mt-1">
    <div>
        <table class="table table-xs mt-1.5">
            <thead>
                <tr class="text-xs text-center text-slate-200 bg-blue-600">
                    <th class="border border-slate-400">Jam</th>
                    <th class="border border-slate-400">Plan</th>
                    <th class="border border-slate-400">Aktual</th>
                    <th class="border border-slate-400">Deviasi</th>
                    <th class="border border-slate-400">Loss Time</th>
                </tr>
            </thead>
            <tbody>
                @if ($header)
                    @forelse ($header->dekidakaMains as $main)
                        <tr @click="viewMode = viewMode === {{ $main->id }} ? null : {{ $main->id }}"
                            class="text-xs
                            text-center text-slate-800 cursor-pointer hover:bg-slate-100"
                            :class="viewMode === {{ $main->id }} ? 'bg-slate-100' : ''">
                            <td
                                class="border border-b-slate-400 font-bold whitespace-nowrap 
                            {{ $loop->index > 3 ? 'bg-slate-200' : 'bg-gray-100' }}">
                                {{ $main->hour }}</td>
                            <td class="border border-b-slate-400 font-semibold text-blue-600">{{ $main->plan }}</td>
                            <td class="border border-b-slate-400 font-semibold text-emerald-600">{{ $main->actual }}
                            </td>
                            <td class="border border-b-slate-400 font-semibold text-orange-600">{{ $main->deviation }}
                            </td>
                            <td class="border border-b-slate-400 font-semibold text-red-600">{{ $main->loss_time }}'
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
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-slate-500 py-4 italic">----- Belum Ada Data -----
                            </td>
                        </tr>
                    @endforelse
                @endif
            </tbody>
        </table>
        @if ($header)
            <button type="button"
                @click="window.dispatchEvent(new CustomEvent('open-dekidaka-input-modal', { 
                detail: { 
                    id: {{ $header->id }}, 
                    shift: '{{ $header->shift->shift }}',
                    product: '{{ $header->product->name }}',
                    cycle_time: {{ $header->product->cycle_time }}
                }
            }))"
                class="btn btn-sm bg-blue-700 text-white border-white w-full mt-1 text-lg">
                <i class="fa-solid fa-plus"></i>
            </button>
        @endif
    </div>
</div>
<x-modals.dekidaka-edit-modal />
