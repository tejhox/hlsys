@php
    $prevHour = null;
@endphp

<div class="h-[calc(100vh-132px)] bg-white shadow rounded-lg p-2 sm:border">
    <p class="text-sm text-slate-700 font-semibold">{{ $title }}</p>
    <hr class="border-slate-400 mt-1" />
    <table class="table table-sm mt-1.5">
        <thead>
            <tr class="text-center text-white bg-gradient-to-r from-orange-500 to-red-500">
                <th class="border">Jam</th>
                <th class="border">Faktor</th>
                <th class="border">Keterangan</th>
                <th class="border">Loss Time</th>
            </tr>
        </thead>
        <tbody class="bg-white">
            @if ($header)
                @forelse ($header->dekidakaMains as $item)
                    @if ($item->lossTimeDetails->isEmpty())
                        <tr class="text-center text-slate-800">
                            <td class="border bg-slate-50 font-semibold whitespace-nowrap">
                                {{ $item->hour }}
                            </td>
                            <td class="border">-</td>
                            <td class="border">-</td>
                            <td class="border">-</td>
                        </tr>
                    @endif
                    @foreach ($item->lossTimeDetails as $detail)
                        <tr class="text-center">
                            <td class="border bg-slate-50 font-semibold whitespace-nowrap">
                                @if ($item->hour !== $prevHour)
                                    {{ $item->hour }}
                                    @php $prevHour = $item->hour; @endphp
                                @endif
                            </td>
                            <td class="border text-center">
                                @if ($detail->factor === 'Man')
                                    <div class="badge badge-outline badge-xs badge-accent">
                                        <i data-lucide="person-standing" class="w-3 h-3"></i>{{ $detail->factor }}
                                    </div>
                                @elseif ($detail->factor === 'Method')
                                    <div class="badge badge-outline badge-xs badge-primary">
                                        <i data-lucide="wrench" class="w-3 h-3"></i>{{ $detail->factor }}
                                    </div>
                                @elseif ($detail->factor === 'Machine')
                                    <div class="badge badge-outline badge-xs badge-secondary">
                                        <i data-lucide="cog" class="w-3 h-3"></i>{{ $detail->factor }}
                                    </div>
                                @else
                                    <div class="badge badge-outline badge-xs badge-warning">
                                        <i data-lucide="brick-wall" class="w-3 h-3"></i>{{ $detail->factor }}
                                    </div>
                                @endif
                            </td>
                            <td class="border text-left">{{ $detail->note }}</td>
                            <td class="border font-bold text-red-600">
                                {{ $detail->loss_time_detail }}'
                            </td>
                        </tr>
                    @endforeach
                @empty
                    <tr class="border bg-slate-50 font-semibold whitespace-nowrap">
                        <td colspan="4" class="text-center text-slate-500 py-4 italic">----- Tidak Ada Loss Time
                            -----
                        </td>
                    </tr>
                @endforelse
                @else
                <tr class="border bg-slate-50 font-semibold whitespace-nowrap">
                        <td colspan="4" class="text-center text-slate-500 py-4 italic">----- Belum Ada Data
                            -----
                        </td>
                    </tr>
            @endif
        </tbody>
    </table>
</div>
