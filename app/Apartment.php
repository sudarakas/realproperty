<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    protected $fillable = [
        'kitchen','rooms','washroom','size','nearestSchool','nearestRailway','nearestBusStop'
    ];

    public function property(){

        return $this->belongsTo(Property::class);

    }
}
