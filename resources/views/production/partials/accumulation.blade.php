<div class="bg-white shadow rounded-lg p-2 sm:border">
    <div class="flex justify-between items-center">
        <p class="text-sm text-slate-700 font-semibold">{{ $title }}</p>
        @if ($header && $header->efficiencyKpi)
            <a href="{{ route('kpi.index', ['header_id' => $header->id]) }}" class="btn btn-xs btn-primary lg:hidden">KPI
                <i class="fa-solid fa-chart-line"></i></a>
        @endif
    </div>
    <hr class="border-slate-400 mt-1" />
    <div>
        <table class="table table-xs lg:table-sm mt-1.5">
            <thead>
                <tr class="text-slate-200 bg-blue-600">
                    <th class="border text-xs lg:text-sm text-center">Plan</th>
                    <th class="border text-xs lg:text-sm text-center">Aktual</th>
                    <th class="border text-xs lg:text-sm text-center">Deviasi</th>
                    <th class="border text-xs lg:text-sm text-center">Loss Time</th>
                </tr>
            </thead>
            <tbody>
                @if ($header && $header->dekidakaAccumulation)
                    <tr class="text-slate-800 text-xs lg:text-sm text-center">
                        <td class="border font-semibold text-blue-600">
                            {{ $header->dekidakaAccumulation->total_plan }}</td>
                        <td class="border font-semibold text-emerald-600">
                            {{ $header->dekidakaAccumulation->total_actual }}</td>
                        <td class="border font-semibold text-orange-600">
                            {{ $header->dekidakaAccumulation->total_deviation }}</td>
                        <td class="border font-semibold text-red-600">
                            {{ $header->dekidakaAccumulation->total_loss_time }}'</td>
                    </tr>
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
</div>
