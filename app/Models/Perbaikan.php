<?php

namespace App\Models;

use App\Models\Mekanik;
use App\Models\Kerusakan;
use App\Models\DetailPerbaikan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
        return $this->belongsTo(DetailPerbaikan::class, 'id', 'idperbaikan');
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
