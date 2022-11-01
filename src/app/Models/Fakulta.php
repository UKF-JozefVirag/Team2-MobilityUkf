<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fakulta extends Model
{
    use HasFactory;

    protected $table = 'fakulta';
    public $timestamps = false;
    protected $fillable = [
        'name',
    ];
}
