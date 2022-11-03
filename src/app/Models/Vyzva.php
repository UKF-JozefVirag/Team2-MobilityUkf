<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vyzva extends Model
{
    use HasFactory;

    protected $table = 'vyzva';
    public $timestamps = false;
    protected $fillable = [
        'datum_od',
        'datum_do',
        'pokyny',
        'stav_idstav',
        'typ_vyzvy_idtyp_vyzvy',
        'fakulta_idfakulta'
    ];
}
