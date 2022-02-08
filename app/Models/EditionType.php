<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EditionType extends Model
{
    use HasFactory;

    protected $table = "edition_types" ;
    protected $fillable = ['title'];

    public function editions ()
    {
        return $this->hasMany(Edition::class, 'edition_type_id', 'id');
    }
}
