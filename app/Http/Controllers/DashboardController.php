<?php

namespace App\Http\Controllers;

use App\Models\DekidakaHeader;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
   public function index() 
    {
        $relations = ['line', 'product', 'shift', 'group', 'user'];
        
        // Line ER 01
        $line1group1 = DekidakaHeader::with($relations)
            ->where('line_id', 1)
            ->where('group_id', 1)
            ->latest()
            ->paginate(5, ['*'], 'page_group1');

        $line1group2 = DekidakaHeader::with($relations)
            ->where('line_id', 1)
            ->where('group_id', 2)
            ->latest()
            ->paginate(5, ['*'], 'page_group2');

        $line1group3 = DekidakaHeader::with($relations)
            ->where('line_id', 1)
            ->where('group_id', 3)
            ->latest()
            ->paginate(5, ['*'], 'page_group3');

        // Line ER 02    
        $line2group1 = DekidakaHeader::with($relations)
            ->where('line_id', 2)
            ->where('group_id', 1)
            ->latest()
            ->paginate(5, ['*'], 'page_group1');

        $line2group2 = DekidakaHeader::with($relations)
            ->where('line_id', 2)
            ->where('group_id', 2)
            ->latest()
            ->paginate(5, ['*'], 'page_group2');

        $line2group3 = DekidakaHeader::with($relations)
            ->where('line_id',3)
            ->where('group_id', 3)
            ->latest()
            ->paginate(5, ['*'], 'page_group3');

        // Line ER 03    
        $line3group1 = DekidakaHeader::with($relations)
            ->where('line_id', 3)
            ->where('group_id', 1)
            ->latest()
            ->paginate(5, ['*'], 'page_group1');

        $line3group2 = DekidakaHeader::with($relations)
            ->where('line_id', 3)
            ->where('group_id', 2)
            ->latest()
            ->paginate(5, ['*'], 'page_group2');

        $line3group3 = DekidakaHeader::with($relations)
            ->where('line_id', 3)
            ->where('group_id', 3)
            ->latest()
            ->paginate(5, ['*'], 'page_group3');

        // Line ER 150
        $line4group1 = DekidakaHeader::with($relations)
            ->where('line_id', 4)
            ->where('group_id', 1)
            ->latest()
            ->paginate(5, ['*'], 'page_group1');

        $line4group2 = DekidakaHeader::with($relations)
            ->where('line_id', 4)
            ->where('group_id', 2)
            ->latest()
            ->paginate(5, ['*'], 'page_group2');

        $line4group3 = DekidakaHeader::with($relations)
            ->where('line_id', 4)
            ->where('group_id', 3)
            ->latest()
            ->paginate(5, ['*'], 'page_group3');


        return view('dashboard.index', 
        compact('line1group1',
                     'line1group2', 
                                'line1group3', 
                                'line2group1', 
                                'line2group2',
                                'line2group3',
                                'line3group1',
                                'line3group2',
                                'line3group3',
                                'line4group1',
                                'line4group2',
                                'line4group3',));
    }
}
