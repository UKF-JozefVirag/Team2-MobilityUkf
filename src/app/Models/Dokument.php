<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Dokument extends Model
{
    use HasFactory;

    protected $table = 'dokument';
    public $timestamps = false;
    protected $fillable = [
        'url',
        'vyzva_id'
    ];

    public function vyzva(): BelongsTo{
        return $this->belongsTo(Vyzva::class);
    }

}
