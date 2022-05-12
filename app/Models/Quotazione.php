<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Quotazione extends Model
{
    use HasFactory;
    protected $fillable = ['gara_id','fornitore','valore','dataricezione','note','filecaricato'];
    use HasFactory;
    public function gara(): BelongsTo
    {
        return $this->belongsTo(Gara::class);
    }
}
