<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ayah extends Model
{
    use HasFactory;

    protected $fillable = ['number', 'text', 'image', 'order_in_surah', 'juz', 'page', 'hizb_quarter', 'ruku', 'manzil', 'is_sajda', 'surah_id', 'edition_id'];

    public function surah ()
    {
        return $this->belongsTo(Surah::class);
    }

    public function audios ()
    {
        return $this->hasMany(Audio::class);
    }

    public function edition ()
    {
        return $this->belongsTo(Edition::class);
    }

    public function posts ()
    {
        return $this->hasOne(Post::class);
    }

    public function audioSrc ()
    {
        if ( $src = $this->audios()->where('default_audio', 1)->first() ) {
            if (file_exists($src->src))
                return $src->src;
            else
                $src->update(['default_audio' => 0]);
        }

        if ($this->audios()->count() > 0) {
            $audios = $this->audios()->orderBy('quality', 'desc')->get();
            foreach ($audios as $audio) {
                if (file_exists($audio->src)) {
                    $audio->update(['default_audio' => 1]);
                    return $audio->src;
                }
            }
        }
        return '';
    }

    public function scopeQuran($query, $surah = null, $edition = null)
    {
        return $query->where(['surah_id' => $surah ?? rand(1,114), 'edition_id' => $edition ?? 112]);
    }

    public function scopeTafsir($query, $id = 1)
    {
        return $query->whereHas('edition', function ($query) use($id) {
            $query->where('edition_type_id', 1)->where('id', $id);
        });
    }

    public function scopeLang($query, $lang= 'ar')
    {
        return $query->whereHas('edition', function ($query) use($lang) {
            return $query->whereHas('lang', function ($query) use($lang) {
                return $query->where('name', $lang);
            });
        });
    }

    public function scopePublished($query)
    {
        return $query->when(request()->opId, function ($query) {
            return $query->whereHas('posts', function ($query) {
                return $query->Published();
            });
        });
    }

    public function scopeWillPublished($query)
    {
        return $query->when(request()->opId, function ($query) {
            return $query->whereHas('posts', function ($query) {
                return $query->WillPublished();
            });
        });
    }
}
