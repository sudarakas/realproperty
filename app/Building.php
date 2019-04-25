<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
    protected $fillable = [
        'agreement','floorsize','floor','lift','carpark','nearestSchool','nearestRailway','nearestBusStop'
    ];

    public function property(){

        return $this->belongsTo(Property::class);

    }
}
