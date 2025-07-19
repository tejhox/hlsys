<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'cycle_time'];

     protected $casts = [
        'cycle_time' => 'float',
    ];
    
    public function dekidakaHeaders()
    {
        return $this->hasMany(DekidakaHeader::class);
    }
}
