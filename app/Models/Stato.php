<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Stato extends Model
{
    use HasFactory;
    protected $fillable = ['stato'];
    public function gara(): HasMany
    {
        return
            $this->hasMany(Gara::class);
    }
}
