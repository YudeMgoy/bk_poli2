<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class DetailPeriksa extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'detail_periksa';

    public function obat(): BelongsTo
    {
        return $this->belongsTo(Obat::class, 'id_obat');
    }
}
