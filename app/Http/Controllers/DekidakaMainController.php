<?php
namespace App\Http\Controllers;

use App\Models\CycleTimeKpi;
use App\Models\DekidakaAccumulation;
use App\Models\DekidakaMain;
use App\Models\EfficiencyKpi;
use App\Models\LossTimeKpi;
use App\Models\PcsPerHourKpi;
use App\Models\Product;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

class DekidakaMainController extends Controller
{   
    private function updateAccumulation($dekidaka_header_id, $product)
    {   
        $allMains = DekidakaMain::where('dekidaka_header_id', $dekidaka_header_id)->get();
    
        $productData = Product::where('name', $product)->first();

        $product_cycle_time = $productData ? $productData->cycle_time : 0;

        $accumulation = DekidakaAccumulation::firstOrNew([
                'dekidaka_header_id' => $dekidaka_header_id,
            ]);

        $accumulation->time = $allMains->count() * 60;
        $accumulation->total_plan = $allMains->sum('plan');
        $accumulation->total_actual = $allMains->sum('actual');
        $accumulation->total_deviation = $allMains->sum('deviation');

        $accumulation->total_loss_time = $allMains->sum(function($item) {
            return abs($item->deviation);
        }) * $product_cycle_time;

        $accumulation->save();


    }

    private function updateKpi($dekidaka_header_id)
    {
        $accumulation = DekidakaAccumulation::firstOrNew([
            'dekidaka_header_id' => $dekidaka_header_id,
        ]);

        $available_time = $accumulation->time ?? 0;
        $effective_time = $available_time - ($accumulation->total_loss_time + 10 ?? 0);

        // KPI Efficiency
        $efficiency_kpi = EfficiencyKpi::firstOrNew([
            'dekidaka_header_id' => $dekidaka_header_id,
        ]);

        $result_efficiency = $available_time > 0 ? round(($effective_time / $available_time) * 100, 0) : 0;

        $efficiency_kpi->available_time = $available_time;
        $efficiency_kpi->effective_time = $effective_time;
        $efficiency_kpi->result_efficiency = $result_efficiency;
        $efficiency_kpi->save();

        // KPI Loss Time
        $loss_time_kpi = LossTimeKpi::firstOrNew([
            'dekidaka_header_id' => $dekidaka_header_id,
        ]);
        $loss_time = $accumulation->total_loss_time + 10 ?? 0;
        $result_loss_time = $available_time > 0 ? round(($loss_time / $available_time) * 100, 0) : 0;

        $loss_time_kpi->available_time = $available_time;
        $loss_time_kpi->loss_time = $loss_time;
        $loss_time_kpi->result_loss_time = $result_loss_time;
        $loss_time_kpi->save();

        // KPI Pcs/Hour
        $pcs_per_hour_kpi = PcsPerHourKpi::firstOrNew([
            'dekidaka_header_id' => $dekidaka_header_id,
        ]);
        $actual_output = $accumulation->total_actual ?? 0;
        $effective_hour = $effective_time / 60;
        $result_pcs_per_hour = $effective_hour > 0 ? ($actual_output / $effective_hour) : 0;

        $pcs_per_hour_kpi->actual_output = $actual_output;
        $pcs_per_hour_kpi->effective_hour = $effective_hour;
        $pcs_per_hour_kpi->result_pcs_per_hour = $result_pcs_per_hour;
        $pcs_per_hour_kpi->save();

        // KPI Cycle Time
        $cycle_time_kpi = CycleTimeKpi::firstOrNew([
            'dekidaka_header_id' => $dekidaka_header_id,
        ]); 
        $result_cycle_time_actual = $actual_output > 0 ? ($effective_time / $actual_output) : 0;

        $cycle_time_kpi->effective_time = $effective_time;
        $cycle_time_kpi->actual_output = $actual_output;
        $cycle_time_kpi->result_cycle_time_actual = $result_cycle_time_actual;
        $cycle_time_kpi->save();
    }

    public function store(Request $request) 
    {   
        try {
        $validatedMain = $request->validate([
            'dekidaka_header_id' => 'required|exists:dekidaka_headers,id',
            'hour' => 'required|string',
            'plan' => 'required|numeric|min:0',
            'actual' => 'required|numeric|min:0',
            'deviation' => 'required|numeric',
            'loss_time' => 'required|numeric|min:0',
        ]);

        $main = DekidakaMain::create($validatedMain);

        $this->updateAccumulation($main->dekidaka_header_id, $request->product);

        $this->updateKpi($main->dekidaka_header_id);

        return response()->json([
            'message' => 'Data berhasil disimpan.',
            'main' => $main
        ]);

        } catch (\Throwable $e) {
            Log::error('Terjadi error:', [
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine()
            ]);
    
            return back()->with('error', 'Terjadi kesalahan. Silakan cek log.');
        }
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'hour' => 'required|string',
            'plan' => 'required|numeric|min:0',
            'actual' => 'required|numeric|min:0',
            'deviation' => 'required|numeric',
            'loss_time' => 'required|numeric|min:0',
        ]);

        $main = DekidakaMain::findOrFail($request->main_id);
        $main->update($validated);

        $this->updateAccumulation($main->dekidaka_header_id, $request->product);

        $this->updateKpi($main->dekidaka_header_id);

        return redirect()->route('production.index', ['header_id' => $main->dekidaka_header_id])->with('status', 'header-updated');

    }

    public function destroy($id, Request $request)
    {
        $main = DekidakaMain::findOrFail($id);
        $headerId = $main->dekidaka_header_id;

        $main->delete();

        $this->updateAccumulation($headerId, $request->input('product'));

        $this->updateKpi($headerId);

        return redirect()->route('production.index', ['header_id' => $headerId])->with('status', 'header-deleted');
    }

}
