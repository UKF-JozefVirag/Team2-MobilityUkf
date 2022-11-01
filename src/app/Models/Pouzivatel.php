<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pouzivatel extends Model
{
    use HasFactory;

    protected $table = 'pouzivatel';
    public $timestamps = false;
    protected $fillable = [
        'meno',
        'priezvisko',
        'login',
        'heslo',
        'rola_idrola'
    ];
}
