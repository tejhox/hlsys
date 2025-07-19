<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PcsPerHourKpi extends Model
{
    protected $fillable = ['dekidaka_header_id', 'actual_output', 'effective_hour', 'result_pcs_per_hour'];

    public function dekidakaHeader() 
    {
        return $this->belongsTo(DekidakaHeader::class);
    }
}
