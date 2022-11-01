<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypInstitucie extends Model
{
    use HasFactory;

    protected $table = 'typ_institucie';
    public $timestamps = false;
    protected $fillable = [
        'name',
    ];
}
