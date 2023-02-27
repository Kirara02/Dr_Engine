<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPerbaikan extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Get the user that owns the DetailPerbaikan
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function detail()
    {
        return $this->belongsTo(Perbaikan::class, 'idPerbaikan', 'id');
    }
}
