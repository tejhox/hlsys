<?php

namespace App\Http\Controllers;
use App\Models\LossTimeDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class LossTimeDetailController extends Controller
{
    public function storeOrUpdateLossTimeDetail(Request $request)
    {
        try {
            $request->validate([
                'main_id' => 'required|exists:dekidaka_mains,id',
            ]);

            $validatedLossTimeDetail = $request->validate([
                'factor' => 'required|string',
                'loss_time_detail' => 'required|numeric|min:0',
                'note' => 'required|string',
            ]);

            if ($request->has('loss_time_id')) {
                $detail = LossTimeDetail::findOrFail($request->loss_time_id);
                $detail->update($validatedLossTimeDetail);
                return response()->json([
                    'message' => 'Detail loss time berhasil disimpan.',
                    'detail' => $detail
                ]);
            } else {
                $detail = LossTimeDetail::create(array_merge($validatedLossTimeDetail, [
                    'dekidaka_main_id' => $request->main_id
                ]));
                return response()->json([
                    'message' => 'Detail loss time berhasil disimpan.',
                    'detail' => $detail
                ]);
            }


        } catch (\Throwable $e) {
            Log::error('Terjadi error:', [
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine()
            ]);

            return response()->json(['error' => 'Terjadi kesalahan. Silakan cek log.'], 500);
        }
    }

        public function show(Request $request)
    {
        try {
            $lossTimeDetails = LossTimeDetail::where('dekidaka_main_id', $request->main_id)->get();

            return response()->json([
                'message' => 'Detail loss time berhasil diambil.',
                'lossTimeDetails' => $lossTimeDetails
            ]);
        } catch (\Throwable $e) {
            Log::error('Terjadi error:', [
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine()
            ]);

            return response()->json(['error' => 'Terjadi kesalahan. Silakan cek log.'], 500);
        }
    }

    public function destroy($id)
    {
        $detail = LossTimeDetail::findOrFail($id);

        $detail->delete();

         return response()->json([
                'message' => 'Detail loss time berhasil dihapus.',
            ]);
    }
}
