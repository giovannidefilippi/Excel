<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Operatore extends Model
{
    use HasFactory;
    protected $fillable = ['nome','cognome','cellulare'];
    public function gara(): HasMany
    {
        return
            $this->hasMany(Gara::class);
    }
}
