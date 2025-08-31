<x-kpi-card title="KPI - Efisiensi">
    <ul class="list-disc ps-5">
        <li class="text-sm text-slate-800 font-bold">
            <div class="flex justify-between">
                <span>Waktu Tersedia :</span>
                <span class="text-blue-600">{{ $header?->efficiencyKpi?->available_time ?? 0 }} <span
                        class="text-slate-600">Menit</span></span>
            </div>
        </li>
        <li class="text-sm text-slate-800 font-bold">
            <div class="flex justify-between">
                <div>
                    <span>Waktu Efektif</span>
                    <span class="ms-2.5">:</span>
                </div>
                <span class="text-orange-600">{{ $header?->efficiencyKpi?->effective_time ?? 0 }} <span
                        class="text-slate-600">Menit</span></span>
            </div>
        </li>
        <hr class="border-slate-400 my-2" />
        <li class="text-sm text-slate-800 font-bold">
            <div class="flex justify-between">
                <div>
                    <span>Efisiensi</span>
                    <span class="ms-11">:</span>
                </div>
                <span class="text-emerald-600">{{ round($header?->efficiencyKpi?->result_efficiency ?? 0) }}%</span>
            </div>
        </li>
    </ul>
</x-kpi-card>

<x-kpi-card title="KPI - Loss Time">
    <ul class="list-disc ps-5">
        <li class="text-sm text-slate-800 font-bold">
            <div class="flex justify-between">
                <span>Waktu Tersedia :</span>
                <span class="text-blue-600">{{ $header?->lossTimeKpi?->available_time ?? 0 }} <span
                        class="text-slate-600">Menit</span></span>
            </div>
        </li>
        <li class="text-sm text-slate-800 font-bold">
            <div class="flex justify-between">
                <div>
                    <span>Loss Time</span>
                    <span class="ms-[34px]">:</span>
                </div>
                <span class="text-orange-600">{{ $header?->lossTimeKpi?->loss_time ?? 0 }} <span
                        class="text-slate-600">Menit</span></span>
            </div>
        </li>
        <hr class="border-slate-400 my-2" />
        <li class="text-sm text-slate-800 font-bold">
            <div class="flex justify-between">
                <div>
                    <span>Loss Time</span>
                    <span class="ms-[35px]">:</span>
                </div>
                <span class="text-red-500">{{ round($header?->lossTimeKpi?->result_loss_time) ?? 0 }}%</span>
            </div>
        </li>
    </ul>
</x-kpi-card>

<x-kpi-card title="KPI - Pcs/Hour">
    <ul class="list-disc ps-5">
        <li class="text-sm text-slate-800 font-bold">
            <div class="flex justify-between">
                <div>
                    <span>Total Produksi</span>
                    <span class="ms-[43px]">:</span>
                </div>
                <span class="text-blue-600">{{ $header?->pcsPerHourKpi?->actual_output ?? 0 }} <span
                        class="text-slate-600">Pcs</span></span>
            </div>
        </li>
        <li class="text-sm text-slate-800 font-bold">
            <div class="flex justify-between">
                <div>
                    <span>Waktu Efektif (Hour) :</span>
                </div>
                <span class="text-orange-600">{{ $header?->pcsPerHourKpi?->effective_hour ?? 0 }} <span
                        class="text-slate-600">Hr</span></span>
            </div>
        </li>
        <hr class="border-slate-400 my-2" />
        <li class="text-sm text-slate-800 font-bold">
            <div class="flex justify-between">
                <div>
                    <span>Pcs/Hour</span>
                    <span class="ms-[72px]">:</span>
                </div>
                <span class="text-blue-600">{{ round($header?->pcsPerHourKpi?->result_pcs_per_hour) ?? 0 }} <span
                        class="text-slate-600">Pcs</span></span>
            </div>
        </li>
    </ul>
</x-kpi-card>

<x-kpi-card title="KPI - Cycle Time Actual vs Std">
    <ul class="list-disc ps-5">
        <li class="text-sm text-slate-800 font-bold">
            <div class="flex justify-between">
                <div>
                    <span>Waktu Efektif</span>
                    <span class="ms-[29px]">:</span>
                </div>
                <span class="text-blue-600">{{ $header?->cycleTimeKpi?->effective_time ?? 0 }} <span
                        class="text-slate-600">Menit</span></span>
            </div>
        </li>
        <li class="text-sm text-slate-800 font-bold">
            <div class="flex justify-between">
                <div>
                    <span>Total Produksi</span>
                    <span class="ms-[26px]">:</span>
                </div>
                <span class="text-orange-600">{{ $header?->cycleTimeKpi?->actual_output ?? 0 }} <span
                        class="text-slate-600">Pcs</span></span>
            </div>
        </li>
        <hr class="border-slate-400 my-2" />
        <li class="text-sm text-slate-800 font-bold">
            <div class="flex justify-between">
                <span>Cycle Time Actual :</span>
                <span class="text-blue-600">{{ $header?->cycleTimeKpi?->result_cycle_time_actual ?? 0 }}
                    <span class="text-slate-600">Menit</span></span>
            </div>
        </li>
    </ul>
</x-kpi-card>
