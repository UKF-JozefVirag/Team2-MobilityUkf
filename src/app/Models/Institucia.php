<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Institucia extends Model
{
    use HasFactory;

    protected $table = 'institucia';
    public $timestamps = false;
    protected $fillable = [
        'nazov',
        'mesto',
        'url_fotka',
        'zmluva_od',
        'zmluva_do',
        'krajina_idkrajina',
        'typ_institucie_id',
    ];
}
