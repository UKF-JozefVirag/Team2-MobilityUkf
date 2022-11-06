<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VyzvaInstitucie extends Model
{
    use HasFactory;

    protected $table = 'vyzva_has_institucia';
    public $timestamps = false;
    protected $fillable = [
        'institucia_id',
        'vyzva_id'
    ];
}
