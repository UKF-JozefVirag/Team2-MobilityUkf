<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subor extends Model
{
    use HasFactory;

    protected $table = 'subor';
    public $timestamps = false;
    protected $fillable = [
        'url'
    ];

    public function spravy(){
        return $this->belongsToMany(Sprava::class);
    }
}
