<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    // use Translatable;
    protected $fillable = ['title', 'image', 'name', 'name_en', 'is_active', 'feature', 'home_provider_section', 'home_edition_section'];

    public function editions ()
    {
        return $this->hasMany(Edition::class, 'provider_id', 'id');
    }

    public function categories()
    {
        return $this->hasMany('App\Models\Category', 'provider_id', 'id');
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', 1);
    }

    public function scopewhereHasFeature($query)
    {
        return $query->where('feature', 1);
    }

    public function scopewhenFeature($query)
    {
        $url = explode('/', request()->route()->uri);
        if (in_array ('feature', $url))
            return $query->whereHasFeature();

        if (in_array ('home-providers-section', $url))
            return $query->where('home_provider_section', 1);

        if (in_array ('home-editions-section', $url))
            return $query->where('home_edition_section', 1);
    }

    public function scopePublished($query)
    {
        return $query->whereHas('editions', function ($query) {
            return $query->Published();
        });
    }
}
