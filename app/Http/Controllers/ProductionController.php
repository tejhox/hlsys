<?php

namespace App\Http\Controllers;

use App\Models\DekidakaHeader;
use App\Models\DekidakaMain;
use App\Models\Group;
use App\Models\Line;
use App\Models\Product;
use App\Models\Shift;
use Illuminate\Http\Request;

class ProductionController extends Controller
{
    public function index(Request $request)
    {
        $lines = Line::all();
        $products = Product::all();
        $shifts = Shift::all();
        $groups = Group::all();

        $header = null;

        if ($request->has('header_id')) {
           $header = DekidakaHeader::with([
                'line', 
                'product', 
                'shift', 
                'group', 
                'dekidakaMains.lossTimeDetails',
                'efficiencyKpi',
                'lossTimeKpi',
                'pcsPerHourKpi',
                'cycleTimeKpi',
            ])->find($request->header_id);
        }

        // dd($header);

        return view('production.index', compact(
            'lines',
            'products',
            'shifts',
            'groups',
            'header',
        ));
    }
}
