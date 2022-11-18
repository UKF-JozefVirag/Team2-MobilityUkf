<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TypInstitucie extends Model
{
    use HasFactory;

    protected $table = 'typ_institucie';
    public $timestamps = false;
    protected $fillable = [
        'nazov',
    ];

    public function institucia(): HasMany {
        return $this->hasMany(Institucia::class);
    }
}
