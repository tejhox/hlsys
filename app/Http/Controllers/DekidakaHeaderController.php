<?php

namespace App\Http\Controllers;

use App\Models\DekidakaHeader;
use Illuminate\Http\Request;

class DekidakaHeaderController extends Controller
{
    public function storeOrUpdate(Request $request)
    {
        $validated = $request->validate([
            'line_id' => 'required|exists:lines,id',
            'product_id' => 'required|exists:products,id',
            'shift_id' => 'required|exists:shifts,id',
            'group_id' => 'required|exists:groups,id',
            'date' => 'required|date',
        ]);

        $validated['user_id'] = auth()->id();

        if ($request->has('header_id')) {
            $header = DekidakaHeader::findOrFail($request->header_id);
            $header->update($validated);
            return redirect()->route('production.index', ['header_id' => $header->id])->with('status', 'header-updated');
        } else {
            $header = DekidakaHeader::create($validated);
            return redirect()->route('production.index', ['header_id' => $header->id])->with('status', 'header-created');
      }
    }

    public function destroy($id)
    {
        $header = DekidakaHeader::findOrFail($id);
        $header->delete();

        return redirect()->route('dashboard.index')->with('status', 'header-deleted');
    }
}
