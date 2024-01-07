<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class DaftarPoli extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'daftar_poli';

    public function jadwal(): BelongsTo
    {
        return $this->belongsTo(JadwalPeriksa::class, "id_jadwal");
    }

    public function pasien(): BelongsTo
    {
        return $this->belongsTo(Pasien::class, "id_pasien");
    }
}
