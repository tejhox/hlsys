<div class="h-full min-h-full sm:mt-2">
    <div class="sm:block sm:rounded-lg">
        <div class="sm:min-h-[500px] sm:p-1 sm:rounded-md sm:bg-white">
            <div
                class=" bg-white py-1 px-2 rounded mb-1 sm:mb-2 sm:bg-gray-200/50 sm:text-sm sm:py-2 sm:shadow sm:shadow-slate-400">
                <p class="text-slate-700 text-xs font-bold text-center sm:text-sm sm:text-slate-700">{{ $group }}
                </p>
            </div>
            <table class="table table-xs sm:table-sm text-xs text-slate-800">
                <thead>
                    <tr class="text-xs text-center text-white bg-gray-700/60">
                        <th class="border border-slate-400 bg-blue-600">No</th>
                        {{-- <th>Line</th> --}}
                        <th class="border border-slate-400 bg-blue-600">Product</th>
                        <th class="border border-slate-400 bg-blue-600">Shift</th>
                        {{-- <th>Group</th> --}}
                        <th class="border border-slate-400 bg-blue-600">Tanggal</th>
                        <th class="border border-slate-400 bg-blue-600">Leader</th>
                        <th class="hidden sm:table-cell border border-slate-400 bg-blue-600">Action</th>

                    </tr>
                </thead>
                <tbody class="bg-white">
                    @forelse ($headers as $header)
                        <tr onclick="window.location='{{ route('production.index', ['header_id' => $header->id]) }}';"
                            class="text-xs text-center cursor-pointer hover:bg-slate-200 transition">
                            <td class="border border-slate-400 sm:font-bold">
                                {{ $headers->firstItem() + $loop->index }}
                            </td>
                            <td class="border border-slate-400 sm:font-bold whitespace-nowrap">
                                {{ $header->product->name }}
                            </td>
                            <td class="border border-slate-400 sm:font-bold whitespace-nowrap">
                                {{ $header->shift->shift }}</td>
                            <td class="border border-slate-400 sm:font-bold whitespace-nowrap">
                                {{ \Carbon\Carbon::parse($header->date)->format('d-m-Y') }}
                            </td>
                            <td
                                class="border border-slate-400 sm:font-bold max-w-[60px] sm:max-w-full truncate overflow-hidden whitespace-nowrap text-ellipsis">
                                {{ $header->user->name }}
                            </td>
                            <td class="hidden sm:table-cell border border-slate-400 sm:font-bold">
                                <div class="flex justify-center space-x-1">
                                    <button type="button" class="btn btn-xs btn-outline btn-primary"><i
                                            class="fa-solid fa-eye"></i></i></button>
                                    <button type="button" class="btn btn-xs btn-outline btn-secondary"><i
                                            class="fa-solid fa-pencil"></i></button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5"
                                class="sm:hidden text-center border border-slate-400 text-slate-500 py-4 italic">
                                -----
                                Belum Ada Laporan
                                -----
                            </td>
                            <td colspan="6"
                                class="hidden sm:table-cell text-center border border-slate-400 text-slate-500 py-4 italic">
                                -----
                                Belum Ada Laporan
                                -----
                            </td>
                        </tr>
                    @endforelse
                    @if ($headers->total() > 6)
                        <tr class="border border-slate-400">
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
