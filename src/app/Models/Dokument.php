<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokument extends Model
{
    use HasFactory;

    protected $table = 'dokument';
    public $timestamps = false;
    protected $fillable = [
        'iddokument',
        'url',
        'vyzva_idvyzva'
    ];
}
