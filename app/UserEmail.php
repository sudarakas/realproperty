<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserEmail extends Model
{
    protected $fillable = [
        'name', 'email', 'message','owner','pno','subject'
    ];

    public function offers(){

        return $this->belongsTo(User::class);
        
    }
}
