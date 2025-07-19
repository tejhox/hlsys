<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LossTimeDetail extends Model
{
    protected $fillable = ['dekidaka_main_id', 'factor', 'loss_time_detail', 'note'];

    public function dekidakaMain() 
    {
        return $this->belongsTo(DekidakaMain::class);
    }
}
