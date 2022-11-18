<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuborSprav extends Model
{
    use HasFactory;

    protected $table = 'sprava_subor';
    public $timestamps = false;
    protected $fillable = [
        'sprava_idsprava',
        'subor_idsubor',
    ];
}
