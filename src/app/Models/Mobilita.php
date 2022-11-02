<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mobilita extends Model
{
    use HasFactory;

    protected $table = 'mobilita';
    public $timestamps = false;
    protected $fillable = [
        'nazov',
        'popis',
        'sprava_idsprava',
        'vyzva_idvyzva'
    ];
}
