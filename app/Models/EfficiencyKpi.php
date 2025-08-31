<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EfficiencyKpi extends Model
{
    protected $fillable = ['dekidaka_header_id', 'available_time', 'effective_time', 'result_efficiency', 'date'];

    public function dekidakaHeader()
    {
        return $this->belongsTo(DekidakaHeader::class);
    }
}
