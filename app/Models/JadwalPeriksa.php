<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class JadwalPeriksa extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'jadwal_periksa';

    public function dokter(): BelongsTo
    {
        return $this->belongsTo(Dokter::class, "id_dokter");
    }
}
