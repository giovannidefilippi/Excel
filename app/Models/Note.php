<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @method static where(string $string, int $id)
 */
class Note extends Model
{
    protected $fillable = ['gara_id','testo','datainserimento'];
    use HasFactory;
    public function gara(): BelongsTo
    {
        return $this->belongsTo(Gara::class);
    }
}
