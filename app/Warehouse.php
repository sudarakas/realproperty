<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    protected $fillable = [
        'agreement','electricity','carpark','size'
    ];

    public function property(){

        return $this->belongsTo(Property::class);

    }
}