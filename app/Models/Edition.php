<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Edition extends Model
{
    use HasFactory;

    protected $fillable = ['identifier', 'name', 'name_en', 'direction', 'edition_lang_id', 'format_id', 'provider_id', 'edition_type_id'];

    public function audios ()
    {
        return $this->hasMany(Audio::class);
    }

    public function ayahs ()
    {
        return $this->hasMany(Ayah::class);
    }

    public function provider ()
    {
        return $this->belongsTo(Provider::class, 'provider_id', 'id');
    }

    public function format ()
    {
        return $this->belongsTo(Format::class, 'format_id', 'id');
    }

    public function type ()
    {
        return $this->belongsTo(EditionType::class, 'edition_type_id', 'id');
    }

    public function lang ()
    {
        return $this->belongsTo(EditionLang::class, 'edition_lang_id', 'id');
    }

    public function scopeActive($query)
    {
        return $query->whereHas('provider', function ($query) {
            return $query->where('is_active', 1);
        });
    }

    public function scopeType($query, $type = 'quran')
    {
            return $type == 'quran' || $type == true
            ? $query->Quran()
            : $query->Tafsir();
    }

    public function scopeQuran($query)
    {
        return $query->whereHas('type', function ($query) {
            return $query->whereIn('title', ['translation','quran','transliteration','versebyverse'])->where('id', '<>', 136);
        });
    }

    public function scopeTafsir($query)
    {
        return $query->whereHas('type', function ($q) {
            return $q->where('title', 'tafsir')->where('id', '<>', 136);
        });
    }

    public function scopewhereLang($query, $lang = 'ar')
    {
        return $query->whereHas('lang', function ($q) use($lang) {
            return $q->where('name', $lang);
        });
    }

    public function scopePublished($query)
    {
        return $query->whereHas('ayahs', function ($query) {
            return $query->Published();
        });
    }
}
