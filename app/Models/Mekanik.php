<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mekanik extends Model
{
    use HasFactory;

    protected $guarded = [];
    
    public function member(){
        return $this->belongsTo(Member::class, 'idmember', 'id');
    }

    public function perbaikan(){
        return $this->hasMany(Perbaikan::class, 'id', 'idmekanik');
    }
}
