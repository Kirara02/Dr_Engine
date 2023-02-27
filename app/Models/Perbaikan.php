<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perbaikan extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Get the detail that owns the Perbaikan
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function detail()
    {
        return $this->belongsTo(DetailPerbaikan::class, 'id', 'idPerbaikan');
    }

    /**
     * Get the kerusakan that owns the Perbaikan
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function kerusakan()
    {
        return $this->belongsTo(Kerusakan::class, 'idkerusakan', 'id');
    }

    /**
     * Get the mekanik that owns the Perbaikan
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function mekanik()
    {
        return $this->belongsTo(Mekanik::class, 'idmekanik', 'id');
    }
}
