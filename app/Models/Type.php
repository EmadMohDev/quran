<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $fillable = ['title'];
    protected $table = "types" ;

    public function settings()
    {
        return $this->hasMany('App\Models\Setting');
    }

    public function editions ()
    {
        return $this->hasMany(Edition::class, 'type_id', 'id');
    }
}
