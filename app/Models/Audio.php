<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Audio extends Model
{
    use HasFactory;

    protected $table = 'audios';
    protected $fillable = ['src', 'quality', 'default_audio', 'ayah_id'];

    public function ayah()
    {
        return $this->belongsTo(Ayah::class);
    }
}
