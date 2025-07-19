<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shift extends Model
{
    protected $fillable = ['shift'];
    
    public function dekidakaHeaders()
    {
        return $this->hasMany(DekidakaHeader::class);
    }
}
