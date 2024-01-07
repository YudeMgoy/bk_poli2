<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
class Periksa extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'periksa';

    public function daftar_poli(): BelongsTo
    {
        return $this->belongsTo(DaftarPoli::class, 'id_daftar_poli');
    }

    public function detailPeriksas(): HasMany
    {
        return $this->hasMany(DetailPeriksa::class, 'id_periksa');
    }
}
