<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DekidakaMain extends Model
{
    protected $fillable = ['dekidaka_header_id', 'hour', 'plan', 'actual', 'deviation', 'loss_time'];

    public function dekidakaHeader()
    {
        return $this->belongsTo(DekidakaHeader::class);
    }

    public function lossTimeDetails()
    {
        return $this->hasMany(LossTimeDetail::class);
    }

}
