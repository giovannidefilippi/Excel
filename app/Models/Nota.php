<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @method static where(string $string, int $id)
 * @method static create(array $array)
 * @method static findOrFail(int $id)
 */
class Nota extends Model
{
    protected $fillable = ['gara_id','testo','datainserimento'];
    use HasFactory;
    public function gara(): BelongsTo
    {
        return $this->belongsTo(Gara::class);
    }
}
