<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stav extends Model
{
    use HasFactory;

    protected $table = 'stav';
    public $timestamps = false;
    protected $fillable = [
        'name',
    ];
}
