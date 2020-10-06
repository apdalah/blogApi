<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $thhis->belongsTo(App\User::class);
    }

    public function getRouteKeyName()
    {
        return "slug";
    }
}
