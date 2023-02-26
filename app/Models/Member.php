<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Member extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class, 'iduser', 'id');
    }

    public function mekanik(){
        return $this->belongsTo(Mekanik::class, 'id', 'idmember');
    }

    public function kerusakan(){
        return $this->hasMany(Kerusakan::class, 'id', 'idmember');
    }
}
