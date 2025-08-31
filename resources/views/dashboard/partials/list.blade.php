<div x-data="{
    viewAccumulation: null
}" class="h-full min-h-full sm:mt-2">
    <div class="sm:block sm:rounded-lg sm:shadow-md sm:shadow-slate-700/50">
        <div class="sm:min-h-full sm:p-1 sm:rounded-lg sm:bg-white">
            <div class="hidden sm:flex items-center justify-between p-2">
                <h3 class="text-lg font-extrabold text-slate-700 flex items-center gap-2">
                    <div class="w-3 h-3 {{ $group === 'GROUP 1' ? 'bg-green-500' : 'bg-yellow-500' }} rounded-full">
                    </div>
                    {{ $group }}
                </h3>
                <span class="bg-green-100 text-green-700 px-2 py-1 rounded-full text-sm font-medium">
                    <span x-text="{{ $headers->total() }}"></span> items
                </span>
            </div>
            <hr class="hidden sm:block sm:border sm:border-slate-200 sm:mb-2" />
            <div
                class=" sm:hidden bg-white py-1 px-2 rounded mb-1 sm:mb-2 sm:bg-gray-200/50 sm:text-sm sm:py-2 sm:shadow sm:shadow-slate-400">
                <p class="text-slate-700 text-xs font-bold text-center sm:text-sm sm:text-slate-700">{{ $group }}
                </p>
            </div>
            <table class="table table-xs sm:table-sm text-xs text-slate-800">
                <thead>
                    <tr class="text-xs text-center text-white bg-gray-700/60">
                        <th class="bg-blue-600">
                            <span class="hidden sm:inline-flex items-center space-x-1 mt-0.5">
                                <i data-lucide="hash" class="w-3 h-3"></i>
                                <span>No</span>
                            </span>
                            <span class="block sm:hidden">No</span>
                        </th>
                        <th class=" bg-blue-600">Product</th>
                        <th class=" bg-blue-600">Shift</th>
                        <th class=" bg-blue-600">Tanggal</th>
                        <th class=" bg-blue-600">Leader</th>
                        <th class="hidden sm:table-cell  bg-blue-600">
                            <span class="inline-flex items-center space-x-1">
                                <span>Action</span>
                                <i data-lucide="bolt" class="w-3 h-3"></i>
                            </span>
                        </th>

                    </tr>
                </thead>
                <tbody class="bg-white">
                    @forelse ($headers as $header)
                    <!-- Desktop View -->
                        <tr @click="viewAccumulation = viewAccumulation === {{ $header->id }} ? null : {{ $header->id }}"
                            class="hidden lg:table-row text-xs text-center cursor-pointer hover:bg-slate-100">
                            <td class="border-b sm:font-bold">
                                {{ $headers->firstItem() + $loop->index }}
                            </td>
                            <td class="border-b sm:font-bold whitespace-nowrap">
                                {{ $header->product->name }}
                            </td>
                            <td class="border-b sm:font-bold whitespace-nowrap">
                                {{ $header->shift->shift }}</td>
                            <td class="border-b sm:font-bold whitespace-nowrap">
                                {{ \Carbon\Carbon::parse($header->date)->format('d-m-Y') }}
                            </td>
                            <td
                                class="border-b sm:font-bold max-w-[60px] sm:max-w-full truncate overflow-hidden whitespace-nowrap text-ellipsis">
                                {{ $header->user->name }}
                            </td>
                            <td class="hidden sm:table-cell sm:font-bold">
                                <div class="flex justify-center space-x-1">
                                    <button type="button"
                                        @click="window.location='{{ route('production.index', ['header_id' => $header->id]) }}';"
                                        class="btn btn-xs btn-outline btn-primary"><i
                                            class="fa-solid fa-eye"></i></i></button>
                                </div>
                            </td>
                        </tr>
                        <tr x-show="viewAccumulation === {{ $header->id }}" x-cloak
                            x-transition:enter="transition ease-out duration-200 transform"
                            x-transition:enter-start="-translate-y-4 opacity-0"
                            x-transition:enter-end="translate-y-0 opacity-200"
                            x-transition:leave="transition ease-in duration-200 transform"
                            x-transition:leave-start="translate-y-0 opacity-200"
                            x-transition:leave-end="-translate-y-4 opacity-0" style="overflow: auto;"
                            class="hidden lg:table-row text-white text-xs text-center">
                            <th class="text-slate-800"></th>
                            <th colspan="4" class="border bg-emerald-500 border-slate-400">Akumulasi</th>
                            <th class="text-slate-800"></th>
                        </tr>
                        <tr x-show="viewAccumulation === {{ $header->id }}" x-cloak
                            x-transition:enter="transition ease-out duration-200 transform"
                            x-transition:enter-start="-translate-y-4 opacity-0"
                            x-transition:enter-end="translate-y-0 opacity-200"
                            x-transition:leave="transition ease-in duration-200 transform"
                            x-transition:leave-start="translate-y-0 opacity-200"
                            x-transition:leave-end="-translate-y-4 opacity-0" style="overflow: auto;"
                            class="hidden lg:table-row text-white text-xs text-center">
                            <th></th>
                            <th class="bg-slate-200 text-slate-700 border border-slate-300">Plan</th>
                            <th class="bg-slate-200 text-slate-700 border border-slate-300">Aktual</th>
                            <th class="bg-slate-200 text-slate-700 border border-slate-300">Deviasi</th>
                            <th class="bg-slate-200 text-slate-700 border border-slate-300">Loss Time</th>
                            <th></th>
                        </tr>
                        <tr x-show="viewAccumulation === {{ $header->id }}" x-cloak
                            x-transition:enter="transition ease-out duration-200 transform"
                            x-transition:enter-start="-translate-y-4 opacity-0"
                            x-transition:enter-end="translate-y-0 opacity-200"
                            x-transition:leave="transition ease-in duration-200 transform"
                            x-transition:leave-start="translate-y-0 opacity-200"
                            x-transition:leave-end="-translate-y-4 opacity-0" style="overflow: auto;"
                            class="hidden lg:table-row text-slate-800 text-xs text-center">
                            <td></td>
                            <td class="bg-slate-50 font-semibold text-blue-600 border">
                                {{ $header?->dekidakaAccumulation?->total_plan ?? '-'}}</td>
                            <td class="bg-slate-50 font-semibold text-emerald-600 border">
                                {{ $header?->dekidakaAccumulation?->total_actual ?? '-' }}</td>
                            <td class="bg-slate-50 font-semibold text-orange-600 border">
                                {{ $header?->dekidakaAccumulation?->total_deviation ?? '-' }}</td>
                            <td class="bg-slate-50 font-semibold text-red-600 border">
                                {{ $header?->dekidakaAccumulation?->total_loss_time ?? '-'}}'</td>
                        </tr>
                        </tr>

                    <!-- Mobile View -->
                     <tr @click="window.location='{{ route('production.index', ['header_id' => $header->id]) }}';"
                            class="lg:hidden text-xs text-center cursor-pointer hover:bg-slate-100">
                            <td class="border-b sm:font-bold">
                                {{ $headers->firstItem() + $loop->index }}
                            </td>
                            <td class="border-b sm:font-bold whitespace-nowrap">
                                {{ $header->product->name }}
                            </td>
                            <td class="border-b sm:font-bold whitespace-nowrap">
                                {{ $header->shift->shift }}</td>
                            <td class="border-b sm:font-bold whitespace-nowrap">
                                {{ \Carbon\Carbon::parse($header->date)->format('d-m-Y') }}
                            </td>
                            <td
                                class="border-b sm:font-bold max-w-[60px] sm:max-w-full truncate overflow-hidden whitespace-nowrap text-ellipsis">
                                {{ $header->user->name }}
                            </td>
                            <td class="hidden sm:table-cell sm:font-bold">
                                <div class="flex justify-center space-x-1">
                                    <button type="button"
                                        onclick="window.location='{{ route('production.index', ['header_id' => $header->id]) }}';"
                                        class="btn btn-xs btn-outline btn-primary"><i
                                            class="fa-solid fa-eye"></i></i></button>
                                    <button type="button" class="btn btn-xs btn-outline btn-secondary"><i
                                            class="fa-solid fa-pencil"></i></button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="sm:hidden text-center text-slate-500 py-4 italic">
                                -----
                                Belum Ada Laporan
                                -----
                            </td>
                            <td colspan="6" class="hidden sm:table-cell text-center text-slate-500 py-4 italic">
                                -----
                                Belum Ada Laporan
                                -----
                            </td>
                        </tr>
                    @endforelse
                    @if ($headers->total() > 6)
                        <tr>
                            <td colspan="5" class="sm:hidden">
                                <div class="py-2">
                                    {{ $headers->links('vendor.pagination.custom') }}
                                </div>
                            </td>
                            <td colspan="6" class="hidden sm:table-cell">
                                <div class="py-2">
                                    {{ $headers->links('vendor.pagination.custom') }}
                                </div>
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
