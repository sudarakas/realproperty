<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Land extends Model
{
    protected $fillable = [
        'noOfRooms', 'noOfKitchen', 'noOfFloors','noOfWashrooms','size','swimmingPool','garden','nearestSchool','nearestRailway','nearestBusStop'
    ];
    public function property(){

        return $this->belongsTo(Property::class);

    }
}
