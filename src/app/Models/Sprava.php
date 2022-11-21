<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Sprava extends Model
{
    use HasFactory;

    protected $table = 'sprava';
    public $timestamps = false;
    protected $fillable = [
        'nadpis',
        'popis',
        'zverejnena'
    ];

    public function subory(): BelongsToMany{
        return $this->belongsToMany(Subor::class);
    }

    public function mobility(): HasMany{
        return $this->hasMany(Mobilita::class);
    }
}
