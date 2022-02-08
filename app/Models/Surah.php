<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surah extends Model
{
    use HasFactory;

    protected $fillable = ['number', 'name', 'name_en', 'translation_name_en', 'surah_type', 'count_of_ayahs'];

    public function ayahs ()
    {
        return $this->hasMany(Ayah::class);
    }
}
