<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LossTimeKpi extends Model
{
    protected $fillable = ['dekidaka_header_id', 'available_time', 'loss_time', 'result_loss_time'];

    public function dekidakaHeader() 
    {
        return $this->belongsTo(DekidakaHeader::class);
    }
}
