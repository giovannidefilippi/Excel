<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Note extends Model
{
    protected $fillable = ['gara_id','testo'];
    use HasFactory;
    public function gara(): BelongsTo
    {
        return $this->belongsTo(Gara::class);
    }
}
