<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Vyzva extends Model
{
    use HasFactory;

    protected $table = 'vyzva';
    public $timestamps = false;
    protected $fillable = [
        'datum_od',
        'datum_do',
        'pokyny',
        'url',
        'program',
        'rocnik',
        'stav_id',
        'typ_vyzvy_id',
        'fakulta_id'
    ];

    public function dokument(): HasMany{
        return $this->hasMany(Dokument::class);
    }
}
