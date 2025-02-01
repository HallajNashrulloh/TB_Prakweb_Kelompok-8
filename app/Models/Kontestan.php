<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kontestan extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'tahun',
        'nama',
        'image',
        'vote',
        'visi',
        'misi',
    ];

    public function votes()
{
    return $this->hasMany(Vote::class);
}

}
