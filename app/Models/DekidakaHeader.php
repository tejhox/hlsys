<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DekidakaHeader extends Model
{
    
    protected $fillable = [
        'line_id',
        'product_id',
        'shift_id',
        'group_id',
        'user_id',
        'date',
        'is_submitted',
    ];

    public function line()
    {
        return $this->belongsTo(Line::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function shift()
    {
        return $this->belongsTo(Shift::class);
    }

    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function dekidakaMains()
    {
        return $this->hasMany(DekidakaMain::class);
    }

    public function dekidakaAccumulation()
    {
        return $this->hasOne(DekidakaAccumulation::class);
    }

    public function efficiencyKpi()
    {
        return $this->hasOne(EfficiencyKpi::class);
    }

    public function lossTimeKpi()
    {
        return $this->hasOne(LossTimeKpi::class);
    }

    public function pcsPerHourKpi()
    {
        return $this->hasOne(PcsPerHourKpi::class);
    }

    public function cycleTimeKpi()
    {
        return $this->hasOne(CycleTimeKpi::class);
    }
}
