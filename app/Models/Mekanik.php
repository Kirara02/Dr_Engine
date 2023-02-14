<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mekanik extends Model
{
    use HasFactory;
    
    protected $id = ['idmekanik'];
    
    public function member(){
        return $this->belongsTo(Member::class, 'idmember', 'idmember');
    }
}
