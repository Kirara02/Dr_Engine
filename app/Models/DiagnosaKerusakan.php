<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiagnosaKerusakan extends Model
{
    use HasFactory;
    
    protected $guarded = [];

    /**
     * Get all of the kerusakan for the DiagnosaKerusakan
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function kerusakan()
    {
        return $this->belongsTo(Kerusakan::class, 'idkerusakan', 'id');
    }

    /**
     * Get all of the jenisKerusakan for the DiagnosaKerusakan
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function jenisKerusakan()
    {
        return $this->belongsTo(JenisKerusakan::class, 'idjeniskerusakan', 'id');
    }
}
