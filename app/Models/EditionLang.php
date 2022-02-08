<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EditionLang extends Model
{
    use HasFactory;

    protected $table = 'edition_langs';
    protected $fillable = ['name'];

    public function editions ()
    {
        return $this->hasMany(Edition::class, 'edition_lang_id', 'id');
    }

    public function scopePublished($query)
    {
        return $query->whereHas('editions', function ($query) {
            return $query->Published();
        });
    }

    public function scopeLangs($query, $url)
    {
        return $query->whereHas('editions', function ($query) use($url) {
            $query->active()->published();
            return $url == 'quran' ? $query->Quran() : $query->Tafsir();
        });
    }
}
