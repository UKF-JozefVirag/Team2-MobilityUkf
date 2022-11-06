<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UcastnikMobility extends Model
{
    use HasFactory;

    protected $table = 'mobilita_has_users';
    public $timestamps = false;
    protected $fillable = [
        'users_id',
        'mobilita_id'
    ];
}
