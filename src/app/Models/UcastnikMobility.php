<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UcastnikMobility extends Model
{
    use HasFactory;

    protected $table = 'ucastnici_mobilit';
    public $timestamps = false;
    protected $fillable = [
        'pouzivatel_idpouzivatel',
        'mobilita_idmobilita'
    ];
}
