<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DekidakaAccumulation extends Model
{
    protected $fillable = ['dekidaka_header_id','total_plan', 'total_actual', 'total_deviation', 'total_loss_time'];

    public function dekidakaHeader()
    {
        return $this->belongsTo(DekidakaHeader::class);
    }
}
