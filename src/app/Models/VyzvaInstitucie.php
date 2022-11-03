<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VyzvaInstitucie extends Model
{
    use HasFactory;

    protected $table = 'institucia_has_vyzva';
    public $timestamps = false;
    protected $fillable = [
        'institucia_idinstitucia',
        'vyzva_idvyzva'
    ];
}
