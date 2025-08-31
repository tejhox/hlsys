<?php

namespace App\Http\Controllers;

use App\Models\CycleTimeKpi;
use App\Models\DekidakaHeader;
use App\Models\EfficiencyKpi;
use App\Models\LossTimeKpi;
use App\Models\PcsPerHourKpi;
use Carbon\Carbon;
use Illuminate\Http\Request;

class KpiChartController extends Controller
{
    public function index()
    {
        return view('kpi-chart.index');
    }


    public function efficiencyChart(Request $request)
    {
        $line = $request->input('line');
        $group = $request->input('group');

        $data = EfficiencyKpi::with('dekidakaHeader')
            ->when($line || $group, function($q) use ($line, $group) {
                $q->whereHas('dekidakaHeader', function($q2) use ($line, $group) {
                    if ($line) $q2->where('line_id', $line);
                    if ($group) $q2->where('group_id', $group);
                });
            })
            ->orderBy('date')
            ->get(['result_efficiency', 'dekidaka_header_id', 'date']);

        return response()->json([
            'values' => $data->pluck('result_efficiency'),
            'labels' => $data->pluck('date')->map(fn($d) => \Carbon\Carbon::parse($d)->format('d M')),
        ]);
    }


    public function lossTimeChart(Request $request)
    {
        $line = $request->input('line');
        $group = $request->input('group');

        $data = LossTimeKpi::with('dekidakaHeader')
            ->when($line || $group, function($q) use ($line, $group) {
                $q->whereHas('dekidakaHeader', function($q2) use ($line, $group) {
                    if ($line) $q2->where('line_id', $line);
                    if ($group) $q2->where('group_id', $group);
                });
            })
            ->orderBy('date')
            ->get(['result_loss_time', 'dekidaka_header_id', 'date']);

        return response()->json([
            'values' => $data->pluck('result_loss_time'),
            'labels' => $data->pluck('date')->map(fn($d) => \Carbon\Carbon::parse($d)->format('d M')),
        ]);
    }

    public function pcsPerHourChart(Request $request)
    {
        $line = $request->input('line');
        $group = $request->input('group');

        $data = PcsPerHourKpi::with('dekidakaHeader')
            ->when($line || $group, function($q) use ($line, $group) {
                $q->whereHas('dekidakaHeader', function($q2) use ($line, $group) {
                    if ($line) $q2->where('line_id', $line);
                    if ($group) $q2->where('group_id', $group);
                });
            })
            ->orderBy('date')
            ->get(['result_pcs_per_hour', 'dekidaka_header_id', 'date']);

        return response()->json([
            'values' => $data->pluck('result_pcs_per_hour'),
            'labels' => $data->pluck('date')->map(fn($d) => \Carbon\Carbon::parse($d)->format('d M')),
        ]);
    }

    public function cycleTimeChart(Request $request)
    {
        $line = $request->input('line');
        $group = $request->input('group');

        $data = CycleTimeKpi::with('dekidakaHeader')
            ->when($line || $group, function($q) use ($line, $group) {
                $q->whereHas('dekidakaHeader', function($q2) use ($line, $group) {
                    if ($line) $q2->where('line_id', $line);
                    if ($group) $q2->where('group_id', $group);
                });
            })
            ->orderBy('date')
            ->get(['result_cycle_time_actual', 'dekidaka_header_id', 'date']);

        return response()->json([
            'values' => $data->pluck('result_cycle_time_actual'),
            'labels' => $data->pluck('date')->map(fn($d) => \Carbon\Carbon::parse($d)->format('d M')),
        ]);
    }

}
