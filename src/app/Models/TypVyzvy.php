<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypVyzvy extends Model
{
    use HasFactory;

    protected $table = 'typ_vyzvy';
    public $timestamps = false;
    protected $fillable = [
        'typ'
    ];
}
