<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kerusakan extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Get the member t the Kerusakan
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function member()
    {
        return $this->belongsTo(User::class, 'id', 'idmember');
    }

    /**
     * Get the diagnosaKerusakan that owns the Kerusakan
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function diagnosaKerusakan()
    {
        return $this->belongsTo(DiagnosaKerusakan::class, 'id', 'idkerusakan');
    }

    /**
     * Get the perbaikan that owns the Kerusakan
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function perbaikan()
    {
        return $this->belongsTo(Perbaikan::class, 'id', 'idkerusakan');
    }
    
}
