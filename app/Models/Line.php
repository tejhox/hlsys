<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Line extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function dekidakaHeaders()
    {
        return $this->hasMany(DekidakaHeader::class);
    }
}
