<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sprava extends Model
{
    use HasFactory;

    protected $table = 'sprava';
    public $timestamps = false;
    protected $fillable = [
        'nadpis',
        'popis'
    ];
}
