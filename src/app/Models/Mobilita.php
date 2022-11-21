<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Mobilita extends Model
{
    use HasFactory;

    protected $table = 'mobilita';
    public $timestamps = false;
    protected $fillable = [
        'nazov',
        'popis',
        'sprava_idsprava',
        'vyzva_idvyzva'
    ];

    public function spravy(): BelongsTo{
        return $this->belongsTo(Sprava::class);
    }
}
