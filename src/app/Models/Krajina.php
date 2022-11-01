<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Krajina extends Model
{
    use HasFactory;

    protected $table = 'krajina';
    public $timestamps = false;
    protected $fillable = [
        'idkrajina',
        'krajina',
    ];
}
