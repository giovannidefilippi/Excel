<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Fidejussione extends Model
{
    use HasFactory;
    protected $fillable = ['valore','concessa'];
    public function gara(): HasMany
    {
        return
            $this->hasMany(Gara::class);
    }
}
