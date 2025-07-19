<div class="h-full min-h-full">
    <div class="sm:rounded-lg sm:min-h-60">
        <div class=" bg-gray-100/70 py-1 px-2 rounded mb-1">
            <p class="text-slate-700 text-xs font-extrabold text-center">{{ $group }}</p>
        </div>
        <table class="table table-xs sm:table-sm text-xs text-slate-800">
            <thead>
                <tr class="text-xs text-center text-white {{ $color }}">
                    <th class="border">No</th>
                    {{-- <th>Line</th> --}}
                    <th class="border">Product</th>
                    <th class="border">Shift</th>
                    {{-- <th>Group</th> --}}
                    <th class="border">Tanggal</th>
                    <th class="border">Leader</th>
                </tr>
            </thead>
            <tbody class="bg-white">
                @forelse ($headers as $header)
                    <tr onclick="window.location='{{ route('production.index', ['header_id' => $header->id]) }}';"
                        class="text-xs text-center cursor-pointer hover:bg-slate-200 transition">
                        <td class="border ">{{ $headers->firstItem() + $loop->index }}</td>
                        <td class="border whitespace-nowrap text-left">{{ $header->product->name }}</td>
                        <td class="border whitespace-nowrap">{{ $header->shift->shift }}</td>
                        <td class="border whitespace-nowrap">
                            {{ \Carbon\Carbon::parse($header->date)->format('d-m-Y') }}
                        </td>
                        <td class="border max-w-[90px] truncate overflow-hidden whitespace-nowrap text-ellipsis">
                            {{ $header->user->name }}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center text-slate-500 py-4 italic">----- Belum Ada Laporan -----
                        </td>
                    </tr>
                @endforelse
                @if ($headers->count() > 0)
                    <tr>
                        <td colspan="5">
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
