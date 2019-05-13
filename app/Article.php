<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public function admin(){

        return $this->belongsTo(Admin::class);

    }

    public function comments(){

        return $this->hasMany(Comment::class);
    }

    public static function archive(){
        return static::selectRaw('year(created_at) year,monthname(created_at) month,COUNT(*) published')->groupBy('year','month')->get()->toArray();
    }
}
