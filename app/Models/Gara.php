<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @method static create(array $array)
 * @method static max(string $string)
 * @method static findOrFail(int $id)
 * @method static where(string $string, int $int)
 */
class Gara extends Model
{
    use HasFactory;
    protected $fillable = ['rdo','denominazioneiniziativa','amministrazione',
        'regione','referente','telefono','bando','lotto','basedasta','datapubblicazione',
        'datascadenza','dataterminechiarimenti','giornidiconsegna','criterioaggiudicazione',
        'stato_id','operatore_id','fidejussione_id','quotazione','offerta','percorsocartella','rdoelotto','datascadenzatotime'];
    public function operatore(): BelongsTo
    {
        return $this->belongsTo(Operatore::class);
    }
    public function fidejussione(): BelongsTo
    {
        return $this->belongsTo(Fidejussione::class);
    }
    public function stato(): BelongsTo
    {
        return $this->belongsTo(Stato::class);
    }
    public function note(): HasMany
    {
        return
            $this->hasMany(Note::class);
    }
    public function quotazione(): HasMany
    {
        return
            $this->hasMany(Quotazione::class);
    }
}
