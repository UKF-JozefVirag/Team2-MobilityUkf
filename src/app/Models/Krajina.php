<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Krajina extends Model
{
    use HasFactory;

    protected $table = 'krajina';
    public $timestamps = false;
    protected $fillable = [
        'nazov',
    ];

    public function institutions(): HasMany {
        return $this->hasMany(Institucia::class);
    }
}
