<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CycleTimeKpi extends Model
{
    protected $fillable = ['dekidaka_header_id', 'effective_time', 'actual_output', 'result_cycle_time_actual'];

    public function dekidakaHeader() 
    {
        return $this->belongsTo(DekidakaHeader::class);
    }
}
