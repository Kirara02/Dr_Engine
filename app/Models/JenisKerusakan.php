<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisKerusakan extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Get all of the diagnosaKerusakan for the JenisKerusakan
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function diagnosaKerusakan()
    {
        return $this->hasMany(DiagnosaKerusakan::class, 'id', 'id');
    }
}   
