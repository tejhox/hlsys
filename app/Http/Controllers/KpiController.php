<?php

namespace App\Http\Controllers;

use App\Models\DekidakaHeader;
use Illuminate\Http\Request;

class KpiController extends Controller
{
    public function index(Request $request)
    {
         $header = DekidakaHeader::with([
                'efficiencyKpi',
                'lossTimeKpi',
                'pcsPerHourKpi',
                'cycleTimeKpi',
            ])->find($request->header_id);

        return view('kpi.index', compact('header'));
    }
}
