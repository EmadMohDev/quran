<?php

namespace App\Models;

use App\Traits\Filterable;
use App\Traits\LatestState;
use App\Traits\Translatable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // use LatestState, Filterable, Translatable;

    protected $table = 'categories';

    protected $fillable = ['title', 'image', 'parent_id', 'feature'];

    public function azkars()
    {
        return $this->hasMany(Azkar::class, 'category_id', 'id');
    }

    public function scopeFeature($query)
    {
        return $query->where('feature', 1);
    }

    public function scopeRouteFeature($query)
    {
        $url = explode('/', request()->route()->uri);
        if (in_array ('feature', $url))
            return $query->Feature();
    }

    // public function getImageAttribute($value)
    // {
    //     return $value ? url($value) : '';
    // }

    // public function scopeParent(Builder $builder)
    // {
    //     return $builder->whereNull('parent_id');
    // }

    // public function contents()
    // {
    //     return $this->hasMany('App\Models\Content', 'category_id', 'id');
    // }

    // public function sub_cats()
    // {
    //     return $this->hasMany('App\Models\Category', 'parent_id', 'id');
    // }

    // public function cat()
    // {
    //     return $this->belongsTo('App\Models\Category', 'parent_id', 'id');
    // }
}
