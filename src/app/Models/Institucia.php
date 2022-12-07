<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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

    public function krajina(): BelongsTo
    {
        return $this->belongsTo(Krajina::class, 'krajina_idkrajina', 'idkrajina');
    }

    public function typ_institucie(): BelongsTo {
        return $this->belongsTo(TypInstitucie::class);
    }

}
