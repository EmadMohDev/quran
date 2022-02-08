<?php

namespace App\Models;

use App\Traits\Filterable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Post extends Pivot
{
    use Filterable;

    protected $table = 'posts';

    protected $primaryKey = 'id';

    protected $fillable = ['published_date','active','url','ayah_id','operator_id','user_id', 'start_end'];

    public function operator()
    {
        return $this->belongsTo('App\Models\Operator','operator_id','id');
    }

    public function ayah()
    {
        return $this->belongsTo('App\Models\Ayah','ayah_id','id');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User','user_id','id');
    }

    public function scopePublished($query)
    {
        return $query->when(request()->opId, function ($query) {
            return $query->where('operator_id', request()->opId)->where('published_date', '<=', \Carbon\Carbon::now()->format('Y-m-d'))->where('active', 1);
        });
    }


    public function scopePublishedPost($query, $publish_date)
    {
        return $query->when(request()->opId, function ($query) use($publish_date) {
            return $query->where('operator_id', request()->opId)->where('published_date', '=', $publish_date)->where('active', 1);
        });
    }



    public function scopeWillPublished($query)
    {
        return $query->when(request()->opId, function ($query) {
            return $query->where('operator_id', request()->opId)->where('published_date', '>', \Carbon\Carbon::now()->format('Y-m-d'))->where('active', 1);
        });
    }
}
