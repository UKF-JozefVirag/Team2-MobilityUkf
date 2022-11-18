<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Sprava extends Model
{
    use HasFactory;

    protected $table = 'sprava';
    public $timestamps = false;
    protected $fillable = [
        'nadpis',
        'popis'
    ];

    public function subory(): BelongsToMany{
        return $this->belongsToMany(Subor::class);
    }
}
